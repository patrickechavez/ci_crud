<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Post/index';

$route['register'] = 'Register/index';
$route['login'] = 'Login/index';

$route['posts'] = 'Post/index';
$route['posts/edit/(:any)'] = 'Post/edit/$1';
$route['posts/create'] = 'Post/create';
$route['posts/update'] = 'Post/update';
$route['posts/destroy'] = 'Post/destroy';


$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
