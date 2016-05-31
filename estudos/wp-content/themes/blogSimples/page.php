<? get_header(); ?>
<div id="main-container">
	<section id="content-container">
    	<? while(have_posts()) : 
				the_post(); 
		   		get_template_part('content', 'page');
				comments_template('', true);
		   endwhile;
		?>
    </section>
	<? get_sidebar(); ?>
</div>
<? get_footer(); ?>