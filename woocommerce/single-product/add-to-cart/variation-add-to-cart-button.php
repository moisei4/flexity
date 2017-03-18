<?php
/**
 * Single variation cart button
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
?>
<button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->id ); ?>" />
<input type="hidden" name="product_id" value="<?php echo absint( $product->id ); ?>" />
<input type="hidden" name="variation_id" class="variation_id" value="0" />
<a href="<?php the_permalink(); ?>" class="prod-choose-opt"><?php esc_html_e('Choose Options', 'flexity'); ?></a>