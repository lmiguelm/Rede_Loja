<?php

	include("classeCabecalho.php");
	$c = new Cabecalho($parametros);
	$c->exibe();	
	$c->exibe_menu();
	include("classeBancoDeDados.php");
	
	$operacao = new BancoDeDados($conexao);
	
	$operacao->remocao($_GET["tabela"],$_GET["id"]);
	
	header('location: listar_'.$_GET["tabela"].'.php?');
?>