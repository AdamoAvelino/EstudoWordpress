<? get_header(); ?>
<div id="main-container">
	<section id="content-container">
    	<? while(have_posts()) : the_post() ;
        	get_template_part('content', 'single');
			
			comments_template('', true);
			endwhile;
		?>
    </section>
    <? get_sidebar(); ?>
</div><!-- #fim da div main container -->
<? get_footer(); ?>