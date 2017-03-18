<?php

// Print wp_nav_menu with menu title
function flexity_print_nav_menu ($location = '') {
	$menu_loc_1 = $location;
	if (has_nav_menu($menu_loc_1)) {
		$locations = get_nav_menu_locations();
		$menu_id = $locations[$menu_loc_1];
	    $menu_obj_1 = wp_get_nav_menu_object($menu_id);
		wp_nav_menu( array(
			'theme_location' => $menu_loc_1,
			'container' => '',
			'container_class' => '',
			'menu_class' => '',
			'items_wrap' => '<p>'.esc_html($menu_obj_1->name).'</p><ul>%3$s</ul>',
		) );
	}
}


// Excerpt More from "[...]" to "..."
function flexity_excerpt_more ($more) {
	return "...";
}
add_filter("excerpt_more", "flexity_excerpt_more");


// New Excerpt Length
function flexity_new_excerpt_length($length) {
	global $post;
	if ($post->post_type == 'post')
		return 20;
	elseif ($post->post_type == 'product')
		return 20;
	return 55;
}
add_filter('excerpt_length', 'flexity_new_excerpt_length');


// Comment Template
function flexity_comment($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
	$author  = get_comment_author( $comment );
	if (!empty($comment->user_id)) {
		$user_author_meta = get_user_meta($comment->user_id);
	}
	?>
	<li <?php comment_class('post-comment'); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>">
		<p class="post-comment-img">
			<?php if (function_exists('get_wp_user_avatar')) : ?>
				<?php echo get_wp_user_avatar($comment->comment_author_email); ?>
			<?php else: ?>
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			<?php endif; ?>
		</p>
		<h4 class="post-comment-ttl"><?php
		if (!empty($user_author_meta['first_name'][0]) || !empty($user_author_meta['last_name'][0])) {
			if (!empty($user_author_meta['first_name'][0])) {
				echo esc_attr($user_author_meta['first_name'][0]).' ';
			}
			if (!empty($user_author_meta['last_name'][0])) {
				echo esc_attr($user_author_meta['last_name'][0]);
			}
		} else {
			echo get_comment_author_link();
		}
		?> <?php edit_comment_link('(Edit)', '  ', '') ?></h4>
		<?php if ($comment->comment_approved == '0') : ?>
			<p><i><?php echo esc_html__( 'Your comment is awaiting moderation.', 'flexity' ); ?></i></p>
		<?php endif; ?>
		<p class="comment-meta commentmetadata">
			<?php printf( '%1$s at %2$s', get_comment_date(),  get_comment_time()) ?>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</p>
		<div class="post-comment-cont">
		<?php comment_text(); ?>
		</div>
	</div>
<?php
}



// Get Attachment ID from src
function flexity_get_attach_id_from_src($image_url) {
	global $wpdb, $table_prefix;

	$res = $wpdb->get_results('select post_id from ' . $table_prefix . 'postmeta where meta_value like "%' . basename($image_url). '%" and meta_key = "_wp_attached_file"');

	if(count($res) == 0)
	{
		$res = $wpdb->get_results('select ID as post_id from ' . $table_prefix . 'posts where guid="' . $image_url . '"');
	}

	return $res[0]->post_id;
}