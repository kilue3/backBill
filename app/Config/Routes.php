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
$routes->post('/Storelogin', 'Login::Storelogin');
//manage user//////////
$routes->get('/allusers', 'Users::index');
$routes->get('/allnormaluser', 'Users::allnormaluser');
$routes->get('/infouser/(:any)', 'Users::finduser/$1');
$routes->delete('/delectuser/(:any)', 'Users::Delect_User/$1');
$routes->put('/repassword/(:any)', 'Users::Resetpass/$1');
$routes->post('/addusers', 'Users::Adduser');
//////////////bill//////////////////////
$routes->get('opbilldateshow', 'Bill::index');///show day in input
$routes->post('Billinmonth', 'Billinmonth::index');
// $routes->post('/opbill', 'Bill::openbill');
$routes->post('/checkdate', 'Bill::checkDate');
$routes->put('/updateEndbill', 'Bill::updateEndbill'); 
$routes->get('/selecttoday', 'Bill::selectToday');///show day in input
$routes->post('/addbill', 'Bill::Addbill');
$routes->get('/billlistative/(:any)', 'Bill::Billative/$1');///show day in input
$routes->get('/billid/(:any)', 'Bill::findBillop/$1');//bill_detailpage
$routes->put('/editamountbill/(:any)', 'Bill::Editamount/$1');//edit_amount
$routes->put('/editdetailbill/(:any)', 'Bill::Editdetail/$1');//edit_amount
$routes->post('/addfile/(:any)', 'Bill::Addfile/$1');
$routes->get('/listfile/(:any)', 'Bill::Listfile/$1');//bill_detailpage
$routes->delete('/Delectfile/(:any)', 'Bill::Delect_file/$1');
$routes->delete('/Delectbills/(:any)', 'Bill::Delect_bills/$1');
$routes->post('/movefiles/(:any)', 'Bill::Movefile/$1');
$routes->post('/sentapprove/(:any)', 'Bill::sendApprove/$1');
$routes->post('/approve/(:any)', 'Bill::Approve/$1');
$routes->get('/billpasslist', 'Bill::Billpasslist');
$routes->get('/billhistory/(:any)', 'Bill::Billhistory/$1');
$routes->get('/findcmbill/(:any)', 'Bill::findCmbill/$1');//bill_detailpage
$routes->get('/billlist', 'Bill::Billlist');//bill_detailpage
$routes->get('/monthyearlist', 'Bill::Monthyearlist');//
$routes->post('/billbymonthyearlist', 'Bill::Billbymonthyearlist');//
$routes->get('/searchIDbill/(:any)', 'Bill::searchIDbill/$1');//
$routes->get('/searchIDbillnotpass/(:any)', 'Bill::searchIDbillnotpass/$1');//

$routes->get('/searchIDbillwait/(:any)', 'Bill::searchIDbillwait/$1');//
$routes->get('/Monthlist/(:any)', 'Bill::Monthlist/$1');//
$routes->get('/Billpassyearlist/(:any)', 'Bill::Billpassyearlist/$1');//
$routes->get('/Billnotpasslist', 'Bill::Billnotpasslist');//
///////////////////Store///////////////////////
$routes->get('/storelist', 'Store::index');
$routes->get('/findstore/(:any)', 'Store::findstore/$1');
$routes->delete('/delectstore/(:any)', 'Store::Delect_store/$1');
$routes->put('/Resetpassstore/(:any)', 'Store::Resetpass/$1'); 
$routes->post('/addStore', 'Store::AddStore'); 
$routes->get('/CheckStore/(:any)', 'Store::CheckStore/$1');//
$routes->get('/searchNameStore/(:any)', 'Store::searchNameStore/$1');//


$routes->get('/export', 'ExcelExport::index');



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
