<?php
add_action( 'vc_before_init', 'flexity_pricing_integrate_vc' );
function flexity_pricing_integrate_vc () {
	vc_map( array(
		'name' => esc_html__('Pricing Tables', 'flexity'),
		'base' => 'flexity_pricing',
		'class' => '',
		'category' => esc_html__( 'Flexity', 'flexity' ),
		'icon' => get_template_directory_uri() . "/img/vc_flexity.png",
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'flexity'),
				'param_name' => 'title',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style', 'flexity'),
				'param_name' => 'style',
				'value' => array(
					esc_html__('Style 1', 'flexity') => 'style_1',
					esc_html__('Style 2', 'flexity') => 'style_2',
					esc_html__('Style 3', 'flexity') => 'style_3'
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Price', 'flexity'),
				'param_name' => 'price',
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('Link', 'flexity'),
				'param_name' => 'link',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Larger', 'flexity'),
				'param_name' => 'larger',
			),
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content', 'flexity'),
				'param_name' => 'content',
			),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'Css', 'flexity' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design options', 'flexity' ),
			),
		)
	) );
}

class WPBakeryShortCode_flexity_pricing extends WPBakeryShortCode {
	protected function content( $atts, $content = null ) {

		$css = '';
		extract( shortcode_atts( array (
			'title' => '',
			'style' => '',
			'price' => '',
			'link' => '',
			'larger' => '',
			'css' => ''
		), $atts ) );

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

		ob_start();
		?>
		<div class="pricing-table<?php if (!empty($larger)) echo ' pricing-table-marked'; ?><?php if (!empty($style)) echo ' '.esc_attr($style); ?><?php echo esc_attr( $css_class ); ?>">
			<?php
			if (!empty($title)) {
				echo "<h3>".esc_attr($title)."</h3>";
			}
			if (!empty($price) && $style != 'style_3') {
				echo "<p class='pricing-table-price'>".esc_attr($price)."</p>";
			}
			if (!empty($content)) {
				echo '<div class="pricing-table-desc">'.wpautop($content).'</div>';
			}
			if (!empty($link) && $style != 'style_3') {
				$link = vc_build_link($link);
				?>
				<a href="<?php echo esc_url($link['url']); ?>"<?php if (!empty($link['target'])) echo ' target="'.esc_attr($link['target']).'"'; ?> class="pricing-table-action"><?php if (!empty($link['title'])) echo esc_attr($link['title']); ?></a>
				<?php
			}
			if (!empty($price) && $style == 'style_3') {
				echo "<p class='pricing-table-price'>".esc_attr($price)."</p>";
			}
			?>
		</div>
		<?php
		if (!empty($link) && $style == 'style_3') {
			$link = vc_build_link($link);
			?>
			<a href="<?php echo esc_url($link['url']); ?>"<?php if (!empty($link['target'])) echo ' target="'.esc_attr($link['target']).'"'; ?> class="pricing-table-action"><?php if (!empty($link['title'])) echo esc_attr($link['title']); ?></a>
			<?php
		}
		$output = ob_get_clean();

		return $output;
	}
}