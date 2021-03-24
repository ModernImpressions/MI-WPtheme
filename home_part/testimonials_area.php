<script>
    jQuery(document).ready(function($) {
        		"use strict";
        		//  TESTIMONIALS CAROUSEL HOOK
		        $('#customers-testimonials').owlCarousel({
		            loop: true,
		            center: true,
		            items: 1,
		            margin: 0,
		            autoplay: true,
		            dots:true,
		            autoplayTimeout: 8500,
		            smartSpeed: 450,
		        });
        	});
</script>
<?php wp_enqueue_script('fittext', get_template_directory_uri() .'/js/fittext-nojquery/fittext.js', array(), '1.2.0', 'true' ); ?>
<section id="testimonial_area" class="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="customers-testimonials" class="owl-carousel">
                    <?php get_template_part('other_part/ceojuice-commentsquery/testimonials_part'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
		$("#comment-text").fitText(0.8);
	</script>