<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// User routes
$route['users/register'] = 'users/register';
$route['users/login'] = 'users/login';
$route['users/logout'] = 'users/logout';
$route['users'] = 'users/index';
$route['users/edit/(:num)'] = 'users/edit/$1';
$route['users/delete/(:num)'] = 'users/delete/$1';

// Hotel routes
$route['hotels'] = 'hotels/index';
$route['hotels/create'] = 'hotels/create';
$route['hotels/edit/(:num)'] = 'hotels/edit/$1';
$route['hotels/delete/(:num)'] = 'hotels/delete/$1';

// Room routes
$route['rooms'] = 'rooms/index';
$route['rooms/create'] = 'rooms/create';
$route['rooms/edit/(:num)'] = 'rooms/edit/$1';
$route['rooms/delete/(:num)'] = 'rooms/delete/$1';

// Booking routes
$route['bookings'] = 'bookings/index';
$route['bookings/my_bookings'] = 'bookings/my_bookings';
$route['bookings/create'] = 'bookings/create';
$route['bookings/edit/(:num)'] = 'bookings/edit/$1';
$route['bookings/delete/(:num)'] = 'bookings/delete/$1';

// Payment routes
$route['payments'] = 'payments/index';
$route['payments/create/(:num)'] = 'payments/create/$1';
$route['payments/delete/(:num)'] = 'payments/delete/$1';

// Review routes
$route['reviews'] = 'reviews/index';
$route['reviews/create'] = 'reviews/create';
$route['reviews/edit/(:num)'] = 'reviews/edit/$1';
$route['reviews/delete/(:num)'] = 'reviews/delete/$1';
