<?
function fs_envia_email()
{
	add_action('phpmailer_init', 'carrega_mailer');
	function carrega_mailer($phpmailer)
	{
		$phpmailer->IsSMTP();
		$phpmailer->Host = 'smtp.gmail.com';
		$phpmailer->SMTPDebug = false;
		$phpmailer->SMTPAuth = true;
		$phpmailer->SMTPSecure = 'tls';
		$phpmailer->Port = 587;
		$phpmailer->Username = 'adamo.avelino@gmail.com';
		$phpmailer->Password = 'aav@1982'; 
	}
	$corpo_header = $_POST['nome'].' <'.$_POST['email'].'>';
	$header[] = 'From:'.$_POST['remetente'].' <'.$_POST['email_remetente'].'>';
	if(wp_mail('To: '.$_POST['destinatario'].' <'.$_POST['email_destinatario'].'>', $_POST['assunto'], $corpo_header."\n".$_POST['mensagem'], $header))
	{
		echo 'Enviado';
	}
	else
	{
		echo 'Zuado';
	}
}
?>