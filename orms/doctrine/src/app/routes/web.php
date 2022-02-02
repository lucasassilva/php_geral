<?php

require_once "../../../vendor/autoload.php";

$route = \PlugRoute\RouteFactory::create();

$route->get("/", "Application\\Controllers\\IndexController@index");
$route->get("/sobre", "Application\\Controllers\\IndexController@sobre");
$route->notFound(function () {
    require_once "../src/app/Views/404.phtml";
});
$route->on();
