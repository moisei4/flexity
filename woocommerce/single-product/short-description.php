<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
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

global $post;
if (function_exists('vp_metabox')) {
	$product_description = vp_metabox('flexity_meta_product.product_description');
}
?>
<?php if (!empty($product_description)) : ?>
	<p itemprop="description"><?php echo wp_kses_post(wp_trim_words($product_description, 20)); ?> <a id="prod-showdesc" href="#"><?php echo esc_html__('read more', 'flexity'); ?></a></p>
<?php endif; ?>
