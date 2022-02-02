<?php

namespace App\Routes;

class Routes extends Bootstrap
{

    protected function initRoutes()
    {
        $routes["home"] = array(
            "route" => "/",
            "controller" => "IndexController",
            "action" => "index"
        );
        $routes["sobre"] = array(
            "route" => "/sobreNos",
            "controller" => "IndexController",
            "action" => "sobreNos"
        );
        $this->setRoutes($routes);
    }
}
