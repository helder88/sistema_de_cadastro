//mostrar os municipios no select
$(document).ready(function(e) {
	$("#uf").change(function(){
		var id = $(this).val();
		$.ajax({
			type:"POST",
			url:"controle/cidades.php?id="+id,
			dataType:"text",
			success: function(res){
				$("#municipio").children(".cidade").remove();
				$("#municipio").append(res);
			}
		});
	});
});

//aparecer o btn de CPF/CNPJ
$(document).ready(function(e) {
	$("#btn-edit").click(function(){
		$(".cpfcnpj").slideDown();
		$(".div-tipo-cadastro").slideUp(); 
	});	
});

//tabela tipo contato
$(document).ready(function(e) {	
	$(".td-agend").click(function(){
		$(".td-agend").css("background","none");		
		$(this).css("background-color","#BEBEBE");
		var contato = $(this).text();
		$("#contato").text(contato);
		$("#ipt-contato").val(contato);
	});
});