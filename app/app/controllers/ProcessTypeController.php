<?php

class ProcessTypeController extends BaseController {

	function __construct(ProcessType $types) 
	{
		$this->types = $types;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $types = $this->types->get();
        return View::make('admin.typeprocesses.all')->with(compact('types'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{   
        $types_count = $this->types->get()->count();
        return View::make('admin.typeprocesses.create')->with(compact('types_count'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->types->create(Input::all());
		return Redirect::route('process-types.index')->with('notifications', "Datos creados con éxito!");
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $type = $this->types->findOrFail($id);
        $types_count = $this->types->get()->count();
        return View::make('admin.typeprocesses.edit')->with(compact('type', 'types_count'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$type = $this->types->findOrFail($id);
		$type->fill(Input::all());
		$type->save();
		return Redirect::route('process-types.index')->with('notifications', "Datos creados con éxito!");
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

}
