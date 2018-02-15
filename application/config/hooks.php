<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include our database seetings, this is passed along to some hook functions //
require_once APPPATH."config/database.php";
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_controller'] = [];
$hook['post_conroller'] = [];

$hook['pre_system'] = [
		'class'    => 'Router_Hook',
		'function' => 'get_routes',
		'filename' => 'Router_Hook.php',
		'filepath' => 'hooks',
		'params'   => array(
		    'dsn' 		=> 	$db['default']['dsn'],
		    'username' 	=> 	$db['default']['username'],
		    'password' 	=> 	$db['default']['password'],
		    'database' 	=> 	$db['default']['database'],
		    'dbprefix' 	=> 	$db['default']['dbprefix']
		)
];

$hook['post_system'] = [];

