<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SilentComics
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">


	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<div class="wrap">
				<h1 class="page-title">
					<?php
                        if ( is_author() && get_the_author_meta( 'description' ) ) {
                            echo '<div class="author-index shorter">';
                            get_template_part('inc/author','box');
                            echo '</div>';
                        }
                    ?>
						<?php
							if ( is_category() ) :
								printf( __( 'Category Archives: %s', 'silentcomics' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							elseif ( is_tag() ) :
								printf( __( 'Tag Archives: %s', 'silentcomics' ), '<span>' . single_tag_title( '', false ) . '</span>' );

							elseif ( is_author() ) :
							printf( __( 'All articles by %s', 'silentcomics' ), '<span class="vcard">' . get_the_author() . '</span>' );

							elseif ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'silentcomics' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'silentcomics' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'silentcomics' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', 'silentcomics' );
								
								elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
								_e( 'Galleries', 'silentcomics' );

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', 'silentcomics');

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', 'silentcomics' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', 'silentcomics' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', 'silentcomics' );
								
								elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'silentcomics' );

							elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'silentcomics' );
							
							elseif ( is_tax( 'story', 'comic' ) ) :
							_e( 'Stories', 'silentcomics' );
						
						elseif ( !'comic' == get_post_type() ):
							_e( 'Comics', 'silentcomics' );
						
							else :
								_e( 'Archives', 'silentcomics' );

							endif;
						?>
					</h1>
					<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif;
					?>
				</div><!-- .wrap -->
			</header><!-- .page-header -->
                        
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php silentcomics_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>