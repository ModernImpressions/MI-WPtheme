<?php global $wpknb; ?>
<style>
.hentry .entry-title, .entry .entry-title{
	display: none;
}
</style>
<div class="wpknb">
	<div class="wpknb-inner">
		<?php if(!empty( $wpknb['title'] )):?>
			<h1 class="wpknb-title"><?php echo $wpknb['title'] ;?></h1>
		<?php endif;?>
	<?php
		if(!isset($wpknb['search_single']) || (isset($wpknb['search_single']) && $wpknb['search_single'] != '1')){
			echo do_shortcode('[knowledge_base_search]');
		}
		
	while(have_posts()) : the_post();
	$term_list = get_the_term_list( get_the_ID() , 'knb-category', '<span class="wpknb-terms">in ',',','</span>');
	?>
		<article class="wpknb-single">
	    	<h2><?php the_title(); ?></h2>
	    	<div class="wpknb-meta">
		        <time class="updated" datetime="<?php echo get_the_modified_date('c'); ?>" pubdate><?php echo __('Last Updated:', 'wpKnB') . ' '. human_time_diff(get_the_modified_date('U'), current_time('timestamp')) . ' ' . __('ago', 'wpKnB'); ?></time> <?php echo $term_list;?>
		    </div>
		    <div class="wpknb-single-content">
		        <?php 
		        if ( has_post_thumbnail() ) { 
		          the_post_thumbnail();
		        } 
		        ?>
		    	<?php the_content(); ?>
		    </div>
		    <?php 
		    if(!isset($wpknb['voting']) || ( isset($wpknb['voting']) && $wpknb['voting'] != '1' ))
		    	echo do_shortcode('[knowledge_base_vote id="'. get_the_ID() .'"]');
		    ?>
	    </article>
	<?php
	endwhile;
?>	</div>
</div>