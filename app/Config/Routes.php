<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->get('/home', 'Home::home');
$routes->get('/', 'Home::index');
$routes->get('/masuk', 'Home::index');

$routes->get('/karyawan', 'User::index');

$routes->get('/paket', 'Paket::index');
$routes->get('/paket/create', 'Paket::create');
$routes->get('/paket/update/(:num)', 'Paket::update/$1');
$routes->get('/paket/delete/(:num)', 'Paket::delete/$1');
$routes->get('/paket/save/(:num)', 'Paket::save/$1');
$routes->get('/paket/detail/(:num)', 'Paket::detail/$1');
$routes->get('/paket/updatedata/(:num)', 'Paket::updatedata/$1');
$routes->get('/paket/sendsms/(:num)', 'Paket::sendsms/$1');
$routes->get('/paketselect', 'Paket::selectpaket');


$routes->get('/selectpaket', 'Ttd::selectpaket');
$routes->get('/user/save/(:num)', 'Paket::save/$1');
$routes->get('/user/updateuser/(:num)', 'Paket::updateuser/$1');
$routes->get('/karyawan/create', 'User::create');
$routes->get('/user/logout', 'User::logout');
$routes->get('/user/login', 'User::login');
$routes->get('/user/profile/(:num)', 'User::profile/$1');
$routes->get('/user/update/(:num)', 'User::update/$1');



$routes->get('/seller', 'Seller::index');
$routes->get('/seller/create', 'Seller::create');
$routes->get('/seller/update/(:num)', 'Seller::update/$1');
$routes->get('/seller/delete/(:num)', 'Seller::delete/$1');
$routes->get('/seller/save/(:num)', 'Seller::save/$1');


$routes->get('/ttd', 'Ttd::index');
$routes->get('/ttd/create', 'Ttd::create');
$routes->get('/ttd/update/(:num)', 'Ttd::update/$1');
$routes->get('/ttd/delete/(:num)', 'Ttd::delete/$1');
$routes->get('/ttd/save/(:num)', 'Ttd::save/$1');


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
