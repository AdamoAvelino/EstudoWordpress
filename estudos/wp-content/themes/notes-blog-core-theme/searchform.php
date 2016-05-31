<form method="get" action="<?php bloginfo('url'); ?>/">
<div id="searchform"><input type="text" value="<?php the_search_query(); ?>" name="s" class="keyword" />
<input type="submit" class="button" value="<?php _e("Search", "notesblog");?>" />
</div></form>
