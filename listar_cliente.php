<?php


	include("classeCabecalho.php");
	$parametros["logotipo"]="listar_cliente.php";
	$c = new Cabecalho($parametros);
	$c->exibe();	
	$c->exibe_menu();
	
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	
	include("form_cliente.php");
	echo"<br/><br/>";

	if(isset($_GET["remove"]))
	{
		echo "<center>Cliente removido com sucesso!</center>";
	}
	if(isset($_GET["insere"]))
	{
		echo "<center>Cliente inserido com sucesso!</center>";
	}

	$tabela[]="cliente";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "id_cliente as ID";
	$coluna[]= "nome as Nome";
	$coluna[]= "email as Email";
	$coluna[]= "sexo as Sexo";
	$coluna[]= "data_nascimento as 'Data de Nascimento'";


	$condicao = null;
	$ordenacao = "nome";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"cliente",true,true);
	
	$t->exibe();

?>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validaform.min.js"></script>
<script src="js/alterar_cliente.js"></script>