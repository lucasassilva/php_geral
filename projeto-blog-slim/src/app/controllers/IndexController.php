<?php

namespace App\Controllers;

use App\Controllers\Action;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use App\Models\Post;

class IndexController extends Action
{
    public function index(Request $request, Response $response, $args)
    {
        $data["post"] = (new Post)->findAll();
        return $this->render($response, "welcome", $data);
    }

    public function add(Request $request, Response $response, $args)
    {
        return $this->render($response, "posts/add_post", []);
    }

    public function create(Request $request, Response $response, $args)
    {
        (new Post)->create($request, $response, $args);
        return $response->withHeader("Location", "/")->withStatus(302);
    }

    public function show(Request $request, Response $response, $args)
    {
        $data["posts"] = (new Post)->findOne($request, $response, $args);
        return $this->render($response, "posts/edit_post", $data);
    }

    public function update(Request $request, Response $response, $args)
    {
        (new Post)->update($request, $response, $args);
        return $response->withHeader("Location", "/")->withStatus(302);
    }

    public function delete(Request $request, Response $response, $args)
    {
        (new Post)->delete($request, $response, $args);
        return $response->withHeader("Location", "/")->withStatus(302);
    }
}
