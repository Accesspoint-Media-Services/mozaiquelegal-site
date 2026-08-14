<?php 
    $bg = get_field('background');
    $direction = $bg['gradient_direction'] ?? 'to bottom right';
    $start = $bg['gradient_start'] ?? '#7B6FE8';
    $end = $bg['gradient_end'] ?? '#C084FC';
    $callout_text = get_field('callout_text');
?>

<div class="callout-block flex flex-col rounded-3xl text-white gap-y-6 px-6 py-4" 
style="background: linear-gradient(<?php echo esc_attr($direction); ?>, <?php echo esc_attr($start); ?>, <?php echo esc_attr($end); ?>);">
    <?php echo $callout_text; ?>
</div>
