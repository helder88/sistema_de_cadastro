<?php include('conexao.php') ?>
<?php

	$date = $_POST['data'];
	$hora = $_POST['hora'];
	$contato = $_POST['contato'];
	$conhec = $_POST['radio'];
	$outro;
	if ($conhec=="op1") {
		$outro = "Indicação: ".$_POST['terceiros'];
	}elseif(($conhec=="op2")){
		$outro = "Outro: ".$_POST['outro'];
	}else{
		$outro = $conhec;
	}

	$conn -> query("INSERT INTO `agenda` (`data`, `hora`, `forma_contato`, `forma_conhec`) VALUES ('$date', '$hora', '$contato', '$outro');") or die("Erro ao inserir");
	echo "<meta http-equiv='refresh' content='0, url=../agendamento.php'>";
	echo "<script>alert('Agendamento realizado com sucesso!');</script>";
 ?>