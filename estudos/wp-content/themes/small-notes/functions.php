<?
function child_theme_setup()
{
	load_child_theme_textdomain('small-notes_child', get_stylesheet_directory().'/languages');
}
add_action('after_setup_theme', 'child_theme_setup');
?>