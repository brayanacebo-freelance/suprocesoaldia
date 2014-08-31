<?php

class DepartmentsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('departments')->truncate();

		$departments = array(
			array(
				'name'	=> 'Cundinamarca'
			),
			array(
				'name'	=> 'Antioquia'
			),
		);

		// Uncomment the below to run the seeder
		DB::table('departments')->insert($departments);
	}

}
