<?php
	$idUpdate = isset($_POST["id"]) ? $_POST["id"] : null;
	$ho = isset($_POST["ho"]) ? $_POST["ho"] : null;
	$ten = isset($_POST["ten"]) ? $_POST["ten"] : null;
	$lop = isset($_POST["lop"]) ? $_POST["lop"] : null;

	$url = "http://localhost:88/CongNgheMoi/API/api_test.php/user/update";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $idUpdate. '|' . $ho . '|' . $ten . '|' . $lop);
	echo curl_exec($ch);
 ?>