<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\fabricator_motorcycleRepository;
use App\Entities\FabricatorMotorcycle;
use App\Validators\FabricatorMotorcycleValidator;

/**
 * Class FabricatorMotorcycleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FabricatorMotorcycleRepositoryEloquent extends BaseRepository implements FabricatorMotorcycleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FabricatorMotorcycle::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FabricatorMotorcycleValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
