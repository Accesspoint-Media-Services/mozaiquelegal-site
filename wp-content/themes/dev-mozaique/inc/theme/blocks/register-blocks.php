<?php

add_action('init', 'apwp_register_acf_blocks');
function apwp_register_acf_blocks()
{

    // product blocks
    register_block_type(__DIR__ . '/products/overview');
    register_block_type(__DIR__ . '/products/features');
    register_block_type(__DIR__ . '/products/features-list');
    register_block_type(__DIR__ . '/products/more-features-list');
    register_block_type(__DIR__ . '/products/product-checklist');
    register_block_type(__DIR__ . '/products/product-guide');
    register_block_type(__DIR__ . '/products/product-header');
    register_block_type(__DIR__ . '/products/product-faqs');
    register_block_type(__DIR__ . '/products/product-content');

    // about us blocks
    register_block_type(__DIR__ . '/about-us/about-us-header');
    register_block_type(__DIR__ . '/about-us/about-us-content');

    // case study
    register_block_type(__DIR__ . '/case-study');

    // faqs
    register_block_type(__DIR__ . '/faqs');

    // custom quotes for case-studies
    register_block_type(__DIR__ . '/custom-quotes');

    // review
    register_block_type(__DIR__ . '/review');

    // callout block
    register_block_type(__DIR__ . '/callout-block');
}

?>
