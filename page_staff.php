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
                <div class="row">
                    <div id="team-item">
                        <?php query_posts('post_type=team_area&post_status=publish&posts_per_page=-1&paged='. get_query_var('post')); ?>
                            <?php if(have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>	
                    <div class="item">
                        <div class="child_team_area">
                            <?php the_post_thumbnail( 'team_area' ); ?>
                            <div class="team_social">
                                <div class="team_details">
                                    <p>
                                        <?php echo get_post_meta($post->ID, 'team_position', true); ?>
                                    </p>
                                    <?php $variable = get_post_meta($post->ID, 'team_social_list', true); ?>
                                    <?php
                                    if ( !empty( $variable ) ) {
                                        echo '<ul>';
                                        foreach( $variable as $any_name ) {
                                            echo '<li><a href="'.$any_name['team_social_link'].'"><i class="'.$any_name['team_social_icon'].'"></i></a></li>';
                                        }
                                        echo '</ul>';
                                    }?>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <?php endwhile; ?>    
                    <?php endif; ?> 
                </div>
                </div>
                </div>
                </div>    

    <!-- Footer Bottom area
    ================================================== -->		
    <?php get_footer(); ?>
