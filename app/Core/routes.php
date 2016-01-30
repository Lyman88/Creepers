<?php
/**
 * Routes - all standard routes are defined here.
 *
 * @author Ladislav Procháska
 * @version 2.2
 * @date updated Sept 19, 2015
 */

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/** Define routes. */
Router::any('admin', 'Controllers\Admin@index');
Router::any('admin/deleteUser/(:num)', 'Controllers\Admin@deleteUser');
Router::any('admin/addReviewer/(:num)', 'Controllers\Admin@addReviewer');
Router::any('admin/removeReviewer/(:num)', 'Controllers\Admin@removeReviewer');
Router::any('admin/setToReview/(:num)', 'Controllers\Admin@setToReview');
Router::any('admin/accept/(:num)', 'Controllers\Admin@accept');

Router::any('register', 'Controllers\Auth@register');
Router::any('login', 'Controllers\Auth@login');
Router::any('logout', 'Controllers\Auth@logout');

Router::any('tales', 'Controllers\Tales@index');
Router::any('tales/edit/(:num)', 'Controllers\Tales@edit');
Router::any('tales/delete/(:num)', 'Controllers\Tales@delete');
Router::any('tales/add', 'Controllers\Tales@add');
Router::any('tales/download/(:num)', 'Controllers\Tales@download');

Router::any('ratings', 'Controllers\Ratings@index');
Router::any('ratings/edit/(:num)', 'Controllers\Ratings@edit');

Router::any('accepted', 'Controllers\Tales@accepted');
Router::any('', 'Controllers\Home@index');

/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');

/** If no route found. */
Router::error('Core\Error@index');

/** Turn on old style routing. */
Router::$fallback = false;

/** Execute matched routes. */
Router::dispatch();
