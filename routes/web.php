<?php

use App\Core\Router;
use App\Controllers\SuperAdminDashboardController;
use App\Controllers\AuthController;
use App\Controllers\RegisterController;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\RoleMiddleware;

// Contoh Penggunaan dengan banyak data
// Router::add(
//     'GET',
//     '/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)',
//     ProductController::class,
//     'categories'
// );
// Router::add('GET', '/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)', HomeController::class, 'categories', [AuthMiddleware::class]);

// Public Routes
Router::add('GET', '/login', AuthController::class, 'login');
Router::add('POST', '/login', AuthController::class, 'postLogin');
Router::add('GET', '/register', RegisterController::class, 'register');
Router::add('POST', '/register', RegisterController::class, 'postregister');
Router::add('GET', '/logout', AuthController::class, 'logout');


// Protected Routes (Butuh Login)
Router::add('GET', '/', AuthController::class, 'index', [AuthMiddleware::class, RoleMiddleware::class . ':Admin,SuperAdmin,Guru,Siswa']);
Router::add('GET', '/logout', AuthController::class, 'logout');
Router::add('GET', '/administrator/dashboard', SuperAdminDashboardController::class, 'index', [AuthMiddleware::class,  RoleMiddleware::class . ':SuperAdmin']);

Router::run();
