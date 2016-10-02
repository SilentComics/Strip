<?php
/**
 *  The Template for displaying all single comics
 *
 * @package WordPress
 * @subpackage SilentComics
 */

if (post_type_exists($post_type)  && is_single()) {
    get_header('lite');
} else {
    get_header();
}
    ?>

    <section id="primary">
        <main id="content" role="main">

    <?php
    // Start the loop.
    while (have_posts()) :
        the_post();
        if ('comic' == get_post_type()) : ?>

            <div class="entry-comic">

                <?php get_template_part('content-comic'); ?>

                <?php silentcomics_content_nav('nav-below');
                set_transient('story', $post_type);?>

            </div><!-- #entry-comic -->

            <?php                                                                                                                                                                                                                      endif;
        wp_reset_query(); ?>

                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                if (comments_open() || '0' != get_comments_number()) {
                    comments_template();
                }
                ?>

        <?php                                                                                                             endwhile; // end of the loop. ?>

        </main><!-- #content -->
    </section><!-- #primary -->

<?php get_footer('lite'); ?>
