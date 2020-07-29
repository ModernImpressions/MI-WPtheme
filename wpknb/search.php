<?php

/**
 * The file that defines the taxonomy archive page display
 *
 *
 * @since      1.0.0
 *
 * @package    wpKnB
 * @subpackage wpKnB/public/templates
 */
global $wpknb;
?>
<style>
body .hentry .meta-info, body .content .archive-description{
	display: none;
}
body form.wpknbsearchform{
	display: block;
}
</style>
<div class="wpknb">
	<div class="wpknb-inner">
	<?php
		if(!isset($wpknb['search_main']) || (isset($wpknb['search_main']) && $wpknb['search_main'] != '1') ){
			echo do_shortcode('[knowledge_base_search]');
		}
		
		if(have_posts()){
			echo '<ul class="wpknb-lists">';
	    	while( have_posts() ) : the_post();
	?>
			<li>
				<a href="<?php the_permalink();?>"><i class="knb-icon knb-format-<?php echo get_post_format( get_the_ID() );?>"></i><?php the_title();?>
				</a>
			</li>
	<?php
	   		endwhile;
	   		echo '</ul>';
	   	}else{ ?>
	   	<p><?php _e('No Results Found for "'. $_GET['s'] .'".','wpKnB'); ?></p>
	   	<?php }
	?>
	</div>
</div>