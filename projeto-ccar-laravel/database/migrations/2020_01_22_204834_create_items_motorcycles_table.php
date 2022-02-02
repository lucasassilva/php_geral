<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsMotorcyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_motorcycles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('motorcycle_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->foreign('motorcycle_id')->references('id')->on('motorcycles')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
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
        Schema::dropIfExists('items_motorcycles');
    }
}
