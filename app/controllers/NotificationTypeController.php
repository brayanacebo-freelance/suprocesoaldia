<?php

class NotificationTypeController extends BaseController {

	function __construct(NotificationType $types) 
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
        return View::make('admin.notifications.all')->with(compact('types'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{   
		$types = $this->types->get();
        return View::make('admin.notifications.create')->with(compact('types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->types->create(Input::all());
		return Redirect::route('notification-types.index')->with('notifications', "Datos creados con éxito!");
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
        return View::make('admin.notifications.edit')->with(compact('type'));
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
		return Redirect::route('notification-types.index')->with('notifications', "Datos editados con éxito!");
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
