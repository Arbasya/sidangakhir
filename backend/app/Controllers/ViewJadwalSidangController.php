<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ViewJadwalSidangModel;

class ViewJadwalSidangController extends ResourceController
{
    protected $modelName = 'App\Models\ViewJadwalSidangModel';
    protected $format    = 'json';

    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM v_jadwalsidang");
        return $this->respond($query->getResult());
    }
    
}
