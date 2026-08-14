<?php 
$cs_args = array(
    'post_type' => 'case-study',
    'post_status' => 'publish',
    'posts_per_page' => 10,
    'order' => 'DESC'
); ?>

<?php $f_cs_query = new WP_Query($cs_args); ?>

<section class="flex item-scenter text-center flex-col gap-y-4 pb-10 lg:pb-20 pt-10" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">

    <div class="eyebrow-headings !text-dark">
        case studies
    </div>    

    <h2 class="">
        Legal Intelligence. <span class="bg-gradient-to-r text-transparent bg-clip-text from-[#635FD9] to-[#3F04BF]">
            Unified.
        </span>
    </h2>

    <div class="flex flex-col h-full  mt-8 gap-y-10 justify-between !overflow-x-hidden">

        <?php if ( $f_cs_query->have_posts() ) : ?>
            <div class="swiper-front-page-cs swiper">
                <div class="swiper-wrapper">
                    <?php while ( $f_cs_query->have_posts() ) :
                        $f_cs_query->the_post();?>
                    <div class="swiper-slide">

                        <div class="w-full flex flex-col px-4 md:px-0 gap-y-8">
                            <?php 
                            if (has_post_thumbnail($post->ID)) : ?>
                                <a href="<?php echo get_permalink($post->ID); ?>">
                                    <?php echo get_the_post_thumbnail($post->ID, 'full', ['class' => 'rounded-2xl w-full aspect-square h-auto max-h-[420px] object-cover object-center']); ?>
                                </a>
                            <?php 
                            endif; ?>
                            <div>
                                <?php $cs_title = get_field('case_study_title', $post->ID); ?>
                                
                                <a class="case-study-title " href="<?php echo get_permalink($post->ID); ?>">
                                    <?php echo $cs_title; ?>
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

