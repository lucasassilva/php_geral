<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensTable extends Migration
{
	/*Table items cars */
	public function up()
	{
		Schema::create('itens', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('type', 40);
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('itens');
	}
}
