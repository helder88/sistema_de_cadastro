<?php 
	include('conexao.php');
	$id =$_GET['id'];
	$id_estado = $conn->query("select UF_ID from estado where UF_NOME ='$id'");
	$estado = $id_estado ->fetch_assoc();
	$sql= $conn -> query("select * from cidade where CT_UF = '$estado[UF_ID]'");
	while ($dados = $sql->fetch_assoc()) {
		echo '<option class="cidade" value="'.$dados['CT_NOME'].'">'.$dados['CT_NOME'].'</option>';
	}
 ?>