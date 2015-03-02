<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.1.0
 * 
 * Attachments Posts Loader
 * Created by CMSMasters
 * 
 */


$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);

require_once($parse_uri[0] . 'wp-load.php');


if (isset($_POST['offset'])) {
	$layout = $_POST['layout'];
	$orderby = $_POST['orderby'];
	$order = $_POST['order'];
	$count = $_POST['count'];
	$categories = $_POST['categories'];
	$offset = $_POST['offset'];
	
	
	global $cmsms_metadata;
	
	
	$temp = $wp_query;
	$wp_query= null;
	
	
	$orderby = ($orderby == 'popular') ? 'meta_value_num' : $orderby;
	
	
	$args_all = array( 
		'post_type' => 				'post', 
		'orderby' => 				$orderby, 
		'order' => 					$order, 
		'posts_per_page' => 		-1, 
		'category_name' => 			$categories, 
		'ignore_sticky_posts' => 	true 
	);
	
	
	$args = array( 
		'post_type' => 				'post', 
		'orderby' => 				$orderby, 
		'order' => 					$order, 
		'posts_per_page' => 		$count, 
		'category_name' => 			$categories, 
		'ignore_sticky_posts' => 	true, 
		'offset' => 				$offset 
	);
	
	
	if ($orderby == 'meta_value_num') {
		$args_all['meta_key'] = 'cmsms_likes';
		
		$args['meta_key'] = 'cmsms_likes';
	}
	
	
	$wp_query_all = new WP_Query($args_all);
	
	
	$wp_query = new WP_Query($args);
	
	
	if ($wp_query_all->post_count <= ($offset + $count)) {
		echo 'finish';
	}
	
	
	if ($wp_query->have_posts()) : 
		while ($wp_query->have_posts()) : $wp_query->the_post();
			if ($layout == 'columns') {
				if (get_post_format() != '') {
					get_template_part('framework/postType/blog/page/masonry/' . get_post_format());
				} else {
					get_template_part('framework/postType/blog/page/masonry/standard');
				}
			} elseif ($layout == 'timeline') {
				if (get_post_format() != '') {
					get_template_part('framework/postType/blog/page/timeline/' . get_post_format());
				} else {
					get_template_part('framework/postType/blog/page/timeline/standard');
				}
			} else {
				if (get_post_format() != '') {
					get_template_part('framework/postType/blog/page/default/' . get_post_format());
				} else {
					get_template_part('framework/postType/blog/page/default/standard');
				}
			}
		endwhile;
	endif;
	
	
	$wp_query = null;
	$wp_query = $temp;
	
	
	wp_reset_query();
}

