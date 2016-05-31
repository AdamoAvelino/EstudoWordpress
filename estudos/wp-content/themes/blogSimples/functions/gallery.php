<?
function fs_gallery($attr)
{
	global $post;
	static $instance = 0;
	$instance++;
	$path = get_template_directory_uri();
	wp_register_script('jQuery_pretty', $path.'/prettyPhoto/js/jquery-1.6.1.min.js', false, '1.6', false);
	
	wp_register_script('prettyPhoto', $path.'/prettyPhoto/js/jquery.prettyPhoto.js', false, '1.6', false);
	
	wp_enqueue_script('configPretty', $path.'/prettyPhoto/js/configPretty.js', array('jQuery_pretty', 'prettyPhoto'), '1.0', false);
	
	wp_enqueue_style('prettyCss', $path.'/prettyPhoto/css/prettyPhoto.css', false, '1.6', 'all');
	
	
//==========================gerar ordencão das imagens padrão=======================
	if ( ! empty( $attr['ids'] ) ) {
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}
	
	$output = apply_filters( 'post_gallery', '', $attr );
	if ( $output != '' )
		return $output;
	
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}
	
	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery'));

	$id = intval($id);
	
	if ( 'RAND' == $order )
		$orderby = 'none';
		

//=================Montar array com ids dos attachment=======================

	if ( !empty($include) ) {
		$_attachments = get_posts( array(
		'include' => $include, 
		'post_status' => 'inherit', 
		'post_type' => 'attachment', 
		'post_mime_type' => 'image', 
		'order' => $order, 
		'orderby' => $orderby)
		);

		$attachments = array();
		foreach ( $_attachments as $key => $val ) 
		{
			$attachments[$val->ID] = $_attachments[$key];
		}
	} 
	elseif ( !empty($exclude) ) 
	{
		$attachments = get_children( array(
		'post_parent' => $id, 
		'exclude' => $exclude,
		'post_status' => 'inherit', 
		'post_type' => 'attachment', 
		'post_mime_type' => 'image', 
		'order' => $order, 
		'orderby' => $orderby) 
		 );
	} 
	else 
	{
		$attachments = get_children( array(
		'post_parent' => $id, 
		'post_status' => 'inherit',
		'post_type' => 'attachment', 
		'post_mime_type' => 'image', 
		'order' => $order, 
		'orderby' => $orderby) 
		);
	}
//========================
	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}
//==============================montar estrutura da galeria=====================

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
		$itemtag = 'dl';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
		$captiontag = 'dd';
	if ( ! isset( $valid_tags[ $icontag ] ) )
		$icontag = 'dt';

	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = '';
	$gallery_div = '';
	
	if ( apply_filters( 'use_default_gallery_style', true)) 
	{
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #ccc;
			}
			.gallery-icon img:hover
			{
				opacity: 0.5;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style>\n\t\t";
	}
	
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );
	
	$uid = uniqid('pp_');
	$i = 0;
	foreach($attachments as $keyAt => $valAt)
	{
		
		$i++;
		if(!empty($link) && $link == 'file')
		{
			
			$alt = $valAt->post_title;
			$argsImg = array('alt' => $alt);
			$imagem_previa = wp_get_attachment_image($keyAt, $size, false, $argsImg);
			$imagem_output = "<a href='".wp_get_attachment_url($keyAt)."' title='".$valAt->post_excerpt."' rel='prettyPhoto[".$uid."]'>".$imagem_previa.'</a>';
		}
		elseif(!empty($link) && $link == 'none')
		{
			$imagem_output = wp_get_attachment_image($keyAt, $size);
		}
		else
		{
			$imagem_output = wp_get_attachment_link($keyAt, $size, true, false);
		}
		
		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "<{$icontag} class='gallery-icon' > {$imagem_output} </{$icontag}>";
		if($captiontag && $valAt->post_excerpt)
		{
			$output .= "<{$captiontag} class='wp-caption-text gallery-caption'>". wptexturize($valAt->post_excerpt)."</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if($columns > 0 and ($i % $columns) == 0)
		{
			$output .= "<br style='clear: both;'>";
		}
	}
	$output .= "<br style='clear: both;'>";
	$output .= "</div>";
	return $output;
}

?>