<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\User;

class UserTransformer extends TransformerAbstract
{

    public function transform(User $model)
    {
        return [
            'id'=> (int) $model->id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
