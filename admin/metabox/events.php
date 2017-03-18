<?php
return array(
	'id' => 'flexity_meta_events',
	'types' => array('events'),
	'title' => esc_html__('Date', 'flexity'),
	'priority' => 'high',
	'template' => array(
		array(
			'type' => 'date',
			'label' => esc_html__('Date', 'flexity'),
			'format' => 'yy-mm-dd',
			'name' => 'events_date',
		),
	),
);
?>