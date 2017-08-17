<?php
/*
* Template Name: Gallery
*/
get_header();

	the_post(); ?>
	<div class="container">
		<?php derms_page_title();

		$page_images = carbon_get_the_post_meta('page_images', 'complex');

		if(!empty($page_images)) : ?>
			<div class="gallery">
				<div class="main-img flexslider">
					<ul class="slides">
						<?php foreach($page_images as $entry) :  ?>
							<li><img src="<?php echo derms_get_thumb_url($entry['image'], 598, 400); ?>" alt="" /><?php echo $entry['title']; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="thumbs">
					<p>click to enlarge</p>
					
					<ul>
						<?php foreach($page_images as $entry) : ?>
							<li><img src="<?php echo derms_get_thumb_url($entry['image'], 149, 100); ?>" alt="" /></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="cl">&nbsp;</div>
			</div>
			<!-- end of gallery -->
		<?php endif; ?>
	</div>
	<!-- end of container -->
<?php get_footer(); ?>