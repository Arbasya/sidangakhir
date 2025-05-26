<?php

namespace App\Models;
use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'NIDN';
    protected $allowedFields = ['NIDN', 'nama_dosen'];
}
