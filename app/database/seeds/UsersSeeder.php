<?php

class UsersSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->truncate();
		DB::table('clients')->truncate();
		DB::table('assistants')->truncate();

		$users = array(
			array(
				'email'		=> 'seguimiento-judicial-admin',
				'password'	=> Hash::make('seguimiento-judicial-admin'),

				'loggeable_id'	=> 0,
				'loggeable_type'	=> 'SuperAdmin',
			),
		);

		DB::table('users')->insert($users);

		$user = new User(array(
			'email'		=> 'aux',
			'password'	=> Hash::make('aux'),			
		));
		$aux = new Assistant(array(
			'name'		=> 'Jhon Clam',
			'nit'		=> 123456,
			'document_type'		=> 1,
		));
		$aux->save();
		$aux->user()->save($user);		
	}

}
