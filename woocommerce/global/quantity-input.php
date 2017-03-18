<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<p class="qnt-wrap prod-li-qnt">
	<a href="#" class="qnt-minus prod-li-minus"><?php echo esc_html__('-', 'flexity'); ?></a>
	<input 
		data-qnt-price="<?php if (!empty($args['price'])) echo esc_attr($args['price']); ?>" 
		data-decimals="<?php echo wc_get_price_decimals(); ?>" 
		data-thousand_separator="<?php echo wc_get_price_thousand_separator(); ?>" 
		data-decimal_separator="<?php echo wc_get_price_decimal_separator(); ?>" 
		data-currency="<?php echo get_woocommerce_currency_symbol(); ?>" 
		data-price_format="<?php echo get_woocommerce_price_format(); ?>" 
		type="text" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'flexity' ) ?>" class="input-text qty text" size="4"
	>
	<a href="#" class="qnt-plus prod-li-plus"><?php echo esc_html__('+', 'flexity'); ?></a>
</p>