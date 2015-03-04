<?php
/**
 * Template Name: Archive all comics
 * The template for displaying comics in archived pages. 
 * (comic)
 * This template is important because it provides an overview to peruse all stories — it also has links, in a second loop that direct to custom comic posts
 *
 * @package SilentComics
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
				
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
				<?php
					printf( __( 'STORIES %s', 'silentcomics' ), '<span>' .
					single_cat_title( '', false ) . '</span>' );
					?>
					</h1>
				
				<h2 class="taxonomy-description"> 
					
					Watch and follow three <a href="http://silent-comics.com/stories">stories</a>.
					</h2>
					<h3 class="comicbook-title">
					<a href="http://silent-comics.com/exile">ExIle</a></h3>
					<h3 class="comicbook-title">
					<a href="http://silent-comics.com/morning-tofu-chase">Morning Tofu Chase</a></h3>
					<h3 class="comicbook-title">
					<a href="http://silent-comics.com/sentient-drone">Sentient Drone</a></h3>
					
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->
			
<?php // Create and run first loop in reverse order
    $comic = new WP_Query();
    $comic = new WP_Query( array(
					'post_type' => 'comic',
					'showposts' => -1, 
					'paged'=>$paged,
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

		</main><!-- #main -->
	</section><!-- #primary -->

<h2 class="taxonomy-description">
	All <a href="http://localhost:8888/shibakuzo/category/exile/">Exile</a> episodes by title.
					</h2>
<?php // Create and run custom loop for category exile
    $custom_loop = new WP_Query();
    $custom_loop->query( array(
    	'post_type' 	=> 'comic',
		'showposts'		=> -1, 
		'category_name' => 'exile',
		'orderby'  		=> 'title',
		'order'  		=> 'ASC',)
		);
    while ($custom_loop->have_posts()) : $custom_loop->the_post();
  ?>
    <h4 class="comicbook-episode"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    
  <?php endwhile; ?>
<p>
    <h2 class="taxonomy-description">
	All <a href="http://localhost:8888/shibakuzo/category/tofu/">Tofu</a> episodes.
					</h2>
<?php // Create and run custom loop for category tofu
    $custom_loop = new WP_Query();
    $custom_loop->query( array(
    	'post_type' 	=> 'comic',
		'showposts'		=> -1, 
		'category_name' => 'tofu',
		'orderby'  		=> 'title',
		'order'  		=> 'ASC',)
		);
    while ($custom_loop->have_posts()) : $custom_loop->the_post();
  ?>
    <h4 class="comicbook-episode"><ul><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></ul></h4>
</p>  
    <?php endwhile; ?>
<?php 
    wp_reset_postdata();
?>



<?php 
	// calling the category http://codex.wordpress.org/Function_Reference/get_the_category#Get_the_Post_Categories_From_Outside_the_Loop can be helpful if styled correctly
$categories = get_the_category();
$separator = ' ';
$output = '';
if($categories){
	foreach($categories as $category) {
		$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all episodes in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
	}
echo trim($output, $separator);
}
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>