<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(!login())
			redirect( "login" );

	if( $post ) {
		if( isset($post_login_info) ) {

			$ck = select_one( "users", "ref_id=" . $post_id );
			if( empty($ck) ) {
				insert( "users", array(
					"username"=>$post_username,
					"password"=>md5($post_pwd),
					"tpwd"=>$post_pwd,
					"status"=>1,
					"group_id"=>2,
					"ref_id"=>$post_id
				) );
			} else {
				update( "users", array(
					"username"=>$post_username,
					"password"=>md5($post_pwd),
					"tpwd"=>$post_pwd,
					"status"=>1,
					"group_id"=>2
				), "ref_id=" . $post_id );
			}

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
					"jenis_kelamin"=>$post_jenis_kelamin,
					"tempat_lahir"=>$post_tempat_lahir,
					"tanggal_lahir"=>$post_tanggal_lahir,
					"etnis"=>$post_etnis,
					"kontak"=>$post_kontak,
					"email"=>$post_email,
					"kelas"=>$post_kelas,
					"sekolah"=>$post_sekolah,
					"foto"=>$uploadfile,
					"group_id"=>2
				));
		    } else {
		       	$pro = insert( "profiles", array(
					"nip"=>$post_nis,
					"nama"=>$post_nama,
					"jenis_kelamin"=>$post_jenis_kelamin,
					"tempat_lahir"=>$post_tempat_lahir,
					"tanggal_lahir"=>$post_tanggal_lahir,
					"etnis"=>$post_etnis,
					"kontak"=>$post_kontak,
					"email"=>$post_email,
					"kelas"=>$post_kelas,
					"sekolah"=>$post_sekolah,
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
						"jenis_kelamin"=>$post_jenis_kelamin,
						"tempat_lahir"=>$post_tempat_lahir,
						"tanggal_lahir"=>$post_tanggal_lahir,
						"etnis"=>$post_etnis,
						"kontak"=>$post_kontak,
						"email"=>$post_email,
						"kelas"=>$post_kelas,
						"sekolah"=>$post_sekolah,
						"foto"=>$uploadfile,
						"group_id"=>2
					), "id=" . $pro->id);
					unlink( getcwd() . $pro->foto );
			    } else {
			       	update( "profiles", array(
						"nip"=>$post_nis,
						"nama"=>$post_nama,
						"jenis_kelamin"=>$post_jenis_kelamin,
						"tempat_lahir"=>$post_tempat_lahir,
						"tanggal_lahir"=>$post_tanggal_lahir,
						"etnis"=>$post_etnis,
						"kontak"=>$post_kontak,
						"email"=>$post_email,
						"kelas"=>$post_kelas,
						"sekolah"=>$post_sekolah,
						"group_id"=>2
					), "id=" . $pro->id);
			    }			
			}
		}

		redirect( "data_siswa" );
	}

	$siswa = select( "profiles", "group_id=2" );

	$kelas = query("select kelas from profiles where group_id=2 group by kelas");

	foreach($siswa as &$sis) {
		$sis->{'have_account'} = select_one( "users", "ref_id=" . $sis->id );
	}