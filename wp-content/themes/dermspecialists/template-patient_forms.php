<?php
/*
* Template Name: Patient Forms
*/
get_header();

	the_post(); ?>
	<div class="container patient-forms-container">
		<div class="content">
			<?php derms_page_title();

			derms_content_edit(); ?>
		</div>
		<!-- end of content -->

		<?php $forms = carbon_get_the_post_meta('patient_forms', 'complex');

		if(!empty($forms)) :

			$title = carbon_get_the_post_meta('patient_forms_title'); ?>
			
			<div id="sidebar">
				<ul>
					<li class="widget">
						<?php if(!empty($title)) : ?>
							<h5 class="widgettitle"><?php echo esc_attr($title); ?></h5>
						<?php endif; ?>
						
						<ul>
							<?php foreach($forms as $link) : ?>
								<li><a href="<?php echo esc_url($link['link']); ?>" target="_blank" title="<?php echo $link['title']; ?>"><?php echo $link['title']; ?></a></li>
							<?php endforeach; ?>
						</ul>

						<?php $latest_adobe_link = carbon_get_the_post_meta('latest_adobe_link');

						if(!empty($latest_adobe_link)) : ?>
							<div class="adobe-reader-download">
								<a href="<?php echo esc_url($latest_adobe_link); ?>" class="adobe-reader-ico" target="_blank"></a>
								<p><a href="<?php echo esc_url($latest_adobe_link); ?>" target="_blank">Click here</a> to download the latest version of Adobe Reader</p>

								<div class="cl">&nbsp;</div>
							</div>
						<?php endif; ?>
					</li>
				</ul>
			</div>
			<!-- end of sidebar -->
		<?php endif; ?>

		<div class="cl">&nbsp;</div>
	</div>
	<!-- end of container -->
<?php get_footer(); ?>