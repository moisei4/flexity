<?php

include( trailingslashit( get_template_directory() ) . 'inc/shortcodes/counter.php' );
include( trailingslashit( get_template_directory() ) . 'inc/shortcodes/promobox.php' );
include( trailingslashit( get_template_directory() ) . 'inc/shortcodes/pricing.php' );
include( trailingslashit( get_template_directory() ) . 'inc/shortcodes/team.php' );
include( trailingslashit( get_template_directory() ) . 'inc/shortcodes/infoblock.php' );
include( trailingslashit( get_template_directory() ) . 'inc/shortcodes/content_carousel.php' );
include( trailingslashit( get_template_directory() ) . 'inc/shortcodes/gallery.php' );
include( trailingslashit( get_template_directory() ) . 'inc/shortcodes/testimonials.php' );
include( trailingslashit( get_template_directory() ) . 'inc/shortcodes/iconbox.php' );
if ( class_exists( 'WooCommerce' ) ) {
	include( trailingslashit( get_template_directory() ) . 'inc/shortcodes/product_categories.php' );
	include( trailingslashit( get_template_directory() ) . 'inc/shortcodes/products.php' );
}

// VC Row
vc_remove_param( "vc_row", "full_width" );

vc_add_param( "vc_row", array(
	'type' => 'dropdown',
	'heading' => esc_html__( 'Layout', 'flexity' ),
	'param_name' => 'layout',
	'value' => array(
		esc_html__( 'Container', 'flexity' )       => 'container',
		esc_html__( 'Full Width', 'flexity' )      => 'full',
		esc_html__( 'Container Boxed', 'flexity' ) => 'boxed',
	),
	'weight' => 10
) );

vc_add_param( "vc_row", array(
	'type' => 'textfield',
	'heading' => esc_html__( 'Row Title', 'flexity' ),
	'param_name' => 'row_title',
	'weight' => 5
) );

vc_add_param( "vc_row", array(
	'type' => 'textfield',
	'heading' => esc_html__( 'Row Subtitle', 'flexity' ),
	'param_name' => 'row_subtitle',
	'weight' => 5
) );


// VC Row Inner
vc_add_param( "vc_row_inner", array(
	'type' => 'dropdown',
	'heading' => esc_html__( 'Layout', 'flexity' ),
	'param_name' => 'layout',
	'value' => array(
		esc_html__( 'Container', 'flexity' )       => 'container',
		esc_html__( 'Full Width', 'flexity' )      => 'full',
	),
	'weight' => 10
) );


// Custom Heading
vc_add_param( 'vc_custom_heading', array(
	'type' => 'checkbox',
	'heading' => esc_html__( 'Use theme default font family?', 'flexity' ),
	'param_name' => 'use_theme_fonts',
	'value' => array( esc_html__( 'Yes', 'flexity' ) => 'yes' ),
	'description' => esc_html__( 'Use font family from the theme.', 'flexity' ),
	'std' => 'yes'
) );



// Separator
vc_add_param( 'vc_separator', array(
	'type' => 'dropdown',
	'heading' => esc_html__( 'Color', 'flexity' ),
	'param_name' => 'color',
	'value' => array_merge( getVcShared( 'colors' ), array( esc_html__( 'Custom color', 'flexity' ) => 'custom', esc_html__( 'Theme', 'flexity' ) => 'theme' ) ),
	'std' => 'theme',
	'description' => esc_html__( 'Select color of separator.', 'flexity' ),
	'param_holder_class' => 'vc_colored-dropdown'
) );
vc_add_param( 'vc_separator', array(
	'type' => 'dropdown',
	'heading' => esc_html__( 'Element width', 'flexity' ),
	'param_name' => 'el_width',
	'value' => array(
		esc_html__( 'auto', 'flexity' ) => 'auto',
		'100%' => '',
		'90%' => '90',
		'80%' => '80',
		'70%' => '70',
		'60%' => '60',
		'50%' => '50',
		'40%' => '40',
		'30%' => '30',
		'20%' => '20',
		'10%' => '10',
	),
	'description' => esc_html__( 'Select separator width (percentage).', 'flexity' ),
) );

// Tour
vc_add_param( 'vc_tta_tour', array(
	'type' => 'textfield',
	'heading' => esc_html__( 'Extra class name', 'flexity' ),
	'param_name' => 'el_class',
	'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'flexity' ),
	'value' => 'flexity-tour'
) );
// Tabs
vc_add_param( 'vc_tta_tabs', array(
	'type' => 'textfield',
	'heading' => esc_html__( 'Extra class name', 'flexity' ),
	'param_name' => 'el_class',
	'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'flexity' ),
	'value' => 'flexity-tabs'
) );

// Tabs
vc_remove_param( "vc_tta_tabs", "color" );
vc_remove_param( "vc_tta_tour", "color" );
