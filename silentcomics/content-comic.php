<?php
/**
 * @package silentcomics
 */
?>
<article id="comic-<?php the_id(); ?>" <?php post_class(); ?>>
	<div class="entry-wrap wrap clear">
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
			<?php if ( ! is_single() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'SilentComics' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="<?php the_ID(); ?>" class="SilentComics-featured-thumbnail">
				<?php the_post_thumbnail( 'SilentComics-featured-thumbnail' ); ?>
			</a>
			<?php else : ?>
				<?php the_post_thumbnail( 'SilentComics-featured-thumbnail' ); ?>
			<?php endif; ?>
		<?php endif; ?>

		<header class="entry-header">
			
			<div class="comic-meta entry-meta">
		<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
		
		<?php edit_post_link( __( 'Edit', 'silentcomics' ), '<span class="sep"> ~ </span><span class="comic-edit-link">', '</span>' ); ?>
		
	</div>
			<?php
				$categories_list = get_the_category_list( __( ', ', 'SilentComics' ) );
			//	if ( $categories_list && SilentComics_categorized_blog() )
					echo '<span class="categories-links">' . $categories_list . '</span>';

				if ( ! is_single() ) :
					the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				else :
					the_title( '<h1 class="entry-title">', '</h1>' );
				endif;
			?>
		</header><!-- .entry-header -->
		
	<div class="comic-content">
		<?php the_content(); ?>

	</div>

</article>