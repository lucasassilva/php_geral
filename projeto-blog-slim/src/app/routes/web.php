<?php

use Slim\Factory\AppFactory;

require __DIR__ . "../../../../vendor/autoload.php";

$app = AppFactory::create();

$app->get("/", \App\Controllers\IndexController::class . ":index");
$app->get("/posts", \App\Controllers\IndexController::class . ":add");
$app->post("/create", \App\Controllers\IndexController::class . ":create");
$app->post("/delete/{id}", \App\Controllers\IndexController::class . ":delete");
$app->get("/update/{id}", \App\Controllers\IndexController::class . ":show");
$app->post("/update", \App\Controllers\IndexController::class . ":update");

$app->run();
