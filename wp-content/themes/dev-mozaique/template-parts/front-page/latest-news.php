<?php 
    $post_args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 9,
        'order' => 'DESC'
    ); 

    $insights_pre_title = get_field('latest_insights_pre_title', 'option');
    $insights_title = get_field('latest_insights_title', 'option');
    $insights_link = get_field('latest_insights_link', 'option');

?>

<?php $post_query = new WP_Query($post_args); ?>

<section class="overflow-x-clip">
    <div class="container" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
        <div class="flex flex-col lg:flex-row gap-y-8 py-10 justify-between items-stretch">

            <div class="insights-left-column flex flex-col w-full lg:w-1/3 gap-y-4 flex-shrink-0 relative z-10 bg-white">
              
                <?php if ($insights_pre_title) : ?>
                    <div class="eyebrow-headings !text-dark">
                        <?php echo $insights_pre_title; ?>  
                    </div>    
                <?php endif; ?>

                <?php if ($insights_title) : ?>
                    <h2 class="lg:pr-10"><?php echo $insights_title; ?></h2>
                <?php endif; ?>


                    <?php  if( $insights_link ): 
                        $link_url = $insights_link['url'];
                        $link_title = $insights_link['title'];
                        $link_target = $insights_link['target'] ? $insights_link['target'] : '_self';
                        ?>
                        <a class="feature-buttons gap-x-2 flex items-center" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-1" width="20" height="13" viewBox="0 0 20 13" fill="none">
                        <path d="M0 6.34131L18 6.34131M18 6.34131C18 6.34131 15.2265 7.53259 13.9091 8.91274C12.5917 10.2929 11.4545 12.3413 11.4545 12.3413M18 6.34131C18 6.34131 15.4247 5.35767 13.9091 3.76988C12.3935 2.18209 11.4545 0.341309 11.4545 0.341309" stroke="#CB91F2" stroke-width="1.5"/>
                    </svg>
                    </a>
                    <?php endif; ?>

                 <!-- swiper navigation arrows -->
                <div class="flex gap-4">
                    <div class="news-prev w-12 h-12">
                        <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="49" height="49" viewBox="0 0 49 49" fill="none">
                            <circle cx="24.4551" cy="24.4551" r="16.6059" transform="rotate(-40.0939 24.4551 24.4551)" stroke="#130668" stroke-width="1.5"/>
                            <path d="M17.0443 24.7093L32.2816 24.9578M32.2816 24.9578C32.2816 24.9578 29.9187 25.8439 28.7861 26.8967C27.6534 27.9495 26.6648 29.5233 26.6648 29.5233M32.2816 24.9578C32.2816 24.9578 30.1141 24.159 28.8512 22.906C27.5883 21.6529 26.8167 20.2116 26.8167 20.2116" stroke="#130668" stroke-width="1.5"/>
                        </svg>
                    </div>

                    <div class="news-next w-12 h-12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="49" height="49" viewBox="0 0 49 49" fill="none">
                            <circle cx="24.4551" cy="24.4551" r="16.6059" transform="rotate(-40.0939 24.4551 24.4551)" stroke="#130668" stroke-width="1.5"/>
                            <path d="M17.0443 24.7093L32.2816 24.9578M32.2816 24.9578C32.2816 24.9578 29.9187 25.8439 28.7861 26.8967C27.6534 27.9495 26.6648 29.5233 26.6648 29.5233M32.2816 24.9578C32.2816 24.9578 30.1141 24.159 28.8512 22.906C27.5883 21.6529 26.8167 20.2116 26.8167 20.2116" stroke="#130668" stroke-width="1.5"/>
                        </svg>
                    </div>
                </div>
            </div>

            <?php if ( $post_query->have_posts() ) : ?>
                <div class="w-full lg:w-2/3 overflow-visible relative z-0">
                    <div class="swiper-latest-news swiper !overflow-visible">
                        <div class="swiper-wrapper">
                            <?php while ( $post_query->have_posts() ) :
                                $post_query->the_post();?>
                                <div class="review swiper-slide">
                                    <div class="w-full flex flex-col gap-y-8">
                                        <?php if (has_post_thumbnail($post->ID)) : ?>
                                            <a href="<?php echo get_permalink($post->ID); ?>">
                                                <?php echo get_the_post_thumbnail($post->ID, 'full', ['class' => 'rounded-2xl w-full h-[267px] object-cover object-center']); ?>
                                            </a>
                                        <?php endif; ?>

                                        <div class="flex flex-wrap gap-2">
                                            <?php $categories = get_the_category();
                                            if ($categories) : ?>
                                                <?php foreach ($categories as $category) : ?>
                                                    <div class="feature-buttons">
                                                        <?php echo esc_html($category->name); ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                            <div class="feature-buttons">
                                                <?php echo get_reading_time(); ?> min read
                                            </div>
                                        </div>

                                        <div>
                                            <a class="text-xl font-semi-bold !text-dark" href="<?php echo get_permalink($post->ID); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        </div>
                        
                    </div>
                </div>
            <?php endif ?>
            <?php wp_reset_postdata(); ?>

        </div>
    </div>
</section>