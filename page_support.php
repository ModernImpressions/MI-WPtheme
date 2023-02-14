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
                    <hr />
                    <div id="app"></div>
                    <script type="x-template" id="app-template">
                        <flow-form ref="flowform" v-on:complete="onComplete" v-bind:questions="questions" v-bind:language="language" v-bind:progressbar="false" v-bind:navigation="false">
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
                    <hr />
                    <?php
                    /**
                     * Check if the content is empty. and if it is not empty then display the content.
                     */
                    if ( ! empty( get_the_content() ) ) : ?>
                    <div class="support-center-content">
                        <?php the_content(); ?>
                    </div>
                    <hr />
                    <?php endif;?>
                    <h4>Most Helpful Articles</h4>
                    <div class="su-row">
                        <div class="su-column su-column-size-1-2">
                            <div>
                                <?php
                                        /**
                                         * Order posts by helpful pro in descendend order.
                                         */
                                        $args = [
                                            'post_type'      => 'knowledgebase',
                                            'posts_per_page' => -1,
                                            'meta_query'     => [],
                                            'fields'         => 'ids',
                                            'meta_key'       => 'helpful-pro',
                                            'orderby'        => 'meta_value_num',
                                            'order'          => 'DESC',
                                        ];
                                        $url = '';
                                        $title = '';
                                        $list = '';
                                        $countlimit = 0;
                                        $query = new WP_Query($args);
                                        if ($query->found_posts) {
                                            $list .= '<ul class="support-center-helpful-list">';
                                            foreach ($query->posts as $post_id) :
                                                $url = get_the_permalink($post_id);
                                                $title = get_the_title($post_id);
                                                $list .= sprintf('<li><i class="fas fa-book"></i><a href="%1$s" style="padding-left: 5px;">%2$s</a></li>', $url, $title);
                                                if (++$counterlimit == 5) break;
                                            endforeach;
                                            $list .= '</ul>';
                                        }
                                        print($list);
                                        ?>
                            </div>
                        </div>
                        <div class="su-column su-column-size-1-2">
                            <div>
                                <span><?php echo helpful_get_pro_all(); ?> visitors have found our <a
                                        class="support-center link" href="<?php echo site_url('/docs/'); ?>">Help
                                        Articles</a>
                                    to be helpful, we may have the answer you're looking for too.</span>
                            </div>
                        </div>
                    </div>
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
<?php get_footer('support'); ?>
