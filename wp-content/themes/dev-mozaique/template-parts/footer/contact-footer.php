<?php 
$site_email = get_field('email_address', 'option');
$site_phone = get_field('phone_number', 'option');
$form_title = get_field('footer_form_title', 'option');
$form       = get_field('form', 'option');
?>

<section class="pt-20 lg:pt-28">
    <div class="footer-contact relative rounded-t-2xl z-10 bg-gradient-to-b from-[#635FD9] to-[#3F04BF]">
        <input type="checkbox" id="footer-toggle" />

        <div class="footer-contact-wrapper absolute bottom-0 left-0 right-0 rounded-t-2xl bg-[#635FD9]">
            <div class="container relative">
                <label for="footer-toggle" id="footer-cta-close" class="icon w-10 h-10 absolute z-10 top-6 sm:top-6 md:top-8 xl:top-10 2xl:top-12 right-12 2xl:right-[76px] cursor-pointer">
                    <svg id="footer-cta-icon-open" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="transition-opacity rounded-full p-4 border-2 border-white duration-500 fill-white w-16 h-16" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                    </svg>
                    <svg id="footer-cta-icon-close" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="opacity-0 top-11 absolute md:-top-4 left-10 2xl:left-20 transition-opacity duration-500 fill-white w-6 h-6 rounded-full" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                    </svg>
                </label>
            </div>

            <div id="footer-container" class="container text-white relative before:content-[''] before:absolute before:top-0 before:bottom-0 before:right-full before:w-1/3">

                <!-- Always visible header - clickable to open -->
                <label for="footer-toggle" class="block cursor-pointer">
                    <div id="footer-header" class="py-8 md:pt-10 px-4 transition-all duration-500 ease-out">
                        <h2 class="text-white pr-20 !m-0"><?php echo $form_title; ?></h2>
                    </div>
                </label>

                <!-- Collapsible content - hidden by default -->
                <div id="footer-content" class="footer-contact-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out">
                    <div class="flex flex-wrap md:flex-nowrap gap-8 py-14">

                        <div class="w-full md:w-1/3 flex flex-col gap-y-10 justify-center">
                            <h2 class="text-white pr-28 md:pr-0 2xl:text-6xl">
                                <?php echo $form_title; ?>
                            </h2>

                            <div class="hidden md:flex flex-col gap-4">

                                <?php if( $site_email ): 
                                    $link_url    = $site_email['url'];
                                    $link_title  = $site_email['title'];
                                    $link_target = $site_email['target'] ? $site_email['target'] : '_self';
                                ?>
                                    <a class="text-xl flex gap-x-3 !text-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="23" height="17" viewBox="0 0 23 17" fill="none">
                                            <g clip-path="url(#clip0_2467_907)">
                                                <path d="M21.4995 0H1.50055C0.673794 0 0 0.680612 0 1.51573V14.9128C0 15.748 0.673794 16.4286 1.50055 16.4286H21.4995C22.3262 16.4286 23 15.748 23 14.9128V1.51573C23 0.680612 22.3262 0 21.4995 0ZM20.967 1.17347L12.3587 9.78869C11.8863 10.262 11.1157 10.262 10.6413 9.78869L2.033 1.17347H20.9651H20.967ZM1.16171 14.3046V1.95187L6.99739 7.79184L1.16171 14.3046ZM1.87617 15.2551L7.82221 8.62109L9.82229 10.6238C10.285 11.0873 10.8911 11.3181 11.499 11.3181C12.107 11.3181 12.713 11.0873 13.1758 10.6238L15.1352 8.66216L21.1122 15.2571H1.87617V15.2551ZM21.8383 14.3163L15.9619 7.83291L21.8383 1.95187V14.3163Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2467_907">
                                                    <rect width="23" height="16.4286" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <?php echo esc_html( $link_title ); ?>
                                    </a>
                                <?php endif; ?>

                                <?php if( $site_phone ): 
                                    $link_url = $site_phone['url'];
                                    $link_title = $site_phone['title'];
                                    $link_target = $site_phone['target'] ? $site_phone['target'] : '_self';
                                ?>
                                    <a class="text-xl flex gap-x-3 !text-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                            <g clip-path="url(#clip0_2467_911)">
                                                <path d="M18.6608 14.6712C18.2648 14.3983 17.867 14.0935 17.482 13.798C15.9384 12.6143 14.1885 11.2725 12.7963 12.7103C11.9533 13.5797 11.2235 13.384 11.0337 13.3106C10.7819 13.0942 9.74552 12.1871 8.67263 11.0918C7.30961 9.69925 7.17459 9.07634 7.95554 7.75902C9.2182 5.62872 8.68175 4.83833 6.90636 2.2225L6.8279 2.10771C5.90098 0.74334 5.15288 0.118552 4.32266 0.0150485C3.34465 -0.107274 2.45422 0.558914 1.71341 1.22887C-0.109418 2.87176 -0.510841 5.55157 0.666059 8.22197C1.49445 10.102 3.94861 14.8406 8.82772 18.2204C11.2837 19.9217 13.3218 21 15.1848 21C16.4183 21 17.5751 20.5276 18.7246 19.4512C19.626 18.6062 20.0475 17.7217 19.9763 16.8222C19.8723 15.5237 18.7575 14.7389 18.6589 14.6712H18.6608ZM17.9911 18.6138C15.8836 20.586 13.7251 20.2491 9.44081 17.2814C4.79159 14.0634 2.45239 9.54682 1.66232 7.75338C0.678831 5.52146 0.967126 3.40057 2.43415 2.0776C3.15488 1.42647 3.67126 1.12913 4.08728 1.12913C4.12195 1.12913 4.15662 1.13101 4.18946 1.13477C4.66752 1.19499 5.22039 1.70875 5.92835 2.7532L6.00681 2.86799C7.76395 5.45747 7.9081 5.66824 7.01949 7.16811C5.83347 9.17044 6.41371 10.373 7.9008 11.8917C9.16528 13.1826 10.344 14.1876 10.3933 14.229C10.4243 14.2553 10.4571 14.2779 10.4936 14.2967C10.5557 14.3287 12.0409 15.0833 13.57 13.5063C14.2232 12.8326 15.1063 13.3802 16.8288 14.7013C17.2248 15.0062 17.6353 15.3205 18.055 15.6084C18.0568 15.6084 18.0586 15.6121 18.0623 15.6121C18.0696 15.6178 18.8268 16.141 18.887 16.9088C18.929 17.4413 18.6279 18.0134 17.9911 18.61V18.6138Z" fill="white"/>
                                                <path d="M15.8763 10.0756H16.9711C16.9711 6.39841 14.0699 3.40433 10.5027 3.40433V4.53346C13.4659 4.53346 15.8763 7.01944 15.8763 10.0756Z" fill="white"/>
                                                <path d="M18.9051 10.0756H19.9999C19.9999 4.6765 15.7411 0.282288 10.5044 0.282288V1.41142C15.1372 1.41142 18.9069 5.2994 18.9069 10.0775L18.9051 10.0756Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2467_911">
                                                    <rect width="20" height="21" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <?php echo esc_html( $link_title ); ?>
                                    </a>
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="w-full md:w-2/3">
                            <div class="bg-white rounded-2xl px-10 lg:px-20 py-10">
                                <?php echo $form; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>