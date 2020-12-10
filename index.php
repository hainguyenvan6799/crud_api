<?php 
	require_once "./source/mysource.php";
	$db = new mysource;

	$db->xem("Select * from user");

	// $ho = isset($_GET["ho"]) ? $_GET["ho"] : "Khong co";
	// $ten = isset($_GET["ten"]) ? $_GET["ten"] : "Khong co";
	// $lop = isset($_GET["lop"]) ? $_GET["lop"] : "Khong co";
	
	// $db->them($ho, $ten, $lop);
	// print_r(explode('/', trim($_SERVER['PATH_INFO'],'/')));
	// print_r(file_get_contents("php://input"));
// print_r(explode("/", trim($_SERVER['PATH_INFO'])));

?>
