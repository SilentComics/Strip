<?php
/**
 * The template for the "Draft" story pages, sorting the comic stories that have no taxonomy_term set
 * Using custom Taxonomy "draft" http://codex.wordpress.org/Template_Tags/get_posts#Taxonomy_Parameters
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SilentComics
 */

 get_header(); ?>

	<div id="primary" class="content-area">
		<div class="wrap" class="entry-comic" role="main">

	<?php if ( have_posts() ) : ?>
	<header class="page-header">
		</br>
			<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif; ?>
			<h4 class="comic-blurb">Here are your uncategorized comics. If you want to order them, go to Add New Comic, then + Add New Story and write a series title of your choice, or check an existing series box, if you had one. To write your own custom taxonomies, clone taxonomy-story-draft.php and replace "draft" by your own story name.</h4>
			</br>
	</header><!-- .page-header -->

<?php // Create and run first loop in reverse order
    	$comic = new WP_Query();
		$comic->query( array(
		'post_type'		=> 'comic',
    	'showposts'		=> -1,
		'story'			=> 'draft',
		'orderby'  		=> 'title', // or date
		'order'  		=> 'DESC',)
		);

    while ($comic->have_posts()) : $comic->the_post();

		get_template_part( 'content-comic' ); ?>

			<?php endwhile; ?>
<?php
    wp_reset_query();
?>
		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive-comic' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
