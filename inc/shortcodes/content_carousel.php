<?php

add_action( 'vc_before_init', 'flexity_content_carousel_integrate_vc' );
function flexity_content_carousel_integrate_vc () {
	vc_map( array(
		'name' => esc_html__('Content Carousel', 'flexity'),
		'base' => 'flexity_content_carousel',
		'category' => esc_html__( 'Flexity', 'flexity' ),
		'as_parent' => array('only' => 'flexity_content_carousel_item'),
		'js_view' => 'VcColumnView',
		'icon' => get_template_directory_uri() . "/img/vc_flexity.png",
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Slideshow Speed', 'flexity'),
				'description' => esc_html__( 'Set the speed of the slideshow cycling, in milliseconds', 'flexity' ),
				'param_name' => 'slideshow_speed',
				'value' => '7000',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Animation Speed', 'flexity'),
				'description' => esc_html__( 'Set the speed of animations, in milliseconds', 'flexity' ),
				'param_name' => 'animation_speed',
				'value' => '600',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Show pagination control', 'flexity'),
				'param_name' => 'pagination',
				'value' => array(
					esc_html__('Yes', 'flexity') => 'true',
				),
				'std'=>'true',
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Show navigation control', 'flexity'),
				'param_name' => 'navigation',
				'value' => array(
					esc_html__('Yes', 'flexity') => 'true',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Stop On Hover', 'flexity'),
				'description'      => esc_html__( 'Stop autoplay on mouse hover', 'flexity' ),
				'param_name' => 'stop_on_hover',
				'value' => array(
					esc_html__('Yes', 'flexity') => 'true',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
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

class WPBakeryShortCode_flexity_content_carousel extends WPBakeryShortCodesContainer {
	protected function content( $atts, $content = null ) {

		$css = '';
		extract( shortcode_atts( array (
			'slideshow_speed' => '7000',
			'animation_speed' => '600',
			'stop_on_hover' => 'false',
			'navigation' => 'false',
			'pagination' => 'true',
			'css' => ''
		), $atts ) );

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

		ob_start();
		?>
		<div
			class="flexslider content_carousel<?php echo esc_attr( $css_class ); ?>"
			data-slideshow_speed="<?php echo esc_attr($slideshow_speed); ?>"
			data-animation_speed="<?php echo esc_attr($animation_speed); ?>"
			data-pagination="<?php echo esc_attr($pagination); ?>"
			data-navigation="<?php echo esc_attr($navigation); ?>"
			data-stop_on_hover="<?php echo esc_attr($stop_on_hover); ?>"
		>
			<ul class="slides">
				<?php echo do_shortcode( $content ); ?>
			</ul>
		</div>

		<?php
		$output = ob_get_clean();

		return $output;
	}
}




add_action( 'vc_before_init', 'flexity_content_carousel_item_integrate_vc' );
function flexity_content_carousel_item_integrate_vc () {
	vc_map( array(
		'name' => esc_html__('Content Carousel Item', 'flexity'),
		'base' => 'flexity_content_carousel_item',
		'category' => esc_html__( 'Flexity', 'flexity' ),
		'as_child' => array('only' => 'flexity_content_carousel'),
		'icon' => get_template_directory_uri() . "/img/vc_flexity.png",
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'flexity'),
				'param_name' => 'title',
			),
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content', 'flexity'),
				'param_name' => 'content',
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image', 'flexity'),
				'param_name' => 'image',
			),
		)
	) );
}

class WPBakeryShortCode_flexity_content_carousel_item extends WPBakeryShortCode {
	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array (
			'title' => '',
			'image' => '',
		), $atts ) );

		ob_start();
		if (!empty($content)) :
		?>
			<li class="page-styling content_carousel-slide<?php if (empty($image)) echo ' content_carousel-noimg'; ?>">
				<?php
				if (!empty($image)) {
					$image_arr = wp_get_attachment_image_src( $image, 'large' );
					?>
					<p class="content_carousel-img" style="background: url(<?php echo esc_attr($image_arr[0]); ?>);"><img src="<?php echo esc_attr($image_arr[0]); ?>" alt="<?php echo esc_attr($title); ?>"></p>
					<?php
				}
				if ($title || $content) : ?>
					<div class="content_carousel-cont">
						<?php
						if (!empty($title)) {
							echo '<h3>'.esc_attr($title).'</h3>';
						}
						if ($content) {
							echo wpautop($content);
						}
						?>
					</div>
				<?php endif; ?>
			</li>
		<?php
		endif;
		$output = ob_get_clean();

		return $output;

	}
}