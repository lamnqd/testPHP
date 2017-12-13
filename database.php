<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_quanly";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$conn->set_charset("utf8");

	function login($username, $password){

	}
	function get($id, $conn){
		$sql = "SELECT name, username, password FROM tb_nhanvien WHERE id = '{$id}'";
		$result = $conn->query($sql);
		$data = null;
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$data['name'] = $row["name"];
		    	$data['username'] = $row["username"];
		    	$data['password'] = $row["password"];
		    }
		} else {
		   
		}
		return $data;
	}
	function get_all($conn){
		$sql = "SELECT id, name, username, password FROM tb_nhanvien";
		$result = $conn->query($sql);
		$data = null;
		$i = 0;
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$data[$i]['id'] = $row["id"];
		    	$data[$i]['name'] = $row["name"];
		    	$data[$i]['username'] = $row["username"];
		    	$data[$i]['password'] = $row["password"];
		    	$i++;
		    }
		} else {
		   
		}
		return $data;
	}
	function insert($username, $password, $name, $conn){
		$sql = "INSERT INTO tb_nhanvien (name, username, password)
		VALUES ('{$name}', '{$username}', '{$password}')";

		if ($conn->query($sql) === TRUE) {
			echo $conn->insert_id;
		    //echo "successfully";
		} else {
		    //echo "error";
		}

	}
	function delete($id, $conn){
		$sql = "DELETE FROM tb_nhanvien WHERE id = {$id}";
		if ($conn->query($sql) === TRUE) {
		    echo "successfully";
		} else {
		    echo "error";
		}
	}
	function update($id, $username, $password, $name, $conn){
		$sql = "UPDATE tb_nhanvien SET name='{$name}', username='{$username}', `password`='{$password}' WHERE id={$id}";
		if ($conn->query($sql) === TRUE) {
		    echo "successfully";
		} else {
		    echo "error";
		}
	}
	function isMember($id, $conn){
		$sql = "SELECT * FROM tb_nhanvien WHERE id = {$id}";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}
 ?>