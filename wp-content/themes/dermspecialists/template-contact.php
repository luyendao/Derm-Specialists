<?php
/*
* Template Name: Contact
*/
get_header();

	the_post(); ?>
	<div class="container contact-us-container">
		<div class="content">
			<?php derms_page_title();

			derms_content_edit(); ?>
		</div>
		<!-- end of content -->

		<?php $image = carbon_get_the_post_meta('contact_side_image');

		if(!empty($image)) : ?>
			<div class="img-holder">
				<img src="<?php echo derms_get_thumb_url($image, 481, 298); ?>" alt="" />
			</div>
			<!-- end of img-holder -->
		<?php endif; ?>

		<div class="cl">&nbsp;</div>
	</div>
	<!-- end of container -->
<?php get_footer();