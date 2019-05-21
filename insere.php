<?php
	include("classeCabecalho.php");
	$c = new Cabecalho($parametros);
	$c->exibe();	
	$c->exibe_menu();
	
	include("classeBancoDeDados.php");
		
	print_r($_POST);

	$operacao = new BancoDeDados($conexao);
	$operacao->insercao($_GET["tabela"],$_POST);

	if($_GET["tabela"]=="usuario")
	{
		header('location: form_login.php?cadastrado');
	}
	else
	{
		header('location: listar_'.$_GET["tabela"].'.php?insere');
	}
?>