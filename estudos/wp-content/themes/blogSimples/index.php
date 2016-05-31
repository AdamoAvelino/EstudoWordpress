<? get_header(); ?>
<div id="main-container">
	<section id="content-container">
    	<? if(have_posts()) : while(have_posts()) : the_post(); 
        	 get_template_part('content', get_post_format());     
		
			//caso estaja em um arquivo single, para a leitura do post completo
			if(is_singular()) :
			comments_template('', true);
			endif;
		
        endwhile; 
		else :
		?>
    		<article id="post-0" class="post no-result not-found">
            	<header>
                	<h2 class="entry-title">Não encontrado</h2>
                </header>
                <p>Lamento, mas nenhum conteudo referente ao que procura foi encontrado. tente buscar no campo pesquisa.</p>
                <? get_search_form(); ?>
            </article>
        <? endif; ?>
    </section><!-- #Fim do section content-container -->
<? get_sidebar(); ?>
</div><!-- #fim da div main-container -->
<? get_footer(); ?>