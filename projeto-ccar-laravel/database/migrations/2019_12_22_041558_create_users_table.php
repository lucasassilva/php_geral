<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('email',100)->unique();
            $table->string('password',255)->nullable();
            $table->string('image',255)->nullable()->default('user.png');
            $table->string('status')->default('active');
            $table->string('permission')->default('app.user');
            $table->boolean('email_verify')->default(false);
            $table->boolean('reset_verify')->default(false);
            $table->string('verify_token',100)->nullable();
            $table->string('reset_token',100)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
		});
	}
	
	public function down()
	{
		Schema::drop('users');
	}
}
