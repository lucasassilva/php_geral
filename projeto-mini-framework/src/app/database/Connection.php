<?php

namespace App\Database;

class Connection
{
    public static function getDb()
    {
        try {
            $conn = new \PDO(
                "mysql:host=localhost;dbname=mvc;charset=utf8",
                "root",
                "Rlxrvt1241x@"
            );
            return $conn;
        } catch (\PDOException $e) {
            $e->getMessage();
        }
    }
}
