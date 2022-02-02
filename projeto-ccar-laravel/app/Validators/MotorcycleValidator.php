<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;


class MotorcycleValidator extends LaravelValidator
{
      protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'mileage' => 'required',
            'year' => 'required',
            'only_owner' => 'required',
            'type' => 'required',
            'fileImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'mileage' => 'required',
            'year' => 'required',
            'only_owner' => 'required',
            'type' => 'required',
            'fileImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ],
    ];
    
    protected $messages =[
       'mileage.required'  => 'Quilometragem é obrigatório.',
       'year.required' => 'Ano é obrigatório.',
       'only_owner.required'  => 'Unico Dono é obrigatório.',
       'type.required' => 'Combustivel é obrigatório.',
       'fileImage.required' => 'Imagem é obrigatório.',
       'fileImage.image'=>'Arquivo de imagem é obrigatório',
       'fileImage.mimes'=>'Extensão,jpeg,png,jpg,gif,svg é obrigatório',
    ];
}
