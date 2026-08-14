</main>

<?php do_action( 'apwp_content_end' ); ?>

 <!-- content being closed -->
</div>

<?php do_action( 'apwp_content_after' ); ?>

<?php get_template_part('template-parts/footer/contact-footer'); ?>

<footer id="colophon" class="site-footer bg-gradient-to-r from-[#635FD9] via-[#3F04BF] to-[#635FD9]" role="contentinfo">
	<?php do_action( 'apwp_footer' ); ?>

    <div class="rounded-t-3xl py-12 bg-white">

        <div class="container">

            <div class="flex flex-col lg:flex-row gap-y-6 lg:justify-between"> 
                <div class="relative justify-between flex flex-col gap-y-6">
                    <a class="flex" href="/home">
                        <svg xmlns="http://www.w3.org/2000/svg" width="69" height="69" viewBox="0 0 69 69" fill="none">
                            <g clip-path="url(#clip0_2467_857)">
                            <path d="M60.2038 0.235483C48.5398 3.36114 39.3583 12.5454 36.255 24.1917C35.0779 28.6233 38.4166 32.9907 42.9967 32.9907H62.023C65.8754 32.9907 69.0001 29.865 69.0001 26.0115V7.00061C69.0001 2.41916 64.6341 -0.941991 60.2038 0.256892V0.235483Z" fill="#3F04BF"/>
                            <path d="M8.79622 0.235151C20.4603 3.36081 29.6417 12.5451 32.745 24.1914C33.9221 28.623 30.5834 32.9903 26.0034 32.9903H6.97705C3.12469 32.9903 0 29.8647 0 26.0111V7.00028C0 2.39742 4.36601 -0.942324 8.79622 0.235151Z" fill="#6C3AD6"/>
                            <path d="M60.2038 68.7645C48.5398 65.6388 39.3583 56.4545 36.255 44.8083C35.0779 40.3767 38.4166 36.0093 42.9967 36.0093H62.023C65.8754 36.0093 69.0001 39.135 69.0001 42.9885V61.9994C69.0001 66.5808 64.6341 69.942 60.2038 68.7431V68.7645Z" fill="#1C0B8C"/>
                            <path d="M8.79622 68.7645C20.4603 65.6388 29.6417 56.4545 32.745 44.8083C33.9221 40.3767 30.5834 36.0093 26.0034 36.0093H6.97705C3.12469 36.0093 0 39.135 0 42.9885V61.9994C0 66.5808 4.36601 69.942 8.79622 68.7431V68.7645Z" fill="#635FD9"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_2467_857">
                            <rect width="69" height="69" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </a>
                    
                    <div class="absolute lg:hidden gap-x-1 right-4 top-0">
                        Gone too far?  
                        <a href="#top" class="font-bold"> Send me back up ⤒</a>
                    </div>

                    <?php if( have_rows('social_links', 'options') ): ?>
                        <div class="flex flex-wrap gap-6">

                            <?php while( have_rows('social_links', 'options') ) : the_row(); 

                                $link = get_sub_field('link','options');

                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>

                                <a class="inline-flex !text-dark flex-row gap-x-2 items-center" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                    <?php echo esc_html( $link_title ); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                    <path d="M0.422826 10.4905L12.3555 2.34809M12.3555 2.34809C12.3555 2.34809 11.1501 4.53072 11.0104 6.20182C10.8707 7.87291 11.2058 9.98305 11.2058 9.98305M12.3555 2.34809C12.3555 2.34809 10.1254 2.74677 8.27661 2.19546C6.42785 1.64414 4.8269 0.634876 4.8269 0.634876" stroke="#130668" stroke-width="1.5"/>
                                    </svg>
                                </a>

                                <?php endif; ?>

                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                    <?php endif; ?>


                    <?php if( have_rows('footer_links', 'options') ): ?>
                        <div class="flex flex-wrap gap-6">

                            <?php while( have_rows('footer_links', 'options') ) : the_row(); 

                                $footerLink = get_sub_field('link','options');

                                if( $footerLink ): 
                                    $link_url = $footerLink['url'];
                                    $link_title = $footerLink['title'];
                                    $link_target = $footerLink['target'] ? $footerLink['target'] : '_self';
                                ?>

                                <a class="footer-buttons" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                    <?php echo esc_html( $link_title ); ?>
                                </a>

                                <?php endif; ?>

                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                    <?php endif; ?>


                    <div class="hidden lg:flex">
                        &copy; Mozaique Legal <?php echo date_i18n( 'Y' );?>. Brought to you by <a href="https://accesspoint.legal/" target="_blank" class="ml-1 !text-black font-bold"> Accesspoint.</a>
                    </div>
                </div>

                <div class="flex lg:items-end flex-col gap-y-6">

                    <div class="hidden lg:flex gap-x-1">
                        Gone too far?  
                        <a href="#top" class="font-bold"> Send me back up ⤒</a>
                    </div>
         
                    <?php $emailLink = get_field('footer_email', 'options'); if( $emailLink ): 
                        $link_url = $emailLink['url'];
                        $link_title = $emailLink['title'];
                        $link_target = $emailLink['target'] ? $emailLink['target'] : '_self';
                    ?>
                        <h2 class="flex footer-contact text-xl flex-wrap">
                            <a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        </h2>
                    <?php endif; ?>

                    <!-- <a class="footer-buttons" href="" target="_blank">
                        Sign up to our newsletter
                    </a> -->

                    <?php if( have_rows('footer_images', 'options') ): ?>

                        <?php while( have_rows('footer_images', 'options') ) : the_row();

                            $image = get_sub_field('image');

                            if( $image ): ?>

                                <img class="w-60 h-auto" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">

                            <?php endif; ?>

                        <?php endwhile; ?>

                    <?php endif; ?>

                    <div class="lg:hidden">
                        &copy; Mozaique Legal <?php echo date_i18n( 'Y' );?>. Brought to you by<a href="https://accesspoint.legal/" target="_blank" class="ml-1 !text-black font-bold"> Accesspoint.</a>
                    </div>
                </div>



            </div>

        </div>

    </div>

