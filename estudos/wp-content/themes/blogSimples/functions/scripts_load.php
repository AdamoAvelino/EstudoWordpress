<?
function carrega_script()
{
	//wp_enqueue_script('rds', get_template_directory_uri().'/js/redesocial.js', '', '', true);
	wp_register_script('fs_send_contato', get_template_directory_uri().'/js/send_contato.js', '', '', false);
		
	wp_register_script('rds', get_template_directory_uri().'/js/redesocial.js', '', '', false);
	wp_enqueue_script('rds');
	
	wp_enqueue_script('fs_send_contato');
	
}

?>