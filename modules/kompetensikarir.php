<?php
	if(!defined( "APPLICATION_BASE" )) die( "Error" );

	set_time_limit(0);
	date_default_timezone_set('Asia/Jakarta');

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

	if( isset($post_pdf) ) {
		include("./mpdf60/mpdf.php");

		$html = $post_konten;

		$mpdf = new mPDF(); 

		$siswa = select_one( "profiles", "id=" . $post_siswa );

		$mpdf->SetTitle('Profil Kompetensi Karir');
		$mpdf->WriteHTML($html);
		$mpdf->Output('Profil Kompetensi Karir - ' . $siswa->nama . '.pdf', 'I');
		die;
	}

	if( isset($post_excel) ) {

		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);

		include './phpexcel/Classes/PHPExcel.php';
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="Profil Kompetensi Karir.xlsx"');
		$objPHPExcel = new PHPExcel();
		$sheet = $objPHPExcel->getActiveSheet();
		
		$sheet->mergeCells('A1:F1');
		$sheet->setCellValue('A1', 'Profil Kompetensi Karir');
		$sheet->getStyle('A1')->getAlignment()->applyFromArray(
		    array(
		    	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		    	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		    )
		);
		$sheet->getColumnDimension('A')->setWidth(20);
		$sheet->getColumnDimension('B')->setWidth(20);
		$sheet->getColumnDimension('C')->setWidth(20);
		$sheet->getColumnDimension('D')->setWidth(20);
		$sheet->getColumnDimension('E')->setWidth(20);
		$sheet->getColumnDimension('F')->setWidth(20);
		$sheet->getRowDimension('1')->setRowHeight(50);
		$sheet->getStyle("A1")->getFont()->setBold(true);

		$sheet->setCellValue('A2', 'Nama');
		$sheet->setCellValue('B2', ': ' . $siswa->profile->nama);
		$sheet->setCellValue('A3', 'Tempat/Tgl.Lahir');
		$sheet->setCellValue('B3', ': ' . $siswa->profile->tempat_lahir.", ".$siswa->profile->tanggal_lahir);
		$sheet->setCellValue('A4', 'Jenis Kelamin');
		$sheet->setCellValue('B4', ': ' . $siswa->profile->jenis_kelamin);
		$sheet->setCellValue('A5', 'Nomor Induk Siswa');
		$sheet->setCellValue('B5', ': ' . $siswa->profile->nip);

		$sheet->setCellValue('D2', 'Sekolah');
		$sheet->setCellValue('E2', ': ' . $siswa->profile->sekolah);
		$sheet->setCellValue('D3', 'Etnis');
		$sheet->setCellValue('E3', ': ' . $siswa->profile->etnis);
		$sheet->setCellValue('D4', 'Tanggal Tes');
		$sheet->setCellValue('E4', ': ' . date("d-M-Y h:i:s", $siswa->mulai));
		$sheet->setCellValue('D5', 'No.HP/Email');
		$sheet->setCellValue('E5', ': ' . $siswa->profile->kontak." / ".$siswa->profile->email);

		$str = "data:image/jpeg;base64,"; 
		$data = str_replace($str,"", $post_chart); 
		$data = base64_decode($data);
		$im = imagecreatefromstring($data);

		$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
		$objDrawing->setName('Chart');
		$objDrawing->setDescription('Chart');
		$objDrawing->setImageResource($im);
		$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
		$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
		$objDrawing->setHeight(350);
		$objDrawing->setWorksheet($sheet);

		$sheet->mergeCells('A6:F6');
		$sheet->getRowDimension('6')->setRowHeight(260);
		$objDrawing->setCoordinates('A6');

		$sheet->getStyle("A7:F9")->applyFromArray(
		    array(
		        'borders' => array(
		            'allborders' => array(
		                'style' => PHPExcel_Style_Border::BORDER_THIN,
		                'color' => array('rgb' => '00000')
		            )
		        )
		    )
		);

		$sheet->setCellValue('B7', 'KK');
		$sheet->setCellValue('C7', 'SK A');
		$sheet->setCellValue('D7', 'SK B');
		$sheet->setCellValue('E7', 'SK C');
		$sheet->setCellValue('F7', 'RK');
		$sheet->setCellValue('A8', 'Kelompok');
		$sheet->getStyle('A8')
	        ->getFill()
	        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
	        ->getStartColor()
	        ->setRGB('F08080');
		$sheet->setCellValue('A9', 'Individual');
		$sheet->getStyle('A9')
	        ->getFill()
	        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
	        ->getStartColor()
	        ->setRGB('20B2AA');

		$sheet->setCellValue('B8', sprintf("%.2f", $tes['rata_total']));
		$sheet->setCellValue('C8', sprintf("%.2f", $tes['rata_total_a']));
		$sheet->setCellValue('D8', sprintf("%.2f", $tes['rata_total_b']));
		$sheet->setCellValue('E8', sprintf("%.2f", $tes['rata_total_c']));
		$sheet->setCellValue('F8', sprintf("%.2f", $tes['rata_total_r']));

		$sheet->setCellValue('B9', sprintf("%.2f", $siswa->kompetensi_karir_individu));
		$sheet->setCellValue('C9', sprintf("%.2f", $siswa->kompetensi_karir_individu_a));
		$sheet->setCellValue('D9', sprintf("%.2f", $siswa->kompetensi_karir_individu_b));
		$sheet->setCellValue('E9', sprintf("%.2f", $siswa->kompetensi_karir_individu_c));
		$sheet->setCellValue('F9', sprintf("%.2f", $siswa->rata_kompetensi));
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

		if (ob_get_contents()) 
			ob_end_clean();

		// ob_end_clean();

		$objWriter->save('php://output');
		die;
	}