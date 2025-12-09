<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'auth/login';

$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';
$route['auth/login'] = 'auth/login_process';
$route['auth/register'] = 'auth/register_process';

$route['home'] = 'equipment/index';
$route['equipment/store'] = 'equipment/store';
$route['equipment/update'] = 'equipment/update';
$route['equipment/delete'] = 'equipment/delete';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
