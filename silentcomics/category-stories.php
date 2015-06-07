<?php
/**
 * The template for displaying the Category "stories" pages
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SilentComics
 */
 
 get_header(); ?>

	<div id="primary" class="content-area">
		<div class="wrap" class="entry-comic" role="main">
	
	<?php if ( have_posts() ) : ?>
	<header class="page-header">
			</br>
			<h4 class="comicbook-blurb">Stories. Ruins. Beauty. </h4>
	</header><!-- .page-header -->
	
	<?php // Create and run first loop in reverse order
		$comic = new WP_Query();
		$comic->query( array(
		'post_type' => 'comic',
    	'showposts' => -1, 
		'category_name' => 'stories',
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

<?php get_footer(); ?>