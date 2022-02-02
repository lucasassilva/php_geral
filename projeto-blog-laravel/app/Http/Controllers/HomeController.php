<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view("index.welcome", ["posts" => $posts]);
    }

    public function add()
    {
        return view("index.add_post");
    }

    public function create(Request $request, Response $response)
    {
        $post = new Post();

        $post->title = $request->input("title");
        $post->description = $request->input("description");

        $post->save();

        return redirect("/");
    }

    public function show($id)
    {
        $posts = Post::findOrFail($id);
        return view("index.edit_post", ["posts" => $posts]);
    }

    public function update(Request $request, Response $response)
    {
        $id = $request->input("id");
        Post::findOrFail($id)->update([
            "title" => $request->input("title"),
            "description" => $request->input("description")
        ]);
        return redirect("/");
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        return redirect("/");
    }
}
