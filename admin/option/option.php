<?php

return array(
	'title' => esc_html__('Flexity Options Panel', 'flexity'),
	'logo' => '',
	'menus' => array(
		array(
			'title' => esc_html__('Header', 'flexity'),
			'name' => 'flexity_header',
			'icon' => 'font-awesome:fa-cogs',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => esc_html__('Header', 'flexity'),
					'fields' => array(
						array(
							'type' => 'select',
							'name' => 'flexity_header_type',
							'label' => esc_html__('Header Menu Type', 'flexity'),
							'items' => array(
								array(
									'value' => 'default',
									'label' => esc_html__('Default', 'flexity'),
								),
								array(
									'value' => 'burger',
									'label' => esc_html__('Burger', 'flexity'),
								),
								array(
									'value' => 'left',
									'label' => esc_html__('Left', 'flexity'),
								),
							),
							'default' => array(
								'default'
							),
						),
						array(
							'type' => 'upload',
							'name' => 'flexity_header_logo',
							'label' => esc_html__('Logotype', 'flexity'),
							'default' => get_template_directory_uri().'/img/logo.png',
						),
						array(
							'type' => 'toggle',
							'name' => 'flexity_header_search',
							'label' => esc_html__('Show Header Search', 'flexity'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'flexity_header_cart',
							'label' => esc_html__('Show Header Cart', 'flexity'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'flexity_header_button',
							'label' => esc_html__('Show Header Button', 'flexity'),
							'default' => '0',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_header_button_text',
							'label' => esc_html__('Header Button Text', 'flexity'),
							'description' => '',
							'default' => '',
							'dependency' => array(
								'field'    => 'flexity_header_button',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_header_button_link',
							'label' => esc_html__('Header Button Link', 'flexity'),
							'description' => '',
							'default' => '',
							'dependency' => array(
								'field'    => 'flexity_header_button',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'flexity_header_sticky',
							'label' => esc_html__('Sticky Header', 'flexity'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'flexity_header_topbar',
							'label' => esc_html__('Show Topbar', 'flexity'),
							'default' => '0',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_header_address_ttl',
							'label' => esc_html__('Address Title', 'flexity'),
							'description' => '',
							'default' => '',
							'dependency' => array(
								'field'    => 'flexity_header_topbar',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_header_address',
							'label' => esc_html__('Address', 'flexity'),
							'description' => '',
							'default' => '',
							'dependency' => array(
								'field'    => 'flexity_header_topbar',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_header_contacts_ttl',
							'label' => esc_html__('Contacts Title', 'flexity'),
							'description' => '',
							'default' => '',
							'dependency' => array(
								'field'    => 'flexity_header_topbar',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_header_contacts',
							'label' => esc_html__('Contacts', 'flexity'),
							'description' => '',
							'default' => '',
							'dependency' => array(
								'field'    => 'flexity_header_topbar',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_header_phone_ttl',
							'label' => esc_html__('Phone Title', 'flexity'),
							'description' => '',
							'default' => '',
							'dependency' => array(
								'field'    => 'flexity_header_topbar',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_header_phone',
							'label' => esc_html__('Phone', 'flexity'),
							'description' => '',
							'default' => '',
							'dependency' => array(
								'field'    => 'flexity_header_topbar',
								'function' => 'vp_dep_boolean',
							),
						),
					),
				),
			),
		),
		array(
			'title' => esc_html__('Footer', 'flexity'),
			'name' => 'flexity_footer',
			'icon' => 'font-awesome:fa-th-large',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => esc_html__('Copyright', 'flexity'),
					'fields' => array(
						array(
							'type' => 'codeeditor',
							'name' => 'flexity_footer_copyright',
							'label' => __('Copyright', 'flexity'),
							'description' => __('Write your custom html here.', 'flexity'),
							'theme' => 'github',
							'mode' => 'html',
						),
					),
				),
				array(
					'type'      => 'section',
					'title'     => esc_html__('Social Links', 'flexity'),
					'fields'    => array(
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_link_1',
							'label' => 'Link 1',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_icon_1',
							'label' => 'Text 1',
						),
						array(
							'type' => 'color',
							'name' => 'flexity_footer_color_1',
							'label' => esc_html__('Color 1', 'flexity'),
							'format' => 'HEX',
							'default' => '#23599b',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_link_2',
							'label' => 'Link 2',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_icon_2',
							'label' => 'Text 2',
						),
						array(
							'type' => 'color',
							'name' => 'flexity_footer_color_2',
							'label' => esc_html__('Color 2', 'flexity'),
							'format' => 'HEX',
							'default' => '#4982ab',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_link_3',
							'label' => 'Link 3',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_icon_3',
							'label' => 'Text 3',
						),
						array(
							'type' => 'color',
							'name' => 'flexity_footer_color_3',
							'label' => esc_html__('Color 3', 'flexity'),
							'format' => 'HEX',
							'default' => '#00a2f6',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_link_4',
							'label' => 'Link 4',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_icon_4',
							'label' => 'Text 4',
						),
						array(
							'type' => 'color',
							'name' => 'flexity_footer_color_4',
							'label' => esc_html__('Color 4', 'flexity'),
							'format' => 'HEX',
							'default' => '#fe4b37',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_link_5',
							'label' => 'Link 5',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_icon_5',
							'label' => 'Text 5',
						),
						array(
							'type' => 'color',
							'name' => 'flexity_footer_color_5',
							'label' => esc_html__('Color 5', 'flexity'),
							'format' => 'HEX',
							'default' => '#ff1514',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_link_6',
							'label' => 'Link 6',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_icon_6',
							'label' => 'Text 6',
						),
						array(
							'type' => 'color',
							'name' => 'flexity_footer_color_6',
							'label' => esc_html__('Color 6', 'flexity'),
							'format' => 'HEX',
							'default' => '#303030',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_link_7',
							'label' => 'Link 7',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_icon_7',
							'label' => 'Text 7',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_link_8',
							'label' => 'Link 8',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_icon_8',
							'label' => 'Text 8',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_link_9',
							'label' => 'Link 9',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_icon_9',
							'label' => 'Text 9',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_link_10',
							'label' => 'Link 10',
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_footer_icon_10',
							'label' => 'Text 10',
						),
					),
				),
			),
		),
		array(
			'title' => esc_html__('Catalog', 'flexity'),
			'name' => 'flexity_catalog',
			'icon' => 'font-awesome:fa-list',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => esc_html__('Catalog', 'flexity'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'flexity_catalog_pagi',
							'label' => esc_html__('Number of products', 'flexity'),
							'default' => '12',
							'validation' => 'numeric',
						),
						array(
							'type' => 'select',
							'name' => 'flexity_catalog_mode',
							'label' => esc_html__('Default Catalog Mode', 'flexity'),
							'items' => array(
								array(
									'value' => 'list',
									'label' => esc_html__('List', 'flexity'),
								),
								array(
									'value' => 'gallery',
									'label' => esc_html__('Gallery', 'flexity'),
								),
							),
							'default' => array(
								'list'
							),
						),
						array(
							'type' => 'select',
							'name' => 'flexity_catalog_sidebar',
							'label' => esc_html__('Catalog Sidebar Position', 'flexity'),
							'items' => array(
								array(
									'value' => 'full',
									'label' => esc_html__('Without Sidebar', 'flexity'),
								),
								array(
									'value' => 'sticky',
									'label' => esc_html__('Sticky Sidebar', 'flexity'),
								),
								array(
									'value' => 'left',
									'label' => esc_html__('Standart Sidebar', 'flexity'),
								),
							),
							'default' => array(
								'full'
							),
						),
					),
				),
			),
		),
		array(
			'title' => esc_html__('Blog', 'flexity'),
			'name' => 'flexity_blog',
			'icon' => 'font-awesome:fa-file-text',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => esc_html__('Sidebar Position', 'flexity'),
					'fields' => array(
						array(
							'type' => 'select',
							'name' => 'flexity_blog_sidebar',
							'label' => esc_html__('Blog Sidebar Position', 'flexity'),
							'items' => array(
								array(
									'value' => 'right',
									'label' => esc_html__('Right', 'flexity'),
								),
								array(
									'value' => 'left',
									'label' => esc_html__('Left', 'flexity'),
								),
								array(
									'value' => 'full',
									'label' => esc_html__('Without Sidebar', 'flexity'),
								),
							),
							'default' => array(
								'right'
							),
						),
						array(
							'type' => 'select',
							'name' => 'flexity_post_sidebar',
							'label' => esc_html__('Single Post Sidebar Position', 'flexity'),
							'items' => array(
								array(
									'value' => 'right',
									'label' => esc_html__('Right', 'flexity'),
								),
								array(
									'value' => 'left',
									'label' => esc_html__('Left', 'flexity'),
								),
								array(
									'value' => 'full',
									'label' => esc_html__('Without Sidebar', 'flexity'),
								),
							),
							'default' => array(
								'right'
							),
						),
					),
				),
			),
		),
		array(
			'title' => esc_html__('Cart', 'flexity'),
			'name' => 'flexity_cart',
			'icon' => 'font-awesome:fa-shopping-cart',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => esc_html__('Cart Template', 'flexity'),
					'fields' => array(
						array(
							'type' => 'select',
							'name' => 'flexity_cart_template',
							'label' => esc_html__('Cart Template', 'flexity'),
							'items' => array(
								array(
									'value' => 'modern',
									'label' => esc_html__('Modern', 'flexity'),
								),
								array(
									'value' => 'classic',
									'label' => esc_html__('Classic', 'flexity'),
								),
							),
							'default' => array(
								'modern'
							),
						),
					),
				),
			),
		),
		array(
			'title' => esc_html__('Others', 'flexity'),
			'name' => 'flexity_other',
			'icon' => 'font-awesome:fa-cog',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => esc_html__('Others', 'flexity'),
					'fields' => array(
						array(
							'type' => 'checkbox',
							'name' => 'flexity_other_share',
							'label' => esc_html__('Share', 'flexity'),
							'items' => array(
								array(
									'value' => 'facebook',
									'label' => esc_html__('Facebook', 'flexity'),
								),
								array(
									'value' => 'twitter',
									'label' => esc_html__('Twitter', 'flexity'),
								),
								array(
									'value' => 'vk',
									'label' => esc_html__('VK.com', 'flexity'),
								),
								array(
									'value' => 'pinterest',
									'label' => esc_html__('Pinterest', 'flexity'),
								),
								array(
									'value' => 'gplus',
									'label' => esc_html__('Google Plus', 'flexity'),
								),
								array(
									'value' => 'linkedin',
									'label' => esc_html__('Linkedin', 'flexity'),
								),
								array(
									'value' => 'tumblr',
									'label' => esc_html__('Tumblr', 'flexity'),
								),
							),
							'default' => array(
								'facebook',
								'twitter',
								'vk',
								'pinterest',
								'gplus',
								'linkedin',
								'tumbrl',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'flexity_gmaps_api',
							'label' => esc_html__('Google Maps API', 'flexity'),
							'default' => 'AIzaSyDLAE1-h0khmfa8uytDfDEpUG2uiMK-Lls',
						),
						array(
							'type' => 'upload',
							'name' => 'flexity_favicon',
							'label' => esc_html__('Favicon', 'flexity'),
							'default' => get_template_directory_uri().'/img/favicon.ico',
						),
					),
				),
			),
		),


		array(
			'title' => esc_html__('Colors', 'flexity'),
			'name' => 'flexity_styling',
			'icon' => 'font-awesome:fa-magic',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => esc_html__('Main Colors', 'flexity'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'color_content',
							'label' => esc_html__('Content Color', 'flexity'),
							'description' => 'Default Color - #4e4e4e',
							'format' => 'HEX',
							'default' => '#4e4e4e',
						),
						array(
							'type' => 'color',
							'name' => 'color_heading',
							'label' => esc_html__('Headings Color', 'flexity'),
							'description' => 'Default Color - #17161a',
							'format' => 'HEX',
							'default' => '#17161a',
						),
						array(
							'type' => 'color',
							'name' => 'color_primary',
							'label' => esc_html__('Primary Color', 'flexity'),
							'description' => 'Default Color - #3252fd',
							'format' => 'HEX',
							'default' => '#3252fd',
						),
						array(
							'type' => 'color',
							'name' => 'color_body',
							'label' => esc_html__('Body Background', 'flexity'),
							'description' => 'Default Color - #f0f3f9',
							'format' => 'HEX',
							'default' => '#f0f3f9',
						),
						array(
							'type' => 'color',
							'name' => 'color_border',
							'label' => esc_html__('Border Color', 'flexity'),
							'description' => 'Default Color - #dde0e5',
							'format' => 'HEX',
							'default' => '#dde0e5',
						),
						array(
							'type' => 'color',
							'name' => 'color_header',
							'label' => esc_html__('Header Background Color', 'flexity'),
							'description' => 'Default Color - #ffffff',
							'format' => 'HEX',
							'default' => '#ffffff',
						),
						array(
							'type' => 'color',
							'name' => 'color_footer',
							'label' => esc_html__('Footer Background Color', 'flexity'),
							'description' => 'Default Color - #ffffff',
							'format' => 'HEX',
							'default' => '#ffffff',
						),
						array(
							'type' => 'color',
							'name' => 'color_copyright',
							'label' => esc_html__('Copyright Background Color', 'flexity'),
							'description' => 'Default Color - #f0f3f9',
							'format' => 'HEX',
							'default' => '#f0f3f9',
						),
					),
				),
			),
		),
		array(
			'title' => __('Typography', 'flexity'),
			'name' => 'flexity_typography',
			'icon' => 'font-awesome:fa-font',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Content Font', 'flexity'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'text_font_preview',
							'binding' => array(
								'field'    => 'content_font_name,content_font_style,content_font_weight,content_font_size,content_line_height',
								'function' => 'flexity_font_preview',
							),
						),
						array(
							'type' => 'select',
							'name' => 'content_font_name',
							'label' => __('Content Font Name', 'flexity'),
							'description' => __('click "x" to return the default', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => 'Montserrat',
						),
						array(
							'type'    => 'slider',
							'name'    => 'content_font_size',
							'label'   => __('Content Font Size (px)', 'flexity'),
							'min'     => '0',
							'max'     => '80',
							'default' => '15',
						),
						array(
							'type'    => 'slider',
							'name'    => 'content_line_height',
							'label'   => __('Content Line Height (px)', 'flexity'),
							'min'     => '0',
							'max'     => '100',
							'default' => '25',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'content_font_style',
							'label' => __('Content Font Style', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'content_font_name',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => 'normal',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'content_font_weight',
							'label' => __('Content Font Weight', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'content_font_name',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
							'default' => 'normal',
						),
						array(
							'type' => 'multiselect',
							'name' => 'content_font_subset',
							'label' => __('Content Font Subset', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'content_font_name',
										'value' => 'vp_get_gwf_subset',
									),
								),
							),
							'default' => 'latin'
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('H1 Heading Font', 'flexity'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'h1_font_preview',
							'binding' => array(
								'field'    => 'h1_font_name,h1_font_style,h1_font_weight,h1_font_transform,h1_font_size,h1_line_height',
								'function' => 'flexity_font_preview_transform',
							),
						),
						array(
							'type' => 'select',
							'name' => 'h1_font_name',
							'label' => __('H1 Font Name', 'flexity'),
							'description' => __('click "x" to return the default', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => 'Montserrat',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h1_font_size',
							'label'   => __('H1 Font Size (px)', 'flexity'),
							'min'     => '0',
							'max'     => '80',
							'default' => '35',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h1_line_height',
							'label'   => __('H1 Line Height (px)', 'flexity'),
							'min'     => '0',
							'max'     => '100',
							'default' => '45',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'h1_font_style',
							'label' => __('H1 Font Style', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h1_font_name',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => 'normal',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'h1_font_weight',
							'label' => __('H1 Font Weight', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h1_font_name',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
							'default' => '700',
						),
						array(
							'type' => 'select',
							'name' => 'h1_font_transform',
							'label' => __('H1 Text Transform', 'flexity'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('None', 'flexity'),
								),
								array(
									'value' => 'uppercase',
									'label' => __('Uppercase', 'flexity'),
								),
								array(
									'value' => 'lowercase',
									'label' => __('Lowercase', 'flexity'),
								),
								array(
									'value' => 'capitalize',
									'label' => __('Capitalize', 'flexity'),
								),
							),
							'default' => 'none',
						),
						array(
							'type' => 'multiselect',
							'name' => 'h1_font_subset',
							'label' => __('H1 Font Subset', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h1_font_name',
										'value' => 'vp_get_gwf_subset',
									),
								),
							),
							'default' => 'latin'
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('H2 Heading Font', 'flexity'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'h2_font_preview',
							'binding' => array(
								'field'    => 'h2_font_name,h2_font_style,h2_font_weight,h2_font_transform,h2_font_size,h2_line_height',
								'function' => 'flexity_font_preview_transform',
							),
						),
						array(
							'type' => 'select',
							'name' => 'h2_font_name',
							'label' => __('H2 Font Name', 'flexity'),
							'description' => __('click "x" to return the default', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => 'Montserrat',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h2_font_size',
							'label'   => __('H2 Font Size (px)', 'flexity'),
							'min'     => '0',
							'max'     => '80',
							'default' => '25',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h2_line_height',
							'label'   => __('H2 Line Height (px)', 'flexity'),
							'min'     => '0',
							'max'     => '100',
							'default' => '35',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'h2_font_style',
							'label' => __('H2 Font Style', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h2_font_name',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => 'normal',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'h2_font_weight',
							'label' => __('H2 Font Weight', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h2_font_name',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
							'default' => '700',
						),
						array(
							'type' => 'select',
							'name' => 'h2_font_transform',
							'label' => __('H2 Text Transform', 'flexity'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('None', 'flexity'),
								),
								array(
									'value' => 'uppercase',
									'label' => __('Uppercase', 'flexity'),
								),
								array(
									'value' => 'lowercase',
									'label' => __('Lowercase', 'flexity'),
								),
								array(
									'value' => 'capitalize',
									'label' => __('Capitalize', 'flexity'),
								),
							),
							'default' => 'none',
						),
						array(
							'type' => 'multiselect',
							'name' => 'h2_font_subset',
							'label' => __('H2 Font Subset', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h2_font_name',
										'value' => 'vp_get_gwf_subset',
									),
								),
							),
							'default' => 'latin'
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('H3 Heading Font', 'flexity'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'h3_font_preview',
							'binding' => array(
								'field'    => 'h3_font_name,h3_font_style,h3_font_weight,h3_font_transform,h3_font_size,h3_line_height',
								'function' => 'flexity_font_preview_transform',
							),
						),
						array(
							'type' => 'select',
							'name' => 'h3_font_name',
							'label' => __('H3 Font Name', 'flexity'),
							'description' => __('click "x" to return the default', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => 'Montserrat',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h3_font_size',
							'label'   => __('H3 Font Size (px)', 'flexity'),
							'min'     => '0',
							'max'     => '80',
							'default' => '20',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h3_line_height',
							'label'   => __('H3 Line Height (px)', 'flexity'),
							'min'     => '0',
							'max'     => '100',
							'default' => '30',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'h3_font_style',
							'label' => __('H3 Font Style', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h3_font_name',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => 'normal',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'h3_font_weight',
							'label' => __('H3 Font Weight', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h3_font_name',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
							'default' => '700',
						),
						array(
							'type' => 'select',
							'name' => 'h3_font_transform',
							'label' => __('H3 Text Transform', 'flexity'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('None', 'flexity'),
								),
								array(
									'value' => 'uppercase',
									'label' => __('Uppercase', 'flexity'),
								),
								array(
									'value' => 'lowercase',
									'label' => __('Lowercase', 'flexity'),
								),
								array(
									'value' => 'capitalize',
									'label' => __('Capitalize', 'flexity'),
								),
							),
							'default' => 'uppercase',
						),
						array(
							'type' => 'multiselect',
							'name' => 'h3_font_subset',
							'label' => __('H3 Font Subset', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h3_font_name',
										'value' => 'vp_get_gwf_subset',
									),
								),
							),
							'default' => 'latin'
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('H4 Heading Font', 'flexity'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'h4_font_preview',
							'binding' => array(
								'field'    => 'h4_font_name,h4_font_style,h4_font_weight,h4_font_transform,h4_font_size,h4_line_height',
								'function' => 'flexity_font_preview_transform',
							),
						),
						array(
							'type' => 'select',
							'name' => 'h4_font_name',
							'label' => __('H4 Font Name', 'flexity'),
							'description' => __('click "x" to return the default', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => 'Montserrat',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h4_font_size',
							'label'   => __('H4 Font Size (px)', 'flexity'),
							'min'     => '0',
							'max'     => '80',
							'default' => '20',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h4_line_height',
							'label'   => __('H4 Line Height (px)', 'flexity'),
							'min'     => '0',
							'max'     => '100',
							'default' => '30',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'h4_font_style',
							'label' => __('H4 Font Style', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h4_font_name',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => 'normal',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'h4_font_weight',
							'label' => __('H4 Font Weight', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h4_font_name',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
							'default' => '700',
						),
						array(
							'type' => 'select',
							'name' => 'h4_font_transform',
							'label' => __('H4 Text Transform', 'flexity'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('None', 'flexity'),
								),
								array(
									'value' => 'uppercase',
									'label' => __('Uppercase', 'flexity'),
								),
								array(
									'value' => 'lowercase',
									'label' => __('Lowercase', 'flexity'),
								),
								array(
									'value' => 'capitalize',
									'label' => __('Capitalize', 'flexity'),
								),
							),
							'default' => 'none',
						),
						array(
							'type' => 'multiselect',
							'name' => 'h4_font_subset',
							'label' => __('H4 Font Subset', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h4_font_name',
										'value' => 'vp_get_gwf_subset',
									),
								),
							),
							'default' => 'latin'
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('H5 Heading Font', 'flexity'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'h5_font_preview',
							'binding' => array(
								'field'    => 'h5_font_name,h5_font_style,h5_font_weight,h5_font_transform,h5_font_size,h5_line_height',
								'function' => 'flexity_font_preview_transform',
							),
						),
						array(
							'type' => 'select',
							'name' => 'h5_font_name',
							'label' => __('H5 Font Name', 'flexity'),
							'description' => __('click "x" to return the default', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => 'Montserrat',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h5_font_size',
							'label'   => __('H5 Font Size (px)', 'flexity'),
							'min'     => '0',
							'max'     => '80',
							'default' => '14',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h5_line_height',
							'label'   => __('H5 Line Height (px)', 'flexity'),
							'min'     => '0',
							'max'     => '100',
							'default' => '25',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'h5_font_style',
							'label' => __('H5 Font Style', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h5_font_name',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => 'normal',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'h5_font_weight',
							'label' => __('H5 Font Weight', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h5_font_name',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
							'default' => '700',
						),
						array(
							'type' => 'select',
							'name' => 'h5_font_transform',
							'label' => __('H5 Text Transform', 'flexity'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('None', 'flexity'),
								),
								array(
									'value' => 'uppercase',
									'label' => __('Uppercase', 'flexity'),
								),
								array(
									'value' => 'lowercase',
									'label' => __('Lowercase', 'flexity'),
								),
								array(
									'value' => 'capitalize',
									'label' => __('Capitalize', 'flexity'),
								),
							),
							'default' => 'uppercase',
						),
						array(
							'type' => 'multiselect',
							'name' => 'h5_font_subset',
							'label' => __('H5 Font Subset', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h5_font_name',
										'value' => 'vp_get_gwf_subset',
									),
								),
							),
							'default' => 'latin'
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('H6 Heading Font', 'flexity'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'h6_font_preview',
							'binding' => array(
								'field'    => 'h6_font_name,h6_font_style,h6_font_weight,h6_font_transform,h6_font_size,h6_line_height',
								'function' => 'flexity_font_preview_transform',
							),
						),
						array(
							'type' => 'select',
							'name' => 'h6_font_name',
							'label' => __('H6 Font Name', 'flexity'),
							'description' => __('click "x" to return the default', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => 'Montserrat',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h6_font_size',
							'label'   => __('H6 Font Size (px)', 'flexity'),
							'min'     => '0',
							'max'     => '80',
							'default' => '12',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h6_line_height',
							'label'   => __('H6 Line Height (px)', 'flexity'),
							'min'     => '0',
							'max'     => '100',
							'default' => '35',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'h6_font_style',
							'label' => __('H6 Font Style', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h6_font_name',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => 'normal',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'h6_font_weight',
							'label' => __('H6 Font Weight', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h6_font_name',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
							'default' => '500',
						),
						array(
							'type' => 'select',
							'name' => 'h6_font_transform',
							'label' => __('H6 Text Transform', 'flexity'),
							'items' => array(
								array(
									'value' => 'none',
									'label' => __('None', 'flexity'),
								),
								array(
									'value' => 'uppercase',
									'label' => __('Uppercase', 'flexity'),
								),
								array(
									'value' => 'lowercase',
									'label' => __('Lowercase', 'flexity'),
								),
								array(
									'value' => 'capitalize',
									'label' => __('Capitalize', 'flexity'),
								),
							),
							'default' => 'uppercase',
						),
						array(
							'type' => 'multiselect',
							'name' => 'h6_font_subset',
							'label' => __('H6 Font Subset', 'flexity'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h6_font_name',
										'value' => 'vp_get_gwf_subset',
									),
								),
							),
							'default' => 'latin'
						),
					),
				),
			),
		),

	)
);

/**
 *EOF
 */