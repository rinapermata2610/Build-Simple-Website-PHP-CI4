<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route default
$routes->get('/', 'Home::index');

// Route custom sederhana
$routes->get('/halo', function () {
    return "Halo, ini halaman dari routing CI4!";
});

// Route ke Controller
$routes->get('/profile', 'Profile::index');
$routes->get('/hello', 'Hello::index');
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->get('/mahasiswa-loop', 'MahasiswaLoop::index');
//$routes->get('/mahasiswa-sql', 'MahasiswaController::index');
$routes->get('/mahasiswa-sql', 'MahasiswaSQL::index');
$routes->get('/mahasiswa-sql/detail/(:num)', 'MahasiswaSQL::detail/$1');
$routes->get('/mahasiswa-sql', 'MahasiswaSQL::index');
$routes->get('/mahasiswa-sql/create', 'MahasiswaSQL::create');
$routes->post('/mahasiswa-sql/store', 'MahasiswaSQL::store');
$routes->get('/mahasiswa-sql/edit/(:num)', 'MahasiswaSQL::edit/$1');
$routes->post('/mahasiswa-sql/update/(:num)', 'MahasiswaSQL::update/$1');
$routes->get('/mahasiswa-sql/delete/(:num)', 'MahasiswaSQL::delete/$1');

// Route dengan parameter (misal: /user/21)
$routes->get('/user/(:num)', 'User::detail/$1');
