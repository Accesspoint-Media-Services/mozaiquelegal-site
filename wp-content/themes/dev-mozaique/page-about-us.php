<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php
		while (have_posts()) :
			the_post();
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
                <div class="container">
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    
                </div>
            </article>

		<?php endwhile; ?>

	<?php endif; ?>

<?php
get_footer();


