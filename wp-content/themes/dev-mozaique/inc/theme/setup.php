<?php

/**
 * Theme setup.
 */

if (!function_exists('apwp_setup')){
    function apwp_setup(){

        add_theme_support('title-tag');

        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');

        add_theme_support('align-wide');
        add_theme_support('wp-block-styles');

        add_theme_support('editor-styles');
        add_editor_style('dist/css/editor-style.css');

        // Define menus
        require_once get_template_directory() . '/inc/theme/setup-menus.php';

        // Define custom image sizes
        // require_once get_template_directory() . '/inc/theme/setup-imagesizes.php';

    }
}
add_action('after_setup_theme', 'apwp_setup');


/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function apwp_asset($path)
{
    if (wp_get_environment_type() === 'production') {
        return get_stylesheet_directory_uri() . '/' . $path;
    }

    return add_query_arg('time', time(),  get_stylesheet_directory_uri() . '/' . $path);
}


/**
 * DISABLE EMOJIS
 */
add_action('init', 'apwp_disable_emojis');           // https://wordpress.stackexchange.com/q/185577/
function apwp_disable_emojis()
{
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
    add_filter('emoji_svg_url', '__return_false');

    function disable_emojicons_tinymce($plugins)
    {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        } else {
            return array();
        }
    }
}


/**
 * Remove WordPress Version Number
 */
add_filter('the_generator', '__return_empty_string');


/**
 * Enable excerpt for page
 */

add_post_type_support('page', 'excerpt');


/**
 * Register new image sizes
 */

// if (!function_exists('apwp_custom_image_sizes')) {
//     function apwp_custom_image_sizes($size_names)
//     {
//         $new_sizes = array(
//             'slide-image' => 'Slide Image'
//         );
//         return array_merge($size_names, $new_sizes);
//     }
// }
// add_filter('image_size_names_choose', 'apwp_custom_image_sizes');


/**
 * Enable extra uploads to media library
 */

if (!function_exists('apwp_enable_upload_to_media')) {
    function apwp_enable_upload_to_media($mimes = array())
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
}
add_filter('upload_mimes', 'apwp_enable_upload_to_media');

/**
 * RETURN URL OF THE CUSTOM LOGO
 */
function apwp_get_custom_logo_url()
{
    $custom_logo_id = get_theme_mod('custom_logo');
    $image = wp_get_attachment_image_src($custom_logo_id, 'full');
    return $image[0];
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function apwp_nav_menu_add_li_class($classes, $item, $args, $depth)
{
    if (isset($args->li_class)) {
        $classes[] = $args->li_class;
    }

    if (isset($args->{"li_class_$depth"})) {
        $classes[] = $args->{"li_class_$depth"};
    }

    return $classes;
}

add_filter('nav_menu_css_class', 'apwp_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function apwp_nav_menu_add_submenu_class($classes, $args, $depth)
{
    if (isset($args->submenu_class)) {
        $classes[] = $args->submenu_class;
    }

    if (isset($args->{"submenu_class_$depth"})) {
        $classes[] = $args->{"submenu_class_$depth"};
    }

    return $classes;
}

add_filter('nav_menu_submenu_css_class', 'apwp_nav_menu_add_submenu_class', 10, 3);


/**
 * Clear up the WP archives title
 */
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('<span class="text-inherit">Category: </span>', false);
    } elseif (is_tag()) {
        $title = single_tag_title('<span class="text-inherit">Tag: </span>', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }

    return $title;
});
