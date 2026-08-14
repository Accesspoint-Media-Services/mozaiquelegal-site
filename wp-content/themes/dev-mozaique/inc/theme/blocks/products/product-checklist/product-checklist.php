<section class="break-container bg-[#0F0456] py-20 m-0 rounded-t-3xl" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">

    <div class="container">
        <h3 class="font-body items font-semibold alt-heading lg:w-3/5 mx-auto !text-white text-center mb-12">
            <?php echo get_field('checklist_title'); ?>
        </h3>

        <div class="grid grid-cols-1 items-center lg:grid-cols-2 gap-8 mb-8">
            
            <div class="text-white text-2xl">
                <?php echo get_field('checklist_overview'); ?>
            </div>
            
            <div class="text-gray-300 text-base">
                <?php echo get_field('checklist_text'); ?>
            </div>

        </div> 

        <!-- Checklist Items -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-10 gap-y-6">
            
            <?php if (have_rows('checklist_items')): ?>
                <?php while (have_rows('checklist_items')): the_row(); ?>
                    
                    <div class="flex items-start gap-6">
                        <span class="flex-shrink-0 w-6 h-6 mt-2 rounded-full flex items-center justify-center bg-pink">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="8" viewBox="0 0 13 8" fill="none">
                            <g clip-path="url(#clip0_2857_1914)">
                                <path d="M4.52234 8.00002C4.37769 8.00002 4.23305 7.95204 4.1223 7.85406L0.164895 4.35294C-0.0565927 4.15698 -0.0565927 3.84106 0.164895 3.64511C0.386384 3.44916 0.743477 3.44916 0.964965 3.64511L4.52234 6.79233L12.0349 0.145987C12.2563 -0.0499643 12.6134 -0.0499643 12.8349 0.145987C13.0564 0.341938 13.0564 0.657859 12.8349 0.85381L4.92011 7.85406C4.80937 7.95204 4.66472 8.00002 4.52008 8.00002H4.52234Z" fill="black"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_2857_1914">
                                <rect width="13" height="8" fill="white"/>
                                </clipPath>
                            </defs>
                            </svg>
                        </span>
                        
                        <div class="text-white">
                            <?php echo get_sub_field('item_text'); ?>
                        </div>
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; ?>

        </div>

        <!-- Download CTA Card -->
        <?php $document = get_field('download_brochure', get_queried_object_id()); ?>
        <?php if ($document): ?>
            <div class="lg:w-1/2 lg:mx-auto mt-12">
                <div class="rounded-2xl p-10 flex items-center justify-between" style="border-radius: 20px;
                    background: linear-gradient(179deg, #635FD9 0.57%, #13DCF2 99.4%);">
                    <div class="space-y-4">
                        <div class="eyebrow-headings !text-white">Find Out More</div>
                        <h5 class="alt-heading text-white">Download our FREE<br>product brochure</h5>
                    </div>
                    <a href="<?php echo $document['url']; ?>" download class="bg-white text-gray-900 
                    px-6 py-2 rounded-full font-medium inline-flex items-center gap-2 hover:bg-gray-100 transition-colors">
                        Download 
                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-1" width="17" height="11" viewBox="0 0 17 11" fill="none">
                        <path d="M0 5.34131H15M15 5.34131C15 5.34131 12.6888 6.33404 11.5909 7.48417C10.4931 8.63429 9.54545 10.3413 9.54545 10.3413M15 5.34131C15 5.34131 12.8539 4.52161 11.5909 3.19845C10.3279 1.87529 9.54545 0.341309 9.54545 0.341309" stroke="#CB91F2" stroke-width="1.5"/>
                        </svg>
                    </a>
                </div>
            </div>
        <?php endif; ?>

    </div>

</section>