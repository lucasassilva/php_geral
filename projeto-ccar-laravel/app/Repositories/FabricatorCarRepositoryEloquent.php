<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\fabricator_carRepository;
use App\Entities\FabricatorCar;
use App\Validators\FabricatorCarValidator;

/**
 * Class FabricatorCarRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FabricatorCarRepositoryEloquent extends BaseRepository implements FabricatorCarRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FabricatorCar::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FabricatorCarValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
