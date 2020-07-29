<?php
/**
*Template Name: Full Width Knowledgebase Article Page
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
                            <h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                            <?php the_content(); ?>
                        </div>
						<div id="comments_template">

                            <?php comments_template(); ?>

                        </div> 
                        <?php endwhile; ?>
                        <?php else : ?>
                        <h3><?php _e('404 Error&#58; Not Found', 'alihossain'); ?></h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
       
        
    <!-- Footer Bottom area
    ================================================== -->		
    <?php get_footer(); ?>
