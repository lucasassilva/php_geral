<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->date('start');
            $table->date('end');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('events');
	}
}
