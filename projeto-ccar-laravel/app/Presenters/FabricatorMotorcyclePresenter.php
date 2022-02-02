<?php

namespace App\Presenters;

use App\Transformers\FabricatorMotorcycleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class FabricatorMotorcyclePresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new FabricatorMotorcycleTransformer();
    }
}
