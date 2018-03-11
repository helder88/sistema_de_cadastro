<?php 
	session_start();
	session_destroy();
	header("Location: ../geral/login.php");
?>