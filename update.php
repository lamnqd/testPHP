<?php 
	include("database.php");
	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$password = $_POST['password'];
		$username = $_POST['username'];
		$name = $_POST['name'];
		update($id, $username, $password, $name, $conn);
	}else{
		$id = $_GET['id'];
		$data = get($id, $conn);
		$password = $data['password'];
		$username = $data['username'];
		$name = $data['name'];
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Update</title>
 	<script type="text/javascript" src="jquery.js"></script>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
 	<form action="update.php" method="POST" class="content">
 		<input type="hidden" name="id" value="<?php echo $id; ?>">
	 	<div class="divTitle">name</div> 
	 	<div class="divItem"><input type="text" id="txtname" value="<?php echo $name; ?>" name="name"></div>
	 	<div class="divTitle">username</div> 
	 	<div class="divItem"><input type="text" id="txtusername" value="<?php echo $username; ?>" name="username"></div>
	 	<div class="divTitle">password</div> 
	 	<div class="divItem"><input type="text" id="txtpassword" value="<?php echo $password; ?>" name="password"></div>	
	 	<div class="divItem" style="text-align: center;"><input class="btn" type="submit" name="submit" id="btnUpdate" value="Update"></div>
 	</form>

 	<script type="text/javascript">
 		<?php echo "let id = ".$id. ";"; ?>
 		$(document).ready(function(){
 			$('#btnUpdate').click(function(){
 				let name = $('#txtname').val();
	 			let username = $('#txtusername').val();
	 			let password = $('#txtpassword').val();
 			});	
 		});
 	</script>
 </body>
 <style type="text/css">
 	.divItem{
 		max-width: 200px;
 		width: 100%;
 		margin: 0px auto;
 	}
 	.divTitle{
 		max-width: 50px;
 		width: 100px;
 		margin-left: 10px;
 	}
 	.divItem input{
 		max-width: 200px;
 		width: 100%;
 		margin: 0px auto;
 		margin-bottom: 10px;
	    border: 1px solid $grey;
	    padding: 6px 10px;
	    color: $dark_grey;
	    font-size: pxtoem(16, 16);
 	}
 	.content{
 		border: 1px ridge;
 		max-width: 220px;
 		width: 100%;
 		margin: 10px auto;
 	}
 	#btnUpdate{
 		max-width: 100px;
 		margin-left: auto;
 		margin-right: auto;
 		border-radius: 5px;
 	}
 </style>
 </html>