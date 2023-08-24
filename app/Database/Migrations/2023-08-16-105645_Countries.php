<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Countries extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "country_id"=>[
                "type"=>"INT",
                "auto_increment"=>true
            ],
            "country"=>[
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

        $this->forge->addPrimaryKey('country_id');
        $this->forge->createTable('countries');
    }

    public function down()
    {
        $this->forge->dropTable('countries');
    }
}
