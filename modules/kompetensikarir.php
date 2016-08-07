<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	if(!login())
			redirect( "login" );

	if( !isset($get_siswa) ) {
		redirect("hasil_tes");
	}


	$rentang = 4;

	$soal = query_one( "select count(*) as jumlah from pertanyaan where jenis='pertanyaan'" );
	$max_butir = query_one( "select max(skor) as nilai from jawaban" );
	$nilai_ideal = intval($max_butir->nilai) * intval( $soal->jumlah );

	// $siswa = select_one( "profiles", "id=" . $get_siswa );
	$siswa = null;

	$tes  = query("select * from tes group by user_id, id");

	$total = 0;
	$total_a = 0;
	$total_b = 0;
	$total_c = 0;
	$total_r = 0;

	// echo '<pre>';
	// print_r($tes);
	// echo '</pre>';

	foreach($tes as &$tt) {
		$tt->{"profile"} = query_one( "select p.* from users u 
					left join profiles p on p.id=u.ref_id
					where u.id=" . $tt->user_id );
		$total_butir = query_one( "select sum(t.skor) as nilai 
			from tes_jawaban m left join jawaban t on t.id=m.jawaban_id 
			where m.tes_id=(select id from tes where user_id={$tt->user_id} limit 1)");
		$tt->{"kompetensi_karir_individu"} = intval( $total_butir->nilai ) / $nilai_ideal * $rentang;
		$total_indikator_a = query_one( "
				select sum(j.skor) as nilai from tes_jawaban t left join jawaban j on j.id=t.jawaban_id
					where t.tes_id=(select id from tes where user_id={$tt->user_id} limit 1) and t.pertanyaan_id in
				(select p.id from pertanyaan p
					where p.jenis='pertanyaan'
					and p.indikator_id in 
						(select id from pertanyaan where jenis='indikator' and kompetensi_id in
				         (select id from pertanyaan where jenis='kompetensi' and standar_kompetensi_id=1)))
			" );
		$total_indikator_b = query_one( "
				select sum(j.skor) as nilai from tes_jawaban t left join jawaban j on j.id=t.jawaban_id
					where t.tes_id=(select id from tes where user_id={$tt->user_id} limit 1) and t.pertanyaan_id in
				(select p.id from pertanyaan p
					where p.jenis='pertanyaan'
					and p.indikator_id in 
						(select id from pertanyaan where jenis='indikator' and kompetensi_id in
				         (select id from pertanyaan where jenis='kompetensi' and standar_kompetensi_id=3)))
			" );
		$total_indikator_c = query_one( "
				select sum(j.skor) as nilai from tes_jawaban t left join jawaban j on j.id=t.jawaban_id
					where t.tes_id=(select id from tes where user_id={$tt->user_id} limit 1) and t.pertanyaan_id in
				(select p.id from pertanyaan p
					where p.jenis='pertanyaan'
					and p.indikator_id in 
						(select id from pertanyaan where jenis='indikator' and kompetensi_id in
				         (select id from pertanyaan where jenis='kompetensi' and standar_kompetensi_id=17)))
			" );
		$tt->{"kompetensi_karir_individu_a"} = intval( $total_indikator_a->nilai ) / $nilai_ideal * $rentang;
		$tt->{"kompetensi_karir_individu_b"} = intval( $total_indikator_b->nilai ) / $nilai_ideal * $rentang;
		$tt->{"kompetensi_karir_individu_c"} = intval( $total_indikator_c->nilai ) / $nilai_ideal * $rentang;
		$tt->{"rata_kompetensi"} = ($tt->kompetensi_karir_individu
									+ $tt->kompetensi_karir_individu_a
									+ $tt->kompetensi_karir_individu_b
									+ $tt->kompetensi_karir_individu_c) / 4.0;
		$total += $tt->kompetensi_karir_individu;
		$total_a += $tt->kompetensi_karir_individu_a;
		$total_b += $tt->kompetensi_karir_individu_b;
		$total_c += $tt->kompetensi_karir_individu_c;
		$total_r += $tt->rata_kompetensi;

		if( $tt->profile->id==$get_siswa )
			$siswa = $tt;
	}

	$total /= count($tes);
	$total_a /= count($tes);
	$total_b /= count($tes);
	$total_c /= count($tes);
	$total_r /= count($tes);

	$tes["rata_total"] = $total;
	$tes["rata_total_a"] = $total_a;
	$tes["rata_total_b"] = $total_b;
	$tes["rata_total_c"] = $total_c;
	$tes["rata_total_r"] = $total_r;

	if( isset($post_siswa) ) {
		include("./mpdf60/mpdf.php");

		$html = $post_konten;

		$mpdf = new mPDF(); 

		$siswa = select_one( "profiles", "id=" . $post_siswa );

		$mpdf->SetTitle('Profil Kompetensi Karir');
		$mpdf->WriteHTML($html);
		$mpdf->Output('Profil Kompetensi Karir - ' . $siswa->nama . '.pdf', 'I');
		die;
	}