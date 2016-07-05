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
		),

		'data_siswa'=>array(
			'C'=>'modules/modul_datasiswa.php',
			'V'=>'templates/modul_datasiswa.php'
		),
		'data_indikator'=>array(
			'C'=>'modules/modul_indikator.php',
			'V'=>'templates/modul_indikator.php'
		),
		'tes'=>array(
			'C'=>'modules/modul_tes.php',
			'V'=>'templates/modul_tes.php'
		),
	);
