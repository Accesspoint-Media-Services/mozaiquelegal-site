<section class="break-container bg-light rounded-t-3xl py-20" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
    <?php $page_colour = get_field('page_colour', get_queried_object_id()); ?>
    <div class="container">
        <div class="flex flex-col gap-y-4">
            <div class="eyebrow-headings text-center" style="color: <?php echo esc_attr($page_colour); ?>;">
                step by step guide
            </div>

            <h3 class="font-body font-semibold alt-heading lg:w-3/5 mx-auto  text-center">
                <?php $guide_title = get_field('guide_title'); ?>
                <?php echo $guide_title; ?>
            </h3>
        </div>
        <!-- swiper navigation arrows -->
        <div class="hidden lg:flex gap-4 items-cend justify-end">
            <div class="guide-prev w-12 h-12">
                <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="49" height="49" viewBox="0 0 49 49" fill="none">
                    <circle cx="24.4551" cy="24.4551" r="16.6059" transform="rotate(-40.0939 24.4551 24.4551)" stroke="#130668" stroke-width="1.5"/>
                    <path d="M17.0443 24.7093L32.2816 24.9578M32.2816 24.9578C32.2816 24.9578 29.9187 25.8439 28.7861 26.8967C27.6534 27.9495 26.6648 29.5233 26.6648 29.5233M32.2816 24.9578C32.2816 24.9578 30.1141 24.159 28.8512 22.906C27.5883 21.6529 26.8167 20.2116 26.8167 20.2116" stroke="#130668" stroke-width="1.5"/>
                </svg>
            </div>

            <div class="guide-next w-12 h-12">
                <svg xmlns="http://www.w3.org/2000/svg" width="49" height="49" viewBox="0 0 49 49" fill="none">
                    <circle cx="24.4551" cy="24.4551" r="16.6059" transform="rotate(-40.0939 24.4551 24.4551)" stroke="#130668" stroke-width="1.5"/>
                    <path d="M17.0443 24.7093L32.2816 24.9578M32.2816 24.9578C32.2816 24.9578 29.9187 25.8439 28.7861 26.8967C27.6534 27.9495 26.6648 29.5233 26.6648 29.5233M32.2816 24.9578C32.2816 24.9578 30.1141 24.159 28.8512 22.906C27.5883 21.6529 26.8167 20.2116 26.8167 20.2116" stroke="#130668" stroke-width="1.5"/>
                </svg>
            </div>
        </div>
        <!-- Swiper Slider -->
        <?php 
        if (have_rows('product_guide_steps')): ?>
            <div class="swiper swiper-product-guide">
                <div class="swiper-wrapper">
                    
                    <?php 
                    while (have_rows('product_guide_steps')): the_row(); ?>
                        <div class="swiper-slide">
                            <!-- Image -->
                            <?php $image = get_sub_field('guide_image'); ?>
                            <?php if ($image): ?>
                                <div class="rounded-xl">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="w-full h-auto">
                                </div>
                            <?php endif; ?>

                            <!-- Step Content -->
                            <div class="flex flex-col gap-y-4 pt-4 mt-auto">
                                <div class="eyebrow-headings" style="color: <?php echo esc_attr($page_colour); ?>;">
                                    <?php $step_number = get_sub_field('step_number'); ?>
                                    <?php echo $step_number; ?>
                                </div>
                                <h5 class="font-body alt-heading">
                                    <?php $step_title = get_sub_field('step_title'); ?>
                                    <?php echo $step_title; ?>
                                </h5>
                                <div class="text-dark">
                                    <?php $step_description = get_sub_field('step_description'); ?>
                                    <?php echo $step_description; ?>
                                </div>
                            </div>
                        </div>
                    <?php 
                    endwhile; ?>
                </div>
                <!-- If we need pagination -->
        <div class="swiper-pagination lg:hidden "></div>
            </div>
        <?php 
        endif; ?>
    </div>

</section>