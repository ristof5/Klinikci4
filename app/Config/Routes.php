<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AuthController::index');
$routes->post('/cek_login', 'AuthController::cek_login');
$routes->get('/register', 'AuthController::register');
$routes->post('/tambah_user', 'AuthController::tambah_user');
$routes->get('/input', 'AuthController::logout');



$routes->get('/home', 'HomeController::index',['filter' => 'authFilter'] );

//data user
$routes->get('user', 'UserController::index',['filter' => 'authFilter'] );
$routes->add('user/store', 'UserController::store',['filter' => 'authFilter'] );
$routes->add('user/(:segment)/edit', 'UserController::edit/$1',['filter' => 'authFilter'] );
$routes->get('user/(:segment)/destroy', 'UserController::destroy/$1',['filter' => 'authFilter'] );
//data obat
$routes->get('obat', 'ObatController::index',['filter' => 'authFilter'] );
$routes->add('obat/store', 'ObatController::store',['filter' => 'authFilter'] );
$routes->add('obat/(:segment)/edit', 'ObatController::edit/$1',['filter' => 'authFilter'] );
$routes->get('obat/(:segment)/destroy', 'ObatController::destroy/$1',['filter' => 'authFilter'] );
//data customer
$routes->get('customer', 'UserController::customer',['filter' => 'authFilter'] );
//data ptransaksi(Customer)
$routes->get('pendaftaran', 'PendaftaranController::index',['filter' => 'authFilter'] );
$routes->get('pendaftaran/add', 'PendaftaranController::add',['filter' => 'authFilter'] );
$routes->add('pendaftaran/store', 'PendaftaranController::store',['filter' => 'authFilter'] );

//data pendaftaran (kasir)
$routes->get('pendaftaran/kasir', 'PendaftaranController::kasir',['filter' => 'authFilter'] );
$routes->get('pendaftaran/generate', 'PdfController::generate',['filter' => 'authFilter'] );
$routes->add('pendaftaran/(:segment)/proses', 'PendaftaranController::proses/$1',['filter' => 'authFilter'] );
$routes->add('pendaftaran/(:segment)/tolak', 'PendaftaranController::tolak/$1',['filter' => 'authFilter'] );
//data Transaksi(Dokter)
$routes->get('transaksi', 'TransaksiController::index',['filter' => 'authFilter'] );
$routes->get('transaksi/add', 'TransaksiController::add',['filter' => 'authFilter'] );
$routes->add('transaksi/store', 'TransaksiController::store',['filter' => 'authFilter'] );

$routes->get('/', 'PdfController::index',['filter' => 'authFilter'] );
$routes->get('Pdf/generate', 'PdfController::generate',['filter' => 'authFilter'] );


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
