<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>
   
    <!-- Content Area
    ================================================== -->  
        <div id="full_page_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php if (have_posts()) : ?>	
                        <?php while (have_posts()) : the_post(); ?>                                
                        <div class="original_content_area">
                            <div class="post_head">
                                <h1 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                                <p><i class="fa fa-user"></i>by <?php the_author_posts_link(); ?> Posted on <i class="fa fa-calendar-alt "></i><?php echo the_time('F j, Y'); ?></p>
                            </div>  
                            <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            }
                            ?> 
                            <p></p>                            
                            <?php the_content(); ?>
                        </div>
                        
                        <div id="navigation">
                            <div class="child_nav previous_post_link">
                                <h3>PREV</h3>
                                <?php previous_post_link('%link'); ?>
                            </div>
                            <div class="child_nav next_post_link">
                                <h3>NEXT</h3>
                                <?php next_post_link('%link'); ?>
                            </div>
                        </div> 
                        
                        <div id="comments_template">
                            <?php comments_template(); ?>
                        </div> 
                        
                                                                        
                        
                    
                        
                        <?php endwhile; ?>
                        <?php else : ?>
                        <h3><?php _e('404 Error&#58; Not Found', 'alihossain'); ?></h3>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
       
      
        
    <!-- Footer Bottom area
    ================================================== -->		
    <?php get_footer(); ?>