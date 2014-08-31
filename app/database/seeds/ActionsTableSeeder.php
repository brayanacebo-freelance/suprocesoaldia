<?php

class ActionsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('actions')->truncate();

		$actions = array(
			array(
				'name' => 'Archiva tutela'
			),
			array(
				'name' => 'algo tutela'
			),
		);

		DB::table('actions')->insert($actions);
	}

}
