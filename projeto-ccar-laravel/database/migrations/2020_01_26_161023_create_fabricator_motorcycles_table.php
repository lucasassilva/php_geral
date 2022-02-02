<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateFabricatorMotorcyclesTable.
 */
class CreateFabricatorMotorcyclesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fabricator_motorcycles', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('image');
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
		Schema::drop('fabricator_motorcycles');
	}
}
