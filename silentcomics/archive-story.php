<?php
/**
 * Template Name: Series Archive 
 * The template for displaying comic archives pages. 
 * This template provides an overview to peruse all stories visually
 * Grabs the first image of each comic post and display them on a four column grid
 * TODO: excerpts enhancements
 *
 * @package SilentComics
 */

get_header(); ?>

<div class="columns">
 <div class="column"></div>
 <div class="column"></div>
 <div class="column"></div>
 <div class="column"></div>

	<div id="primary" class="content-area">
        <div class="wrap" class="site-content" role="main">

			<header class="entry-header">
				<h3 class="taxonomy-description"><a href="<?php echo get_post_type_archive_link( 'comic' ); ?>">Comics Archive</a></h3>
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header>

		<div class="content-comic columns">
			
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

// Call and run loop in descending order
$loop = new WP_Query( array( 
			'post_type'			=> 'comic',
			'story' 			=> '', // add story term here if you want this template to work for a specific story
			'posts_per_page' 	=> 12, // unless stipulated, posts_per_page will default to Blog pages number set in dashboard, "reading settings"
			'paged'	 			=> $paged,
			'orderby' 			=> 'date', 
			'order'				=> 'DESC')
			
			);
			
			// Start the loop
if ( $loop->have_posts() ) :
   while ( $loop->have_posts() ) :
      $loop->the_post();
      ?>
      <div class="column">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(_e('Permanent Link to %s', 'silentcomics'),the_title_attribute('echo=0')); ?>"></a>
				<?php if ( get_the_post_thumbnail() != '' ) {

  echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
   the_post_thumbnail();

  echo '</a>';

} 

else {
  
 echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
 echo '<img src="';
 echo catch_first_image();
 echo '" alt="" />';
 echo '</a>';

} ?>  

<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(_e('Permanent Link to %s', 'silentcomics'),the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
				
			</div><!-- .column -->
			<?php endwhile; ?>
			</div><!-- .content-comic columns -->
		<?php endif; 
			wp_reset_postdata();
		?>

<?php
// get_next_posts_link() usage with max_num_pages ?>
<nav class="paging-navigation">
<div class="nav-previous-page">
<?php echo get_next_posts_link( 'Previous episodes', $loop->max_num_pages ); ?>
 </div>
    <div class="nav-next-page">
<?php echo get_previous_posts_link( 'Recent episodes' ); ?>
</div>
</nav>
<?php // clean up after the query and pagination
wp_reset_postdata(); 
?>
        </div><!-- .columns -->
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>