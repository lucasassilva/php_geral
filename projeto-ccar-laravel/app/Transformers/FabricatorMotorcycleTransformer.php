<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\FabricatorMotorcycle;

class FabricatorMotorcycleTransformer extends TransformerAbstract
{
    public function transform(FabricatorMotorcycle $model)
    {
        return [
            'id'         => (int) $model->id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
