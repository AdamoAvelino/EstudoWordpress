<?
//Registrar o sidebar
function blogsimples_register_sidebars()
{
	//Sidebar direito
	register_sidebar(array
		(
			'name' => 'Right collunm',
			'id' => 'right-collunm',
			'before' => '<li id="%l$s" class="widget-container %2s">',
			'after' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
	
	register_sidebar(array(
			'name' => 'Footer Um',
			'id' => 'footer-um',
			'before' => '<li id="%l$s" class="widget-container %2s">',
			'after' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(array(
			'name' => 'Footer Dois',
			'id' => 'footer-dois',
			'before' => '<li id="%l$s" class="widget-container %2s">',
			'after' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(array(
			'name' => 'Footer Três',
			'id' => 'footer-tres',
			'before' => '<li id="%l$s" class="widget-container %2s">',
			'after' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(array(
			'name' => 'Footer Quatro',
			'id' => 'footer-quatro',
			'before' => '<li id="%l$s" class="widget-container %2s">',
			'after' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(array(
			'name' => 'Lateral Um',
			'id' => 'lateral-um',
			'before' => '<li id="%l$s" class="widget-container %2s">',
			'after' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(array(
			'name' => 'Lateral dois',
			'id' => 'lateral-dois',
			'before' => '<li id="%l$s" class="widget-container %2s">',
			'after' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(array(
			'name' => 'Lateral Três',
			'id' => 'lateral-tres',
			'before' => '<li id="%l$s" class="widget-container %2s">',
			'after' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
}


?>