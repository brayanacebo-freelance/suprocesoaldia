<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersSeeder');
		$this->call('ProcessTypeTableSeeder');
		$this->call('DepartmentsTableSeeder');
		$this->call('CityTableSeeder');
		$this->call('ActionsTableSeeder');
		$this->call('NotificationTypesTableSeeder');
		$this->call('OfficesTableSeeder');
	}

}