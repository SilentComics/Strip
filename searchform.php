<?php
/**
 * The template for displaying search forms
 *
 * @package WordPress
 * @subpackage SilentComics
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php _ex('Search for:', 'label', 'silentcomics'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search?', 'placeholder', 'silentcomics'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php _ex('Search for:', 'label', 'silentcomics'); ?>">
    </label>
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button', 'silentcomics'); ?>">
</form>
