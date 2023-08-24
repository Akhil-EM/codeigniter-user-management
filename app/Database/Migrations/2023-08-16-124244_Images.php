<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Images extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "image_id" => [
                "type" => "INT",
                "auto_increment" => true
            ],
            "user_detail_id" => [
                "type" => "INT"
            ],
            "image" => [
                "type" => "VARCHAR",
                "constraint" => 500,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp',
            "deleted_at" => [
                "type" => "DATETIME",
                "null" => true,
            ]
        ]);

        $this->forge->addPrimaryKey('image_id');
        $this->forge->createTable('images');
    }

    public function down()
    {
        $this->forge->dropTable('images');
    }
}
