<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin/adduser'] = 'Admin/addUser';

$route['default_controller'] = 'welcome';
$route['404_override'] = 'main/pageNotFound';
$route['translate_uri_dashes'] = FALSE;
