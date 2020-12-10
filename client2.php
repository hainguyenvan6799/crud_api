<?php 
	$url = "http://localhost:88/CongNgheMoi/API/api_test.php/user/delete";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
	curl_setopt($ch, CURLOPT_POSTFIELDS, "1");

	echo curl_exec($ch);
 ?>