<?php get_header(); ?>

<div class="container pb-20">
    <div class="entry-header" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">

        <h1 class="">
            News, insights <br>
            & <span class="bg-gradient-to-r from-[#635FD9] to-[#13DCF2] bg-clip-text text-transparent">everything else.</span>
        </h1>

        <div class="flex flex-col gap-y-6 border-b-2 border-primary pb-10">
            <?php 
            $latest_post = get_posts(['numberposts' => 1])[0] ?? null;
            if ($latest_post && has_post_thumbnail($latest_post->ID)) : ?>
            <a href="<?php echo get_permalink($latest_post->ID); ?>">
                <div class="featured-image">
                    <?php echo get_the_post_thumbnail($latest_post->ID, 'full', [
                        'class' => 'w-full h-[225px] md:h-[335px] lg:h-[435px] 2xl:h-[535px] rounded-3xl object-cover object-center'
                    ]); ?>
                </div>
            </a>

                <div class="container flex flex-wrap gap-4">

                    <div class="feature-buttons items-center flex gap-x-2 !border-[#13DCF2]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                            <g clip-path="url(#clip0_2498_673)">
                                <path d="M3.29332 13C3.02169 13 2.75406 12.9127 2.52438 12.7381C2.11695 12.4304 1.91722 11.9191 2.0031 11.4036L2.47046 8.56412C2.48843 8.4581 2.45448 8.35001 2.38058 8.27518L0.397327 6.26511C0.0378243 5.89926 -0.0899987 5.36296 0.0657856 4.86616C0.22157 4.36728 0.627008 4.01183 1.12432 3.937L3.86253 3.52334C3.96439 3.50879 4.05227 3.44019 4.0982 3.34458L5.32251 0.762868C5.5462 0.293089 5.99557 0.0020752 6.49888 0.0020752C7.00218 0.0020752 7.45156 0.293089 7.67525 0.762868L8.89955 3.34458C8.94549 3.44019 9.03337 3.50671 9.13523 3.52334L11.8734 3.937C12.3707 4.01183 12.7762 4.36936 12.932 4.86616C13.0878 5.36504 12.9599 5.89926 12.6004 6.26511L10.6192 8.27518C10.5453 8.35001 10.5113 8.4581 10.5293 8.56412L10.9967 11.4015C11.0825 11.917 10.8808 12.4284 10.4754 12.736C10.0679 13.0436 9.53867 13.0831 9.09329 12.8399L6.64468 11.4992C6.5528 11.4493 6.44495 11.4493 6.35308 11.4992L3.90447 12.8399C3.71074 12.946 3.50103 12.9979 3.29332 12.9979V13ZM6.49888 1.03933C6.44096 1.03933 6.29516 1.05596 6.21727 1.22018L4.99296 3.80188C4.80123 4.20514 4.43174 4.48369 4.00433 4.54813L1.26612 4.96178C1.09236 4.9888 1.03245 5.126 1.01247 5.1842C0.9945 5.2424 0.966538 5.38999 1.09236 5.51886L3.07362 7.52894C3.38319 7.84282 3.523 8.29389 3.4511 8.73664L2.98375 11.5761C2.95379 11.757 3.06164 11.8588 3.10757 11.8941C3.15551 11.9295 3.28133 12.0043 3.43712 11.9191L5.88573 10.5783C6.2672 10.3684 6.72457 10.3684 7.10604 10.5783L9.55465 11.9191C9.71043 12.0043 9.83825 11.9295 9.88419 11.8941C9.93213 11.8588 10.038 11.7549 10.008 11.5761L9.54067 8.73664C9.46877 8.29389 9.60857 7.84282 9.91814 7.52894L11.8994 5.51886C12.0252 5.39207 11.9973 5.2424 11.9793 5.1842C11.9613 5.126 11.8994 4.9888 11.7256 4.96178L8.98743 4.54813C8.56002 4.48369 8.19054 4.20514 7.9988 3.80188L6.7745 1.2181C6.6966 1.05388 6.5528 1.03725 6.49289 1.03725L6.49888 1.03933Z" fill="#13DCF2"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_2498_673">
                                <rect width="13" height="13" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        Featured
                    </div>
                    
                    <?php
                    $categories = get_the_category($latest_post->ID);
                    if ($categories) : ?>
                        <?php foreach ($categories as $category) : ?>
                            <div class="feature-buttons">
                                <?php echo esc_html($category->name); ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <!-- <?php $related_products = get_field('related_product', $latest_post->ID); ?>
                    <?php if ($related_products) : ?>
                        <?php foreach ($related_products as $product) : ?>
                            <div class="feature-buttons">
                                <?php echo esc_html($product->post_title); ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?> -->

                    <div class="feature-buttons">
                        <?php echo get_reading_time($latest_post->ID); ?> min read
                    </div>
                </div>

                <a class="container" href="<?php echo get_permalink($latest_post->ID); ?>">
                    <h2><?php echo get_the_title($latest_post->ID); ?></h2>
                </a>
            <?php endif; ?>
        </div>

    </div>

    <!-- Filter and Search Section -->
    <div class="flex flex-col lg:flex-row items-center justify-between gap-4 pt-8 pb-10">
        <div class="flex lg:flex-row flex-col items-center gap-6 w-full lg:w-2/3">
            
            <!-- Category Dropdown -->
            <div class="flex relative w-full lg:w-1/3 gap-x-4 items-center">
                <span class="">Filter:</span>
                <select id="category-filter" class="appearance-none bg-white border border-gray-300 
                rounded-full px-4 py-2 pr-10  focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent 
                cursor-pointer w-full">
                    <option value="">Show all</option>
                    <?php
                    $categories = get_categories(['hide_empty' => true]);
                    foreach ($categories as $category) :
                    ?>
                        <option value="<?php echo esc_attr($category->slug); ?>">
                            <?php echo esc_html($category->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="9" viewBox="0 0 15 9" fill="none">
                    <path d="M14.4219 0.687866C14.4219 0.687866 12.2587 1.6268 10.3929 3.14241C8.52706 4.65803 7.37117 7.23332 7.37117 7.23332C7.37117 7.23332 5.97128 4.45983 4.34944 3.14241C2.7276 1.825 0.320464 0.687866 0.320464 0.687866" stroke="#1C0B8C" stroke-width="1.5"/>
                    </svg>
                </div>
            </div>

            <!-- Search Input -->
            <div class="flex relative w-full lg:w-3/5">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input 
                    type="text" 
                    id="post-search" 
                    placeholder="Search" 
                    class="bg-white border border-gray-300 rounded-full pl-10 
                    pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent w-full"
                >
            </div>
        </div>

        <!-- Results Count -->
        <div id="results-count" class="">
            <?php
            global $wp_query;
            $total = $wp_query->found_posts;
            $per_page = get_query_var('posts_per_page');
            $start = 1;
            $end = min($per_page, $total);
            ?>
            Showing <?php echo $start; ?>-<?php echo $end; ?> of <?php echo $total; ?> posts.
        </div>
    </div>

    <!-- Loading Spinner -->
    <div id="loading-spinner" class="hidden flex justify-center py-10">
        <svg class="animate-spin h-8 w-8 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>

    <div id="posts-container" class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-14 gap-y-10 sm:px-20 md:px-0" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">

        <?php if (have_posts()) : ?>
            <?php
            while (have_posts()) :
                the_post();
                ?>

                <?php get_template_part('template-parts/content/loop', get_post_type()); ?>

            <?php endwhile; ?>

        <?php else : ?>
            <div class="col-span-full text-center py-10">
                No posts found.
            </div>
        <?php endif; ?>
    </div>

    <div id="pagination-container" class="col-span-full flex justify-center pt-6">
        <div class="flex flex-wrap !gap-y-2 text-lg pagination">
            <?php
            $paged = max(1, get_query_var('paged'));
            echo paginate_links(array(
                'current'   => $paged,
                'prev_text' => '← ',
                'next_text' => ' →',
            ));
            ?>
        </div>
    </div>

    <?php wp_reset_postdata(); ?>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilter = document.getElementById('category-filter');
    const searchInput = document.getElementById('post-search');
    const postsContainer = document.getElementById('posts-container');
    const paginationContainer = document.getElementById('pagination-container');
    const resultsCount = document.getElementById('results-count');
    const loadingSpinner = document.getElementById('loading-spinner');
    
    let searchTimeout;
    let currentPage = 1;

    // Handle category change
    categoryFilter.addEventListener('change', function() {
        currentPage = 1;
        fetchPosts();
    });

    // Handle search with debounce
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            currentPage = 1;
            fetchPosts();
        }, 300);
    });

    // Handle pagination clicks (event delegation)
    paginationContainer.addEventListener('click', function(e) {
        if (e.target.closest('a.page-numbers')) {
            e.preventDefault();
            const link = e.target.closest('a.page-numbers');
            const url = new URL(link.href);
            currentPage = url.searchParams.get('paged') || 1;
            
            // Handle prev/next
            if (link.classList.contains('prev')) {
                currentPage = Math.max(1, parseInt(document.querySelector('.page-numbers.current')?.textContent || 1) - 1);
            } else if (link.classList.contains('next')) {
                currentPage = parseInt(document.querySelector('.page-numbers.current')?.textContent || 1) + 1;
            } else {
                currentPage = parseInt(link.textContent) || 1;
            }
            
            fetchPosts();
            
            // Scroll to top of posts
            postsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });

    function fetchPosts() {
        const category = categoryFilter.value;
        const search = searchInput.value.trim();

        // Show loading state
        loadingSpinner.classList.remove('hidden');
        postsContainer.style.opacity = '0.5';

        const formData = new FormData();
        formData.append('action', 'filter_posts');
        formData.append('category', category);
        formData.append('search', search);
        formData.append('paged', currentPage);
        formData.append('nonce', '<?php echo wp_create_nonce("filter_posts_nonce"); ?>');

        fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                postsContainer.innerHTML = data.data.posts;
                paginationContainer.innerHTML = data.data.pagination;
                resultsCount.textContent = data.data.count;
                
                // Re-initialize AOS for new content if you're using it
                if (typeof AOS !== 'undefined') {
                    AOS.refresh();
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
        })
        .finally(() => {
            // Hide loading state
            loadingSpinner.classList.add('hidden');
            postsContainer.style.opacity = '1';
        });
    }
});
</script>

<?php get_footer(); ?>