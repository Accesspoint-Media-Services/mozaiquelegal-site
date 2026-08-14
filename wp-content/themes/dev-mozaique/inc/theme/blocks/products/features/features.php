<section id="features" class="break-container bg-light flex rounded-t-3xl flex-col gap-y-10 py-20" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
    <!-- First section -->
    <div class="accordion-section" data-section="1">
        <div class="container">
            <div class="flex flex-col lg:flex-row gap-x-20 lg:mt-10">

                <?php $page_colour = get_field('page_colour', get_queried_object_id()); ?>
                <div class="lg:hidden mb-4 eyebrow-headings" style="color: <?php echo esc_attr($page_colour); ?>;">
                    <?php $feature_heading = get_field('feature_heading'); ?>
                    <?php echo $feature_heading; ?>
                </div>
                
                <!-- Image -->
                <div class="lg:w-1/2 w-full relative aspect-[1256/837]">
                    <?php 
                    $index = 0;
                    while (have_rows('features')) : the_row(); 
                        $image = get_sub_field('feature_image');
                    ?>
                        <a href="<?php echo esc_url($image['url']); ?>" 
                           class="glightbox absolute inset-0 transition-opacity duration-300 <?php echo $index === 0 ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none'; ?>"
                           data-gallery="features-1"
                           data-index="<?php echo $index; ?>">
                            <img src="<?php echo esc_url($image['url']); ?>" 
                                alt="<?php echo esc_attr($image['alt']); ?>"
                                class="accordion-feature-image w-full h-auto max-h-96 object-center object-cover rounded-lg cursor-pointer"
                                data-index="<?php echo $index; ?>">
                        </a>
                        <?php $index++; ?>
                    <?php endwhile; ?>
                    <?php reset_rows(); ?>
                </div>
                
                <!-- Accordions -->
                <div class="lg:w-1/2 w-full flex flex-col gap-y-4">
                    <div class="hidden lg:flex lg:-mt-10 eyebrow-headings" style="color: <?php echo esc_attr($page_colour); ?>;">
                        <?php $feature_heading = get_field('feature_heading'); ?>
                        <?php echo $feature_heading; ?>
                    </div>
                    
                    <?php 
                    $index = 0;
                    while (have_rows('features')) : the_row(); 
                        $feature_title = get_sub_field('feature_title');
                        $feature_content = get_sub_field('feature_content');
                        $feature_content = preg_replace('/^<p>(.*)<\/p>$/s', '$1', trim($feature_content));
                    ?>
                        <div class="accordion-features flex gap-y-4 flex-col relative" data-index="<?php echo $index; ?>">
                            <h3 class="accordion-features-heading alt-heading font-body font-semibold relative overflow-hidden text-xl cursor-pointer">
                                <?php echo esc_html($feature_title); ?>
                            </h3>
                            <div class="accordion-features-items">
                                <?php echo wp_kses_post($feature_content); ?>
                            </div>
                            <div class="accordion-progress-wrapper my-2 h-[2px] w-full bg-dark/15">
                                <div class="accordion-progress-bar h-full bg-dark w-0"></div>
                            </div>
                        </div>
                        <?php $index++; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Second section -->
    <div class="accordion-section" data-section="2">
        <div class="container">
            <div class="flex lg:flex-row-reverse flex-col gap-x-20">

                <div class="lg:hidden mb-4 eyebrow-headings" style="color: <?php echo esc_attr($page_colour); ?>;">
                    <?php $feature_heading = get_field('feature_heading'); ?>
                    <?php echo $feature_heading; ?>
                </div>
                
                <!-- Image (now on right) -->
                <div class="lg:w-1/2 w-full relative aspect-[1256/837]">
                    <?php 
                    $index = 0;
                    while (have_rows('more_features')) : the_row(); 
                        $image = get_sub_field('feature_image');
                    ?>
                        <a href="<?php echo esc_url($image['url']); ?>" 
                           class="glightbox absolute inset-0 transition-opacity duration-300 <?php echo $index === 0 ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none'; ?>"
                           data-gallery="features-2"
                           data-index="<?php echo $index; ?>">
                            <img src="<?php echo esc_url($image['url']); ?>" 
                                alt="<?php echo esc_attr($image['alt']); ?>"
                                class="accordion-feature-image w-full h-auto max-h-96 object-center object-cover rounded-lg cursor-pointer"
                                data-index="<?php echo $index; ?>">
                        </a>
                        <?php $index++; ?>
                    <?php endwhile; ?>
                    <?php reset_rows(); ?>
                </div>
                
                <!-- Accordions (now on left) -->
                <div class="w-full lg:w-1/2 flex flex-1 flex-col gap-y-4">
                    <div class="hidden lg:flex eyebrow-headings" style="color: <?php echo esc_attr($page_colour); ?>;">
                        <?php $more_feature_heading = get_field('more_features_heading'); ?>
                        <?php echo $more_feature_heading; ?>
                    </div>
                    
                    <?php 
                    $index = 0;
                    while (have_rows('more_features')) : the_row(); 
                        $feature_title = get_sub_field('feature_title');
                        $feature_content = get_sub_field('feature_content');
                        $feature_content = preg_replace('/^<p>(.*)<\/p>$/s', '$1', trim($feature_content));
                    ?>
                        <div class="accordion-features flex gap-y-4 flex-col relative" data-index="<?php echo $index; ?>">
                            <h3 class="accordion-features-heading alt-heading font-body font-semibold relative overflow-hidden text-xl cursor-pointer">
                                <?php echo esc_html($feature_title); ?>
                            </h3>
                            <div class="accordion-features-items">
                                <?php echo wp_kses_post($feature_content); ?>
                            </div>
                            <div class="accordion-progress-wrapper my-2 h-[2px] w-full bg-dark/15">
                                <div class="accordion-progress-bar h-full bg-dark w-0"></div>
                            </div>
                        </div>
                        <?php $index++; ?>
                    <?php endwhile; ?>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Third section (only shows if extra_features exists) -->
    <?php if (have_rows('extra_features')) : ?>
    <div class="accordion-section" data-section="3">
        <div class="container">
            <div class="flex flex-col lg:flex-row gap-x-20">

                <div class="lg:hidden mb-4 eyebrow-headings" style="color: <?php echo esc_attr($page_colour); ?>;">
                    <?php $extra_feature_heading = get_field('extra_features_heading'); ?>
                    <?php echo $extra_feature_heading; ?>
                </div>
                
                <!-- Image -->
                <div class="lg:w-1/2 w-full relative aspect-[1256/837]">
                    <?php 
                    $index = 0;
                    while (have_rows('extra_features')) : the_row(); 
                        $image = get_sub_field('feature_image');
                    ?>
                        <a href="<?php echo esc_url($image['url']); ?>" 
                           class="glightbox absolute inset-0 transition-opacity duration-300 <?php echo $index === 0 ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none'; ?>"
                           data-gallery="features-3"
                           data-index="<?php echo $index; ?>">
                            <img src="<?php echo esc_url($image['url']); ?>" 
                                alt="<?php echo esc_attr($image['alt']); ?>"
                                class="accordion-feature-image w-full h-auto max-h-96 object-center object-cover rounded-lg cursor-pointer"
                                data-index="<?php echo $index; ?>">
                        </a>
                        <?php $index++; ?>
                    <?php endwhile; ?>
                    <?php reset_rows(); ?>
                </div>
                
                <!-- Accordions -->
                <div class="lg:w-1/2 w-full flex flex-col gap-y-4">
                    <div class="hidden lg:flex eyebrow-headings" style="color: <?php echo esc_attr($page_colour); ?>;">
                        <?php $extra_feature_heading = get_field('extra_features_heading'); ?>
                        <?php echo $extra_feature_heading; ?>
                    </div>
                    
                    <?php 
                    $index = 0;
                    while (have_rows('extra_features')) : the_row(); 
                        $feature_title = get_sub_field('feature_title');
                        $feature_content = get_sub_field('feature_content');
                        $feature_content = preg_replace('/^<p>(.*)<\/p>$/s', '$1', trim($feature_content));
                    ?>
                        <div class="accordion-features flex gap-y-4 flex-col relative" data-index="<?php echo $index; ?>">
                            <h3 class="accordion-features-heading alt-heading font-body font-semibold relative overflow-hidden text-xl cursor-pointer">
                                <?php echo esc_html($feature_title); ?>
                            </h3>
                            <div class="accordion-features-items">
                                <?php echo wp_kses_post($feature_content); ?>
                            </div>
                            <div class="accordion-progress-wrapper my-2 h-[2px] w-full bg-dark/15">
                                <div class="accordion-progress-bar h-full bg-dark w-0"></div>
                            </div>
                        </div>
                        <?php $index++; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

</section>

<script>
    const lightbox = GLightbox({
        selector: '.glightbox'
    });
</script>