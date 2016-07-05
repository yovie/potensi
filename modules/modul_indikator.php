<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(!login())
			redirect( "login" );

	if( $post ) {
		if( isset($post_delete) ) {

			if( $post_jenis=="pertanyaan" ) {
				delete( "pertanyaan", "id=" . $post_id );
			} else {
				$ck = select( "pertanyaan", "standar_kompetensi_id=$post_id OR kompetensi_id=$post_id OR indikator_id=$post_id");
				if( empty($ck) ) {
					delete( "pertanyaan", "id=" . $post_id );
				}
			}

		} else if( empty($post_id) ){
			if( $post_jenis=="standar" ) {
				insert( "pertanyaan", array("teks"=>$post_teks, "jenis"=>$post_jenis) );
			} else if( $post_jenis=="kompetensi" ) {
				insert( "pertanyaan", array("teks"=>$post_teks, "jenis"=>$post_jenis, "standar_kompetensi_id"=>$post_parent) );
			} else if( $post_jenis=="indikator" ) {
				insert( "pertanyaan", array("teks"=>$post_teks, "jenis"=>$post_jenis, "kompetensi_id"=>$post_parent) );
			} else if( $post_jenis=="pertanyaan" ) {
				insert( "pertanyaan", array("teks"=>$post_teks, "jenis"=>$post_jenis, "indikator_id"=>$post_parent) );
			}
		} else if( !empty($post_id) ) {
			if( $post_jenis=="standar" ) {
				update( "pertanyaan", array("teks"=>$post_teks, "jenis"=>$post_jenis), "id=" . $post_id );
			} else if( $post_jenis=="kompetensi" ) {
				update( "pertanyaan", array("teks"=>$post_teks, "jenis"=>$post_jenis, "standar_kompetensi_id"=>$post_parent), "id=" . $post_id );
			} else if( $post_jenis=="indikator" ) {
				update( "pertanyaan", array("teks"=>$post_teks, "jenis"=>$post_jenis, "kompetensi_id"=>$post_parent), "id=" . $post_id );
			} else if( $post_jenis=="pertanyaan" ) {
				update( "pertanyaan", array("teks"=>$post_teks, "jenis"=>$post_jenis, "indikator_id"=>$post_parent), "id=" . $post_id );
			}
		}
		redirect( "data_indikator" );
	}

	$data = select( "pertanyaan", "jenis='standar'" );

	foreach($data as &$item) {
		
	}