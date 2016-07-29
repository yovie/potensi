<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(!login())
		redirect( "login" );

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

	$jumlah = query_one( "select count(*) as soal from pertanyaan where jenis='pertanyaan'" );
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
		standar_kompetensi_id ASC, kompetensi_id ASC, indikator_id ASC LIMIT $get_soal,1" );
	$jawaban = select_one( "tes_jawaban", "tes_id=$test_id AND pertanyaan_id=" . $pertanyaan->id);
	$jenis_jawaban = query( "select * from jawaban order by id desc");