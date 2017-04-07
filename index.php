<?php
get_header();

global $flexity_options;
$blog_sidebar_position = $flexity_options['flexity_blog_sidebar'];
if (!$blog_sidebar_position)
	$blog_sidebar_position = 'right'; 
?>

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
	<h1 class="page_title"><span><?php esc_html_e('Blog', 'flexity'); ?></span></h1>

	<!-- Blog Sections -->
	<ul class="cont-sections">
	<?php
	$blog_categories = wp_list_categories( array(
		'show_option_all'    => esc_html__('All', 'flexity'),
		'show_count'         => 0,
		'hide_empty'         => false,
		'use_desc_for_title' => false,
		'hierarchical'       => true,
		'title_li'           => '',
		'echo'               => 1,
		'depth'              => 1,
	) );
	?>
		<li class="cont-sections-more"><span><?php esc_html_e('...', 'flexity'); ?></span><ul class="cont-sections-sub"></ul></li>
	</ul>


	<div class="blog<?php
	if ($blog_sidebar_position == 'left')
		echo ' blog-left';
	elseif ($blog_sidebar_position == 'full')
		echo ' blog-full';
	?>">


		<?php if ($blog_sidebar_position == 'left') : ?>
			<!-- Sidebar -->
			<?php get_sidebar(); ?>
		<?php endif; ?>


		<?php
		if (have_posts()) :
		?>
		<!-- Blog Posts List - start -->
		<div class="blog-cont">
			<div id="blog-grid">
			<?php
			while (have_posts()) : the_post();
				$category = get_the_category();
				if (function_exists('vp_metabox')) {
					$blog_video = vp_metabox('flexity_meta_blog.blog_video');
					$blog_slider = vp_metabox('flexity_meta_blog.blog_slider');
					$blog_map_ltd = vp_metabox('flexity_meta_blog.blog_map_ltd');
					$blog_map_lgt = vp_metabox('flexity_meta_blog.blog_map_lgt');
					$blog_map_address = vp_metabox('flexity_meta_blog.blog_map_address');
					$blog_mapzoom = vp_metabox('flexity_meta_blog.blog_mapzoom');
				}
				?>
				<?php include(locate_template('template-parts/loop-post.php')); ?>
			<?php
			endwhile;
			?>
			</div>


			<!-- Pagination -->
			<?php
			echo paginate_links( array(
				'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
				'format'       => '',
				'add_args'     => '',
				'current'      => max( 1, get_query_var( 'paged' ) ),
				'total'        => $wp_query->max_num_pages,
				'prev_text'    => '<i class="fa fa-angle-left"></i>',
				'next_text'    => '<i class="fa fa-angle-right"></i>',
				'type'         => 'list',
				'end_size'     => 1,
				'mid_size'     => 2
			) );
			?>
			
		</div>
		<!-- Blog Posts List - end -->
		<?php
		else:
		?>
		<div class="blog-cont">
			<p><?php esc_html_e('No Posts', 'flexity'); ?></p>
		</div>
		<?php
		endif; wp_reset_postdata();
		?>


		<?php if ($blog_sidebar_position == 'right') : ?>
			<!-- Sidebar -->
			<?php get_sidebar(); ?>
		<?php endif; ?>


	</div>
</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>