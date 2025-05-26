<?php

namespace App\Models;
use CodeIgniter\Model;

class SidangModel extends Model
{
    protected $table = 'sidang';
    protected $primaryKey = 'id_sidang'; 
    protected $allowedFields = ['NIM', 'NIDN', 'waktu_sidang', 'ruang_sidang']; 
}
