<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(!login())
			redirect( "login" );

	if( $post ) {
		
		redirect( "data_siswa" );
	}

	$siswa = select( "profiles", "group_id=2" );