<?php

namespace App\Presenters;

use App\Transformers\CarTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class CarPresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new CarTransformer();
    }
}
