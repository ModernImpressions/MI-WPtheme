<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function custom_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'option_types_help',
          'title'     => __( 'Option Types', 'theme-text-domain' ),
          'content'   => '<p>' . __( 'Help content goes here!', 'theme-text-domain' ) . '</p>'
        )
      ),
      'sidebar'       => '<p>' . __( 'Sidebar content goes here!', 'theme-text-domain' ) . '</p>'
    ),
    'sections'        => array( 
      array(
        'id'          => 'logo_uploder',
        'title'       => __( 'Header Settings', 'theme-text-domain' )
      ),
      array(
        'id'          => 'contact_settings',
        'title'       => __( 'Contact Settings', 'theme-text-domain' )
      ),
      array(
        'id'          => 'homepage_settings',
        'title'       => __( 'Homepage Settings ', 'theme-text-domain' )
      ),       
      array(
        'id'          => 'footer_settings',
        'title'       => __( 'Footer Settings ', 'theme-text-domain' )
      ),        
    ),
    'settings'        => array( 
          array(
            'id'          => 'upload_logo',
            'label'       => __( 'Upload your Logo', 'theme-text-domain' ),
            'desc'        => __( 'If need you can change your website logo by uploading.', 'theme-text-domain' ),
            'std'         => '',
            'type'        => 'upload',
            'section'     => 'logo_uploder',
          ),   
          array(
            'id'          => 'email_address',
            'label'       => __( 'Email Address', 'theme-text-domain' ),
            'desc'        => __( 'If need you can edit or update your email address and it will visible in top header and footer section.', 'theme-text-domain' ),
            'std'         => '<p>Email us <strong>user@yourdomain.com</strong></p>',
            'type'        => 'textarea',
            'section'     => 'contact_settings',
          ),   
          array(
            'id'          => 'header_phone',
            'label'       => __( 'Phone Number', 'theme-text-domain' ),
            'desc'        => __( 'If need you can edit or update your phone number and it will visible in top header section.', 'theme-text-domain' ),
            'std'         => '<p>Help line <strong>1-800-840-2554</strong></p>',
            'type'        => 'textarea',
            'section'     => 'contact_settings',
          ),
        array(    
            'id'          => 'social_list',
            'label'       => __( 'Social list', 'option-tree-theme' ),
            'desc'        => __( 'Add your social links and images. I use here fontawsome..' ),
            'type'        => 'list-item',
            'section'     => 'contact_settings',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'settings'    => array(
                        array(
                            'id'         => 'social_link',
                            'label'      => 'Social Link',
                            'desc'       => 'Place your social url with http://',
                            'std'        => '',
                            'type'       => 'text',
                        ),
                        array(
                            'id'         => 'social_icon',
                            'label'      => 'Social Icon',
                            'desc'       => 'Place your font-awsome icon name here. For getting fontawsome icon <a href="http://fontawesome.io/icons/" target="_blank">click here</a>',
                            'std'        => '',
                            'type'       => 'text',
                        ),

                    )
            ),     
          array(
            'id'          => 'banner_textarea',
            'label'       => __( 'Banner Textarea', 'theme-text-domain' ),
            'desc'        => __( 'You can edit or update your banner textarea form here.', 'theme-text-domain' ),  
            'std'         => '<h5>Technology That</h5>
<h3>Means Business</h3>
<p>Suspendisse sollicitudin id nulla ut eleifend. In nisl tortor, viverra sed urna id, faucibus ullamcorper dolor. Vestibulum sed quam at lectus scelerisque</p>
<p><a href="#">get a quote</a></p>',
            'type'        => 'textarea',
            'section'     => 'homepage_settings',
          ),     
          array(
            'id'          => 'anniversary_image',
            'label'       => __( 'Anniversary Image', 'theme-text-domain' ),
            'desc'        => __( 'You can upload your Anniversary Image form here.', 'theme-text-domain' ),  
            'std'         => '',
            'type'        => 'upload',
            'section'     => 'homepage_settings',
          ), 
          array(
            'id'          => 'welcome_textarea',
            'label'       => __( 'Welcome Textarea', 'theme-text-domain' ),
            'desc'        => __( 'You can edit or update your welcome textarea form here.', 'theme-text-domain' ),  
            'std'         => '<h5>welcome to</h5>
<h3>Modern Impressions</h3>
<p>Modern Impressions is the technology solutions provider that understands profit is your bottom line. Applying years of workflow experience, state-of-the-art hardware and software, quality paper handling equipment, and robust technology support, Mi makes sure technology means business for you.</p>
<a href="#">learn more</a>',
            'type'        => 'textarea',
            'section'     => 'homepage_settings',
          ),   
        array(    
            'id'          => 'service_list',
            'label'       => __( 'Service list', 'option-tree-theme' ),
            'desc'        => __( 'Add your service name, links, images e.t.c.' ),
            'type'        => 'list-item',
            'section'     => 'homepage_settings',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'settings'    => array(
                        array(
                            'id'         => 'service_title',
                            'label'      => 'Service Title',
                            'desc'       => 'Add your Service Title here',
                            'std'        => '',
                            'type'       => 'text',
                        ),
                        array(
                            'id'         => 'service_image',
                            'label'      => 'Service Image',
                            'desc'       => 'Upload your Service Image here.',
                            'std'        => '',
                            'type'       => 'upload',
                        ),
                        array(
                            'id'         => 'service_text',
                            'label'      => 'Service Textarea',
                            'desc'       => 'Add your service textarea here ',
                            'std'        => '',
                            'type'       => 'textarea',
                        ),
                        array(
                            'id'         => 'service_link',
                            'label'      => 'Service URL',
                            'desc'       => 'Add your service URL here and do not forget to add http://',
                            'std'        => 'http://',
                            'type'       => 'text',
                        ),
                    )
            ),   
          array(
            'id'          => 'impression_textarea',
            'label'       => __( 'Impression Textarea', 'theme-text-domain' ),
            'desc'        => __( 'You can edit or update your Impression Textarea form here.', 'theme-text-domain' ),  
            'std'         => '<h4>WHY Modern Impressions?</h4>
<p>Ut at tellus lectus. Curabitur velit justo, semper non ligula ac, rutrum iaculis nisl. Aliquam erat volutpat. Donec eget mauris magna. Nullam in urna eleifend, ornare urna fringilla, dictum turpis.</p>',
            'type'        => 'textarea',
            'section'     => 'homepage_settings',
          ), 
        array(    
            'id'          => 'impression_list',
            'label'       => __( 'Impression list', 'option-tree-theme' ),
            'desc'        => __( 'Add your Impression name, links, images e.t.c.' ),
            'type'        => 'list-item',
            'section'     => 'homepage_settings',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'settings'    => array(
                        array(
                            'id'         => 'impression_title',
                            'label'      => 'Impression Title',
                            'desc'       => 'Add your Impression Title here',
                            'std'        => '',
                            'type'       => 'text',
                        ),
                        array(
                            'id'         => 'impression_number',
                            'label'      => 'Impression Number',
                            'desc'       => 'Add your Impression number here',
                            'std'        => '',
                            'type'       => 'text',
                        ),
                        array(
                            'id'         => 'impression_textarea',
                            'label'      => 'Impression Textarea',
                            'desc'       => 'Add your Impression textarea here ',
                            'std'        => '',
                            'type'       => 'textarea',
                        ),
                    )
            ),                   
          array(
            'id'          => 'team_area',
            'label'       => __( 'Team Area', 'theme-text-domain' ),
            'desc'        => __( 'You can edit or update your team textarea here <strong style="color:red">Create your team form left menu. You will get it after post section in left menu area.</strong>', 'theme-text-domain' ),  
            'std'         => '<h3>meet our team</h3>
<p>Ut at tellus lectus. Curabitur velit justo, semper non ligula ac, rutrum iaculis nisl. Aliquam erat volutpat. Donec eget mauris magna. Nullam in urna eleifend, ornare urna fringilla, dictum turpis.</p>',
            'type'        => 'textarea',
            'section'     => 'homepage_settings',
          ), 
        array(    
            'id'          => 'brand_list',
            'label'       => __( 'Brand list', 'option-tree-theme' ),
            'desc'        => __( 'Add your Brand images here' ),
            'type'        => 'list-item',
            'section'     => 'homepage_settings',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'settings'    => array(
                        array(
                            'id'         => 'brand_image',
                            'label'      => 'Brand Image',
                            'desc'       => 'Upload your brand image here.',
                            'std'        => '',
                            'type'       => 'upload',
                        ),
                        array(
                            'id'         => 'brand_link',
                            'label'      => 'Brand URL',
                            'desc'       => 'Add your Brand Link here',
                            'std'        => '',
                            'type'       => 'text',
                        ),
                    )
            ), 
          array(
            'id'          => 'copyright_textarea',
            'label'       => __( 'Copyright Textarea', 'theme-text-domain' ),
            'desc'        => __( 'If you need, you can update or edit your copyright textarea.', 'theme-text-domain' ),
            'std'         => '<p>© 2019 modern impresion. All Rights Reserved.</p>',
            'type'        => 'textarea',
            'section'     => 'footer_settings',
          ),        
      
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}