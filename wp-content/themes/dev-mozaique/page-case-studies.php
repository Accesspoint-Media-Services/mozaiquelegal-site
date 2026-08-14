<?php get_header(); ?>

<div class="container">

    <div class="flex flex-col text-center gap-y-10" data-aos="fade-zoom-in" data-aos-delay="300" data-aos-easing="ease-in-back">

        <p class="uppercase tracking-wide">
            <?php the_title(); ?>
        </p>

        <h1 class="h1 alt-heading mx-auto max-w-[1000px]">
            Taking your business to the 
            <span class="bg-gradient-to-r from-[#0DD9B3] to-[#6C3AD6] bg-clip-text text-transparent">
                next level.
            </span>
        </h1>

        <section class="break-container lg:py-10">
            <div class="flex flex-col gap-y-8 lg:flex-row items-center justify-center lg:px-10 xl:px-20">
                <div class="lg:hidden  eyebrow-heading uppercase text-pink items-center text-center">
                    Who we've worked with
                </div>
                <div class="hidden lg:flex min-w-32 eyebrow-heading uppercase text-pink items-center text-start">
                    Who we've <br>worked with
                </div>
                <!-- Swiper main container -->
                <div class="swiper swiper-client-logos">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper flex items-center justify-between">
                        <?php 
                        $client_logos = get_field('client_logos', 'option'); 
                        
                        if ($client_logos) : 
                            foreach ($client_logos as $logo) : ?>
                                <!-- Each logo as a Swiper slide -->
                                <div class="swiper-slide">
                                    <img class="case-study-logos" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                </div>
                            <?php endforeach; 
                        endif; 
                        ?>
                    </div>
                </div>
            </div>
        </section>


    </div>

    <div data-aos="fade-zoom-in" data-aos-delay="300" data-aos-easing="ease-in-back">
    <?php the_content(); ?>
    </div>


</div>

<?php
get_footer();


