<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(!login())
		redirect( "login" );

	$the_status = "pertanyaan";

	$jumlah = query_one( "select count(*) as soal from pertanyaan where jenis='pertanyaan'" );

	if( $post ) {
		$ck = select_one( "tes_jawaban", "tes_id=$post_tes_id AND pertanyaan_id=$post_pertanyaan_id");
		if( empty($ck) ) {
			insert( "tes_jawaban", array(
				"tes_id"=>$post_tes_id,
				"pertanyaan_id"=>$post_pertanyaan_id,
				"jawaban_id"=>$post_jawaban_id,
				"waktu"=>time()
			));
		} else {
			update( "tes_jawaban", array(
				"jawaban_id"=>$post_jawaban_id,
				"waktu"=>time()
			), "id=" . $ck->id );
		}
		update( "tes", array(
			"selesai"=>time()
		), "id=" . $post_tes_id );

		if( $post_soal_ke<$jumlah->soal ) {
			redirect("tes?soal=" . ($post_soal_ke));
		} else {
			$jwb = query_one( "select count(*) jumlah from tes_jawaban where tes_id=$post_tes_id" );
			if( $jwb->jumlah==$jumlah->soal ){
				$the_status = "selesai";
			}else{
				set_flashmessage(array("type"=>"warning", "title"=>"Beberapa pertanyaan belum dijawab", "message"=>"%s, silakan lengkapi jawaban anda"));
			}
			redirect( "tes" );
		}
	}

	$test = select_one( "tes", "user_id=" . $user_session->id );
	if(!isset($get_soal)) {
		if( empty($test) ) {
			$test_id = insert( "tes", array(
				"user_id"=>$user_session->id,
				"mulai"=>time()
			));
		} else {
			update( "tes", array(
				"mulai"=>time()
			), "id=" . $test->id);
			$test_id = $test->id;
		}
		$get_soal = 1;
	} else {
		$test_id = $test->id;
	}

	$jwb = query_one( "select count(*) jumlah from tes_jawaban where tes_id=$test_id" );
	if( $jwb->jumlah==$jumlah->soal )
		$the_status = "selesai";

	if( $get_soal==1 ) {
		$back = -1;
		$next = 2;
	} elseif ( $get_soal==$jumlah->soal-1 ) {
		$back = $get_soal-1;
		$next = -1;
	} else {
		$back = $get_soal-1;
		$next = $get_soal+1;
	}

	$pertanyaan = select_one( "pertanyaan", "jenis='pertanyaan' ORDER BY 
		id ASC LIMIT " .($get_soal-1). ",1" );
	$jawaban = select_one( "tes_jawaban", "tes_id=$test_id AND pertanyaan_id=" . $pertanyaan->id);
	$jenis_jawaban = query( "select * from jawaban order by id desc");