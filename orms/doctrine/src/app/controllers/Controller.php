<?php

namespace Application\Controllers;

abstract class Controller
{
    protected $data = null;

    public function view($view, $data = null)
    {
        require_once "../src/app/Views/" . $view . ".phtml";
    }
}
