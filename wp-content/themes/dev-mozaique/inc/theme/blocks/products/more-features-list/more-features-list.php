<section class="break-container bg-[#0F0456] py-20 rounded-t-3xl" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
    <div class="container">

        <div class="flex flex-col gap-y-10 relative">
            <div class="space-y-2">
                
                <?php $feature_colour = get_field('feature_colour'); ?>
                <div class="eyebrow-headings" style="color: <?php echo esc_attr($feature_colour); ?>;">
                    <?php $feature_heading = get_field('more_features_list_heading'); ?>
                    <?php echo $feature_heading; ?>
                </div>

                <h2 class="h3 !text-white lg:w-3/5">
                    <?php $features_title = get_field('more_features_list_title'); ?>
                    <?php echo $features_title; ?>
                </h2>
            </div>

            <?php if (have_rows('more_features_list')) : ?>
                <div class="features-grid grid md:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-10">
                    <?php while (have_rows('more_features_list')) : the_row(); 
                        $feature_image = get_sub_field('more_feature_icon');
                        $feature_title = get_sub_field('more_feature_title');
                        $feature_content = get_sub_field('more_feature_content');
                        $feature_content = preg_replace('/^<p>(.*)<\/p>$/s', '$1', trim($feature_content));
                    ?>
                        <div class="feature-item flex flex-col items-stretch justify-between gap-y-6">
                            <div class="flex items-start h-auto gap-4 ">
                                
                                <?php if ($feature_image) : ?>
                                    <div class="flex items-center">
                                        <img src="<?php echo esc_url($feature_image['url']); ?>" 
                                        alt="" 
                                        class="rounded-full flex p-2 w-10 h-10 flex-shrink-0" style="background-color: <?php echo esc_attr($feature_colour); ?>;">
                                    </div>
                                <?php endif; ?>
                            
                                <?php if ($feature_title) : ?>
                                    <h5 class="font-body alt-heading font-semibold !text-white">
                                        <?php echo $feature_title; ?>
                                    </h5>
                                <?php endif; ?>
                            </div>
                            
                            <?php if ($feature_content) : ?>
                                <div class="flex !text-white mb-auto">
                                    <?php echo $feature_content; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            
        </div>

    <?php if (is_singular('product') && get_the_title() === 'Legal Aid Manager') : ?>
        <!-- Download CTA Card -->
        <?php $document = get_field('download_brochure', get_queried_object_id()); ?>
        <?php if ($document): ?>
            <div class="mt-12">
                <div class="rounded-2xl p-10 flex items-center gap-x-4 justify-between" style="border-radius: 20px;
                    background: linear-gradient(179deg, #635FD9 0.57%, #13DCF2 99.4%);">
                    <div class="space-y-4">
                        <div class="eyebrow-headings !text-white">Find Out More</div>
                        <h5 class="alt-heading text-white">Download our FREE product brochure</h5>
                    </div>
                    <a href="<?php echo $document['url']; ?>" target="_blank" class="bg-white text-gray-900 
                    px-6 py-2 rounded-full font-medium inline-flex items-center gap-2 hover:bg-gray-100 transition-colors">
                        Download 
                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-1" width="17" height="11" viewBox="0 0 17 11" fill="none">
                        <path d="M0 5.34131H15M15 5.34131C15 5.34131 12.6888 6.33404 11.5909 7.48417C10.4931 8.63429 9.54545 10.3413 9.54545 10.3413M15 5.34131C15 5.34131 12.8539 4.52161 11.5909 3.19845C10.3279 1.87529 9.54545 0.341309 9.54545 0.341309" stroke="#CB91F2" stroke-width="1.5"/>
                        </svg>
                    </a>
                </div>
            </div>
        <?php endif; 
        endif; ?>
    </div>

</section>