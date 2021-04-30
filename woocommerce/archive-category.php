<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
 <!-- Content Area
    ================================================== -->
	<div id="full_page_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="original_content_area">
							<div class="product-listing-hero-banner mobi-displaynone" style="background-image:url('#');">
								<div class="container">
									<div class="row padlr">
										<div class="promo-content-block overflow pull-left">
											<h1 class="title"><?php woocommerce_page_title(); ?></h1>
											<div class="">
												<?php
													/**
	 												* Hook: woocommerce_archive_description.
	 												*
	 												* @hooked woocommerce_taxonomy_archive_description - 10
	 												* @hooked woocommerce_product_archive_description - 10
	 												*/
													do_action( 'woocommerce_archive_description' );
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
								/** 
								 * Setup Custom Display of Categories on the Shop/Catalog page.
 								 */
								$parentid = get_queried_object_id();
								$main_term = get_queried_object();
								$taxonomy   = 'product_cat';
								$args = array(
									'parent' => $parentid,
									'hide_empty' => false,
								);
								$terms = get_terms( 'product_cat', $args );
	 
								if ( $terms ) {
									echo '<div id="tabs">';
										echo '<div id="common-tabs" class="overflow pad0 boxsizing">';
											echo '<ul class="product-cats product-cats-gallery sub-category-list">'; 
												foreach ( $terms as $term ) {
													$current_term = $term;
													echo '<li class="category cat-' . $term->slug . ' sub-category">';
														echo '<section>';
															echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="' . $term->slug . '" style="text-decoration:none">';
																echo '<div class="HoverLine">';
																	echo '<div class="category-header header-' . $term->slug . ' sub-category-header">';
																		echo '<!--heading content starts-->';
																		echo '<h4 class="sub-category-title">' . $term->name . '</h4>';
																		echo '<!--heading content ends-->';
																	echo '</div>';
																echo '</div>';
															echo '</a>';
														echo '</section>';
													echo '</li>';
												}
											echo '</ul>';
										echo '</div>';
									echo '</div>';
								echo '<hr/>';
							} ?>
							<h3 class="title subtitle">Products</h3>
                            <?php 
							if ( woocommerce_product_loop() ) {

								/**
								 * Hook: woocommerce_before_shop_loop.
								 *
								 * @hooked woocommerce_output_all_notices - 10
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action( 'woocommerce_before_shop_loop' );
							
								woocommerce_product_loop_start();
							
								if ( wc_get_loop_prop( 'total' ) ) {
									while ( have_posts() ) {
										the_post();
							
										/**
										 * Hook: woocommerce_shop_loop.
										 */
										do_action( 'woocommerce_shop_loop' );
							
										wc_get_template_part( 'content', 'product' );
									}
								}
							
								woocommerce_product_loop_end();
							
								/**
								 * Hook: woocommerce_after_shop_loop.
								 *
								 * @hooked woocommerce_pagination - 10
								 */
								do_action( 'woocommerce_after_shop_loop' );
							} else {
								/**
								 * Hook: woocommerce_no_products_found.
								 *
								 * @hooked wc_no_products_found - 10
								 */
								do_action( 'woocommerce_no_products_found' );
							}
							?>
                        </div>
						<?php 
						/**
 						* Hook: woocommerce_after_main_content.
 						*
						* @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 						*/
						do_action( 'woocommerce_after_main_content' );
						?>
                    </div>
                </div>
            </div>
        </div>  
<?php
get_footer( 'shop' );
