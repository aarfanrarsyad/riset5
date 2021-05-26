<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run()
    {
        $this->call('alumni');
        $this->call('rbac');
        $this->call('webservice');
        $this->call('prov_kab');
    }
}
