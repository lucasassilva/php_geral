<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


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

    public function create(Request $request)
    {
        $title = $request->get("title");

        $description = $request->get("description");

        if ($request->hasFile("image") && $title != "" && $description != "") {

            $post = new Post();

            $post->title = $request->get("title");

            $post->description = $request->get("description");

            $name = uniqid(date("HisYmd"));

            $extension = $request->image->extension();

            $nameFile = "{$name}.{$extension}";

            $request->image->storeAs("public/posts", $nameFile);

            $post->image = $nameFile;

            $post->save();

            return redirect("/");
        }

        return redirect("/create");
    }


    public function show($id)
    {
        $posts = Post::findOrFail($id);
        return view("index.edit_post", ["posts" => $posts]);
    }


    public function update(Request $request)
    {
        $id = $request->get("id");

        $title = $request->get("title");
        $description = $request->get("description");
        $image = $request->get("image_storage");

        if ($title != "" && $description != "" || $request->hasFile("image")) {

            if ($request->file("image") != null) {

                $name = uniqid(date("HisYmd"));

                $extension = $request->image->extension();

                $nameFile = "{$name}.{$extension}";

                $request->image->storeAs("public/posts", $nameFile);

                if (file_exists("storage/posts/" . $image)) {
                    unlink(storage_path("app/public/posts/" . $image));
                    $this->storageUpdate($id, $title, $description, $nameFile);
                }
                return redirect("/");
            } else {
                $this->storageUpdate($id, $title, $description, $image);
                return redirect("/");
            }
        } else {
            return redirect("/update/" . $id);
        }
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        return redirect("/");
    }
}
