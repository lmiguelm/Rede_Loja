<?php


	include("classeCabecalho.php");
	$parametros["logotipo"]="listar_loja.php";
	$c = new Cabecalho($parametros);
	$c->exibe();	
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");


	include("form_loja.php");
	echo"<br/><br/>";

	if(isset($_GET["remove"]))
	{
		echo "<center>Loja removida com sucesso!</center>";
	}
	if(isset($_GET["insere"]))
	{
		echo "<center>Loja inserida com sucesso!</center>";
	}


	$tabela[]="loja";
	$tabela[]="cidade";
	$tabela[]="estado";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "id_loja as ID";
	$coluna[]= "razao_social as 'Razão Social'";
	$coluna[]= "nome_fantasia as 'Nome Fantasia'";
	$coluna[]= "email as Email";
	$coluna[]= "cidade.nome as Nome";
	$coluna[]= "estado.sigla as UF";
	
	$condicao = null;
	$ordenacao = "razao_social";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	
	$t = new Tabela($m,"loja",true,true);
	try{
		$t->exibe();
	}
	catch(Exception $e){
		$e->get_message();
	};

?>
<script src="js/jquery-3.3.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/validaform.min.js"></script>
 <script src="js/alterar_loja.js"></script>