</footer>

<dialog class="dialog contact-dialog">
    <div class="dialog-wrap">
        <div class="dialog-content h-full grid grid-cols-1 lg:grid-cols-[3.5fr_6.5fr] grid-rows-[auto_1fr] lg:grid-rows-1 gap-[calc(1.5vh+1.5vw)] lg:gap-[calc(3vh+3vw)] items-center">
            <div class="dialog-content-header bg-primary px-[calc(2vh+2vw)] py-[calc(2vh+2vw)] md:p-[calc(3vh+3vw)] rounded-3xl text-white h-full">
                
                <h2 class="dialog-content-header-title alt-heading h1 mb-4 md:mb-8 !text-white">Get in touch</h2>
               
            </div>
            <div class="dialog-content-body sm:p-[calc(1vh+1vw)] md:p-0 h-full md:h-auto">
                <?php echo do_shortcode('[gravityform id="3" title="false" ajax="true"]'); ?>
            </div>
        </div>
        <button title="Close Dialog" name="Close Dialog" class="dialog-close">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="fill-current" viewBox="0 0 16 16">
              <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
          </svg>
          <span class="sr-only">Close Dialog</span>
      </button>
    </div>
    
</dialog>

<dialog class="dialog-2 contact-dialog-2">
    <div class="dialog-wrap">
        <div class="dialog-content h-full grid grid-cols-1 lg:grid-cols-[3.5fr_6.5fr] grid-rows-[auto_1fr] lg:grid-rows-1 gap-[calc(1.5vh+1.5vw)] lg:gap-[calc(3vh+3vw)] items-center">
            <div class="dialog-content-header bg-primary px-[calc(2vh+2vw)] py-[calc(2vh+2vw)] md:p-[calc(2.5vh+2.5vw)] 
            rounded-3xl text-white h-full">
                
                <h2 class="dialog-content-header-title alt-heading h1 mb-4 md:mb-8 !text-white">Sign up to Legal Aid Manager</h2>

                <div class="mt-4 text-white text-lg">
                    Fill in the form and a member of our team will be in touch to get you set up
                </div>
               
            </div>
            <div class="dialog-content-body sm:p-[calc(1vh+1vw)] md:p-0 h-full md:h-auto">
                <?php echo do_shortcode('[gravityform id="5" title="false" ajax="true"]'); ?>
            </div>
        </div>
        <button title="Close Dialog" name="Close Dialog" class="dialog-close">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="fill-current" viewBox="0 0 16 16">
              <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
          </svg>
          <span class="sr-only">Close Dialog</span>
      </button>
    </div>
    
</dialog>

<!-- closing page -->
</div>

<?php wp_footer(); ?>

<!-- <div id="backToTop" class="fixed right-6 bottom-[134px] bg-[#635FD9] p-2 rounded-full shadow-lg cursor-pointer z-50 opacity-0 pointer-events-none transition-opacity duration-300">
    <a href="#top">
        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="fill-white" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
        </svg>
    </a>
</div> -->


<?php get_template_part('template-parts/footer/book-a-demo-sticky');?>

    <!-- <img src="/wp-content/uploads/2025/12/Layer_1.png"> -->



<!-- <div class="fixed bg-primary z-50 p-2 leading-none !text-white" style="bottom:15%;left:0;">
    <span class="block sm:hidden">XS</span>
    <span class="hidden sm:block md:hidden">SM</span>
    <span class="hidden md:block lg:hidden">MD</span>
    <span class="hidden lg:block xl:hidden">LG</span>
    <span class="hidden xl:block 2xl:hidden">XL</span>
    <span class="hidden 2xl:block">2XL</span>
</div> -->

</body>
</html>