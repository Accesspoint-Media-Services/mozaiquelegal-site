<div class="container">
    <div class="entry-header">
        <div class="uppercase tracking-wide text-pink">
            <?php the_title(); ?>
        </div>

        <h1 class="">
            Instant conveyancing quotes.<br> 
            <span style="background: linear-gradient(90deg, #1C0B8C 12.98%, #F06DF2 58.17%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">More conversions. Less Effort.</span>
        </h1>

        <div class="text-2xl">
            <?php the_excerpt(); ?>
        </div>

        <div class="relative cursor-pointer group" onclick="Supademo.open('cmipts4il2dmzgxad6d612csk')">
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image">
                    <?php the_post_thumbnail('full', [
                        'class' => 'w-full !h-full max-h-[535px] rounded-3xl object-cover object-center'
                    ]); ?>
                </div>
            <?php else : ?>
                <div class="featured-image">
                    <img src="" 
                    class="w-full !h-full object-cover max-h-[535px] rounded-3xl object-center">
                </div>
            <?php endif; ?>
            
            <!-- play icon code -->
            <div class="absolute bottom-8 left-8">
                <div class="bg-white/60 group-hover:bg-white group-hover:scale-105 transition-all duration-300 rounded-full px-8 py-4 flex items-center gap-5">
                    <div class="bg-[#F2E750] rounded-full p-4">
                        <svg class="w-10 h-10 text-primary" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-primary font-bold text-xl uppercase tracking-wide m-0">Watch Demo</p>
                        <p class="text-primary/70 text-base m-0">See how it works</p>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>