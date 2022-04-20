<?php

/**
 *Template Name: Home Page
 */

get_header(); ?>


<!-- Homepage Banner area
    ================================================== -->
<?php get_template_part('home_part/banner_area'); ?>


<!-- Homepage Welcome area
    ================================================== -->
<?php get_template_part('home_part/welcome_area'); ?>


<!-- Homepage Service area
    ================================================== -->
<?php get_template_part('home_part/service_area'); ?>


<!-- Homepage Impression area
    ================================================== -->
<?php get_template_part('home_part/impression_area'); ?>


<!-- Homepage Team area
    ================================================== -->
<?php get_template_part('home_part/team_area'); ?>


<!-- Homepage Testimonials area
    ================================================== -->
<?php get_template_part('home_part/testimonials_area'); ?>

<!-- Homepage Brand area
    ================================================== -->
<?php get_template_part('home_part/brand_area'); ?>

<div class="row">
    <div class="col-sm-12">
        <div id="netpromoter">
            <?php get_template_part('other_part/ceojuice-npscore/netpromoter_part.php'); ?>
        </div>
    </div>
</div>

<!-- Footer Bottom area
    ================================================== -->
<?php get_footer(); ?>
