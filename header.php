<?php /*

Santa Cruz Theme
-----------

header.php

Header template file

*/ ?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="<?php bloginfo('charset'); ?>" />

		<?php /*<title><?php (wp_title('', false) != '') ? wp_title('&#8226;', true, 'right') : ''; ?><?php bloginfo('name'); ?></title>*/ // WP Managed ?>

		<!-- Meta -->
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#73dbbe">

		<!-- Links -->
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<!-- Stylesheets -->
		<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<?php
		// Stylesheets
		wp_enqueue_style('phosphate', get_template_directory_uri() . '/assets/fonts/phosphate/stylesheet.css');
        wp_enqueue_style('wyatt', get_stylesheet_uri(), 'phosphate');

		// Javascript

		// pull in the jQuery
		wp_enqueue_script('jquery');
		// if (is_singular()) {
		// 	// pull in Nivo-gallery
		// 	wp_enqueue_script('nivo-lightbox', get_template_directory_uri() . '/lib/Nivo-Lightbox-1.1/nivo-lightbox.min.js', 'jquery', 1.0);
		// }
		// pull in the site js
		wp_enqueue_script('santacruz_js', get_template_directory_uri() . '/js/script.min.js', 'jquery', false);

		// comment script
		if (is_singular() && get_option('thread_comments')) :
			wp_enqueue_script('comment-reply');
		endif;
		?>

		<?php
		// Wordpress header content

		wp_head(); ?>

	</head>
	<body<?php echo (is_admin_bar_showing()) ? ' class="admin-bar"' : ''; ?>>
        <div class="page">
            <header class="header-site">
                <div class="liner">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-12 col-md">
                            <div class="row flex-column text-center">
                                <div class="col">
                                    <a href="<?php echo site_url(); ?>" class="branding-link"><?php santacruz_bullet_stylized(get_bloginfo('name')); ?></a>
                                </div>
                                <?php if (get_bloginfo('description') !== ''): ?>
                                <div class="col order-first">
                                    <span class="tagline"><?php bloginfo('description'); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-auto order-md-first">
                            <div class="menu-system">
                                <a role="button" class="bubble-link menu-trigger">
                                    <span><?php santacruz_icon('menu'); ?></span>
                                    <span><?php _e('Menu'); ?></span>
                                </a>
                                <div class="menu-container closed">
                                    <h2 class="assistive-text">Main menu</h2>
                                    <?php
										$menu_args = array(
											'theme_location' => 'primary',
											'container' => false,
											'menu_class' => 'menu',
										);
									?>
									<?php wp_nav_menu($menu_args); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto order-md-last">
                            <a role="button" class="bubble-link bubble-link--orange">
                                <span><?php santacruz_icon('rss'); ?></span>
                                <span>Get it</span>
                            </a>
                        </div>
                    </div>
                </div>
            </header>