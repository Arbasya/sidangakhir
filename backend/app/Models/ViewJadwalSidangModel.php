<?php

namespace App\Models;
use CodeIgniter\Model;

class ViewJadwalSidangModel extends Model
{
    protected $table = 'v_jadwalsidang';
    protected $allowedFields = ['nama_mahasiswa', 'NIM', 'prodi', 'nama_dosen', 'waktu_sidang', 'ruang_sidang'];
    protected $primaryKey = ''; // Tidak ada primary key karena ini view
}
