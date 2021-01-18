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
    <!-- Inlined Google Font loading -->
    <style>
    /* bebas-neue-regular - latin-ext_latin */
@font-face {
    font-family: 'Bebas Neue';
    font-style: normal;
    font-weight: 400;
    font-display: swap;
    src: url('<?php echo get_template_directory_uri(); ?>/webfonts/bebas-neue-v1-latin-ext_latin-regular.eot');
    /* IE9 Compat Modes */
    src: local('Bebas Neue Regular'), local('BebasNeue-Regular'), url('<?php echo get_template_directory_uri(); ?>/webfonts/bebas-neue-v1-latin-ext_latin-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/bebas-neue-v1-latin-ext_latin-regular.woff2') format('woff2'), /* Super Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/bebas-neue-v1-latin-ext_latin-regular.woff') format('woff'), /* Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/bebas-neue-v1-latin-ext_latin-regular.ttf') format('truetype'), /* Safari, Android, iOS */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/bebas-neue-v1-latin-ext_latin-regular.svg#BebasNeue') format('svg');
    /* Legacy iOS */
}
/* poppins-100 - latin-ext_latin_devanagari */
@font-face {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 100;
    font-display: swap;
    src: url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-100.eot');
    /* IE9 Compat Modes */
    src: local('Poppins Thin'), local('Poppins-Thin'), url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-100.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-100.woff2') format('woff2'), /* Super Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-100.woff') format('woff'), /* Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-100.ttf') format('truetype'), /* Safari, Android, iOS */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-100.svg#Poppins') format('svg');
    /* Legacy iOS */
}
/* poppins-200 - latin-ext_latin_devanagari */
@font-face {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 200;
    font-display: swap;
    src: url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-200.eot');
    /* IE9 Compat Modes */
    src: local('Poppins ExtraLight'), local('Poppins-ExtraLight'), url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-200.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-200.woff2') format('woff2'), /* Super Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-200.woff') format('woff'), /* Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-200.ttf') format('truetype'), /* Safari, Android, iOS */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-200.svg#Poppins') format('svg');
    /* Legacy iOS */
}
/* poppins-300 - latin-ext_latin_devanagari */
@font-face {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 300;
    font-display: swap;
    src: url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-300.eot');
    /* IE9 Compat Modes */
    src: local('Poppins Light'), local('Poppins-Light'), url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-300.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-300.woff2') format('woff2'), /* Super Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-300.woff') format('woff'), /* Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-300.ttf') format('truetype'), /* Safari, Android, iOS */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-300.svg#Poppins') format('svg');
    /* Legacy iOS */
}
/* poppins-regular - latin-ext_latin_devanagari */
@font-face {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 400;
    font-display: swap;
    src: url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-regular.eot');
    /* IE9 Compat Modes */
    src: local('Poppins Regular'), local('Poppins-Regular'), url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-regular.woff2') format('woff2'), /* Super Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-regular.woff') format('woff'), /* Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-regular.ttf') format('truetype'), /* Safari, Android, iOS */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-regular.svg#Poppins') format('svg');
    /* Legacy iOS */
}
/* poppins-italic - latin-ext_latin_devanagari */
@font-face {
    font-family: 'Poppins';
    font-style: italic;
    font-weight: 400;
    font-display: swap;
    src: url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-italic.eot');
    /* IE9 Compat Modes */
    src: local('Poppins Italic'), local('Poppins-Italic'), url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-italic.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-italic.woff2') format('woff2'), /* Super Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-italic.woff') format('woff'), /* Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-italic.ttf') format('truetype'), /* Safari, Android, iOS */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-italic.svg#Poppins') format('svg');
    /* Legacy iOS */
}
/* poppins-500 - latin-ext_latin_devanagari */
@font-face {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 500;
    font-display: swap;
    src: url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-500.eot');
    /* IE9 Compat Modes */
    src: local('Poppins Medium'), local('Poppins-Medium'), url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-500.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-500.woff2') format('woff2'), /* Super Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-500.woff') format('woff'), /* Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-500.ttf') format('truetype'), /* Safari, Android, iOS */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-500.svg#Poppins') format('svg');
    /* Legacy iOS */
}
/* poppins-600 - latin-ext_latin_devanagari */
@font-face {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 600;
    font-display: swap;
    src: url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-600.eot');
    /* IE9 Compat Modes */
    src: local('Poppins SemiBold'), local('Poppins-SemiBold'), url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-600.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-600.woff2') format('woff2'), /* Super Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-600.woff') format('woff'), /* Modern Browsers */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-600.ttf') format('truetype'), /* Safari, Android, iOS */
    url('<?php echo get_template_directory_uri(); ?>/webfonts/poppins-v12-latin-ext_latin_devanagari-600.svg#Poppins') format('svg');
    /* Legacy iOS */
}
    </style>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php call_flowscripts(); ?>
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