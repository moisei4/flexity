<?php

// Remove Woocomerce Actions
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

remove_action( 'woocommerce_before_shop_loop', 'wccm_register_add_compare_button_hook' );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
remove_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_single_product_summary', 'wccm_add_single_product_compare_buttton', 35 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


// Change number of products displayed per page
if (isset($flexity_options)) {
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$flexity_options["flexity_catalog_pagi"].';' ), 20 );
}


// All Categories
function flexity_hierarchical_category_tree( $cat ) {
	$next = get_categories('hide_empty=0&taxonomy=product_cat&parent=' . $cat);
	if( $next ) :
		foreach( $next as $cat ) :
			echo '<ul><li><a href="' . get_category_link( $cat->term_id ) . '">' . esc_attr($cat->name) . '</a>';
			flexity_hierarchical_category_tree( $cat->term_id );
			echo '</li></ul>';
		endforeach;
	endif;
}



// View Mode
if(session_id() == '') {
	session_start();
}
if (isset($_GET['view_mode']) && $_GET['view_mode'] == 'gallery') {
	$_SESSION['view_mode'] = 'gallery';
} elseif (isset($_GET['view_mode']) && $_GET['view_mode'] == 'list') {
	$_SESSION['view_mode'] = 'list';
}



// Ensure cart contents update when products are added to the cart via AJAX
add_filter( 'woocommerce_add_to_cart_fragments', 'flexity_header_add_to_cart_fragment_personal' );
function flexity_header_add_to_cart_fragment_personal( $fragments ) {
	ob_start();
	?>
	<li class="header-personal-cart">
		<a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>"><?php echo esc_html__('Shopping Cart', 'flexity'); ?> <span><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
	</li>
	<?php
	$fragments['li.header-personal-cart'] = ob_get_clean();
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'flexity_header_add_to_cart_fragment_cart' );
function flexity_header_add_to_cart_fragment_cart( $fragments ) {
	ob_start();
	?>
	<div class="header-cart-inner">
		<p class="header-cart-count">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/cart.png" alt="">
			<span><?php echo WC()->cart->get_cart_contents_count()?></span>
		</p>
		<p class="header-cart-summ"><?php echo WC()->cart->get_cart_total(); ?></p>
	</div>
	<?php
	$fragments['div.header-cart-inner'] = ob_get_clean();
	return $fragments;
}



// Display Price For Variable Product With Same Variations Prices
function flexity_woocommerce_available_variation ($value, $object = null, $variation = null) {
	if ($value['price_html'] == '') {
		$value['price_html'] = '<span class="price">' . $variation->get_price_html() . '</span>';
	}
	return $value;
}
add_filter('woocommerce_available_variation', 'flexity_woocommerce_available_variation', 10, 3);



// force to make is_cart() returns true, to make right calculations on class-wc-cart.php (WC_Cart::calculate_totals())
// this define fix a bug that not show Shipping calculator when is WAC ajax request
add_action('init', 'flexity_wac_init');
function flexity_wac_init() {
    if ( !empty($_POST['is_cart_ajax']) && !defined( 'WOOCOMMERCE_CART' ) ) {
        define( 'WOOCOMMERCE_CART', true );
    }
}

// on submit AJAX form of the cart
// after calculate cart form items
add_action('woocommerce_cart_updated', 'flexity_wac_update');
function flexity_wac_update() {
    if ( !empty($_POST['is_cart_ajax'])) {
        $resp = array();
        $resp['update_label'] = esc_html__( 'Update Cart', 'flexity' );
        $resp['checkout_label'] = esc_html__( 'Proceed to Checkout', 'flexity' );
        $resp['price'] = 0;
        
        // render the cart totals (cart-totals.php)
        ob_start();
        do_action( 'woocommerce_after_cart_table' );
        do_action( 'woocommerce_cart_collaterals' );
        do_action( 'woocommerce_after_cart' );
        $resp['html'] = ob_get_clean();
        $resp['price'] = 0;
        
        // calculate the item price
        if ( !empty($_POST['cart_item_key']) ) {
            $items = WC()->cart->get_cart();
            $cart_item_key = $_POST['cart_item_key'];
            
            if ( array_key_exists($cart_item_key, $items)) {
                $cart_item = $items[$cart_item_key];
                $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $price = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                $resp['price'] = $price;
            }
        }

        echo json_encode($resp);
        exit;
    }
}