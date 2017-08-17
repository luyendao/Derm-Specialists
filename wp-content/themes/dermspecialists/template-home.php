<?php
/*
* Template Name: Home
*/
get_header();

	the_post(); ?>
	<div class="container welcome-container">
		<div class="content">
			<?php derms_content_edit(); ?>
		</div>
		<!-- end of content -->

		<?php $side_text = carbon_get_the_post_meta('page_side_text');

		if(!empty($side_text)) :

			$side_image = carbon_get_the_post_meta('page_side_image');

			$style = '';
			if(!empty($side_image)) {
				$style = ' style="background-image: url(' . derms_get_thumb_url($side_image, 401, 403) . ');"';
			} ?>
			<div class="our-mission"<?php echo $style; ?>>
				<?php echo wpautop($side_text); ?>
			</div>
			<!-- end of our-mission -->
		<?php endif; ?>

		<div class="cl">&nbsp;</div>
	</div>
	<!-- end of container -->
<?php get_footer(); ?>