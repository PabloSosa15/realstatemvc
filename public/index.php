<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\PropertyControllers;
use Controllers\SellerController;
use Controllers\PagesControllers;

$router = new Router();

// Private Zone
$router->get('/admin',[PropertyControllers::class, 'index']);
$router->get('/properties/create', [PropertyControllers::class, 'create']);
$router->post('/properties/create', [PropertyControllers::class, 'create']);
$router->get('/properties/update', [PropertyControllers::class, 'update']);
$router->post('/properties/update', [PropertyControllers::class, 'update']);
$router->post('/properties/delete', [PropertyControllers::class, 'delete']);

$router->get('/sellers/create', [SellerController::class, 'create']);
$router->post('/sellers/create', [SellerController::class, 'create']);
$router->get('/sellers/update', [SellerController::class, 'update']);
$router->post('/sellers/update', [SellerController::class, 'update']);
$router->post('/sellers/delete', [SellerController::class, 'delete']);

//Public Zone
$router->get('/', [PagesControllers::class, 'index']);
$router->get('/us', [PagesControllers::class, 'us']);
$router->get('/properties', [PagesControllers::class, 'properties']);
$router->get('/property', [PagesControllers::class, 'property']);
$router->get('/blog', [PagesControllers::class, 'blog']);
$router->get('/entrance', [PagesControllers::class, 'entrance']);
$router->get('/contact', [PagesControllers::class, 'contact']);
$router->post('/contact', [PagesControllers::class, 'contact']);

//Login and authentication
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);


$router->checkurls();