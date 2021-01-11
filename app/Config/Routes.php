<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
date_default_timezone_set('Europe/Bucharest');
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login', 'Login::index', ['filter' => 'noauth']);
$routes->post('login', 'Login::login', ['filter' => 'noauth']);
$routes->get('logout', 'Login::logout', ['filter' => 'auth']);

$routes->get('dashboard', 'Dashboard::index', ['filter' => 'admin']);

$routes->get('dashboard/users/all', 'Users::index', ['filter' => 'admin']);
$routes->get('dashboard/users/new', 'Users::create', ['filter' => 'admin']);
$routes->post('dashboard/users/new', 'Users::create', ['filter' => 'admin']);
$routes->get('dashboard/users/edit/(:num)', 'Users::edit/$1', ['filter' => 'admin']);
$routes->post('dashboard/users/edit/(:num)', 'Users::edit/$1', ['filter' => 'admin']);
$routes->get('dashboard/users/delete/(:num)', 'Users::delete/$1', ['filter' => 'admin']);
$routes->post('dashboard/users/delete/(:num)', 'Users::delete/$1', ['filter' => 'admin']);

$routes->get('dashboard/groups/all', 'Groups::index', ['filter' => 'admin']);
$routes->get('dashboard/groups/new', 'Groups::create', ['filter' => 'admin']);
$routes->post('dashboard/groups/new', 'Groups::create', ['filter' => 'admin']);
$routes->get('dashboard/groups/edit/(:num)', 'Groups::edit/$1', ['filter' => 'admin']);
$routes->post('dashboard/groups/edit/(:num)', 'Groups::edit/$1', ['filter' => 'admin']);
$routes->get('dashboard/groups/delete/(:num)', 'Groups::delete/$1', ['filter' => 'admin']);
$routes->post('dashboard/groups/delete/(:num)', 'Groups::delete/$1', ['filter' => 'admin']);

$routes->get('quizzes', 'Quiz::index', ['filter' => 'auth']);
$routes->get('quizzes/(:num)', 'Quiz::view/$1', ['filter' => 'auth']);
$routes->get('quiz/(:num)/answer', 'Quiz::answer/$1', ['filter' => 'auth']);
$routes->post('quiz/(:num)/answer', 'Quiz::answer/$1', ['filter' => 'auth']);
$routes->get('dashboard/quizzes/all', 'Quiz::all', ['filter' => 'teacher']);
$routes->get('dashboard/quizzes/passed', 'Quiz::passed', ['filter' => 'teacher']);
$routes->get('dashboard/quizzes/new/1', 'Quiz::create_1', ['filter' => 'teacher']);
$routes->post('dashboard/quizzes/new/1', 'Quiz::create_1', ['filter' => 'teacher']);
$routes->get('dashboard/quizzes/new/2', 'Quiz::create_2', ['filter' => 'teacher']);
$routes->post('dashboard/quizzes/new/2', 'Quiz::create_2', ['filter' => 'teacher']);
$routes->get('dashboard/quizzes/delete/(:num)', 'Quiz::delete/$1', ['filter' => 'admin']);
$routes->post('dashboard/quizzes/delete/(:num)', 'Quiz::delete/$1', ['filter' => 'admin']);



/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
