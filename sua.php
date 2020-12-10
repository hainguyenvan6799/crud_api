<?php

require_once "./source/mysource.php";
	$db = new mysource;
	$id = isset($_GET["id"]) ? $_GET["id"] : null;
	$ho = isset($_GET["ho"]) ? $_GET["ho"] : null;
	$ten = isset($_GET["ten"]) ? $_GET["ten"] : null;
	$lop = isset($_GET["lop"]) ? $_GET["lop"] : null;

	$db->sua($id, $ho, $ten, $lop);
 ?>