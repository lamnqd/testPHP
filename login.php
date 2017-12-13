<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
</head>
<body>
	<?php 
		include("database.php");
		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			if (true) {
				# code...
				echo "ログインしました<br />";
				echo $username;
			}
			else{
			}
		} else{

	 ?>
	<form method="post" class="frm" action="login.php">
		<div>Login</div>
		<div class="line">
			<div class="divText">username:</div><div class="divTextBox"><input type="text" name="username" placeholder="please insert your username!"></div>
			<div class="divText">password:</div><div class="divTextBox"><input type="password" name="password" placeholder="please insert your password!"></div>
		</div>
		<div><input type="submit" name="submit" value="Login"></div>
	</form>
	<?php 
		}
	 ?>
	<script type="text/javascript">
		
	</script>
</body>
<style type="text/css">
	body{
		width: 100%;
	}
	.frm{
		max-width: 200px;
		width: 100%;
		margin: 10px auto;
		text-align: center;
		border:1px ridge;
	}
	.divText{
		max-width: 70px;
		width: 100%;
	}
	.divTextBox{
		max-width: 180px;
		width: 100%;
	}
	.line{
		width: 100%;
		text-align: center;
	}
	.line div{
		//display: inline-flex;
	}
	.line div input{
		width: 100%;
	}
	.frm div{
		margin-top: 10px;
	}
</style>
</html>