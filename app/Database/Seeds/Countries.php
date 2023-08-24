<?php

namespace App\Database\Seeds;

use App\Models\CountryModel;
use CodeIgniter\Database\Seeder;

class Countries extends Seeder
{
    public function run()
    {
        $countries = ["India","America","Brazil","Canada","South America","Pakistan"];
        $countryModel = new CountryModel();

        foreach ($countries as $key => $country) {
            $item = ["country" => $country];
            $countryModel-> insert($item);  
        }
    }
}
