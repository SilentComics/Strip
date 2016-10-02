<?php
/**
 * Template Name: Archive titles
 * The template for displaying comic Archives by titles only.
 *
 * @package WordPress
 * @subpackage SilentComics
 */

 get_header(); ?>

    <section id="primary"
        <main id="content" role="main">

            <?php if ('' != get_the_post_thumbnail()) : ?>

            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'silentcomics'), the_title_attribute('echo=0'))); ?>" rel="<?php the_ID(); ?>" class="silentcomics-featured-thumbnail">
                <?php the_post_thumbnail('silentcomics-featured-thumbnail'); ?>
            </a>
            <?php endif; ?>

            <header class="entry-header">

            <?php the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>'); ?>

            <?php // call the series by title and list them ?>
                <title_ol=
            <h2 class="series-title">

            <?php
                $args = array(
                'post_type'     => 'comic',

                'title_li'  => __('<h2>' . __('Episodes', 'silentcomics') . '</h2>', 'silentcomics')
                );
                wp_list_pages($args);
            ?>
            </h2>
            <br>

        </main><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
