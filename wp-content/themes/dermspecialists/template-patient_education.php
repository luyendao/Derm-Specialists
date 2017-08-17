<?php
/*
* Template Name: Patient Education
*/
get_header();

	the_post(); ?>
	<div class="container">
		<?php derms_page_title();

		derms_content_edit(); ?>
	</div>
	<!-- end of container -->
<?php get_footer(); ?>