<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{

    public function index() {
        return view("login");
    }

    public function login(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");

        $user = User::where("email", "=", $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
           return response()->json([
                   "success"=> false,
                   "message" => "Falha no login"
           ]);
        } else {
            return response()->json([
                "success"=>true,
                "message"=>"Logado com sucesso",
                "data" => $user
             ]);
        }
    }
}
