<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['info/admin/regulasi/download/(:any)'] = 'regulasi/download/$1';
$route['regulasi/nasional'] = 'regulasi/indexnasional';
$route['regulasi/provinsi'] = 'regulasi/indexprovinsi';
$route['page/coursel/add'] = 'page/addcoursel';
$route['page/coursel/update/(:num)'] = 'page/editcoursel/$1';
$route['page/coursel/delete/(:num)'] = 'page/deletecoursel/$1';
$route['info/admin'] = 'admininfo';
$route['info/admin/regulasi'] = 'regulasi/admin';
$route['info/admin/regulasi/(:any)'] = 'regulasi/$1';
$route['info/admin/regulasi/update/(:num)'] = 'regulasi/update/$1';
$route['info/admin/regulasi/delete/(:num)'] = 'regulasi/delete/$1';
$route['info/admin/(:any)'] = 'admininfo/$1';
$route['info/admin/faq/(:any)'] = 'admininfo/$1';
$route['info/admin/faq/getfaqbyid/(:num)'] = 'admininfo/getfaqbyid/$1';
$route['info/admin/faq/update/(:num)'] = 'admininfo/updatefaq/$1';
$route['info/admin/faq/delete/(:num)'] = 'admininfo/deletefaq/$1';
$route['info/admin/update/(:num)'] = 'admininfo/update/$1';
$route['info/admin/delete/(:num)'] = 'admininfo/delete/$1';
$route['default_controller'] = 'landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
