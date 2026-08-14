<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
   <div class="flex flex-col gap-y-4">

        <?php if(has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('full', ['class' => 'rounded-2xl w-full h-[225px] object-cover object-center']); ?>
            </a>
        <?php endif; ?>  

        <div class="flex flex-wrap gap-4 mt-4">
            <!-- <?php $related_products = get_field('related_product'); ?>
            <?php if ($related_products) : ?>
                <?php foreach ($related_products as $product) : ?>
                    <div class="feature-buttons">
                        <?php echo esc_html($product->post_title); ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?> -->
            <?php 
            $categories = get_the_category();
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
            <a class="h5 text-dark hover:text-pink" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>
   </div>
</article>