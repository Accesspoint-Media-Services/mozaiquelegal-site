<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <div class="container">
        <div class="entry-content">
            <h1>
                <?php the_title(); ?>
            </h1>
            <?php the_content(); ?>
        </div>
        
    </div>
</article>