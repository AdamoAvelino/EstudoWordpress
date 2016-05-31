<?
/*
Plugin Name: Simples Configurações
Description: este é um pluguim teste
Version: 1.0
Author: Adamo
*/

/*
 * Adiciona função que cria a pagina no menu de configuração do admin
 * Prepara a função de de contrução da pagina
 * Função p/ adcionar funções que monta da seção e o formulario que irá fazer a configuração
 ** Montar as funções que irá gerar o conteudo.
 *** Callback de seção
 *** Callback de settings(Compos de entrada)
 *** Função de limpeza do HTML
*/
add_action('admin_menu', 'simples_configdemo_addpage' );

add_action('admin_init', 'simples_configdemo_init');

function simples_configdemo_addpage()
{
	/*
	 * Titulo da pagina
	 * Titulo do menu no admin
	 * Permissão para usuarios
	 * slung da pagina
	 * Callback para a construção do conteudo	
	 */
	add_options_page('Config Simples Demo', 'simples config', 'manage_options', 'simples-configdemo', 'simples_configdemo_dopage');
}

function simples_configdemo_dopage()
{
	?>
		<h2>Configuração Simples</h2>
        <p>Pagina de configurações</p>
        <form action="options.php" method="post">
        	<? 
				/*define o nome de um grupo de configurações para utilização no
				 *register_setting(), que irá ser chamado
				 */
				settings_fields('configdemo');
				
				//slung da pagina definido no add_options_page
            	do_settings_sections('simples-configdemo'); 
            	
				//Botão para salvar configurações.
				submit_button(); 
			?>
        </form>
	<?
}

function simples_configdemo_init()
{
	/*
	 *	id -> da section, 
	 *	titulo - da section, 
	 *	função que retorna conteudo,
	 *	slung_menu -> da page 
     */
	add_settings_section('simplesdemo_config_section', 'Configuração simples', 'callback_section', 'simples-configdemo');
	
	/*
	 *	id-> field entrada "add_settings_field", 
	 *  titulo-> do field de entrada,
	 *	Função que retorna o formulario
	 *  slung da pagina -> configurado add_options_page,
	 *	section -> a seção que os campos de entrada serão mostrados,
	 */
	add_settings_field('simplesdemo_input', 'Imput simples', 'callback_settings', 'simples-configdemo', 'simplesdemo_config_section');
	
	/*
	 * Grupo de configurações slung da pagina -> definido no add_settings(),
	 * ID do field de entrada definido no add_settings_field
	 * Uma função para limpar o codigo HTML de formulario 
	 */
	register_setting('configdemo', 'simplesdemo_input', 'limpa_html');
	
}



function callback_section()
{
	echo "<p>Está é uma seção de introdução</p>";
}

function callback_settings()
{
	$form .= '<input type="text" id="simplesdemo_input" name="simplesdemo_input" value="'.get_option('simplesdemo_input').'">';
	
	echo $form;
}

function limpa_html($input)
{
	$newinput = esc_attr($input);
	return $newinput;
}
	
?>