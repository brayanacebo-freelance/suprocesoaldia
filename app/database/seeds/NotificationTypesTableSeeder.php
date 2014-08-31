<?php

class NotificationTypesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('notification_types')->truncate();

		$notification_types = array(
			array(
				'name' => 'Edicto'
			),
			array(
				'name' => 'Edicto Constitucional'
			),
			array(
				'name' => 'Edicto de Sentencia Administrativs'
			),
			array(
				'name' => 'Edicto Emplazatorio'
			),
			array(
				'name' => 'Edicto de Sentencia'
			),
			array(
				'name' => 'Estado'
			),
			array(
				'name' => 'Estado Administrativo'
			),
			array(
				'name' => 'Extracto de Demanda'
			),
			array(
				'name' => 'Traslado'
			),
		);

		DB::table('notification_types')->insert($notification_types);
	}

}
