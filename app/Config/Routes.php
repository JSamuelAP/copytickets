<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login/', 'Auth::login');
$routes->get('signup/', 'Auth::signup');
$routes->get('pruebalogin/', 'Auth::pruebalogin');

$routes->post('Crud_User/contInsert_User', 'Crud_User::contInsert_User');
$routes->post('Crud_User/ValidandoDatos', 'Crud_User::ValidandoDatos');

