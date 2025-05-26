<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class UserController extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return $this->failNotFound("User dengan ID $id tidak ditemukan");
        }
        return $this->respond($data);
    }

    public function create()
    {
        $json = $this->request->getJSON();
        $data = [
            'username' => $json->username,
            'password' => password_hash($json->password, PASSWORD_DEFAULT),
            'email' => $json->email,
            'role' => $json->role
        ];
        $this->model->insert($data);
        return $this->respondCreated(['message' => 'User berhasil ditambahkan']);
    }

    public function update($id = null)
    {
        $json = $this->request->getJSON();
        $data = [
            'username' => $json->username,
            'email' => $json->email,
            'role' => $json->role
        ];
        
        if (!empty($json->password)) {
            $data['password'] = password_hash($json->password, PASSWORD_DEFAULT);
        }
        
        $this->model->update($id, $data);
        return $this->respond(['message' => 'User berhasil diperbarui']);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'User berhasil dihapus']);
    }
}
