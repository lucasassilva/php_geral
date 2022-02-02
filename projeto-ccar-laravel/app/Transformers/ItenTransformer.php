<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Iten;

/**
 * Class ItenTransformer.
 *
 * @package namespace App\Transformers;
 */
class ItenTransformer extends TransformerAbstract
{
    /**
     * Transform the Iten entity.
     *
     * @param \App\Entities\Iten $model
     *
     * @return array
     */
    public function transform(Iten $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
