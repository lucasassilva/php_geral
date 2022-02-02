<?php
namespace App\Validators;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ItemValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'type' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required',
            'type' => 'required',
        ],
    ];
    
    protected $messages =[
       'name.required'  => 'Nome é obrigatório.',
       'type.required' => 'Tipo é obrigatório.',
    ];
}
