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
		die;
	}

	$test = select_one( "tes", "user_id=" . $user_session->id );
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

	$pertanyaan = select( "pertanyaan", "jenis='pertanyaan' ORDER BY 
		standar_kompetensi_id ASC, kompetensi_id ASC, indikator_id ASC" );
	$jawaban = select( "jawaban");

	$old = select( "tes_jawaban", "tes_id=$test_id");
	$sebelumnya = array();
	foreach($old as $ol) {
		$sebelumnya[ $ol->tes_id ][ $ol->pertanyaan_id ] = $ol;
	}