<?php
/**
*Template Name: Support Center
*/

get_header('support'); ?>
  
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
                            <p style="text-align: center;"><?php echo do_shortcode('[basepress-search kb="help-docs"]'); ?></p>
                            <hr/>
                            <div id="app"></div>
                            <script type="x-template" id="app-template">
                            <flow-form
                                ref="flowform"
                                v-on:complete="onComplete"
                                v-bind:questions="questions"
                                v-bind:language="language"
                                v-bind:progressbar="false"
                                v-bind:navigation="false"
                            >
                            <!-- Custom content for the Complete/Submit screen slots in the FlowForm component -->
                            <!-- We've overriden the default "complete" slot content -->
                            <!-- We've overriden the default "completeButton" slot content -->
                            <template v-slot:completeButton>
                                <div class="f-submit">
                                    <!-- Leave empty to hide default submit button -->
                                </div>
                            </template>
                            </flow-form>
                        </script>
                        <hr/>
                            <?php the_content(); ?>
                        </div>
                        <?php {
                            /** * Order posts by helpful pro in descendend order. */
                            $args = [
                                'post_type'      => 'post',
	                            'posts_per_page' => -1,
	                            'meta_query'     => [],
	                            'fields'         => 'ids',
	                            'meta_key'       => 'helpful-pro',
	                            'orderby'        => 'meta_value_num',
	                            'order'          => 'DESC',
                            ];
                            $query = new WP_Query( $args );
                            if ( $query->found_posts ) {
                                printf( '<strong>%s</strong><br>', esc_html__( 'Pro:' ) );
                                foreach ( $query->posts as $post_id ) :
                                    printf( '%s: %d<br>', get_the_title( $post_id ), (int) get_post_meta( $post_id, 'helpful-pro', true ) );
                                endforeach;
                        } ?>
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
