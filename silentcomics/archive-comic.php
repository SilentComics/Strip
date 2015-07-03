<?php
/**
 * Template Name: Archive all comics
 * The template for displaying comics in archived pages. 
 * (comic)
 * This template provides an overview to peruse all stories — it also has links to custom comic posts in a second loop 
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
					'paged'		=>$paged,
					'orderby'   => 'title',
					'order'   	=> 'ASC',)
					);
    while ($comic->have_posts()) : $comic->the_post();   
				
				get_template_part( 'content-comic', get_post_format() );
				// to style it like the blog entry page, change to 'content' ?> 

						<?php endwhile;
						wp_reset_postdata(); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive-comic' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<h2 class="taxonomy-description">
	All <a href="http://localhost:8888/shibakuzo/category/exile/">Exile</a> episodes by title.</h2>
<?php // Run custom loop for taxonomy exile
    $comic = new WP_Query();
    $comic->query( array(
    	'post_type' 	=> 'comic',
		'showposts'		=> -1, 
		'story'  		=> 'exile',
		'orderby'  		=> 'title',
		'order'  		=> 'ASC',)
		);
    while ($comic->have_posts()) : $comic->the_post();
  ?>
    <h4 class="comicbook-episode"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    
		<?php endwhile; 
		wp_reset_postdata();  
		?>

<br>

    <h2 class="taxonomy-description">
	All <a href="http://localhost:8888/shibakuzo/category/tofu/">Tofu</a> episodes.</h2>
<?php // Run custom loop for taxonomy tofu
    $comic = new WP_Query();
    $comic->query( array(
    	'post_type' 	=> 'comic',
		'showposts'		=> -1, 
		'story'		    => 'tofu',
		'orderby'  		=> 'title',
		'order'  		=> 'ASC',)
		);
    while ($comic->have_posts()) : $comic->the_post();
  ?>
    <h4 class="comicbook-episode"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
 
    	<?php endwhile; 
		wp_reset_postdata();
		?>

<?php get_footer(); ?>