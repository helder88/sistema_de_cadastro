<head>
	<style type="text/css">
		#a-cpf{
			justify-content: center;
			text-align: center;
			text-decoration: none;
			color: #fff;
			background-color: #696969;
			border: solid 1px #696969;
			padding: 5px;
		}
	</style>
</head>
<div id="cadastro" class="div-dados"><!--Pessoa fisica-->
	<input type="hidden" name="tipo" value="cpf">
	<div class="form-group row">
  		<label class="col-md-3" for="nome">Nome:</label>  
		<input id="nome" name="nome" type="text" class="col-md-9" required> 
	</div>
	<div class="form-group row">
	  	<label class="col-md-3" for="cpf">CPF:</label>  
		<input id="cpf" name="cpf" type="text" class="col-md-4" required>
		<button type="button" id="btn-edit" title="Mudar?"><img src="img/editt.png"></button> 
	</div>
	<div class="form-group row">
	  	<label class="col-md-3" for="profissao">Profissão:</label>  
		<input id="profissao" name="profissao" type="text" class="col-md-9" required> 
	</div>
	<div class="form-group row">
	  	<label class="col-md-3" for="are_atuacao">Área de Atuação:</label>  
		<input id="are_atuacao" name="are_atuacao" type="text" class="col-md-9" required>
	</div>
	<div class="form-group row">
	  	<label class="col-md-3" for="formacao_acad">Formação Acadêmica</label>  
		<input id="formacao_acad" name="formacao_acad" type="text" class="col-md-4" required> 
	</div>
</div><!--fim dados pessoa fisica-->

<script type="text/javascript">
	//pegar valor para o campo cpf
	var cpf = $("#cpfcnpj").val();
    $("#cpf").val(cpf);

	//marcara cpf
	$("#cpf").mask("999.999.999-99");
</script>
<script src="js/funcoes.js"></script>