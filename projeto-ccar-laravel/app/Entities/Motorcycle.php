<?php
namespace App\Entities;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Motorcycle extends Model implements Transformable
{
    use TransformableTrait;

    public $timestamps =true;
    protected $fillable = ['mileage','year','only_owner','type','image'];


    public function motorcycleItem()
    {
        return $this->belongsToMany(Item::class, 'items_motorcycles')->withTimestamps();
    }
}
