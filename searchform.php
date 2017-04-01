<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search_form" id="search_form">
	<input value="<?php echo get_search_query(); ?>" name="s" type="text" placeholder="<?php echo esc_html__('Search..', 'flexity'); ?>">
	<button type="submit"><i class="stockware_theme_icon_header_search"></i></button>
</form>