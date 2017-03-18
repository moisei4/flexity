<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if (function_exists('vp_metabox')) {
	$product_shipping = vp_metabox('flexity_meta_product.product_shipping');
	$product_description = vp_metabox('flexity_meta_product.product_description');
}
?>

<article itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>">

<?php woocommerce_template_single_title(); ?>
<span class="maincont-line1"></span>
<span class="maincont-line2"></span>

<?php
	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>


<!-- Product - start -->
<div <?php post_class('prod'); ?>>

	<!-- Product Slider - start -->
	<div class="prod-slider-wrap">
		<?php woocommerce_show_product_images(); ?>
	</div>
	<!-- Product Slider - end -->

	<!-- Product Content - start -->
	<div class="prod-cont">
		<?php
		/**
		 * woocommerce_before_single_product hook.
		 *
		 * @hooked wc_print_notices - 10
		 */
		 do_action( 'woocommerce_before_single_product' );
		?>
		
		<?php if (!empty($product_description)) : ?>
		<div class="prod-desc">
			<p class="prod-desc-ttl"><span><?php echo esc_html__('Description', 'flexity'); ?></span></p>
			<?php woocommerce_template_single_excerpt(); ?>
			<?php woocommerce_template_single_sharing(); ?>
			
			<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
			<?php do_action( 'woocommerce_single_product_summary' ); ?>
			<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
			<?php
			do_action( 'woocommerce_product_meta_start' );
			do_action( 'woocommerce_product_meta_end' );
			do_action( 'woocommerce_share' );
			?>

		</div>
		<?php endif; ?>
		<div class="prod-props">
			<?php woocommerce_template_single_meta(); ?>
		</div>
		<?php
		if ( $product && $product->product_type == 'variable' ) :
			woocommerce_template_single_add_to_cart();
		else:
		?>
		<div class="prod-info">
			<div class="prod-price-wrap">
				<p><?php echo esc_html__('Price', 'flexity'); ?></p>
				<?php woocommerce_template_single_price(); ?>
			</div>
			<div class="prod-qnt-wrap">
				<p><?php echo esc_html__('Quantity', 'flexity'); ?></p>
				<p class="qnt-wrap prod-qnt">
					<a href="#" class="qnt-minus prod-minus"><?php echo esc_html__('-', 'flexity'); ?></a>
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
					<a href="#" class="qnt-plus prod-plus"><?php echo esc_html__('+', 'flexity'); ?></a>
				</p>
			</div>
			<div class="prod-total-wrap">
				<p><?php echo esc_html__('Total', 'flexity'); ?></p>
				<?php woocommerce_template_single_price(); ?>
			</div>
			<?php if (!empty($product_shipping)) : ?>
			<div class="prod-shipping-wrap">
				<p><?php echo esc_html__('Shipping', 'flexity'); ?></p>
				<p class="prod-shipping"><?php echo esc_attr($product_shipping); ?></p>
			</div>
			<?php endif; ?>
		</div>
		<div class="prod-actions">
			<div class="prod-rating-wrap">
				<p data-rating="<?php echo round($product->get_average_rating()); ?>" class="prod-rating">
					<i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o" title="4"></i><i class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i class="fa fa-star-o" title="1"></i>
				</p>
				<p><span class="prod-rating-count"><?php echo intval($product->get_review_count()); ?></span> <?php esc_html_e('reviews', 'flexity'); ?></p>
			</div>

			<?php if (defined( 'WCCM_VERISON' )) : ?>
			<p class="prod-compare">
				<?php
				if ( in_array( get_the_id(), wccm_get_compare_list() ) ) {
					$url = wccm_get_compare_link( get_the_id(), 'remove-from-list' );
					$text = get_option( 'wccm_remove_text', esc_html__( 'Remove compare', 'flexity' ) );
					echo '<a href="', esc_url( $url ), '" class="prod-li-compare-btn prod-li-compare-added">', esc_html( $text ), '</a>';
				} else {
					$url = wccm_get_compare_link( get_the_id(), 'add-to-list' );
					$text = get_option( 'wccm_compare_text', esc_html__( 'Compare', 'flexity' ) );
					echo '<a href="', esc_url( $url ), '" class="prod-li-compare-btn">', esc_html( $text ), '</a>';
				}
				?>
				<i class="fa fa-spinner fa-pulse prod-li-compare-loading"></i>
			</p>
			<?php endif; ?>

			<?php
			if ( class_exists( 'YITH_WCWL' ) ) {
				echo do_shortcode('[yith_wcwl_add_to_wishlist]');
			}
			?>
			<div class="prod-add">
				<?php
				/*if ( $product && $product->product_type == 'simple' ) {
					$class = implode( ' ', array_filter( array(
						'button',
						'product_type_' . $product->product_type,
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''
						) )
					);
					echo sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( isset( $quantity ) ? $quantity : 1 ),
						esc_attr( $product->id ),
						esc_attr( $product->get_sku() ),
						esc_attr( isset( $class ) ? $class : 'button' ),
						esc_html( 'Add to cart' )
					);
				} elseif ( $product && $product->product_type != 'variable' ) {*/
					woocommerce_template_single_add_to_cart();
				//}
				?>
			</div>
		</div>
		<?php endif; ?>

	</div>
	<!-- Product Content - end -->

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div>
<!-- Product - end -->



<?php
// Product Tabs
woocommerce_output_product_data_tabs();

// Upsell
woocommerce_upsell_display();

// Related Products
woocommerce_output_related_products();
?>

</article>

<?php do_action( 'woocommerce_after_single_product' ); ?>