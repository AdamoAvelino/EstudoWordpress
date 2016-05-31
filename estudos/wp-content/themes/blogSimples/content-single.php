<article id="post-<? the_id();?>" <? post_class(); ?>>
	<header>
    	<h1 class="entry-title">
        	<? the_title(); ?>
        </h1>
        <? if(is_single() ) :?>
        <p clas="entry-meta">
        	Postado em <time datatime="<? get_the_date(); ?> <? the_time() ?>"><? the_date()?> <? the_time?></time>
            Por <? the_author_link(); ?><br/>
            <? if(comments_open()) : ?>
            &bull; <? comments_popup_link('Nenhum comentario', '1 comentario', '% comentarios'); 
			endif; ?>
            <? if(is_singular('post')) : ?>
            <br /> <span>Categorias</span> <? the_category(', '); 
				  	the_tags(' Tags ', ', ', '');
				endif;
		  endif;
				  ?>
        </p>
    </header>
    <? the_post_thumbnail('', array('class' => 'miniatura'));?>
    <? if(is_attachment()) : ?>
    	<div class="clearfix">
			<div class="alignright"><? next_image_link('', 'Proxima imagem');?></div>
			<div class="alignleft"><? previous_image_link('', 'Imagem Anterior');?></div>
        </div>
	<? endif;?>
	<? the_content();?>
    
</article>