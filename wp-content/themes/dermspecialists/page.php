<?php get_header();

	the_post(); ?>
	<div class="container default-page">
		<div class="content">
			<div <?php post_class('post'); ?>>
				<?php derms_page_title(); ?>
				<div class="entry">
					<?php derms_content_edit(); ?>
				</div>
			</div>
		</div>
		<!-- end of content -->
		<div class="cl">&nbsp;</div>
	</div>
<?php get_footer(); ?>