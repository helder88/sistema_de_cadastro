<?php include('conexao.php') ?>
<?php 
	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);
	$tipo = $_POST['tipo'];

	if($tipo =="cpf"){
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$profissao = $_POST['profissao'];
		$are_atuacao = $_POST['are_atuacao'];
		$formacao_acad = $_POST['formacao_acad'];
	}elseif($tipo =="cnpj"){
		$empresa = $_POST['empresa'];
		$cnpj = $_POST['cnpj'];
		$segmento = $_POST['segmento'];
		$atividade = $_POST['atividade'];
		$porte = $_POST['porte'];
		$n_funcion = $_POST['n_funcionario'];
		$p_contato = $_POST['p_contato'];
		$cargo = $_POST['cargo'];
	}else{
		echo "<script>alert('Selecione um tipo de cadastro!'); history.back();</script>";
	}

	$uf = $_POST['uf'];
	$municipio = $_POST['municipio'];
	$cep = $_POST['cep'];
	$endereco = $_POST['endereco'];
	$logradouro = $_POST['logradouro'];
	$complemento = $_POST['complemento'];
	$telefone = $_POST['telefone'];
	$celular = $_POST['celular'];
	$email = $_POST['email'];
	$site = $_POST['site'];

	if(isset($_POST['ace_novidade'])){
		$ace_novidade = $_POST['ace_novidade'];
	}else{
		$ace_novidade = null;
	}

	$select1 = $conn->query("select * from p_fisica where usuario = '$usuario'");
	$num1 = $select1->num_rows;
	$row1 = $select1->fetch_assoc();
	$select2 = $conn->query("select * from p_fisica where email = '$email'");
	$row2 = $select2->fetch_assoc();
	$num2 = $select2->num_rows;

	$select3 = $conn->query("select * from p_juridica where usuario = '$usuario'");
	$row3 = $select3->fetch_assoc();
	$num3 = $select3->num_rows;
	$select4 = $conn->query("select * from p_juridica where email = '$email'");
	$row4 = $select4->fetch_assoc();
	$num4 = $select4->num_rows;

	if($num1>0){
		echo "<script>alert('Usuário já existente! Por favor tente ou nome!'); history.back();</script>";
	}elseif($num3>0){
		echo "<script>alert('Usuário já existente! Por favor tente ou nome!'); history.back();</script>";
	}elseif($num2>0){
		echo "<script>alert('E-mail já existente! Por favor use um e-mail diferente!'); history.back();</script>";
	}elseif($num4>0){
		echo "<script>alert('E-mail já existente! Por favor use um e-mail diferente!'); history.back();</script>";
	}elseif ($tipo =="cpf") {
		if($ace_novidade != ""){
			$conn -> query("INSERT INTO `p_fisica` (`usuario`, `senha`, `nome`, `cpf`,`profissao`, `area_atuacao`, `formacao_acad`, `uf`, `municipio`, `cep`, `endereco`, `n_logradouro`, `complemento`, `telefone`, `celular`, `email`, `site`, `rec_novidades`) VALUES ('$usuario', '$senha', '$nome', '$cpf', '$profissao', '$are_atuacao', '$formacao_acad', '$uf', '$municipio', '$cep', '$endereco', '$logradouro', '$complemento', '$telefone', '$celular', '$email', '$site', '$ace_novidade');") or die("Erro ao inserir");
			echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
			echo "<meta http-equiv='refresh' content='0, url=../login.php'>";
		}else{
			$conn -> query("INSERT INTO `p_fisica` (`usuario`, `senha`, `nome`, `cpf`,`profissao`, `area_atuacao`, `formacao_acad`, `uf`, `municipio`, `cep`, `endereco`, `n_logradouro`, `complemento`, `telefone`, `celular`, `email`, `site`) VALUES ('$usuario', '$senha', '$nome', '$cpf', '$profissao', '$are_atuacao', '$formacao_acad', '$uf', '$municipio', '$cep', '$endereco', '$logradouro', '$complemento', '$telefone', '$celular', '$email', '$site');") or die("Erro ao inserir!");
			echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
			echo "<meta http-equiv='refresh' content='0, url=../login.php'>";
		}
	}elseif($tipo == "cnpj"){
		if($ace_novidade != ""){
			$conn -> query("INSERT INTO `p_juridica` (`usuario`, `senha`, `empresa`, `cnpj`, `segmento`, `atividade`, `porte`, `n_funcion`, `p_contato`, `cargo`, `uf`, `municipio`, `cep`, `endereco`, `n_logradouro`, `complemento`, `telefone`, `celular`, `email`, `site`, `rec_novidades`) VALUES ('$usuario', '$senha', '$empresa', '$cnpj', '$segmento', '$atividade', '$porte', '$n_funcion', '$p_contato', '$cargo', '$uf', '$municipio', '$cep', '$endereco', '$logradouro', '$complemento', '$telefone', '$celular', '$email', '$site', '$ace_novidade');") or die("Erro ao inserir!");
			echo "<script>alert('Empresa cadastrada com sucesso!');</script>";
			echo "<meta http-equiv='refresh' content='0, url=../login.php'>";
		}else{
			$conn -> query("INSERT INTO `p_juridica` (`usuario`, `senha`, `empresa`, `cnpj`, `segmento`, `atividade`, `porte`, `n_funcion`, `p_contato`, `cargo`, `uf`, `municipio`, `cep`, `endereco`, `n_logradouro`, `complemento`, `telefone`, `celular`, `email`, `site`) VALUES ('$usuario', '$senha', '$empresa', '$cnpj', '$segmento', '$atividade', '$porte', '$n_funcion', '$p_contato', '$cargo', '$uf', '$municipio', '$cep', '$endereco', '$logradouro', '$complemento', '$telefone', '$celular', '$email', '$site');") or die("Erro ao inserir!");
			echo "<script>alert('Empresa cadastrada com sucesso!');</script>";
			echo "<meta http-equiv='refresh' content='0, url=../login.php'>";
		}
	}else{
		echo "<script>alert('Erro, tipo de cadastro não selecionado!');</script>";
	}
	
 ?>