<?php

/**

 * My Theme functions and definitions

 */

function add_cors_http_header()
{
	header("Access-Control-Allow-Origin: *");
}
add_action('init', 'add_cors_http_header');

/*
// disables WP Heartbeat - this is only for real-time plugin notifications, or showing if a user is editing a post, due to the nature of this site, this is currently un-needed, and is cause higher CPU usage.
add_action( 'init', 'stop_heartbeat', 1 );
function stop_heartbeat() {

    wp_deregister_script('heartbeat');
}
*/

function call_flowscripts()
{
	wp_register_style('vue-flow', 'https://unpkg.com/@ditdot-dev/vue-flow-form@1.1.2/dist/vue-flow-form.min.css', array(), '1.1.2', 'all');
	wp_register_style('flow', get_template_directory_uri() . '/css/flow.min.css', array(), '1.0.0', 'all');
	wp_register_style('flow-custom', get_template_directory_uri() . '/css/vue-flow-custom.min.css', array(), '1.0.0', 'all');

	wp_enqueue_style('flow');
	wp_enqueue_style('flow-custom');

	wp_enqueue_script('vue', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js', array(), '2.6.11', 'all');
	wp_enqueue_script('vue-flow', 'https://unpkg.com/@ditdot-dev/vue-flow-form@1.1.2', array(), '1.1.2', 'all');
	//wp_enqueue_script('flow', get_template_directory_uri() .'/js/flow.js', array(), '1.0.0', 'true' );
}
add_action('wp_enqueue_scripts', 'call_flowscripts');

function ali_theam_jquery()
{

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

// Add Authorize.net Functions
include_once('inc/authorize.net/functions.php');

/***********************************************************************************************/

/* Add Theme Option */

/***********************************************************************************************/

add_filter('ot_show_pages', '__return_false');

add_filter('ot_show_new_layout', '__return_false');

add_filter('ot_theme_mode', '__return_true');

require(trailingslashit(get_template_directory()) . 'option-tree/ot-loader.php');

include_once('option-tree/ot-loader.php');

include_once('inc/theme-options.php');

include_once('inc/metabox.php');

function codextent_ssl_srcset($sources)
{
	foreach ($sources as &$source) {
		$source['url'] = set_url_scheme($source['url'], 'https');
	}
	return $sources;
}
add_filter('wp_calculate_image_srcset', 'codextent_ssl_srcset');

function getPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 View";
	}
	return $count . ' Views';
}
function setPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}
// Remove issues with prefetching adding extra views
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
 * Determines the content for the shortcode for the last best rated posts.
 * Example: [helpful_pro post_type="post" limit="5"]
 *
 * @param array $atts
 *
 * @return string
 */
function register_helpful_shortcode($atts)
{

	$defaults = [
		'post_type' => 'post',
		'limit'     => 5,
	];

	$atts = shortcode_atts($defaults, $atts, 'helpful_pro');

	$shortcodes = '';

	$limit = 5;

	if (5 !== $atts['limit'] && is_numeric($atts['limit'])) {
		$limit = intval($atts['limit']);
	}

	$args = [
		'post_type'      => $atts['post_type'],
		'posts_per_page' => $atts['limit'],
		'metakey'        => 'helpful-pro',
		'orderby'        => ['helpful-pro' => 'DESC'],
	];

	$query = new WP_Query($args);

	if ($query->have_posts()) {

		$shortcode .= '<ul>';

		while ($query->have_posts()) : $query->the_post();

			$post_id = get_the_ID();
			$pro     = helpful_get_pro($post_id);
			update_post_meta($post_id, 'helpful-pro', $pro);

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
add_shortcode('helpful_pro', 'register_helpful_shortcode');

/**
 * Declare WooCommerce Support
 */
function add_woocommerce_support()
{
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'add_woocommerce_support');

function add_catalog_styles()
{
	wp_register_style('store_overrides', get_template_directory_uri() . '/css/store.min.css', array(), '1.0.0', 'all');
	wp_enqueue_style('store_overrides');
}
add_action('woocommerce_before_main_content', 'add_catalog_styles');

/**
 * Don't hide empty shop categories.
 */
add_filter('woocommerce_product_subcategories_hide_empty', 'hide_empty_categories', 10, 1);
function hide_empty_categories($hide_empty)
{
	$hide_empty  =  false;
	// You can add other logic here too
	return $hide_empty;
}

/**
 * Allows the use of shortcuts in widgets.
 */
add_filter('widget_text', 'do_shortcode');

// Settings Page: TeamViewer
// Retrieving values: get_option( 'your_field_id' )
class teamviewer_Settings_Page
{

	public function __construct()
	{
		add_action('admin_menu', array($this, 'wph_create_settings'));
		add_action('admin_init', array($this, 'wph_setup_sections'));
		add_action('admin_init', array($this, 'wph_setup_fields'));
	}

	public function wph_create_settings()
	{
		$page_title = 'TeamViewer Download Settings';
		$menu_title = 'TeamViewer';
		$capability = 'manage_options';
		$slug = 'teamviewer';
		$callback = array($this, 'wph_settings_content');
		add_options_page($page_title, $menu_title, $capability, $slug, $callback);
	}

	public function wph_settings_content()
	{ ?>
		<div class="wrap">
			<h1>TeamViewer Download Settings</h1>
			<?php settings_errors(); ?>
			<form method="POST" action="options.php">
				<?php
				settings_fields('teamviewer');
				do_settings_sections('teamviewer');
				submit_button();
				?>
			</form>
		</div> <?php
			}

			public function wph_setup_sections()
			{
				add_settings_section('teamviewer_section', 'Settings to allow the QuickSupport download', array(), 'teamviewer');
			}

			public function wph_setup_fields()
			{
				$fields = array(
					array(
						'label' => 'Custom Build Tag',
						'id' => 'tv_customBuildTag',
						'type' => 'text',
						'section' => 'teamviewer_section',
						'desc' => 'Enter the part of the Teamviewer URL after the /  ',
						'placeholder' => 'helpontheway',
						'default' => 'helpontheway',
					),
				);
				foreach ($fields as $field) {
					add_settings_field($field['id'], $field['label'], array($this, 'wph_field_callback'), 'teamviewer', $field['section'], $field);
					register_setting('teamviewer', $field['id']);
				}
			}

			public function wph_field_callback($field)
			{
				$value = get_option($field['id']);
				$placeholder = '';
				if (isset($field['placeholder'])) {
					$placeholder = $field['placeholder'];
				}
				switch ($field['type']) {
					default:
						printf(
							'<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
							$field['id'],
							$field['type'],
							$placeholder,
							$value
						);
				}
				if (isset($field['desc'])) {
					if ($desc = $field['desc']) {
						printf('<p class="description">%s </p>', $desc);
					}
				}
			}
		}
		new teamviewer_Settings_Page();

		//fix for ob_end_flush() error
		/**
		 * Proper ob_end_flush() for all levels
		 *
		 * This replaces the WordPress `wp_ob_end_flush_all()` function
		 * with a replacement that doesn't cause PHP notices.
		 */
		remove_action('shutdown', 'wp_ob_end_flush_all', 1);
		add_action('shutdown', function () {
			while (@ob_end_flush());
		});
