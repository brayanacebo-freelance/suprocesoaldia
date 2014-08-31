<?php

class OfficesController extends BaseController {

	function __construct(Office $offices, City $cities, Department $departments) 
	{
		$this->offices = $offices;
		$this->cities = $cities;
		$this->departments = $departments;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($department_id, $city_id)
	{
        $city = $this->cities->with('offices')->findOrFail($department_id);
        $department = $this->departments->findOrFail($department_id);
        $offices = $city->offices;
        return View::make('admin.offices.all')->with(compact('offices', 'city', 'department'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($department_id, $city_id)
	{   
        $city = $this->cities->with('offices')->findOrFail($city_id);
        return View::make('admin.offices.create')->with(compact('city', 'department_id'));;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($department_id, $city_id)
	{
		$city = $this->cities->findOrFail($city_id);
		$office = new Office(Input::all());
		$city->offices()->save($office);
		return Redirect::route('departments.cities.offices.index', array($department_id, $city_id));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($department_id, $city_id, $id)
	{
        $city = $this->cities->with('offices')->findOrFail($city_id);
        $office = $this->offices->findOrFail($id);
        return View::make('admin.offices.edit')->with(compact('city', 'office', 'department_id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($department_id, $city_id, $id)
	{
		$office = $this->offices->findOrFail($id);
		$office->fill(Input::all());
		$office->save();
		return Redirect::route('departments.cities.offices.index', array($department_id, $city_id));
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
