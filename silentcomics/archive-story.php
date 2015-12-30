<?php
/**
 * Template Name: Archive series
 * The template for displaying comic Archives pages. 
 * This template provides a paginated overview to peruse all comic stories 
 * TO DO: Display all the comics excerpts on a grid
 * Selectable from a dropdown menu on the edit page screen. 
 *
 * @package SilentComics
 */

?>

<?php get_header(); ?>
	<div id="primary" class="content-area">
        <div class="wrap" class="site-content" role="main">
	        
	        
	        
	        <br>
	        <h3 class="taxonomy-description"><a href="<?php echo get_post_type_archive_link( 'comic' ); ?>">Comics Archive</a></h3>
  
		<?php	
			
			if ( get_query_var('paged') ) {
   $paged = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
   $paged = get_query_var('page');
}
else {
   $paged = 1;
}
$loop = new WP_Query( array( 
			'post_type'			=> 'comic',
			'story' 			=> 'story',
			'posts_per_page' 	=> 6, 
			'paged'	 			=> $paged,
			'orderby' 			=> 'title', 
			'order'				=> 'DESC')
			);
			
			// Start the loop
if ( $loop->have_posts() ) :
   while ( $loop->have_posts() ) :
      $loop->the_post();
      get_template_part( 'content-comic', get_post_type() );
   endwhile;
   wp_reset_postdata();
endif; ?>

<?php
// get_next_posts_link() usage with max_num_pages 
next_posts_link( 'Older Entries', $loop->max_num_pages );
previous_posts_link( 'Newer Entries' );

// clean up after the query and pagination
wp_reset_postdata(); 
?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>