<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.8
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $flexity_options;
$cart_template = $flexity_options['flexity_cart_template'];
?>
<div class="cont maincont">
	<?php do_action( 'woocommerce_before_cart' ); ?>

	<h1 class="page_title"><span><?php the_title(); ?></span></h1>

	<?php get_template_part('template-parts/personal-menu'); ?>

	<p class="section-count"><?php echo WC()->cart->get_cart_contents_count(); ?> <?php echo esc_html__('ITEMS', 'flexity'); ?></p>

	<?php wc_print_notices(); ?>

	<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

		<?php do_action( 'woocommerce_before_cart_table' ); ?>


		<?php // Cart Template: Modern ?>
		<?php if ($cart_template == 'modern') : ?>


			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<!-- Cart Items - start -->
			<div class="prod-litems section-list cart-list">
				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						?>
						<div class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?> sectls prod-li">
							<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							if ( ! $_product->is_visible() ) {
								echo wp_kses_post($thumbnail);
							} else {
								printf( '<a class="prod-li-img" href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
							}
							?>
							<div class="prod-li-cont">
								<div class="prod-li-ttl-wrap">
									<p>
										<?php
										$product_categories = get_the_terms( $product_id, 'product_cat' );
										if (!empty($product_categories)) :
											foreach ($product_categories as $key=>$product_category) :
												?>
												<a href="<?php echo get_term_link($product_category); ?>"><?php echo esc_attr($product_category->name); ?></a><?php if ($key+1 < count($product_categories)) echo ',&nbsp;'; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</p>
									<h3>
										<?php
										if ( ! $_product->is_visible() ) {
											echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
										} else {
											echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
										}

										// Meta data
										echo WC()->cart->get_item_data( $cart_item );

										// Backorder notification
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'flexity' ) . '</p>';
										}
										?>
									</h3>
								</div>
								<div class="prod-li-price-wrap">
									<p><?php esc_html_e( 'Price', 'flexity' ); ?></p>
									<p class="prod-li-price">
										<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
										?>
									</p>
								</div>
								<div class="prod-li-qnt-wrap">
									<p><?php esc_html_e( 'Quantity', 'flexity' ); ?></p>
									<?php
									if ( $_product->is_sold_individually() ) {
										$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
									} else {
										$product_quantity = woocommerce_quantity_input( array(
											'input_name'  => "cart[{$cart_item_key}][qty]",
											'input_value' => $cart_item['quantity'],
											'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
											'min_value'   => '0',
											'price' => $_product->get_display_price(),
										), $_product, false );
									}

									echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
									?>
								</div>
								<div class="prod-li-total-wrap">
									<p><?php esc_html_e( 'Order amount', 'flexity' ); ?></p>
									<p class="prod-li-total">
										<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
										?>
									</p>
								</div>
							</div>
							<div class="prod-li-info">
								<div class="prod-li-rating-wrap">
									<p class="prod-li-rating" data-rating="<?php echo round($_product->get_average_rating()); ?>">
										<i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o" title="4"></i><i class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i class="fa fa-star-o" title="1"></i>
									</p>
									<p><span class="prod-li-rating-count"><?php echo intval($_product->get_review_count()); ?></span> <?php esc_html_e('reviews', 'flexity'); ?></p>
								</div>
								<p class="prod-li-id"><?php esc_html_e('id', 'flexity'); ?> <?php echo intval($product_id); ?></p>
								<p class="prod-li-add">
									<?php
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
										'<a href="%s" title="%s" data-product_id="%s" data-product_sku="%s">'.esc_html__('Remove from cart', 'flexity').'</a>',
										esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'flexity' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									), $cart_item_key );
									?>
								</p>

								<p class="prod-li-quick-view">
									<a href="#" class="quick-view" data-url="<?php echo admin_url('admin-ajax.php'); ?>" data-file="woocommerce/quickview-single-product.php" data-id="<?php echo intval($product_id); ?>"></a>
								</p>

								<?php
								if ( class_exists( 'YITH_WCWL' ) ) {
									echo do_shortcode('[yith_wcwl_add_to_wishlist product_id='.$product_id.']');
								}
								?>

								<?php if (defined( 'WCCM_VERISON' )) : ?>
									<p class="prod-li-compare">
										<?php
										if ( in_array( $product_id, wccm_get_compare_list() ) ) {
											$url = wccm_get_compare_link( $product_id, 'remove-from-list' );
											$text = get_option( 'wccm_remove_text', esc_html__( 'Remove compare', 'flexity' ) );
											echo '<a href="', esc_url( $url ), '" class="prod-li-compare-btn prod-li-compare-added">', esc_html( $text ), '</a>';
										} else {
											$url = wccm_get_compare_link( $product_id, 'add-to-list' );
											$text = get_option( 'wccm_compare_text', esc_html__( 'Compare', 'flexity' ) );
											echo '<a href="', esc_url( $url ), '" class="prod-li-compare-btn">', esc_html( $text ), '</a>';
										}
										?>
										<i class="fa fa-spinner fa-pulse prod-li-compare-loading"></i>
									</p>
								<?php endif; ?>

							</div>
						</div>
						<?php
					}
				}

				do_action( 'woocommerce_cart_contents' );
				?>


			</div>
			<!-- Cart Items - end -->

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>


			<?php // Cart Template: Classic ?>
		<?php else: ?>



			<table class="shop_table shop_table_responsive cart cart-table" cellspacing="0">
				<thead>
				<tr>
					<th class="product-remove">&nbsp;</th>
					<th class="product-thumbnail">&nbsp;</th>
					<th class="product-name"><?php esc_html_e( 'Product', 'flexity' ); ?></th>
					<th class="product-price"><?php esc_html_e( 'Price', 'flexity' ); ?></th>
					<th class="product-quantity"><?php esc_html_e( 'Quantity', 'flexity' ); ?></th>
					<th class="product-subtotal"><?php esc_html_e( 'Total', 'flexity' ); ?></th>
				</tr>
				</thead>
				<tbody>
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						?>
						<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

							<td class="product-remove">
								<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
									esc_html__( 'Remove this item', 'flexity' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
								?>
							</td>

							<td class="product-thumbnail">
								<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $_product->is_visible() ) {
									echo wp_kses_post($thumbnail);
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
								}
								?>
							</td>

							<td class="product-name" data-title="<?php esc_html_e( 'Product', 'flexity' ); ?>">
								<?php
								if ( ! $_product->is_visible() ) {
									echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
								} else {
									echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
								}

								// Meta data
								echo WC()->cart->get_item_data( $cart_item );

								// Backorder notification
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'flexity' ) . '</p>';
								}
								?>
							</td>

							<td class="product-price" data-title="<?php esc_html_e( 'Price', 'flexity' ); ?>">
								<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
								?>
							</td>

							<td class="product-quantity" data-title="<?php esc_html_e( 'Quantity', 'flexity' ); ?>">
								<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
										'min_value'   => '0'
									), $_product, false );
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
								?>
							</td>

							<td class="product-subtotal" data-title="<?php esc_html_e( 'Total', 'flexity' ); ?>">
								<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
								?>
							</td>
						</tr>
						<?php
					}
				}

				do_action( 'woocommerce_cart_contents' );
				?>
				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
				</tbody>
			</table>




		<?php endif; ?>


		<div class="cart-actions">

			<?php if ( wc_coupons_enabled() ) { ?>
				<div class="coupon">
					<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'flexity' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply', 'flexity' ); ?>" />

					<?php do_action( 'woocommerce_cart_coupon' ); ?>
				</div>
			<?php } ?>

			<?php do_action( 'woocommerce_cart_actions' ); ?>

			<div class="cart-collaterals">
				<?php do_action( 'woocommerce_cart_collaterals' ); ?>
			</div>

		</div>

		<?php wp_nonce_field( 'woocommerce-cart' ); ?>


		<?php do_action( 'woocommerce_after_cart_table' ); ?>

	</form>


	<?php do_action( 'woocommerce_after_cart' ); ?>

</div>


<?php woocommerce_cross_sell_display(); ?>
