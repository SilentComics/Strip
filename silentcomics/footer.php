<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SilentComics
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_sidebar( 'tertiary' ); ?>
		<div class="site-info">
			&copy; <?php 
  $fromYear = 2013; 
  $thisYear = (int)date('Y'); 
  echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?> SILENT COMICS
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'silentcomics' ), 'silentcomics', '<a href="" rel="designer">Silent Comics</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>