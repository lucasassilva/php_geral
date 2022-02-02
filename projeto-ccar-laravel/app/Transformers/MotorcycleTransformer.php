<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Motorcycle;

class MotorcycleTransformer extends TransformerAbstract
{

    public function transform(Motorcycle $model)
    {
        return [
            'id'         => (int) $model->id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
