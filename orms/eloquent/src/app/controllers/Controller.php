<?php

namespace Application\Controllers;

abstract class Controller
{
    protected $data = null;

    public function renderView($view, $data = null)
    {
        require_once "../src/app/Views/" . $view . ".phtml";
    }
}
