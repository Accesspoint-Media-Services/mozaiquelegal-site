<?php
require_once get_template_directory() . '/inc/theme/setup.php'; // --- Theme setup ---
require_once get_template_directory() . '/inc/theme/enqueue.php'; // --- Theme enqueues ---
require_once get_template_directory() . '/inc/theme/setup-menus.php'; // --- Theme menus ---
require_once get_template_directory() . '/inc/theme/nocomments.php'; // --- Disable Comments ---
// require_once get_template_directory() . '/inc/theme/breadcrumbs.php'; // --- Yoast SEO  Breadcrumbs ---
// add_filter('Yoast\WP\SEO\should_index_indexables', '__return_true');

add_filter( 'wp_lazy_loading_enabled', '__return_false' );


/**
 * ACF BLOCKS
 */
if (function_exists('acf_register_block_type')) {
    require_once get_template_directory() . '/inc/theme/blocks/register-blocks.php';
} 

/**
 * AJAX handler for filtering posts
 */
function filter_posts_ajax() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'filter_posts_nonce')) {
        wp_send_json_error('Invalid nonce');
        return;
    }

    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $search = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => get_option('posts_per_page'),
        'paged'          => $paged,
    ];

    if (!empty($category)) {
        $args['category_name'] = $category;
    }

    if (!empty($search)) {
        $args['s'] = $search;
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content/loop', get_post_type());
        }
    } else {
        echo '<div class="col-span-full text-center py-10">';
        echo '<p class="text-gray-500">No posts found matching your criteria.</p>';
        echo '</div>';
    }

    $posts_html = ob_get_clean();

    // Generate pagination
    ob_start();
    echo '<div class="flex flex-wrap !gap-y-2 text-lg pagination">';
    echo paginate_links([
        'total'     => $query->max_num_pages,
        'current'   => $paged,
        'prev_text' => '← ',
        'next_text' => ' →',
    ]);
    echo '</div>';
    $pagination_html = ob_get_clean();

    // Generate count text
    $total = $query->found_posts;
    $per_page = get_option('posts_per_page');
    $start = $total > 0 ? (($paged - 1) * $per_page) + 1 : 0;
    $end = min($paged * $per_page, $total);
    $count_text = $total > 0 
        ? "Showing {$start}-{$end} of {$total} posts."
        : "No posts found.";

    wp_reset_postdata();

    wp_send_json_success([
        'posts'      => $posts_html,
        'pagination' => $pagination_html,
        'count'      => $count_text,
    ]);
}
add_action('wp_ajax_filter_posts', 'filter_posts_ajax');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts_ajax');

function get_reading_time() {
    $content = get_the_content();
    $word_count = str_word_count(strip_tags($content));
    $reading_time = max(1, ceil($word_count / 140));
    return $reading_time;
}

class Products_Menu_Walker extends Walker_Nav_Menu {
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $output .= '<li' . $class_names . '>';
        
        $atts = array();
        $atts['href'] = !empty($item->url) ? $item->url : '';
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
            }
        }
        
        // Check if parent is products-menu
        $is_products_child = false;
        if ($depth === 1 && $item->menu_item_parent) {
            $parent = get_post($item->menu_item_parent);
            if ($parent) {
                $parent_classes = get_post_meta($item->menu_item_parent, '_menu_item_classes', true);
                if (is_array($parent_classes) && in_array('products-menu', $parent_classes)) {
                    $is_products_child = true;
                }
            }
        }
        
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        
        // Only add title/description spans for products-menu children
        if ($is_products_child && $depth === 1) {
            // Mobile: plain text, Desktop: styled spans
            $item_output .= '<span class="menu-item-title">' . apply_filters('the_title', $item->title, $item->ID) . '</span>';

            
            if (!empty($item->description)) {
                $item_output .= '<span class="menu-item-description hidden lg:block">' . esc_html($item->description) . '</span>';
            }
        } else {
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        }
        
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

// ACF Options page

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Global Options',
        'menu_title'    => 'Global Options',
        'menu_slug'     => 'global-options',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// /**
//  * ============================================================
//  * CACHE CONTROL & SAFARI FIX
//  * ============================================================
//  */

// // 1. Force Safari/mobile to revalidate instead of serving stale cache
// add_action( 'send_headers', function() {
//     if ( is_admin() ) return;
//     header( 'Cache-Control: no-cache, must-revalidate, max-age=0' );
//     header( 'Pragma: no-cache' );
//     header( 'Vary: Accept-Encoding' );
// } );


// // 2. Master cache clear function (Nginx Helper + bump asset version)
// function my_clear_all_cache() {
//     if ( class_exists( 'Nginx_Helper' ) ) {
//         do_action( 'rt_nginx_helper_purge_all' );
//     }
//     update_option( 'my_cache_version', time() );
// }


// // 3. Auto-clear cache whenever a post is published or updated
// add_action( 'save_post', function( $post_id ) {
//     if ( wp_is_post_revision( $post_id ) ) return;
//     my_clear_all_cache();
// } );


// // 4. Bust asset (CSS/JS) cache with a version stamp so Safari re-downloads them
// add_filter( 'style_loader_src', 'my_bust_asset_cache', 10, 2 );
// add_filter( 'script_loader_src', 'my_bust_asset_cache', 10, 2 );

// function my_bust_asset_cache( $src, $handle ) {
//     if ( is_admin() ) return $src;
//     $version = get_option( 'my_cache_version', '1' );
//     $src = remove_query_arg( 'ver', $src );
//     $src = add_query_arg( 'ver', $version, $src );
//     return $src;
// }
