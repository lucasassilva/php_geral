<?php

use NoahBuscher\Macaw\Macaw;

Macaw::get('/', "Application\Controllers\IndexController@index");
Macaw::get('/sobre', "Application\Controllers\IndexController@sobre");
Macaw::error(function () {
    require_once "../src/app/Views/404.phtml";
});

Macaw::dispatch();
