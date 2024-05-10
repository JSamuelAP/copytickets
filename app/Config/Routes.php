<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Ruta para vistas
$routes->get('/', 'Crud_Eventos::contMostrar_Eventos');
$routes->get('eventos/(:num)', 'Crud_Eventos::contMostrar_Evento/$1');
$routes->get('eventos/(:num)/estadisticas', 'Crud_Eventos::contMostrar_estadisticas/$1');
$routes->get('eventos/crear', 'Crud_Eventos::contMostrar_crear');

$routes->get('login/', 'Auth::login');
$routes->get('signup/', 'Auth::signup');
$routes->get('organizador/perfil/', 'Crud_User::organizador_perfil');

$routes->get('compras/', 'Ventas::index');
$routes->get('boleto/(:num)', 'Ventas::boleto/$1');

//Rutas para los datos
$routes->post('Crud_User/contInsert_User', 'Crud_User::contInsert_User');
$routes->post('Crud_User/ValidandoDatos', 'Crud_User::ValidandoDatos');