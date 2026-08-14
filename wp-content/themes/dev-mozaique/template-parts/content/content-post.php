<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <div class="container">
        <div class="entry-header">
            <div class="flex flex-wrap gap-2">
                <?php $categories = get_the_category();
            if ($categories) : ?>
                <?php foreach ($categories as $category) : ?>
                    <div class="feature-buttons">
                        <?php echo esc_html($category->name); ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
                <div class="feature-buttons">
                    <?php echo get_reading_time(); ?> min read
                </div>
                <time datetime="<?php get_the_date('c'); ?>" itemprop="datePublished" class="feature-buttons">
                    <?php echo get_the_date(); ?>
                </time>
            </div>
            <h1 class="h2">
                <?php the_title(); ?>
            </h1>
            <?php 
            if (has_post_thumbnail()) : ?>
                <div class="featured-image">
                    <?php the_post_thumbnail('full', [
                        'class' => 'w-full h-[225px] md:h-[335px] lg:h-[435px] 2xl:h-[535px] rounded-3xl object-cover object-center'
                    ]); ?>
                </div>
            <?php 
            else : ?>
                <div class="featured-image">
                    <img src="" 
                    class="w-full !h-full object-cover max-h-[535px] rounded-3xl object-center">
                </div>
            <?php 
            endif; ?>       

            <div class="share-links mt-4 flex items-center gap-x-2">
                <span class="">Share</span>
                
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" 
                target="_blank" class="w-8 h-8 rounded-full bg-teal flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                        <g clip-path="url(#clip0_2101_744)">
                            <path d="M7.20361 5.5111C7.1705 5.45656 7.15867 5.39016 7.1705 5.32613V4.4748C7.1705 4.32066 7.1705 4.32066 7.01205 4.32066H4.7701C4.58563 4.32066 4.60455 4.30169 4.60455 4.48192V12.8292C4.60455 13.0142 4.59036 12.9952 4.76537 12.9952H7.12556C7.14921 12.9952 7.1705 12.9952 7.19415 12.9952C7.27219 13.0023 7.29347 12.962 7.28874 12.8933C7.28401 12.8529 7.28874 12.815 7.28874 12.7747V8.61052C7.27928 8.2311 7.32658 7.85167 7.43064 7.48648C7.54416 7.02405 7.89889 6.65886 8.36005 6.53555C8.63912 6.45966 8.93237 6.44306 9.21852 6.49049C9.62056 6.54266 9.96111 6.80826 10.1125 7.18531C10.1598 7.29439 10.1952 7.40822 10.2213 7.52205C10.2993 7.90621 10.3324 8.29749 10.3206 8.68877V12.8363C10.3206 12.9929 10.3206 12.9929 10.4743 12.9929H12.8345C13.0261 12.9929 13.0048 13.0095 13.0048 12.8174V8.6698C13.0048 8.22872 13.0095 7.78527 12.974 7.34419C12.9456 6.8462 12.851 6.35532 12.695 5.88341C12.449 5.09374 11.8199 4.48192 11.023 4.26138C10.5382 4.12621 10.0321 4.07404 9.53069 4.10723C8.75263 4.13569 8.02187 4.49377 7.51814 5.09136C7.40462 5.21705 7.31949 5.36408 7.20597 5.50399L7.20361 5.5111Z" fill="#0F0456"/>
                            <path d="M2.89 8.66978V4.48664C2.89 4.30878 2.90892 4.3159 2.73155 4.3159H0.371353C0.203444 4.3159 0.215268 4.30641 0.215268 4.47241V12.8363C0.215268 12.9905 0.215268 12.9928 0.373718 12.9928H2.80013C2.86635 12.9976 2.89 12.9668 2.88763 12.9027V8.66978H2.89Z" fill="#0F0456"/>
                            <path d="M1.56322 6.03159e-06C0.702389 -0.00236537 0.00237096 0.694825 6.03557e-06 1.55564C-0.00235889 2.41646 0.690565 3.11839 1.5514 3.12314C2.41223 3.12788 3.10988 2.42832 3.11461 1.5675V1.56039C3.10988 0.70194 2.41933 0.00712022 1.56322 6.03159e-06Z" fill="#0F0456"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_2101_744">
                            <rect width="13" height="13" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                
                <a href="https://www.instagram.com/" 
                target="_blank" class="w-8 h-8 rounded-full bg-teal flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <g clip-path="url(#clip0_2101_750)">
                            <path d="M8 0C5.82746 0 5.55529 0.00972054 4.69988 0.0486027C4.03645 0.0607533 3.38032 0.18712 2.7582 0.420413C1.68408 0.833536 0.833536 1.68408 0.420413 2.76063C0.18712 3.38275 0.0607533 4.03888 0.0486027 4.70231C0.00972054 5.55529 0 5.82989 0 8.00243C0 10.175 0.00972054 10.4471 0.0486027 11.3026C0.0607533 11.966 0.18712 12.6221 0.420413 13.2442C0.835966 14.3183 1.68408 15.1689 2.76063 15.5844C3.38275 15.8177 4.03888 15.9441 4.70231 15.9563C5.55529 15.9951 5.82989 16.0049 8.00243 16.0049C10.175 16.0049 10.4471 15.9951 11.3001 15.9563C11.9635 15.9441 12.6197 15.8177 13.2418 15.5844C14.3159 15.1689 15.1665 14.3183 15.582 13.2442C15.8153 12.6221 15.9417 11.966 15.9538 11.3026C15.9927 10.4496 16.0024 10.175 16.0024 8.00243C16.0024 5.82989 15.9927 5.55772 15.9538 4.70231C15.9417 4.03888 15.8153 3.38275 15.582 2.76063C15.1665 1.68651 14.3183 0.835966 13.2418 0.420413C12.6197 0.18712 11.9635 0.0607533 11.3001 0.0486027C10.4471 0.00972054 10.1725 0 8.00243 0M8 1.44107C10.1361 1.44107 10.3888 1.44836 11.2321 1.48724C11.74 1.4921 12.2406 1.58688 12.7169 1.76185C13.4143 2.03159 13.966 2.58323 14.2357 3.28068C14.4131 3.75699 14.5055 4.25759 14.5103 4.76549C14.5492 5.60875 14.5589 5.86148 14.5589 8C14.5589 10.1385 14.5492 10.3888 14.5103 11.2321C14.5055 11.74 14.4131 12.243 14.2357 12.7169C13.9684 13.4143 13.4168 13.9684 12.7169 14.2357C12.2406 14.4131 11.74 14.5055 11.2321 14.5103C10.3888 14.5492 10.1361 14.5565 8 14.5565C5.86391 14.5565 5.61118 14.5468 4.76792 14.5103C4.26002 14.5055 3.75699 14.4131 3.28068 14.2357C2.58323 13.966 2.03159 13.4143 1.76185 12.7169C1.58445 12.2406 1.4921 11.74 1.48724 11.2321C1.44836 10.3888 1.44107 10.1361 1.44107 8C1.44107 5.86391 1.44836 5.61118 1.48724 4.76549C1.4921 4.25759 1.58688 3.75456 1.76185 3.28068C2.03159 2.58323 2.58323 2.03159 3.28068 1.76185C3.75699 1.58445 4.25759 1.4921 4.76549 1.48724C5.60875 1.44836 5.86148 1.44107 8 1.44107Z" fill="#0F0456"/>
                            <path d="M7.99999 10.6683C6.52733 10.6683 5.33171 9.47507 5.33171 8.00241C5.33171 6.52975 6.5249 5.33655 7.99756 5.33412C9.47022 5.33412 10.6658 6.52732 10.6658 7.99998C10.6658 9.47264 9.47265 10.6658 7.99999 10.6658M8.00242 3.89062C5.73268 3.89062 3.89307 5.73024 3.89307 7.99998C3.89307 10.2697 5.73268 12.1093 8.00242 12.1093C10.2722 12.1093 12.1118 10.2697 12.1118 7.99998C12.1118 5.73024 10.2722 3.89062 8.00242 3.89062Z" fill="#0F0456"/>
                            <path d="M13.2321 3.72785C13.2321 4.25762 12.8019 4.68775 12.2722 4.68775C11.7424 4.68775 11.3123 4.25762 11.3123 3.72785C11.3123 3.19808 11.7424 2.76794 12.2722 2.76794C12.8019 2.76794 13.2321 3.19808 13.2321 3.72785Z" fill="#0F0456"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_2101_750">
                            <rect width="16" height="16" fill="white"/>
                            </clipPath>
                        </defs>
                        </svg>
                </a>
                
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                target="_blank" class="w-8 h-8 rounded-full bg-teal flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17" viewBox="0 0 9 17" fill="none">
                        <g clip-path="url(#clip0_2101_756)">
                            <path d="M8.41015 9.48812L8.87768 6.43369H5.96104V4.45199C5.88765 3.61127 6.50468 2.86882 7.34189 2.79512C7.45334 2.7842 7.56478 2.78693 7.67623 2.80331H9.00272V0.204721C8.22259 0.0791586 7.43703 0.0109184 6.64875 0C4.24585 0 2.67472 1.46307 2.67472 4.11079V6.43915H0V9.49358H2.672V16.8744C3.76201 17.0464 4.87104 17.0464 5.95832 16.8744V9.49085H8.41015V9.48812Z" fill="#0F0456"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_2101_756">
                            <rect width="9" height="17" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                
                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                target="_blank" class="w-8 h-8 rounded-full bg-teal flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                        <g clip-path="url(#clip0_2101_759)">
                            <path d="M7.73672 5.50475L12.576 0H11.4292L7.22677 4.77942L3.87077 0H0L5.07536 7.22807L0 13H1.14678L5.58451 7.95261L9.12923 13H13L7.73672 5.50475ZM6.16593 7.29173L5.65196 6.5719L1.56035 0.844768H3.32147L6.62367 5.46624L7.13763 6.18606L11.43 12.1937H9.66889L6.16673 7.29173H6.16593Z" fill="#0F0456"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_2101_759">
                            <rect width="13" height="13" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                
                <a href="#" onclick="navigator.clipboard.writeText('<?php echo esc_url(get_permalink()); ?>'); return false;" 
                    class="w-8 h-8 rounded-full bg-teal flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="11" viewBox="0 0 13 11" fill="none">
                        <g clip-path="url(#clip0_2101_763)">
                            <path d="M2.21745 11C1.64939 11 1.08133 10.7677 0.649046 10.3026C-0.216023 9.3736 -0.216023 7.86094 0.649046 6.93189L4.51715 2.77531C5.38222 1.84573 6.78889 1.84573 7.65396 2.77531C8.51903 3.70436 8.51903 5.21702 7.65396 6.14607L7.1443 6.69373C7.04097 6.80477 6.87375 6.80477 6.77042 6.69373C6.66709 6.5827 6.66709 6.403 6.77042 6.29197L7.28008 5.7443C7.93899 5.03625 7.93899 3.88459 7.28008 3.17654C6.62117 2.46903 5.54944 2.46903 4.89053 3.17654L1.02243 7.33366C0.363518 8.04171 0.363518 9.19337 1.02243 9.90142C1.68134 10.6089 2.75307 10.6089 3.41198 9.90142L4.37339 8.86884C4.47672 8.75781 4.64394 8.75781 4.74727 8.86884C4.8506 8.97988 4.8506 9.15957 4.74727 9.27061L3.78586 10.3032C3.35357 10.7677 2.78551 11.0005 2.21745 11.0005V11Z" fill="#0F0456"/>
                            <path d="M6.91447 8.92201C6.34641 8.92201 5.77835 8.68975 5.34607 8.22469C4.481 7.29564 4.481 5.78299 5.34607 4.85394L6.24009 3.89324C6.34342 3.78221 6.51064 3.78221 6.61397 3.89324C6.7173 4.00428 6.7173 4.18397 6.61397 4.29501L5.71995 5.2557C5.06104 5.96376 5.06104 7.11541 5.71995 7.82346C6.37886 8.53098 7.45059 8.53098 8.1095 7.82346L11.9781 3.66635C12.637 2.95829 12.637 1.80664 11.9781 1.09859C11.3192 0.391073 10.2475 0.391073 9.58855 1.09859L8.80984 1.93538C8.70651 2.04641 8.53929 2.04641 8.43596 1.93538C8.33263 1.82434 8.33263 1.64465 8.43596 1.53361L9.21467 0.696823C10.0797 -0.232762 11.4864 -0.232762 12.3515 0.696823C13.2166 1.62587 13.2166 3.13853 12.3515 4.06757L8.48288 8.22469C8.05059 8.68922 7.48253 8.92201 6.91447 8.92201Z" fill="#0F0456"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_2101_763">
                            <rect width="13" height="11" fill="white"/>
                            </clipPath>
                        </defs>
                        </svg>
                </a>
            </div>
        </div>
        <div class="entry-content-wrapper">
            <aside>
                <nav class="toc flex flex-col gap-y-4">
                    <span class="toc-title">Contents</span>
                    <ul class="toc-list"></ul>
                </nav>
            </aside>
            <div class="entry-content">  
                <h3 id="overview" class="sr-only">Overview</h3>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</article>

<?php get_template_part('template-parts/footer/pre-footer-case-studies'); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
 const headings = document.querySelectorAll('.entry-content h1:not(.faq-block *), .entry-content h2:not(.faq-block *), .entry-content h3:not(.faq-block *), .entry-content h4:not(.faq-block *), .entry-content h5:not(.faq-block *), .entry-content h6:not(.faq-block *)');    
 const tocList = document.querySelector('.toc-list');
    
    // Build the TOC
    headings.forEach((heading, index) => {
        // Add ID to heading if it doesn't have one
        if (!heading.id) {
            heading.id = 'section-' + index;
        }
        
        const li = document.createElement('li');
        const a = document.createElement('a');
        a.href = '#' + heading.id;
        a.textContent = heading.textContent;
        li.appendChild(a);
        tocList.appendChild(li);
    });
    
    // Highlight on scroll
    const tocLinks = document.querySelectorAll('.toc-list a');
    
    const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            document.querySelectorAll('.toc-list li').forEach(li => li.classList.remove('active'));
            const activeLink = document.querySelector('.toc-list a[href="#' + entry.target.id + '"]');
            if (activeLink) activeLink.closest('li').classList.add('active');
        }
    });
}, {
    rootMargin: '0px 0px -70% 0px'
});
    
    headings.forEach(heading => observer.observe(heading));
});
</script>