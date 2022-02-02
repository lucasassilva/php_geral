<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Item;

class ItemTransformer extends TransformerAbstract
{

    public function transform(Item $model)
    {
        return [
            'id' => (int) $model->id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
