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
		if(empty($tt->profile))
			continue;
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
		header('Content-Disposition: attachment; filename="Profil Kompetensi Karir.xls"');
		$objPHPExcel = new PHPExcel();
		$sheet = $objPHPExcel->getActiveSheet();
		
		$sheet->mergeCells('B1:F1');
		// $logo = file_get_contents(getcwd() . "/unj.png");
        // $logo_type = pathinfo(getcwd() . "/unj.png", PATHINFO_EXTENSION);
        // $img_logo = base64_encode($logo);
        // $img_logo = 'base64,' . base64_encode($logo);
        // $url_logo = 'data:image/' . $logo_type . ';' . $img_logo;

        $im_logo = imagecreatefrompng(getcwd() . "/unj.png");

		$logoDrawing = new PHPExcel_Worksheet_MemoryDrawing();
		$logoDrawing->setName('Logo');
		$logoDrawing->setDescription('Logo');
		$logoDrawing->setImageResource($im_logo);
		$logoDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
		$logoDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
		$logoDrawing->setHeight(90);
		$logoDrawing->setWorksheet($sheet);

		$logoDrawing->setCoordinates('A1');

		$sheet->setCellValue('B1', "PROFIL KOMPETENSI KARIR\nPESERTA DIDIK");
		$sheet->getStyle('B1')->getAlignment()->applyFromArray(
		    array(
		    	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		    	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		    )
		);
		$sheet->getStyle('B1')->applyFromArray(
			array(
				'font'  => array(
			        'bold'  => true,
			        'size'  => 15,
			        'name'  => 'Verdana'
			    )
			)
		);

		$sheet->mergeCells('A2:F2');
		$sheet->setCellValue('A2', 'Profil Individual');
		$sheet->getStyle('A2')->getAlignment()->applyFromArray(
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
		$sheet->getRowDimension('1')->setRowHeight(70);
		$sheet->getStyle("A2")->getFont()->setBold(true);

		$sheet->setCellValue('A4', 'Nama');
		$sheet->setCellValue('B4', ': ' . $siswa->profile->nama);
		$sheet->setCellValue('A5', 'Tempat/Tgl.Lahir');
		$sheet->setCellValue('B5', ': ' . $siswa->profile->tempat_lahir.", ".$siswa->profile->tanggal_lahir);
		$sheet->setCellValue('A6', 'Jenis Kelamin');
		$sheet->setCellValue('B6', ': ' . $siswa->profile->jenis_kelamin);
		$sheet->setCellValue('A3', 'NIS');
		$sheet->setCellValue('B3', ': ' . $siswa->profile->nip);

		$sheet->setCellValue('D3', 'Sekolah');
		$sheet->setCellValue('E3', ': ' . $siswa->profile->sekolah);
		$sheet->setCellValue('D4', 'Etnis');
		$sheet->setCellValue('E4', ': ' . $siswa->profile->etnis);
		$sheet->setCellValue('D5', 'Tanggal Tes');
		$sheet->setCellValue('E5', ': ' . date("d-M-Y h:i:s", $siswa->mulai));
		$sheet->setCellValue('D6', 'No.HP/Email');
		$sheet->setCellValue('E6', ': ' . $siswa->profile->kontak." / ".$siswa->profile->email);

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

		$objDrawing->setCoordinates('A7');
		$sheet->mergeCells('A7:F7');
		$sheet->getRowDimension('7')->setRowHeight(260);

		$sheet->getStyle("A8:F10")->applyFromArray(
		    array(
		        'borders' => array(
		            'allborders' => array(
		                'style' => PHPExcel_Style_Border::BORDER_THIN,
		                'color' => array('rgb' => '00000')
		            )
		        )
		    )
		);

		$sheet->setCellValue('B8', 'KK');
		$sheet->setCellValue('C8', 'SK A');
		$sheet->setCellValue('D8', 'SK B');
		$sheet->setCellValue('E8', 'SK C');
		$sheet->setCellValue('F8', 'RK');
		$sheet->setCellValue('A9', 'Kelompok');
		$sheet->getStyle('A9')
	        ->getFill()
	        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
	        ->getStartColor()
	        ->setRGB('F08080');
		$sheet->setCellValue('A10', 'Individual');
		$sheet->getStyle('A10')
	        ->getFill()
	        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
	        ->getStartColor()
	        ->setRGB('20B2AA');

		$sheet->setCellValue('B9', sprintf("%.2f", $tes['rata_total']));
		$sheet->setCellValue('C9', sprintf("%.2f", $tes['rata_total_a']));
		$sheet->setCellValue('D9', sprintf("%.2f", $tes['rata_total_b']));
		$sheet->setCellValue('E9', sprintf("%.2f", $tes['rata_total_c']));
		$sheet->setCellValue('F9', sprintf("%.2f", $tes['rata_total_r']));

		$sheet->setCellValue('B10', sprintf("%.2f", $siswa->kompetensi_karir_individu));
		$sheet->setCellValue('C10', sprintf("%.2f", $siswa->kompetensi_karir_individu_a));
		$sheet->setCellValue('D10', sprintf("%.2f", $siswa->kompetensi_karir_individu_b));
		$sheet->setCellValue('E10', sprintf("%.2f", $siswa->kompetensi_karir_individu_c));
		$sheet->setCellValue('F10', sprintf("%.2f", $siswa->rata_kompetensi));
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

		if (ob_get_contents()) 
			ob_end_clean();

		// ob_end_clean();

		$objWriter->save('php://output');
		die;
	}