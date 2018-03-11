<?php include('conexao.php');?>
<?php
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql = $conn -> query("select * from p_fisica where usuario ='$usuario' and senha = '$senha'");
$dados = $sql->fetch_assoc();
$row = $sql->num_rows;

if ($row >0){
	session_start();
	$_SESSION['usuario'] = $_POST['usuario'];
	$_SESSION['senha'] = $_POST['senha'];
	header("Location: ../cliente/index_cliente.php");
}else{
	echo "<script>alert('Ops! Seus dados estão incorretos!'); history.back();</script>";
}
?>