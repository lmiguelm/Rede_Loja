<?php
	include("classeForm.php");
	include("autenticacao.php");
	include("conexao.php");
	
	
	$parametros = null;

	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="cliente";
		$coluna[]= "nome";
		$coluna[]= "sexo";
		$coluna[]= "email";
		$coluna[]= "data_nascimento";
		$condicao[] = " id_cliente=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=cliente&id=".$_GET["id"];
	}
	else{
		$resultado[0]["nome"] = "";
		$resultado[0]["sexo"] = "";
		$resultado[0]["email"] = "";
		$resultado[0]["data_nascimento"] = "";
		$parametros["action"] = "insere.php?tabela=cliente";
	}


	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "nome";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["nome"];
	$parametros["placeholder"] = "Digite o nome do cliente...";	
	$parametros["class"]="form-control";
	$parametros["required"]="required";
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "sexo";
	$parametros["type"] = "radio";
	$parametros["opcoes"] = array("m"=>"Masc.","f"=>"Fem.");
	$parametros["label"] = "Sexo";
	$parametros["value"] = $resultado[0]["sexo"];	
	$parametros["class"]="form-control";
	$f->add_inputOpcoes($parametros);
	
	$parametros = null;
	$parametros["name"] = "email";
	$parametros["type"] = "email";
	$parametros["value"] = $resultado[0]["email"];	
	$parametros["placeholder"] = "Digite o email do cliente...";	
	$parametros["class"]="form-control";
	$parametros["required"]="required";
	$f->add_input($parametros);	

	$parametros = null;
	$parametros["name"] = "data_nascimento";
	$parametros["type"] = "date";
	$parametros["value"] = $resultado[0]["data_nascimento"];	
	$parametros["label"] = "Data de Nascimento";	
	$parametros["class"]="form-control";
	$parametros["required"]="required";
	$f->add_input($parametros);

	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
