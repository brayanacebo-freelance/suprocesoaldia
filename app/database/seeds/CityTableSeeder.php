<?php

class CityTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('cities')->truncate();

		$cities = array(
			array(
				'name'	=> 'Bogota'
			),
			array(
				'name'	=> 'Medellin'
			),
		);

		// Uncomment the below to run the seeder
		DB::table('cities')->insert($cities);
	}

}
