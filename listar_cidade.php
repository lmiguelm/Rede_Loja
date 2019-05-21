<?php


	include("classeCabecalho.php");
	$parametros["logotipo"]="listar_cidade.php";
	$c = new Cabecalho($parametros);
	$c->exibe();	
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	
	include("form_cidade.php");
	echo"<br/><br/>";


	if(isset($_GET["remove"]))
	{
		echo "<center>Cidade removida com sucesso!</center>";
	}
	if(isset($_GET["insere"]))
	{
		echo "<center>Cidade inserida com sucesso!</center>";
	}
	

	$tabela[]="cidade";
	$tabela[]="estado";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "id_cidade as ID";
	$coluna[]= "cidade.nome as Nome";
	$coluna[]= "estado.sigla as UF";
	
	$condicao = null;
	$ordenacao = "nome";

	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		


	$t = new Tabela($m,"cidade",true,true);
	
	$t->exibe();

?>
 <script src="js/jquery-3.3.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/validaform.min.js"></script>
 <script src="js/alterar_cidade.js"></script>