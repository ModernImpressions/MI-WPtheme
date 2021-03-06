<?php 

/* ==========================================================================
   Activing All CSS and jQuery in WordPress
   ========================================================================== */


// Add all CSS Files
function my_css_calling(){ 
    wp_register_style('plugins', get_template_directory_uri().'/css/plugins.css', array(), '1.0.1', 'all' ); 
    wp_enqueue_style( 'ali-style', get_stylesheet_uri() );
    wp_register_style('custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.1', 'all' );
    wp_register_style('responsive', get_template_directory_uri().'/css/responsive.css', array(), '1.0.1', 'all' );
    wp_enqueue_style('plugins');
    wp_enqueue_style('custom');
    wp_enqueue_style('responsive');
    
    wp_enqueue_script('jquery');   
    wp_enqueue_script('plugins', get_template_directory_uri() .'/js/plugins.js', array(), '1.0.1', 'true' );
    wp_enqueue_script('fontawesomepro', 'https://kit.fontawesome.com/073823df21.js', array(), '5.14.0', 'false' );
    wp_enqueue_script('main', get_template_directory_uri() .'/js/main.js', array(), '1.0.1', 'true' );

}
add_action('wp_enqueue_scripts', 'my_css_calling');

