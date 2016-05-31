<?
/*
Plugin Name: Adamo Widget
Description: Plugin de contrução de widget
Version: 1.0
Author: Adamo
*/

class widget_simplesblog extends WP_Widget
{
	function __construct()
	{
		parent::__construct('spl_wgt', 'Simples Blog', array('description' =>'Um widget Simples'));
	}
	/*function widget_simplesblog()
	{
		parent::WP_Widget('simplesBolog', $name = 'Simples Blog');
	}*/
	
	function widget($args, $instance)
	{
		$query_widget = new WP_Query(array('category_name' => $instance['categoria'], 'showposts' => $instance['quantidade']));
		echo $args['before_widget'];
		echo $args['before_title'].'Categoria'.$args['after_title'];
		if($instance['categoria'] != '')
		{
		while($query_widget->have_posts()):
			$query_widget->the_post();
				the_post_thumbnail(array ('class' => 'miniatura')); 
				the_excerpt();
		endwhile;
		}
		wp_reset_postdata();
		echo $args['after_widget'];
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['categoria'] = strip_tags($new_instance['categoria']);
		$instance['quantidade'] = strip_tags($new_instance['quantidade']);
		
		return $instance;
		
	}
	
	function form($instance)
	{
		
		$categoria = $instance['categoria'];
		$quantidade = $instance['quantidade'];
?>
		<p>
        	<label for="<? echo $this->get_field_id('categoria')?>">Escolha categoria</label><br />
                <input class="widefat" id="<? echo $this->get_field_id('categoria'); ?>" name="<? echo $this->get_field_name('categoria');?>" type="text" value="<? echo $categoria; ?>">
        </p>
        <p>
        	<label for="<? echo $this->get_field_id('quantidade')?>">Quantos posts</label><br />
            <input type="text" id="<? echo $this->get_field_id('quantidade')?>" name="<? echo $this->get_field_name('quantidade')?>" value="<? echo $quantidade;?>">
        </p>
<?
		
	}
}

function simplesblog_widget_init()
{
	register_widget('widget_simplesblog');
}
add_action('widgets_init', 'simplesblog_widget_init');
?>