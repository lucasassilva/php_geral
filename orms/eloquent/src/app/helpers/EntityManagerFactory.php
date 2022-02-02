<?php

namespace Application\Helpers;

use Illuminate\Database\Capsule\Manager as Capsule;

class EntityManagerFactory
{
    public function getEntityManager()
    {
        $capsule = new Capsule();

        $config = [
            "driver" => "mysql",
            "host" => "localhost",
            "database" => "db_eloquent",
            "username" => "root",
            "password" => "Rlxrvt1241x@",
            "charset" => "utf8",
            "collation" => "utf8_unicode_ci",
        ];

        $capsule->addConnection($config);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
