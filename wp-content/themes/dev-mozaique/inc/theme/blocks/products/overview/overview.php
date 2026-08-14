<div class="overview-block py-12 flex items-center flex-col lg:flex-row gap-y-8 gap-x-16 justify-between" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">

    <div class="text-2xl lg:w-1/2">
        <?php $overview = get_field('overview'); ?>
        

        <?php $page_colour = get_field('page_colour', get_queried_object_id()); ?>
        <span class="eyebrow-headings pr-4" style="color: <?php echo esc_attr($page_colour); ?>;">
            overview
        </span> 
        <?php echo wp_strip_all_tags($overview); ?>
    </div>

    <div class="lg:w-1/2">
        <?php $overview_text = get_field('overview_text'); 
        $overview_text = preg_replace('/^<p>(.*)<\/p>$/s', '$1', trim($overview_text));
        ?>

        <?php echo $overview_text; ?>

    </div>

</div>
