<?php

// Featured Posts
add_action( 'add_meta_boxes', 'flexity_meta_box_post_add' );
function flexity_meta_box_post_add()
{
    add_meta_box( 'flexity-meta-box-post', 'Featured', 'flexity_meta_box_post_fields', 'post', 'normal', 'high' );
}
function flexity_meta_box_post_fields()
{
    global $post;
    $values = get_post_custom( $post->ID );
    $check = isset( $values['my_meta_box_check_post'] ) ? esc_attr( $values['my_meta_box_check_post'][0] ) : '';
     
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        <input type="checkbox" id="my_meta_box_check_post" name="my_meta_box_check_post" <?php checked( $check, 'on' ); ?> />
        <label for="my_meta_box_check_post"><?php echo esc_html__('Featured', 'flexity'); ?></label>
    </p>
    <?php    
}

add_action( 'save_post', 'flexity_meta_box_post_save' );
function flexity_meta_box_post_save( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    if( !current_user_can( 'edit_post' ) ) return;

    $allowed = array( 
        'a' => array(
            'href' => array()
        )
    );

    $chk = isset( $_POST['my_meta_box_check_post'] ) ? 'on' : 'off';
    update_post_meta( $post_id, 'my_meta_box_check_post', $chk );
}




// Page Width: Normal Width, Full Width
add_action( 'add_meta_boxes', 'flexity_meta_box_page_add' );
function flexity_meta_box_page_add()
{
    add_meta_box( 'flexity-meta-box-page', 'Page Width', 'flexity_meta_box_page_fields', 'page', 'side', 'default' );
}
function flexity_meta_box_page_fields()
{
    global $post;
    $values = get_post_custom( $post->ID );
    $width = isset( $values['my_meta_box_page'] ) ? esc_attr( $values['my_meta_box_page'][0] ) : '';

    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        <input type="radio" id="my_meta_box_page_normal" name="my_meta_box_page" value="normal"<?php if (!$width || $width == 'normal') echo ' checked'; ?>>
        <label for="my_meta_box_page_normal"><?php echo esc_html__('Normal', 'flexity'); ?></label>
    </p>
    <p>
        <input type="radio" id="my_meta_box_page_full" name="my_meta_box_page" value="full"<?php if ($width == 'full') echo ' checked'; ?>>
        <label for="my_meta_box_page_full"><?php echo esc_html__('Full Width', 'flexity'); ?></label>
    </p>
    <?php
}

add_action( 'save_post', 'flexity_meta_box_page_save' );
function flexity_meta_box_page_save( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    $width = isset( $_POST['my_meta_box_page'] ) ? $_POST['my_meta_box_page'] : 'normal';
    update_post_meta( $post_id, 'my_meta_box_page', $width );
}



// Show Page Title and Breadcrumbs
add_action( 'add_meta_boxes', 'flexity_meta_box_page_add_2' );
function flexity_meta_box_page_add_2()
{
    add_meta_box( 'flexity-page-ttl-bcrumbs', 'Title and Breadcrumbs', 'flexity_meta_box_page_fields_2', 'page', 'side', 'default' );
}
function flexity_meta_box_page_fields_2()
{
    global $post;
    $values = get_post_custom( $post->ID );
    $page_ttl_bcrumbs = isset( $values['page_ttl_bcrumbs'] ) ? esc_attr( $values['page_ttl_bcrumbs'][0] ) : '';

    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        <input type="radio" id="page_ttl_bcrumbs_show_both" name="page_ttl_bcrumbs" value="show_both"<?php if (!$page_ttl_bcrumbs || $page_ttl_bcrumbs == 'show_both') echo ' checked'; ?>>
        <label for="page_ttl_bcrumbs_show_both"><?php echo esc_html__('Show Both', 'flexity'); ?></label>
    </p>
    <p>
        <input type="radio" id="page_ttl_bcrumbs_only_ttl" name="page_ttl_bcrumbs" value="only_ttl"<?php if ($page_ttl_bcrumbs == 'only_ttl') echo ' checked'; ?>>
        <label for="page_ttl_bcrumbs_only_ttl"><?php echo esc_html__('Show Only Title', 'flexity'); ?></label>
    </p>
    <p>
        <input type="radio" id="page_ttl_bcrumbs_only_bcrumbs" name="page_ttl_bcrumbs" value="only_bcrumbs"<?php if ($page_ttl_bcrumbs == 'only_bcrumbs') echo ' checked'; ?>>
        <label for="page_ttl_bcrumbs_only_bcrumbs"><?php echo esc_html__('Show Only Breadcrumbs', 'flexity'); ?></label>
    </p>
    <p>
        <input type="radio" id="page_ttl_bcrumbs_hide_both" name="page_ttl_bcrumbs" value="hide_both"<?php if ($page_ttl_bcrumbs == 'hide_both') echo ' checked'; ?>>
        <label for="page_ttl_bcrumbs_hide_both"><?php echo esc_html__('Hide Both', 'flexity'); ?></label>
    </p>
    <?php
}

