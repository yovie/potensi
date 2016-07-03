<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(!login())
			redirect( "login" );

	if( $post ) {
		if( $post_ubah_username ) {
			update( "users", array( 
				"username"=>$post_username 
			), "id=". $user_session->id);
			redirect( "logout" );
		}
		if( $post_ubah_password ) {
			if( $post_password1==$post_password2 && !empty($post_password1)) {
				update( "users", array( 
					"password"=>md5($post_password1) 
				), "id=". $user_session->id);
				redirect( "logout" );
			}
		}
		if( $post_profil ) {
			$ck = select_one( "profiles", "id=". $user_session->ref_id);
			if( empty($ck) ) {
				$ref_id = insert( "profiles", array(
					"nip"=>$post_nip,
					"nama"=>$post_nama,
					"kontak"=>$post_kontak,
					"email"=>$post_email
				));
				update( "users", array( "ref_id"=>$ref_id ), "id=". $user_session->id);
			} else {
				update( "profiles", array(
					"nip"=>$post_nip,
					"nama"=>$post_nama,
					"kontak"=>$post_kontak,
					"email"=>$post_email
				), "id=". $user_session->id);
			}
		}
		redirect( "profile" );
	}

	$profil = select_one( "profiles", "id=" . $user_session->ref_id );