<?php
add_action( 'vc_before_init', 'flexity_product_categories_integrate_vc' );
function flexity_product_categories_integrate_vc () {
	vc_map( array(
		'name' => esc_html__( 'Product categories', 'flexity' ),
		'base' => 'flexity_product_categories',
		'icon' => get_template_directory_uri() . "/img/vc_flexity.png",
		'category' => esc_html__( 'Flexity', 'flexity' ),
		'description' => esc_html__( 'Display product categories loop', 'flexity' ),
		'params' => array(
			array(
				'type' => 'autocomplete',
				'heading' => esc_html__( 'Categories', 'flexity' ),
				'param_name' => 'ids',
				'settings' => array(
					'multiple' => true,
					'sortable' => true,
				),
				'save_always' => true,
				'description' => esc_html__( 'List of product categories', 'flexity' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Number', 'flexity' ),
				'param_name' => 'number',
				'description' => esc_html__( 'The `number` field is used to display the number of products.', 'flexity' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order by', 'flexity' ),
				'param_name' => 'orderby',
				'value' => array(
					esc_html__( 'Custom', 'flexity' ) => 'include',
					esc_html__( 'ID', 'flexity' ) => 'ID',
					esc_html__( 'Name', 'flexity' ) => 'name',
					esc_html__( 'Count', 'flexity' ) => 'count',
					esc_html__( 'Slug', 'flexity' ) => 'slug',
					esc_html__( 'Description', 'flexity' ) => 'description',
				),
				'save_always' => true,
				'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'flexity' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
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
				'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'flexity' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Number', 'flexity' ),
				'param_name' => 'hide_empty',
				'description' => esc_html__( 'Hide empty', 'flexity' ),
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



//Filters For autocomplete param:
//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
add_filter( 'vc_autocomplete_flexity_product_categories_ids_callback', 'flexity_productCategoryCategoryAutocompleteSuggester', 10, 1 ); // Get suggestion(find). Must return an array
add_filter( 'vc_autocomplete_flexity_product_categories_ids_render', 'flexity_productCategoryCategoryRenderByIdExact', 10, 1 ); // Render exact category by id. Must return an array (label,value)


function flexity_productCategoryCategoryAutocompleteSuggester( $query, $slug = false ) {
	global $wpdb;
	$cat_id = (int) $query;
	$query = trim( $query );
	$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.term_id AS id, b.name as name, b.slug AS slug
						FROM {$wpdb->term_taxonomy} AS a
						INNER JOIN {$wpdb->terms} AS b ON b.term_id = a.term_id
						WHERE a.taxonomy = 'product_cat' AND (a.term_id = '%d' OR b.slug LIKE '%%%s%%' OR b.name LIKE '%%%s%%' )", $cat_id > 0 ? $cat_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

	$result = array();
	if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
		foreach ( $post_meta_infos as $value ) {
			$data = array();
			$data['value'] = $slug ? $value['slug'] : $value['id'];
			$data['label'] = esc_html__( 'Id', 'flexity' ) . ': ' . $value['id'] . ( ( strlen( $value['name'] ) > 0 ) ? ' - ' . esc_html__( 'Name', 'flexity' ) . ': ' . $value['name'] : '' ) . ( ( strlen( $value['slug'] ) > 0 ) ? ' - ' . esc_html__( 'Slug', 'flexity' ) . ': ' . $value['slug'] : '' );
			$result[] = $data;
		}
	}

	return $result;
}


function flexity_productCategoryCategoryRenderByIdExact( $query ) {
	$query = $query['value'];
	$cat_id = (int) $query;
	$term = get_term( $cat_id, 'product_cat' );

	return flexity_productCategoryTermOutput( $term );
}


function flexity_productCategoryTermOutput( $term ) {
	$term_slug = $term->slug;
	$term_title = $term->name;
	$term_id = $term->term_id;

	$term_slug_display = '';
	if ( ! empty( $term_slug ) ) {
		$term_slug_display = ' - ' . esc_html__( 'Sku', 'flexity' ) . ': ' . $term_slug;
	}

	$term_title_display = '';
	if ( ! empty( $term_title ) ) {
		$term_title_display = ' - ' . esc_html__( 'Title', 'flexity' ) . ': ' . $term_title;
	}

	$term_id_display = esc_html__( 'Id', 'flexity' ) . ': ' . $term_id;

	$data = array();
	$data['value'] = $term_id;
	$data['label'] = $term_id_display . $term_title_display . $term_slug_display;

	return ! empty( $data ) ? $data : false;
}



class WPBakeryShortCode_flexity_product_categories extends WPBakeryShortCode {
	protected function content( $atts, $content = null ) {

		$css = '';
		extract( shortcode_atts( array (
			'number' => 0,
			'orderby' => 'name',
			'order' => 'DESC',
			'hide_empty' => false,
			'ids' => '',
			'css' => ''
		), $atts ) );

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

		wp_enqueue_script( 'flexity_mThumbnailScroller', get_template_directory_uri( ).'/js/jquery.mThumbnailScroller.js' , array( 'jquery' ), false, true );

		ob_start();

		$include_ids = explode( ', ', $ids );

		$product_categories = get_terms( 'product_cat', array(
			'number' => $number,
			'order' => $order,
			'orderby' => $orderby,
			'hide_empty' => $hide_empty,
			'include' => $include_ids
		) );
		if ( $product_categories ) :
			?>
			<div class="flexity_product_categories<?php echo esc_attr( $css_class ); ?>">
				<ul>
					<?php foreach ($product_categories as $category) : ?>
						<li>
							<a href="<?php echo get_category_link($category->term_id); ?>">
								<span class="frontcategs-img">
									<?php woocommerce_subcategory_thumbnail( $category ); ?>
								</span>
								<p><?php echo esc_attr($category->name); ?></p>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php
		endif;

		$output = ob_get_clean();

		return $output;
	}
}