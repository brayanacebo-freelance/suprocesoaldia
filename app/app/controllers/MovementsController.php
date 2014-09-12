<?php

class MovementsController extends BaseController {

	function __construct(NotificationType $notifications, Action $actions, ClientsRepository $clients, ProcessesRepository $processes, ProcessesRepository $movements)
	{
		$this->notifications = $notifications;
		$this->actions = $actions;
		$this->clients = $clients;
		$this->processes = $processes;
		$this->movements = $movements;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($client_id, $process_id)
	{
		
        $client = $this->clients->find($client_id);
        $process = $this->processes->find($client_id, $process_id);

		$notifications = $this->notifications->getSelectList();
		$actions = $this->actions->getSelectList();
        return View::make('admin.movements.create')->with(compact('actions', 'notifications', 'client', 'process'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($client_id, $process_id)
	{
		$notification_date = new DateTime(Input::get('notification_date'));
		$auto_date = new DateTime(Input::get('auto_date'));
		if($notification_date >= $auto_date){
			Session::put('notifications', 'La fecha de auto debe ser mayor a la fecha de notificación');
			return Redirect::to('clients/'.$client_id.'/processes/'.$process_id.'/movements/create');
		}

        $client = $this->clients->find($client_id);
        $process = $this->processes->find($client_id, $process_id);

		$movement = new Movement(array(
			'action_type'			=>  Input::get('action_type'),
			'notification_type'			=> Input::get('notification_type'),
			'notification_date'			=> date_create_from_format('d-m-Y', Input::get('notification_date') ),
			'auto_date'					=> date_create_from_format('d-m-Y', Input::get('auto_date') ),
			'comments'			=> Input::get('comments'),
		));

        $m = $process->movements()->save($movement);
        $this->clients->log('Creo el movimiento de código '.$m->id);

		$movement->dir = str_replace('/', '', Hash::make($movement->created_at . $movement->id));
		File::makeDirectory(public_path('movements/'. $movement->dir), 0777, true, true);
		$movement->save();

		$process->touch();
        return Redirect::route('clients.processes.movements.edit', array($client_id, $process_id, $movement->id));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('movements.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($client_id, $process_id, $id)
	{
        $client = $this->clients->find($client_id);
        $process = $this->processes->find($client_id, $process_id);
        $movement = $process->movements->find($id);

		$notifications = $this->notifications->getSelectList();
		$actions = $this->actions->getSelectList();
        return View::make('admin.movements.edit')->with(compact('client', 'process', 'movement', 'notifications', 'actions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($client_id, $process_id, $id)
	{
        $client = $this->clients->find($client_id);
        $process = $this->processes->find($client_id, $process_id);
        $movement = $process->movements->find($id);

		$movement->fill( Input::except('notification_date', 'auto_date') );
		$movement->notification_date = date_create_from_format('d-m-Y', Input::get('notification_date') );
		$movement->auto_date = date_create_from_format('d-m-Y', Input::get('auto_date') );
		$movement->save();
		$this->clients->log('Actualizo el movimiento de código '.$id);
		return Redirect::route('clients.processes.show', array($client_id, $process_id));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function upload($client_id, $process_id, $id)
	{
		$client = $this->clients->find($client_id);
		$process = $this->processes->find($client_id, $process_id);
		$movement = $process->movements->find($id);

        $file = Input::file('file');
        $path = public_path('movements/'. $movement->dir);
        $files = File::files($path);
        $filename =  str_replace('/', '', Hash::make('x' .count($files))) .'.'. $file->getClientOriginalExtension();
        Input::file('file')->move($path, $filename);

        $process->touch();
        return Response::json(array());
	}

	public function getGallery($client_id, $process_id, $id)
	{
		$client = $this->clients->find($client_id);
		$process = $this->processes->find($client_id, $process_id);
		$movements = array();
		foreach ($process->movements as $movement)
		{
			if($movement->id == $id)
				$movements[] = $movement;
		}

		return View::make('admin.gallery.all')->with(compact('client', 'process', 'movements'));
	}

}
