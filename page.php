<?php get_header(); ?>

<?php
$page_width_meta = get_post_meta(get_the_ID(), 'my_meta_box_page');
if (!empty($page_width_meta[0]) && $page_width_meta[0] == 'full') {
	$page_width = 'full';
} else {
	$page_width = 'normal';
}

$page_ttl_bcrumbs = get_post_meta(get_the_ID(), 'page_ttl_bcrumbs');
if (!empty($page_ttl_bcrumbs[0]) && $page_ttl_bcrumbs[0] == 'only_ttl') {
	$ttl_bcrumbs = 'only_ttl';
} elseif (!empty($page_ttl_bcrumbs[0]) && $page_ttl_bcrumbs[0] == 'only_bcrumbs') {
	$ttl_bcrumbs = 'only_bcrumbs';
} elseif (!empty($page_ttl_bcrumbs[0]) && $page_ttl_bcrumbs[0] == 'hide_both') {
	$ttl_bcrumbs = 'hide_both';
} else {
	$ttl_bcrumbs = 'show_both';
}

global $flexity_options; ?>

	<div id="primary" class="content-area<?php echo ' width-'.esc_attr($page_width); ?>">
		<main id="main" class="site-main">

			<?php if (!is_front_page() && $ttl_bcrumbs !== 'hide_both' && $ttl_bcrumbs !== 'only_ttl') : ?>
				<!-- Breadcrumbs -->
				<div class="b-crumbs-wrap">
					<?php if ( class_exists( 'WooCommerce' ) ) : ?>
						<div class="cont b-crumbs">
							<?php woocommerce_breadcrumb(array('wrap_before'=>'<ul>', 'wrap_after'=>'</ul>', 'before'=>'<li>', 'after'=>'</li>', 'delimiter'=>'')); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
			<?php if ($ttl_bcrumbs !== 'hide_both' || $ttl_bcrumbs !== 'only_bcrumbs') : ?>
			<div class="page-title">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</div>
			<?php endif; ?>
			
			<?php if (class_exists( 'WooCommerce' ) && is_cart()) : ?>

				<?php
				if (have_posts()) :
					while (have_posts()) : the_post();
						?>

						<?php the_content(); ?>

						<?php
					endwhile;
				endif;
				?>

			<?php elseif ($page_width == 'full') : ?>

				<div id="post-<?php the_ID(); ?>" class="maincont page-styling page-full">
					<?php
					if (have_posts()) :
						while (have_posts()) : the_post();
							?>
							<?php the_content(); ?>
							<?php
						endwhile;

						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}

					endif;
					?>
				</div>

			<?php else: ?>


				<div class="cont maincont">
					<?php
					if (have_posts()) :
						while (have_posts()) : the_post();
						
							if ((class_exists( 'YITH_WCWL' ) && yith_wcwl_is_wishlist_page()) || (class_exists( 'WooCommerce' ) && is_checkout())) : ?>

								<?php get_template_part('template-parts/personal-menu'); ?>

								<div class="page-styling">
									<?php
									the_content();
									?>
								</div>

								<?php
								wp_link_pages( array(
									'before'           => '<p class="link-pages">',
									'after'            => '</p>',
									'link_before'      => '<span>',
									'link_after'       => '</span>',
									'nextpagelink'     => '<i class="fa fa-angle-right"></i>',
									'previouspagelink' => '<i class="fa fa-angle-left"></i>',
								) );

								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
								?>
							<?php else: ?>
								<?php if (isset($flexity_options['compare']['id']) && get_the_id() == $flexity_options['compare']['id']) : ?>
									<?php get_template_part('template-parts/personal-menu'); ?>
									<p class="section-count"><?php echo count($flexity_options['compare']['list'])?> <?php esc_html_e('ITEMS', 'flexity'); ?></p>
								<?php endif; ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class("page-cont"); ?>>

									<div class="page-styling">
										<?php
										the_content();
										?>
									</div>

									<?php
									wp_link_pages( array(
										'before'           => '<p class="link-pages">',
										'after'            => '</p>',
										'link_before'      => '<span>',
										'link_after'       => '</span>',
										'nextpagelink'     => '<i class="fa fa-angle-right"></i>',
										'previouspagelink' => '<i class="fa fa-angle-left"></i>',
									) );

									if ( comments_open() || get_comments_number() ) {
										comments_template();
									}
									?>

								</article>
							<?php endif; ?>

							<?php
						endwhile;
					endif;
					?>
				</div>

			<?php endif; ?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>