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
		'profile'=>array(
			'C'=>'modules/modul_profil.php',
			'V'=>'templates/modul_profil.php'
		),
		'logout'=>array(
			'C'=>'modules/modul_logout.php'
		)
	);
