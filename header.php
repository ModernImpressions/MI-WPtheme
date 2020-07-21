<?php
/**
 * The template for displaying the header
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Poppins:300,400,500,600&display=swap" rel="stylesheet"> 
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
    <body <?php body_class(); ?>>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->     
        
        <!-- Header Area
        ================================================== -->  
        <header id="header_area">
            <div class="main_header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <i class="far fa-envelope"></i>
                            <?php if ( function_exists( 'get_option_tree') ) : if( get_option_tree( 'email_address') ) : ?>
                                <?php get_option_tree( 'email_address', '', 'true' ); ?>
                            <?php else : ?>
                            <?php endif; endif; ?>  
                        </div>
                        <div class="col-md-4">
                            <?php if ( function_exists( 'get_option_tree') ) : if( get_option_tree( 'upload_logo') ) : ?>
                            <a href="<?php echo home_url(); ?>"><img class="style-svg logo" src="<?php get_option_tree( 'upload_logo', '', 'true' ); ?>" alt="logo"/></a>
                            <?php else : ?>
                            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="" /></a>
                            <?php endif; endif; ?> 
                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-phone-alt"></i>
                            <?php if ( function_exists( 'get_option_tree') ) : if( get_option_tree( 'header_phone') ) : ?>
                                <?php get_option_tree( 'header_phone', '', 'true' ); ?>
                            <?php else : ?>
                            <?php endif; endif; ?>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="main_menu">
                <div class="inner_header_area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                            <?php
                            if (function_exists('wp_nav_menu')) {
                                wp_nav_menu(array('theme_location' => 'wpj-main-menu', 'menu_id' => 'nav', 'fallback_cb' => 'wpj_default_menu'));
                            }
                            else {
                                wpj_default_menu();
                            }
                            ?> 
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </header>      