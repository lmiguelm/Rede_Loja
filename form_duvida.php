<?php
	include("classeUsuario.php");
	include("classeCabecalho.php");
	$c = new Cabecalho($parametros);
	$c->exibe();	
	$c->exibe_menu();

	include("classeForm.php");
	include("conexao.php");
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	
	if(empty($_POST)){

		$parametros = null;	
		$parametros["action"]="form_duvida.php";
		$parametros["method"] = "post";
		
		$f = new Form($parametros);
		
		$parametros = null;
		$parametros["name"] = "titulo";
		$parametros["type"] = "text";
		$parametros["placeholder"] = "Titulo";	
		$parametros["class"]="form-control";
		$parametros["required"]="required";
		$f->add_input($parametros);

		$parametros = null;
		$parametros["name"] = "texto";
		$parametros["class"]="form-control textarea";
		$parametros["placeholder"] = "Texto";
		$parametros["required"]="required";
		$f->add_textarea($parametros);

		
		$parametros = "Enviar";
		$f->add_button($parametros);
		$f->exibe();
	}
	else{
		
		$titulo=$_POST["titulo"];
		$texto=$_POST["texto"];
		$email=$_SESSION["usuario"]->get_email();
		$nome=$_SESSION["usuario"]->get_nome();

		require_once('phpmailer/class.phpmailer.php');

		$mail=new PHPMailer();

		$mail->IsSMTP();

		$mail->Host='smtp.gmail.com';

		$mail->SMTPAuth=true;

		$mail->Username='lmiguelmarcelo1@gmail.com';

		$mail->Password='santosfc5678';

		$mail->SMTPSecure='tls';

		$mail->Port=587;

		$mail->From='lmiguelmarcelo1@gmail.com';

		$mail->FromName='IFSP - Araraquara / SP';

		$mail->AddAddress($email, $nome);

		$mail->isHTML(true);

		$mail->charSet='UTF-8';

		$mail->Subject=$titulo;

		$mail->Body='<html>
						<head>
							<meta charset="utf-8"/>
						</head>

						<body>
							<h1>'.$titulo.'</h1>
							<p>'.$texto.'</p>
						</body>
					</html>';

		if(!$mail->Send()){

			echo "mensagem não pode ser enviada";
			echo $mail->ErrorInfo;
			exit;
		}
		else{
			echo"
			<div class='text-center'>
				<h2>Duvida enviada com sucesso! :)</h2>
			</div>";
		} 
	}
?>