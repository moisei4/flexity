<?php
return array(
	'id' => 'flexity_meta_product',
	'types' => array('product'),
	'title' => esc_html__('Product Fields', 'flexity'),
	'priority' => 'high',
	'template' => array(
		array(
			'type' => 'wpeditor',
			'label' => esc_html__('Product Description', 'flexity'),
			'description' => esc_html__('Please use this text editor to the product description tab. Another editor you can use for adding Visual Composer shortcodes to the product page', 'flexity'),
			'name' => 'product_description',
		),
		array(
			'type' => 'textbox',
			'label' => esc_html__('Shipping', 'flexity'),
			'name' => 'product_shipping',
		),
	),
);
?>