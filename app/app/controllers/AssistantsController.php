<?php

class AssistantsController extends BaseController {

	protected $assistants;

	function __construct(Assistant $assistants) 
	{
		$this->assistants = $assistants;
	}
	
	/**
	 * Display a listing of the assistant.
	 *
	 * @return Response
	 */
	public function index()
	{
        $assistants = $this->assistants->get();
        return View::make('admin.auxiliary.all')->with(compact('assistants'));
	}

	/**
	 * Show the form for creating a new assistant.
	 *
	 * @return Response
	 */
	public function create()
	{
        $count = $this->assistants->count();
        return View::make('admin.auxiliary.create')->with(compact('count'));
	}

	/**
	 * Store a newly created assistant in storage.
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

				$data = Input::only('name', 'nit', 'phone');
				$assistant = $this->assistants->create($data);
				$assistant->user()->save($user);
	
				$this->sendMail($user);
				return Redirect::route('assistants.index')->with('notifications', "Auxiliar creado con éxito!");
			}else{
				return Redirect::route('assistants.create')->withErrors(array('message' => 'Email Invalido!'));
			}

		}else{
			return Redirect::route('assistants.create')->withErrors(array('message' => 'Este '.Input::get('email').' cliente ya existe'));
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
	 * Display the specified assistant.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $assistant = $this->assistants->findOrFail($id);
        return View::make('assistants.show')->compact('assistant');
	}

	/**
	 * Show the form for editing the specified assistant.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $assistant = $this->assistants->findOrFail($id);
        $count = $this->assistants->count();
        return View::make('admin.auxiliary.edit')->with(compact('assistant', 'count'));
	}

	/**
	 * Update the specified assistant in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();
		$assistant = $this->assistants->findOrFail($id);
		$assistant->fill(Input::only('name', 'nit', 'phone'));
		$assistant->save();
		return Redirect::route('assistants.index')->with('notifications', "Datos actualizados con éxito!");;
	}

	public function updateAssistantUser($id)
	{
		$data = Input::except('_method' ,'cpassword');
		$data['password'] = Hash::make($data['password']);

		$client = $this->assistants->find($id);
		$client->user->fill($data);
		$client->user->save();
		return Redirect::route('assistants.index');
	}

	/**
	 * Remove the specified assistant from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$assistant = $this->assistants->findOrFail($id);
		$assistant->delete();
	}

}
