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

$routes->post('student/courses/enroll-bulk', 'Student\Courses::enrollBulk', ['filter' => 'auth:student']);

// =======================
// PROFILE ROUTES
// =======================
$routes->get('profile/password', 'Profile::passwordForm', ['filter' => 'auth']);
$routes->post('profile/password', 'Profile::updatePassword', ['filter' => 'auth']);

// =======================
// DEV-ONLY ROUTE (HAPUS SAAT PRODUCTION)
// =======================
$routes->get('dev/reset-password', function() {
    $request = service('request');
    $email = $request->getGet('email');

    if (!$email) {
        echo "<h3>Email harus diberikan. Contoh:</h3>";
        echo "<code>/dev/reset-password?email=rina@polban.com</code>";
        return;
    }

    $userModel = new \App\Models\UserModel();
    $user = $userModel->where('email', $email)->first();

    if ($user) {
        $userModel->update($user['id'], [
            'password' => password_hash('123456', PASSWORD_DEFAULT)
        ]);
        echo "<h3>Password untuk <b>{$email}</b> berhasil direset ✅</h3>";
        echo "<p>Gunakan password <b>123456</b> untuk login.</p>";
    } else {
        echo "<h3>User dengan email <b>{$email}</b> tidak ditemukan ❌</h3>";
    }
});
