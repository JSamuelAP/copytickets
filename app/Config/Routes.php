<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Ruta para vistas
$routes->get('/', 'Crud_Eventos::contMostrar_Eventos');
$routes->get('eventos/(:num)', 'Crud_Eventos::contMostrar_Evento/$1');
$routes->get(
  'eventos/(:num)/estadisticas',
  'Crud_Eventos::contMostrar_estadisticas/$1'
);
$routes->get('eventos/crear', 'Crud_Eventos::contMostrar_crear');
$routes->get(
  'eventos/(:num)/editar',
  'Crud_Eventos::contMostrar_editar/$1'
);

$routes->get('login/', 'Auth::login');
$routes->get('signup/', 'Auth::signup');
$routes->get(
  'organizador/perfil/(:num)',
  'Crud_User::organizador_perfil/$1'
);
$routes->get('DestruirSesion', 'Crud_User::DestruirSesion');

$routes->get('compras/(:num)', 'Ventas::index/$1');
$routes->get('boletos/(:num)', 'Ventas::boleto/$1');

$routes->get('descargar/(:num)/boletos', 'Ventas::boletoPDF/$1');

//Rutas para los datos
$routes->post(
  'Crud_User/contInsert_User',
  'Crud_User::contInsert_User'
);
$routes->post('Crud_User/ValidandoDatos', 'Crud_User::ValidandoDatos');

$routes->post('eventos/generar', 'Crud_Eventos::contGenerate_Eventos');

$routes->post('escaner/login', 'Escaner::login');
$routes->put('escaner/escanear/(:num)', 'Escaner::escanear/$1');

$routes->post('Actualizar/(:num)/evento', 'Crud_Eventos::contEdit_Eventos/$1');

$routes->post('pagar/boleto', 'Ventas::pagarBoleto');