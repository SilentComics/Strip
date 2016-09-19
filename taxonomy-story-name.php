<?php
/**
 * The template for the "example" story pages
 * Clone this template and replace "name" by your own story name.
 *
 * @package SilentComics
 */

 get_header(); ?>

    <section id="primary" 
        <main id="content" class="wrap" role="main">
    
    <header class="page-header">
        
    <?php 
	// Show an optional term description.
	$term_description = term_description();
	if (! empty($term_description) ) :
	printf('<div class="taxonomy-description">%s</div>', $term_description);
	endif; 
	?>
            <h4 class="comic-blurb">This is a blurb. Add your own story name blurb here.</h4>
            </br>
    </header><!-- .page-header -->
    <?php
    //get the correct paged figure on a static page
    if (get_query_var('paged') ) {
           $paged = get_query_var('paged');
    }
    elseif (get_query_var('page') ) {
           $paged = get_query_var('page');
    }
    else {
           $paged = 1;
    }

    // Call and run loop in ascending order
    $args = array(

    'post_type'         => 'comic',
    'posts_per_page' => 3, // Must be = or > than number set in function.php, line 663, to avoid breaking pagination
    'story'             => 'name', // Replace 'example' by your own story title
    'orderby'           => 'title', // you can order by date if you so prefer
    'paged'          => $paged,
    'order'           => 'ASC'
    );

    $loop = new WP_Query($args);
    // Start the loop
    if ($loop->have_posts() ) :
        while ($loop->have_posts()) : $loop->the_post();

            get_template_part('content-series'); ?>

        <?php endwhile;  wp_reset_postdata(); ?>

        <?php
        global $wp_query;

        $big = 999999999; // need an unlikely integer
        $translated = __('Page', 'silentcomics'); // supply translatable string

        echo paginate_links(
            array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $loop->max_num_pages,
            'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
            ) 
        );

        else :
            get_template_part('no-results', 'archive-comic');
        endif; ?>

        </main><!-- #content -->
    </section><!-- #primary -->
<?php get_footer(); ?>
