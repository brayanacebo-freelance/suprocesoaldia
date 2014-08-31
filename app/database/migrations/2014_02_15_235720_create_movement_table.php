<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMovementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('movements', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('process_id')->unsigned();
			$table->integer('action_type')->unsigned();
			$table->integer('notification_type')->unsigned();
			$table->date('notification_date');
			$table->date('auto_date');
			$table->text('comments');
			$table->string('dir')->nullable();
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
		Schema::drop('movements');
	}

}
