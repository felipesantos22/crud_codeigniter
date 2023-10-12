<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// $routes->resource('/user');
$routes->get('/', 'Home::index');

// Rotas user
$routes->post('user', 'ProductController::createProduct');
$routes->get('user', 'ProductController::readProduct');
$routes->get('user/(:num)', 'ProductController::showId/$1');
$routes->put('user/(:num)', 'ProductController::updateProduct/$1');
$routes->delete('user/(:num)', 'ProductController::deleteProduct/$1');
