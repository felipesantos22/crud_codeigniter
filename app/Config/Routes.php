<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// $routes->resource('/user');
$routes->get('/', 'Home::index');

// Rotas user
$routes->post('user', 'User::createUser');
$routes->get('user', 'User::readUser');
$routes->get('user/(:num)', 'User::showId/$1');
$routes->put('user/(:num)', 'User::updateUser/$1');
$routes->delete('user/(:num)', 'User::deleteUser/$1');
