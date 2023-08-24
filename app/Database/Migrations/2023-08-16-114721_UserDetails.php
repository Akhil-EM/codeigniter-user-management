<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserDetails extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "user_detail_id" => [
                "type" => "INT",
                "auto_increment" => true
            ],
            "role_id" => [
                "type" => "INT",
            ],
            "name" => [
                "type" => "VARCHAR",
                "constraint" => 250,
            ],
            "address" => [
                "type" => "VARCHAR",
                "constraint" => 500,
            ],
            "country_id" => [
                "type" => "INT",
            ],
            "mobile" => [
                "type" => "VARCHAR",
                "constraint" => 100,
            ],
            "email" => [
                "type" => "VARCHAR",
                "constraint" => 250,
            ],
            "zip_code" => [
                "type" => "VARCHAR",
                "constraint" => 50,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp',
            "deleted_at" => [
                "type" => "DATETIME",
                "null" => true,
            ]

        ]);

        $this->forge->addPrimaryKey('user_detail_id');
        $this->forge->createTable('user_details');
    }

    public function down()
    {
        $this->forge->dropTable('user_details');
    }
}
