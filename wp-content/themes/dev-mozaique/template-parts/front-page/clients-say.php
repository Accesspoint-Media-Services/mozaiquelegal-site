<?php 
$args = array(
    'post_type' => 'client-say',
    'post_status' => 'publish',
    'orderby' => 'DATE',
    'order' => 'DESC'
    // 'meta_query' => array(
    //     array(
    //         'key' => 'is_featured',
    //         'value' => true,
    //         'compare' => '='
    //     )
    // )
); ?>

<?php if(is_front_page()) : ?>
    <?php get_template_part('template-parts/front-page/client-logos'); ?>
<?php endif; ?>

<section class="bg-[#0F0456]  h-full pt-20 pb-32 !overflow-x-hidden">
    <div class="container h-full">
        <div class="flex flex-col xl:flex-row h-full gap-y-10 gap-x-20 justify-between">
            <h2 class="h1 w-full xl:w-2/5 text-white flex items-center">
                What our clients say
            </h2>
            <div class="xl:w-3/5">
            <?php $featured_query = new WP_Query($args); ?>
                <?php if ( $featured_query->have_posts() ) { ?>
                    <div class="reviews-slider swiper">
                        <div class="reviews-wrapper swiper-wrapper">
                            <?php while ( $featured_query->have_posts() ) {
                                $featured_query->the_post();?>
                            <div class="review swiper-slide !h-auto">
                                <blockquote class="flex flex-col text-base lg:text-xl gap-y-8 lg:gap-y-16">
                                    <?php the_content(); ?>
                                    <cite class="text-secondary not-italic"><?php the_title(); ?></cite>
                                </blockquote>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                <?php } ?>
                <?php wp_reset_postdata(); ?>
            </div> 
        </div>
    </div>
</section>

