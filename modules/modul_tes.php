<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(!login())
			redirect( "login" );

	if( $post ) {
		
		redirect( "tes" );
	}

	$pertanyaan = select( "pertanyaan", "jenis='pertanyaan' ORDER BY 
		standar_kompetensi_id ASC, kompetensi_id ASC, indikator_id ASC" );
	$jawaban = select( "jawaban");