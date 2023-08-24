<?php

namespace App\Database\Seeds;

use App\Models\RoleModel;
use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class AdminSeed extends Seeder
{
    
    public function run()
    {
        $encrypter= \Config\Services::encrypter();
        //get admin role id
        $roleModel = new RoleModel();
        $role = $roleModel->where('role','Admin')->first();
        $adminRoleId = $role['role_id']; 
        //generate password hash
        $passwordHash = bin2hex($encrypter->encrypt('qwerty'));
        
        //insert admin user
        $userModel = new UserModel();
        $data = [
            'role_id'=>$adminRoleId,
            'username'=>'admin',
            'password'=>$passwordHash,
        ];
        $userModel->insert($data);
    }
}
