<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(!login())
			redirect( "login" );

	if( $post ) {
		if( isset($login_info) ) {

			

		} elseif( isset($post_delete) ) {
			
			$pro = select_one( "profiles", "id=" . $post_id );
			delete( "users", "ref_id=" . $pro->id );
			delete( "profiles", "id=" . $pro->id );
			unlink( getcwd() . $pro->foto );

		} elseif( empty($post_id) ) {

			$uploaddir = getcwd() ;
		    $uploadfile = "/files/photo/" . time() . "-" . basename($_FILES['foto']['name']);

		    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir . $uploadfile)) {
		      	$pro = insert( "profiles", array(
					"nip"=>$post_nis,
					"nama"=>$post_nama,
					"kontak"=>$post_kontak,
					"email"=>$post_email,
					"foto"=>$uploadfile,
					"group_id"=>2
				));
		    } else {
		       	$pro = insert( "profiles", array(
					"nip"=>$post_nis,
					"nama"=>$post_nama,
					"kontak"=>$post_kontak,
					"email"=>$post_email,
					"foto"=>"/files/users.png",
					"group_id"=>2
				));
		    }

		} elseif( !empty($post_id) ) {
			
			$pro = select_one( "profiles", "id=" . $post_id );
			if( !empty($pro) ) {
				$uploaddir = getcwd() ;
			    $uploadfile = "/files/photo/" . time() . "-" . basename($_FILES['foto']['name']);

			    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir . $uploadfile)) {
			      	update( "profiles", array(
						"nip"=>$post_nis,
						"nama"=>$post_nama,
						"kontak"=>$post_kontak,
						"email"=>$post_email,
						"foto"=>$uploadfile,
						"group_id"=>2
					), "id=" . $pro->id);
					unlink( getcwd() . $pro->foto );
			    } else {
			       	update( "profiles", array(
						"nip"=>$post_nis,
						"nama"=>$post_nama,
						"kontak"=>$post_kontak,
						"email"=>$post_email,
						"group_id"=>2
					), "id=" . $pro->id);
			    }			
			}
		}

		redirect( "data_siswa" );
	}

	$siswa = select( "profiles", "group_id=2" );

	foreach($siswa as &$sis) {
		$sis->{'have_account'} = select_one( "users", "ref_id=" . $sis->id );
	}