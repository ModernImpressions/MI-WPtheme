<?php

/**

 * My Theme functions and definitions

 */

function add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','add_cors_http_header'); 

/*
// disables WP Heartbeat - this is only for real-time plugin notifications, or showing if a user is editing a post, due to the nature of this site, this is currently un-needed, and is cause higher CPU usage.
add_action( 'init', 'stop_heartbeat', 1 );
function stop_heartbeat() {

    wp_deregister_script('heartbeat');
}
*/

function call_flowscripts(){ 
    wp_register_style( 'vue-flow', 'https://unpkg.com/@ditdot-dev/vue-flow-form@1.1.2/dist/vue-flow-form.min.css', array(), '1.1.2', 'all' );
    wp_register_style('flow', get_template_directory_uri().'/css/flow.css', array(), '1.0.0', 'all' ); 
    wp_register_style('flow-custom', get_template_directory_uri().'/css/vue-flow-custom.css', array(), '1.0.0', 'all' );

    wp_enqueue_style('flow');
    wp_enqueue_style('flow-custom');
    
    wp_enqueue_script( 'vue', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js', array(), '2.6.11', 'all' );
    wp_enqueue_script( 'vue-flow', 'https://unpkg.com/@ditdot-dev/vue-flow-form@1.1.2', array(), '1.1.2', 'all' );
    wp_enqueue_script('flow', get_template_directory_uri() .'/js/flow.js', array(), '1.0.0', 'true' );
}
add_action('wp_enqueue_scripts', 'call_flowscripts');

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

// Inject the TOC on each post.
add_filter('the_content', function ($content) {
    global $tableOfContents;

    $tableOfContents = "
        <div class='bpress-toc h5'>
            Table of Contents <span class='toggle'>+ show</span>
        </div>
        <div class='bpress-toc-list items'>
            <div class='item-h2'>
                <a href='#preface'>Preface</a>
            </div>
    ";
    $index = 1;

    // Insert the IDs and create the TOC.
    $content = preg_replace_callback('#<(h[1-6])(.*?)>(.*?)</\1>#si', function ($matches) use (&$index, &$tableOfContents) {
        $tag = $matches[1];
        $title = strip_tags($matches[3]);
        $hasId = preg_match('/id=(["\'])(.*?)\1[\s>]/si', $matches[2], $matchedIds);
        $id = $hasId ? $matchedIds[2] : $index++ . '-' . sanitize_title($title);

        $tableOfContents .= "<div class='item-$tag'><a href='#$id'>$title</a></div>";

        if ($hasId) {
            return $matches[0];
        }

        return sprintf('<%s%s id="%s">%s</%s>', $tag, $matches[2], $id, $matches[3], $tag);
    }, $content);

    $tableOfContents .= '</div>';

    return $content;
});

function get_the_table_of_contents()
{
    global $tableOfContents;

    return $tableOfContents;
}
?>