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
$routes->get('product/search', 'ProductController::filterName');
$routes->put('product/(:num)', 'ProductController::updateProduct/$1');
$routes->delete('product/(:num)', 'ProductController::deleteProduct/$1');



// Rotas order
$routes->post('order', 'OrderController::createOrder');
$routes->get('order', 'OrderController::readOrder');
$routes->get('order/(:num)', 'OrderController::showId/$1');
$routes->get('order/search', 'OrderController::filterStatus');
$routes->put('order/(:num)', 'OrderController::updateOrder/$1');
$routes->delete('order/(:num)', 'OrderController::deleteOrder/$1');



// Rotas client
$routes->post('cliente', 'ClienteController::createClient');
$routes->get('cliente', 'ClienteController::readClient');
$routes->get('cliente', 'ClienteController::page');
$routes->get('cliente/(:num)', 'ClienteController::showId/$1');
$routes->get('cliente/showOrdersByClientId/(:num)', 'ClienteController::showOrdersByClientId/$1');
$routes->get('cliente/search', 'ClienteController::filterName');
$routes->get('cliente/paginated', 'ClienteController::paginated');
$routes->put('cliente/(:num)', 'ClienteController::updateClient/$1');
$routes->delete('cliente/(:num)', 'ClienteController::deleteClient/$1');


// Não está funcionado.
// $routes->resource('product');
// $routes->resource('order');
// $routes->resource('client');