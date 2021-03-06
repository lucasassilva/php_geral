<?php

namespace App\Controllers;

abstract class Action
{

    protected $view;

    public function __construct()
    {
        $this->view = new \stdClass();
    }

    protected function render($view, $layout)
    {
        $this->view->page = $view;

        if (file_exists("../src/app/views/" . $layout . ".phtml")) {
            require_once "../src/app/views/" . $layout . ".phtml";
        } else {
            $this->content();
        }
    }

    protected function content()
    {
        $classAtual = get_class($this);
        $classAtual = str_replace("App\\Controllers\\", "", $classAtual);
        $classAtual = strtolower(str_replace("Controller", "", $classAtual));
        require_once "../src/app/views/" . $classAtual . "/" . $this->view->page . ".phtml";
    }
}
