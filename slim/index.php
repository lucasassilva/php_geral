<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require "./vendor/autoload.php";

$app = new \Slim\App;

$app->get("/servico", function (Request $request, Response $response) {
});

$app->run();

/*
// Padrão PSR7
$app->get("/usuarios", function (Request $request, Response $response) {
    $response->getBody()->write("Listagem de usuarios");
    return $response;
});

$app->post("/usuarios/adiciona", function (Request $request, Response $response) {
    $post = $request->getParsedBody();
    $nome = $post["nome"];
    $email = $post["email"];
    return $response->getBody()->write("Sucesso ao adicionar");
});

$app->put("/usuarios/atualiza", function (Request $request, Response $response) {
    $post = $request->getParsedBody();
    $id = $post["id"];
    $nome = $post["nome"];
    $email = $post["email"];
    return $response->getBody()->write("Sucesso ao atualizar");
});

$app->delete("/usuarios/remove/{id}", function (Request $request, Response $response) {
    $id = $request->getAttribute("id");
    return $response->getBody()->write("Sucesso ao deletar: " . $id);
});
*/

/*
$app->get("/postagens2", function () {
    echo "Listagem de postagens";
});

$app->get("/usuarios/{id}", function ($request, $response) {
    $id = $request->getAttribute("id");
    echo "Listagem de usuarios ou ID: " . $id;
});

$app->get("/postagens[/{mes}[/{ano}]]", function ($request, $response) {
    $ano = $request->getAttribute("ano");
    $mes = $request->getAttribute("mes");
    echo "Listagem de postagens Ano:" . $ano . " mes: " . $mes;
});

$app->get("/lista/{itens:.*}", function ($request, $response) {
    $itens = $request->getAttribute("itens");
    var_dump(explode("/", $itens));
});
*/

// Nomear rotas
/*$app->get("/blog/postagens/{id}", function ($request, $response) {
    echo "Listagem postagem para um ID";
})->setName("blog");

$app->get("/meusite", function ($request, $response) {
    $retorno = $this->get("router")->pathFor("blog", ["id" => "5"]);
    echo $retorno;
});
*/

// Agrupar rotas

/*
$app->group("/v1", function () {
    $this->get("/usuarios", function () {
        echo "Listagem de usuarios";
    });

    $this->get("/postagens", function () {
        echo "Listagem de postagens";
    });
});
*/
