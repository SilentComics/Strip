<?php
/**
 * Template Name: Archive all comics
 *
 * The template for displaying comic Archives pages
 * An overview to peruse all stories — has links to custom comic posts in a second loop
 *
 * @package SilentComics
 */

get_header(); ?>
    <section id="primary"
        <main id="content" role="main">

			<?php if (have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
							printf(
							__('STORIES %s', 'silentcomics'), '<span>' .
							single_cat_title('', false) . '</span>'
							);
						?>
                	</h1>

                    <h2 class="taxonomy-description">
                        <a href="<?php echo esc_url(home_url('/series/')); ?>">
						<?php _e('<span class="meta-nav">Series</span>', 'silentcomics'); ?>
                        </a>
                    </h2>

                    <h4 class="series-title">
                    <a href="<?php echo esc_url(home_url('/story/exile/')); ?>">ExIle</a></h4>
                    <h4 class="series-title">
                    <a href="<?php echo esc_url(home_url('/story/tofu/')); ?>">Morning Tofu Chase</a></h4>
                    <h3 class="series-title">
                    <a href="<?php echo esc_url(home_url('/story/sentient-drone/')); ?>">Sentient Drone</a></h3>

                <?php
                    // Show an optional term description.
                    $term_description = term_description();
                if (! empty($term_description) ) :
                    printf('<div class="taxonomy-description">%s</div>', $term_description);
                endif;
                ?>
            </header><!-- .page-header -->

<?php
    // Create and run first loop in reverse order
    $comic = new WP_Query();
    $comic = new WP_Query(
        array(
                    'post_type'      => 'comic',
                    'posts_per_page' => 12, // optional, changes default Blog pages number "reading settings" set in dashboard
                    'paged'          => $paged,
                    'orderby'        => 'title',
                    'order'          => 'DESC',)
    );

    while ($comic->have_posts()) : $comic->the_post();
        get_template_part('content-comic');
        // change to 'content' to style it like the blog entry page
                ?>
    <?php endwhile;
                        wp_reset_postdata(); ?>

        <?php silentcomics_content_nav('nav-below'); ?>

    <?php else : ?>

    <?php get_template_part('no-results', 'archive-comic'); ?>

    <?php endif;
            wp_reset_postdata(); ?>

        </main><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
