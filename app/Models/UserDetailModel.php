<?php

namespace App\Models;

use CodeIgniter\Model;

class UserDetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user_details';
    protected $primaryKey       = 'user_detail_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["name","role_id","address","country_id","mobile","email","zip_code"];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
