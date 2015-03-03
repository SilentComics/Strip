<?php
/**
 * Template Name: Page of Stories
 * I'd like this page to put all the comics on a grid
 * Selectable from a dropdown menu on the edit page screen.
 */
?>

<?php get_header(); ?>
	<div id="primary" class="content-area">
        <div id="content" class="entry-comic" role="main">
  

<?php
$args = array( 'post_type' => 'comic', 'posts_per_page' => 12, 'order_by' => 'title', 'order'=> 'asc');
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
//the_title( '<h3 class="comic-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
  echo '<div class="entry-content">';
  the_content();
  echo '</div>';
endwhile;

wp_reset_query();  // Restore global post data stomped by the_post().
?>
            </div><!-- #content -->
        </div><!-- #primary -->

<?php get_footer(); ?>