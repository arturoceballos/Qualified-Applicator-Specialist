<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.2.0
 * 
 * Attachments Projects Loader
 * Created by CMSMasters
 * 
 */


$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);

require_once($parse_uri[0] . 'wp-load.php');


if (isset($_POST['offset'])) {
	$layout = $_POST['layout'];
	$layout_mode = $_POST['layoutmode'];
	$orderby = $_POST['orderby'];
	$order = $_POST['order'];
	$count = $_POST['count'];
	$categories = $_POST['categories'];
	$offset = $_POST['offset'];
	$meta = $_POST['meta'];
	
	
	global $cmsms_pj_metadata;
	
	
	$cmsms_pj_metadata = $meta;
	
	
	global $cmsms_pj_layout_mode;
	
	
	$cmsms_pj_layout_mode = $layout_mode;
	
	
	$temp = $wp_query;
	$wp_query= null;
	
	
	$orderby = ($orderby == 'popular') ? 'meta_value_num' : $orderby;
	
	
	$args_all = array( 
		'post_type' => 'project', 
		'orderby' => $orderby, 
		'order' => $order, 
		'posts_per_page' => -1 
	);
	
	
	$args = array( 
		'post_type' => 'project', 
		'orderby' => $orderby, 
		'order' => $order, 
		'posts_per_page' => $count, 
		'offset' => $offset 
	);
	
	
	if ($categories != '') {
		$cat_array = explode(",", $categories);
		
		$args_all['tax_query'] = array(
			array(
				'taxonomy' => 'pj-categs',
				'field' => 'slug',
				'terms' => $cat_array
			)
		);
		
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'pj-categs',
				'field' => 'slug',
				'terms' => $cat_array
			)
		);
	}
	
	
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
			if ($layout == 'puzzle') {
				if (get_post_format() != '') {
					get_template_part('framework/postType/portfolio/page/puzzle/' . get_post_format());
				} else {
					get_template_part('framework/postType/portfolio/page/puzzle/standard');
				}
			} else {
				if (get_post_format() != '') {
					get_template_part('framework/postType/portfolio/page/grid/' . get_post_format());
				} else {
					get_template_part('framework/postType/portfolio/page/grid/standard');
				}
			}
		endwhile;
	endif;
	
	
	$wp_query = null;
	$wp_query = $temp;
	
	
	wp_reset_query();
}

