<?php 
	// sẽ có nút sửa, trong nút sửa có id. Dùng ajax để xử lý đến trang này
	$url = "http://localhost:88/CongNgheMoi/API/api_test.php/user/update";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	curl_setopt($ch, CURLOPT_POSTFIELDS, "1");

	echo curl_exec($ch);
 ?>