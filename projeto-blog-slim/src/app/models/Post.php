<?php

namespace App\Models;

use RedBeanPHP\R;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class Post
{

    public function findAll()
    {
        return R::findAll("posts");
    }

    public function create(Request $request, Response $response, $args)
    {
        $body = $request->getParsedBody();
        $title = $body["title"];
        $description = $body["description"];
        $posts = R::dispense("posts");
        $posts->title = $title;
        $posts->description = $description;
        R::store($posts);
    }

    public function findOne(Request $request, Response $response, $args)
    {
        $id = $request->getAttribute("id");
        return R::findOne("posts", "id=:id", array("id" => $id));
    }

    public function update(Request $request, Response $response, $args)
    {
        $body = $request->getParsedBody();
        $title = $body["title"];
        $description = $body["description"];
        $id = $body["id"];

        $posts = R::load("posts", $id);

        $posts->title = $title;
        $posts->description = $description;

        R::store($posts);
    }

    public function delete(Request $request, Response $response, $args)
    {
        $id = $request->getAttribute("id");
        $posts = R::findOne("posts", "id=:id", array("id" => $id));
        R::trash($posts);
    }
}
