<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    public $timestamps = true;
    protected $table = "users";
    protected $fillable = ["email", "password"];
    protected $hidden = ["password"];

}
