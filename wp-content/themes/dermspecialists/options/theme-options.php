<?php

$header_fields = array(
	Carbon_Field::factory('separator', 'header_fields', 'Header'),
	Carbon_Field::factory('rich_text', 'derms_header_text', 'Text'),
	Carbon_Field::factory('complex', 'derms_slider', 'Slider')
		->add_fields(array(
			Carbon_Field::factory('image', 'image', 'Image')
				->help_text('Recommended image dimensions - 311 x 160 pixels.'),
		)),
		Carbon_Field::factory('image', 'header_image_one', 'First image')
			->help_text('Recommended image dimensions - 212 x 160 pixels.'),
		Carbon_Field::factory('image', 'header_image_two', 'Second image')
			->help_text('Recommended image dimensions - 201 x 160 pixels.'),
		Carbon_Field::factory('image', 'header_image_three', 'Third image')
			->help_text('Recommended image dimensions - 195 x 160 pixels.'),
);

$script_fields = array(
	Carbon_Field::factory('separator', 'script_fields', 'Scripts'),
	Carbon_Field::factory('header_scripts', 'header_script', 'Header script'),
	Carbon_Field::factory('footer_scripts', 'footer_script', 'Footer script'),
);

$carbon_fields = array_merge($header_fields, $script_fields);

Carbon_Container::factory('theme_options', 'Theme Options')
	->add_fields($carbon_fields);