<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get("/", "HomeController@index");
$router->get("/create", "HomeController@add");
$router->post("/create", "HomeController@create");
$router->post("/delete/{id}", "HomeController@delete");
$router->get("/update/{id}", "HomeController@show");
$router->post("/update", "HomeController@update");
