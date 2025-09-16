<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// Mahasiswa CRUD
$routes->get('mahasiswa', 'Mahasiswa::index');
$routes->get('mahasiswa/create', 'Mahasiswa::create');
$routes->post('mahasiswa/store', 'Mahasiswa::store');
$routes->get('mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
$routes->post('mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
$routes->get('mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');
$routes->get('mahasiswa/(:num)', 'Mahasiswa::show/$1');

// Auth
$routes->get('auth', 'Auth::index');         
$routes->post('auth/login', 'Auth::login');  
$routes->get('auth/logout', 'Auth::logout'); 