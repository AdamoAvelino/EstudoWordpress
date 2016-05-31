<!DOCTYPE HTML>
<html <? language_attributes(); ?> >
<head>
<meta charset="<? bloginfo('charset'); ?>" />

<title>
	<?
		wp_title('|', true, 'right');
		bloginfo('name');
    ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="<? bloginfo('stylesheet_url'); ?>" type="text/css" midia="all">
<link rel="pingback" href="<? bloginfo('pingback_url'); ?>">
<!--[if lt IE9] 
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
[endif]-->
<? wp_head(); ?>
</head>
<body <? body_class(); ?>>
<div id="outer-wrap">
    
	<div id="inner-wrap">
		<header id="header-container">
    		<hgroup>
        		<? if(is_home() || is_front_page()) :?>
                 <img class="logo-site" src="<? header_image() ?>" height="<? echo get_custom_header()->height ?>" width="<? echo get_custom_header()->width; ?>">
                <h1 id="site-title">
                	<a href="<? echo home_url() ?>" title="<? bloginfo('name')?>">
                    	<? bloginfo('name'); ?>
                    </a>
                </h1>
            	<h2 id="site-description">
                	<? bloginfo('description'); ?>
                </h2>
                <? else: ?>
                	<img class="logo-site" src="<? header_image() ?>" height="<? echo get_custom_header()->height ?>" width="<? echo get_custom_header()->width; ?>">
                	<div id="site-title">
                    	<a href="<? echo home_url(); ?>" title="<? bloginfo('name'); ?>">
                        	<? bloginfo('name'); ?>
                        </a>
                    </div>
                    <div id="site-description">
                    	<? bloginfo('description'); ?>
                    </div>
                <? endif ?>
                <p style="color:#FFF; float:right"><? do_action('saudacao'); ?></p>
        	</hgroup>
       	 	<nav class="clearfix">
        		<?  wp_nav_menu( array (
					'theme_location' => 'top-navigation',
					'container_class' => 'clearfix menu_header',
					)
				);?>
        	</nav>
    	</header><!--Fim do header container-->
	