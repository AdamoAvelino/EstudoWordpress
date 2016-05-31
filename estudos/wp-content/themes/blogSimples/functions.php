<?
//Setar a largura do content
if(! isset($content_width)):
	$content_width = 580;
endif;
add_action('after_setup_theme', 'blog_simples_setuptheme');

function blog_simples_setuptheme()
{
	load_theme_textdomain('simplesBlog');

	//ligações de alimentaçnao automatica
	add_theme_support('automatic-feed-links');

	add_theme_support('post-thumbnails');

	//adicionar menus de navegação do thema blog simples
	add_action('init', 'blogsimples_register_menus');

	//adiciona formatação do background no costomize theme
	add_action('init', 'background_dinamico');

	//adiciona inclusão de imagens no cabeçalio do costumize theme
	add_action('init', 'cabecalio_dinamico');

	//Adiciona inclusão de copyright no rodape do costumize theme
	add_action('customize_register', 'personalizacao_tema');

	//adicionar barras laterais para inclusão de widgets
	add_action('widgets_init', 'blogsimples_register_sidebars');

	//adcionar funções para a inclusão de scripts
	add_action('wp_enqueue_scripts', 'blogsimples_load_scripts');

	add_action('wp_head', 'estilo_tema');

	//criando gancho;
	add_action('comprimento', 'eaigalera');

	//adicionando tipos de formatos de post
	add_action('init', 'formatos_post');

	//frase de saudação no site
	add_action('saudacao', 'saudacao_site');

	//shortcode blockquote;
	add_shortcode('cite', 'monta_cite_code');

	//shortcode box-mensage
	add_shortcode('box_msg', 'monta_box_msg');

	//adciona script rede social
	add_action('wp_enqueue_scripts', 'carrega_script');

	//adciona gancho para tela de login
	add_action('login_enqueue_scripts', 'tela_login');

	remove_shortcode('gallery', 'gallery_shortcode');

	add_shortcode('gallery', 'fs_gallery');

	add_shortcode('contato', 'contato_shortcode');

	add_action('admin_menu', 'pagina_opcao');

	//botoes editor
	add_action ('init', 'my_tinymce_button');
	add_action('admin_print_footer_scripts', 'adiciona_botao_html');

	//carrega ajax para form contato
	add_action('wp_ajax_siteFsEnviaEmail', 'fs_envia_email');
	add_action('wp_ajax_nopriv_siteFsEnviaEmail', 'fs_envia_email');
}
$caminhoFunc = TEMPLATEPATH.'/functions/';
include($caminhoFunc.'opcao.php');
include($caminhoFunc.'gallery.php');
include($caminhoFunc.'format_login.php');
include($caminhoFunc.'scripts_load.php');
include($caminhoFunc.'fs_phpmailer.php');
include($caminhoFunc.'fs_shortcode.php');
include($caminhoFunc.'fs_tema_squema.php');
include($caminhoFunc.'fs_sidebar.php');
include($caminhoFunc.'botoes_editor.php');


function saudacao_site()
{
	if(is_user_logged_in())
	{
		$currentUesr = wp_get_current_user();
		echo 'E ai '. $currentUesr->user_login;
	}
	else
	{
		echo 'Faça seu login';
	}
}
//registrar menus
function formatos_post()
{
	$args = array('aside', 'audio', 'gallery', 'chat', 'image', 'link', 'quote', 'status', 'video');

	add_theme_support('post-formats', $args);
}
function blogsimples_register_menus()
{
	register_nav_menus(array(
			'top-navigation' => 'Navegação do topo',
			'bottom-navigation' => 'Navegação do rodapé'
		)
	);
}

function blogsimples_load_scripts()
{
	if(is_singular() && get_option('thread_comments') && comments_open())
	{
		wp_enqueue_script('comment-reply');
	}
}

function eaigalera()
{
	echo "E ai Galera";
}

function promocao($content)
{
	if(!is_feed() && !is_home())
	{
		$content .= "<div class='promotion'>";
		$content .= "<h4>Nunca perca uma novidade!</h4>";
		$content .= "<p>O <a href='#'>Feed</a> do Jornal mantem voçê atualizado</p>";
		$content .= "</div>";

		return $content;
	}
}
add_filter('the_content', 'Promocao');

function args_comments()
{
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$area_req = ($req ? "area-required='true'": '');

	$fields['texto'] = array(
		'author' => '<p class="comment-form-author"><label for="author">'.__('Name', 'blogSimples').($req ? '<span class="required">*</span>': '').'</label><input type="text" id="author" name="author" value="'.esc_attr($commenter['comment_author']).'" size="30"'.$area_req.'></p>',

		'email' => '<p class="comment-form-email"><label for="email">'.__('E-mail', 'simplesBlog').($req ? '<span class="required">*</span>': '').'</label><input type="text" id="email" name="email" value="'.esc_attr($commenter['comment_author_email']).'" size="30"'.$area_req.'></p>'
	);

	$fields['area'] = '<p class="comment-form-comment"><label for="comment">'. __('Comments','simplesBlog').'</label><textarea id="comment" name="comment" cols="60" rows="12" area-required="true"></textarea></p>';

	return $fields;
}



?>