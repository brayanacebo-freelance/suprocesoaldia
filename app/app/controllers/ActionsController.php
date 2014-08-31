<?php

class ActionsController extends BaseController {

	function __construct(Action $actions) 
	{
		$this->actions = $actions;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $actions = $this->actions->get();
        return View::make('admin.actions.all')->with(compact('actions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{   
        $actions_count = $this->actions->get()->count();
        return View::make('admin.actions.create')->with(compact('actions_count'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->actions->create(Input::all());
		return Redirect::route('actions.index');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $action = $this->actions->findOrFail($id);
        $actions_count = $this->actions->get()->count();
        return View::make('admin.actions.edit')->with(compact('action', 'actions_count'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$action = $this->actions->findOrFail($id);
		$action->fill(Input::all());
		$action->save();
		return Redirect::route('actions.index');
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
