<?php

namespace App\Database;

use RedBeanPHP\R;

class Connection
{
    public static function R()
    {
        try {
            R::setup(
                "mysql:host=localhost;dbname=db_slim",
                "root",
                "Rlxrvt1241x@"
            );
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
