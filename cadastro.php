<?php include('controle/conexao.php') ?>
<?php 
	 $sql= $conn -> query("select * from estado") or die(mysql_error());
	 $row = $sql->num_rows;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Pessoa Fiísca</title>
	<?php include('includes/head.php') ?>
</head>
<body>	
	<?php include('includes/menu.php') ?>
	<div class="container">		
		<div class="row form-cadastro">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<form action="controle/cadastrar.php" method="post" enctype="multpart/form-data">
					<div class="form-group row">
					  	<label class="col-md-3" for="usuario">Usuário:</label> 
						 <input id="usuario" name="usuario" type="text" class="col-md-4" maxlength="15" required>						 
					</div>
					<div class="form-group row">
					  	<label class="col-md-3" for="senha">Senha:</label>
						<input id="senha1" name="senha" type="password" class="col-md-4" required>
					</div>
					<div class="form-group row">
					  	<label class="col-md-3" for="senha2">Confirme a Senha:</label>
						<input id="senha2" type="password" class="col-md-4" required>
					</div>
					<div class="form-group row cpfcnpj">
					  	<label class="col-md-3" for="cpfcnpj">CPF/CNPJ:</label>
						<input id="cpfcnpj" name="cpfcnpj" type="number" class="col-md-4" maxlength="14" required>
					</div>
					<div id="slide">
						<div id="cadastro" class="div-tipo-cadastro"><!--Aparece os campos correspondentes ao tipo de cadastro-->
							
						</div>
					</div>					
					<div class="form-group row">
				  		<label class="col-md-3" for="uf">UF:</label> 
				  		<select class="form-control col-md-2" id="uf" name="uf" required>
				  			<option value="">selecione</option>
				  			<?php while ($dados = $sql->fetch_assoc()){ ?>
						    <option value="<?php echo $dados['UF_NOME']; ?>"><?php echo $dados['UF_NOME']; ?></option>
						    <?php } ?>
						</select>

						<label class="col-md-3 text-right" for="municipio">Município:</label> 
				  		<select class="form-control col-md-2" id="municipio" name="municipio" required>
				  			<option value="">selecione</option>
						</select>
					</div>
					<div class="form-group row">				  		
						<label class="col-md-3" for="cep">CEP:</label> 
				  		<input id="cep" name="cep" type="text" class="form-control col-md-2" required>
					</div>
					<div class="form-group row">
					  	<label class="col-md-3" for="endereco">Endereço:</label>
						<input id="endereco" name="endereco" type="text" class="col-md-9" required>    
					</div>
					<div class="form-group row">
				  		<label class="col-md-3" for="logradouro">Nº do Logradouro:</label> 
				  		<input id="logradouro" name="logradouro" type="number" class="col-md-3" required maxlength="4">
						<label class="col-md-3 text-right" for="complemento">Complemento:</label> 
				  		<input id="complemento" name="complemento" type="text" class="col-md-3">
					</div>
					<div class="form-group row">
				  		<label class="col-md-3" for="telefone">Telefone:</label>
				  		<input id="telefone" name="telefone" type="text" class="col-md-3" required>

						<label class="col-md-3 text-right" for="celular">Celular:</label>
				  		<input id="celular" name="celular" type="text" class="col-md-3" required>
					</div>
					<div class="form-group row">
					  	<label class="col-md-3" for="email">E-mail:</label>
						 <input id="email" name="email" type="email" class="col-md-9" required>
					</div>
					<div class="form-group row">
					  	<label class="col-md-3" for="site">Site:</label>
					  	<input id="site" name="site" type="text" class="col-md-9"> 
					</div>
					<div class="row" >
						<label class="col-md-4">Termo de Adesão</label> 
						<iframe src="documentos/termo.html" width="98%" height="70px" style="margin-left: 1.8%;"></iframe>
					</div>
					<div class="form-group row">
	    				<label class="col-md-12">
	      					<input type="checkbox" value="sim" required> Estou ciente e de acordo com o <a target="_blank" href="documentos/termo.html">TERMO DE ADESÃO</a>
	    				</label>
  					</div>
  					<div class="form-group row">
	    				<label class="col-md-12">
	      					<input type="checkbox"  name="ace_novidade" value="sim"> Aceito receber novidades, notícias e newslatter do portal <strong>AC SOLUÇÕES</strong> sobre a forma de e-mail
	    				</label>
  					</div>
  					<button id="conluir" type="submit" class="col-md-2 btn btn-md btn-block btn-default offset-md-10">CONCLUIR</button>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		//exibir os dados inseridos no CPF/CNPJ ao retornar, caso usuario ou e-mail já exista.
		window.onload = function(){		
		  	var cod = $("#cpfcnpj").val().length; 
		  	if(cod == 11){
		  		$("#cadastro").load("cpf.php#cadastro");
	        	$(".div-tipo-cadastro").slideDown();
	        	$(".cpfcnpj").slideUp();        
		    }else if(cod >=14){
		    	$("#cadastro").load("cnpj.php#cadastro");
	        	$(".div-tipo-cadastro").slideDown();
	        	$(".cpfcnpj").slideUp();        
		    }
		    //mostrar os muninicipios de caso retorne quando usuario ou email ja existe
		    var id = $("#uf").val();
			$.ajax({
				type:"POST",
				url:"controle/cidades.php?id="+id,
				dataType:"text",
				success: function(res){
					$("#municipio").children(".cidade").remove();
					$("#municipio").append(res);
				}
			});
		};

		//mascaras dos formularios
		$("#telefone").mask("(99) 9999-9999");
		$("#celular").mask("(99) 99999-9999");
		$("#cep").mask("99999-999");

		//mostrar e ocutar campos cadastro de pessoa fisica e juridica
		$(document).ready(function(e) {
			$("#cpfcnpj").keyup(function(e){		
		      	var tm = $("#cpfcnpj").val().length;
			    if(tm == 11){              
			        $("#texto").text("CPF");
			        $("#cadastro").load("cpf.php#cadastro");
			        e.preventDefault();
			        setTimeout(function(){
			        	$(".div-tipo-cadastro").slideDown();
			        	$(".cpfcnpj").slideUp();
			        }, 600);	        
			    }else if(tm >=14){
			        $("#texto").text("CNPJ");
			        $("#cadastro").load("cnpj.php#cadastro");
			        var cnpj = $("#cpfcnpj").val();
			        $("#cnpj").val(cnpj);
			        e.preventDefault();			
			        setTimeout(function(){
			        	$(".div-tipo-cadastro").slideDown();
			        	$(".cpfcnpj").slideUp();
			        }, 600);	        
			    }	    
		    });
		    $("#senha1").keyup(function(){
				var senha1 = $("#senha1").val();
				var senha2 = $("#senha2").val();		
				var p1 = $("#senha1").val().length;

				if (senha1 == senha2 && p1 >=6){
					$("#senha1").css("background", "#54FF9F");
					$("#senha2").css("background", "#54FF9F");
					$("#conluir").removeAttr("disabled");
					$("#conluir").removeAttr("title");
				}else{
					$("#senha").css("background", "#fff");
					$("#senha2").css("background", "#fff");
					$("#conluir").attr("disabled", "disabled");
					$("#conluir").attr("title", "As senhas não conferem");
				}
			});
			$("#senha2").keyup(function(){
				var senha1 = $("#senha1").val();
				var senha2 = $("#senha2").val();
				var p2 =$("#senha2").val().length;

				if (senha1 == senha2 && p2 >=6){
					$("#senha1").css("background", "#54FF9F");
					$("#senha2").css("background", "#54FF9F");
					$("#conluir").removeAttr("disabled");
					$("#conluir").removeAttr("title");
				}else{
					$("#senha2").css("background", "#fff");
					$("#senha1").css("background", "#fff");
					$("#conluir").attr("disabled", "disabled");
					$("#conluir").attr("title", "As senhas não conferem");
				}
			});
		});
	</script>
</body>
</html>