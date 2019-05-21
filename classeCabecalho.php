<?php

	include("interfaceExibicao.php");

	class Cabecalho implements Exibicao{
	
		private $charset;
		private $title;
		private $links;
		private $scripts;
		
		public function __construct($parametros){
			$this->charset = $parametros["charset"];
			$this->title = $parametros["title"];
			if(isset($parametros["links"])){
				$this->links = $parametros["links"];
			}
			if(isset($parametros["scripts"])){
				$this->scripts = $parametros["scripts"];
			}
		}
		
		public function exibe(){
			session_start();
			echo "<!DOCTYPE html>
					<html>
					<head>
						 <meta name='viewport' 
							content='width=device-width, initial-scale=1' />
						<meta charset='$this->charset' />
						 <title>$this->title</title>";
			if($this->links!=null){
					foreach($this->links as $i=>$l){
						echo "<link rel='stylesheet' href='$l' />";
					}
			}			 
			if($this->scripts!=null){
					foreach($this->scripts as $i=>$s){
						echo "<script type='text/javascript' src='$s'></script>";
					}
			}
			echo "
					</head>	
						<body>";
		}

		public function exibe_menu(){
			
			echo
			'
				<nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top">
					   
				 	<a href="index.php" class="navbar-brand logotipo">
			 			<img src="img/redes_de_lojas.jpg" alt="Logotipo"/>
			 			<b>Rede Loja</b>
			 		</a>

			 		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
		 				<span class="navbar-toggler-icon"></span>
		 			</button>

			 		<div class="collapse navbar-collapse" id="menu">
				 		<ul class="nav navbar-nav">
							<li class="nav-item"><a class="nav-link" href="listar_estado.php">Estado</a></li>
							<li class="nav-item"><a class="nav-link" href="listar_loja.php">Loja</a></li>
							<li class="nav-item"><a class="nav-link" href="listar_cidade.php">Cidade</a></li>
							<li class="nav-item"><a class="nav-link" href="listar_cliente_loja.php">Clientes por loja</a></li>
							<li class="nav-item"><a class="nav-link" href="listar_cliente.php">Cliente</a></li>
							<li class="nav-item"><a class="nav-link" href="form_duvida.php">Duvidas</a></li>
						</ul>

						<div class="navbar-nav flex-row ml-md-auto  d-md-flex">
		 					<h6><a class="nav-link" href="logout.php">Sair</a></h6>
		 				</div>
					</div>
		 		</nav>

		 		<div class="corpo">
			';
		}
	
	}
	$parametros["charset"]="utf-8";
	$parametros["title"]="Rede Loja";
	$parametros["links"][] = "css/bootstrap.min.css";
	$parametros["links"][] = "css/login.css";
	$parametros["links"][] = "css/menu.css";
?>


	