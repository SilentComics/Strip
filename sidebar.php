<?php
/**
* The Sidebar containing the main widget areas
*
* @package SilentComics
*/

if (! is_active_sidebar('sidebar')) {
    return;
}
?>

<div id="secondary" class="widget-area" role="complementary">

    <div class="widget-wrap">

        <div class="main-sidebar">

    <?php dynamic_sidebar('sidebar'); ?>

        </div>
    </div><!-- .widget-wrap -->
</div><!-- #secondary -->
