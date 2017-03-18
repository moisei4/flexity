<?php global $flexity_options; ?>
<aside class="blog-sb-widgets section-sb"<?php if ($flexity_options['flexity_catalog_sidebar'] == 'sticky') echo ' id="section-sb"'; ?>>
	<div class="theiaStickySidebar">
		<?php if ( is_active_sidebar( 'flexity_sidebar_shop' ) ) : ?>
		<p class="section-filter-toggle<?php if ((!empty($_COOKIE['filter_toggle']) && $_COOKIE['filter_toggle'] == 'filter_hidden') || !isset($_COOKIE['filter_toggle'])) echo ' filter_hidden'; ?>">
			<a href="#" id="section-filter-toggle-btn"><?php if ((!empty($_COOKIE['filter_toggle']) && $_COOKIE['filter_toggle'] == 'filter_hidden') || !isset($_COOKIE['filter_toggle'])) esc_html_e('Show Filter', 'flexity'); else esc_html_e('Hide Filter', 'flexity'); ?></a>
		</p>
		<div class="section-filter" id="section-filter">
			<?php
			dynamic_sidebar( 'flexity_sidebar_shop' );
			?>
		</div>
		<?php endif; ?>
	</div>
</aside>