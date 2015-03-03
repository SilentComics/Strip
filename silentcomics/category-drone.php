<?php
/**
 * The template for displaying the Category "Drone" pages
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SilentComics
 */
 
 get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="entry-comic" role="main">
	
	<?php if ( have_posts() ) : ?>
	<header class="page-header">
			</br>
			<h4 class="comicbook-blurb">The Singularity is here. Sentient Drone has landed.</h4>
	</header><!-- .page-header -->
	

<?php // Create and run first loop in reverse order (compare this with the code in category.tofu.php & category.fedor.php
    $comic = new WP_Query();
    $comic->query('post_type=comic&array$paged&posts_per_page=-1&category_name=drone&orderby=title&order=asc');
 
  while ($comic->have_posts()) : $comic->the_post();   
				
				get_template_part( 'content', get_post_format() );
			
				?>

						<?php endwhile; ?>


		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive-comic' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>