<?php

namespace App\Database\Seeds;

use App\Models\RoleModel;
use CodeIgniter\Database\Seeder;

class Roles extends Seeder
{
    public function run()
    {
        $roleModel = new RoleModel();
        $roles = ["Admin","Web Developer","Web Designer","Tester","PHP Developer","Ios Developer"];

        foreach ($roles as $key => $role) {
            $item = ["role" => $role ];
            $roleModel -> insert($item);
        }
    }
}