add_action( 'save_post', 'flexity_meta_box_page_save_2' );
function flexity_meta_box_page_save_2( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

	$page_ttl_bcrumbs = isset( $_POST['page_ttl_bcrumbs'] ) ? $_POST['page_ttl_bcrumbs'] : 'show_both';
    update_post_meta( $post_id, 'page_ttl_bcrumbs', $page_ttl_bcrumbs );
}





/**
 * Load options, metaboxes, and shortcode generator array templates.
 */

// options
$tmpl_opt  = get_template_directory() . '/admin/option/option.php';

// metaboxes
$tmpl_mb_events  = get_template_directory() . '/admin/metabox/events.php';
$tmpl_mb_blog  = get_template_directory() . '/admin/metabox/blog.php';
$tmpl_mb_product  = get_template_directory() . '/admin/metabox/product.php';
$tmpl_mb_gallery  = get_template_directory() . '/admin/metabox/gallery.php';

// shortocode generators
$tmpl_sg1  = get_template_directory() . '/admin/shortcode_generator/shortcodes1.php';
$tmpl_sg2  = get_template_directory() . '/admin/shortcode_generator/shortcodes2.php';

/**
 * Create instance of Options
 */
$theme_options = new VP_Option(array(
	'is_dev_mode'           => false,                                  // dev mode, default to false
	'option_key'            => 'vpt_option',                           // options key in db, required
	'page_slug'             => 'vpt_option',                           // options page slug, required
	'template'              => $tmpl_opt,                              // template file path or array, required
	'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
	'use_auto_group_naming' => true,                                   // default to true
	'use_util_menu'         => true,                                   // default to true, shows utility menu
	'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
	'layout'                => 'fixed',                                // fluid or fixed, default to fixed
	'page_title'            => esc_html__( 'Theme Options', 'flexity' ), // page title
	'menu_label'            => esc_html__( 'Theme Options', 'flexity' ), // menu label
));

/**
 * Create instances of Metaboxes
 */
$mb_events = new VP_Metabox($tmpl_mb_events);
$mb_blog = new VP_Metabox($tmpl_mb_blog);
$mb_product = new VP_Metabox($tmpl_mb_product);
$mb_gallery = new VP_Metabox($tmpl_mb_gallery);




global $flexity_options;
$flexity_options = vp_option('vpt_option');

if (defined( 'WCCM_VERISON' )) {
	$compare_list = wccm_get_compare_list();
	$wccm_compare_page = get_option('wccm_compare_page');

	$flexity_options['compare']['id'] = $wccm_compare_page;
	$flexity_options['compare']['list'] = $compare_list;
}

if ( class_exists( 'YITH_WCWL' ) ) {

	global $wpdb;
	if($wpdb->get_var("SHOW TABLES LIKE 'wp_yith_wcwl'") != 'wp_yith_wcwl') {
		$wishlist_count = 0;
	}
	else{
		$wishlist_count = YITH_WCWL()->count_products();
	}
    $yith_wcwl_wishlist_page = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) );

    $flexity_options['wishlist']['id'] = $yith_wcwl_wishlist_page;
    $flexity_options['wishlist']['count'] = $wishlist_count;

}

if ( class_exists( 'WooCommerce' ) ) {

	$flexity_options['cart']['id'] = get_option('woocommerce_cart_page_id');
	$flexity_options['cart']['url'] = wc_get_cart_url();

	$flexity_options['checkout']['id'] = get_option('woocommerce_checkout_page_id');
	$flexity_options['checkout']['url'] = wc_get_checkout_url();

}