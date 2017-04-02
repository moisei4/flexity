<?php
// add the font | Content
$content_font_name = (!empty($flexity_options['content_font_name'])) ? $flexity_options['content_font_name'] : '';
$content_font_size = (!empty($flexity_options['content_font_size'])) ? $flexity_options['content_font_size'] : '';
$content_line_height = (!empty($flexity_options['content_line_height'])) ? $flexity_options['content_line_height'] : '';
$content_font_style  = (!empty($flexity_options['content_font_style'])) ? $flexity_options['content_font_style'] : '';
$content_font_weight = (!empty($flexity_options['content_font_weight'])) ? $flexity_options['content_font_weight'] : '';
$content_font_subset  = (!empty($flexity_options['content_font_subset'])) ? $flexity_options['content_font_subset'] : '';
if (class_exists('VP_Metabox')) {
	VP_Site_GoogleWebFont::instance()->add($content_font_name, $content_font_weight, $content_font_style, $content_font_subset);
}

// add the font | H1 Heading
$h1_font_name = (!empty($flexity_options['h1_font_name'])) ? $flexity_options['h1_font_name'] : '';
$h1_font_size = (!empty($flexity_options['h1_font_size'])) ? $flexity_options['h1_font_size'] : '';
$h1_line_height = (!empty($flexity_options['h1_line_height'])) ? $flexity_options['h1_line_height'] : '';
$h1_font_style  = (!empty($flexity_options['h1_font_style'])) ? $flexity_options['h1_font_style'] : '';
$h1_font_weight = (!empty($flexity_options['h1_font_weight'])) ? $flexity_options['h1_font_weight'] : '';
$h1_font_transform  = (!empty($flexity_options['h1_font_transform'])) ? $flexity_options['h1_font_transform'] : '';
$h1_font_subset  = (!empty($flexity_options['h1_font_subset'])) ? $flexity_options['h1_font_subset'] : '';
if (class_exists('VP_Metabox')) {
	VP_Site_GoogleWebFont::instance()->add($h1_font_name, $h1_font_weight, $h1_font_style, $h1_font_subset);
}

// add the font | H2 Heading
$h2_font_name = (!empty($flexity_options['h2_font_name'])) ? $flexity_options['h2_font_name'] : '';
$h2_font_size = (!empty($flexity_options['h2_font_size'])) ? $flexity_options['h2_font_size'] : '';
$h2_line_height = (!empty($flexity_options['h2_line_height'])) ? $flexity_options['h2_line_height'] : '';
$h2_font_style  = (!empty($flexity_options['h2_font_style'])) ? $flexity_options['h2_font_style'] : '';
$h2_font_weight = (!empty($flexity_options['h2_font_weight'])) ? $flexity_options['h2_font_weight'] : '';
$h2_font_transform  = (!empty($flexity_options['h2_font_transform'])) ? $flexity_options['h2_font_transform'] : '';
$h2_font_subset  = (!empty($flexity_options['h2_font_subset'])) ? $flexity_options['h2_font_subset'] : '';
if (class_exists('VP_Metabox')) {
	VP_Site_GoogleWebFont::instance()->add($h2_font_name, $h2_font_weight, $h2_font_style, $h2_font_subset);
}

// add the font | H3 Heading
$h3_font_name = (!empty($flexity_options['h3_font_name'])) ? $flexity_options['h3_font_name'] : '';
$h3_font_size = (!empty($flexity_options['h3_font_size'])) ? $flexity_options['h3_font_size'] : '';
$h3_line_height = (!empty($flexity_options['h3_line_height'])) ? $flexity_options['h3_line_height'] : '';
$h3_font_style  = (!empty($flexity_options['h3_font_style'])) ? $flexity_options['h3_font_style'] : '';
$h3_font_weight = (!empty($flexity_options['h3_font_weight'])) ? $flexity_options['h3_font_weight'] : '';
$h3_font_transform  = (!empty($flexity_options['h3_font_transform'])) ? $flexity_options['h3_font_transform'] : '';
$h3_font_subset  = (!empty($flexity_options['h3_font_subset'])) ? $flexity_options['h3_font_subset'] : '';
if (class_exists('VP_Metabox')) {
	VP_Site_GoogleWebFont::instance()->add($h3_font_name, $h3_font_weight, $h3_font_style, $h3_font_subset);
}

// add the font | H4 Heading
$h4_font_name = (!empty($flexity_options['h4_font_name'])) ? $flexity_options['h4_font_name'] : '';
$h4_font_size = (!empty($flexity_options['h4_font_size'])) ? $flexity_options['h4_font_size'] : '';
$h4_line_height = (!empty($flexity_options['h4_line_height'])) ? $flexity_options['h4_line_height'] : '';
$h4_font_style  = (!empty($flexity_options['h4_font_style'])) ? $flexity_options['h4_font_style'] : '';
$h4_font_weight = (!empty($flexity_options['h4_font_weight'])) ? $flexity_options['h4_font_weight'] : '';
$h4_font_transform  = (!empty($flexity_options['h4_font_transform'])) ? $flexity_options['h4_font_transform'] : '';
$h4_font_subset  = (!empty($flexity_options['h4_font_subset'])) ? $flexity_options['h4_font_subset'] : '';
if (class_exists('VP_Metabox')) {
	VP_Site_GoogleWebFont::instance()->add($h4_font_name, $h4_font_weight, $h4_font_style, $h4_font_subset);
}

