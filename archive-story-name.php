<?php
/**
 * Template Name: Series Archive by Name
 * The template for displaying comic archives pages.
 * Peruse all stories visually showcasing the first image of each comic post on a four columns grid
 *
 * @package SilentComics
 */

get_header(); ?>

<section id="primary" 
    <main id="content" role="main">
		<div class="wrap">
			<header class="entry-header">

				<h3 class="taxonomy-description">
					<a href="<?php echo esc_url(get_post_type_archive_link( 'comic' )); ?>">
						<?php _e( '<span class="meta-nav">Comics Archive</span>', 'silentcomics' ); ?>
					</a></h3>
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header>

		<div class="content-comic columns">

		<?php

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		}
		else {
			$paged = 1;
		}

// Call and run loop in descending order
        $loop = new WP_Query(array(
            'post_type'         => 'comic',
            'story'             => 'name', // add story term here if you want this template to only archive a specific story
            'posts_per_page'    => 12, // unless stipulated, posts_per_page will default to Blog pages number set in dashboard, "reading settings"
            'paged'             => $paged, //you absolutely need this
            'orderby'           => 'date', // order by title or date
            'order'             => 'DESC')
            );

			// Start the loop
			if ( $loop->have_posts() ) :
			while ( $loop->have_posts() ) :
			$loop->the_post();
			?>
			<div class="column">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(_e('Permanent Link to %s', 'silentcomics'),the_title_attribute('echo=0')); ?>"></a>
			<?php if ( get_the_post_thumbnail() != '' ) {
				echo '<a href="';
                the_permalink();
                echo '" class="thumbnail-wrapper">';
				the_post_thumbnail();

                echo '</a>';
} else {
    echo '<a href="';
    the_permalink();
    echo '" class="thumbnail-wrapper">';
    echo '<img src="';
    echo catch_first_image();
    echo '" alt="" />';
    echo '</a>';
} ?>

<h2 class="series-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(_e('Permanent Link to %s', 'silentcomics'),the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>

			</div><!-- .column -->
			<?php endwhile; ?>
			</div><!-- .content-comic columns -->
			<?php else :
			get_template_part( 'no-results', 'archive-comic' );
			endif;
			wp_reset_postdata();
		?>

<?php
// get_next_posts_link() usage with max_num_pages ?>
<nav class="paging-navigation">
<div class="nav-previous-page">
<?php next_posts_link( esc_html_x( 'Previous episodes', 'Next posts link', 'silentcomics' ), $loop->max_num_pages ); ?>
 </div>
    <div class="nav-next-page">
<?php previous_posts_link( esc_html_x( 'Recent episodes' , 'Previous post link', 'silentcomics' )); ?>
</div>
</nav>
<?php // clean up after the query and pagination
wp_reset_postdata();
?>

        	</div><!-- .columns -->
        </div><!-- .wrap -->
	</main><!-- #content -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
