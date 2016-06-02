<?php
/**
 * The template to test the "Test" story pages
 *
 * @package SilentComics
 */
 
 get_header(); ?>

	<div id="primary" class="content-area">
		<div class="wrap" class="entry-comic" role="main">
	
	<?php if ( have_posts() ) : ?>
	<header class="page-header">
		</br>
			<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif; ?>
			<h4 class="comic-blurb">This. Is. Just. A. Test.</h4>
			</br>
	</header><!-- .page-header -->
	
<?php // Create and run first loop in reverse order
    	$comic = new WP_Query();
		$comic->query( array(
		'post_type'		=> 'comic',
    	'showposts'		=> -1, 
		'story'			=> 'test',
		'orderby'  		=> 'title',
		'order'  		=> 'ASC',)
		);
		
    while ($comic->have_posts()) : $comic->the_post();   
				
		get_template_part( 'content-comic' ); ?>

			<?php endwhile; ?>
<?php 
    wp_reset_query();
?>
		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive-comic' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>