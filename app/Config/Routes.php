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

$routes->get('paypal/pay', 'PaypalController::createPayment');
$routes->get('paypal/success', 'PaypalController::success');
$routes->get('paypal/cancel', 'PaypalController::cancel');