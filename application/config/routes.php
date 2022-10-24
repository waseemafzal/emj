<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['admin'] = 'auth/login';
$route['super-admins'] = 'auth/view_users/1';
$route['default_controller'] = 'auth/login';
$route['tvshow'] = 'home/tvshow';
$route['audio'] = 'home/audio';
$route['contact'] = 'home/contact';
$route['sign'] = 'home/signup1';
$route['login'] = 'home/login';
$route['forgot'] = 'home/forgot';
$route['users'] = 'auth/userslist';
$route['download-app'] = 'home/apps';


////$route['mdetails/{id}'] = 'home/movie_detail';

// $route['register'] = 'home/register';
// $route['movie'] = 'home/movie';
// $route['movie_detail'] = 'home/movie_detail';
// $route['audio'] = 'home/audio_player';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

