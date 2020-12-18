        <section id="team_area">

            <div class="container">

                <div class="row">

                    <div class="col-md-1"></div>

                    <div class="col-md-10">

                        <?php if ( function_exists( 'get_option_tree') ) : if( get_option_tree( 'team_area') ) : ?>

                            <?php get_option_tree( 'team_area', '', 'true' ); ?>

                        <?php else : ?>

                        <?php endif; endif; ?>  

                    </div>

                </div>

                <div class="row">

                    <div id="owl-team-item">

                    <?php query_posts('post_type=team_area&post_status=publish&posts_per_page=-1&paged='. get_query_var('post')); ?>

                    <?php if(have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>	

                        <div class="item">

                            <div class="child_team_area">

                                <?php the_post_thumbnail( 'team_area' ); ?>

                                <div class="team_social">

                                    <div class="team_details">

                                        <h3><?php the_title(); ?></h3>

                                        <p><?php echo get_post_meta($post->ID, 'team_position', true); ?></p>

                                        

                                        <?php $variable = get_post_meta($post->ID, 'team_social_list', true); ?>

                                        <?php

                                        if ( !empty( $variable ) ) {

                                        echo '<ul>';

                                        foreach( $variable as $any_name ) {

                                        echo '<li><a href="'.$any_name['team_social_link'].'"><i class="'.$any_name['team_social_icon'].'"></i></a></li>';

                                        }

                                        echo '</ul>';

                                        }

                                        ?>

                                    </div>

                                </div>

                            </div>

                        </div>   

                    <?php endwhile; ?>    

                    <?php endif; ?> 

                    </div>

                </div>

            </div>

        </section>

     