<?php

namespace App\Models;
use CodeIgniter\Model;

class HasilSidangModel extends Model
{
    protected $table = 'hasil_sidang';
    protected $primaryKey = 'id_hasil'; 
    protected $allowedFields = ['id_sidang', 'nilai', 'catatan']; 
}
