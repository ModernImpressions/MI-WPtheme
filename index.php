<?php
/**
 * The main template file
 */
get_header(); ?>  

  
    <!-- Content Area
    ================================================== -->  
        <div id="content_area">
            <div class="container">
                <div class="row home_blog">
                    <?php if (have_posts()) : ?>	
                    <?php while (have_posts()) : the_post(); ?>                      
                    <div class="col-md-4 child_blog">
                        <div class="post_head">
                            <h1 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                            <p><i class="fa fa-user"></i>by <?php the_author_posts_link(); ?> Posted on <i class="fa fa-calendar-alt "></i><?php echo the_time('F j, Y'); ?></p>
                        </div>
                        <div class="post_thumb">
                            <?php
                            // Must be inside a loop.

                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            }
                            else {
                                echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
                                    . '/img/thumbnail.jpg" />';
                            }
                            ?> 
                        </div>
                        <div class="post_details">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php else : ?>
                    <h3><?php _e('404 Error&#58; Not Found', 'alihossain'); ?></h3>
                    <?php endif; ?>	                         
                </div>
                <div class="row">
                    <div class="col-md-12">
                     <div class="pagenavarea">
                        <div class="pagenavarea_inner">
                            <div id="pagenavi" class="clearfix">
                                <?php if('magazine_pagenavi') { magazine_pagenavi(); } else { ?>
                                <?php next_posts_link('<span class="alignleft">&nbsp; &laquo; Older posts</span>') ?>
                                <?php previous_posts_link('<span class="alignright">Newer posts &raquo; &nbsp;</span>') ?>
                                <?php } ?>
                            </div> 
                         </div>
                     </div>                           
                    </div>
                </div>
            </div>
        </div>
          

                  
<?php get_footer(); ?> 