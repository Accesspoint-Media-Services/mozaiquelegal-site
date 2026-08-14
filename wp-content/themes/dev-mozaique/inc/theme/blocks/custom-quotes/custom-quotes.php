<div class="quotes-block flex gap-y-4 p-0 flex-col mb-10">

    <?php $quote = get_field('quote'); ?>
     <?php $quote_source= get_field('quote_source'); ?>

    <div class="text-2xl text-dark flex flex-col">
        <span class="quotation">"</span>
        <span class="quote-text !-mt-10"><?php echo $quote; ?></span>
    </div>

    <div class="">
         <?php echo $quote_source; ?>
    </div>
</div>
