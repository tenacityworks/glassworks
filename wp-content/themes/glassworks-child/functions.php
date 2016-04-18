<?php


/**
 * @author Archie
 * Clean up my dashboard
 *
 * @link https://codex.wordpress.org/Function_Reference/remove_meta_box
 */

add_action( 'admin_init', function () {
    // Removes the 'incoming links' metabox
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    // Removes the 'plugins' metabox
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    // Removes the 'WordPress News' metabox
    remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
    // Removes the secondary metabox
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    // Removes the 'Quick Draft' metabox
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    // Removes the 'Recent Drafts' metabox
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    // Removes the 'Activity' metabox
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    // Removes the 'At a Glance' metabox
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    // Removes the 'Activity' metabox (since 3.8)
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
});





/**
 * @author Archie
 * Clean up my dashboard
 *
 */

function theme_typekit() {
    wp_enqueue_script( 'theme_typekit', '//use.typekit.net/grq8frp.js');
}
add_action( 'wp_enqueue_scripts', 'theme_typekit' );

function theme_typekit_inline() {
    if ( wp_script_is( 'theme_typekit', 'done' ) ) { ?>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <?php }
}
add_action( 'wp_head', 'theme_typekit_inline' );





/**
 * @author Archie
 * Enqueue FontAwesome
 *
 */
/*
$get_the_url = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css';

$cdnIsUp = get_transient( 'cnd_is_up' );

if ( $cdnIsUp ) {
    $load_source = 'load_external_fontawesome';
} else {
    $cdn_response = wp_remote_get( $get_the_url );
    if( is_wp_error( $cdn_response ) || wp_remote_retrieve_response_code($cdn_response) != '200' ) {
        $load_source = 'load_local_fontawesome';
    }
    else {
        $cdnIsUp = set_transient( 'cnd_is_up', true, MINUTE_IN_SECONDS * 20 );
        $load_source = 'load_external_fontawesome';
    }
}

function load_external_fontawesome() {
    wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css');
}

function load_local_fontawesome() {
    //wp_register_script('fontawesome', get_bloginfo('template_url').'/js/bootstrap.min.js', __FILE__, array('jquery'), 3.3, true);
    wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css' );
}

add_action('wp_enqueue_styles', $load_source );
*/




/**
 * @author Archie
 * Unregister Parent Theme Menus
 *
 */

if( ! function_exists( 'reverie_theme_support' ) ) {
    function reverie_theme_support() {

        // Add menu support. http://codex.wordpress.org/Function_Reference/register_nav_menus
        add_theme_support('menus');

        // Unregister parent menu
        unregister_nav_menu ('additional');

        // Register new child theme menu
        register_nav_menus(array(
            'primary' => __('Primary Navigation', 'reverie'),
        ));

    }
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */




/**
 * @author Archie
 * Disable emojis from the header
 *
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );





/**
 * @author Archie
 * Add child theme styles
 */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {

    // load css files
    wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css' );
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/css/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/assets/css/custom.css' );

    // load js
    wp_enqueue_script( 'jquery-migrate', get_stylesheet_directory_uri() . '/assets/js/jquery-migrate-1.2.1.min.js', array( 'jquery' ));
    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ));

    // conditional js loading
    if( is_page_template( 'page-contact.php' ) ) {
        echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAflhKJKqKKZdJK75ybugRoBH9x7U1k1tM&callback=initMap" async defer></script>';
        wp_enqueue_script( 'gmap', get_stylesheet_directory_uri() . '/assets/js/map.js', array( 'jquery' ));
    }

    // load custom js
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ));

}




/**
 * @author Archie
 * Hide PODS Framework Menu for non-admin users
 *
 * http://pods.io/forums/topic/how-to-remove-pods-menu-in-admin-menu-not-pods-admin-menu/
 */
add_action('admin_menu', 'remove_pods_menu', 11);
function remove_pods_menu ()  {
    get_currentuserinfo() ;
    global $user_level;
    if ($user_level < 10){
        define('PODS_DISABLE_ADMIN_MENU', true);
        define('PODS_DISABLE_CONTENT_MENU', true);
    }
}










