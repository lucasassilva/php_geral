<?php

namespace App\Controllers;

// os recursos do miniframework
use App\Controllers\Action;

// models
use App\Models\Produto;
use App\Models\Info;
use App\Models\Container;

class IndexController extends Action
{

    public function index()
    {
        $produto = Container::getModel("Produto");
        $produtos = $produto->getProdutos();
        $this->view->dados = $produtos;
        $this->render("index", "layout4");
    }

    public function sobreNos()
    {
        $info = Container::getModel("Info");
        $informacoes = $info->getInfo();
        $this->view->dados = $informacoes;
        $this->render("sobreNos", "layout1");
    }
}
