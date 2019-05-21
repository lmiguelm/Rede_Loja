<?php


	include("classeCabecalho.php");
	$parametros["logotipo"]="listar_cliente_loja.php";
	$c = new Cabecalho($parametros);
	$c->exibe();	
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	
	include("form_cliente_loja.php");
	echo"<br/><br/>";
	
	if(isset($_GET["remove"]))
	{
		echo "<center>Dado removido com sucesso!</center>";
	}
	if(isset($_GET["insere"]))
	{
		echo "<center>Dado inserido com sucesso!</center>";
	}

	$tabela[]="info_cliente_loja";


	$bd = new BancoDeDados($conexao);
	
	
	$coluna[]= "ID";
	$coluna[]= "Cliente";
	$coluna[]= "Loja";
	$coluna[]= "Cidade";
	$coluna[]= "Estado";


	
	$condicao = null;
	$ordenacao = null;
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"cliente_loja",true,true);
	
	$t->exibe();

?>
<script src="js/jquery-3.3.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/validaform.min.js"></script>
 <script src="js/alterar_estado.js"></script>