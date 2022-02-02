<?php

namespace Application\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        $this->renderView("index/index");
    }

    public function sobre()
    {
        $this->renderView("index/sobreNos");
    }
}
