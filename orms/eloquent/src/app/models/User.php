<?php

namespace Application\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    public $timestamps = true;
    protected $fillable = ["email", "senha"];
}
