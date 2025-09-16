<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =======================
// AUTH ROUTES
// =======================
$routes->match(['get', 'post'], 'login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->match(['get', 'post'], 'register', 'Auth::register');

// =======================
// HOME ROUTE (Protected)
// =======================
$routes->get('/', 'Home::index', ['filter' => 'auth']);

// =======================
// ADMIN ROUTES (Hanya admin)
// =======================
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {

    // Dashboard Admin
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // -----------------------
    // CRUD Courses
    // -----------------------
    $routes->get('courses', 'Admin\Courses::index');
    $routes->get('courses/create', 'Admin\Courses::create');
    $routes->post('courses/store', 'Admin\Courses::store');
    $routes->get('courses/edit/(:num)', 'Admin\Courses::edit/$1');
    $routes->post('courses/update/(:num)', 'Admin\Courses::update/$1');
    $routes->get('courses/delete/(:num)', 'Admin\Courses::delete/$1');

    // -----------------------
    // CRUD Users (Mahasiswa)
    // -----------------------
    $routes->get('users', 'Admin\Users::index');
    $routes->get('users/create', 'Admin\Users::create');
    $routes->post('users/store', 'Admin\Users::store');
    $routes->get('users/edit/(:num)', 'Admin\Users::edit/$1');
    $routes->post('users/update/(:num)', 'Admin\Users::update/$1');
    $routes->get('users/delete/(:num)', 'Admin\Users::delete/$1');
});

// =======================
// STUDENT ROUTES (Hanya student)
// =======================
$routes->group('student', ['filter' => 'auth:student'], function ($routes) {

    // Dashboard Student
    $routes->get('dashboard', 'Student\Dashboard::index');

    // Lihat & Enroll Courses
    $routes->get('courses', 'Student\Courses::index');
    $routes->post('courses/enroll/(:num)', 'Student\Courses::enroll/$1');
});
