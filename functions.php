<?php

/**

 * My Theme functions and definitions

 */



 

 

function ali_theam_jquery() {

	wp_enqueue_script('jquery');

} 

add_action('init', 'ali_theam_jquery');

 // Theme Custom Post function here

 include_once('inc/ali-custom-post.php');

 // All CSS and JS file call here

 include_once('inc/ali-files.php');

// Add Theme Menu function

 include_once('inc/ali-menu.php');

// Add Theme Defult function

 include_once('inc/ali-defult.php');

// Add Theme Widgets function

 include_once('inc/ali-widgets.php');











/***********************************************************************************************/

/* Add Theme Option */

/***********************************************************************************************/

add_filter( 'ot_show_pages', '__return_false' );

add_filter( 'ot_show_new_layout', '__return_false' );

add_filter( 'ot_theme_mode', '__return_true' );

require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

include_once('option-tree/ot-loader.php');

include_once('inc/theme-options.php');

include_once('inc/metabox.php');


function codextent_ssl_srcset( $sources ) {
    foreach ( $sources as &$source ) {
        $source['url'] = set_url_scheme( $source['url'], 'https' );
    }
    return $sources;
}
add_filter( 'wp_calculate_image_srcset', 'codextent_ssl_srcset' );






















?>
