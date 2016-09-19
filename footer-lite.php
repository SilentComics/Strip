<?php
/**
 * The template for displaying the footer for comics.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SilentComics
 */
?>
    </div><!-- #content -->
    <footer id="colophon" class="site-footer" role="contentinfo">

        <div class="site-info">
            &copy; <span class="site-name"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></span> <?php
            $fromYear = 2013;
            $thisYear = (int)date('Y');
            echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?>
            <span class="sep"> | </span>
    <?php do_action('silentcomics_credits');
                ?>
                <a href="<?php echo esc_url(__('https://github.com/SilentComics/Silent-Comics-Wordpress-Theme', 'silentcomics')); ?>"><?php printf(esc_html__('Theme: %1$s by %2$s.', 'silentcomics'), 'silentcomics', 'Hoa'); ?><rel="designer"></a>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
