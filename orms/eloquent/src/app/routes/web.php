<?php

use Sunrise\Http\Message\ResponseFactory;
use Sunrise\Http\Router\Exception\MethodNotAllowedException;
use Sunrise\Http\Router\Exception\RouteNotFoundException;
use Sunrise\Http\Router\Middleware\CallableMiddleware;
use Sunrise\Http\Router\RouteCollector;
use Sunrise\Http\Router\Router;
use Sunrise\Http\ServerRequest\ServerRequestFactory;

use function Sunrise\Http\Router\emit;

$collector = new RouteCollector();

$collector->get("home", "/", [Application\Controllers\IndexController::class, "index"]);
$collector->get("sobre", "/sobre", [Application\Controllers\IndexController::class, "sobre"]);

$router = new Router();
$router->addRoute(...$collector->getCollection()->all());

$router->addMiddleware(new CallableMiddleware(function ($request, $handler) {
    try {
        return $handler->handle($request);
    } catch (MethodNotAllowedException $e) {
        return (new ResponseFactory)->createResponse(405);
    } catch (RouteNotFoundException $e) {
        require_once "../src/app/Views/404.phtml";
        return (new ResponseFactory)->createResponse(404);
    } catch (Throwable $e) {
        return (new ResponseFactory)->createResponse(500);
    }
}));

emit($router->run(ServerRequestFactory::fromGlobals()));
