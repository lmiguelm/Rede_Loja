<?php

	include("classeCabecalho.php");
	$parametros["logotipo"]="listar_estado.php";
	$c = new Cabecalho($parametros);
	$c->exibe();	
	$c->exibe_menu();

	include("classeTabela.php");
	include("classeBancoDeDados.php");
	
	include("form_estado.php");
	echo"<br/><br/>";

	if(isset($_GET["remove"]))
	{
		echo "<center>Estado removido com sucesso!</center>";
	}
	if(isset($_GET["insere"]))
	{
		echo "<center>Estado inserido com sucesso!</center>";
	}

	$tabela[]="estado";
	
	$coluna[]= "id_estado as ID";
	$coluna[]= "nome as Nome";
	$coluna[]= "sigla as UF";
	
	$condicao = null;
	$ordenacao = "nome";

	$bd = new BancoDeDados($conexao);
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$t = new Tabela($m,"estado",true,true);
	
	$t->exibe();

?>

 <script src="js/jquery-3.3.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/validaform.min.js"></script>
 <script src="js/alterar_estado.js"></script>