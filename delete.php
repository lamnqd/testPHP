<?php 
	include("database.php");
	$id = $_GET['id'];
	delete($id, $conn);
 ?>