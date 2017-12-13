<?php 
	include("database.php");
	$username = $_GET['username'];
	$password = $_GET['password'];
	$name = $_GET['name'];
	insert($username, $password, $name, $conn);
 ?>