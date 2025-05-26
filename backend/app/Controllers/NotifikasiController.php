<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\NotifikasiModel;

class NotifikasiController extends ResourceController
{
    protected $modelName = 'App\Models\NotifikasiModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return $this->failNotFound("Data notifikasi dengan ID $id tidak ditemukan");
        }
        return $this->respond($data);
    }

    public function create()
    {
        $json = $this->request->getJSON();
        $data = [
            'NIM' => $json->NIM,
            'NIDN' => $json->NIDN,
            'pesan' => $json->pesan,
            'tanggal_kirim' => date('Y-m-d H:i:s')
        ];
        $this->model->insert($data);
        return $this->respondCreated(['message' => 'Notifikasi berhasil ditambahkan']);
    }

    public function update($id = null)
    {
        $json = $this->request->getJSON();
        $data = [
            'pesan' => $json->pesan,
            'tanggal_kirim' => date('Y-m-d H:i:s')
        ];
        $this->model->update($id, $data);
        return $this->respond(['message' => 'Notifikasi berhasil diperbarui']);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Notifikasi berhasil dihapus']);
    }
}
