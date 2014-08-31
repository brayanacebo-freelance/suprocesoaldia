<?php

class ClientsController extends BaseController {

	protected $clients;
	protected $users;

	function __construct(ClientsRepository $clients) 
	{
		parent::__construct();
		$this->clients = $clients;
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
				$client->assistant()->associate(Auth::user()->getLoggeableResult());
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

        return View::make('admin.clients.show')->with(compact('client'));
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

		$client->delete();

		return Response::json(array());
	}

}
