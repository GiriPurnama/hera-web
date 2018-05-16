<?php
	session_start();
	if(empty($_SESSION["username"] && $_SESSION["password"])){
		header("Location: index.php");
		exit(); 
	}
?>