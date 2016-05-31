<footer id="footer-container">
	<section id="footer-top" class="clearfix">
    	<div id="container-footer-widget">
			<? if(!dynamic_sidebar('footer-um')):
		   			echo 'Footer um vazio';
		   	   endif
			?>
        </div>
        <div id="container-footer-widget">
        	<? if(!dynamic_sidebar('footer-dois')):
		   			echo 'Footer dois vazio';
		   	   endif
			?>
        </div>
        <div id="container-footer-widget">
        	<? if(!dynamic_sidebar('footer-tres')):
		   			echo 'Footer três vazio';
		  	   endif
			?>
        </div>
        <div id="container-footer-widget">
        	<? if(!dynamic_sidebar('footer-quatro')):
		   			echo 'Footer quatro vazio';
		   	   endif
			?>
        </div>
    </section>
    <section id="footer-bottom">
    	<nav>
    		<? wp_nav_menu(array(
					'theme_location' => 'bottom-navigation',
					'menu_class' => 'menu-bottom'
				)
			); ?>
    	</nav>
    	<p>
    		<? echo get_theme_mod('simples_footer_copyright')?>
    	</p>
    </section>
</footer><!-- #Fim do footer container -->
</div><!-- #Fi da div inner-wrap do arquivo header -->
</div><!-- #Fim da div outer-wrap do arquivo header -->
<? wp_footer(); ?>

</body>
</html>