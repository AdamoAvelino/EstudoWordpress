<?
/*
Plugin Name: Addaff
Description: Links de empresas afiliadas
Version: 1.0
Author: Adamo Avelino
*/
//------------------------------Configuração do addaff no admin------------------- 
$options;
add_action('admin_init', 'registra_addaff');

add_action('admin_menu', 'adciona_pagina');

function registra_addaff()
{
	add_settings_section('section_link_addaff', 'Configuração Addaff', 'callback_section', 'addaff');
	
	add_settings_field('addaff_option[urlbefore]', 'String que vai <strong>antes</strong> da URL do produto', 'monta_campo', 'addaff', 'section_link_addaff', 
	array(
			'id' => 'addaff_option[urlbefore]',
			'type' => 'text',
			'value' => 'urlbefore',
			'size' => 45
		)
	);
	
	add_settings_field('addaff_option[urlafter]', 'String que vai <strong>depois</strong> da URL do produto', 'monta_campo','addaff', 'section_link_addaff', 
	array(
			'id' => 'addaff_option[urlafter]',
			'type' => 'text',
			'value' => 'urlafter'
		)
	);
	
	register_setting('addaff_setup', 'addaff_option', 'addaff_validate');
}

function adciona_pagina()
{
	/*
	 * Titulo da pagina
	 * Titulo do menu no admin
	 * Permissão para usuarios
	 * slung da pagina
	 * Callback para a construção do conteudo	
	 */
	 add_options_page('Configuração Addaff', 'Optons Addaf', 'manage_options', 'addaff','addaff_do_page');
}

function addaff_do_page()
{
?>
    <form action="options.php" method="post">
<?
	    global $options;	
		settings_fields('addaff_setup');
		$options = get_option('addaff_option');
		do_settings_sections('addaff');
		submit_button();
?>
	</form>
<?
}

function monta_campo($args)
{
	global $options;
	$valor = $args['value'];
?>
	<input type="<? echo $args['type']?>" name="<? echo $args['id']?>" id="<? echo $args['id']?>" value="<? echo $options[$valor]; ?>" size="<? echo $args['size']; ?>">
<?
}

function addaff_validate($input)
{
	$input['urlbefore'] = wp_filter_nohtml_kses($input['urlbefore']);
	$input['urlafter'] = wp_filter_nohtml_kses($input['urlafter']);
	
	return $input;
}

include_once('componentes/metaboxe.php');
include_once('componentes/saida.php');
//------------------------------meta box para posts do plugin-----------------



/*Saida do link nos posts após o the_content*/

?>