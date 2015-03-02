<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.1.0
 * 
 * Content Composer Post Type
 * Created by CMSMasters
 * 
 */


class Cmsms_Templates {
	function Cmsms_Templates() { 
		$template_labels = array( 
			'name' => __('Content Templates', 'cmsms_content_composer'), 
			'singular_name' => __('Content Template', 'cmsms_content_composer') 
		);
		
		
		$template_args = array( 
			'labels' => $template_labels, 
			'public' => false, 
			'capability_type' => 'post', 
			'hierarchical' => false, 
			'exclude_from_search' => true, 
			'publicly_queryable' => false, 
			'show_ui' => false, 
			'show_in_nav_menus' => false 
		);
		
		
		register_post_type('content_template', $template_args);
	}
}


function cmsms_templates_init() {
	global $tpl;
	
	
	$tpl = new Cmsms_Templates();
}


add_action('init', 'cmsms_templates_init');

