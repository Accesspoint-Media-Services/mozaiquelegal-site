<div class="entry-header" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">

    <?php $page_colour = get_field('page_colour', get_queried_object_id()); ?>

    <p class="eyebrow-headings" style="color: <?php echo esc_attr($page_colour); ?>;">
        <?php the_title(); ?>
    </p>

    <?php $product_title = get_field ('product_title') ; ?>
    <div class="">
        <?php echo $product_title ; ?>
    </div>

    <?php $product_excerpt = get_field ('product_excerpt') ;  ?>
    <?php $product_excerpt_link = get_field ('product_excerpt_link') ;  ?>
    
    <div class="text-2xl">
        <?php echo wp_strip_all_tags($product_excerpt); ?>
        <?php if ($product_excerpt_link) : ?>
            <a class="group inline-flex flex-row gap-x-2 items-center font-bold" style="color: <?php echo esc_attr($page_colour); ?>;" 
           href="<?php echo esc_url($product_excerpt_link['url']); ?>">
                <?php echo esc_html($product_excerpt_link['title']); ?>
                <svg class="transition-transform mt-1 duration-300 group-hover:translate-x-2 group-hover:scale-110" 
                xmlns="http://www.w3.org/2000/svg" width="40" height="13" viewBox="0 0 40 13">
                <path d="M0 6.28811H37M37 6.28811C37 6.28811 34.5347 7.45292 33.3636 8.8024C32.1926 10.1519 31.1818 12.1548 31.1818 12.1548M37 6.28811C37 6.28811 34.7109 5.32633 33.3636 3.77383C32.0164 2.22132 31.1818 0.421448 31.1818 0.421448" stroke="currentColor" stroke-width="2"/>
                </svg>
            </a>
        <?php endif; ?>
    </div>

    <?php $demo_video = get_field('demo_video', get_queried_object_id()); ?>

    <?php if ($demo_video) : ?>
        <div class="relative cursor-pointer group" onclick="Supademo.open('<?php echo esc_attr($demo_video); ?>')">
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image-product">
                    <?php the_post_thumbnail('full', [
                        'class' => 'w-full !h-full !min-h-80 max-h-[535px] rounded-3xl object-cover object-center'
                    ]); ?>
                </div>
            <?php endif; ?>
            
            <!-- play icon code -->
            <div class="absolute bottom-8 left-8">
                <div class="bg-white/60 group-hover:bg-white group-hover:scale-105 transition-all duration-300 rounded-full px-8 py-4 flex items-center gap-5">
                    <div class="bg-[#F2E750] rounded-full p-4">
                        <svg class="w-10 h-10 text-primary" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                    <div class="flex flex-col text-dark">
                        <span class="font-bold text-xl uppercase tracking-wide m-0">Watch Demo</span>
                        <span class="text-base m-0">See how it works</span>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>        
        <?php if (has_post_thumbnail()) : ?>
            <div class="featured-image-product">
                <?php the_post_thumbnail('full', [
                    'class' => 'w-full !h-full min-h-80 max-h-[535px] rounded-3xl object-cover object-center'
                ]); ?>
            </div>
        <?php endif; ?>
  <?php endif; ?>
        
</div>