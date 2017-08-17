<?php get_header(); ?>
	<div class="container default-page">
		<div class="content">
			<?php if (have_posts()) :

				while (have_posts()) : the_post(); ?>
					<div <?php post_class() ?>>
						<?php derms_page_title(); ?>
						<div class="entry">
							<?php the_content(); ?>
							
							<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
							
							<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
							
							<p class="postmetadata alt">
								<small>
									This entry was posted
									on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
									and is filed under <?php the_category(', ') ?>.
									You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

									<?php if ( comments_open() && pings_open() ) { ?>
										You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.
									<?php } elseif ( !comments_open() && pings_open() ) { ?>
										Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.
									<?php } elseif ( comments_open() && !pings_open() ) { ?>
										You can skip to the end and leave a response. Pinging is currently not allowed.
									<?php } elseif ( !comments_open() && !pings_open() ) { ?>
										Both comments and pings are currently closed.
									<?php } ?>
								</small>
							</p><!-- /p.postmetadata -->
						</div><!-- /div.entry -->
					</div> <!-- /div.post -->

					<div class="comments-holder">
						<?php comments_template(); ?>
					</div>
				<?php endwhile;

			endif; ?>
		</div>
		<!-- end of content -->
		<div class="cl">&nbsp;</div>
	</div>
<?php get_footer(); ?>