<?
	function pagina_opcao()
{
	$titulo_pagina = "Configuração do Tema";
	$titulo_menu = "Opção Simples Blog";
	$permissao = 'manage_options';
	$menu_slung = 'opcoes_simples_blog';
	$funcao = 'formulario_opcoes';
	add_options_page($titulo_pagina, $titulo_menu, $permissao, $menu_slung, $funcao);
}

function formulario_opcoes()
{
	if(get_option('custom_login') == 'on')
	{
		$valor = 'checked="checked"';
	}
	else
	{
		$valor = '';
	}
?>
	<form method="post" action="options.php">
    	<? wp_nonce_field('update-options')?>
    	<label for="custom_login">Deseja que a tela de login seja personalizada?</label>
    	<input type="checkbox" name="custom_login" id="custom_login" <? echo $valor; ?>>
        <? submit_button(); ?>
        <input type="hidden" name="action" id="action" value="update">
        <input type="hidden" name="page_options" id="page_options" value="custom_login">
    </form>
<?
} 
?>