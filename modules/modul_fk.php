<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(!login())
		redirect( "login" );

	$_skor_ = select( "jawaban" );
	$_skor = array();
	foreach($_skor_ as $sk) {
		$_skor[ $sk->id ] = $sk;
	}

	$_standar_a = query( "select * from pertanyaan where indikator_id in (select id from pertanyaan where kompetensi_id in (select id from pertanyaan where standar_kompetensi_id=1))" );
	$_standar_b = query( "select * from pertanyaan where indikator_id in (select id from pertanyaan where kompetensi_id in (select id from pertanyaan where standar_kompetensi_id=3))" );
	$_standar_c = query( "select * from pertanyaan where indikator_id in (select id from pertanyaan where kompetensi_id in (select id from pertanyaan where standar_kompetensi_id=17))" );

	$tes = select( "tes" );
	foreach($tes as &$ja) {
		$ja->{'jawaban'} = select( "tes_jawaban", "tes_id=" . $ja->id );

		// hitung skor per tes
		$ja->{'total_skor'} = 0;
		foreach($ja->jawaban as $jwb) {
			$ja->total_skor += intval( $_skor[ $jwb->jawaban_id ]->skor );
		}
	}