// add the font | H5 Heading
$h5_font_name = (!empty($flexity_options['h5_font_name'])) ? $flexity_options['h5_font_name'] : '';
$h5_font_size = (!empty($flexity_options['h5_font_size'])) ? $flexity_options['h5_font_size'] : '';
$h5_line_height = (!empty($flexity_options['h5_line_height'])) ? $flexity_options['h5_line_height'] : '';
$h5_font_style  = (!empty($flexity_options['h5_font_style'])) ? $flexity_options['h5_font_style'] : '';
$h5_font_weight = (!empty($flexity_options['h5_font_weight'])) ? $flexity_options['h5_font_weight'] : '';
$h5_font_transform  = (!empty($flexity_options['h5_font_transform'])) ? $flexity_options['h5_font_transform'] : '';
$h5_font_subset  = (!empty($flexity_options['h5_font_subset'])) ? $flexity_options['h5_font_subset'] : '';
if (class_exists('VP_Metabox')) {
	VP_Site_GoogleWebFont::instance()->add($h5_font_name, $h5_font_weight, $h5_font_style, $h5_font_subset);
}

// add the font | H6 Heading
$h6_font_name = (!empty($flexity_options['h6_font_name'])) ? $flexity_options['h6_font_name'] : '';
$h6_font_size = (!empty($flexity_options['h6_font_size'])) ? $flexity_options['h6_font_size'] : '';
$h6_line_height = (!empty($flexity_options['h6_line_height'])) ? $flexity_options['h6_line_height'] : '';
$h6_font_style  = (!empty($flexity_options['h6_font_style'])) ? $flexity_options['h6_font_style'] : '';
$h6_font_weight = (!empty($flexity_options['h6_font_weight'])) ? $flexity_options['h6_font_weight'] : '';
$h6_font_transform  = (!empty($flexity_options['h6_font_transform'])) ? $flexity_options['h6_font_transform'] : '';
$h6_font_subset  = (!empty($flexity_options['h6_font_subset'])) ? $flexity_options['h6_font_subset'] : '';
if (class_exists('VP_Metabox')) {
	VP_Site_GoogleWebFont::instance()->add($h6_font_name, $h6_font_weight, $h6_font_style, $h6_font_subset);
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

// Text
if (!empty($content_font_name)) {
	add_less_var( 'content_font_name', "'".$content_font_name."'" );
} else {
	add_less_var( 'content_font_name', 'Montserrat' );
}
if (!empty($content_font_size)) {
	add_less_var( 'content_font_size', $content_font_size . 'px' );
} else {
	add_less_var( 'content_font_size', '15px' );
}
if (!empty($content_line_height)) {
	add_less_var( 'content_line_height', $content_line_height . 'px' );
} else {
	add_less_var( 'content_line_height', '25px' );
}
if (!empty($content_font_style)) {
	add_less_var( 'content_font_style', $content_font_style );
} else {
	add_less_var( 'content_font_style', 'normal' );
}
if (!empty($content_font_weight)) {
	add_less_var( 'content_font_weight', $content_font_weight );
} else {
	add_less_var( 'content_font_weight', 'normal' );
}

// H1 Heading	
if (!empty($h1_font_name)) {
	add_less_var( 'h1_font_name', "'".$h1_font_name."'" );
} else {
	add_less_var( 'h1_font_name', 'Montserrat' );
}
if (!empty($h1_font_size)) {
	add_less_var( 'h1_font_size', $h1_font_size . 'px' );
} else {
	add_less_var( 'h1_font_size', '35px' );
}
if (!empty($h1_line_height)) {
	add_less_var( 'h1_line_height', $h1_line_height . 'px' );
} else {
	add_less_var( 'h1_line_height', '45px' );
}
if (!empty($h1_font_style)) {
	add_less_var( 'h1_font_style', $h1_font_style );
} else {
	add_less_var( 'h1_font_style', 'normal' );
}
if (!empty($h1_font_weight)) {
	add_less_var( 'h1_font_weight', $h1_font_weight );
} else {
	add_less_var( 'h1_font_weight', 700 );
}
if (!empty($h1_font_transform)) {
	add_less_var( 'h1_font_transform', $h1_font_transform );
} else {
	add_less_var( 'h1_font_transform', 'none' );
}

// H2 Heading	
if (!empty($h2_font_name)) {
	add_less_var( 'h2_font_name', "'".$h2_font_name."'" );
} else {
	add_less_var( 'h2_font_name', 'Montserrat' );
}
if (!empty($h2_font_size)) {
	add_less_var( 'h2_font_size', $h2_font_size . 'px' );
} else {
	add_less_var( 'h2_font_size', '25px' );
}
if (!empty($h2_line_height)) {
	add_less_var( 'h2_line_height', $h2_line_height . 'px' );
} else {
	add_less_var( 'h2_line_height', '35px' );
}
if (!empty($h2_font_style)) {
	add_less_var( 'h2_font_style', $h2_font_style );
} else {
	add_less_var( 'h2_font_style', 'normal' );
}
if (!empty($h2_font_weight)) {
	add_less_var( 'h2_font_weight', $h2_font_weight );
} else {
	add_less_var( 'h2_font_weight', 700 );
}
if (!empty($h2_font_transform)) {
	add_less_var( 'h2_font_transform', $h2_font_transform );
} else {
	add_less_var( 'h2_font_transform', 'none' );
}

// H3 Heading	
if (!empty($h3_font_name)) {
	add_less_var( 'h3_font_name', "'".$h3_font_name."'" );
} else {
	add_less_var( 'h3_font_name', 'Montserrat' );
}
if (!empty($h3_font_size)) {
	add_less_var( 'h3_font_size', $h3_font_size . 'px' );
} else {
	add_less_var( 'h3_font_size', '20px' );
}
if (!empty($h3_line_height)) {
	add_less_var( 'h3_line_height', $h3_line_height . 'px' );
} else {
	add_less_var( 'h3_line_height', '30px' );
}
if (!empty($h3_font_style)) {
	add_less_var( 'h3_font_style', $h3_font_style );
} else {
	add_less_var( 'h3_font_style', 'normal' );
}
if (!empty($h3_font_weight)) {
	add_less_var( 'h3_font_weight', $h3_font_weight );
} else {
	add_less_var( 'h3_font_weight', 700 );
}
if (!empty($h3_font_transform)) {
	add_less_var( 'h3_font_transform', $h3_font_transform );
} else {
	add_less_var( 'h3_font_transform', 'uppercase' );
}

// H4 Heading	
if (!empty($h4_font_name)) {
	add_less_var( 'h4_font_name', "'".$h4_font_name."'" );
} else {
	add_less_var( 'h4_font_name', 'Montserrat' );
}
if (!empty($h4_font_size)) {
	add_less_var( 'h4_font_size', $h4_font_size . 'px' );
} else {
	add_less_var( 'h4_font_size', '20px' );
}
if (!empty($h4_line_height)) {
	add_less_var( 'h4_line_height', $h4_line_height . 'px' );
} else {
	add_less_var( 'h4_line_height', '30px' );
}
if (!empty($h4_font_style)) {
	add_less_var( 'h4_font_style', $h4_font_style );
} else {
	add_less_var( 'h4_font_style', 'normal' );
}
if (!empty($h4_font_weight)) {
	add_less_var( 'h4_font_weight', $h4_font_weight );
} else {
	add_less_var( 'h4_font_weight', 700 );
}
if (!empty($h4_font_transform)) {
	add_less_var( 'h4_font_transform', $h4_font_transform );
} else {
	add_less_var( 'h4_font_transform', 'none' );
}

// H5 Heading	
if (!empty($h5_font_name)) {
	add_less_var( 'h5_font_name', "'".$h5_font_name."'" );
} else {
	add_less_var( 'h5_font_name', 'Montserrat' );
}
if (!empty($h5_font_size)) {
	add_less_var( 'h5_font_size', $h5_font_size . 'px' );
} else {
	add_less_var( 'h5_font_size', '14px' );
}
if (!empty($h5_line_height)) {
	add_less_var( 'h5_line_height', $h5_line_height . 'px' );
} else {
	add_less_var( 'h5_line_height', '25px' );
}
if (!empty($h5_font_style)) {
	add_less_var( 'h5_font_style', $h5_font_style );
} else {
	add_less_var( 'h5_font_style', 'normal' );
}
if (!empty($h5_font_weight)) {
	add_less_var( 'h5_font_weight', $h5_font_weight );
} else {
	add_less_var( 'h5_font_weight', 700 );
}
if (!empty($h5_font_transform)) {
	add_less_var( 'h5_font_transform', $h5_font_transform );
} else {
	add_less_var( 'h5_font_transform', 'uppercase' );
}

// H6 Heading	
if (!empty($h6_font_name)) {
	add_less_var( 'h6_font_name', "'".$h6_font_name."'" );
} else {
	add_less_var( 'h6_font_name', 'Montserrat' );
}
if (!empty($h6_font_size)) {
	add_less_var( 'h6_font_size', $h6_font_size . 'px' );
} else {
	add_less_var( 'h6_font_size', '12px' );
}
if (!empty($h6_line_height)) {
	add_less_var( 'h6_line_height', $h6_line_height . 'px' );
} else {
	add_less_var( 'h6_line_height', '25px' );
}
if (!empty($h6_font_style)) {
	add_less_var( 'h6_font_style', $h6_font_style );
} else {
	add_less_var( 'h6_font_style', 'normal' );
}
if (!empty($h6_font_weight)) {
	add_less_var( 'h6_font_weight', $h6_font_weight );
} else {
	add_less_var( 'h6_font_weight', 700 );
}
if (!empty($h6_font_transform)) {
	add_less_var( 'h6_font_transform', $h6_font_transform );
} else {
	add_less_var( 'h6_font_transform', 'uppercase' );
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