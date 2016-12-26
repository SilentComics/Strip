<?php
/**
 * The template for displaying the footer for comics
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package WordPress
 * @subpackage Strip
 */

?>
	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">

	  <div class="site-info">
				&copy; <span class="site-name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span> <?php
				$from_year = 2013;
				$this_year = (int) date( 'Y' );
				echo esc_html( $from_year . (($from_year !== $this_year) ? '-' . $this_year : '') );?>
				<span class="sep"> | </span>
		<?php do_action( 'strip_credits' );
					?>
					<a href="<?php echo esc_url( __( 'https://github.com/SilentComics/Strip', 'strip' ) ); ?>"><?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'strip' ), 'strip', 'Hoa' ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>

	</body>
	</html>
