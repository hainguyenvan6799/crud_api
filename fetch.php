<?php 
	$url = "localhost:88/CongNgheMoi/API/test_api.php?action=fetchdata";

	$client = curl_init($url);
	 curl_setopt($client, CURL_RETURNTRANSFER, true);
	 $response = curl_exec($client);

	 $result = json_decode($response);

	 $output = '';
	 if(count($result) > 0)
	 {
	 	foreach($result as $r)
	 	{
	 		$output .= $r->ten . '<br>';
	 	}
	 }else{
	 	$output .= "No data found.";
	 }
?>