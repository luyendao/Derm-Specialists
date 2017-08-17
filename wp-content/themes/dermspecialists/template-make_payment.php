<?php
/*
* Template Name: Make Payment
*/
get_header();

	the_post(); ?>
	<div class="container">
		<?php derms_page_title();

		if(function_exists('gravity_form')) :

			$payment_form = carbon_get_the_post_meta('payment_form');

			if(!empty($payment_form)) : ?>
				<div class="payment-form">
					<?php gravity_form(str_replace('form_', '', $payment_form), false, false); ?>
				</div>
				<!-- end of payment-form -->
			<?php endif;

		endif; ?>
	</div>
	<!-- end of container -->
<?php get_footer(); ?>