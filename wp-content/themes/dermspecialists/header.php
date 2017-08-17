<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

		<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
		<div id="wrapper">
			<div class="shell">
				<div id="header">
					<div class="header-top">
						<?php $sitename = esc_attr(get_bloginfo('name')); ?>
						<h1 id="logo"><a href="<?php echo home_url('/'); ?>" title="<?php echo $sitename; ?>"><?php echo $sitename; ?></a></h1>

						<div class="cl">&nbsp;</div>

						<?php $header_text = carbon_get_theme_option('derms_header_text');

						if(!empty($header_text)) : ?>
							<div class="contacts">
								<?php echo wpautop($header_text); ?>
							</div>
							<!-- end of contacts -->
						<?php endif; ?>

						<div class="cl">&nbsp;</div>
					</div>
					<!-- end of header-top -->

					<div id="navigation">
						<?php wp_nav_menu( array(
							'theme_location'  => 'main-menu',
							'container'       => '', 
							'container_class' => '', 
							'menu_class'      => '', 
							'fallback_cb'     => '',
						)); ?>
					</div>
					<!-- end of navigation -->

                                        <img width="970" src="http://www.derm-specialists.com/wp-content/uploads/2017/06/dermspec-banner.jpg" alt="Dermatologists of Kentucky" />
                                        
					<div class="cl">&nbsp;</div>
				</div>
				<!-- end of header -->
