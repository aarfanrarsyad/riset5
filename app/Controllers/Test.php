<?php
namespace App\Controllers;

use App\Models\AlumniModel;

class Test extends BaseController
{
    public function index($nim){
        $this->modelAlumni = new AlumniModel();
        $data = $this->modelAlumni->getAlumniDetail($nim);
    }
}