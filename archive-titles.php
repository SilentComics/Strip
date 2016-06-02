<?php
/**
 * Template Name: Archive titles
 * The template for displaying comic Archives by titles only. 
 *
 * TODO: better styling
 *
 * @package SilentComics
 */
 
 get_header(); ?>
 
 	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
						<header class="page-header">
				<div class="wrap">

			<?php // call the series by title and list them ?>
				<title_ol=
			<h2 class="series-title">
			
			<?php 
				$args = array(
				'post_type'=> 'comic',
				'story' => 'story',
				'title_li'=> __('Episodes', 'silentcomics')
				);
				wp_list_pages( $args ); 
			?> 
			</h2>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>	
<?php get_footer(); ?>
