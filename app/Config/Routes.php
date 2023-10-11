<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// $routes->resource('/user');
$routes->get('/', 'Home::index');
$routes->post('user', 'User::createUser');
$routes->get('user', 'User::readUser');
$routes->get('user/(:num)', 'User::showId/$1');
$routes->put('user', 'User::updateUser');