<?php
namespace App\Entities;
use Illuminate\Database\Eloquent\Model;

class ContactUS extends Model
{
    
    public $table = 'contact_us';
    public $fillable = ['first_name','last_name','subject','email','message'];

}
