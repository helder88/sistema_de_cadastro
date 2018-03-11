<?php 
	session_start();
	if(!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])){
		echo "<script> alert('Faça login ou cadastre-se para continuar!'); </script>";
		echo "<meta http-equiv='refresh' content='0, url=login.php'>";
		exit;
	}
?>
<meta content="">