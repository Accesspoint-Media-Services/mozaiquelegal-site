<?php $review_bg = get_field('review_bg'); ?>
<?php $review = get_field('review'); ?>
<?php $review_source= get_field('review_source'); ?>

<div class="review-block rounded-2xl flex p-8 flex-col mb-10 style=" style="background-color: <?php echo esc_attr($review_bg); ?>;">

    <div class="text-dark flex flex-col">
        <?php echo $review; ?>
    </div>

    <div class="text-primary">
         <?php echo $review_source; ?>
    </div>
</div>
