<?php 
/* ==========================================================================
   Register widget areas.
   ========================================================================== */

function ali_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Banner Widget Area', 'alihossain' ),
		'id'            => 'banner-widget',
		'description'   => __( 'Appears in the Banner section of the site. Below the Navigation', 'alihossain' ),
		'before_widget' => '<div class="child_banner cta-fontoverride">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="title" style="display: none;">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'alihossain' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the Sidebar section of the site.', 'alihossain' ),
		'before_widget' => '<div class="child_sideber">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget One', 'alihossain' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears in the footer section of the site.', 'alihossain' ),
		'before_widget' => '<div class="child_footer">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Two', 'alihossain' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'alihossain' ),
		'before_widget' => '<div class="child_footer">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Three', 'alihossain' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Appears in the footer section of the site.', 'alihossain' ),
		'before_widget' => '<div class="child_footer">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Catalog Filter Widget', 'alihossain' ),
		'id'            => 'filter-widget',
		'description'   => __( 'Appears in the shop/catalog section of the site.', 'alihossain' ),
		'before_widget' => '',
		'after_widget'  => '<hr>',
		'before_title'  => '<h3 id="shop-filters" class="shop-filters-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ali_widgets_init' );


