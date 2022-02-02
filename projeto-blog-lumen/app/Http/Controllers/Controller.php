<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Post;

class Controller extends BaseController
{
    public function storageUpdate($id, $title, $description, $image)
    {
        Post::findOrFail($id)->update([
            "title" => $title,
            "description" => $description,
            "image" => $image
        ]);
    }
}
