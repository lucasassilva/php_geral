<?php
namespace App\Entities;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Laravel\Socialite\SocialiteServiceProvider;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    public $timestamps      =true;
    protected $table        ='users';
    protected $fillable     =['first_name','last_name','email','password','image','status','permission','verify_token','reset_token','provider_id','provider'];
    protected $hidden       =['password','remember_token'];

}

