<?php
	include('conexao.php');
	$data = $_GET['data'];
	$sql= $conn -> query("SELECT hora FROM horario WHERE hora NOT IN (SELECT hora FROM agenda where `data` = '$data')");
	$teste = 0;
	
	while ($dados = $sql->fetch_assoc()) {			
		if ($teste==0) {
			echo "<tr>";
			echo "<td class='td-hora'>$dados[hora]</td>";				
			$teste = $teste +1;
		}elseif($teste>0 && $teste<=1){
			echo "<td class='td-hora'>$dados[hora]</td>";
			$teste = $teste +1;
		}else{
			echo "<td class='td-hora'>$dados[hora]</td>";
			echo "</tr>";
			$teste = 0;
		}
	}
?>

<script type="text/javascript">
	$(document).ready(function(e) {	
		$(".td-hora").click(function(){
			$(".td-hora").css("background","none");		
			$(this).css("background","#BEBEBE");
			var hora = $(this).text();
			$("#hora").text(hora);
			$("#ipt-hora").val(hora);
		});
	});
</script>