<aside id="sidebar-container">
	<ul id="sidebar">
    <li>
        	<? if(! is_user_logged_in()) :?>
            	<h3 class="widget-title">Login</h3>
                <? wp_login_form() ?>
                <p>
                	Esqueceu sua senha?<a href="<? echo home_url('/estudos/wp-login.php?action=lostpassword'); ?>"> Recupere!</a>
                </p>
            <? else :?>
                <h2>Admin</h2>
                <ul>
                	<li><a href="<? echo admin_url(); ?>">Painel</a></li>
                    <li><a href="<? echo admin_url('post-new.php');?>">Escreva seu post</a></li>
                    <li><a href="<? echo wp_logout_url(urlencode($_SERVER['REQUEST_URI'])) ?>">Logout</a></li>
                </ul>
			<? endif;?>
        </li>
    	<?
			if(!dynamic_sidebar('right-collunm')) :
        ?>
        <li>Por favor, adicione alguns widgets na <em> coluna da direita </ em> Área widget!</li>
        <? endif ?>
    </ul>
</aside><!-- #fim do aside sidebar-container -->