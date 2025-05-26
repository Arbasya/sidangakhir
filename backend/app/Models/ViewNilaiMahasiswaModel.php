<?php

namespace App\Models;
use CodeIgniter\Model;

class ViewNilaiMahasiswaModel extends Model
{
    protected $table = 'v_nilaimahasiswa';
    protected $allowedFields = ['nama_mahasiswa', 'NIM', 'nilai', 'catatan'];
    protected $primaryKey = ''; // Tidak ada primary key karena ini view
}