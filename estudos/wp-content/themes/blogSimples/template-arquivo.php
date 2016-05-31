<?
	/* Template Name: Arquivo*/
	get_header()
?>
<div id="main-container">
	<section id="content-container">
    	<? while(have_posts()) : the_post()?>
        
        <article id="post-<? the_id() ?>" <? post_class() ?>>
        	<header>
            	<h1 class="entry-title">
                	<? the_title(); ?>
                </h1>
            </header>
            <? the_content(); ?>
            <h2>Navegar por mês</h2>
            <ul>
			<?
				$args = array(
					'type' => 'monthly'
				);
				
				wp_get_archives($args);
            ?>
            </ul>
            <h2>Navegar por categoria</h2>
            <ul>
			<?
				$args = array(
					'title_li' => ''
				);
				wp_list_categories($args);
            ?>
            </ul>
            <h2>Navegar por tags</h2>
            <ul>
            <?
				$args = array(
					'smallest' => 8,
					'larglast' => 28,
					'number' => 0,
					'orderby' => 'name',
					'order' => 'ASC'
				);
			wp_tag_cloud($args);	
            ?>
            </ul>
        </article>
		
		<? endwhile;?>
    </section>
<? get_sidebar(); ?>
</div>
<? get_footer(); ?>