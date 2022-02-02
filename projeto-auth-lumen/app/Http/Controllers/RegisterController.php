<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index () {
        return view("register");
    }

    public function register(Request $request) {

        $validate = $this->validate($request, [
            "email" => "required|email|unique:users",
            "password" => "required|min:6|confirmed",
            "password_confirmation" => "required|min:6"
        ],$validate =[
            "email.required" => "O campo e-mail é obrigatório",
            "email.unique" => "E-mail já cadastrado",
            "password.required"  => "O campo senha é obrigatório",
            "password.min" => "O campo senha deve conter 6 caracteres",
            "password.confirmed" => "As senhas devem ser iguais",
            "password_confirmation.required" => "O campo confirmar senha é obrigatório",
            "password_confirmation.min" => "O campo confirmar senha deve conter 6 caracteres",
        ]);

        $user = new User();

        $user->email = $request->get("email");
        $user->password = Hash::make($request->get("password"));
        $user->save();

        return response()->json("Conta criada com sucesso");
    }


}
