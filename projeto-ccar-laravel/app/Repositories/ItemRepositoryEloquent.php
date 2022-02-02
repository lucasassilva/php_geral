<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\itemRepository;
use App\Entities\Item;
use App\Validators\ItemValidator;

class ItemRepositoryEloquent extends BaseRepository implements ItemRepository
{

    public function model()
    {
        return Item::class;
    }


    public function validator()
    {
        return ItemValidator::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
