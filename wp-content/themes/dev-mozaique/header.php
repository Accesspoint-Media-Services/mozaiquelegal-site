<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Unbounded:wght@200..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

	<?php wp_head(); ?>

    <script src="https://script.supademo.com/supademo.js"></script>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?> id="top">

<?php do_action( 'apwp_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'apwp_header' ); ?>

    <header id="site-header" class="z-50" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
        <div class="relative lg:flex lg:items-center py-8">
            
            <!-- Logo - positioned left -->
            <div class="flex justify-between items-center lg:absolute lg:left-0">
                <?php if (has_custom_logo()) { ?>
                    <div class="max-w-48 md:max-w-56 lg:w-40 lg:mt-2 items-center xl:w-56 header-logo relative z-[60]">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php } else { ?>
                    <a href="<?php echo get_bloginfo('url'); ?>" class="font-extrabold text-lg uppercase relative z-[60]">
                        <?php echo get_bloginfo('name'); ?>
                    </a>
                <?php } ?>

                <!-- Burger / X toggle -->
                <button aria-label="Toggle navigation" id="primary-menu-toggle" class="lg:hidden relative z-[60] w-6 h-6">
                    <span class="burger-line top-0"></span>
                    <span class="burger-line top-[7px]"></span>
                    <span class="burger-line top-[14px]"></span>
                </button>
            </div>

            <!-- Nav - takes full width, centers itself -->
            <nav class="site-nav hidden lg:block lg:w-full">
                <?php
                wp_nav_menu(
                    array(
                        'container_id'    => 'primary-menu',
                        'container_class' => 'primary-menu',
                        'menu_class'      => 'menu',
                        'theme_location'  => 'primary',
                        'li_class'        => '',
                        'fallback_cb'     => false,
                        'walker' => new Products_Menu_Walker(),
                    )
                );
                ?>
            </nav>
        </div>
    </header>


	<div id="content" class="site-content flex-grow">

		<?php do_action( 'apwp_content_start' ); ?>

		<main>


