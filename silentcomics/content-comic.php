<?php
/**
 * @package SilentComics
 */
?>
<article id="comic-<?php the_ID(); ?>" <?php post_class('clear'); ?>>
	<div class="entry-wrap wrap clear">
		
		<footer class="entry-meta">
			<?php silentcomics_entry_meta(); ?>
			
			<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>

			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'silentcomics' ), __( '1 Comment', 'silentcomics' ), __( '% Comments', 'silentcomics' ) ); ?></span>
			
			<?php endif; ?>

		</footer><!-- .entry-meta -->
		
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
			<?php if ( ! is_single() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'silentcomics' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="<?php the_ID(); ?>" class="silentcomics-featured-thumbnail">
				<?php the_post_thumbnail( 'silentcomics-featured-thumbnail' ); ?>
			</a>
			<?php else : ?>
				<?php the_post_thumbnail( 'silentcomics-featured-thumbnail' ); ?>
			<?php endif; ?>
		<?php endif; ?>

		<header class="entry-header">
			
			<?php // we call each serie by get_object_terms, the custom taxonomy "story" replaces WP native "category"
			$story_terms = wp_get_object_terms( $post->ID,  'story' );
if ( ! empty( $story_terms ) ) {
	if ( ! is_wp_error( $story_terms ) ) {
		
		foreach( $story_terms as $term ) {
		echo '<span class="categories-links"><a href="' . get_term_link( $term->slug, 'story' ) . '">' . esc_html( $term->name ) . '</a></span>'; 
		}
	}
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
			
	<div class="comic-content clear">
		<?php the_content(); ?>
		
		</div><!-- .entry-content -->
		<?php endif; ?>
		
	</div><!-- .entry-wrap -->
</article>