<?php

use CodeIgniter\Router\RouteCollection;

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/', 'Home::consulta');
$routes->post('/', 'Email::index');


//definimos ruta para eliminar registos de contacto
$routes->get('/deleteContact', 'Contacto::deleteContacto');
//definimos ruta para eliminar registos de directorio
$routes->get('/deleteDirect', 'Directorio::deleteDirectorio');
