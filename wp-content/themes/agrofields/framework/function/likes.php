<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Likes Functions
 * Changed by CMSMasters
 * 
 */


function cmsmsLike($show = true) {
	$post_ID = get_the_ID();
	
	
	$ip = $_SERVER['REMOTE_ADDR'];
	
	
	$likes = (get_post_meta($post_ID, 'cmsms_likes', true) != '') ? get_post_meta($post_ID, 'cmsms_likes', true) : '0';
	
	
	$ipCheck = get_posts(array( 
		'post_type' => 		'cmsms_like', 
		'post_status' => 	'draft', 
		'post_parent' => 	$post_ID, 
		'post_title' => 	$ip 
	));
	
	
	if (isset($_COOKIE['like-' . $post_ID]) || count($ipCheck) != 0) {
		$counter = '<a href="#" onclick="return false;" id="cmsmsLike-' . $post_ID . '" class="cmsmsLike active cmsms_theme_icon_heart"><span>' . $likes . '</span></a>';
	} else {
		$counter = '<a href="#" onclick="cmsmsLike(' . $post_ID . '); return false;" id="cmsmsLike-' . $post_ID . '" class="cmsmsLike cmsms_theme_icon_heart"><span>' . $likes . '</span></a>';
	}
	
	
	if ($show != true) {
		return $counter;
	} else {
		echo $counter;
	}
}

