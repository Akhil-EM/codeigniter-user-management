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
$routes->setDefaultController('Home');
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
$routes->get('/', 'Home::index', ['filter' => 'authFilter']);

$routes->add('/add-user', 'Home::addUser',['get','post']);
$routes->get('/lock-screen', 'Home::lockScreen');
$routes->get('/profile', 'Home::profile');
$routes->get('/profile-edit', 'Home::profileEdit');
$routes->get('/user-list', 'Home::userList');
$routes->add('/edit-user/(:segment)', 'Home::editUser/$1',['get','post']);
$routes->post('/sign-out', 'Home::signOut',['filter' => 'authFilter']);
$routes->get('/delete-user/(:segment)', 'Home::deleteUser/$1');
$routes->add('/sign-in', 'Home::signIn',['get','post']);
// $routes->add('/validation', 'Validation::index', ['get', 'post']);

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
