<?
function tela_login()
{
	add_filter('login_headerurl', 'urlblogsimples');
	add_filter('login_headertitle', 'titleblogsimples');
	
	function urlblogsimples()
	{
		return get_bloginfo('url');
	}
	
	function titleblogsimples()
	{
		return get_bloginfo('description');
	}
	
	
	if(get_option('custom_login') == 'on')
	{
            
            
?>
	<style>
		.login
		{
                    
			background-image: url(<? background_image();?>);
			background-color: #<? background_color(); ?>);
			
		}

		div#login 
		{
			background: <? echo get_theme_mod('contraste_dominante'); ?>;
			padding-bottom: 30px;
		}
		#loginform
		{
			background-color:<? echo get_theme_mod('detalhes'); ?>;
		}
		#loginform p label, p#nav a, #backtoblog a
		{
			color:<? echo get_theme_mod('contraste_dois')?> !important;
		}  
		div#login h1 a
		{
			background-image: url(<? echo get_header_image()?>)
		}

		#login_error
		{
			border-left-color: <? echo get_theme_mod('links_hover')?> !important;
		} 
		p.message, #login_error
		{
			background:#E1E1E1 !important;
		}

		#backtoblog
		{
			margin-top: 30px ;
		}
		#backtoblog a:hover, p#nav a:hover, #wp-submit:hover
		{
			background-color:<? echo get_theme_mod('links_hover') ?>; 
			border: 1px solid #440101;
		}
		p#nav a, #backtoblog a
		{
			padding: 10px;
			box-shadow: 0px 1px 1px  rgba(250, 250, 250, 0.5) inset;
		}
			#wp-submit, p#nav a, #backtoblog a
		{
			background: <? echo get_theme_mod('cor_dominante'); ?>;
			border: 1px solid #5681ac;
		} 


		@media all and (max-width: 1024px)
		{
			.login
			{
				
				background-image: url(<? background_image();?>);
				background-color: #<? background_color(); ?>;
			}
		}
	</style>
<?
	}
	
}
?>