<?php
	include("classeCabecalho.php");
	$parametros["logotipo"]="form_login.php";
	$c = new Cabecalho($parametros);
	$c->exibe();
	include("classeForm.php");
	include("classeLogin.php");

	if(isset($_GET["cadastrado"]))
	{
		echo "Usuario cadastrado com sucesso!";
	}	
	$parametros["action"]="validacao.php";
	$parametros["method"]="post";
	
	$f = new Form($parametros);
	
	$parametros=null;
	$parametros["type"]="email";
	$parametros["name"]="email";
	$parametros["class"]="form-control";
	$parametros["required"]="required";
	$parametros["placeholder"]="Digite o usuário...";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="password";
	$parametros["name"]="senha";
	$parametros["class"]="form-control password";
	$parametros["required"]="required";	
	$parametros["data_cript"]="sha1";	
	$parametros["placeholder"]="Digite a senha...";
	$f->add_input($parametros);
	
	if(isset($_GET["erro"])){
		echo "Login e/ou senha inválidos.<hr />";
	}
	
	$parametros=null;
	$parametros["logo"]="img/to-do.jpg";
	$login = new Login($parametros,$f);

	$login->exibe();

?>

 <script src="js/jquery-3.3.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/validaform.min.js"></script>
</body>
</html>