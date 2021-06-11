<?php
$testitoggle = ot_get_option('ceojuice_reviews');

if ($testitoggle == "off") {

} else { ?>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        		"use strict";
        		//  TESTIMONIALS CAROUSEL HOOK
		        $('#customers-testimonials').owlCarousel({
		            loop: true,
		            center: true,
		            margin: 0,
                    autoWidth: true,
		            autoplay: true,
		            nav: true,
                    dots: false,
		            autoplayTimeout: 8500,
		            smartSpeed: 450,
                    mouseDrag: true,
                    touchDrag: true,
                    stagePadding: 1,
                    responsiveBaseElement:$("#customers-testimonials")[0],
                    responsive  :{ // I want to determine the number of slider elements according to the range of .right
                        0:{
                            items:1
                        },
                    }
		        });
        	});
</script>
<section id="testimonial_area" class="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h3>Customer Testimonials</h3>
                <p>Why do people love Modern Impressions? See what our customers have to say.</p>                          
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="customers-testimonials" class="owl-carousel">
                    <?php get_template_part('other_part/ceojuice-commentsquery/testimonials_part'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>