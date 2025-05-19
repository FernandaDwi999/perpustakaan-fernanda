<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Jadikan /books sebagai halaman default
$routes->get('/', 'BookController::index');


// Routing Buku (Halaman Utama)
$routes->get('books', 'BookController::index');
$routes->get('books/create', 'BookController::create');
$routes->post('books/store', 'BookController::store');
$routes->get('books/edit/(:num)', 'BookController::edit/$1');
$routes->post('books/update/(:num)', 'BookController::update/$1');
$routes->get('books/delete/(:num)', 'BookController::delete/$1');

// Routing Kategori
$routes->get('categories', 'CategoryController::index');
$routes->get('categories/create', 'CategoryController::create');
$routes->post('categories/store', 'CategoryController::store');
$routes->get('categories/edit/(:num)', 'CategoryController::edit/$1');
$routes->post('categories/update/(:num)', 'CategoryController::update/$1');
$routes->get('categories/delete/(:num)', 'CategoryController::delete/$1');

// Routing Pengguna (Manajemen User)
$routes->get('users', 'UserController::index');
$routes->get('users/create', 'UserController::create');
$routes->post('users/store', 'UserController::store');
$routes->get('users/edit/(:num)', 'UserController::edit/$1');
$routes->post('users/update/(:num)', 'UserController::update/$1');
$routes->get('users/delete/(:num)', 'UserController::delete/$1');

// Duplikat tidak dibutuhkan, hapus saja jika tidak digunakan
// $routes->get('/users/edit/(:num)', 'UserController::edit/$1');
// $routes->post('/users/update/(:num)', 'UserController::update/$1');
// $routes->post('/users/delete/(:num)', 'UserController::delete/$1');

$routes->get('dashboard', 'Dashboard::index'); // Mengakses dashboard di /dashboard