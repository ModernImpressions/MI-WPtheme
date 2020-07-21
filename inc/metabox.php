<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'ali_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function ali_meta_boxes() {
  
  /**
   * Service Area Meta Box
   */
  $ali_meta_box = array(
    'id'          => 'carter_christian_counseling',
    'title'       => __( 'Team Details', 'theme-text-domain' ),
    'desc'        => '',
    'pages'       => array( 'team_area' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Team Position', 'theme-text-domain' ),
        'id'          => 'team_position',
        'type'        => 'text',
        'desc'        => __( 'It will only visible on homepage.', 'theme-text-domain' )
      ),
    array(    
        'id'          => 'team_social_list',
        'label'       => __( 'Social list', 'option-tree-theme' ),
        'desc'        => __( 'Add your Social name, links, images e.t.c.' ),
        'type'        => 'list-item',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array(
                    array(
                        'id'         => 'team_social_icon',
                        'label'      => 'Social Icon',
                        'desc'       => 'Place your font-awsome icon name here. For getting fontawsome icon <a href="http://fontawesome.io/icons/" target="_blank">click here</a>',
                        'std'        => '',
                        'type'       => 'text',
                    ),
                    array(
                        'id'         => 'team_social_link',
                        'label'      => 'Social Link',
                        'desc'       => 'Add your Social Link here',
                        'std'        => '',
                        'type'       => 'text',
                    ),
                )
        ),
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $ali_meta_box );
  

}