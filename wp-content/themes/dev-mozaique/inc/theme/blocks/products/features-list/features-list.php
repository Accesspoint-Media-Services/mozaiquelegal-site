<section class="py-10" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">

    <div class="flex flex-col gap-y-10 relative">
        <div class="space-y-2">
            <?php $page_colour = get_field('page_colour', get_queried_object_id()); ?>
            <div class="eyebrow-headings" style="color: <?php echo esc_attr($page_colour); ?>;">
                <?php $feature_heading = get_field('features_list_heading'); ?>
                <?php echo $feature_heading; ?>
            </div>

            <?php $document = get_field('download_brochure', get_queried_object_id()); ?>
             <?php if ($document): ?>
            <a class="group lg:inline-flex hidden  absolute right-0 top-0 flex-row gap-x-2  font-bold !text-dark" 
            href="<?php echo $document['url']; ?>" target="_blank">
                Download our <?php the_title(); ?> brochure
                <svg class="transition-transform mt-2 duration-300 group-hover:translate-x-2 group-hover:scale-110"  
                xmlns="http://www.w3.org/2000/svg" width="39" height="13" viewBox="0 0 39 13" fill="none">
                <path d="M0 6.18258H37M37 6.18258C37 6.18258 34.5347 7.34739 33.3636 8.69687C32.1926 10.0463 31.1818 12.0493 31.1818 12.0493M37 6.18258C37 6.18258 34.7109 5.2208 33.3636 3.6683C32.0164 2.1158 31.1818 0.315918 31.1818 0.315918" stroke="#130668" stroke-width="1.5"/>
                </svg>
            </a>
            <?php endif; ?>

            <h2 class="h3 lg:w-3/5">
                <?php $features_title = get_field('features_list_title'); ?>
                <?php echo $features_title; ?>
            </h2>
        </div>

        <?php if (have_rows('features_list')) : ?>
            <div class="features-grid grid md:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-10">
                <?php while (have_rows('features_list')) : the_row(); 
                    $feature_image = get_sub_field('feature_icon');
                    $feature_title = get_sub_field('feature_title');
                    $feature_content = get_sub_field('feature_content');
                    $feature_content = preg_replace('/^<p>(.*)<\/p>$/s', '$1', trim($feature_content));
                ?>
                    <div class="feature-item flex flex-col items-stretch justify-between gap-y-6">
                        <div class="flex items-start h-auto gap-4 ">
                            
                            <?php if ($feature_image) : ?>
                                <?php $page_colour = get_field('page_colour', get_queried_object_id()); ?>
                                <div class="flex items-center">
                                    <img src="<?php echo esc_url($feature_image['url']); ?>" 
                                    alt="" 
                                    class="rounded-full flex p-2 w-10 h-10 !flex-shrink-0" style="background-color: <?php echo esc_attr($page_colour); ?>;">
                                </div>
                            <?php endif; ?>
                        
                            <?php if ($feature_title) : ?>
                                <h5 class="font-body alt-heading font-semibold text-primary">
                                    <?php echo $feature_title; ?>
                                </h5>
                            <?php endif; ?>
                        </div>
                        
                        <?php if ($feature_content) : ?>
                            <div class="flex mb-auto">
                                <?php echo $feature_content; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

</section>