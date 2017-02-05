<?php
/**
 * Template part for displaying audio post format
 *
 * @package WordPress
 * @subpackage @package Strip
 */

?>

<article id="post-<?php the_ID(); ?>">

	<div class="wrap">
		<div class="entry-info">
			<header class="entry-header">
				<?php
					$categories_list = get_the_category_list( __( ', ', 'strip' ) );

				if ( ! is_single() ) :
					the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				else :
						the_title( '<h1 class="entry-title">', '</h1>' );
				endif;
				?>
			</header><!-- .entry-header -->

			<footer class="entry-meta">

				<span class="entry-format"><a href="<?php echo esc_url( get_post_format_link( 'audio' ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'strip' ), get_post_format_string( 'audio' ) ) ); ?>"><?php echo esc_html( get_post_format_string( 'audio' ) ); ?></a></span>

				<?php edit_post_link( __( 'Edit', 'strip' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->

		</div><!-- .entry-info -->

		<div class="entry-content clear">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'strip' ) ); ?>

		</div><!-- .entry-content -->
	</div><!-- .entry-wrap -->
</article><!-- #post-## -->
