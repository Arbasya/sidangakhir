<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class LoginController extends ResourceController
{
    public function login()
    {
        $json = $this->request->getJSON();
        $username = $json->username;
        $password = $json->password;
        $role = $json->role;

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->where('role', $role)->first();

        if (!$user || $password !== $user['password']) {
            return $this->failUnauthorized('Username, password, atau role salah');
        }

        // Simpan session login
        session()->set([
            'id_user' => $user['id_user'],
            'username' => $user['username'],
            'role' => $user['role'],
            'logged_in' => true
        ]);

        return $this->respond([
            'message' => 'Login berhasil',
            'user' => [
                'id_user' => $user['id_user'],
                'username' => $user['username'],
                'role' => $user['role']
            ]
        ]);
    }

    public function logout()
    {
        session()->destroy();
        return $this->respond(['message' => 'Logout berhasil']);
    }
}
