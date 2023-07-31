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
$routes->setDefaultController('Page');
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
$routes->get('/', 'Page::home');
$routes->get('/index', 'Page::index');
$routes->get('/home', 'Page::home');
$routes->get('/submit', 'Page::submit');
$routes->get('/guide', 'Page::guide');
$routes->get('/manage-stories', 'Page::manageStories');
$routes->get('/manage-stories/awaiting-review', 'Page::manageStoriesAwaitingReview');
$routes->get('/story-edit/(:any)', 'Page::storyEdit/$1');
$routes->get('/story/(:any)', 'Page::storyView/$1');
$routes->get('/login', 'Page::login');

// Ajax Calls
$routes->group("ajax", function ($routes) {
    $routes->post('story-submit', 'Ajax::storySubmit');
    $routes->post('story-load', 'Ajax::storyLoad');
    $routes->post('story-index-load', 'Ajax::storyIndexLoad');
    $routes->post('story-change-visibility', 'Ajax::storyChangeVisibility');
    $routes->post('story-delete', 'Ajax::storyDelete');
    $routes->post('story-change-publish', 'Ajax::storyChangePublish');
    $routes->post('story-publish', 'Ajax::storyPublish');
    $routes->post('story-upvote', 'Ajax::storyUpvote');
    $routes->post('login', 'Ajax::login');
});

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

