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
$search = '';
if(isset($wpknb['search_category']) && $wpknb['search_category'] == '1'){
	$search = ' search="false"';
}
?>
<?php
	echo '<p>'. term_description( get_queried_object()->term_id, 'knb-category' )  .'</p>';
    echo do_shortcode('[knowledge_base category="'. get_queried_object()->term_id .'" columns="1" items="-1" show_title="false" source="archive" all_link="false"'. $search .']');
?>