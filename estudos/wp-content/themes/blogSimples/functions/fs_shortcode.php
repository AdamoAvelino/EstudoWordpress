<?
function monta_box_msg($att, $content = NULL)
{
	$par = extract(shortcode_atts(array(
		'type' => ''
	), $att));
	ob_start();
	$saida = '<div class="'.$type.'">'.$content.'</div>';
	return $saida;
}

function contato_shortcode($att)
{
	
	
	 extract(shortcode_atts(array(
			'destinatario' => '',
			'email_destinatario' => '',
			'remetente' => '',
			'email_remetente' => ''
		), $att));
		
		$saida .= "<form method='post'><table><tr>";
		$saida .= "<td><label for='nome'>Nome</label></td>";
		$saida .= "<td><input type='text' name='nome' id='nome'><span class='alerta-form invisivel'>Campo Obrigatório</span></td></tr>";
		$saida .= "<tr><td><label for='email'>E-mail</label></td>";
		$saida .= "<td><input type='text' name='email' id='email'><span class='alerta-form invisivel'>Campo Obrigatório</span><span class='alerta-form invisivel invalido'>E-mail inválido</span></td></tr>";
		$saida .= '<tr><td><label for="assunto">Assunto</label></td>';
		$saida .= '<td><input type="text" name="assunto" id="assunto"><span class="alerta-form invisivel">Campo Obrigatório</span></td></tr>';
		$saida .= '<tr><td colspan="2"><label for="mensagem">Mensagem</label></td></tr>';
		$saida .= '<tr><td colspan="2"><textarea name="mensagem" id="mensagem"></textarea><span class="alerta-form invisivel">Campo Obrigatório</span></td></tr>';
		$saida .= '<tr><td colspan="2"><input type="button" value="Enviar" id="btn_enviar"></td></tr>';
		$saida .= '<input type="hidden" name="destinatario" id="destinatario" value="'.$destinatario.'">';
		$saida .= '<input type="hidden" name="email_destinatario" id="email_destinatario" value="'.$email_destinatario.'">';
		$saida .= '<input type="hidden" name="remetente" id="remetente" value="'.$remetente.'">';	
		$saida .= '<input type="hidden" name="email_remetente" id="email_remetente" value="'.$email_remetente.'">';		
		$saida .= '<input type="hidden" name="uriform" id="uriform" value="'.admin_url("admin-ajax.php").'">';
		$saida .= "<tr><th colspan='2'><img src='".get_template_directory_uri()."/img/ajax-loader.gif' class='invisivel' id='img_carrega'></th></tr>";
		$saida .= '</table></form>';
		return $saida;
		
}

function monta_cite_code($att, $content = NULL)
{
	extract(shortcode_atts(array('float' => $align), $atts));
	
	if($content)
	{
		return "<blockquote><p>".$content."</p></blockquote>";
	}
}
?>