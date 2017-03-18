<?php
return array(
	'id' => 'flexity_meta_blog',
	'types' => array('post'),
	'title' => esc_html__('Post Fields', 'flexity'),
	'priority' => 'high',
	'template' => array(
		array(
			'type' => 'textbox',
			'label' => esc_html__('Video Link', 'flexity'),
			'name' => 'blog_video',
		),
		array(
			'type' => 'textbox',
			'label' => esc_html__('Map latitude', 'flexity'),
			'name' => 'blog_map_ltd',
		),
		array(
			'type' => 'textbox',
			'label' => esc_html__('Map longitude', 'flexity'),
			'name' => 'blog_map_lgt',
		),
		array(
			'type' => 'slider',
			'label' => esc_html__('Map Zoom', 'flexity'),
			'name' => 'blog_mapzoom',
			'min' => '3',
			'max' => '21',
			'step' => '1',
			'default' => '15',
		),
		array(
			'type' => 'textbox',
			'label' => esc_html__('Map Address', 'flexity'),
			'name' => 'blog_map_address',
		),
		array(
			'type' => 'group',
			'title' => esc_html__('Slide', 'flexity'),
			'repeating' => true,
			'sortable'  => true,
			'name' => 'blog_slider',
			'fields' => array(
				array(
					'type' => 'upload',
					'label' => esc_html__('Image', 'flexity'),
					'name' => 'img',
				),
			),
		),
	),
);
?>