<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(login())
			redirect( "home" );

	if( $post ) {
		$user = select_one( "users", 
			sprintf( " username='%s' AND password='%s'", $post_username, 
				md5($post_password) ) );
		if( $user ) {
			set_session( $user );
		} else {
			set_flashmessage( array("status"=>false, "message"=>"Periksa kembali username dan password anda") );
		}
		redirect( "home" );
	}