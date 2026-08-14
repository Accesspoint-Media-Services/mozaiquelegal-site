<div class="entry-header">

    <div class="flex flex-col text-center" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">

        <p class="eyebrow-headings">
            <?php the_title(); ?>
        </p>

        <?php $about_us_title = get_field ('about_us_title') ; ?>

        <div class="h1 alt-heading mx-auto max-w-[1000px]">
            <?php echo $about_us_title ; ?>
        </div>

        <section class="flex flex-col gap-y-8 my-2">
            <!-- Swiper main container -->
            <div class="border break-container overflow-hidden flex flex-col gap-y-4" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
                <!-- Row 1 - Scrolls Left -->
                <div class="swiper swiper-about-gallery-row1">
                    <div class="swiper-wrapper flex items-center">
                        <?php 
                        $about_us_images = get_field('about_us_gallery');
                        if ($about_us_images) : 
                            foreach ($about_us_images as $about_us_image) : ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo esc_url($about_us_image['url']); ?>" alt="<?php echo esc_attr($about_us_image['alt']); ?>" />
                                </div>
                            <?php endforeach; 
                        endif; 
                        ?>
                    </div>
                </div>

                <!-- Row 2 - Scrolls Right -->
                <div class="swiper swiper-about-gallery-row2">
                    <div class="swiper-wrapper flex items-center">
                        <?php 
                        if ($about_us_images) : 
                            // Reverse the array for visual variety
                            $reversed_images = array_reverse($about_us_images);
                            foreach ($reversed_images as $about_us_image) : ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo esc_url($about_us_image['url']); ?>" alt="<?php echo esc_attr($about_us_image['alt']); ?>" />
                                </div>
                            <?php endforeach; 
                        endif; 
                        ?>
                    </div>
                </div>
            </div>

            <div class="text-center max-w-[500px] mx-auto mt-4" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
                <?php 
                    $overview_header = get_field('overview_header');
                    $overview_group = get_field('about_us_overview'); 
                    $overview = get_field('about_us_overview')['about_us_overview_text'];
                    $overview_description = get_field('about_us_overview')['about_us_overview_description'];
                ?>

                <?php echo $overview_header ; ?>
            </div>

            <div class="overview-block flex flex-col items-center lg:flex-row gap-y-8 gap-x-16 mb-10 justify-between" 
            data-aos="fade-zoom-in" data-aos-easing="ease-in-back">

                <div class="lg:w-1/2 text-start text-2xl">
                    <span class="eyebrow-headings text-pink pr-4">
                        who we are
                    </span> 

                    <?php echo wp_strip_all_tags($overview); ?>
                </div>

                <div class="lg:w-1/2 text-start">
                    <?php 
                    $overview_description = preg_replace('/^<p>(.*)<\/p>$/s', '$1', trim($overview_description));
                    ?>

                    <?php echo $overview_description; ?>

                </div>

            </div>

        </section>

    </div>


</div>