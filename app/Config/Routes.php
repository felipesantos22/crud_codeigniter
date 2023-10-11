<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// $routes->resource('/user');
$routes->get('/', 'Home::index');
$routes->get('user', 'User::readUser');
$routes->post('user', 'User::createUser');