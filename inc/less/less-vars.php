<?php
// add the font | Main Title
$mainttl_font_face = (!empty($flexity_options['mainttl_font_face'])) ? $flexity_options['mainttl_font_face'] : '';
$mainttl_font_weight = (!empty($flexity_options['mainttl_font_weight'])) ? $flexity_options['mainttl_font_weight'] : '';
$mainttl_font_style  = (!empty($flexity_options['mainttl_font_style'])) ? $flexity_options['mainttl_font_style'] : '';
$mainttl_font_subset  = (!empty($flexity_options['mainttl_font_subset'])) ? $flexity_options['mainttl_font_subset'] : '';
$mainttl_font_size  = (!empty($flexity_options['mainttl_font_size'])) ? $flexity_options['mainttl_font_size'] : '';
if (class_exists('VP_Metabox')) {
	VP_Site_GoogleWebFont::instance()->add($mainttl_font_face, $mainttl_font_weight, $mainttl_font_style, $mainttl_font_subset);
}

// add the font | Normal Title
$normalttl_font_face = (!empty($flexity_options['normalttl_font_face'])) ? $flexity_options['normalttl_font_face'] : '';
$normalttl_font_weight = (!empty($flexity_options['normalttl_font_weight'])) ? $flexity_options['normalttl_font_weight'] : '';
$normalttl_font_style  = (!empty($flexity_options['normalttl_font_style'])) ? $flexity_options['normalttl_font_style'] : '';
$normalttl_font_subset  = (!empty($flexity_options['normalttl_font_subset'])) ? $flexity_options['normalttl_font_subset'] : '';
if (class_exists('VP_Metabox')) {
	VP_Site_GoogleWebFont::instance()->add($normalttl_font_face, $normalttl_font_weight, $normalttl_font_style, $normalttl_font_subset);
}

// add the font | Text
$text_font_face = (!empty($flexity_options['text_font_face'])) ? $flexity_options['text_font_face'] : '';
$text_font_weight = (!empty($flexity_options['text_font_weight'])) ? $flexity_options['text_font_weight'] : '';
$text_font_style  = (!empty($flexity_options['text_font_style'])) ? $flexity_options['text_font_style'] : '';
$text_font_subset  = (!empty($flexity_options['text_font_subset'])) ? $flexity_options['text_font_subset'] : '';
if (class_exists('VP_Metabox')) {
	VP_Site_GoogleWebFont::instance()->add($text_font_face, $text_font_weight, $text_font_style, $text_font_subset);
}

// embed font function
if (class_exists('VP_Metabox')) {
	function flexity_embed_fonts()
	{
		// you can directly enqueue and register
		VP_Site_GoogleWebFont::instance()->register_and_enqueue();
		// or register and get the handler to be used as dependency
		VP_Site_GoogleWebFont::instance()->register();
		//wp_register_style('flexity_fonts', get_template_directory_uri().'/css/fonts.css', VP_Site_GoogleWebFont::instance()->get_names());
		//wp_enqueue_style('flexity_fonts');
	}
	add_action('wp_enqueue_scripts', 'flexity_embed_fonts');
}

// Main Title	
if (!empty($mainttl_font_face)) {
	add_less_var( 'mainttl_font_face', "'".$mainttl_font_face."'" );
} else {
	add_less_var( 'mainttl_font_face', 'Montserrat' );
}
if (!empty($mainttl_font_weight)) {
	add_less_var( 'mainttl_font_weight', $mainttl_font_weight );
} else {
	add_less_var( 'mainttl_font_weight', 700 );
}
if (!empty($mainttl_font_size)) {
	add_less_var( 'mainttl_font_size', $mainttl_font_size.'px' );
} else {
	add_less_var( 'mainttl_font_size', '50px' );
}

// Normal Title
if (!empty($normalttl_font_face)) {
	add_less_var( 'normalttl_font_face', "'".$normalttl_font_face."'" );
} else {
	add_less_var( 'normalttl_font_face', 'Montserrat' );
}
if (!empty($normalttl_font_weight)) {
	add_less_var( 'normalttl_font_weight', $normalttl_font_weight );
} else {
	add_less_var( 'normalttl_font_weight', 700 );
}

// Text
if (!empty($text_font_face)) {
	add_less_var( 'text_font_face', "'".$text_font_face."'" );
} else {
	add_less_var( 'text_font_face', 'Montserrat' );
}
if (!empty($text_font_weight)) {
	add_less_var( 'text_font_weight', $text_font_weight );
} else {
	add_less_var( 'text_font_weight', 300 );
}

// Primary Color
(!empty($flexity_options['color_primary'])) ? $color_primary = $flexity_options['color_primary'] : $color_primary = '#3252fd';
add_less_var( 'color_primary', $color_primary );

// Body Background
(!empty($flexity_options['color_body'])) ? $color_body = $flexity_options['color_body'] : $color_body = '#f0f3f9';
add_less_var( 'color_body', $color_body );

// Header Background Color
(!empty($flexity_options['color_header'])) ? $color_header = $flexity_options['color_header'] : $color_header = '#ffffff';
add_less_var( 'color_header', $color_header );

// Footer Background Color
(!empty($flexity_options['color_footer'])) ? $color_footer = $flexity_options['color_footer'] : $color_footer = '#ffffff';
add_less_var( 'color_footer', $color_footer );

// Copyright Background Color
(!empty($flexity_options['color_copyright'])) ? $color_copyright = $flexity_options['color_copyright'] : $color_copyright = '#f0f3f9';
add_less_var( 'color_copyright', $color_copyright );

?>