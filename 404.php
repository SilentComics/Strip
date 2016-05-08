<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package SilentComics
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<article id="post-0" class="post error404 not-found">
				<div class="entry-wrap wrap clear">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'silentcomics' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content clear">
						<p><?php _e( 'Nothing was found here. Maybe try one of the links below or a search?', 'silentcomics' ); ?></p>

						<?php get_search_form(); ?>

						<?php the_widget( 'WP_Widget_Recent_Posts', 6 ); ?>

						<div class="widget widget_most_used_categories">
							<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'silentcomics' ); ?></h2>
							<ul>
							<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 6 ) ); ?>
							</ul>
						</div>

						<?php the_widget( 'WP_Widget_Calendar', array( 'title' => __( 'Calendar', 'silentcomics' ) ) ); ?>

						<?php
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'silentcomics' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
						?>

					</div><!-- .entry-content -->
				</div><!-- .entry-wrap -->
			</article><!-- #post-0 .post .error404 .not-found -->

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
