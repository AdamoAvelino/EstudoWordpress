<?php
load_theme_textdomain("notesblog");
$content_width = 580;
// widgets
	if ( function_exists('register_sidebar') )
	    register_sidebar(array('name'=>'Sidebar'));
	    register_sidebar(array('name'=>'Footer A'));
	    register_sidebar(array('name'=>'Footer B'));
	    register_sidebar(array('name'=>'Footer C'));
	    register_sidebar(array('name'=>'Footer D'));
	    register_sidebar(array(
			'name' => 'Submenu',
			'id' => 'submenu',
			'before_widget' => '<div id="submenu-nav">',
			'after_widget' => '</div>',
			'before_title' => false,
			'after_title' => false
		));
// ends ---
// pullquote shortcode
function pullquote( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'float' => '$align',
	), $atts));
   return '<blockquote class="pullquote ' . $float . '">' . $content . '</blockquote>';
}
add_shortcode('pull', 'pullquote');
// ends ---
// admin page
add_action('admin_menu', 'nbcore_menu');
function nbcore_menu() {
  add_theme_page('Notes Blog Core', 'Notes Blog Core', 8, 'your-unique-identifier', 'nbcore_options');
}
function nbcore_options() {
  echo '<div class="wrap"><h2>Notes Blog Core</h2>';
  echo '<p>This is a placeholder for upcoming admin options for the Notes Blog Core theme. These things aren\'t due yet, in fact, they are pretty far away, so just forget about this page for now huh?</p><p>Get the latest Notes Blog and Notes Blog Core news from <a href="http://notesblog.com" title="Notes Blog">http://notesblog.com</a> - it\'s that sweet!</p>';
  echo '<h3>Pullquote Shortcode</h3><p>Notes Blog Core has support for pullquotes. Either you use the <em>pullquote</em> class on a <em>blockquote</em> tag along with the <em>alignleft</em> or <em>alignright</em> tags, or you use shortcode to do the same.</p><p>Usage is simple: <code>[pull float="X"]Your pullqoute text[/pull]</code> will output att pullquote aligned either to the left or right. The key is <em>float="X"</em>, where X can be <strong>either</strong> <em>alignleft</em> or <em>alignright</em>. Simple huh?</p>';
  echo '<h3>Custom Login Screen <small style="color:#f00; text-transform:uppercase;">beta</small></h3><p>Want a custom login form? Then you can play with <code>login.css</code> in the new <code>custom</code> folder. Remember: This is overwritten when updating! <strong>Experimental!</strong></p>';
  echo '</div>';
}
// ends ---
// custom login form
function nbcustom_login() {
	echo '<link rel="stylesheet" href="' . get_bloginfo('stylesheet_directory') . '/custom/login.css" type="text/css" media="screen" />';
}
add_action('login_head', 'nbcustom_login');
// ends ---
?>