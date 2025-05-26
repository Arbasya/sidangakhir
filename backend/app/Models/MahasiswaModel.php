<?php

namespace App\Models;
use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'NIM';
    protected $allowedFields = ['NIM', 'nama_mahasiswa', 'alamat', 'kelas', 'prodi', 'judul_tugasakhir'];
}
