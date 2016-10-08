<?php
/*
 * This file handles the admin area and functions
 *
 * You can use it to make changes to the
 * dashboard. Updates to this page are coming soon.
 * The file is called by functions.php.
 *
 * Developed by: Eddie Machado
 * URL: http://themble.com/bones/
 *
 * Special Thanks for code & inspiration to:
 * @jackmcconnell - http://www.voltronik.co.uk/
 * Digging into WP - http://digwp.com/2010/10/customize-wordpress-dashboard/
*/

/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);    // Right Now Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        // Activity Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Comments Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  // Incoming Links Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);         // Plugins Widget

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);    // Quick Press Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);     // Recent Drafts Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);           // WordPress related feed
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);         //

	// remove plugin dashboard boxes
	unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);           // Yoast's SEO Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);        // Gravity Forms Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);   // bbPress Plugin Widget

	/*
	have more plugin widgets you'd like to remove?
	share them with us so we can get a list of
	the most commonly used. :D
	https://github.com/eddiemachado/bones/issues
	*/
}

/*
Now let's talk about adding your own custom Dashboard widget.
Sometimes you want to show clients feeds relative to their
site's content. Here is an example Dashboard Widget that displays recent
entries from an RSS Feed.
For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/
// RSS Dashboard Widget
function silentcomics_rss_dashboard_widget() {
	if ( function_exists( 'fetch_feed' ) ) {
		// include_once( ABSPATH . WPINC . '/feed.php' );               // include the required file
		$feed = fetch_feed( 'https://shizukana-manga.tumblr.com/rss/' );// specify the source feed
		if (is_wp_error($feed)) {
			$limit = 0;
			$items = 0;
		} else {
			$limit = $feed->get_item_quantity(7);                        // specify number of items
			$items = $feed->get_items(0, $limit);                        // create an array of items
		}
	}
	if ($limit == 0) echo '<div>The RSS Feed is either empty or unavailable.</div>';   // fallback message
	else foreach ($items as $item) { ?>

	<h4 style="margin-bottom: 0;">
		<a href="<?php echo $item->get_permalink(); ?>" title="<?php echo mysql2date( __( 'j F Y @ g:i a', 'silentcomics' ), $item->get_date( 'Y-m-d H:i:s' ) ); ?>" target="_blank">
			<?php echo $item->get_title(); ?>
		</a>
	</h4>
	<p style="margin-top: 0.5em;
			  .inside { max-width: 240px;}">
		<?php echo substr($item->get_description(), 0, 200); ?>
	</p>
	<?php }
}
// calling all custom dashboard widgets
function silentcomics_custom_dashboard_widgets() {
	wp_add_dashboard_widget( 'silentcomics_rss_dashboard_widget', __( 'Frame by frame', 'silentcomics' ), 'silentcomics_rss_dashboard_widget' );
	/*
	Be sure to drop any other created Dashboard Widgets
	in this function and they will all load.
	*/
}
// removing the dashboard widgets
add_action( 'wp_dashboard_setup', 'disable_default_dashboard_widgets' );
// adding any custom widgets
add_action( 'wp_dashboard_setup', 'silentcomics_custom_dashboard_widgets' );


/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function silentcomics_login_css() {
	wp_enqueue_style( 'silentcomics_login_css', get_template_directory_uri() . '/assets/css/login.css', false );
	
// Enqueue custom font to the login form
wp_enqueue_style( 'inconsolata', get_template_directory_uri() . '/fonts/inconsolata.css', array(), null );
}    
// changing the logo link from wordpress.org to your site
function silentcomics_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function silentcomics_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'silentcomics_login_css', 10 );
// Add custom font to the login form
add_action( 'login_enqueue_scripts', '/fonts/inconsolata.css', 10 );
add_filter('login_headerurl', 'silentcomics_login_url' );
add_filter('login_headertitle', 'silentcomics_login_title' );


/************* CUSTOMIZE ADMIN *******************/

/*
I don't really recommend editing the admin too much
as things may get funky if WordPress updates. Here
are a few funtions which you can choose to use if
you like.
*/

// Custom Backend Footer
function silentcomics_custom_admin_footer() {
	?>
	<span id="footer-thankyou"><a href="<?php echo esc_url( __( 'http://silentcomics.com/', 'silentcomics' ) ); ?>"><?php printf( esc_html__( 'Developed by %s', 'silentcomics' ), 'Silent Comics' ); ?></a>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url( __( 'https://github.com/SilentComics/SilentComics-for-WordPress/', 'silentcomics' ) ); ?>"><?php printf( esc_html__( 'Contribute on %s', 'silentcomics' ), 'GitHub' ); ?></a>
<?php }

// adding it to the admin area
add_filter('admin_footer_text', 'silentcomics_custom_admin_footer');
