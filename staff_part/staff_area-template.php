<div class="row">
    <?php query_posts('post_type=team_area&post_status=publish&posts_per_page=-1&paged='. get_query_var('post')); ?>
    <?php if(have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>	
            <div class='staff-item portrait-container'>
                <div class='child_team_area portrait-member'>
                    <div class='portrait-container'><?php the_post_thumbnail( 'team_area' ); ?></div>
                    <div class='team-details-container'>
                        <ul class='team_details portrait-details'>
                            <li><?php the_title(); ?></li>
                            <li class="portrait-title"><?php echo get_post_meta($post->ID, 'team_position', true); ?></li>
                            <li class="team_social">
                                <?php $variable = get_post_meta($post->ID, 'team_social_list', true); ?>
                                <?php
                                if ( !empty( $variable ) ) {
                                    echo '<nav class="containersocial">';
                                foreach( $variable as $any_name ) {
                                    echo '<li><a href="'.$any_name['team_social_link'].'"><i class="'.$any_name['team_social_icon'].'"></i></a></li>';
                                }
                                    echo '</nav>';
                                }?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?> 
</div>