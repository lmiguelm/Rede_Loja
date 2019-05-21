<?php

	
	include("autenticacao.php");
	include("classeForm.php");

	include("conexao.php");

	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=loja";
	$parametros["method"] = "post";
	
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "razao_social";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite a Razão Social da Empresa...";	
	$parametros["class"]="form-control";
	$parametros["required"]="required";
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "nome_fantasia";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o Nome Fantasia da Empresa...";	
	$parametros["class"]="form-control";
	$parametros["required"]="required";
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "email";
	$parametros["type"] = "email";
	$parametros["placeholder"] = "Digite o email da Empresa...";	
	$parametros["class"]="form-control";
	$f->add_input($parametros);	

	$consulta = "SELECT id_cidade as value, 
						cidade.nome as label 
							FROM cidade 
							INNER JOIN estado
								ON cidade.cod_estado=estado.id_estado
						ORDER BY cidade.nome";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$cidades[] = $linha;
	}	
	$f->add_select("cod_cidade",$cidades, null);

	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
?>