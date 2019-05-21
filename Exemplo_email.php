<?php
	
	//chama a classe
	require_once('phpmailer/class.phpmailer.php');

	//cria um objeto da PHPMailer
	$mail=new PHPMailer();

	//Define que o envio sera pelo protocolo SMTP
	$mail->IsSMTP();

	//Define o servidor de envio
	$mail->Host='smtp.gmail.com';

	//Define que o servidor exige autenticacao
	$mail->SMTPAuth=true;

	// configura o usuario de autenticacao
	$mail->Username='lmiguelmarcelo1@gmail.com';

	//configura senha de autenticacao para este usuario
	$mail->Password='santosfc5678';

	$mail->SMTPSecure='tls';

	$mail->Port=587;

	//de qual email está sendo enviado
	$mail->From='lmiguelmarcelo1@gmail.com';

	//nome de quem está enviando
	$mail->FromName='IFSP - Araraquara / SP';

	//para quem enviar(email, nome)
	$mail->AddAddress('lmiguelmarcelo1@gmai.com', 'Miguel');

	//adiciona um anexo no email
	$mail->addAttachment('img/to-do.jpg');

	$mail->isHTML(true);

	$mail->charSet='UTF-8';

	$mail->Subject='Assunto do Email com acentuação';

	$mail->Body='<html>
					<head>
						<meta charset="utf-8"/>
					</head>

					<body>
						<h1>Aqui você coloca o texto do seu email</h1>
						<p style="font-color:"blue">Pode usar formatação CSS para envio</p>
					</body>
				</html>';

	if(!$mail->Send()){

		echo "mensagem não pode ser enviada";
		echo $mail->ErrorInfo;
		exit;
	}
	else{
		echo"mensagem enviada com sucesso";
	}
?>