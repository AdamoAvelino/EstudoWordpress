<?
add_filter('the_content', 'saida_link', 11);

function saida_link($content)
{
	$addaff_link_title = get_post_meta(get_the_ID(), '_addaff_meta_boxe_title', true);
	$addaff_link_url = get_post_meta(get_the_ID(), '_addaff_meta_boxe_url', true);
	
	if($addaff_link_title && $addaff_link_url != '')
	{
		$addaff_url = get_option('addaff_option');
		
		$content .= '<ul id="addaff"><li class="addaff-item"><a href="';
		$content .= $addaff_url['urlbefore'];
		$content .= $addaff_link_url;
		$content .= $addaff_url['urlafter'];
		$content .= '">';
		$content .= $addaff_link_title;
		$content .= '</a></li></ul>';
		
		return $content;
	}
	else
	{
		return $content;
	}	
}
?>