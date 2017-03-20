<?php
/**
 * The template for displaying Archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Strip
 */

get_header(); ?>

	<div id="primary"
		<div id="content" role="main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<div class="wrap">
				<h1 class="page-title">
					<?php
					if ( is_author() && get_the_author_meta( 'description' ) ) {
						echo '<div class="author-index shorter">';
						get_template_part( 'inc/author','box' );
						echo '</div>';
					}
					?>
						<?php
						if ( is_category() ) :
							printf( esc_html__( 'Category Archives: %s', 'strip' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							elseif ( is_tag() ) :
								printf( esc_html__( 'Tag Archives: %s', 'strip' ), '<span>' . single_tag_title( '', false ) . '</span>' );

							elseif ( is_author() ) :
								printf( esc_html__( 'All articles by %s', 'strip' ), '<span class="vcard">' . get_the_author() . '</span>' );

							elseif ( is_day() ) :
								printf( esc_html__( 'Daily Archives: %s', 'strip' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( esc_html__( 'Monthly Archives: %s', 'strip' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							elseif ( is_year() ) :
								printf( esc_html__( 'Yearly Archives: %s', 'strip' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								esc_html_e( 'Asides', 'strip' );

								elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
									esc_html_e( 'Galleries', 'strip' );

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								esc_html_e( 'Images', 'strip' );

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								esc_html_e( 'Videos', 'strip' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								esc_html_e( 'Quotes', 'strip' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								esc_html_e( 'Links', 'strip' );

								elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
									esc_html_e( 'Audios', 'strip' );

							elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
								esc_html_e( 'Chats', 'strip' );

							elseif ( is_tax( 'story', 'story_term' ) ) :
								esc_html_e( 'Stories', 'strip' );
								get_template_part( 'archive-comic' );

						elseif ( ! 'comic' === get_post_type() ) :
							esc_html_e( 'Comics', 'strip' );

							else :
								esc_html_e( 'Archives', 'strip' );

							endif;
						?>
					</h1>
					<?php
						// Show an optional term description.
						$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						echo '<div class="taxonomy-description">';
						echo term_description();
						echo '</div>';
			endif;
					?>
				</div><!-- .wrap -->
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<div class="wrap">
					<?php the_posts_pagination( array(
						'prev_text' => esc_html_x( '&#8592;', 'Previous page link', 'strip' ) . '<span class="screen-reader-text">' . esc_html_e( 'Previous page', 'strip' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . esc_html_e( 'Next page', 'strip' ) . '</span>' . esc_html_x( '&#8594;', 'Next post link', 'strip' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html_e( 'Page', 'strip' ) . ' </span>',
					) ); ?>
	</div>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</main><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
