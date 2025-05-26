<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Database\BaseBuilder;

class ViewNilaiMahasiswaController extends ResourceController
{
    protected $format = 'json';

    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM v_nilaimahasiswa");
        return $this->respond($query->getResult());
    }
}