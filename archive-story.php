<?php
/**
 * Template Name: Stories Archive
 *
 * The template for displaying comic series archives pages.
 * Showcasing the first image of each comic post on a four columns grid.
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

		<div class="columns">

		<?php
		if ( get_query_var( 'paged' ) ) {
			$paged = 1;
		}

					// Call and run loop in descending order.
					$loop = new WP_Query( array(
						'post_type'			     => 'comic',
						'story'              => '', // add story term here if you want this template to only archive a specific story.
						'posts_per_page'     => 12, // changes default Blog pages number "reading settings" set in dashboard.
						'paged'              => $paged, // you absolutely need this.
						'orderby'            => 'title', // order by title or date.
						'order'              => 'DESC',
					) );

					// Start the loop.
					if ( $loop->have_posts() ) :
						while ( $loop->have_posts() ) :
							$loop->the_post();
			?>
			<div class="column">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_html__( 'Permanent Link to %s', 'strip' ),the_title_attribute( 'echo=0' ) ); ?>"></a>
				<?php if ( get_the_post_thumbnail() !== '' ) {

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
	echo esc_html( get_first_image() );
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
// get_next_posts_link() usage with max_num_pages. ?>
<nav class="paging-navigation">
<div class="nav-previous-page">
<?php next_posts_link( esc_html_x( 'Previous episodes', 'Next posts link', 'strip' ), $loop->max_num_pages ); ?>
	</div>
		<div class="nav-next-page">
			<?php previous_posts_link( esc_html_x( 'Recent episodes' , 'Previous post link', 'strip' ) ); ?>
		</div>
</nav>
<?php // clean up after the query and pagination.
wp_reset_postdata();
?>
		<?php
		else :
			get_template_part( 'no-results', 'archive-comic' );
		endif; ?>

				</div><!-- .wrap -->
	</main><!-- #content -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
