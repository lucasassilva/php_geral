<?php

namespace App\Presenters;

use App\Transformers\MotorcycleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class MotorcyclePresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new MotorcycleTransformer();
    }
}
