<?php
	session_start();
	if( isset($_SESSION["user"]) && ($_SESSION["mapq"]==1 || $_SESSION["mapq"]==2) )
	{
		header("Location: giaodien.php");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
div.card {width: 250px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align: center;margin: auto;margin-top: 50px;width: 20%;min-width: 300px}
div.header {background-color: rgba(244,244,244,1.00);color: white;padding: 10px;}	
</style>
</head>

<body>	
	<div class="card" align="center">
		<div class="header">
			<h1 align="center" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, 'sans-serif';color: rgba(21,21,21,1.00)">Admin Panel</h1>
			  <form method="post" action="LoginProcess.php">
					<img src="../Images/giaodien/78948-admin-with-cogwheels.png" height="115" style="height: ">
				  <input type="text" class="form-control" name="txtUser" class="login" style="margin-top:15px" placeholder="Username">
					<input type="password" class="form-control" name="txtPass" class="login" placeholder="Password" style="margin-top: 5px">
					<input type="submit" class="form-control" style="margin-top: 10px" value="Login" id="submit">
		</div>
</body>
</html>