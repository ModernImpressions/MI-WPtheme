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

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
 * Determines the content for the shortcode for the last best rated posts.
 * Example: [helpful_pro post_type="post" limit="5"]
 *
 * @param array $atts
 * 
 * @return string
 */
function register_helpful_shortcode( $atts ) {

	$defaults = [
		'post_type' => 'post',
		'limit'     => 5,
	];

	$atts = shortcode_atts( $defaults, $atts, 'helpful_pro' );

	$shortcodes = '';

	$limit = 5;

	if ( 5 !== $atts['limit'] && is_numeric( $atts['limit'] ) ) {
		$limit = intval( $atts['limit'] );
	}

	$args = [
		'post_type'      => $atts['post_type'],
		'posts_per_page' => $atts['limit'],
		'metakey'        => 'helpful-pro',
		'orderby'        => [ 'helpful-pro' => 'DESC' ],
	];

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {

		$shortcode .= '<ul>';

		while ( $query->have_posts() ) : $query->the_post();

			$post_id = get_the_ID();
			$pro     = helpful_get_pro( $post_id );
			update_post_meta( $post_id, 'helpful-pro', $pro );

			$shortcode .= sprintf(
				'<li><a href="%1$s">%2$s</a></li>',
				get_the_permalink(),
				get_the_title()
			);

		endwhile;

		$shortcode .= '</ul>';

		wp_reset_postdata();
	}

	return $shortcode;
}

/**
 * Register the shortcode.
 * Example: [helpful_pro post_type="post" limit="5"]
 */
add_shortcode( 'helpful_pro', 'register_helpful_shortcode' );

/** 
 * Declare WooCommerce Support
 */
function add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'add_woocommerce_support' );

/** 
 * Setup Custom Display of Categories on the Shop/Catalog page.
 */
function woo_product_subcategories( $args = array() ) {
	$parentid = get_queried_object_id();
 
	$args = array(
		'parent' => $parentid,
		'hide_empty' => 0
	);
	 
	$terms = get_terms( 'product_cat', $args );
	 
	if ( $terms ) {
		echo '<ul class="product-cats">';
	 
		foreach ( $terms as $term ) {
			echo '<li class="category cat-' . $term->slug . '">';
			woocommerce_subcategory_thumbnail( $term );
				echo '<h2>';
					echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="' . $term->slug . '">';
						echo $term->name;
					echo '</a>';
				echo '</h2>';
			echo '</li>';
		}
		echo '</ul>';
	}
}
add_action( 'woocommerce_archive_description', 'woo_product_subcategories', 50 );

/** 
 * Don't hide empty shop categories.
 */
add_filter( 'woocommerce_product_subcategories_hide_empty', 'hide_empty_categories', 10, 1 );
function hide_empty_categories ( $hide_empty ) {
    $hide_empty  =  FALSE;
    // You can add other logic here too
    return $hide_empty;
}

/**
 * Allows the use of shortcuts in widgets.
 */
add_filter( 'widget_text', 'do_shortcode' );
?>
