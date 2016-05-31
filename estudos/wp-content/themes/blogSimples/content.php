<article id="post-<? the_id(); ?>" <? post_class(); ?>>
    <header>
        <h2 class="entry-title"> 
            <a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>" rel="boolmark">
                <? the_title(); ?>
            </a>
        </h2>
        <p class="entry-meta"> 
            Postado em <time datetime="<? get_the_date(); ?>"><? the_time(); ?></time> 						 				
            Por<? the_author_link(); ?> 
            <? if (comments_open()) : ?>
                &bull; <? comments_popup_link('Sem comntarios', '1 comentario', '% comentarios'); ?>
            <? endif; ?>
        </p>
    </header>
    <?
    if (has_post_thumbnail()) {
        the_post_thumbnail(array(200, 157));
    } else {
        $args = array(
            'post_parent' => $post->ID,
            'post_type' => 'attachment',
        );
        $imagens = get_children($args);
        //$imagens = get_posts($args);
        foreach ($imagens as $key => $val) {
            echo wp_get_attachment_image($key, 'thumbnail');
            //echo $val->post_name; class reference wp_post
            /* echo "<script>alert(".$key.")</script>"; */
            //echo wp_get_attachment_url($key);
            //echo wp_get_attachment_link($key);
        }
    }
    ?>
    <? the_excerpt(); ?>
</article><!-- #Fim do article post -->