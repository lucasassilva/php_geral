<?php

namespace Application\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        $this->data = ["Lucas", "Alves", "Silva"];
        $this->view("index/index", $this->data);
    }

    public function sobre()
    {
        $this->data = array("JavaScript", "PHP");
        $this->view("index/sobreNos", $this->data);
    }
}
