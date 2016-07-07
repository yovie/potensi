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

			$uploaddir = getcwd() ;
		    $uploadfile = "/files/photo/" . time() . "-" . basename($_FILES['foto']['name']);

		    $path_foto = "/files/users.png";

		    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir . $uploadfile)) {
		    	$path_foto = $uploadfile;
		    }

		    $datanya = array(
				"nip"=>$post_nip,
				"nama"=>$post_nama,
				"kontak"=>$post_kontak,
				"email"=>$post_email,
				"foto"=>$path_foto
			);

			if( isset($post_tempat_lahir) )
				$datanya[ "tempat_lahir" ] = $post_tempat_lahir;
			if( isset($post_tanggal_lahir) )
				$datanya[ "tanggal_lahir" ] = $post_tanggal_lahir;
			if( isset($post_etnis) )
				$datanya[ "etnis" ] = $post_etnis;
			if( isset($post_sekolah) )
				$datanya[ "sekolah" ] = $post_sekolah;
			if( isset($post_kelas) )
				$datanya[ "kelas" ] = $post_kelas;

			if( empty($ck) ) {
				$ref_id = insert( "profiles", $datanya );
				update( "users", array( "ref_id"=>$ref_id ), "id=". $user_session->id);
			} else {
				update( "profiles", $datanya, "id=". $user_session->id);
			}
		}
		redirect( "profile" );
	}

	$profil = select_one( "profiles", "id=" . $user_session->ref_id );