<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="jquery.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Admin</title>
</head>
<body>
	<div style="text-align: center;">
		<input type="hidden" id="txtid" name="id" value="">
		<input type="text" id="txtname" placeholder="name" name="">
		<input type="text" id="txtusername" placeholder="username" name="">
		<input type="text" id="txtpassword" placeholder="password" name="">
		<input type="submit" class="btn" id="btnAdd" value="Add" name="">
	</div>
	<?php
		$data = get_all($conn);
	 ?>
	 <table id="tb">
	 	<tr>
	 		<th>id</th>
	 		<th>name</th>
	 		<th>username</th>
	 		<th>password</th>
	 		<th colspan="2"></th>
	 	</tr>
	 	<?php 
	 		foreach ($data as $k => $v) { ?>
				<tr id="<?php echo 'row'.$v['id']; ?>">
			 		<td><?php echo $v['id']; ?></td>
			 		<td><?php echo $v['name']; ?></td>
			 		<td><?php echo $v['username']; ?></td>
			 		<td><?php echo $v['password']; ?></td>
			 		<td><button value="<?php echo $v['id']; ?>">Delete</button></td>
			 		<td><button value="<?php echo $v['id']; ?>">Edit</button></td>
			 	</tr>
		<?php }
	 	 ?>
	 </table>
	 <script type="text/javascript">
	 	$(document).ready(function(){
	 		$('button').click(function(){
	 			let id = $(this).val();
	 			if($(this).text() == "Edit"){
	 				window.location.href = "update.php?id=" + id;
	 			} else {
	 				$.ajax({url: "delete.php?id=" + id, success: function(result){
				        $("#row" + id).remove();
				    }});
	 			}
	 		});
	 		$('#btnAdd').click(function(){
	 			let name = $('#txtname').val();
	 			let username = $('#txtusername').val();
	 			let password = $('#txtpassword').val();
	 			$.ajax({url: "add.php?name=" + name + "&username=" + username + "&password=" + password, success: function(result){
	 				location.reload();
			    }});
	 		});
	 		// $('tr').click(function(){
	 		// 	//alert($(this).find('td')[0].innerHTML);
	 		// 	$('#txtid').attr('value', $(this).find('td')[0].innerHTML);
	 		// 	$('#txtname').attr('value', $(this).find('td')[1].innerHTML);
	 		// 	$('#txtusername').attr('value', $(this).find('td')[2].innerHTML);
	 		// 	$('#txtpassword').attr('value', $(this).find('td')[3].innerHTML);
	 		// });
	 		// $('#btnUpdate').click(function(){
	 		// 	let id = $('#txtid').val();
	 		// 	let name = $('#txtname').val();
	 		// 	let username = $('#txtusername').val();
	 		// 	let password = $('#txtpassword').val();
	 		// 	window.location.href = "update.php?id=" + id + "&name=" + name + "&username=" + username + "&password=" + password;
	 		// 	//alert(id);
	 		// 	 //$.ajax({url: "update.php?id=" + id + "&name=" + name + "&username=" + username + "&password=" + password, success: function(result){
	 		// 	 	//location.reload();
	 		// 	 //}});
	 		// });
	 	});
	 </script>
</body>
<style type="text/css">
	tr th{
		font-weight:bold;
	    }
	tr th, tr td{
		padding:5px;
		background: #74c476;
	}
	th{
	    border: 5px solid #C1DAD7;
	}
	td{
		border: 5px solid #C1DAD7;
	}
	table{
		margin: 10px auto;
		border:1px solid;
		border-color: gray;
	}
	button, .btn {
		border: 1px solid transparent;
	    padding: .5rem 1rem;
	    border-radius: .25rem;
	    font-size: 100%;
	    color: #fff;
	    background-color: #0275d8;
	    border-color: #0275d8;
	}
</style>
</html>
