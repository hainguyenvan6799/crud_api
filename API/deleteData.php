<?php
	$idDelete = isset($_POST['id']) ? $_POST['id'] : null; 
	$url = "http://localhost:88/CongNgheMoi/API/api_test.php/user/delete";

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $idDelete);
	echo curl_exec($ch);


 ?>