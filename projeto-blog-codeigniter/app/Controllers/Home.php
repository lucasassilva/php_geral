<?php

namespace App\Controllers;

use App\Models\Post;

class Home extends BaseController
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new Post();
    }

    public function index()
    {
        $data["post"] = $this->postModel->findAll();
        return view("welcome", $data);
    }

    public function add()
    {
        return view("posts/add_post");
    }

    public function create()
    {
        $data = [
            "title" => $this->request->getVar("title"),
            "description"  => $this->request->getVar("description"),
        ];
        $this->postModel->insert($data);
        return $this->response->redirect("/");
    }

    public function show($id)
    {
        $data["post"] = $this->postModel->find($id);
        return view("posts/edit_post", $data);
    }

    public function update($id)
    {
        $data = [
            "title" => $this->request->getVar("title"),
            "description"  => $this->request->getVar("description"),
        ];
        $this->postModel->update($id, $data);
        return $this->response->redirect("/");
    }

    public function delete($id)
    {
        $this->postModel->where("id", $id)->delete();
        return $this->response->redirect("/");
    }
}
