<?php
namespace App\Entities;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
class Car extends Model implements Transformable
{
    use TransformableTrait;

    public $timestamps =true;
    protected $fillable = ['mileage','year','only_owner','type','image'];

    public function carItem()
    {
        return $this->belongsToMany(Item::class, 'items_cars')->withTimestamps();
    }

}
