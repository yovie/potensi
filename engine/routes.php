<?php
	if(!defined('APPLICATION_BASE')) die('Error');
	
	$MODULES =  array(
		'home'=>array(
			'C'=>'modules/modul_home.php',
			'V'=>'templates/modul_home.php'
		),
		'login'=>array(
			'C'=>'modules/modul_login.php',
			'V'=>'templates/modul_login.php'
		),
		'setting'=>array(
			'C'=>'modules/modul_seting.php',
			'V'=>'templates/modul_seting.php'
		),
		'logout'=>array(
			'C'=>'modules/modul_logout.php'
		)
	);
