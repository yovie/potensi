<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(login())
			redirect( "home" );

	if( $post ) {
		if( isset($post_login) ) {
			
			$user = select_one( "users", 
				sprintf( " username='%s' AND password='%s'", $post_username, 
					md5($post_password) ) );
			if( $user ) {
				$profil = select_one( "profiles", "id=" . $user->ref_id);
				$user->{"profile"} = $profil;
				set_session( $user );
			} else {
				set_flashmessage( array("status"=>false, "message"=>"Periksa kembali username dan password anda", "title"=>"Login gagal") );
			}
			redirect( "home" );
		}

		if( isset($post_register) ) {
			if( $post_pwd1!=$post_pwd2 ) {
				set_flashmessage( array("status"=>false, "message"=>"Password konfirmasi tidak sama", "title"=>"Register gagal") );
			} else {
				$pro = insert( "profiles", array(
					"nip"=>$post_nis,
					"nama"=>$post_nama,
					"kelas"=>$post_kelas,
					"foto"=>"/files/users.png",
					"group_id"=>2
				));
				insert( "users", array(
					"username"=>$post_uname,
					"password"=>md5($post_pwd1),
					"tpwd"=>$post_pwd1,
					"status"=>1,
					"group_id"=>2,
					"ref_id"=>$pro
				) );
				set_flashmessage( array("status"=>true, "message"=>"Silakan login untuk tes", "title"=>"Register berhasil") );
			}
			redirect( "home" );
		}
	}