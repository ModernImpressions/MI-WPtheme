<?php

function voteme_enqueuescripts()
{
	wp_enqueue_script('voteme', get_template_directory_uri() . '/basepress/mikb/js/bpkb_vote.js', array('jquery'));
	wp_localize_script('voteme', 'votemeajax', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', voteme_enqueuescripts);

function voteme_getvotelink()
{
	$votemelink = "";

	$post_ID = get_the_ID();
	$votemecount = get_post_meta($post_ID, '_votemecount', true) != '' ? get_post_meta($post_ID, '_votemecount', true) : '0';

	$link = ' <a onclick="votemeaddvote(' . $post_ID . ');">' . 'Vote' . '</a>';

	$votemelink = '<div id="voteme-' . $post_ID . '">';
	$votemelink .= '<span>' . $link . '</span>';
	$votemelink .= '</div>';

	return $votemelink;
}

function voteme_printvotelink($content)
{
	return $content . voteme_getvotelink();
}
add_filter('the_content', voteme_printvotelink);

function voteme_addvote()
{
	$results = '';
	global $wpdb;
	$post_ID = $_POST['postid'];
	$votemecount = get_post_meta($post_ID, '_votemecount', true) != '' ? get_post_meta($post_ID, '_votemecount', true) : '0';
	$votemecountNew = $votemecount + 1;
	update_post_meta($post_ID, '_votemecount', $votemecountNew);

	$results .= '<div class="votescore" >' . $votemecountNew . '</div>';

	// Return the String
	die($results);
}

// creating Ajax call for WordPress
add_action('wp_ajax_nopriv_voteme_addvote', 'voteme_addvote');
add_action('wp_ajax_voteme_addvote', 'voteme_addvote');
