<?php
	include("classeForm.php");
	include("autenticacao.php");
	include("conexao.php");
	
	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=cliente_loja";
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$consulta = "SELECT id_cliente as value, nome as label 
							FROM cliente ORDER BY nome";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$clientes[] = $linha;
	}	
	$f->add_select("cod_cliente",$clientes, null);


	$consulta = "SELECT id_loja as value, nome_fantasia as label 
							FROM loja ORDER BY nome_fantasia";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$lojas[] = $linha;
	}	
	$f->add_select("cod_loja",$lojas, null);
	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validaform.min.js"></script>
<script src="js/alterar_cliente_loja.js"></script>
