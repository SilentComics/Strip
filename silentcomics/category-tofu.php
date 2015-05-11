<?php
/**
* The Template for displaying comics.
*
* @package SilentComics
*/

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="entry-comic" role="main">
			<div class="wrap">
		<?php if ( have_posts() ) : ?>
		
	<header class="page-header">
		</br>
			<h4 class="comicbook-blurb">Don't you love Tofu?</h4>
	</header><!-- .page-header -->
	
	<?php // Create and run first loop in reverse order
		$comic = new WP_Query();
		$comic->query( array(
		'post_type' => 'comic',
    	'showposts' => -1, 
		'category_name' => 'tofu',
		'orderby'   => 'title',
		'order'   => 'ASC',)
		);
			
 while ($comic->have_posts()) : $comic->the_post();  
    	get_template_part( 'content', get_post_format() );
				?>
		
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'no-results', 'archive-comic' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>