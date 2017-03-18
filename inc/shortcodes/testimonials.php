<?php

add_action( 'vc_before_init', 'flexity_testimonials_integrate_vc' );
function flexity_testimonials_integrate_vc () {
	vc_map( array(
		'name' => esc_html__('Testimonials', 'flexity'),
		'base' => 'flexity_testimonials',
		'category' => esc_html__( 'Flexity', 'flexity' ),
		'as_parent' => array('only' => 'flexity_testimonials_item'),
		'js_view' => 'VcColumnView',
		'icon' => get_template_directory_uri() . "/img/vc_flexity.png",
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Use Carousel', 'flexity'),
				'param_name' => 'use_carousel',
				'value' => array(
					esc_html__('Yes', 'flexity') => 'yes',
					esc_html__('No', 'flexity') => 'no',
				),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Columns', 'flexity'),
				'param_name' => 'columns',
				'value' => array(
					esc_html__('One', 'flexity') => 'col_1',
					esc_html__('Two', 'flexity') => 'col_2',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Slideshow Speed', 'flexity'),
				'description' => esc_html__( 'Set the speed of the slideshow cycling, in milliseconds', 'flexity' ),
				'param_name' => 'slideshow_speed',
				'value' => '7000',
				'dependency' => array(
					'element' => 'use_carousel',
					'value' => 'yes',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Animation Speed', 'flexity'),
				'description' => esc_html__( 'Set the speed of animations, in milliseconds', 'flexity' ),
				'param_name' => 'animation_speed',
				'value' => '600',
				'dependency' => array(
					'element' => 'use_carousel',
					'value' => 'yes',
				),
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Show pagination control', 'flexity'),
				'param_name' => 'pagination',
				'value' => array(
					esc_html__('Yes', 'flexity') => 'true',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'dependency' => array(
					'element' => 'use_carousel',
					'value' => 'yes',
				),
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Show navigation control', 'flexity'),
				'param_name' => 'navigation',
				'value' => array(
					esc_html__('Yes', 'flexity') => 'true',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'dependency' => array(
					'element' => 'use_carousel',
					'value' => 'yes',
				),
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
				'dependency' => array(
					'element' => 'use_carousel',
					'value' => 'yes',
				),
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

class WPBakeryShortCode_flexity_testimonials extends WPBakeryShortCodesContainer {
	protected function content( $atts, $content = null ) {

		$css = '';
		extract( shortcode_atts( array (
			'slideshow_speed' => '7000',
			'animation_speed' => '600',
			'stop_on_hover' => 'false',
			'navigation' => 'false',
			'pagination' => 'false',
			'use_carousel' => 'yes',
			'columns' => 'one',
			'css' => ''
		), $atts ) );

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

		ob_start();
		?>
		<div
			class="testimonials-<?php if ($use_carousel == 'no') echo 'list'; else echo 'car'; ?><?php if ($columns == 'one') echo ' style-1'; ?><?php echo esc_attr( $css_class ); ?>"
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




add_action( 'vc_before_init', 'flexity_testimonials_item_integrate_vc' );
function flexity_testimonials_item_integrate_vc () {
	vc_map( array(
		'name' => esc_html__('Testimonials Item', 'flexity'),
		'base' => 'flexity_testimonials_item',
		'category' => esc_html__( 'Flexity', 'flexity' ),
		'as_child' => array('only' => 'flexity_testimonials'),
		'icon' => get_template_directory_uri() . "/img/vc_flexity.png",
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Name', 'flexity'),
				'param_name' => 'name',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Position', 'flexity'),
				'param_name' => 'position',
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

class WPBakeryShortCode_flexity_testimonials_item extends WPBakeryShortCode {
	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array (
			'name' => '',
			'position' => '',
			'image' => '',
		), $atts ) );

		ob_start();
		if (!empty($content)) :
			?>
			<li class="testimonials-i">
				<?php if (!empty($content)) : ?>
				<div class="testimonials-i-cont">
					<?php echo wpautop($content); ?>
				</div>
				<?php endif; ?>
				<p class="testimonials-i-img">
					<?php
					if (!empty($image)) {
						$image_arr = wp_get_attachment_image_src( $image );
						?>
						<img src="<?php echo esc_attr($image_arr[0]); ?>" alt="<?php echo esc_attr($name); ?>">
						<?php
					}
					?>
				</p>
				<?php if (!empty($name) || !empty($position)) : ?>
				<div class="testimonials-i-info">
					<?php
					if (!empty($name)) {
						echo '<h3>'.esc_attr($name).'</h3>';
					}
					if (!empty($position)) {
						echo '<p class="testimonials-i-position">'.esc_attr($position).'</p>';
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