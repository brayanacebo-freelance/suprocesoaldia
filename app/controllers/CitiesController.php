<?php

class CitiesController extends BaseController {

	function __construct(Department $departments, City $cities) 
	{
		$this->departments = $departments;
		$this->cities = $cities;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($department_id)
	{
        $department = $this->departments->with('cities')->findOrFail($department_id);

        $cities = $department->cities;
        return View::make('admin.cities.all')->with(compact('cities', 'department'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($department_id)
	{   
		
        $department = $this->departments->with('cities')->findOrFail($department_id);

        return View::make('admin.cities.create')->with(compact('department'));;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($department_id)
	{
		$department = $this->departments->with('cities')->findOrFail($department_id);
		$city = new City(Input::all());
		$department->cities()->save($city);
		return Redirect::route('departments.cities.index', $department_id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($department_id, $id)
	{
        $department = $this->departments->with('cities')->findOrFail($department_id);
        $city = $this->cities->findOrFail($id);
        return View::make('admin.cities.edit')->with(compact('city', 'department'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($department_id, $id)
	{
		$city = $this->cities->findOrFail($id);
		$city->fill(Input::all());
		$city->save();
		return Redirect::route('departments.cities.index', $department_id);
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
