<?php
/**
 * The template for displaying the comics under the category "fedor". It needs to be seriously improved.
 *
 * @package SilentComics
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="entry-comic" role="main">
	
	<?php if ( have_posts() ) : ?>
	<header class="page-header">
			</br>
			<h4 class="comicbook-blurb">Fedor Fuct just doesn't give a fuck.</h4>
	</header><!-- .page-header -->
	
<?php // Create and run first loop in reverse order
    $comic = new WP_Query();
		$comic->query( array(
		'post_type' => 'comic',
    	'showposts' => -1, 
		'category_name' => 'fedor',
		'orderby'   => 'title',
		'order'   => 'ASC',)
		);
		
    while ($comic->have_posts()) : $comic->the_post();   
				
				get_template_part( 'content', get_post_format() );
				?>

						<?php endwhile; ?>
<?php 
    wp_reset_query();
?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive-comic' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>