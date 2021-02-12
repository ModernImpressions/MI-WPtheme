<?php
/**
*Template Name: Staff
*/

get_header(); ?>
  
    <!-- Content Area
    ================================================== -->  
        <div id="full_page_area">
            <?php if (have_posts()) : ?>	
            <?php while (have_posts()) : the_post(); ?>             
            <div class="inner_full_page_thumb">
                <?php echo the_post_thumbnail(); ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="original_content_area">
                            <h1 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                            <?php the_content(); ?>
                        </div>
                        <?php endwhile; ?>
                        <?php else : ?>
                        <h3><?php _e('404 Error&#58; Not Found', 'alihossain'); ?></h3>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Staff area ================================================== -->	           
                    <?php get_template_part('staff_part/staff_area-admin'); ?>
                    <?php get_template_part('staff_part/staff_area-sales'); ?>
                    <?php get_template_part('staff_part/staff_area-marketing'); ?>
                    <?php get_template_part('staff_part/staff_area-service'); ?>
                    <?php get_template_part('staff_part/staff_area-it'); ?>
                </div>
                </div>
                </div>    
<!-- Footer Bottom area ================================================== -->		
    <?php get_footer(); ?>
