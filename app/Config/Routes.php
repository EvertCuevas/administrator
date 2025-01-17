<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home', 'Home::index');
$routes->post('/home', 'Home::index');

$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');

$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');

// rutas de plataforma
$routes->get('/plataforma', 'Plataforma::index');

// rutas de categoria
$routes->get('/cat-ingreso', 'Categoria::ingreso');
$routes->get('/cat-egreso', 'Categoria::egreso');
$routes->post('/cat_registro', 'Categoria::registro_categoria');
$routes->post('/cat_asi_registro', 'Categoria::registro_asiento');
$routes->post('/cat-list-siento', 'Categoria::lista_asiento');


// rutas de transaccion
$routes->get('/tran-ingreso', 'Transaccion::ingreso');
$routes->get('/tran-egreso', 'Transaccion::egreso');
$routes->get('/tran-aporte', 'Transaccion::aporte');
$routes->post('/tran-reg-ingreso', 'Transaccion::registro_ingreso');
$routes->post('/tran-reg-egreso', 'Transaccion::registro_egreso');
$routes->post('/tran-reg-aporte', 'Transaccion::registro_aporte');
$routes->get('/pago_aporte/(:num)', 'Transaccion::pago_aporte/$1');

// rutas de estudiante
$routes->get('/tran-list-estudiante', 'Estudiante::lista_busqueda');
$routes->post('/tran-reg-estudiante', 'Estudiante::registro_estudiante');


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
// rutas de reportes
$routes->get('/reporte_recibo/(:num)/(:num)', 'Reporte::reporte_recibo/$1/$2');
