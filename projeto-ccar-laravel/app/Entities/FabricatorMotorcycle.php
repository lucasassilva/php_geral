<?php
namespace App\Entities;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class FabricatorMotorcycle extends Model implements Transformable
{
    use TransformableTrait;

    public $timestamps =true;
    protected $fillable = ['name','image'];

}
