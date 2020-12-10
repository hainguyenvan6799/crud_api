<?php 
	require_once "./source/mysource.php";
	$db = new mysource;
	$id = isset($_GET["id"]) ? $_GET['id'] : null;

	$db->xoa($id);
 ?>