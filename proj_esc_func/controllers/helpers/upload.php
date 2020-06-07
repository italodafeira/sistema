<?php

function upload_image($model, $file, $hash){

	$year  = date("Y");
	$month = date("m");

	$model .= "/";

	$start_path = "C://xampp/htdocs/sistema/img/";

	$year_dir  = $start_path . $model . $year;
	$month_dir = $start_path . $model . $year."/".$month;

	if(!is_dir($year_dir)){
		mkdir($year_dir, 0755);
	}
	if(!is_dir($month_dir)){
		mkdir($month_dir, 0755);
	}

	$typeFile = "";

	$typeFile = explode(".", $file['name']);
	$uploadfile = $month_dir . "/" . $file['name'];

	if (is_file($uploadfile)) {
		$name_img_final = $typeFile[0].date('-YmdHis-').hash('crc32',$hash).".".$typeFile[1];
	}else{
		$name_img_final = $file['name'];
	}

	$uploadfile = $month_dir . "/" . $name_img_final;

	if(move_uploaded_file($file['tmp_name'], $uploadfile)){
		return $model . $year."/".$month."/".$name_img_final;
	}

	return false;
}