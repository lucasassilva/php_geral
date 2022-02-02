<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as Controller;

class HomeController extends Controller
{
    public function index () {
        return view("home");
    }

}
