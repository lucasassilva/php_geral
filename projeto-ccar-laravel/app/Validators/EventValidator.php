<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class EventValidator extends LaravelValidator
{
     protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title' => 'required',
            //'start_date' => 'required',
            //'end_date'=>'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title' => 'required',
            //'start_date' => 'required',
            //'end_date'=>'required',
        ],
    ];
    
    protected $messages =[
       'title.required'  => 'Nome do evento é obrigatório.',
       //'start.required' => 'Data de inicio do evento é obrigatório.',
       //'end_date.required'=>'Data do fim do evento é obrigatório',
    ];
}
