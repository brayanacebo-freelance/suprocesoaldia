<?php

class ProcessTypeTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('process_types')->truncate();

		$processtype = array(
			array(
				'name'	=> 'Acción de Tutela'
			),
			array(
				'name'	=> 'Conciliación'
			),
		);

		// Uncomment the below to run the seeder
		DB::table('process_types')->insert($processtype);
	}

}
