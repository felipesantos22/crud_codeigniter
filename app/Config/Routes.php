<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// $routes->resource('/user');
$routes->get('/', 'Home::index');

// Rotas product
$routes->post('product', 'ProductController::createProduct');
$routes->get('product', 'ProductController::readProduct');
$routes->get('product/(:num)', 'ProductController::showId/$1');
$routes->put('product/(:num)', 'ProductController::updateProduct/$1');
$routes->delete('product/(:num)', 'ProductController::deleteProduct/$1');

// Rotas order
$routes->post('order', 'OrderController::createOrder');
$routes->get('order', 'OrderController::readOrder');
$routes->get('order/(:num)', 'OrderController::showId/$1');
$routes->put('order/(:num)', 'OrderController::updateOrder/$1');
$routes->delete('order/(:num)', 'OrderController::deleteOrder/$1');

// Rotas client
$routes->post('client', 'ClientController::createClient');
$routes->get('client', 'ClientController::readClient');
$routes->get('client/(:num)', 'ClientController::showId/$1');
$routes->put('client/(:num)', 'ClientController::updateClient/$1');
$routes->delete('client/(:num)', 'ClientController::deleteClient/$1');

// $routes->resource('product');
// $routes->resource('order');
// $routes->resource('client');