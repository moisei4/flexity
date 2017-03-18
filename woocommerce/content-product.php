<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop, $flexity_options;

if (!empty($_SESSION['view_mode']))
	$view_mode = $_SESSION['view_mode'];
else
	$view_mode = $flexity_options['flexity_catalog_mode'];

if (is_search())
	$view_mode = 'list';
elseif (!is_shop() && !is_product_taxonomy())
	$view_mode = 'gallery';

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;
?>

<?php if ($view_mode == 'gallery') : ?>
	<?php include(locate_template('woocommerce/content-product-gal.php')); ?>
<?php else: ?>
	<?php include(locate_template('woocommerce/content-product-list.php')); ?>
<?php endif; ?>
