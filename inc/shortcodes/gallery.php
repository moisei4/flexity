<?php
add_action( 'vc_before_init', 'flexity_gallery_integrate_vc' );
function flexity_gallery_integrate_vc () {
	vc_map( array(
		'name' => esc_html__( 'Gallery', 'flexity' ),
		'base' => 'flexity_gallery',
		'icon' => get_template_directory_uri() . "/img/vc_flexity.png",
		'category' => esc_html__( 'Flexity', 'flexity' ),
		'params' => array(
			array(
				'type' => 'autocomplete',
				'heading' => esc_html__( 'Products', 'flexity' ),
				'param_name' => 'ids',
				'settings' => array(
					'multiple' => true,
					'sortable' => true,
					'unique_values' => true,
					// In UI show results except selected. NB! You should manually check values in backend
				),
				'save_always' => true,
				'description' => esc_html__( 'Enter List of Products', 'flexity' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order by', 'flexity' ),
				'param_name' => 'orderby',
				'value' => array(
					'',
					esc_html__( 'Date', 'flexity' ) => 'date',
					esc_html__( 'ID', 'flexity' ) => 'ID',
					esc_html__( 'Author', 'flexity' ) => 'author',
					esc_html__( 'Title', 'flexity' ) => 'title',
					esc_html__( 'Modified', 'flexity' ) => 'modified',
					esc_html__( 'Random', 'flexity' ) => 'rand',
					esc_html__( 'Comment count', 'flexity' ) => 'comment_count',
					esc_html__( 'Menu order', 'flexity' ) => 'menu_order',
				),
				'std' => 'title',
				'save_always' => true,
				'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s. Default by Title', 'flexity' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Sort order', 'flexity' ),
				'param_name' => 'order',
				'value' => array(
					'',
					esc_html__( 'Descending', 'flexity' ) => 'DESC',
					esc_html__( 'Ascending', 'flexity' ) => 'ASC',
				),
				'save_always' => true,
				'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s. Default by ASC', 'flexity' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Items per page', 'flexity' ),
				'param_name' => 'items_per_page',
				'description' => esc_html__( 'Number of items to show per page. Enter -1 to display all', 'flexity' ),
				'value' => '12',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Show filter', 'flexity' ),
				'param_name' => 'show_filter',
				'value' => array( esc_html__( 'Yes', 'flexity' ) => 'yes' ),
				'description' => esc_html__( 'Append filter to grid.', 'flexity' ),
			),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'Css', 'flexity' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design options', 'flexity' ),
			),
		),
	) );
}




class WPBakeryShortCode_flexity_gallery extends WPBakeryShortCode {
	protected function content( $atts, $content = null ) {

		$css = '';
		extract( shortcode_atts( array (
			'orderby' => 'date',
			'order' => 'DESC',
			'items_per_page' => 9,
			'show_filter' => 'yes',
			'css' => ''
		), $atts ) );

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

		ob_start();
		?>

		<?php
		$gallery_sections = get_categories( array(
			'parent'       => 0,
			'orderby'      => 'ID',
			'taxonomy'     => 'gallery_category',
			'hide_empty' => true
		) );

		if (!empty($gallery_sections) && $show_filter == 'yes') : ?>
			<ul class="cont-sections flexity-gallery-sections">
				<li class="active">
					<a data-section="*" href="#"><?php esc_html_e('All', 'flexity'); ?></a>
				</li>
				<?php foreach ($gallery_sections as $key=>$gallery_section) : ?>
					<li>
						<a data-section=".gallery-<?php echo esc_attr($gallery_section->slug); ?>" href="#"><?php echo esc_attr($gallery_section->name); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php include( trailingslashit( get_template_directory() ) . 'inc/shortcodes/gallery-content.php' ); ?>

		<?php
		$output = ob_get_clean();

		return $output;
	}
}
