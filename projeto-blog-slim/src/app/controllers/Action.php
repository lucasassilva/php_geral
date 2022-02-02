<?php

namespace App\Controllers;

use Slim\Views\PhpRenderer;
use App\Database\Connection;
use Slim\Psr7\Response;

class Action
{
    protected $view;

    public function __construct()
    {
        Connection::R();
    }

    public function render(Response $response, $page, $args = [])
    {
        $this->view = new PhpRenderer("../src/app/views");
        return $this->view->render($response, $page . ".phtml", $args);
    }
}
