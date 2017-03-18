<?php
// Product Price

global $product;
global $post;

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
	<article id="post-<?php the_ID(); ?>" class="prod-li sectls">
		<a href="<?php the_permalink(); ?>" class="prod-li-img">
			<?php echo woocommerce_get_product_thumbnail(); ?>
		</a>
		<div class="prod-li-cont">
			<?php
			/**
			 * woocommerce_before_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item' );
			?>
			<div class="prod-li-ttl-wrap">
				<p>
					<?php
					$product_categories = get_the_terms( $post->ID, 'product_cat' );
					if (!empty($product_categories)) :
						foreach ($product_categories as $key=>$product_category) :
							?>
						<a href="<?php echo get_term_link($product_category); ?>">
							<?php echo esc_attr($product_category->name); ?>
							</a><?php if ($key+1 < count($product_categories)) echo ',&nbsp;'; ?>
						<?php endforeach; ?>
					<?php endif; ?>
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
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
				?>
			</div>
			<div class="prod-li-price-wrap">
				<p><?php echo esc_html__('Price', 'flexity'); ?></p>
				<p class="prod-li-price"><?php echo wp_kses_post($price); ?></p>
			</div>
			<div class="prod-li-qnt-wrap">
				<p><?php echo esc_html__('Quantity', 'flexity'); ?></p>
				<p class="qnt-wrap prod-li-qnt">
					<a href="#" class="qnt-minus prod-li-minus"><?php echo esc_html__('-', 'flexity'); ?></a>
					<input 
						data-qnt-price="<?php echo esc_attr($product->get_display_price()); ?>" 
						data-decimals="<?php echo wc_get_price_decimals(); ?>" 
						data-thousand_separator="<?php echo wc_get_price_thousand_separator(); ?>" 
						data-decimal_separator="<?php echo wc_get_price_decimal_separator(); ?>" 
						data-currency="<?php echo get_woocommerce_currency_symbol(); ?>" 
						data-price_format="<?php echo get_woocommerce_price_format(); ?>" 
						type="text" 
						value="1"
					>
					<a href="#" class="qnt-plus prod-li-plus"><?php echo esc_html__('+', 'flexity'); ?></a>
				</p>
			</div>
			<div class="prod-li-total-wrap">
				<p><?php echo esc_html__('Total', 'flexity'); ?></p>
				<p class="prod-li-total"><?php echo wp_kses_post($price); ?></p>
			</div>
			<?php
			/**
			 * woocommerce_after_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
			?>
		</div>
		<div class="prod-li-info">
			<div class="prod-li-rating-wrap">
				<p data-rating="<?php echo round($product->get_average_rating()); ?>" class="prod-li-rating">
					<i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o" title="4"></i><i class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i class="fa fa-star-o" title="1"></i>
				</p>
				<p><span class="prod-li-rating-count"><?php echo intval($product->get_review_count()); ?></span> <?php esc_html_e('reviews', 'flexity'); ?></p>
			</div>
			<p class="prod-li-id"><?php esc_html_e('id', 'flexity'); ?> <?php echo intval($product->id); ?></p>
			<p class="prod-li-add">
				<?php woocommerce_template_loop_add_to_cart(); ?>
			</p>

			<p class="prod-li-quick-view">
				<a href="#" class="quick-view" data-url="<?php echo admin_url('admin-ajax.php'); ?>" data-file="woocommerce/quickview-single-product.php" data-id="<?php echo intval($product->id); ?>"></a>
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
						echo '<a href="', esc_url( $url ), '" class="prod-li-compare-btn prod-li-compare-added">', esc_html( $text ), '</a>';
					} else {
						$url = wccm_get_compare_link( $product->id, 'add-to-list' );
						$text = get_option( 'wccm_compare_text', esc_html__( 'Compare', 'flexity' ) );
						echo '<a href="', esc_url( $url ), '" class="prod-li-compare-btn">', esc_html( $text ), '</a>';
					}
					?>
					<i class="fa fa-spinner fa-pulse prod-li-compare-loading"></i>
				</p>
			<?php endif; ?>

		</div>
	</article>
<?php
$int_key++;
?>