<div class="flex flex-col gap-y-8 py-10" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">

    <div class="flex flex-col xl:flex-row gap-y-8 gap-x-20 justify-between ">
        <div class="flex xl:w-1/2 !h-auto">
            <?php $product_content_image = get_field('product_content_image'); ?>
            <?php if ($product_content_image) : ?>
                <img class="w-full items-center max-h-[400px] xl:max-h-none !h-full object-cover rounded-2xl object-center" 
                src="<?php echo esc_url($product_content_image['url']); ?>" 
                alt="<?php echo esc_attr($product_content_image['alt']); ?>">
            <?php endif; ?>
        </div>

        <div class="flex flex-col xl:w-1/2 items-start">
            <?php $product_content_title = get_field('product_content_title'); ?>
            <?php $page_colour = get_field('page_colour', get_queried_object_id()); ?>
            <div class="eyebrow-headings mb-4" style="color: <?php echo esc_attr($page_colour); ?>;">
                <?php echo $product_content_title; ?>
            </div>

            <div>
                <?php echo get_field('product_content'); ?>
            </div>

            <div class="flex flex-col w-full product-content">
                <InnerBlocks 
                    allowedBlocks="<?php echo esc_attr(wp_json_encode(['acf/faqs'])); ?>"
                    template="<?php echo esc_attr(wp_json_encode([
                        ['acf/faqs'],
                        ['acf/faqs'],
                        ['acf/faqs']
                    ])); ?>"
                />
            </div>

            <?php $content_link = get_field('product_content_link'); ?>

            <?php if ($content_link) : ?>
                <a class="group inline-flex flex-row gap-x-2 items-center text-dark hover:text-purple font-bold" 
                href="<?php echo esc_url($content_link['url']); ?>"
                <?php echo $content_link['target'] ? 'target="' . esc_attr($content_link['target']) . '"' : ''; ?>>
                    <?php echo esc_html($content_link['title']); ?>
                    <svg class="transition-transform mt-1 duration-300 group-hover:translate-x-2 group-hover:scale-110" 
                 xmlns="http://www.w3.org/2000/svg" width="39" height="13" viewBox="0 0 39 13" fill="none">
                <path d="M0 6.18258H37M37 6.18258C37 6.18258 34.5347 7.34739 33.3636 8.69687C32.1926 10.0463 31.1818 12.0493 31.1818 12.0493M37 6.18258C37 6.18258 34.7109 5.2208 33.3636 3.6683C32.0164 2.1158 31.1818 0.315918 31.1818 0.315918" stroke="#130668" stroke-width="1.5"/>
                </svg>
                </a>
            <?php endif; ?>

        </div>

    </div>
</div>