<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
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

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

$props_count = 5;
?>
<dl>

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<dt><?php esc_html_e( 'SKU:', 'flexity' ); ?></dt> <dd itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? esc_attr($sku) : esc_html__( 'N/A', 'flexity' ); ?></dd>
		<?php $props_count--; ?>

	<?php endif; ?>

	<?php if (get_the_terms( $post->ID, 'product_cat' )) : ?>
		<?php echo wp_kses_post($product->get_categories( ', ', '<dt>' . _n( 'Category:', 'Categories:', $cat_count, 'flexity' ) . '</dt> <dd>', '</dd>' )); ?>
		<?php $props_count--; ?>
	<?php endif; ?>

	<?php if (get_the_terms( $post->ID, 'product_tag' )) : ?>
		<?php echo wp_kses_post($product->get_tags( ', ', '<dt>' . _n( 'Tag:', 'Tags:', $tag_count, 'flexity' ) . '</dt> <dd>', '</dd>' )); ?>
		<?php $props_count--; ?>
	<?php endif; ?>

	<?php if ( $product->enable_dimensions_display() ) : ?>

		<?php if ( $product->has_weight() ) : $has_row = true; ?>
			<dt><?php esc_html_e( 'Weight', 'flexity' ) ?></dt>
			<dd><?php echo wp_kses_post($product->get_weight()) . ' ' . esc_attr( get_option( 'woocommerce_weight_unit' ) ); ?></dd>
			<?php $props_count--; ?>
		<?php endif; ?>

		<?php if ( $product->has_dimensions() ) : $has_row = true; ?>
			<dt><?php esc_html_e( 'Dimensions', 'flexity' ) ?></dt>
			<dd><?php echo wp_kses_post($product->get_dimensions()); ?></dd>
			<?php $props_count--; ?>
		<?php endif; ?>

	<?php endif; ?>

	<?php if ($props_count > 0) : ?>
		<?php
		$attributes = $product->get_attributes();

		$int_key = 0;
		foreach ( $attributes as $attribute ) :

			if ($int_key >= $props_count)
				break;

			if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
				continue;
			} else {
				$has_row = true;
			}
			?>
			<dt><?php echo wc_attribute_label( $attribute['name'] ); ?></dt>
			<dd><?php
				if ( $attribute['is_taxonomy'] ) {

					$values = wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) );
					echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

				} else {

					// Convert pipes to commas and display values
					$values = array_map( 'trim', explode( WC_DELIMITER, $attribute['value'] ) );
					echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

				}
			?></dd>
			<?php
			$int_key++;
		endforeach; ?>
	<?php endif; ?>

	<?php if ( $product && ( $product->has_attributes() || ( $product->enable_dimensions_display() && ( $product->has_dimensions() || $product->has_weight() ) ) ) ) { ?>
	<dt><a id="prod-showprops" href="#"><?php echo esc_html__('view all details', 'flexity'); ?></a></dt>
	<dd></dd>
	<?php } ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</dl>