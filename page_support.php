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
                            <p style="text-align: center;"><?php echo do_shortcode('[basepress-search]'); ?></p>
                            <div id="app"></div>
                            <script type="x-template" id="app-template">
                            <flow-form
                                ref="flowform"
                                v-on:complete="onComplete"
                                v-bind:questions="questions"
                                v-bind:language="language"
                                v-bind:progressbar="false"
                            >
                            <!-- Custom content for the Complete/Submit screen slots in the FlowForm component -->
                            <!-- We've overriden the default "complete" slot content -->
                            <template v-slot:complete>
                                <div class="section-wrap">
                                    <div v-if="questions[0].answer === 'technical_issue'">
                                        <span class="f-tagline">Submit issue &gt; Step 3/3</span>
                                        <div v-if="loading">
                                            <span class="fh2">Please wait, submitting your ticket.</span>
                                        </div>
                                        <div v-else>
                                            <span class="fh2">Your ticket number is: {{ getTicket() }}</span>
                                            <p class="description"><span>Thank You 😊. Our support team will contact you as soon as possible.</span></p>
                                        </div>
                                    </div>
                                    <div v-else>
                                        <span class="f-tagline">Support page &gt; Ticket status</span>
                                        <span class="fh2">Good news - the wheels are turning, your ticket is being processed!😉</span>
                                    </div>
                                </div>
                            </template>
                            <!-- We've overriden the default "completeButton" slot content -->
                            <template v-slot:completeButton>
                                <div class="f-submit">
                                    <!-- Leave empty to hide default submit button -->
                                </div>
                            </template>
                        </flow-form>
                    </script>
                            <?php the_content(); ?>
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
