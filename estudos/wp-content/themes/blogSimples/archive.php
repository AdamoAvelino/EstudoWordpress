<? get_header(); ?>
<div id="main-container">
	<section id="content-container">
    	<header>
        	<h1 class="page-title">
            	<? if(is_day()) : ?>
                Arquivos diarios para <span><? echo get_the_date(); ?></span>
                <? elseif(is_month()) : ?>
                Arquivos mensais para <span><? echo get_the_date(' F Y') ?></span>
                <? elseif(is_year()) : ?>
                Arquivos anuais para <span><? echo get_the_date('Y'); ?></span>
                <? elseif(is_category()) : ?>
                <? single_cat_title('Navegando'); ?>
                <? elseif(is_tag()) : ?>
                <? single_tag_title('Navegando'); ?>
                <? else :?>
                Archives
                <? endif; ?> 
            </h1>
        </header>
        <?
			while(have_posts()):
			the_post();
			get_template_part('content', get_post_format());
			endwhile;
        ?>
    </section>
    <? get_sidebar(); ?>
</div>
<? get_footer(); ?>