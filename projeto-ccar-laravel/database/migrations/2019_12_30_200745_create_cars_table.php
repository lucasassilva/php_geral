<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCarsTable extends Migration
{

	public function up()
	{
		Schema::create('cars', function(Blueprint $table) {
         $table->increments('id');
         $table->double('mileage');
         $table->integer('year');
         $table->string('only_owner', 10);
         $table->string('fuel', 50);
         $table->string('image');
         $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('cars');
	}
}
