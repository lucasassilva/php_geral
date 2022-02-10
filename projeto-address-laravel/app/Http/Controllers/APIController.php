<?php

namespace App\Http\Controllers;

use App\Models\Address;

class APIController extends Controller
{
    public function index($cep)
    {
        $cep = preg_replace("/[^0-9]/", "", $cep);
        $data = Address::find($cep);

        if (isset($data)) {
            return response()->json([
                "cep" => $data->cep,
                "city" => $data->city,
                "street" => $data->street
            ], 200, ["Content-Type" => "application/json;charset=UTF-8"], JSON_UNESCAPED_UNICODE);
        } else {
            $viacep = "https://viacep.com.br/ws/{$cep}/json/";
            $response = json_decode(file_get_contents($viacep));
            if (isset($response->erro)) {
                return response()->json(["error" => "CEP Inexistente"], 404);
            } else {
                $Address = new Address();
                $Address->cep = preg_replace("/[^0-9]/", "", $cep);
                $Address->city = $response->localidade;
                $Address->street = $response->logradouro;
                $Address->save();
                return response()->json([
                    "cep" => $response->cep,
                    "city" => $response->localidade,
                    "street" => $response->logradouro
                ], 200, ["Content-Type" => "application/json;charset=UTF-8"], JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
