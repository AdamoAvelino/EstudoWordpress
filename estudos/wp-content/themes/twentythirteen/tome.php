<? get_header();?>
<div <? post_class(); ?>>
	<?
    //Definição de um valor temporário para evitar erros
	$nao_duplica = NULL;
	$args = array(
		'category_name' => 'destaque',
		'showposts' => 3
		);
	// Nosso loop de destaque
	$destaque_query = new WP_Query($args);
	while($destaque_query->have_posts())
	{
		$destaque_query->the_post();
		$nao_duplica[] = $post->ID;
?>
		<div id="post-<? the_ID() ?>" <? post_class(); ?>>
        	<h1>
            	<a href="<? the_permalink() ?>" title="<? the_title_attribute ?>">
                	<? the_title(); ?>
                </a>
            </h1>
            <? the_excerpt(); ?>
        </div>
<?
	}
	wp_reset_postdata();
	?>
</div>
<div <? post_class(); ?>>
	<h2>As ultimas dos <span>externos</span></h2>
    <ul>
<?
	$args = array(
			'category_name' => 'externos',
			'showposts' => 10
		);
	$externos_query = new WP_Query($args);
	while($externos_query->have_posts())
	{
		$externos_query->the_post();
		if(in_array($post->ID, $nao_duplica)) continue;
		update_post_caches($posts);
		
?>
		<li>
        	<h3>
            	<a href="<? the_permalink()?>" title="<? the_title_attribute(); ?>">
                	<? the_title(); ?>
                </a>
            </h3>
            <? the_excerpt(); ?>
        </li>
<?
		
	}
	wp_reset_postdata();
?>
</ul>
</div>
<div <? post_class(); ?>>
	<h2>As utimas dos <span>internos</span></h2>
    <ul>
<?
		$args = array(
				'category_name' => 'internos',
				'showposts' => 10
			);
		$internos_query = new WP_Query($args);
		while($internos_query->have_posts())
		{
			$internos_query->the_post();
			if(in_array($post->ID, $nao_duplica)) continue;
			update_post_caches($posts);
?>
			<li>
            	<h3>
                	<a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>">
                    	<? the_title(); ?>
                    </a>
                </h3>
                <? the_excerpt(); ?>
            </li>
<?
		}
		wp_reset_postdata();
?>
    </ul>
</div>
<div <? post_class(); ?>>
	<h2>As ultimas dos <span>continentes</span></h2>
    <ul>
<?
		$args = array(
				'category_name' => 'continentes',
				'showposts' => 10
			);
		$wp_continentes = new WP_Query($args);
		while($wp_continentes->have_posts())
		{
			$wp_continentes->the_post();
			if(in_array($wp_continentes->post->ID, $nao_duplica )) continue;
			update_post_caches($post);
?>
			<li>
            	<h3>
                	<a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>">
                    	<? the_title(); ?>
                    </a>
                </h3>
                <? the_excerpt(); ?>
            </li>
<?
		}
		wp_reset_postdata();
?>
    </ul>
</div>
<?
	get_sidebar();
	get_footer();
?>