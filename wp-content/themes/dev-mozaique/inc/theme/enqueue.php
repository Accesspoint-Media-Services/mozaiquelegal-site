<?php

function apwp_enqueue_scripts()
{
    $theme = wp_get_theme();

    wp_deregister_script('jquery');
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, NULL, true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-tabs');
    wp_enqueue_script('jquery-ui-accordion');

    wp_enqueue_style('apwp-css', apwp_asset('dist/css/app.css'), array(), $theme->get('Version'));
    wp_enqueue_script('apwp-js', apwp_asset('dist/js/app.js'), array(), $theme->get('Version'));
    wp_enqueue_script('apwp-jquery', apwp_asset('dist/js/jquery.js'), array('jquery'), $theme->get('Version'));
}

add_action('wp_enqueue_scripts', 'apwp_enqueue_scripts');