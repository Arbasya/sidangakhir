<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;

class HasilSidangController extends ResourceController
{
    protected $modelName = 'App\Models\HasilSidangModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return $this->failNotFound("Data dengan ID $id tidak ditemukan");
        }
        return $this->respond($data);
    }

    public function create()
    {
        $json = $this->request->getJSON();
        $data = [
            'id_sidang' => $json->id_sidang,
            'nilai' => $json->nilai,
            'catatan' => $json->catatan,
        ];
        $this->model->insert($data);
        return $this->respondCreated(['message' => 'Data hasil sidang berhasil ditambahkan']);
    }

    public function update($id = null)
    {
        $json = $this->request->getJSON();
        $data = [
            'nilai' => $json->nilai,
            'catatan' => $json->catatan,
        ];
        $this->model->update($id, $data);
        return $this->respond(['message' => 'Data hasil sidang berhasil diperbarui']);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Data hasil sidang berhasil dihapus']);
    }
}
