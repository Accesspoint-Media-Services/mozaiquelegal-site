<div class="relative z-10 py-10">
    <div class="container">
        <div class="flex flex-col gap-y-4">
            <div class="eyebrow-headings !text-dark">
                our products
            </div>
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-x-10 gap-y-4">
                <h2 class="h1">
                    <span class="text-secondary">Smarter</span> legal work <br class="hidden xl:flex">starts here.
                </h2>
                <div class="text-2xl !text-dark justify-end">
                    <span class="whitespace-nowrap">How we take your business</span><br>
                    <span class="whitespace-nowrap">to the <span class="font-bold">next level.</span></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- this closes the video loop -->
</div> 

<!-- Custom Cursor -->
<div class="custom-cursor">
    <a href="#popup-contact-trigger">VIEW</a>
</div>


<?php $product_slides = get_field('product', 'options'); ?>

<div class="stacked-products">
    <?php 
    if ($product_slides) : 
        foreach ($product_slides as $slide) : 
            $product_link = '';
            if ($slide['select_product']) {
                $product = $slide['select_product'][0];
                $product_link = get_permalink($product->ID);
            }
        ?>
            <div class="product-card">
                <!-- <a href="#popup-contact-trigger" data-product-link="<?php echo esc_url($product_link); ?>"> -->
                 <a href="<?php echo esc_url($product_link); ?>">
                    <div class="product-card-inner">
                        <div class="container h-full">
                            <div class="flex flex-col lg:flex-row justify-center items-stretch gap-20 h-full">

                                <!-- Text Column -->
                                <div class="flex flex-col lg:w-1/2 gap-y-8">
                                    <?php if ($slide['select_product']) : ?>
                                        <?php foreach ($slide['select_product'] as $product) : ?>
                                            <h3 class="h2">
                                                <?php echo $product->post_title; ?>
                                            </h3>

                                            <?php if ($slide['product_tags']) : ?>
                                                <div class="flex flex-wrap gap-3">
                                                    <?php foreach ($slide['product_tags'] as $tag) : ?>
                                                        <div class="footer-buttons"><?php echo $tag['product_tag']; ?></div>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="text-dark flex">
                                                <?php echo nl2br($slide['product_description']); ?>
                                            </div>

                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Image Column -->
                                <div class="justify-center flex lg:w-1/2 rounded-[33px] h-full">
                                    <img class="w-full h-full object-cover object-center rounded-[33px]" src="<?php echo $slide['product_image']['url']; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach;
    endif; ?>
</div>


<!-- MOBILE VERSION — just stacked items -->
 <div class="container">
<div class="flex flex-col gap-y-10 lg:hidden bg-white py-10 rounded-3xl w-full">

    <?php if ($product_slides) : ?>
        <?php foreach ($product_slides as $slide) : ?>

            <?php 
                // get product link
                $product_link = '';
                if (!empty($slide['select_product'])) {
                    $product = $slide['select_product'][0];
                    $product_link = get_permalink($product->ID);
                }
            ?>

            <div class="flex w-full gap-x-6  pb-10 items-center  last:border-none border-b border-primary/30">

                <!-- Image -->
                <div class="justify-center h-full pl-4 w-1/3 flex rounded-2xl overflow-hidden">
                    <img class="w-full h-24 md:h-40 object-cover object-center rounded-[33px]"
                         src="<?php echo $slide['product_image']['url']; ?>"/>
                </div>

                <!-- Product title -->
                <h3 class="h2 flex-wrap flex text-black w-2/3">
                    <a class="text-dark flex text-wrap break-words hover:text-teal" href="<?php echo esc_url($product_link); ?>">
                        <?php echo esc_html($product->post_title); ?>
                    </a>
                </h3>

            </div>

        <?php endforeach; ?>
    <?php endif; ?>

</div>
 </div>
                
    