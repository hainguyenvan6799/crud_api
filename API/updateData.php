<?php
	$idUpdate = isset($_POST["id"]) ? $_POST["id"] : $_REQUEST["idU"];
	$ho = isset($_POST["ho"]) ? $_POST["ho"] : $_REQUEST["hoU"];
	$ten = isset($_POST["ten"]) ? $_POST["ten"] : $_REQUEST["tenU"];
	$lop = isset($_POST["lop"]) ? $_POST["lop"] : $_REQUEST["lopU"];

	$url = "http://localhost:88/CongNgheMoi/API/api_test.php/user/update";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $idUpdate. '|' . $ho . '|' . $ten . '|' . $lop);
	echo curl_exec($ch);
 ?>