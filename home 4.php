<?php
/**
 * Template Name: Four columns page
 *
 * The template for displaying comic series archives pages.
 * Show the first image of each comic post on a four columns grid.
 * T0DO: excerpts enhancements — Use this template as reference during develoment.
 *
 * @package WordPress
 * @subpackage Strip
 */

get_header(); ?>

<section id="primary"
		<div class="content" role="main">
		<div class="wrap">
			<header class="entry-header">
				<h3 class="taxonomy-description">
					<?php printf( '<a href="%s" class="post-parent-title">%s</a>',
						esc_url( get_post_type_archive_link( 'comic' ) ),
						esc_html( get_the_title() )
					); ?>
					</a></h3>
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header>

		<div class="four-columns">

			<?php
			// get the correct paged figure on a Custom Page That Isn’t Static Home Page.
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>


		<?php

					// Call and run loop in descending order.
					$loop = new WP_Query( array(
						'post_type'			     => 'comic',
						'story'              => '', // add story term here if you want this template to only archive a specific story.
						'posts_per_page'     => 12, // changes default Blog pages number "reading settings" set in dashboard.
						'paged'              => $paged, // you absolutely need this.
						'orderby'            => 'title', // order by title or date.
						'order'              => 'ASC',
					) );

					// Start the loop.
					if ( $loop->have_posts() ) :
						while ( $loop->have_posts() ) :
							$loop->the_post();
			?>
			<div class="four-column">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_html__( 'Permanent Link to %s', 'strip' ),the_title_attribute( 'echo=0' ) ); ?>"></a>
				<?php if ( get_the_post_thumbnail() !== '' ) {

					echo '<a href="';
					the_permalink();
					echo '" class="thumbnail-wrapper">';
					the_post_thumbnail( 'strip-medium' );

					echo '</a>';

} else {

	echo '<a href="';
	the_permalink();
	echo '" class="thumbnail-wrapper">';
	echo '<img src="';
	echo esc_html( get_first_image( 'strip-medium', 'url' ) );
	echo '" alt="" />';
	echo '</a>';
} ?>

<h2 class="series-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_html__( 'Permanent Link to %s', 'strip' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>

			</div><!-- .column -->
			<?php endwhile; ?>
			</div><!-- .columns -->
		<?php
			wp_reset_postdata();
		?>

		<?php
				$big = 999999999; // need an unlikely integer.
				$translated = __( 'Page', 'strip' ); // supply translatable string.

				echo wp_kses_post( paginate_links( // Data validation: wp_kses_post see https://developer.wordpress.org/reference/functions/wp_kses_post/.
					array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var( 'paged', 1 ) ),
					'total' => $loop->max_num_pages,
					'before_page_number' => '<span class="screen-reader-text">' . $translated . ' </span>',
					'prev_text' => esc_html__( 'Previous', 'strip' ), // If you want to change the previous link text.
					'next_text' => esc_html__( 'Next', 'strip' ), // If you want to change the next link text.
					'type' => 'title', // How you want the return value to be formatted.
					'add_fragment' => '#result', // Your anchor.
				) ) );

		else :
			get_template_part( 'no-results', 'archive-comic' );
		endif; ?>

				</div><!-- .wrap -->
	</main><!-- #content -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
