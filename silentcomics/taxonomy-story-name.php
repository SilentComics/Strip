<?php
/**
 * The template for the "ExIle" story pages
 *
 * @package SilentComics
 */
 
 get_header(); ?>

	<div id="primary" class="content-area">
		<div class="wrap" class="site-content" role="main">
	
	<header class="page-header">
		
			<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif; ?>
			<h4 class="comic-blurb">This is a blurb — add your own blurb here.</h4>
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
		'posts_per_page' => 3, // Must be = or > than number set in function.php, line 663, to avoid breaking pagination
		'story'			 => 'name',
		'orderby'  		 => 'title', // you can order by date if you so prefer
		'paged' 		 => $paged,
		'order'  		 => 'ASC'
	);
		
		$loop = new WP_Query( $args );
			// Start the loop
			if ( $loop->have_posts() ) : 
    while ($loop->have_posts()) : $loop->the_post();   
				
		get_template_part( 'content-series' ); ?>

			<?php endwhile;  wp_reset_postdata(); ?>
			
			<?php
global $wp_query;

$big = 999999999; // need an unlikely integer
$translated = __( 'Page', 'silentcomics' ); // supply translatable string

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $loop->max_num_pages,
    'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
) );

		else :
			get_template_part( 'no-results', 'archive-comic' ); 
		endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>