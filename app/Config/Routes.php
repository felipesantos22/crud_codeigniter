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
$routes->post('client', 'ClientController::createClient');
$routes->get('client', 'ClientController::readClient');
$routes->get('client', 'ClientController::page');
$routes->get('client/(:num)', 'ClientController::showId/$1');
$routes->get('client/showOrdersByClientId/(:num)', 'ClientController::showOrdersByClientId/$1');
$routes->get('client/search', 'ClientController::filterName');
$routes->get('client/paginated', 'ClientController::paginated');
$routes->put('client/(:num)', 'ClientController::updateClient/$1');
$routes->delete('client/(:num)', 'ClientController::deleteClient/$1');


// Rotas PedidoProdutos
$routes->post('pedidoproduto', 'PedidoProdutoController::createOrderProduct');
$routes->get('order/pedidoComProdutos/(:num)', 'PedidoProdutoController::pedidoComProdutos/$1');
$routes->get('product/produtosComPedidos/(:num)', 'PedidoProdutoController::produtosComPedidos/$1');

// $routes->resource('product');
// $routes->resource('order');
// $routes->resource('client');