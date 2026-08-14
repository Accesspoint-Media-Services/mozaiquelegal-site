<div class="flex flex-col lg:flex-row justify-between pb-10 pt-20 gap-x-10" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
    <div class="flex flex-col w-full lg:w-1/3 ">
        <?php $product_acordion = get_field('product_accordion'); 
        if ($product_acordion) :
            echo $product_acordion; 
        else : ?>
        <div class="eyebrow-headings mb-4">
            FAQ's
        </div>
        <h4>
            The <span class="blue-underline">answers </span>to your questions.
        </h4>
        <?php endif; ?>
    </div>
    <div class="flex flex-col w-full lg:w-2/3 ">
        <InnerBlocks 
            allowedBlocks="<?php echo esc_attr(wp_json_encode(['acf/faqs'])); ?>"
            template="<?php echo esc_attr(wp_json_encode([
                ['acf/faqs'],
                ['acf/faqs'],
                ['acf/faqs']
            ])); ?>"
        />
    </div>
</div>