<script type="text/javascript">
    jQuery(document).ready(function($) {
        		"use strict";
        		//  TESTIMONIALS CAROUSEL HOOK
		        $('#customers-testimonials').owlCarousel({
		            loop: true,
		            center: true,
		            items: 1,
		            margin: 0,
		            autoplay: true,
		            nav: true,
		            autoplayTimeout: 8500,
		            smartSpeed: 450,
                    mouseDrag: true,
                    touchDrag: true,
                    stagePadding: 1,
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
<script type="text/javascript">
/*!	
* FitText.js 1.0 jQuery free version
*
* Copyright 2011, Dave Rupert http://daverupert.com 
* Released under the WTFPL license 
* http://sam.zoy.org/wtfpl/
* Modified by Slawomir Kolodziej http://slawekk.info
*
* Date: Tue Aug 09 2011 10:45:54 GMT+0200 (CEST)
*/
(function(){
var addEvent = function (el, type, fn) {
  if (el.addEventListener)
    el.addEventListener(type, fn, false);
      else
          el.attachEvent('on'+type, fn);
};
var extend = function(obj,ext){
  for(var key in ext)
    if(ext.hasOwnProperty(key))
      obj[key] = ext[key];
  return obj;
};
window.fitText = function (el, kompressor, options) {
  var settings = extend({
    'minFontSize' : -1/0,
    'maxFontSize' : 1/0
  },options);
  var fit = function (el) {
    var compressor = kompressor || 1;
    var resizer = function () {
      el.style.fontSize = Math.max(Math.min(el.clientWidth / (compressor*10), parseFloat(settings.maxFontSize)), parseFloat(settings.minFontSize)) + 'px';
    };
    // Call once to set.
    resizer();
    // Bind events
    // If you have any js library which support Events, replace this part
    // and remove addEvent function (or use original jQuery version)
    addEvent(window, 'resize', resizer);
    addEvent(window, 'orientationchange', resizer);
  };
  if (el.length)
    for(var i=0; i<el.length; i++)
      fit(el[i]);
  else
    fit(el);
  // return set of elements
  return el;
};
})();
</script>
<script type="text/javascript">
        //fitText(document.getElementById('comment-text'), 0.5)
</script>
