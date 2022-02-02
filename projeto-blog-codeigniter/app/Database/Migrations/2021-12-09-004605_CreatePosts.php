<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePosts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"          => [
                "type"           => "INT",
                "constraint"     => 11,
                "unsigned"       => true,
                "auto_increment" => true,
            ],
            "title" => [
                "type" => "VARCHAR",
                "constraint" => "100",
                "null" => false
            ],
            "description" => [
                "type" => "TEXT",
                "null" => false,
            ],
        ]);
        $this->forge->addKey("id", true);
        $this->forge->createTable("posts");
    }

    public function down()
    {
        $this->forge->dropTable("posts");
    }
}
