<?php

class UsersController extends BaseController {

	protected $users;

	function __construct(User $users) 
	{
		$this->users = $users;
	}
	

	public function getLogin()
	{
		if (Auth::check())
		{
		    $user = Auth::user();
			if ($user->isClient()) return Redirect::route('client.index');
			else if ($user->isAssistant()) return Redirect::route('clients.index');
			else if ($user->isAdmin()) return Redirect::route('clients.index');
		}else{
			return View::make('authenticate.login');
		}
		
	}

	public function postLogin()
	{
		$creds = array(
			'email' 	=> Input::get('email'),
			'password'	=> Input::get('password')
		);
		if (Auth::attempt($creds))
		{
			$user = Auth::user();
			if ($user->isClient()) return Redirect::route('client.movements.all', $user->getLoggeableResult()->id);
			else if ($user->isAssistant()) return Redirect::route('clients.index');
			else if ($user->isAdmin()) return Redirect::route('clients.index');
			else if ($user->isExecutive()) return Redirect::route('clients.index');
		}

		return Redirect::route('get.login')->withErrors(array('message' => 'Usuario o contraseña incorrecta!'));
	}


	public function postLogout()
	{
        Auth::logout();
        return Redirect::route('get.login');
	}


	public function getEdit()
	{
		$user = Auth::user();
		$loggeable = $user->getLoggeableResult();
		return View::make('authenticate.edit')->with(compact('user', 'loggeable'));
	}

	public function postEdit()
	{
		$user = Auth::user();
		$loggeable = $user->getLoggeableResult();

		$loggeable->fill(Input::all());
		$loggeable->save();

		return Redirect::route('get.profile');
	}

	public function postEditUserData()
	{
		$user = Auth::user();

		$user->password = Hash::make(Input::get('password'));
		$user->save();

		return Redirect::route('get.profile');
	}


}
