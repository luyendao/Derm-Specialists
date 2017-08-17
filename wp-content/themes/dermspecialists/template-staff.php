<?php
/*
* Template Name: Staff
*/
get_header();

	the_post(); ?>
	<div class="container">
		<?php derms_page_title(); ?>

		<?php $args = array(
			'post_type' => 'derms_member',
			'posts_per_page' => -1,
		);

		query_posts($args);

		if(have_posts()) : ?>
			<div class="members">
				<?php while(have_posts()) : the_post(); ?>
					<div class="member">
						<?php if(has_post_thumbnail()) : ?>
							<div class="member-img">
								<?php the_post_thumbnail('member-listing'); ?>
							</div>
						<?php endif; ?>

						<div class="member-cnt">
							<h6><?php the_title(); ?></h6>
							<?php derms_content_edit(); ?>
						</div>

						<div class="cl">&nbsp;</div>
					</div>
				<?php endwhile; ?>
			</div>
			<!-- end of members -->
		<?php endif;

		wp_reset_query(); ?>
	</div>
	<!-- end of container -->
<?php get_footer(); ?>