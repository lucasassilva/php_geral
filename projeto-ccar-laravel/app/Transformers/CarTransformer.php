<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Car;

class CarTransformer extends TransformerAbstract
{
    public function transform(Car $model)
    {
        return [
            'id'         => (int) $model->id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
