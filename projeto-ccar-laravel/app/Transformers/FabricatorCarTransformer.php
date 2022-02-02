<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\FabricatorCar;

/**
 * Class FabricatorCarTransformer.
 *
 * @package namespace App\Transformers;
 */
class FabricatorCarTransformer extends TransformerAbstract
{
    /**
     * Transform the FabricatorCar entity.
     *
     * @param \App\Entities\FabricatorCar $model
     *
     * @return array
     */
    public function transform(FabricatorCar $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
