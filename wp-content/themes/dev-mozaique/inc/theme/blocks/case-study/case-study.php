<?php
$case_study = get_field('select_case_study');
if ($case_study) : 
    $post = $case_study[0];
?>
    <div class="flex flex-col gap-y-4 mb-10">
        <?php if (has_post_thumbnail($post->ID)) : ?>
            <a href="<?php echo get_permalink($post->ID); ?>">
                <?php echo get_the_post_thumbnail($post->ID, 'full', ['class' => 'rounded-2xl w-full aspect-square h-auto max-h-[470px] object-cover object-center']); ?>
            </a>
        <?php endif; ?>

        <div class="flex flex-wrap gap-2 mt-4">
            <?php $related_products = get_field('related_product', $post->ID); ?>
            <?php if ($related_products) : ?>
                <?php foreach ($related_products as $product) : ?>
                    <div class="feature-buttons">
                        <?php echo esc_html($product->post_title); ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div>
            <?php $cs_title = get_field('case_study_title', $post->ID); ?>
            
            <a class="h5 font-semibold text-dark hover:text-pink" href="<?php echo get_permalink($post->ID); ?>">
                <?php echo $cs_title; ?>
            </a>
        </div>
    </div>
<?php endif; ?>