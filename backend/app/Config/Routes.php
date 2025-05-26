<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->resource('mahasiswa', ['controller' => 'MahasiswaController']);
$routes->resource('dosen', ['controller' => 'DosenController']);
$routes->resource('sidang', ['controller' => 'SidangController']);
$routes->resource('hasil_sidang', ['controller' => 'HasilSidangController']);
$routes->resource('notifikasi', ['controller' => 'NotifikasiController']);
$routes->resource('user', ['controller' => 'UserController']);
$routes->resource('view_jadwalsidang', ['controller' => 'ViewJadwalSidangController']);
$routes->resource('view_nilaimahasiswa', ['controller' => 'ViewNilaiMahasiswaController']);
$routes->post('login', 'LoginController::login');
$routes->get('logout', 'LoginController::logout');