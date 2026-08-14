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
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z3CNGJDEE3"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-Z3CNGJDEE3');
	</script>
	
<!-- 			<script>
						!function(t,e){var o,n,p,r;e.__SV||(window.posthog=e,e._i=[],e.init=function(i,s,a){function g(t,e){var o=e.split(".");2==o.length&&(t=t[o[0]],e=o[1]),t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}}(p=t.createElement("script")).type="text/javascript",p.async=!0,p.src=s.api_host.replace(".i.posthog.com","-assets.i.posthog.com")+"/static/array.js",(r=t.getElementsByTagName("script")[0]).parentNode.insertBefore(p,r);var u=e;for(void 0!==a?u=e[a]=[]:a="posthog",u.people=u.people||[],u.toString=function(t){var e="posthog";return"posthog"!==a&&(e+="."+a),t||(e+=" (stub)"),e},u.people.toString=function(){return u.toString(1)+".people (stub)"},o="init capture register register_once register_for_session unregister opt_out_capturing has_opted_out_capturing opt_in_capturing reset isFeatureEnabled getFeatureFlag getFeatureFlagPayload reloadFeatureFlags group identify setPersonProperties setPersonPropertiesForFlags resetPersonPropertiesForFlags setGroupPropertiesForFlags resetGroupPropertiesForFlags resetGroups onFeatureFlags addFeatureFlagsHandler onSessionId getSurveys getActiveMatchingSurveys renderSurvey canRenderSurvey getNextSurveyStep".split(" "),n=0;n<o.length;n++)g(u,o[n]);e._i.push([i,s,a])},e.__SV=1)}(document,window.posthog||[]);
						posthog.init('phc_vHxCQwXvX4hVkhYpxchF4HKSdwWYshvml7SEynZ9h6d', {
							api_host: 'https://eu.i.posthog.com',
							defaults: '2026-01-30'
			})
		</script> -->
    <script src="https://script.supademo.com/supademo.js"></script>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?> id="top">

<?php do_action( 'apwp_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'apwp_header' ); ?>

    <header id="site-header" class="z-50" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
		
		
		
		        <div class="container">

            <div class="relative lg:flex  lg:items-center py-8">

                <!-- Nav - contains logo on mobile -->
                <nav class="site-nav hidden lg:block lg:w-full">

                    <!-- Logo + burger row - visible inside menu on mobile -->
                    <div class=" flex justify-between !items-center mb-8 lg:hidden">
                        <?php if (has_custom_logo()) { ?>
                            <div class="max-w-48 md:max-w-56 header-logo">
                                <?php the_custom_logo(); ?>
                            </div>
                        <?php } else { ?>
                            <a href="<?php echo get_bloginfo('url'); ?>" class="font-extrabold text-lg uppercase">
                                <?php echo get_bloginfo('name'); ?>
                            </a>
                        <?php } ?>
                        <button aria-label="Toggle navigation" id="primary-menu-toggle" class="relative z-[60] w-6 h-6">
                            <span class="burger-line top-0"></span>
                            <span class="burger-line top-[7px]"></span>
                            <span class="burger-line top-[14px]"></span>
                        </button>
                    </div>

                    <!-- Logo desktop only -->
                <div class="hidden lg:flex items-center lg:absolute h-full  lg:top-0 lg:left-0">
                    <?php if (has_custom_logo()) { ?>
                        <div class="lg:w-48 xl:w-56 header-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php } ?>
                </div>

                    <?php wp_nav_menu(array(
                        'container_id'    => 'primary-menu',
                        'container_class' => 'primary-menu',
                        'menu_class'      => 'menu',
                        'theme_location'  => 'primary',
                        'fallback_cb'     => false,
                        'walker'          => new Products_Menu_Walker(),
                    )); ?>
                </nav>

                <!-- Burger mobile only - outside nav so it shows before menu opens -->
                <div class="site-logo-outer flex justify-between items-center lg:hidden">
                    <div class="max-w-48">
                        <?php the_custom_logo(); ?>
                    </div>
                    <button aria-label="Toggle navigation" id="primary-menu-toggle" class="relative z-[60] w-6 h-6">
                        <span class="burger-line top-0"></span>
                        <span class="burger-line top-[7px]"></span>
                        <span class="burger-line top-[14px]"></span>
                    </button>
                </div>

            </div>

    </header>


	<div id="content" class="site-content flex-grow">

		<?php do_action( 'apwp_content_start' ); ?>

		<main>

