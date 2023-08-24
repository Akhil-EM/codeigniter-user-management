<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Roles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "role_id"=>[
                "type"=>"INT",
                "auto_increment"=>true
            ],
            "role"=>[
                "type"=>"VARCHAR",
                "constraint"=>100,
                "unique"=>true
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp',
            "deleted_at" => [
                "type" => "DATETIME",
                "null" => true,
            ]
        ]);

        $this->forge->addPrimaryKey('role_id');
        $this->forge->createTable('roles');
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
