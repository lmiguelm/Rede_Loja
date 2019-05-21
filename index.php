<?php
	
	include("classeCabecalho.php");
	$parametros["logotipo"]="index.php";
	$c = new Cabecalho($parametros);
	$c->exibe();		
	$c->exibe_menu();	
?>

<div class="text-center">
	<h1>Bem-vindo(a)</h1>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validaform.min.js"></script>
<script src="js/alterar_estado.js"></script>