<?php get_header(); ?>

<div class="container pb-20">
    <div class="entry-header" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">

        <h1 class="">
            News, insights <br>
            & <span class="bg-gradient-to-r from-[#635FD9] to-[#13DCF2] bg-clip-text text-transparent">everything else.</span>
        </h1>

    </div>

    <!-- Filter and Search Section -->
    <div class="flex flex-col lg:flex-row items-center justify-between gap-4 pt-10 pb-12" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
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