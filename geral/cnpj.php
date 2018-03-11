<head>
	<style type="text/css">
		#a-cnpj{
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
<div id="cadastro" class="div-dados"><!--Pessoa juridica-->
	<input type="hidden" name="tipo" value="cnpj">
	<div class="form-group row">
	  	<label class="col-md-3" for="empresa">Nome da Empresa:</label> 
		<input id="empresa" name="empresa" type="text" class="col-md-4" required>						 
	</div>
	<div class="form-group row">
	  	<label class="col-md-3" for="cnpj">CNPJ:</label> 
		<input id="cnpj" name="cnpj" type="text" class="col-md-4" required>
		<button type="button" id="btn-edit" title="Mudar??"><img src="img/editt.png"></button>
	</div>
	<div class="form-group row">
		<label class="col-md-3" for="segmento">Segmento:</label> 
  		<select class="form-control col-md-3" id="segmento" name="segmento" required>
  			<option value="">selecione</option>
		    <option value="Industria">Indústria</option>
		    <option value="Agroindústria">Agroindústria</option>
		    <option value="Comércio">Comércio</option>
		    <option value="Serviços">Serviços</option>
		    <option value="Rural">Rural</option>
		    <option value="Outro">Outro</option>
		</select>
	</div>
	<div class="form-group row">
	  	<label class="col-md-3" for="atividade">Setor de Atividade:</label> 
		 <input id="atividade" name="atividade" type="text" class="col-md-4" required>						 
	</div>
	<div class="form-group row">
		<label class="col-md-3" for="porte">Porte:</label> 
  		<select class="form-control col-md-3" id="porte" name="porte" required>
		    <option value="">Faturamento Anual</option>
		    <option value="até R$ 360.000,00 a.a.">até R$ 360.000,00 a.a.</option>
		    <option value="até R$ 3.600.00,00 a.a.">até R$ 3.600.00,00 a.a.</option>
		    <option value="até R$ 16.000.000,00 a.a.">até R$ 16.000.000,00 a.a.</option>
		    <option value="até R$ 90.000.000,00 a.a.">até R$ 90.000.000,00 a.a.</option>
		    <option value="até R$ 300.000.000,00 a.a.">até R$ 300.000.000,00 a.a.</option>
		    <option value="acima de R$ 300.000.000,00 a.a.">acima de R$ 300.000.000,00 a.a.</option>
		</select>
	</div>
	<div class="form-group row">
		<label class="col-md-3" for="n_funcionario">Nº de Funcionarios:</label> 
  		<select class="form-control col-md-3" id="n_funcionario" name="n_funcionario" required>
		    <option value="">selecione</option>
		    <option value="até 19">até 19</option>
		    <option value="até 99">até 99</option>
		    <option value="até 499">até 499</option>
		    <option value="até 500">acima de 500</option>
		</select>
	</div>
	<div class="form-group row">
	  	<label class="col-md-3" for="p_contato">Pessoa de Contato:</label> 
		 <input id="p_contato" name="p_contato" type="text" class="col-md-4" required>
		 <label class="col-md-2 text-right" for="cargo">Cargo:</label> 
		 <input id="cargo" name="cargo" type="text" class="col-md-3" required>						 
	</div>
</div><!--fim dados pessoa juridica-->

<script type="text/javascript">
	//pegar valor para o campo cnpj
	var cnpj = $("#cpfcnpj").val();
    $("#cnpj").val(cnpj);

	//mascara cnpj	
	$("#cnpj").mask("99.999.999/9999-99");
</script>
<script src="js/funcoes.js"></script>