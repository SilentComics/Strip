<?php
/**
 * The template for your own "Name" story pages archive, with page numbering
 * For this template to work, under "Comics", add a New Story and write a series title of your choice, replace "Name" by your own story name in this template and rename it taxonomy-story-{yourownname}.
 *
 * @package SilentComics
 */
 
 get_header(); ?>

	<div id="primary" class="content-area">
		<div class="wrap" class="site-content" role="main">
	
	<?php if ( have_posts() ) : ?>
	<header class="page-header">
		</br>
			<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif; ?>
			<h4 class="comic-blurb">This is a series blurb, you can change or remove this line!</h4>
			</br>
	</header><!-- .page-header -->
	<?php
//get the correct paged figure on a static page
if ( get_query_var('paged') ) {
   $paged = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
   $paged = get_query_var('page');
}
else {
   $paged = 1;
}
			
// Call and run loop in ascending order
    	$args = array(
	    	
			'post_type'		 => 'comic',
			'posts_per_page' => 6, // change this if you want more than six episode per page archive
			'story'			 => 'name',
			'orderby'  		 => 'date',
			'paged' 		 => $paged,
			'order'  		 => 'ASC' // sort stories by DESC to revert order
		);
		
		$loop = new WP_Query( $args );
			// Start the loop
    while ($loop->have_posts()) : $loop->the_post();   
				
		get_template_part( 'content-series' ); ?>

			<?php endwhile;  wp_reset_postdata(); ?>
			
			<?php
global $wp_query;

$big = 999999999; // need an unlikely integer
$translated = __( 'Page', 'silentcomics' ); // Supply translatable string

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $loop->max_num_pages,
    'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
) );
?>
		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive-comic' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>