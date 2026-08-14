<?php 
$footer_cs_args = array(
    'post_type' => 'case-study',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'DESC'
); ?>

<?php $cs_query = new WP_Query($footer_cs_args); ?>

<section class="container flex item-scenter flex-col gap-y-4 pb-10 lg:pb-20 pt-10">

    <div class="eyebrow-headings !text-purple">
        case studies
    </div>    

    <div class="flex gap-y-4 justify-between md:flex-row flex-col">
        <h3 class="w-full">
            Hear from some of our clients who love Mozaique.
        </h3>

        <div class="flex w-full md:justify-end">
             <a class="group inline-flex items-center flex-row gap-x-2  font-bold !text-dark" href="/case-studies/">Explore our case studies
                <svg class="transition-transform mt-1 duration-300 group-hover:translate-x-2 group-hover:scale-110" 
                 xmlns="http://www.w3.org/2000/svg" width="39" height="13" viewBox="0 0 39 13" fill="none">
                <path d="M0 6.18258H37M37 6.18258C37 6.18258 34.5347 7.34739 33.3636 8.69687C32.1926 10.0463 31.1818 12.0493 31.1818 12.0493M37 6.18258C37 6.18258 34.7109 5.2208 33.3636 3.6683C32.0164 2.1158 31.1818 0.315918 31.1818 0.315918" stroke="#130668" stroke-width="1.5"/>
                </svg>
             </a>
        </div>

    </div>

    <div class="flex flex-col  justify-between">

        <?php if ($cs_query->have_posts() ) : ?>
            <div class="swiper-cs swiper">
                <div class="swiper-wrapper">
                    <?php while ($cs_query->have_posts() ) :
                        $cs_query->the_post();?>
                        <div class="review swiper-slide">

                            <div class="w-full flex flex-col">
                                <?php 
                                if (has_post_thumbnail($post->ID)) : ?>
                                    <a href="<?php echo get_permalink($post->ID); ?>">
                                        <?php echo get_the_post_thumbnail($post->ID, 'full', ['class' => 'mb-4 !rounded-2xl w-full h-[225px] object-cover object-center']); ?>
                                    </a>
                                <?php 
                                endif; ?>
                                <div>
                                    <?php $related_client = get_field('related_client', $post->ID); ?>
                
                                    <a class="h5 px-4 font-semibold text-dark hover:text-pink" href="<?php echo get_permalink($post->ID); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php endif ?>
        <?php wp_reset_postdata(); ?>
    </div> 

</section>

