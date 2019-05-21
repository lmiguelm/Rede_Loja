<?php
	include("classeForm.php");
	include("autenticacao.php");
	include("conexao.php");
	
	
	$parametros = null;
	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="cidade";
		$coluna[]= "nome";
		$coluna[]= "cod_estado";
		$condicao[] = " id_cidade=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=cidade&id=".$_GET["id"];
	}
	else{
		$resultado[0]["nome"] = "";
		$resultado[0]["cod_estado"] = "";
		$parametros["action"] = "insere.php?tabela=cidade";
	}
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "nome";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["nome"];
	$parametros["placeholder"] = "Digite a cidade...";	
	$parametros["class"]="form-control";
	$parametros["required"]="required";
	$f->add_input($parametros);

	$consulta = "SELECT id_estado as value, sigla as label FROM estado ORDER BY nome";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$estados[] = $linha;
	}	
	$f->add_select("cod_estado",$estados,$resultado[0]["cod_estado"]);
	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
