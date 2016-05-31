<?



function enviar_email()
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
	$header[] = 'From: Jornal <adamo.avelino@festus.net.br>';
	if(wp_mail('<adamo.avelino@gmail.com>', 'Teste', 'Testando email.'."\n".$header[0], $header))
	{
		echo 'Enviado';
	}
	else
	{
		echo 'Zuado';
	}
}
 enviar_email();
?>