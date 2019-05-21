<?php

	
	include("autenticacao.php");
	include("classeForm.php");

	$parametros = null;
	$parametros["action"] = "insere.php?tabela=estado";
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros = array("name"=>"nome","type"=>"text","placeholder"=>"Digite o nome do estado...");	
	$parametros["class"]="form-control";
	$parametros["required"]="required";
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros = array("name"=>"sigla","type"=>"text","placeholder"=>"Digite sigla...");
	$parametros["class"]="form-control";
	$parametros["required"]="required";
	$f->add_input($parametros);
	
	$parametros = "Enviar";
	$f->add_button($parametros);

	$f->exibe();
	
?>

 
	
	