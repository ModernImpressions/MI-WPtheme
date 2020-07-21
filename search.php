<?php
/**
 * The template for displaying Search Results pages
 */

get_header(); ?>
        
    <!-- Content Area
    ================================================== -->  
        <div id="archive_area">
            <h1><?php printf( __( 'Search Results for: %s', 'alihossain' ), get_search_query() ); ?></h1>
        </div>
    
        <div id="content_area" class="search_page">
            <div class="container">
                <div class="row">
                    <div class="search_form">
                        <h3>Need a new search?</h3>
                        <p>If you didn't find what you were looking for, try a new search!</p>
                        <?php get_search_form(); ?>
                    </div>  
                    <?php if (have_posts()) : ?>	
                    <?php while (have_posts()) : the_post(); ?>                      
                    <div class="col-md-4">
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
                    <?php endif; ?>                  	     
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
    
     

<?php get_footer(); ?>  