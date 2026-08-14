<div class="faq-block flex gap-y-2 flex-col border-b border-[#635FD940]">

    <?php $faq_question = get_field('faq_question'); ?>
     <?php $faq_answer= get_field('faq_answer'); ?>
    <h3 class="faq-question font-body font-semibold alt-heading text-xl  rounded-lg flex justify-between items-center py-4 cursor-pointer ">
            <?php echo $faq_question; ?>
    </h3>

    <div class="faq-answer">
         <?php echo $faq_answer; ?>
    </div>
</div>
