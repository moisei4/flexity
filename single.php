<?php
get_header();

global $flexity_options;
$post_sidebar_position = $flexity_options['flexity_post_sidebar'];
if (!$post_sidebar_position)
	$post_sidebar_position = 'full';
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

<div class="maincont">

<?php if (have_posts()) : the_post(); ?>
	 
	<?php $category = get_the_category(); ?>
	
	<?php
	$in_top_map = false;
	$in_top_slider = false;
	if (function_exists('vp_metabox')) {
		$blog_slider = vp_metabox('flexity_meta_blog.blog_slider');
		$blog_map_ltd = vp_metabox('flexity_meta_blog.blog_map_ltd');
		$blog_map_lgt = vp_metabox('flexity_meta_blog.blog_map_lgt');
		$blog_map_address = vp_metabox('flexity_meta_blog.blog_map_address');
		$blog_mapzoom = vp_metabox('flexity_meta_blog.blog_mapzoom');
	}

	if (!empty($blog_map_ltd) && !empty($blog_map_lgt)) : ?>
		<div class="post-map flexity-gmap">
			<div class="marker" data-zoom="<?php echo esc_attr($blog_mapzoom); ?>" data-ltd="<?php echo esc_attr($blog_map_ltd); ?>" data-lgt="<?php echo esc_attr($blog_map_lgt); ?>" data-marker="<?php echo esc_url( get_template_directory_uri() ); ?>/img/marker.png"><?php echo esc_js($blog_map_address); ?></div>
		</div>
		<?php $in_top_map = true; ?>
	<?php
	elseif (!empty($blog_slider) && !empty($blog_slider[0]['img'])) :
	?>
	<div class="post-slider">
		<ul class="slides">
		<?php foreach ($blog_slider as $blog_slide) : ?>
			<?php if (!empty($blog_slide['img'])) : ?>
			<li>
				<?php $img_src = wp_get_attachment_image_src( flexity_get_attach_id_from_src($blog_slide['img']), 'flexity_full' ); ?>
				<img src="<?php echo esc_attr($img_src[0]); ?>" alt="<?php the_title(); ?>">
			</li>
			<?php endif; ?>
		<?php endforeach; ?>
		</ul>
	</div>
		<?php $in_top_slider = true; ?>
	<?php
	elseif (has_post_thumbnail()) :
		echo '<div class="post-img">';
		the_post_thumbnail('flexity_full');
		echo '</div>';
		?>
	<?php endif; ?>

	<div class="cont<?php
		if ($post_sidebar_position == 'right')
			echo ' post-sidebar';
		elseif ($post_sidebar_position == 'left')
			echo ' post-sidebar-left';
		?>">

		<?php if ($post_sidebar_position == 'left') : ?>
			<!-- Sidebar -->
			<?php get_sidebar(); ?>
		<?php endif; ?>
		
		<!-- Post Content - start -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('s-post page-styling'); ?>>

			<!-- Breadcrumbs -->
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
			<div class="b-crumbs">
				<?php woocommerce_breadcrumb(array('wrap_before'=>'<ul class="b_crumbs_list">', 'wrap_after'=>'</ul>', 'before'=>'<li>', 'after'=>'</li>', 'delimiter'=>'')); ?>
			</div>
			<?php endif; ?>
			<abbr class="single_post_date published" title="<?php echo get_the_date('Y-m-d H:i'); ?>"><?php echo get_the_date(); ?></abbr>
			<div class="cl"></div>
			<h1 class="single_post_title entry-title"><?php the_title(); ?></h1>
			<div class="post_info">
				<?php
				
				flexity_set_post_views(get_the_ID());
				
				echo flexity_get_post_views(get_the_ID());
				
				flexity_get_comments('single_post_comments', true);
				
				if (!empty($category)) {
					echo '<ul class="single_post_category">';
					
					foreach ($category as $key=>$categ) {
						echo '<li><a href="'.esc_url(get_category_link($categ->term_id)).'">'.esc_attr($categ->name).'</a>' . (($key+1<count($category)) ? ', ' : '') . '</li>';
					}
					
					echo '</ul>';
				}
				?>
			</div>

			<?php
			if (function_exists('vp_metabox')) {
				$blog_video = vp_metabox('flexity_meta_blog.blog_video');
			}
			if (!empty($blog_video)) :
			?>
			<!-- Post Video -->
			<div class="post-video">
				<?php echo wp_oembed_get($blog_video); ?>
			</div>
			<?php endif; ?>

			<?php
			if ($in_top_slider && has_post_thumbnail()) {
				echo '<p class="post-img">';
				the_post_thumbnail('flexity_full');
				echo '</p>';
			}
			?>

			<?php if ($in_top_map && $blog_slider && $blog_slider[0]['img']) : ?>
			<div class="post-slider">
				<ul class="slides">
				<?php foreach ($blog_slider as $blog_slide) : ?>
					<?php if (!empty($blog_slide['img'])) : ?>
					<li>
						<?php $img_src = wp_get_attachment_image_src( flexity_get_attach_id_from_src($blog_slide['img']), 'flexity_full' ); ?>
						<img src="<?php echo esc_attr($img_src[0]); ?>" alt="<?php the_title(); ?>">
					</li>
					<?php endif; ?>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php
			the_content();

			wp_link_pages( array(
				'before'           => '<p class="link-pages">',
				'after'            => '</p>',
				'link_before'      => '<span>',
				'link_after'       => '</span>',
				'nextpagelink'     =>  esc_html__('Next', 'flexity'),
				'previouspagelink' =>  esc_html__('Prev', 'flexity'),
			) );

			// Social Share
			if (!empty($flexity_options['flexity_other_share'])) {
				include( trailingslashit( get_template_directory() ) . 'template-parts/share.php' );
			}

			$closed_cmts_class = '';
			if ( !comments_open() ) {
				$closed_cmts_class = ' comments-closed';
			}

			the_tags('<div class="post-tags'.$closed_cmts_class.'"><span>'.esc_html__('Tags', 'flexity').'</span>', '', '</div>');

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			?>
			
		</article>
		<!-- Post Content - end -->
		
		<?php if ($post_sidebar_position == 'right') : ?>
			<!-- Sidebar -->
			<?php get_sidebar(); ?>
		<?php endif; ?>

	</div>
<?php endif; ?>

</div>

	</main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>