<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

            
    <!-- Page Content area
    ================================================== -->		
    <div id="error_page">
        <div class="container inner_error_page">
            <div class="row main_error_sercion">
                <div class="col-md-12 error_section">
                    <p>404 Error - Page Not Found</p>
                    <h1><span>Oops!</span> Looks Like <br>Something Was Broken</h1>
                    <div class="search_form">
                        <?php get_search_form(); ?>
                    </div>
                    <a href="<?php echo home_url(); ?>" class="homepage">Homepage</a>
                </div>
            </div>
        </div>
    </div>  
      

     <?php get_footer(); ?> 