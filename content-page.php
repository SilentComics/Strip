<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Strip
 */

?>

<article id="post-<?php the_ID(); ?>" >
	<div class="wrap">
	<?php
	if ( '' !== get_the_post_thumbnail() ) :
		the_post_thumbnail( 'strip-featured-thumbnail' );
	endif;
	?>
		<header class="entry-header">
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

	<footer class="entry-meta">
	<?php strip_entry_meta(); ?>

	<?php edit_post_link( __( 'Edit', 'strip' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->

		<div class="entry-content clear">
	<?php the_content(); ?>

		</div><!-- .entry-content -->
	</div><!-- .entry-wrap -->
</article><!-- #post-## -->
