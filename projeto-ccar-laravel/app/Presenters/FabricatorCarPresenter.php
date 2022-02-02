<?php

namespace App\Presenters;

use App\Transformers\FabricatorCarTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FabricatorCarPresenter.
 *
 * @package namespace App\Presenters;
 */
class FabricatorCarPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FabricatorCarTransformer();
    }
}
