<?php

Carbon_Container::factory('custom_fields', 'Home page settings')
	->show_on_template('template-home.php')
	->show_on_post_type('page')
	->add_fields(array(
		Carbon_Field::factory('image', 'page_side_image', 'Side image')
			->help_text('Recommended image dimensions - 401 x 403 pixels.'),
		Carbon_Field::factory('rich_text', 'page_side_text', 'Side text')
			->help_text('Located over the image.'),
	));

Carbon_Container::factory('custom_fields', 'Contact page settings')
	->show_on_template('template-contact.php')
	->show_on_post_type('page')
	->add_fields(array(
		Carbon_Field::factory('image', 'contact_side_image', 'Side image')
			->help_text('Recommended image dimensions - 481 x 298 pixels.'),
	));

Carbon_Container::factory('custom_fields', 'Insurance page settings')
	->show_on_template('template-side_image.php')
	->show_on_post_type('page')
	->add_fields(array(
		Carbon_Field::factory('image', 'insurance_side_image', 'Side image')
			->help_text('Recommended image dimensions - 360 pixels in width.'),
	));

Carbon_Container::factory('custom_fields', 'Gallery page settings')
	->show_on_template('template-gallery.php')
	->show_on_post_type('page')
	->add_fields(array(
		Carbon_Field::factory('complex', 'page_images', 'Gallery')
			->set_layout('table')
			->add_fields(array(
				Carbon_Field::factory('image', 'image', 'Image')
					->set_required(true)
					->help_text('Recommended image dimensions:<br/> 598 x 400 pixels.'),
				Carbon_Field::factory('text', 'title', 'Title')
					->set_required(true),
			)),
	));

Carbon_Container::factory('custom_fields', 'Patient forms page settings')
	->show_on_template('template-patient_forms.php')
	->show_on_post_type('page')
	->add_fields(array(
		Carbon_Field::factory('text', 'patient_forms_title', 'Title for links'),
		Carbon_Field::factory('complex', 'patient_forms', 'Links')
			->set_layout('table')
			->add_fields(array(
				Carbon_Field::factory('file', 'link', 'PDF file')
					->set_required(true),
				Carbon_Field::factory('text', 'title', 'Title')
					->set_required(true),
			)),
		Carbon_Field::factory('text', 'latest_adobe_link', 'Link to latest version of adobe'),
	));

Carbon_Container::factory('custom_fields', 'Make payment page settings')
	->show_on_template('template-make_payment.php')
	->show_on_post_type('page')
	->add_fields(array(
		Carbon_Field::factory('select', 'payment_form', 'Payment form')
			->set_options(derms_get_forms()),
	));