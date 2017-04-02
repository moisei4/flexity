<?php

VP_Security::instance()->whitelist_function('flexity_is_category');

function flexity_is_category($value)
{
	if($value === 'category')
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('flexity_is_link');

function flexity_is_link($value)
{
	if($value === 'custom_link')
		return true;
	return false;
}


VP_Security::instance()->whitelist_function('flexity_font_preview');
function flexity_font_preview($face, $style, $weight, $size, $height)
{
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face, $style, $weight);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="padding: 0 10px 0 10px; font-family: $face; font-style: $style; font-weight: $weight; font-size: {$size}px; line-height: {$height}px;">
	Grumpy wizards make toxic brew for the evil Queen and Jack
</p>
EOD;
	return $dom;
}


VP_Security::instance()->whitelist_function('flexity_font_preview_transform');
function flexity_font_preview_transform($face, $style, $weight, $transform, $size, $height)
{
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face, $style, $weight);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="padding: 0 10px 0 10px; font-family: $face; font-style: $style; font-weight: $weight; text-transform: {$transform}; font-size: {$size}px; line-height: {$height}px;">
	Grumpy wizards make toxic brew for the evil Queen and Jack
</p>
EOD;
	return $dom;
}
