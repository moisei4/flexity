<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->id ); ?>" data-product_variations="<?php echo htmlspecialchars( json_encode( $available_variations ) ) ?>">

	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'flexity' ); ?></p>
	<?php else : ?>


<div class="prod-info">
	<div class="prod-price-wrap">
		<p><?php echo esc_html__('Price', 'flexity'); ?></p>
	<?php
		woocommerce_single_variation();
	?>
	</div>
	<div class="prod-qnt-wrap">
		<p>Quantity</p>
	<?php if ( ! $product->is_sold_individually() ) : ?>
		<?php woocommerce_quantity_input( array( 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ) ); ?>
	<?php endif; ?>
	</div>
	<div class="prod-col-wrap prod-var-wrap">
		<p><?php echo esc_html__('Options', 'flexity'); ?></p>
		<table class="variations">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>
						<td class="label"><label for="<?php echo sanitize_title( $attribute_name ); ?>"><?php echo wc_attribute_label( $attribute_name ); ?></label></td>
						<td class="value">
							<?php
								$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) : $product->get_variation_default_attribute( $attribute_name );
								wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
								echo end( $attribute_keys ) === $attribute_name ? apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'flexity' ) . '</a>' ) : '';
							?>
						</td>
					</tr>
		        <?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>

<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

<?php
/**
 * woocommerce_before_single_variation Hook.
 */
do_action( 'woocommerce_before_single_variation' );
?>
<?php
/**
 * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
 * @since 2.4.0
 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
 */
do_action( 'woocommerce_single_variation' );
?>

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
		<?php woocommerce_single_variation_add_to_cart_button(); ?>
	</div>
</div>

		<?php
		/**
		 * woocommerce_after_single_variation Hook.
		 */
		do_action( 'woocommerce_after_single_variation' );
		?>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
