<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateMotorcyclesTable extends Migration
{

	public function up()
	{
		Schema::create('motorcycles', function(Blueprint $table) {
         $table->increments('id');
         $table->double('mileage');
         $table->integer('year');
         $table->string('only_owner', 10);
         $table->string('type', 50);
         $table->string('image');
         $table->timestamps();
		});
	}


	public function down()
	{
		Schema::drop('motorcycles');
	}
}
