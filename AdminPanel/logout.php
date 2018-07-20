<?php
	session_start();
	unset($_SESSION["user"]);
	unset($_SESSION["mapq"]);
	header("Location: index.php");
?>