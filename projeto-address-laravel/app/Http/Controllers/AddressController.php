<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class AddressController extends Controller
{

    public function index()
    {
        $addresses = Address::all();
        return view("api", ["addresses" => $addresses]);
    }

    public function create(Request $request, Response $response)
    {

        $validate = $request->input("viacep_manual") == 1 ? [
            'cep' => 'required|unique:address|max:50'
        ] : [
            'cep' => 'required|unique:address|max:50',
            'city' => 'required|max:255',
            'street' => 'required|max:255',
        ];

        $message = $request->input("viacep_manual") == 2 ? [
            'cep.unique' => 'Esse cep já existe no banco de dados',
            'cep.required' => "O campo cep é obrigatório",
            'city.required' => "O campo cidade é obrigatório",
            'street.required' => "O campo rua é obrigatório"
        ] : [
            'cep.required' => "O campo cep é obrigatório",
            'cep.unique' => 'CEP já cadastrado',
        ];

        $validator = Validator::make(
            $request->all(),
            $validate,
            $message
        );

        if ($validator->fails()) {
            return redirect()
                ->route("view.address")
                ->withErrors($validator)
                ->withInput();
        } else {
            $address = new Address();
            $street = $request->input("street");
            $city = $request->input("city");
            if (isset($city) && isset($street)) {
                $address->cep = preg_replace("/[^0-9]/", "", $request->input('cep'));
                $address->city = $request->input("city");
                $address->street = $request->input("street");
            } else {
                $viaCep = "https://viacep.com.br/ws/{$request->input('cep')}/json/";
                $response = json_decode(file_get_contents($viaCep));
                $address->cep = $request->input("cep");
                $address->city = $response->localidade;
                $address->street = $response->logradouro;
            }
            $address->save();
            return redirect()->route("view.address")->with("success", "Cadastro realizado com sucesso!");
        }
    }

    public function delete($id)
    {
        Address::findOrFail($id)->delete();
        return redirect()->route("view.address")->with("success", "Registro removido com sucesso!");
    }
}
