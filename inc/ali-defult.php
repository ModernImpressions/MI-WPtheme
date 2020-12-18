<?php 
/* ==========================================================================
   All Defult Theme Dunction.
   Developed by: ALI HOSSAIN
   ========================================================================== */
	

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'alihossain', get_template_directory() . '/languages' );


	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support('category-thumbnails');



    /****** Add Thumbnails in Manage Posts/Pages List ******/
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'audio', 'video' ) );
    add_theme_support( 'post-thumbnails', array( 'post', 'gallery-images', 'product', 'slider', 'service' ) );
    if ( !function_exists('AddThumbColumn') && function_exists('add_theme_support') ) {

        // for post and page
        add_theme_support('post-thumbnails', array( 'post', 'page', 'slider',) );
        add_image_size( 'slider', 1920, 700, true );
        add_image_size( 'team_area', 275, 275, true );

        function AddThumbColumn($cols) {

            $cols['thumbnail'] = __('Thumbnail',  'alihossain');

            return $cols;
        }

        function AddThumbValue($column_name, $post_id) {

                $width = (int) 60;
                $height = (int) 60;

                if ( 'thumbnail' == $column_name ) {
                    // thumbnail of WP 2.9
                    $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
                    // image from gallery
                    $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
                    if ($thumbnail_id)
                        $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
                    elseif ($attachments) {
                        foreach ( $attachments as $attachment_id => $attachment ) {
                            $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
                        }
                    }
                        if ( isset($thumb) && $thumb ) {
                            echo $thumb;
                        } else {
                            echo __('None',  'alihossain');
                        }
                }
        }

        // for posts
        add_filter( 'manage_posts_columns', 'AddThumbColumn' );
        add_action( 'manage_posts_custom_column', 'AddThumbValue', 10, 2 );

        // for pages
        add_filter( 'manage_pages_columns', 'AddThumbColumn' );
        add_action( 'manage_pages_custom_column', 'AddThumbValue', 10, 2 );
    }




/* ==========================================================================
   Register comment Support
   ========================================================================== */
    function comment_scripts(){
        if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
    }






/* ==========================================================================
   Register Menu Higliter
   ========================================================================== */

    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
    function special_nav_class($classes, $item){
         if( in_array('current-menu-item', $classes) ){
                 $classes[] = 'active ';
         }
         return $classes;
    }






/* ==========================================================================
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 * This code for readmore
   ========================================================================== */

function new_excerpt_more($more) {
global $post;
    return '<br> <br><a class="readmore" href="'. get_permalink($post->ID) . '">' . 'Read More' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );







/* ==========================================================================
 * Register Pagenavi Function
   ========================================================================== */

 function magazine_pagenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $args['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $args['total'] = $max;
  $args['current'] = $current;
  $total = 1;
  $args['mid_size'] = 3;
  $args['end_size'] = 1;
  $args['prev_text'] = '&#171; Prev';
  $args['next_text'] = 'Next &raquo;';
  if ($max > 1) echo '</pre>
<div class="wp-pagenavi">';
 if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>';
 echo $pages . paginate_links($args);
 if ($max > 1) echo '</div>
<pre>';
}
