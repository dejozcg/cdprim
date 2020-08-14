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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'Login/login';
$route['logout'] = 'Login/logout';
$route['users'] = 'Users/index';
$route['kategorije'] = 'Kategorije/index';
$route['create/(:any)'] = 'Dashboard/createPDF/$1';
$route['prijava/(:any)'] = 'Dashboard/editPrijava/$1';
$route['deleteusr/(:any)'] = 'Users/delete/$1';
$route['deletekateg/(:any)'] = 'Kategorije/delete/$1';
$route['showusers/(:any)'] = 'Users/show/$1';
$route['editusers'] = 'Users/edit';
$route['createuesrs'] = 'Users/createusr';
$route['promijeniStat'] = 'Dashboard/promjenaStatusa';
$route['opstine'] = 'Kategorije/show_opstine';
$route['createopstina'] = 'Kategorije/createOpst';
$route['createkategorija'] = 'Kategorije/createkat';
$route['editprofile'] = 'Users/editprofile';
$route['showkategory/(:any)'] = 'Kategorije/showKat/$1';
$route['editkategory'] = 'Kategorije/editKat';
$route['showopst/(:any)'] = 'Kategorije/showOpst/$1';
$route['editopst'] = 'Kategorije/editOpst';
$route['ressetpwd'] = 'Users/ressetpassword';
// $route['cancel_edit/(:any)'] = 'FB_post/cancel_edit_post/$1';
// $route['halt/(:any)'] = 'FB_post/halt/$1';
// $route['set_draft/(:any)'] = 'FB_post/set_as_draft_post/$1';
// $route['resume/(:any)'] = 'FB_post/resume/$1';


// $route['login'] = 'login/login';

// 
// $route['groups'] = 'Groups/index';
// $route['pages'] = 'Pages/index';
// $route['addgrp'] = 'Groups/addgroup';
// $route['creategrp'] = 'Groups/creategroup';
// $route['insertPG/(:any)/(:any)'] = 'Groups/insertPagesGroups/1/1';
// $route['deletePG/(:any)'] = 'Groups/deletePagesGroups/1';
// $route['deletegrup/(:any)'] = 'Groups/delete/$1';
// $route['deletepage/(:any)'] = 'Pages/delete/$1';
// $route['editgrup/(:any)'] = 'Groups/edit/$1';
// $route['editpage/(:any)'] = 'Pages/edit/$1';
// $route['editprofile'] = 'Users/editprofile';
// $route['fbcheck'] = 'FBCheck';
// $route['config'] = 'Admin/SetConfig';
// $route['admin'] = 'Admin/index';
// $route['updategroup'] = 'Groups/updategroup';
// $route['news/(:any)'] = 'news/view/$1';
// $route['(:any)'] = 'Pages/view/$1';
// $route['default_controller'] = 'pages/view';


