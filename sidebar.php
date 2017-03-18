<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package flexity
 */
?>
<aside id="secondary" class="blog-sb">
	<?php if ( is_active_sidebar( 'flexity_sidebar' ) ) : ?>
		<div class="blog-sb-widgets">
		<?php dynamic_sidebar( 'flexity_sidebar' ); ?>
		</div>
	<?php endif; ?>
</aside><!-- #secondary -->