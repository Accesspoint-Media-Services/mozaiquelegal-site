<div class="flex flex-col gap-y-10 mb-10 lg:mb-20">

        <div class="flex flex-col lg:flex-row gap-y-8 gap-x-20 justify-between" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
            <div class="flex lg:w-1/2 h-[500px]">
                <?php $mozaique_image = get_field('mozaique_image'); ?>
                <?php if ($mozaique_image) : ?>
                    <img class="w-full h-full max-h-[600px] object-cover rounded-2xl object-center" 
                    src="<?php echo esc_url($mozaique_image['url']); ?>" 
                    alt="<?php echo esc_attr($mozaique_image['alt']); ?>">
                <?php endif; ?>
            </div>

            <div class="flex flex-col gap-y-8 lg:w-1/2">
                <h3 class="alt-heading">
                    What is Mozaique?
                </h3>

                <div>
                    <?php echo get_field('mozaique_description'); ?>
                    We created Mozaique to aid smarter legal work. Law firms can connect legal systems, teams and clients through one powerful portal. Mozaique <b>comes with a full suite of growing products:</b>
                </div>

                <!-- Checklist Items -->
                <div class="grid grid-cols-2 gap-x-10 gap-y-6">
                    
                    <?php if (have_rows('mozaique_items')): ?>
                        <?php while (have_rows('mozaique_items')): the_row(); ?>
                            
                            <div class="flex items-start gap-6">

                                <div class="mt-1 bg-pink rounded-full w-4 flex justify-center h-4 text-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="7" viewBox="0 0 11 7" fill="none">
                                    <g clip-path="url(#clip0_2215_576)">
                                        <path d="M3.61689 6.3997C3.50118 6.3997 3.38546 6.36131 3.29686 6.28293L0.13094 3.48203C-0.0462508 3.32527 -0.0462508 3.07253 0.13094 2.91577C0.30813 2.75901 0.593805 2.75901 0.770995 2.91577L3.61689 5.43354L9.62691 0.116472C9.8041 -0.0402888 10.0898 -0.0402888 10.267 0.116472C10.4442 0.273233 10.4442 0.52597 10.267 0.68273L3.93511 6.28293C3.84652 6.36131 3.7308 6.3997 3.61508 6.3997H3.61689Z" fill="black"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2215_576">
                                        <rect width="10.4" height="6.4" fill="white"/>
                                        </clipPath>
                                    </defs>
                                    </svg>
                                </div>
                                
                                <div class="items-start text-start">
                                    <?php 
                                    $url = get_sub_field('mozaique_text');
                                    if ($url) : ?>
                                        <a class="text-dark hover:text-secondary" href="<?php echo esc_url($url); ?>">
                                            <?php echo esc_html(get_the_title(url_to_postid($url))); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>

                <a class="group inline-flex flex-row gap-x-2 items-center hover:fill-purple text-dark hover:text-purple font-bold" href="tel:02081293800:">Call us to discuss how we can help you 
                     <svg class="transition-transform mt-1 duration-300 group-hover:translate-x-2 group-hover:scale-110"  width="39" height="13" viewBox="0 0 39 13" fill="none">
                        <path d="M0 6.18258H37M37 6.18258C37 6.18258 34.5347 7.34739 33.3636 8.69687C32.1926 10.0463 31.1818 12.0493 31.1818 12.0493M37 6.18258C37 6.18258 34.7109 5.2208 33.3636 3.6683C32.0164 2.1158 31.1818 0.315918 31.1818 0.315918" stroke="#130668" stroke-width="1.5"/>
                    </svg>
                </a>

            </div>

        </div>
        
        <div class="flex items-center justify-center" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
           <div class="flex mt-4 lg:w-2/3">
                <?php echo get_field('image_header'); ?>
           </div> 
        </div>



        <?php if (has_post_thumbnail()) : ?>
            <div class="featured-image" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
                <?php the_post_thumbnail('full', [
                    'class' => 'w-full !h-full max-h-[600px] rounded-3xl object-cover object-center'
                ]); ?>
            </div>
        <?php else : ?>
            <div class="featured-image">
                <img src="" 
                class="w-full !h-full object-cover max-h-[535px] rounded-3xl object-center">
            </div>
        <?php endif; ?>
</div>