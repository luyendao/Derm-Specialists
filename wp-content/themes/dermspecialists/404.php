<?php get_header(); ?>
	<div class="container default-page">
		<div class="content">
			<div class="post">
				<?php derms_page_title(); ?>
				<div class="entry">
					<p><?php printf(__('Please check the URL for proper spelling and capitalization.<br/>If you\'re having trouble locating a destination, try visiting the <a href="%1$s">home page</a>.'), get_option('home')); ?></p>
				</div>
			</div>
		</div>
		<!-- end of content -->
		<div class="cl">&nbsp;</div>
	</div>
<?php get_footer(); ?>