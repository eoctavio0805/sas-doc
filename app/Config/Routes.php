<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//Inicio de sesión

//Inicio del SAS-DOC
$routes->get('/', 'Usuarios::index', ['filter' => 'noauth']);

//Bandeja de documentos
$routes->add('ir_a_bandeja', 'DocumentoSeguimiento::index',  ['filter' => 'auth']);
$routes->post('filtrar_bandeja_por_criterio', 'DocumentoSeguimiento::filtrarDocumentos');
$routes->add('filtrar_bandeja_por_estatus/(:num)', 'DocumentoSeguimiento::filtrarBandejaPorEstatus/$1');
$routes->add('ir_a_grafica', 'DocumentoSeguimiento::cargarEstadistica',  ['filter' => 'auth']);

//Listado de documentos historico
$routes->add('ir_a_listado', 'DocumentoDetalle::index',  ['filter' => 'auth']);
$routes->post('mostrar_listado_historico', 'DocumentoDetalle::llenarTablaHistorica');

//Generación de documentos generados y recibidos

$routes->add('nuevo_documento_generado', 'DocumentoGenerado::index', ['filter' => 'auth']);
$routes->add('nuevo_documento_recibido', 'DocumentoRecibido::index', ['filter' => 'auth']);
$routes->post('crear_documento_generado', 'DocumentoGenerado::crear');
$routes->post('registrar_documento_recibido', 'DocumentoRecibido::crear');

//Administración de usuarios

$routes->post('cargar_usuarios', 'Usuarios::getUsuarios');
$routes->get('buscar_usuario/(:num)', 'Usuarios::buscarUsuario/$1');
$routes->post('restablecer_tipos_usuarios', 'DocumentoGenerado::reiniciarTiposUsuarios');
$routes->get('logout', 'Usuarios::logout');

//Seguimiento notas-documentos
$routes->add('ver_notas/(:num)/(:num)', 'Notas::verNotasPorDocumento/$1/$2', ['filter' => 'auth']);
$routes->post('asignar_documento', 'Notas::asignarDocumento');
$routes->post('respuesta_documento', 'Notas::respuestaDocumento');

//Seguimiento documento
$routes->add('actualiza_estatus/(:num)/(:num)', 'DocumentoSeguimiento::actualizaEstatus/$1/$2');
$routes->add('ver_documento/(:num)', 'DocumentoSeguimiento::verDocumento/$1', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
