<article id="post-<?php the_ID(); ?>" <?php post_class('blog-grid-i'); ?>>
	<div class="blog-i">
		<?php if (!empty($blog_map_ltd) && !empty($blog_map_lgt)) : ?>
		<div class="blog-map-wrap">
			<div class="blog-map flexity-gmap">
				<div class="marker" data-zoom="<?php echo esc_attr($blog_mapzoom); ?>" data-ltd="<?php echo esc_attr($blog_map_ltd); ?>" data-lgt="<?php echo esc_attr($blog_map_lgt); ?>" data-marker="<?php echo esc_url( get_template_directory_uri() ); ?>/img/marker.png"><?php echo esc_js($blog_map_address); ?></div>
			</div>
		</div>
		<?php elseif (!empty($blog_slider) && $blog_slider[0]['img']) : ?>
		<div class="blog-slider">
			<ul class="slides">
				<?php foreach ($blog_slider as $blog_slide) : ?>
					<?php if (!empty($blog_slide['img'])) : ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<?php $img_src = wp_get_attachment_image_src( flexity_get_attach_id_from_src($blog_slide['img']), 'flexity_blog_slider' ); ?>
							<?php if (!empty($img_src[0])) : ?>
								<img src="<?php echo esc_attr($img_src[0]); ?>" alt="<?php the_title(); ?>">
							<?php endif; ?>
						</a>
					</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php elseif (!empty($blog_video)) : ?>
		<div class="blog_img">
			<?php echo wp_oembed_get($blog_video); ?>
		</div>
		<?php elseif (has_post_thumbnail()) : ?>
		<a href="<?php the_permalink(); ?>" class="blog_img">
			<?php the_post_thumbnail('flexity_blog'); ?>
		</a>
		<?php endif; ?>
		<div class="blog_info entry-meta">
			<?php
			if (!empty($category)) {
				echo '<ul class="post_category_list">';
				
				foreach ($category as $key=>$categ) {
					echo '<li><a href="'.esc_url(get_category_link($categ->term_id)).'">'.esc_attr($categ->name).'</a>' . (($key+1<count($category)) ? ', ' : '') . '</li>';
				}
				
				echo '</ul>';
			}
			?>
			<abbr class="post_time" title="<?php echo get_the_date('Y-m-d H:i'); ?>"><?php echo get_the_date(); ?></abbr>
		</div>
		<header class="post_header">
			<h2 class="post_title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>
		<div class="post_content entry-content"><?php echo get_the_excerpt(); ?></div>
	</div>
</article>