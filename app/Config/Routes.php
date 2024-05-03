<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Crud_Eventos::contMostrar_Eventos');
$routes->get('login/', 'Auth::login');
$routes->get('signup/', 'Auth::signup');
