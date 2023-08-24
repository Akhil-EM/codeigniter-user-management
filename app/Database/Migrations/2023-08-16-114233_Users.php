<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "user_id" => [
                "type" => "INT",
                "auto_increment" => true
            ],
            "role_id" => [
                "type" => "INT"
            ],
            "username" => [
                "type" => "VARCHAR",
                "constraint" => 250,
                // "unique" => true
            ],
            "password" => [
                "type" => "VARCHAR",
                "constraint" => 500,
            ],
            "active" => [
                "type" => "BOOLEAN",
                "default" => true
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp',
            "deleted_at" => [
                "type" => "DATETIME",
                "null" => true,
            ]
        ]);

        $this->forge->addPrimaryKey('user_id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
