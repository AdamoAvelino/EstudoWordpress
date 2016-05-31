<?

add_action('after_setup_theme', 'child_theme_setup');
function child_theme_setup()
{
	load_child_theme_textdomain('simplesBlog', get_stylesheet_directory().'/languages');
	add_action('add_meta_boxes', 'simples_blog_metaboxes');
	add_theme_support('post-thumbnails');
}


function simples_blog_metaboxes()
{
	add_meta_box(
			'campo_simplesblog', //id do metaboxe
			'Campo teste de inserção do meta boxe', //titulo para visualização no admin
			'funcao_metabox_form', //função de retorno para adicionar os campos no admin
			'post', //tipo de post --> post type
			'side', //onde vai aparecer o campo
			'default'
	);
}
function funcao_metabox_form($objeto, $campo)
{
	wp_nonce_field(basename(__FILE__), 'campo_simplesblog_nonce');
	?>
	<p>
    	<label for="campo-simplesblog-class">
        	Esta é uma caixa de demonstração onde você realmente não pode fazer nada por enquanto.
        </label>
    </p>
    <p>
    	<input type="text" class="campo_simplesblog" id="campo_simplesblog" value="<? echo esc_attr(get_post_meta($objeto->ID, 'campo_simplesblog', true)); ?>" size="30">
    </p>
	<?
}
?>