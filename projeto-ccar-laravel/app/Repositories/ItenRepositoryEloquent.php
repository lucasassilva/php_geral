<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\itenRepository;
use App\Entities\Iten;
use App\Validators\ItenValidator;

/**
 * Class ItenRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ItenRepositoryEloquent extends BaseRepository implements ItenRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Iten::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ItenValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
