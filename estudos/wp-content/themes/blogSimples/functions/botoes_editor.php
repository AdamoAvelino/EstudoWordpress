<?
function my_tinymce_button() {
	 	   add_filter('mce_external_plugins', 'my_add_tinymce_button');
           add_filter('mce_buttons_3', 'my_register_tinymce_button');
           
 }

 function my_register_tinymce_button($botoes) {
      array_push($botoes, "meu_botao", "outro_botao", "jquery");
      return $botoes;
 }

 function my_add_tinymce_button($plugin_array) {
      $plugin_array['my_button_script'] = get_bloginfo('template_url').'/js/customcodes.js';
    /*echo "<script>alert('".$plugin_array['my_button_script']."')</script>";*/
	  return $plugin_array;
 }
 

function adiciona_botao_html()
{
	if(wp_script_is('quicktags'))
	{
?>
		<script type="text/javascript">
        	QTags.addButton('citacao', 'Cite', '[cite]', '[/cite]', 'citacao', 'Shortcode bolckquote', 150);
        </script>
<?		
	}
}
?>