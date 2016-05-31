<div id="comments">
	<? //Post protegido por senha, apenas quem está logado pode fazer o comentario?>
	<? if(post_password_required()) : ?>
    <p class="nopassword"> Este post é protegido por senha. Por favor insira sua senha. </p>
    <? endif; ?>
	<? //Ver os comentarios ?>
<? if(have_comments()) :?>
<h2 id="comments-title"> 
	Há <? comments_number(' Nenhum comentario ', ' 1 comentario ', ' % comentarios '); ?>
</h2>

<? //Navegação do comentario ?>
<? if(get_comment_pages_count() > 0 && get_option('page_comments')) : ?>
<nav id="comment-nav-above">
	<div class="nav-previous">
    	<? previous_comments_link(' &larr; ', ' Comentarios anteriores '); ?>
    </div>
    <div class="nav-next">
    	<? next_comments_link(' &larr; ', ' Proximos comentarios '); ?>
    </div>
</nav>
	<? endif; ?>

<? // Lista de comentarios ?>    
<ol class="commentlist">
	<? wp_list_comments(); ?>
</ol>

<? // Navegação de comentarios ?>
<? if(get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
<nav class="comment-above-above">
	<div class="nav-previous">
    	<? previous_comments_link(' &larr; ', ' Comentarios anteriores '); ?>
    </div>
    <div>
    	<? next_comments_link(' Proximos comentarios &rarr; '); ?>
    </div>
</nav>
<? endif; ?>
<? endif; ?>

<? // Formulario do comentarios ?>
<? 
$campos = args_comments();
comment_form(array(
			'comment_notes_after' => '', 
			'fields' => apply_filters('comment_form_default_fields', $campos['texto']),
			'comment_field' => $campos['area'],
			'label_submit' => __('Enviar', 'simplesBlog')
			)
		); ?>
</div>