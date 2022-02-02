<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MotorcycleRepository;
use App\Entities\Motorcycle;
use App\Validators\MotorcycleValidator;

class MotorcycleRepositoryEloquent extends BaseRepository implements MotorcycleRepository
{
  
    public function model()
    {
        return Motorcycle::class;
    }

    public function validator()
    {
        return MotorcycleValidator::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
