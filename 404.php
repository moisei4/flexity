<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package flexity
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

<!-- Breadcrumbs -->
<div class="b-crumbs-wrap">
	<?php if ( class_exists( 'WooCommerce' ) ) : ?>
	<div class="cont b-crumbs">
		<?php woocommerce_breadcrumb(array('wrap_before'=>'<ul>', 'wrap_after'=>'</ul>', 'before'=>'<li>', 'after'=>'</li>', 'delimiter'=>'')); ?>
	</div>
	<?php endif; ?>
</div>

<div class="cont maincont">
	<h1 class="page_title"><span><?php esc_html_e( 'Error', 'flexity' ); ?></span></h1>

	<!-- Error 404 -->
	<div class="pagecont err404">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/err404.png" alt="" class="err404-img">
		<p><?php esc_html_e( 'We are so sorry, but the page you requested is not available', 'flexity' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>