<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');


// rutas de plataforma
$routes->get('/plataforma', 'Plataforma::index');
// rutas de categoria
$routes->get('/cat-ingreso', 'Categoria::ingreso');
$routes->get('/cat-egreso', 'Categoria::egreso');
// rutas de transaccion
$routes->get('/tran-ingreso', 'Transaccion::ingreso');
$routes->get('/tran-egreso', 'Transaccion::egreso');
$routes->get('/tran-aporte', 'Transaccion::aporte');
// rutas de reporte
$routes->get('/rep-general', 'Reporte::general');
$routes->get('/rep-mensual', 'Reporte::mensual');
$routes->get('/rep-mensualidad', 'Reporte::mensualidad');
// rutas de consulta
$routes->get('/cons-aporte', 'Consulta::aporte');
$routes->get('/cons-recibo', 'Consulta::recibo');
// rutas de usuario
$routes->get('/us-admin', 'Usuario::administrador');
$routes->get('/us-estudiante', 'Usuario::estudiante');