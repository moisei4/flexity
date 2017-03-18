<?php
return array(
	'id' => 'flexity_meta_gallery',
	'types' => array('flexity_gallery'),
	'title' => esc_html__('Gallery Fields', 'flexity'),
	'priority' => 'high',
	'template' => array(
		array(
			'type' => 'textbox',
			'label' => esc_html__('Video Link', 'flexity'),
			'description' => esc_html__('If you need modal video, you can paste a video URL from Youtube', 'flexity'),
			'name' => 'gallery_video_link',
		),
	),
);
?>