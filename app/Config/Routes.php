<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Crud_Eventos::contMostrar_Eventos');
$routes->get('eventos/(:num)', 'Crud_Eventos::contMostrar_Evento');

$routes->get('login/', 'Auth::login');
$routes->post('Crud_User/contInsert_User', 'Crud_User::contInsert_User');
$routes->post('Crud_User/ValidandoDatos', 'Crud_User::ValidandoDatos');
$routes->get('pruebalogin/', 'Auth::pruebalogin');
$routes->get('signup/', 'Auth::signup');

$routes->get('organizador/perfil', 'Crud_User::organizador_perfil');
