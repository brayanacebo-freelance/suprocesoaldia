<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcessesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('processes', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('client_id')->unsigned();
			$table->string('folder_number');
			$table->string('creation_number');
			$table->integer('department_id')->unsigned();
			$table->integer('city_id')->unsigned();

			$table->integer('office_id')->unsigned();
			$table->integer('process_type')->unsigned();
			$table->text('claimant');
			$table->text('defendant');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('processes');
	}

}
