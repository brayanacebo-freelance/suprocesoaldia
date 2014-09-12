<?php

class ClientsController extends BaseController {

	protected $clients;
	protected $users;

	function __construct(ClientsRepository $clients, ProcessesRepository $movements) 
	{
		parent::__construct();
		$this->clients = $clients;
		$this->movements = $movements;
	}

	/**
	 * Display a listing of the client.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::user()->isClient()) return Redirect::route('clients.show', 1);
		$clients = $this->clients->get();
        // echo "<pre>";
        // print_r($clients);
        // exit;
		return View::make('admin.clients.all')->with(compact('clients'));
	}

	/**
	 * Show the form for creating a new client.
	 *
	 * @return Response
	 */
	public function create()
	{
		$clients_count = $this->clients->get()->count();
		return View::make('admin.clients.create')->with(compact('clients_count'));
	}

	/**
	 * Store a newly created client in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$userData = Input::only('email', 'password');

		if(!User::where('email', '=', Input::get('email'))->first())
		{
			if(filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL)){

				$user = new User;
				$user->email = Input::get('email');
				$user->password = Hash::make(Input::get('password'));

				$user->save();    

				$clientData = Input::only('enterprise', 'in_charge', 'phone');
				$client = $this->clients->create($clientData);
				$client->user()->save($user);
				//$client->assistant()->associate(Auth::user()->getLoggeableResult());

				$client->save();

				$this->sendMail($user);

				return Redirect::route('clients.index')->with('notifications', "El cliente ha sido creado con éxito!");
			}else{
				return Redirect::route('clients.create')->withErrors(array('message' => 'Email invalido'));
			}
		}else{
			return Redirect::route('clients.create')->withErrors(array('message' => 'Este '.Input::get('email').' cliente ya existe'));
		}
	}

	public function sendMail($user)
	{
		$plain_pswd = Input::get('password');
		Mail::send('emails.newuser', compact('user', 'plain_pswd'), function($m) use (&$user)
		{
			$m->to($user->email)->subject('Ingreso a Seguimiento Judicial');
		});
	}

	/**
	 * Display the specified client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$client = $this->clients->find($id);

		$movementsCounts = count($client->movements);

		return View::make('admin.clients.show')->with(compact('client','movementsCounts'));
	}

	public function getProcessReport()
	{
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Informe.xls"');
		header('Cache-Control: max-age=0');

		$id = Input::get('id');
		$client = $this->clients->find($id);

		$object = [];

		foreach ($client->processes as $process) {
			if($process->archived === 0){
				$arrayOne = [
				"cod" => $process->id,
				"folder_number" => $process->folder_number,
				"creation_number" => $process->creation_number,
				"claimant" => $process->claimant,
				"defendant" => $process->defendant
				];
				$movement = Movement::where('process_id', $process->id)
				->orderBy('id', 'DESC')
				->limit(1)
				->first();
				$arrayTwo = [];
				if($movement){
					$action = Action::where('id', $movement->action_type)->first();
					$notification = NotificationType::where('id', $movement->notification_type)->first();
					$arrayTwo = [
					"action" => $action->name,
					"notification" => $notification->name,
					"notification_date" => $movement->notification_date,
					"auto_date" => $movement->auto_date,
					"comments" => $movement->comments
					];
				}			
				$object[] = array_merge($arrayOne, $arrayTwo);
			}
		}

		return View::make('admin.clients.report')->with(compact('object'));
	}

	/**
	 * Show the form for editing the specified client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = $this->clients->find($id);

		return View::make('admin.clients.edit')->with(compact('client'));

	}

	/**
	 * Update the specified client in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try{
			$data = Input::except('_method');
			$client = $this->clients->find($id);
			$client->fill($data);
			$client->save();
		}catch(Exception $e){
			return Redirect::route('clients.create')->withErrors(array('message' => 'Este '.Input::get('email').' cliente ya existe'));
		}
		return Redirect::route('clients.index')->with('notifications', "Datos actualizados con éxito!");
	}

	public function updateClientUser($id)
	{
		if(!filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL)){
			return Redirect::route('clients.create')->withErrors(array('message' => 'Email invalido'));
		}

		try{
			$data = Input::except('_method' ,'cpassword');

			$data['password'] = Hash::make($data['password']);

			$client = $this->clients->find($id);
			
			$client->user->fill($data);
			
			$client->user->save();
		}catch(Exception $e){
			return Redirect::route('clients.create')->withErrors(array('message' => 'Este '.Input::get('email').' cliente ya existe'));
		}
		return Redirect::route('clients.index')->with('notifications', "Datos actualizados con éxito!");
	}

	/**
	 * Remove the specified client from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$client = $this->clients->find($id);
		$this->clients->log('Elimino el usuario '.$client->in_charge);
		$client->delete();
		return Response::json(array());
	}

	public function archive($id)
	{
		$affectedRows = User::where('loggeable_id', $id)->update(array('archived' => 1));
		if($affectedRows === 1){
			$u = User::where('loggeable_id', $id)->first();
			$this->clients->log('Archivo el usuario '.$u->email);
			return Redirect::route('clients.index')->with('notifications', "Archivado con éxito!");
		}else{
			return Redirect::route('clients.index')->withErrors(array('message' => 'A ocurrido un error, vuelva a intentarlo o comuniquese con su proveedor'));
		}
	}

	public function noArchive($id)
	{
		$affectedRows = User::where('loggeable_id', $id)->update(array('archived' => 0));
		if($affectedRows === 1){
			$u = User::where('loggeable_id', $id)->first();
			$this->clients->log('Desarchivo el usuario '.$u->email);
			return Redirect::route('clients.index')->with('notifications', "Cliente retirado de archivados con éxito!");
		}else{
			return Redirect::route('clients.index')->withErrors(array('message' => 'A ocurrido un error, vuelva a intentarlo o comuniquese con su proveedor'));
		}
	}

	public function suspended($id)
	{
		$affectedRows = User::where('loggeable_id', $id)->update(array('suspended' => 1));
		if($affectedRows === 1){
			$u = User::where('loggeable_id', $id)->first();
			$this->clients->log('Suspendio el usuario '.$u->email);
			return Redirect::route('clients.index')->with('notifications', "Suspendido con éxito!");
		}else{
			return Redirect::route('clients.index')->withErrors(array('message' => 'A ocurrido un error, vuelva a intentarlo o comuniquese con su proveedor'));
		}
	}

	public function noSuspended($id)
	{
		$affectedRows = User::where('loggeable_id', $id)->update(array('suspended' => 0));
		if($affectedRows === 1){
			$u = User::where('loggeable_id', $id)->first();
			$this->clients->log('Retiro el usuario '.$u->email. ' de los suspendidos');
			return Redirect::route('clients.index')->with('notifications', "Cliente retirado de los suspendidos con éxito!");
		}else{
			return Redirect::route('clients.index')->withErrors(array('message' => 'A ocurrido un error, vuelva a intentarlo o comuniquese con su proveedor'));
		}
	}

	public function pArchive($id)
	{
		$affectedRows = Process::where('id', $id)->update(array('archived' => 1));
		if($affectedRows === 1){
			$this->clients->log('Archivo el proceso de código '.$id);
			return Redirect::route('clients.index')->with('notifications', "Archivado con éxito!");
		}else{
			return Redirect::route('clients.index')->withErrors(array('message' => 'A ocurrido un error, vuelva a intentarlo o comuniquese con su proveedor'));
		}
	}

	public function pNoArchive($id)
	{
		$affectedRows = Process::where('id', $id)->update(array('archived' => 0));
		if($affectedRows === 1){
			$this->clients->log('Desarchivo el proceso de código '.$id);
			return Redirect::route('clients.index')->with('notifications', "Cliente retirado de archivados con éxito!");
		}else{
			return Redirect::route('clients.index')->withErrors(array('message' => 'A ocurrido un error, vuelva a intentarlo o comuniquese con su proveedor'));
		}
	}

}
