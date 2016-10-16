<?php
	if(!defined('APPLICATION_BASE')) die('Error');
	
	$connection = mysqli_connect('localhost:3406', 'root', '');
	mysqli_select_db($connection, 'potensi');
	
	function toarray($mres){
		$data = array();
		while($item = mysqli_fetch_object($mres))
			$data[] = $item;
		return $data;
	}
	
	function query($Q, $with_result=true){
		global $connection;
		$res = mysqli_query($connection, $Q) or die($Q . '<br/>' . mysqli_error($connection));
		if($with_result)
			return toarray($res);
		else
			return mysqli_insert_id($connection);
	}

	function query_one($Q){
		global $connection;
		$mres = mysqli_query($connection, $Q) or die($Q . '<br/>' . mysqli_error($connection));
		if(mysqli_num_rows($mres)==1)
			return mysqli_fetch_object($mres);
		else
			return false;
	}

	function select($table, $condition=null){
		$condition = empty($condition) ? '':' WHERE ' . $condition;
		return query("SELECT * FROM $table $condition");
	}
	
	function select_one($table, $condition=null){
		$condition = empty($condition) ? '':' WHERE ' . $condition;
		return query_one("SELECT * FROM $table $condition");
	}

	function insert($table, $arrdata=array()){
		$fields = array();
		$values = array();
		foreach($arrdata as $f=>$v){
			$fields[] = $f;
			$values[] = "'" . addslashes($v) . "'";
		}
		// $fields[] = 'user_id';
		// $values[] = get_session()->id;
		$q = sprintf('INSERT INTO ' . $table . '(%s) VALUES (%s)', implode(',', $fields), implode(',', $values));
		return query($q, false);
	}
	
	function update($table, $arrdata=array(), $condition=null){
		$values = array();
		foreach($arrdata as $field=>$value){
			$values[] = "$field='" . addslashes($value) . "'";
		}
		// $values[] = "user_id=" . get_session()->id;
		$condition = empty($condition) ? '':' WHERE ' . $condition;
		$q = sprintf('UPDATE ' . $table . ' SET ' . implode(',', $values) . ' ' . $condition);
		return query($q, false);
	}
	
	function delete($table, $condition){
		return query('DELETE FROM ' . $table . ' WHERE ' . $condition, false);
	}
