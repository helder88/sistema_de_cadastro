<?php 
	include('controle/conexao.php');
	include('controle/sessao.php');
?>
<?php 
	$sql= $conn -> query("select `data` from agenda");
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include('includes/head.php') ?>
</head>
<body>
	<?php include('includes/menu_p_fisica.php') ?>
	<div class="container">
		<div class="row justify-content-center">			
			<div class="col-md-12 row justify-content-center">
				<h3 class="mt-4 col-md-12">Agora faça seu agendamento</h3>
				<h4 class="mt-4 col-md-12">DIA</h4>
				<div id="calendar" class="col-md-5">
					
				</div>
			</div>
			<div class="col-md-12 row" style="margin-top: 35em">
				<h4 class="col-md-2">FORMA</h4>
				<div class="col-md-8 row">
					<label class="col-md-1">Via:</label>
					<table class="col-md-10">
						<thead>
							<tr>
								<td class="td-espaco"></td>
								<td class="td-agend">Telefone</td>
								<td class="td-espaco"></td>
								<td class="td-agend">E-mail</td>
								<td class="td-espaco"></td>
								<td class="td-agend">Skype</td>
								<td class="td-espaco"></td>
								<td class="td-agend">Precencial</td>
								<td class="td-espaco"></td>
							</tr>
						</thead>
					</table>
				</div>
			</div>

			<div class="col-md-12 row mt-4">
				<h4 class="col-md-3">HORÁRIO</h4>				
				<div class="col-md-6">
					<table>
						<thead>
							<tr>
								<td class="td-turno" colspan="3">HORÁRIOS DISPONÍVEIS</td>
							</tr>
						</thead>
						<tbody id="hora_corres">							
							<!--Exibir horarios-->
							<tr>
								<td class="td-hora" colspan="3">Selecione uma data</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<form action="controle/agendar.php" method="post">
		  	<div class="row form-conhecimento"> <!-- Fomulario do como tomou conhecimento da empresa-->
		  		<label class="col-md-12"><strong>Favor informar como tomou conhecimento ACSERT SOLUÇÕES EMPRESARIAIS</strong></label>
			  	<div class="col">
			  		<div class="form-check">
					  	<label class="form-check-label">
					    	<input class="form-check-input" type="radio" id="radio" value="Internet" name="radio">
					    	Internet
					  	</label>
					</div>
					<div class="form-check">
					  	<label class="form-check-label">
					    	<input class="form-check-input" type="radio" id="radio" value="Contato Telefônico" name="radio"> 
					    	Contato Telefônico
					  	</label>
					</div>				
			  	</div>
			  	<div class="col">		  		
			  		<div class="form-check">
					  	<label class="form-check-label">
					    	<input class="form-check-input" type="radio" id="radio" value="Cartazes e Panfletos" name="radio">
					    	Cartazes e Panfletos
					  	</label>
					</div>
					<div class="form-check">
					  	<label class="form-check-label">
					    	<input class="form-check-input" type="radio" id="radio" value="op1" name="radio">
					    	Indicação de Terceiros
					  	</label>
					  	<label style="padding-left: 16px">
					  		<strong>Quem indicou: </strong>
					  		<input type="text" id="ipt-op" name="terceiros" class="col-lg-5 ipt-check">
					  	</label>				  	
					</div>				
			  	</div>
			  	<div class="col">
			  		<div class="form-check">
					  	<label class="form-check-label">
					    	<input class="form-check-input" type="radio" id="radio" value="Imprensa (radio, jornal, TV)" name="radio">
					    	Imprensa (radio, jornal, TV)
					  	</label>
					</div>
					<div class="form-check">
					  	<label class="form-check-label">
					    	<input class="form-check-input" type="radio" id="radio" value="op2" name="radio">
					    	Outro: <input id="ipt-op2" type="text" name="outro" class="col-lg-5 ipt-check">
					  	</label>
					</div>				
			  	</div>
		  	</div><!-- fim do fomulario do como tomou conhecimento da empresa-->
		  	<!--==================-Modal==========================-->

			<div align="center" class="open-modal">
			  <!-- Button to Open the Modal -->
				<button id="conf" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				    CONFIRMAR
			  	</button>
		  	</div>
			<!-- The Modal -->
		  <div class="modal fade" id="myModal" data-backdrop="static">
		    	<div class="modal-dialog">
		      		<div class="modal-content">	      
		        <!-- Modal Header -->
				        <div class="modal-header">
				          <h4 class="modal-title md-ag-title">Confirmar agendamento:</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>	        
		        <!-- Modal body -->
				        <div class="modal-body row">
				         	 	<label class="col-md-2 ag-titulo">Data:</label>
				         	 	<label class="col-md-9 mdb-ag-dados" id="data"></label>	         	 	
				         	 	<label class="col-md-2 ag-titulo">Horário: </label>
				         	 	<label class="col-md-9 mdb-ag-dados" id="hora"></label>
				         	 	<label class="col-md-2 ag-titulo"> Contato: </label>
				         	 	<label class="col-md-9 mdb-ag-dados" id="contato"></label>
				        </div>	        
		        <!-- Modal footer -->
				        <div class="footer-modal">
				        	<div class="row">
				        		 <!--inputs dos dados do agendamento-->
					        	<input type="hidden" id="ipt-data" name="data" value="">
					        	<input type="hidden" id="ipt-hora" name="hora" value="">
					        	<input type="hidden" id="ipt-contato" name="contato" value="">
					           	<div class="col div-btn-conf"> 
					        		<button type="submit" class="btn btn-success btn-block">CONFIRMAR</button>
					        	</div>
					        	<div class="col div-btn-canc">
					        		<button type="button" class="btn btn-danger btn-block" data-dismiss="modal">CANCELAR</button>
					        	</div>			          	
				          </div>
				        </div>	        
		      		</div>
		    	</div>
		    </form>
	  	</div>
  </div>

<script>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			eventLongPressDelay: false,
			selectLongPressDelay: 0,
			height: 460,		
			header: {
				left: 'prev',
				center: 'title',
				right: 'next'
			},
			defaultDate: Date(),
			navLinks: false, // can click day/week names to navigate views
			selectable: true,
			selectHelper: true,
			dayClick: function(date, jsEvent, view) {
				$(".fc-day").css('background', 'none');
				$(".fc-highlight").css('background', 'none');
		        $(this).css('background', '#BEBEBE');
		    },
			select: function(start, end) {								
				data = $.fullCalendar.formatRange(start, start, 'YYYY-MM-DD');
				dataformat = $.fullCalendar.formatRange(data, data, 'DD-MM-YYYY');
    			$("#ipt-data").val(data);
    			$("#data").text(dataformat);
    			$.ajax({
					type:"POST",
					url:"controle/hora_age.php?data="+data,
					dataType:"text",
					success: function(res){
						$("#hora_corres").children(this).remove();
						$("#hora_corres").append(res);
					}
				});
			},

			editable: false,
			eventLimit: false, // allow "more" link when too many events
			events: [				
					<?php while ($dados = $sql->fetch_assoc()){ ?>
						{
						start: '<?php echo $dados['data'];?>',
						rendering: 'background',
						color: 'rgba(255,0,0,1)'
				    	},
				    <?php } ?>
			]
		});	
	});		
</script>
</body>
</html>