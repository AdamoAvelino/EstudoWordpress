<?
add_action('add_meta_boxes', 'addaff_meta');

function addaff_meta()
{
	add_meta_box('addaff_meta_name', __('Affiliate Product Link', 'addaff'), 'addaff_meta_boxe', 'post', 'normal', 'core');
}

function addaff_meta_boxe($post)
{
	$title = get_post_meta($post->ID, '_addaff_meta_boxe_title', true);
	$url = get_post_meta($post->ID, '_addaff_meta_boxe_url', true);
	
	wp_nonce_field('save_addaff_meta_box', 'addaff_meta_box_nonce');
?>
	<p>
    	O título da ligação serão ligadas e anexados no final de cada post quando o conteúdo completo é mostrado. Isso pode incluir arquivo páginas, dependendo do tema. Você pode alterar as informações sobre <a href="options-general.php?page=addaff">the AddAff settings page</a>
    </p>
    <p>
    	<label for="event-title">Link de afiliados - Titulos</label>
        <input type="text" class="widefat code" id="event-title" name="_addaff_meta_boxe_title" value="<? echo $title ?>"/>
    </p>
    <p>
    	<label for="event-url">Link de afiliados - url</label>
        <input type="text" id="event-url" class="widefat code" name="_addaff_meta_boxe_url" value=" <? echo $url; ?>">
    </p>
<?
}

add_action('save_post', 'addaff_meta_save');
function addaff_meta_save($id)
{
	if( defined('DOING_AUTOSAVE') && 'DOING_AUTOSAVE') return;
	
	if(!isset($_POST['addaff_meta_box_nonce']) || !wp_verify_nonce($_POST['addaff_meta_box_nonce'], 'save_addaff_meta_box')) 
		return;
	
	if(!current_user_can('edit_post')) 
		return;
	
	if(isset($_POST['_addaff_meta_boxe_title']))
	{
		update_post_meta($id, '_addaff_meta_boxe_title', esc_attr(strip_tags($_POST['_addaff_meta_boxe_title'])));
	}
	
	if(isset($_POST['_addaff_meta_boxe_url']))
	{
		update_post_meta($id, '_addaff_meta_boxe_url', esc_attr(strip_tags($_POST['_addaff_meta_boxe_url'])));
	}
}
?>