<?php

class OfficesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('offices')->truncate();

		$offices = array(
			array(
				'name' => 'Despacho 1'
			),			
			array(
				'name' => 'Despacho 2'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('offices')->insert($offices);
	}

}
