<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /*Table items motorcycles */

	public function up()
	{
		Schema::create('items', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('type', 40);
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('items');
	}
}
