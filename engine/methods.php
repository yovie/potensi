<?php
	if(!defined('APPLICATION_BASE')) die('Error');
	
	function set_session($args){
		$_SESSION['login'] = true;
		$_SESSION['id'] = $args->id;
		$_SESSION['username'] = $args->username;
		$_SESSION['group_id'] = $args->group_id;
		$group = select_one('groups', 'id=' . $args->group_id);
		$_SESSION['group_name'] = $group->groups;
		$_SESSION['ref_id'] = $args->ref_id;
	}
	
	function get_session(){
		if(isset($_SESSION['login']) && $_SESSION['login']==true)
			return (object)array(
				'id'=>$_SESSION['id'],
				'username'=>$_SESSION['username'],
				'group_id'=>$_SESSION['group_id'],
				'group_name'=>$_SESSION['group_name'],
				'ref_id'=>$_SESSION['ref_id']
			);
		else return (object)array(
				'id'=>'',
				'username'=>'',
				'group_id'=>'',
				'group_name'=>'',
				'ref_id'=>''
			);
	}
	
	function filter_user($akses){
		$info = get_session();
		if($info->group_id===$akses)
			return true;
		else
			return false;
	}
	
	function login(){
		if(isset($_SESSION['login']))
			return ($_SESSION['login']==true);
		else
			return false;
	}
	
	function remove_session(){
		unset($_SESSION['login']);
		session_destroy();
	}
	
	function redirect($url){
		header('location:' . $url);
		die;
	}
	
	function get_access($mod){
		$user = get_session();
		$m = query_one(sprintf("select * from akses a inner join modules m on m.id=a.modules_id 
			where m.url like '%s' and a.groups_id=%s", "%$mod%", $user->group_id));
		if(empty($m))
			return false;
		else
			return $m->akses;
	}
	
	// format dd-mm-yyyy
	function getDMY($tgl){
		$tgl = explode('-', $tgl);
		if(count($tgl)!=3)
			$tgl = array(intval(date('d')), intval(date('m')), intval(date('Y')));
		return (object)array(
			'tanggal' => $tgl[0],
			'bulan' => $tgl[1],
			'tahun' => $tgl[2]
		);
	}
	
	// format yyyy-mm-dd
	function getYMD($tgl){
		$tgl = explode('-', $tgl);
		if(count($tgl)!=3)
			$tgl = array(intval(date('d')), intval(date('m')), intval(date('Y')));
		return (object)array(
			'tanggal' => $tgl[2],
			'bulan' => $tgl[1],
			'tahun' => $tgl[0]
		);
	}
	
	function toDMY($tgl){
		return $tgl->tanggal .'-'. $tgl->bulan .'-'. $tgl->tahun;
	}
	
	function toYMD($tgl){
		return $tgl->tahun .'-'. $tgl->bulan .'-'. $tgl->tanggal;
	}

	function set_flashmessage($msg){
		$_SESSION['flash_msg'] = $msg;
	}
	
	function get_flashmessage(){
		if(isset($_SESSION['flash_msg'])){
			$res = $_SESSION['flash_msg'];
			unset($_SESSION['flash_msg']);
			return $res;
		}else
			return '';
	}
	
	function get_setting($tp, $def=0){
		$res = query_one(
					sprintf("SELECT * FROM `setup` WHERE `key`='%s'", $tp)
				);
		$res = ($res==false) ? (object)array('value'=>$def):$res;
		return $res;
	}

	function get_list_bulan(){
		return array(
			'1'=>'Januari',
			'2'=>'Februari',
			'3'=>'Maret',
			'4'=>'April',
			'5'=>'Mei',
			'6'=>'Juni',
			'7'=>'Juli',
			'8'=>'Agustus',
			'9'=>'September',
			'10'=>'Oktober',
			'11'=>'November',
			'12'=>'Desember'
		);
	}

	function get_list_bulan_singkat(){
		return array(
			'1'=>'Jan',
			'2'=>'Feb',
			'3'=>'Mar',
			'4'=>'Apr',
			'5'=>'Mei',
			'6'=>'Jun',
			'7'=>'Jul',
			'8'=>'Agu',
			'9'=>'Sep',
			'10'=>'Okt',
			'11'=>'Nov',
			'12'=>'Des'
		);
	}
	
	function apakah_bulan_ini($bulan_, $tahun_){
		$bulan = intval(date('m'));
		$tahun = intval(date('Y'));
		$bulan_ = intval($bulan_);
		$tahun_ = intval($tahun_);
		return ($bulan==$bulan_ && $tahun==$tahun_);
	}


	function get_data_for_grafik($jawaban_id, $return_string=true){
		$jwb = query("SELECT * FROM jawaban_item WHERE jawaban_id=" . $jawaban_id);
		$arr_label = array();
		$arr_data = array();
		$nilai_estimasi_level = 0;
		foreach($jwb as $idx=>$item){
			$arr_label[] = "'Soal " . ($idx+1) . "'";
			$arr_data[] = $item->level;
			$nilai_estimasi_level += $item->level;
		}
		
		//~ if(count($jwb)>0)
			//~ $nilai_estimasi_level /= count($jwb);
		$total = $nilai_estimasi_level;
		
		if($nilai_estimasi_level>=36 && $nilai_estimasi_level<=60) $nilai_estimasi_level = 1;
		if($nilai_estimasi_level>=61 && $nilai_estimasi_level<=84) $nilai_estimasi_level = 2;
		if($nilai_estimasi_level>=85 && $nilai_estimasi_level<=107) $nilai_estimasi_level = 3;
		if($nilai_estimasi_level>=109 && $nilai_estimasi_level<=133) $nilai_estimasi_level = 4;
		if($nilai_estimasi_level>=134 && $nilai_estimasi_level<=157) $nilai_estimasi_level = 5;
		if($nilai_estimasi_level>=158 && $nilai_estimasi_level<=181) $nilai_estimasi_level = 6;
		if($nilai_estimasi_level>=182 && $nilai_estimasi_level<=205) $nilai_estimasi_level = 7;
		if($nilai_estimasi_level>=206 && $nilai_estimasi_level<=230) $nilai_estimasi_level = 8;
		
		if($return_string)
			return (object)array(
				'label'=>implode(',', $arr_label),
				'data'=>implode(',', $arr_data),
				'nilai_estimasi_level'=>$nilai_estimasi_level,
				'total'=>$total
			);
		else
			return (object)array(
				'label'=>$arr_label,
				'data'=>$arr_data,
				'nilai_estimasi_level'=>$nilai_estimasi_level,
				'total'=>$total
			);
	}


	function temhead(){
		global $module_link;
		include getcwd() . '/templates/template/' . APPLICATION_TEMPLATE . '/header.php';
	}

	function temfoot(){
		global $module_link;
		include getcwd() . '/templates/template/' . APPLICATION_TEMPLATE . '/footer.php';
	}

	function isJSON($string) {
		if(strpos($string, "}")==false)
			return false;
		else
			return is_object(json_decode($string));
	}
	
	
	function getHalaman($d){
		return query_one("SELECT * FROM halaman WHERE tipe='$d' LIMIT 1");
	}
	
	function getUnread(){
		return query_one("SELECT COUNT(*) as jumlah FROM buku_tamu WHERE baca=0");
	}

	function getListProvinsi(){
		$l = select('inf_lokasi', 'lokasi_propinsi<>0'
			. ' AND lokasi_kabupatenkota=0 AND lokasi_kecamatan=0 AND lokasi_kelurahan=0');
		return $l;
	}

	function getListKabupaten($prov_id){
		$k = select_one('inf_lokasi', 'lokasi_ID=' . $prov_id);
		$l = select('inf_lokasi', 'lokasi_propinsi=' . $k->lokasi_propinsi 
			. ' AND lokasi_kabupatenkota<>0'
			. ' AND lokasi_kecamatan=0 AND lokasi_kelurahan=0');
		return $l;
	}

	function getListKecamatan($kab_id){
		$k = select_one('inf_lokasi', 'lokasi_ID=' . $kab_id);
		$l = select('inf_lokasi', 'lokasi_propinsi=' . $k->lokasi_propinsi 
			. ' AND lokasi_kabupatenkota=' . $k->lokasi_kabupatenkota
			. ' AND lokasi_kecamatan<>0'
			. ' AND lokasi_kelurahan=0');
		return $l;
	}

	function getListDesa($kec_id){
		$k = select_one('inf_lokasi', 'lokasi_ID=' . $kec_id);
		$d = select('inf_lokasi', 'lokasi_propinsi=' . $k->lokasi_propinsi 
			. ' AND lokasi_kabupatenkota=' . $k->lokasi_kabupatenkota
			. ' AND lokasi_kecamatan=' . $k->lokasi_kecamatan
			. ' AND lokasi_kelurahan<>0');
		return $d;
	}

	function getNamaLokasi($pid){
		$k = select_one('inf_lokasi', 'lokasi_ID=' . $pid);
		return $k->lokasi_nama;
	}


	function generateNomor($table, $field, $mode='default'){
		$number = '';
		if($mode=='default'){
			$filter = date('Ymd');
			$num = query_one(sprintf("SELECT COUNT(*) AS jumlah FROM %s WHERE %s LIKE '%s'",
						$table, $field, $filter . '%'));
			if(!empty($num))
				$number = $filter . sprintf("%03d", intval($num->jumlah)+1);
		}
		return $number;
	}
