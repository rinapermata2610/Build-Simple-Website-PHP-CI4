<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route default
$routes->get('/', 'Home::index');

// Route custom sederhana
$routes->get('/halo', fn() => "Halo, ini halaman dari routing CI4!");

// Route ke Controller sederhana
$routes->get('/profile', 'Profile::index');
$routes->get('/hello', 'Hello::index');

// Mahasiswa (tanpa database)
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->get('/mahasiswa-loop', 'MahasiswaLoop::index');

// Mahasiswa (pakai database SQL)
$routes->group('mahasiswa-sql', function ($routes) {
    $routes->get('/', 'MahasiswaSQL::index');
    $routes->get('detail/(:num)', 'MahasiswaSQL::detail/$1');
    $routes->get('create', 'MahasiswaSQL::create');
    $routes->post('store', 'MahasiswaSQL::store');
    $routes->get('edit/(:num)', 'MahasiswaSQL::edit/$1');
    $routes->post('update/(:num)', 'MahasiswaSQL::update/$1');
    $routes->get('delete/(:num)', 'MahasiswaSQL::delete/$1');
});

// User
$routes->get('/user/(:num)', 'User::detail/$1');

// Auth (Login / Logout)
$routes->get('/login', 'Auth::login');     // tampilkan form login
$routes->post('/login', 'Auth::process');  // proses login
$routes->get('/logout', 'Auth::logout');   // logout user

// Validasi Form
$routes->get('/form', 'FormValidation::index');
$routes->post('/form/submit', 'FormValidation::submit');

// biar tidak duplikat, hapus ini kalau sudah ada group di atas
// $routes->get('/mahasiswa-sql', 'MahasiswaSQL::index');
