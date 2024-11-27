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
// app/config/Routes.php
$routes->get('test-db', 'TestController::testDatabaseConnection');
$routes->get('api/users', 'AdminController::viewAllUsers');
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Users routes (show and fetch users)
$routes->get('users', 'UserController::index');
$routes->get('users/show/(:num)', 'UserController::show/$1');

// Admin routes for managing users (only delete and update users by admin)
$routes->delete('api/admin/users/(:num)', 'AdminController::deleteUser/$1');
$routes->put('api/admin/users/(:num)', 'AdminController::updateUser/$1');
$routes->get('api/users', 'AdminController::viewAllUsers');

// Ensure this route is pointing to AdminController for delete
$routes->delete('users/(:num)', 'AdminController::deleteUser/$1');




$routes->get('wastelog', 'WasteLogController::index');
$routes->get('wastelog/show/(:num)', 'WasteLogController::show/$1');
$routes->post('login', 'UserController::userLogin', ['filter' => 'cors']);
$routes->post('addWasteLog', 'WasteLogController::addWasteLog');

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
