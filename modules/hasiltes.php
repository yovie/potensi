<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(!login())
			redirect( "login" );

	if( $post ) {
		
		
	}

	$siswa = select( "profiles", "group_id=2" );

	foreach($siswa as &$sis) {
		$sis->{'have_account'} = select_one( "users", "ref_id=" . $sis->id );
		$sis->{'have_tes'} = false;
		if( !empty($sis->have_account) ) {
			$sis->{'have_tes'} = select_one( "tes", "user_id=" . $sis->have_account->id );
		}
	}