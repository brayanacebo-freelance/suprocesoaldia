<?php

class ProcessesController extends BaseController {

	protected $processes;
	protected $clients;

	function __construct(ClientsRepository $clients, ProcessesRepository $processes, Department $departments, City $cities, ProcessType $types, Office $offices) 
	{
		$this->processes = $processes;
		$this->clients = $clients;
		$this->departments = $departments;
		$this->cities = $cities;
		$this->types = $types;
		$this->offices = $offices;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($client_id)
	{
		$client = $this->clients->find($client_id);
		$departments = $this->departments->getSelectList();
		$types = $this->types->getSelectList();

		return View::make('admin.processes.create')->with(compact('client', 'departments', 'types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($client_id)
	{
		$client = $this->clients->find($client_id);
		$process = new Process(Input::all());
		
		//echo "<pre>"; print_r($process->claimant); exit;

		//$data['claimant'] = array_filter($data['claimant']);
		//$data['defendant'] = array_filter($data['defendant']);

		$r = $client->processes()->save($process);

		$this->clients->log('Creo el proceso de código '.$r->id);

		return Redirect::route('clients.show', $client_id)->with('notifications', "Proceso creado con éxito!");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($client_id, $id)
	{
		$client = $this->clients->find($client_id);
		$process = $this->processes->find($client_id, $id);

		return View::make('admin.processes.show')->with(compact('client', 'process'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($client_id, $id)
	{
		$client = $this->clients->find($client_id);
		$process = $this->processes->find($client_id, $id);

		$departments = $this->departments->getSelectList();
		$cities = $this->cities->getSelectList();
		$types = $this->types->getSelectList();
		$offices = $this->offices->getSelectList();

		return View::make('admin.processes.edit')->with(compact('client', 'cities', 'departments', 'types' , 'process', 'offices'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($client_id ,$id)
	{
		$data = Input::except('_method');

		$data['claimant'] = array_filter($data['claimant']);
		$data['defendant'] = array_filter($data['defendant']);

		$client = $this->clients->find($client_id);
		$process = $this->processes->find($client_id, $id);
		
		$process->fill($data);
		$process->save();

		$this->clients->log('Actualizo el proceso de código '.$id);

		return Redirect::route('clients.processes.show', array($client->id, $process->id))->with('notifications', "Proceso editado con éxito!");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($client_id ,$id)
	{
		$client = $this->clients->find($client_id);
		$process = $this->processes->find($client_id, $id);
		$this->clients->log('Elimino el proceso de código '.$id);
		$process->delete();
		return Response::json(array());
	}

	/**
	 * Filtros de selects
	 *
	 * @param  int  $id
	 * @return Obj para armar el select con js
	 */
	public function getCities($departamentId)
	{
		if($departamentId > 0){
			$departamen = $this->departments->find($departamentId);
			return $departamen->cities;
		}else{
			return 0;
		}
	}

	public function getOffices($cityId)
	{
		if($cityId > 0){
			$city = $this->cities->find($cityId);
			return $city->offices;
		}else{
			return 0;
		}
	}

}
