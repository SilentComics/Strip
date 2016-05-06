<?php
/**
 * @package SilentComics
 */
 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrap wrap clear">
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
			
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'silentcomics' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="<?php the_ID(); ?>" class="silentcomics-featured-thumbnail">
				<?php the_post_thumbnail( 'silentcomics-featured-thumbnail' ); ?>
			</a>
			<?php endif; ?>
		
		<footer class="entry-meta">
			<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
		</footer><!-- .entry-meta -->
		
		<header class="entry-header">
			
			<?php // calls each series by get_the_terms, custom taxonomy "story" replacing WP native "category" (4.4 term meta might enable further improvement)
			
			$terms = get_the_terms( $post->ID, 'story' );

foreach ( $terms as $term ) {

    // The $term is an object, so we don't need to specify the $taxonomy.
    $term_link = get_term_link( $term );
   
    // If there was an error, continue to the next term.
    if ( is_wp_error( $term_link ) ) {
        continue;
    }

    // We successfully got a link. Print it out.
    echo '<span class="categories-links"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></span>';
}
				edit_post_link( __( 'Edit Comic', 'silentcomics' ), '<span class="edit-link">', '</span>' ); 
				
				if ( ! is_single() ) :
					the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				else :
					the_title( '<h1 class="entry-title">', '</h1>' );
				endif; ?>
			
	</header><!-- .entry-header -->
	
	<?php if ( is_search() ) : // Only display Excerpts for Search — implement search for custom taxonomies ?>

		<div class="entry-summary">
			
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
			
		<?php else : ?>
			
	<div class="entry-comic">
		<?php the_content( __( 'Continue watching <span class="meta-nav">&rarr;</span>', 'silentcomics' ) ); ?>
				
			<?php endif; ?>
		</div><!-- .entry-content -->		
	</div><!-- .entry-wrap -->
</article>