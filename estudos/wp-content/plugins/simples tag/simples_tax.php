<?
/*
Plugin Name: Blog Taxonomy
Description: este é um pluguim teste
Version: 1.0
Author: Adamo
*/
add_action('init', 'simples_tax', 0);

function simples_tax()
{
	register_taxonomy('simples_taxonomy', 'post', array(
			'hierarchical' => false,
			'labels' => array(
				'name' => 'Simples Tags',
				'singular_name' => 'Simples tag',
				'search_items' => 'Search Simples tag',
				'popular_items' => 'Popular Simples Tag',
				'add_new' => 'Add new Simples Tag'
			),
			'query_var' => true,
			'rewrite' => true
		)
	);
}
add_action('init', 'post_type_simples');
function post_type_simples()
{
register_post_type('simples_post_type', array(
		'labels' => array(
				'name' => 'Tipo simples de post',
				'menu_name' => 'Post Diferente'
			),
		'singular_label' => 'Tipo Simples de post',
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'show_in_menu' => true,
		'supports' => array('title', 'editor', 'author', 'comments')
	)
);
}
?>