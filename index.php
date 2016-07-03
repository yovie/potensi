<?php
session_name('potensi');
session_start();

define('APPLICATION_BASE', 'http://' . $_SERVER['HTTP_HOST']);
define('APPLICATION_FOLDER', dirname(__FILE__));
define('PATH_ENGINE', './engine/');
define('PATH_TEMPLATE', './templates/');

require 'engine/constant.php';
require 'engine/routes.php';
require 'engine/methods.php';
require 'engine/db.php';

// request data extract
$post = empty($_POST) ? false:true;
extract($_POST, EXTR_PREFIX_ALL, "post");
$get = empty($_GET) ? false:true;
extract($_GET, EXTR_PREFIX_ALL, "get");

list($module_link, $blank) = each($_GET);

$module_link = empty($module_link) ? DEFAULT_MODULE : $module_link;

if( !login() && $module_link!='login')
	redirect('login');

if(isset($MODULES[$module_link])){
	if(isset($MODULES[$module_link]['C']) && file_exists($MODULES[$module_link]['C']))
		require $MODULES[$module_link]['C'];
	if(isset($MODULES[$module_link]['V']) && file_exists($MODULES[$module_link]['V']))
		require $MODULES[$module_link]['V'];
}


