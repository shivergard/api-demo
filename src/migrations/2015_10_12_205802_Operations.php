<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Operations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('api_operations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('method_id')->unsigned();
			$table->string('class_path');
			$table->string('class_method');
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
		//
	}

}
