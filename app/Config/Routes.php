<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */


//register
$routes->post('/registeruser', 'RegisterUser::create');
//login
$routes->post('/Login', 'Login::index');
$routes->post('/Resetpass', 'Login::Resetpass');
$routes->get('/alldata', 'Login::selectall');



//manage user//////////
$routes->get('/allusers', 'Users::index');
$routes->get('/infouser/(:any)', 'Users::finduser/$1');
$routes->delete('/delectuser/(:any)', 'Users::Delect_User/$1');
$routes->put('/repassword/(:any)', 'Users::Resetpass/$1');
$routes->post('/addusers', 'Users::Adduser');
//////////////bill//////////////////////
$routes->get('opbilldateshow', 'Bill::index');///show day in input
// $routes->post('/opbill', 'Bill::openbill');
$routes->post('/checkdate', 'Bill::checkDate');
$routes->put('/updateEndbill', 'Bill::updateEndbill'); 

///////////////////Store///////////////////////
$routes->get('/storelist', 'Store::index');
$routes->get('/findstore/(:any)', 'Store::findstore/$1');
$routes->delete('/delectstore/(:any)', 'Store::Delect_store/$1');
$routes->put('/Resetpassstore/(:any)', 'Store::Resetpass/$1'); 
$routes->post('/addStore', 'Store::AddStore'); 



/*$routes->get('/findstore/(:any)', 'Store::findstore/$1');

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
