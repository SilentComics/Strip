<?php
/**
 * Dispay author bio and other information on single posts and author index page.
 * Dependent on bio being available for current author.
 *
 */
?>

<div class="author-info">
    <div class="author-avatar">
        <?php
        /**
         * Filter the SilentComics author bio avatar size.
         *
         * @since SilentComics 2.6.9
         *
         * @param int $size The avatar height and width size in pixels.
         */
        $author_bio_avatar_size = apply_filters('silentcomics_author_bio_avatar_size', 168);

        echo get_avatar(get_the_author_meta('user_email'), $author_bio_avatar_size);
        ?>
    </div><!-- .author-avatar -->

    <div class="author-meta">
 
    <div class="author-description">
        <h2 class="author-title"><span class="author-heading"><?php _e('&#9998;', 'silentcomics'); ?></span> <?php echo get_the_author(); ?></h2>
        

        <p class="author-bio">
            <?php the_author_meta('description'); ?>
            	<a class="author-link" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author">
                	<br> <?php printf(__('View all posts by %s', 'silentcomics'), get_the_author()); ?>
				</a>
			</p><!-- .author-bio -->
		</div><!-- .author-description -->
    </div><!-- .author-meta -->
</div><!-- .author-info -->
