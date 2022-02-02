<?php

namespace Application\Database\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class User
{

    public function up()
    {
        Capsule::schema()->create("users", function ($table) {
            $table->increments("id");
            $table->string("email")->nullable()->unique();
            $table->string("senha")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Capsule::schema()->drop("users");
    }
}
