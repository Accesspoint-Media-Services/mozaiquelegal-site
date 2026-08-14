<section class="bg-[#0F0456]  pt-20 rounded-t-3xl">
    <div class="flex ">
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
                            <img class="" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                        </div>
                    <?php endforeach; 
                endif; 
                ?>
            </div>
        </div>
    </div>
</section>


