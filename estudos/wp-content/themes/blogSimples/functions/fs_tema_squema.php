<?
function personalizacao_tema($wp_customize)
{
	$wp_customize->add_section('simples_footer', array(
			'title' => 'Detalhes do footer',
			'description' => 'Site customizado com wordpress copy'
		)
	);
	
	$wp_customize->add_section('estilo_geral', array(
			'title' => 'Estilo do tema',
			'description' => 'Formate as cores das fontes e as cores de fundo do Tema',
		)
	);
	
	$wp_customize->add_setting('simples_footer_copyright', array(
			'default' => '&copy; Adamão'.get_bloginfo('name'),
			
		)
	);
	
	$wp_customize->add_control('simples_footer_copyright', array(
			'label' => 'Digite uma saida para o footer',
			'type' => 'text',
			'section' => 'simples_footer',
			'settings' => 'simples_footer_copyright'
		)
	);
	
	$wp_customize->add_setting('cor_dominante', array(
			'default' => '#409fff',
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cor_dominante', array(
				'label' => __('Cor Dominante', 'simplesBlog'),
				'section' => 'estilo_geral',
				'settings' => 'cor_dominante'
			)
		)
	);
	
	$wp_customize->add_setting('contraste_dominante', array(
			'default' => '#333'
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'contraste_dominante', array(
				'label' => __('Contraste da cor dominante'),
				'section' => 'estilo_geral',
				'settings' => 'contraste_dominante'
			)
		)
	);
	
	$wp_customize->add_setting('detalhes', array(
			'default' => '#666'
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'detalhes', array(
				'label' => __('Fontes e detalhes menores'),
				'section' => 'estilo_geral',
				'settings' => 'detalhes'
			)
		)
	);
	
	$wp_customize->add_setting('contraste_dois', array(
			'default' => '#fff'
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'contraste_dois', array(
				'label' => __('Contraste de cor dois'),
				'section' => 'estilo_geral',
				'settings' => 'contraste_dois'
			)
		)
	);
	
	$wp_customize->add_setting('links_hover', array(
			'default' => '#900'
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'links_hover', array(
				'label' => __('Links e Hover'),
				'section' => 'estilo_geral',
				'settings' => 'links_hover'
			)
		)
	);
	
	
}

function estilo_tema()
{
	?>
    	<style type="text/css">
        	.post p, div.promotion p, .widget-title, #footer-container p, .menu li a, .menu-bottom li a
			{
				color: <? echo get_theme_mod('contraste_dominante')?>
			}
			#wp-calendar, #container-footer-widget, #container-footer-widget h3, #container-footer-widget, .widget a:hover, h2.entry-title a
			{
				color: <? echo get_theme_mod('contraste_dois'); ?>
			}
			a:link, a:active, a:visited, h2.entry-title a:hover 
			{
				color:<? echo get_theme_mod('cor_dominante');?>
			}
			#site-description, p.entry-meta, #sidebar-container, #container-footer-widget .widget a, .comment-body p 
			{
				color: <? echo get_theme_mod('detalhes');?>
			}
			div.promotion h4, #footer-container p a
			{
				color:<? echo get_theme_mod('links_hover'); ?>
			}
			.menu li a:hover, .menu-bottom li a:hover, #footer-container p a:hover
			{
				color:<? echo get_theme_mod('contraste_dominante'); ?>
			} 
			/*.widget a:hover
			{
				color: <? echo get_theme_mod('contraste_dois'); ?>
			}*/
			a:hover
			{
				color: <? echo get_theme_mod('links_hover'); ?>
			}
			#header-container, #footer-top
			{
				background: <? echo get_theme_mod('contraste_dominante')?>
			}
			.menu, .menu-bottom, #footer-bottom, #wp-calendar, h2.entry-title a
			{
				background:<? echo get_theme_mod('cor_dominante')?>
			}
			h2.entry-title a:hover
			{
				background-color: <? echo get_theme_mod('contraste_dois')?>
			}
			#wp-calendar tbody tr td 
			{
				border-color: <? echo get_theme_mod('contraste_dois'); ?>
			}
			/*.menu
			{
				border-color:<? echo get_theme_mod('detalhes');?>
			}*/
			 
        </style>
	<?
}

function background_dinamico()
{
	$args = array(
		'default-color' => '',
		'default-image' => get_template_directory_uri().'/img/background1.jpg',
		'wp-head-callback' => '_custom_background_cb',
		'admin-head-callback' => '',
		'admin-preview-callback' => ''
	);
	add_theme_support('custom-background', $args);
}

function cabecalio_dinamico()
{
	$defaults = array(
		'default-image' => get_template_directory_uri().'/img/logo.png',
		'random-default' => false,
		'width' => 80,
		'height' => 80,
		'flex-height' => false,
		'flex-width' => false,
		'default-text-color' => '',
		'header-text' => false,
		'uploads' => true,
		'wp-head-callback' => '',
		'admin-head_callback' => '',
		'admin-preview-callback' => ''
	);
	
	add_theme_support('custom-header', $defaults);
}
?>