<?php
	$con = new MySQLi("localhost","root","","project");
	if($con->error)
	{
		echo ("Connection error!");
	}
	mysqli_set_charset($con,"UTF8");
?>