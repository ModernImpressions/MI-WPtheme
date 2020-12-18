<?php 

/* ==========================================================================
   Register Slider Function
   ========================================================================== */
     
add_action( 'init', 'slider_custom' );
function slider_custom() {
        register_post_type( 'slider',
                array(
                        'labels' => array(
                                'name' => ( 'Sliders' ),
                                'singular_name' => ( 'Slider' ),
                                'add_new' => ( 'Add New Slider' ),
                                'add_new_item' => ( 'Add New Slider' ),
                                'edit_item' => ( 'Edit Slider' ),
                                'new_item' => ( 'New Slider' ),
                                'view_item' => ( 'View Slider' ),
                                'not_found' => ( 'Sorry, we couldn\'t find the Slider you are looking for.' )
                        ),
                'menu_icon'   => 'dashicons-images-alt2',    
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => true,
                'menu_position' => 5,
                'has_archive' => true,
                'hierarchical' => true,
                'show_ui' => true,    
                'capability_type' => 'post',
                'rewrite' => array( 'slug' => 'slider' ),
                'supports' => array( 'title', 'thumbnail', 'editor' )
                )
        );
}

  

/* ==========================================================================
   Register Team Function
   ========================================================================== */
     
add_action( 'init', 'custom_team' );
function custom_team() {
        register_post_type( 'team_area',
                array(
                        'labels' => array(
                                'name' => ( 'Team' ),
                                'singular_name' => ( 'Team' ),
                                'add_new' => ( 'Add New Team' ),
                                'add_new_item' => ( 'Add New Team' ),
                                'edit_item' => ( 'Edit Team' ),
                                'new_item' => ( 'New Team' ),
                                'view_item' => ( 'View Team' ),
                                'not_found' => ( 'Sorry, we couldn\'t find the Team you are looking for.' )
                        ),
                'menu_icon'   => 'dashicons-businessman',    
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => true,
                'menu_position' => 4,
                'has_archive' => true,
                'hierarchical' => true,
                'show_ui' => true,    
                'capability_type' => 'post',
                'rewrite' => array( 'slug' => 'team' ),
                'supports' => array( 'title', 'thumbnail',)
                )
        );
}
  


?>