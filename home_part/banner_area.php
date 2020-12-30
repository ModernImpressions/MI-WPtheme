    <!-- Use shortcode to reference the CTA embed from Hustle. -->
    <!-- php echo do_shortcode '(' '[wd_hustle id="3" type="embedded"/]' ')' ; ?> --> <!-- this may need to be modified if the post data of the embed item changes -->
    <?php dynamic_sidebar( 'banner-widget' ); ?>
    <section id="slider">
        <div id="owl-slider-item" class="owl-carousel">
            <?php query_posts('post_type=slider&post_status=publish&posts_per_page=5&paged='. get_query_var('post')); ?>
           <?php if(have_posts()) : ?>
           <?php while (have_posts()) : the_post(); ?>	  
                <div class="item">
                    <?php the_post_thumbnail(); ?> 
                    <div class="carousel_caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>   
            <?php endwhile; ?>    
            <?php endif; ?>
        </div>
	</section>