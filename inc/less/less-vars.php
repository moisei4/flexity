<?php
// add the font | Main Title
$h1_font_name = (!empty($flexity_options['h1_font_name'])) ? $flexity_options['h1_font_name'] : '';
$h1_font_weight = (!empty($flexity_options['h1_font_weight'])) ? $flexity_options['h1_font_weight'] : '';
$h1_font_style  = (!empty($flexity_options['h1_font_style'])) ? $flexity_options['h1_font_style'] : '';
$h1_font_subset  = (!empty($flexity_options['h1_font_subset'])) ? $flexity_options['h1_font_subset'] : '';
$h1_font_size  = (!empty($flexity_options['h1_font_size'])) ? $flexity_options['h1_font_size'] : '';
if (class_exists('VP_Metabox')) {
	VP_Site_GoogleWebFont::instance()->add($h1_font_name, $h1_font_weight, $h1_font_style, $h1_font_subset);
}

// add the font | Normal Title
$h2_font_name = (!empty($flexity_options['h2_font_name'])) ? $flexity_options['h2_font_name'] : '';
$h2_font_weight = (!empty($flexity_options['h2_font_weight'])) ? $flexity_options['h2_font_weight'] : '';
$h2_font_style  = (!empty($flexity_options['h2_font_style'])) ? $flexity_options['h2_font_style'] : '';
$h2_font_subset  = (!empty($flexity_options['h2_font_subset'])) ? $flexity_options['h2_font_subset'] : '';
if (class_exists('VP_Metabox')) {
	VP_Site_GoogleWebFont::instance()->add($h2_font_name, $h2_font_weight, $h2_font_style, $h2_font_subset);
}

// add the font | Text
$content_font_name = (!empty($flexity_options['content_font_name'])) ? $flexity_options['content_font_name'] : '';
$content_font_weight = (!empty($flexity_options['content_font_weight'])) ? $flexity_options['content_font_weight'] : '';
$content_font_style  = (!empty($flexity_options['content_font_style'])) ? $flexity_options['content_font_style'] : '';
$content_font_subset  = (!empty($flexity_options['content_font_subset'])) ? $flexity_options['content_font_subset'] : '';
if (class_exists('VP_Metabox')) {
	VP_Site_GoogleWebFont::instance()->add($content_font_name, $content_font_weight, $content_font_style, $content_font_subset);
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
if (!empty($h1_font_name)) {
	add_less_var( 'h1_font_name', "'".$h1_font_name."'" );
} else {
	add_less_var( 'h1_font_name', 'Montserrat' );
}
if (!empty($h1_font_weight)) {
	add_less_var( 'h1_font_weight', $h1_font_weight );
} else {
	add_less_var( 'h1_font_weight', 700 );
}
if (!empty($h1_font_size)) {
	add_less_var( 'h1_font_size', $h1_font_size.'px' );
} else {
	add_less_var( 'h1_font_size', '50px' );
}

// Normal Title
if (!empty($h2_font_name)) {
	add_less_var( 'h2_font_name', "'".$h2_font_name."'" );
} else {
	add_less_var( 'h2_font_name', 'Montserrat' );
}
if (!empty($h2_font_weight)) {
	add_less_var( 'h2_font_weight', $h2_font_weight );
} else {
	add_less_var( 'h2_font_weight', 700 );
}

// Text
if (!empty($content_font_name)) {
	add_less_var( 'content_font_name', "'".$content_font_name."'" );
} else {
	add_less_var( 'content_font_name', 'Montserrat' );
}
if (!empty($content_font_weight)) {
	add_less_var( 'content_font_weight', $content_font_weight );
} else {
	add_less_var( 'content_font_weight', 300 );
}

// Content Color
(!empty($flexity_options['color_content'])) ? $color_content = $flexity_options['color_content'] : $color_content = '#4e4e4e';
add_less_var( 'color_content', $color_content );

// Heading Color
(!empty($flexity_options['color_heading'])) ? $color_heading = $flexity_options['color_heading'] : $color_heading = '#17161a';
add_less_var( 'color_heading', $color_heading );

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