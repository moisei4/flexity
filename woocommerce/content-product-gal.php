<?php
// Extra post classes
$classes = array();
if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
$classes[] = 'sectgl prod-i';

// Product Price
$display_price         = $product->get_display_price();
$display_regular_price = $product->get_display_price( $product->get_regular_price() );
$display_sale_price    = $product->get_display_price( $product->get_sale_price() );
if ( $product->get_price() !== '' ) {
	if ( $product->is_on_sale() ) {
		$price =  '<span class="prod-i-price">'. wc_price( $display_sale_price ) . '</span>' . ' <del>' . wc_price( $display_regular_price ) . '</del>'. $product->get_price_suffix();
	} elseif ( $product->get_price() > 0 ) {
		$price = '<span class="prod-i-price">'. wc_price( $display_price ) . '</span>' . $product->get_price_suffix();
	} else {
		$price = '<span class="prod-i-price">'.esc_html__('Free!', 'flexity').'</span>';
	}
} else {
	$price = '';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>

	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	?>

	<div class="prod-i-actions">
		<p class="prod-i-quick-view">
			<a title="<?php esc_html_e('Quick View', 'flexity'); ?>" href="#" class="quick-view" data-url="<?php echo admin_url('admin-ajax.php'); ?>" data-file="woocommerce/quickview-single-product.php" data-id="<?php echo intval($product->id); ?>"></a>
			<i class="fa fa-spinner fa-pulse quick-view-loading"></i>
		</p>

		<?php
		if ( class_exists( 'YITH_WCWL' ) ) {
			echo do_shortcode('[yith_wcwl_add_to_wishlist]');
		}
		?>

		<?php if (defined( 'WCCM_VERISON' )) : ?>
			<p class="prod-li-compare">
				<?php
				if ( in_array( $product->id, wccm_get_compare_list() ) ) {
					$url = wccm_get_compare_link( $product->id, 'remove-from-list' );
					$text = get_option( 'wccm_remove_text', esc_html__( 'Remove compare', 'flexity' ) );
					echo '<a title="'.esc_html__('Compare', 'flexity').'" href="', esc_url( $url ), '" class="prod-li-compare-btn prod-li-compare-added">', esc_html( $text ), '</a>';
				} else {
					$url = wccm_get_compare_link( $product->id, 'add-to-list' );
					$text = get_option( 'wccm_compare_text', esc_html__( 'Compare', 'flexity' ) );
					echo '<a title="'.esc_html__('Compare', 'flexity').'" href="', esc_url( $url ), '" class="prod-li-compare-btn">', esc_html( $text ), '</a>';
				}
				?>
				<i class="fa fa-spinner fa-pulse prod-li-compare-loading"></i>
			</p>
		<?php endif; ?>
	</div>

	<a href="<?php the_permalink(); ?>" class="prod-i-link">
		<p class="prod-i-img">
			<?php echo woocommerce_get_product_thumbnail(); ?>
		</p>
		<?php
		/**
		 * woocommerce_before_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		<?php
		/**
		 * woocommerce_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		do_action( 'woocommerce_shop_loop_item_title' );
		?>
		<h3><span><?php the_title(); ?></span></h3>
		<?php
		/**
		 * woocommerce_after_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
	</a>
	<p class="prod-i-info">
		<?php
		$product_categories = get_the_terms( $post->ID, 'product_cat' );
		if (!empty($product_categories)) :
			?>
			<span class="prod-i-categ">
			<?php
			foreach ($product_categories as $key=>$product_category) :
				?>
				<a href="<?php echo get_term_link($product_category); ?>">
					<?php echo esc_attr($product_category->name); ?>
				</a>
				<?php break; ?>
			<?php endforeach; ?>
			</span>
		<?php endif; ?>
		<?php echo wp_kses_post($price); ?>
		<?php woocommerce_template_loop_add_to_cart(array('button_text'=>esc_html__('+ Add to cart', 'flexity'))); ?>
	</p>


	<?php
	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>

</article>
