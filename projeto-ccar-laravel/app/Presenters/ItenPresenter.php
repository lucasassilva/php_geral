<?php

namespace App\Presenters;

use App\Transformers\ItenTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ItenPresenter.
 *
 * @package namespace App\Presenters;
 */
class ItenPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ItenTransformer();
    }
}
