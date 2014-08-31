<?php

class DepartmentsController extends BaseController {

	function __construct(Department $departments) 
	{
		$this->departments = $departments;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $departments = $this->departments->get();
        return View::make('admin.departments.all')->with(compact('departments'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{   
        return View::make('admin.departments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->departments->create(Input::all());
		return Redirect::route('departments.index');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $department = $this->departments->findOrFail($id);
        return View::make('admin.departments.edit')->with(compact('department'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$action = $this->departments->findOrFail($id);
		$action->fill(Input::all());
		$action->save();
		return Redirect::route('departments.index')->with('notifications', "Departamento editado con éxito!");
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
