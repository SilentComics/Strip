<?php
/**
 * Template Name: Series  
 * TO DO: Display all the comics excerpts on a grid
 * Selectable from a dropdown menu on the edit page screen. */
?>

<?php get_header(); ?>
	<div id="primary" class="content-area">
        <div class="wrap" class="entry-comic" role="main">
  
		<?php	
			$args = array( 
			'post_type' => 'comic', 
			'posts_per_page' => 6, 
			'orderby' => 'title', 
			'order'=> 'DESC');
			$loop = new WP_Query( $args );

			while ( $loop->have_posts() ) : $loop->the_post();

			the_title( '<h5 class="comic-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
			echo '<div class="content-comic">';
			the_content();
			echo '</div>';
			endwhile; ?>

			<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>
            </div><!-- #content -->
        </div><!-- #primary -->

<?php get_footer(); ?>