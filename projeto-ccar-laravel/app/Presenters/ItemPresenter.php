<?php

namespace App\Presenters;

use App\Transformers\ItemTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ItemPresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new ItemTransformer();
    }
}
