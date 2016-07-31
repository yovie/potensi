<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(!login())
			redirect( "login" );

	if( $post ) {
		
		
	}

	$siswa = select( "profiles", "group_id=2" );

	foreach($siswa as &$sis) {
		$sis->{'have_account'} = select_one( "users", "ref_id=" . $sis->id );
	}