<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Strip
 */

get_header(); ?>
	<div class="wrap">
		<section id="primary"
			<main id="content" role="main">

			<article id="post-0" class="post error404 not-found">

				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'strip' ); ?></h1>
				</header><!-- .entry-header -->

					<div class="entry-content clear">
						<p><?php esc_html_e( 'Nothing was found here. Maybe try one of the links below or a search?', 'strip' ); ?></p>

		<?php get_search_form(); ?>

		<?php the_widget( 'WP_Widget_Recent_Posts', 6 ); ?>

						<div class="widget widget_most_used_categories">
							<h2 class="widgettitle"><?php esc_html_e( 'Most Used Categories', 'strip' ); ?></h2>
							<ul>
		<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 6 ) ); ?>
							</ul>
						</div>

		<?php the_widget( 'WP_Widget_Calendar', array( 'title' => __( 'Calendar', 'strip' ) ) ); ?>

		<?php
		/* translators: %1$s: smiley */
		$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'strip' ), convert_smilies( ':)' ) ) . '</p>';
		the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
		?>

					</div><!-- entry-content clear -->

			</main><!-- #content -->
		</section><!-- #primary -->
	</div><!-- .wrap -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
