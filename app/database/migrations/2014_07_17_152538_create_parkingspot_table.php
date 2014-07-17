<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingspotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parking_spots', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer("position_x");
			$table->integer("position_y");
            $table->boolean("free");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('parking_spots');
	}

}
