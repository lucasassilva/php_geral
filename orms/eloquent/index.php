<?php

require "vendor/autoload.php";

use Application\Models\User;
use Application\Helpers\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManagerFactory->getEntityManager();

$user = User::create([
    "email" => "teste592@gmail.com",
    "senha" => password_hash("teste123", PASSWORD_BCRYPT)
]);
