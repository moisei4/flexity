<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $flexity_options;
global $wp_query;
global $wp;

if (!empty($_GET['sidebar']) && $_GET['sidebar'] == 'sticky') {
	$flexity_options['flexity_catalog_sidebar'] = 'sticky';
}

$current_url = esc_url(home_url(add_query_arg(array(),$wp->request)));
if (!empty($_SESSION['view_mode']))
	$view_mode = $_SESSION['view_mode'];
else
	$view_mode = $flexity_options['flexity_catalog_mode'];

get_header( 'shop' ); ?>

<!-- Breadcrumbs -->
<div class="b-crumbs-wrap">
	<?php if ( class_exists( 'WooCommerce' ) ) : ?>
	<div class="cont b-crumbs">
		<?php woocommerce_breadcrumb(array('wrap_before'=>'<ul>', 'wrap_after'=>'</ul>', 'before'=>'<li>', 'after'=>'</li>', 'delimiter'=>'')); ?>
	</div>
	<?php endif; ?>
</div>

<div class="cont maincont">

<?php
/**
 * woocommerce_before_main_content hook.
 */
do_action( 'woocommerce_before_main_content' );
?>
<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
<h1 class="page_title"><span><?php woocommerce_page_title(); ?></span></h1>
<span class="maincont-line1"></span>
<span class="maincont-line2<?php if ($wp_query->max_num_pages > 1) echo ' maincont-line2-pagi'; ?>"></span>
<?php endif; ?>

<?php $categories_lev_1 = get_categories('taxonomy=product_cat&parent=0'); ?>
<!-- Catalog Sections -->
<?php if (!empty($categories_lev_1)) : ?>
<?php
$queried_term_id = (isset(get_queried_object()->term_id)) ? get_queried_object()->term_id : '';
$queried_product_cat = (isset($wp_query->query['product_cat'])) ? $wp_query->query['product_cat'] : '';
?>
<ul class="cont-sections">
	<li<?php if (!$queried_term_id) echo ' class="active"'; ?>>
		<a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) )?>"><?php echo esc_html__('All', 'flexity'); ?></a>
	</li>
	<?php foreach ($categories_lev_1 as $categ) : ?>
	<li<?php if ($queried_term_id == $categ->term_id || stristr($queried_product_cat, $categ->slug.'/')) echo ' class="active"'; ?>>
		<a href="<?php echo get_category_link( $categ->term_id )?>"><?php echo esc_attr($categ->name); ?></a>
	</li>
	<?php endforeach; ?>
	<li class="cont-sections-more"><span><?php esc_html_e('...', 'flexity'); ?></span><ul class="cont-sections-sub"></ul></li>
</ul>
<?php endif; ?>
	
<p class="section-count"><?php echo intval($wp_query->found_posts); ?> <?php echo esc_html__('ITEMS', 'flexity'); ?></p>


<?php
if (!empty($flexity_options['flexity_catalog_sidebar']) && ($flexity_options['flexity_catalog_sidebar'] == 'left' || $flexity_options['flexity_catalog_sidebar'] == 'sticky')) {
	?>
	<div class="section-wrap-withsb">
		<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
		?>
		<div class="section-list-withsb"<?php if ($flexity_options['flexity_catalog_sidebar'] == 'sticky') echo ' id="section-list-withsb"'; ?>>
			<div class="theiaStickySidebar">
		<?php
}
?>


<?php
/**
 * woocommerce_archive_description hook.
 *
 * @hooked woocommerce_taxonomy_archive_description - 10
 * @hooked woocommerce_product_archive_description - 10
 */
do_action( 'woocommerce_archive_description' );
?>

<!-- Catalog Filter - start -->
<div class="section-top">
	<a href="#" class="section-menu-btn" id="section-menu-btn"><?php echo esc_html__('Catalog', 'flexity')?></a>
	<div class="section-view">
		<p><?php echo esc_html__('View', 'flexity')?></p>
		<div class="dropdown-wrap">
			<p class="dropdown-title section-view-ttl">
			<?php
			if ($view_mode == 'gallery')
				esc_html_e('Gallery', 'flexity');
			else
				esc_html_e('List', 'flexity');
			?>
			</p>
			<ul class="dropdown-list">
				<li<?php if ($view_mode == 'list') echo ' class="active"'; ?>>
					<a href="<?php echo esc_url($current_url.'?view_mode=list'); ?>"><?php echo esc_html__('List', 'flexity'); ?></a>
				</li>
				<li<?php if ($view_mode == 'gallery') echo ' class="active"'; ?>>
					<a href="<?php echo esc_url($current_url.'?view_mode=gallery'); ?>"><?php echo esc_html__('Gallery', 'flexity'); ?></a>
				</li>
			</ul>
		</div>
	</div>
	<?php
	woocommerce_catalog_ordering();
	?>

	<div class="section-menu-wrap" id="section-menu-wrap">
		<?php flexity_hierarchical_category_tree( 0 ); ?>
	</div>

</div>
<!-- Catalog Filter - end -->



<?php if ( have_posts() ) : ?>

	<?php if (empty($flexity_options['flexity_catalog_sidebar']) || $flexity_options['flexity_catalog_sidebar'] == 'full') : ?>
	<p class="section-filter-toggle<?php if (!empty($_COOKIE['filter_toggle']) && $_COOKIE['filter_toggle'] == 'filter_hidden') echo ' filter_hidden'; ?>">
		<a data-hidetext="<?php esc_html_e('Hide Filter', 'flexity'); ?>" data-showtext="<?php esc_html_e('Show Filter', 'flexity'); ?>" href="#" id="section-filter-toggle-btn"><?php if (!empty($_COOKIE['filter_toggle']) && $_COOKIE['filter_toggle'] == 'filter_hidden') esc_html_e('Show Filter', 'flexity'); else esc_html_e('Hide Filter', 'flexity'); ?></a>
	</p>
	<?php endif; ?>
	<div class="section-filter" id="section-filter">
	<?php
	/**
	 * woocommerce_before_shop_loop hook.
	 *
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );
	?>
	</div>

	<?php woocommerce_product_loop_start(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php wc_get_template_part( 'content', 'product' ); ?>

	<?php endwhile; // end of the loop. ?>


	<?php woocommerce_product_loop_end(); ?>

	<?php
	/**
	 * woocommerce_after_shop_loop hook.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
	?>

<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

	<?php wc_get_template( 'loop/no-products-found.php' ); ?>

<?php endif; ?>


<?php
/**
 * woocommerce_after_main_content hook.
 */
do_action( 'woocommerce_after_main_content' );
?>

<?php
if (!empty($flexity_options['flexity_catalog_sidebar']) && ($flexity_options['flexity_catalog_sidebar'] == 'left' || $flexity_options['flexity_catalog_sidebar'] == 'sticky')) {
	?>
			</div><!-- .theiaStickySidebar -->
		</div><!-- .section-list-withsb -->
	</div><!-- .section-wrap-withsb -->
	<?php
}
?>

</div>

<?php get_footer( 'shop' ); ?>
