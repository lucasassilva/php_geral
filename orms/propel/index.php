<?php

require "./vendor/autoload.php";
require "./generated-conf/config.php";

$user = new User;

$user->setEmail("teste30@hotmail.com");
$user->setSenha(password_hash("teste921", PASSWORD_BCRYPT));
try {
    $user->save();
} catch (\Propel\Runtime\Exception\PropelException $e) {
    echo $e->getMessage();
}
