<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Contact Form Builder
 * @version 	1.2.0
 * 
 * Contact Form Builder Post Type
 * Created by CMSMasters
 * 
 */


class Cmsms_Forms {
	function Cmsms_Forms() { 
		$template_labels = array( 
			'name' => __('Contact Forms', 'cmsms_form_builder'), 
			'singular_name' => __('Contact Form', 'cmsms_form_builder') 
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
		
		
		register_post_type('cmsms_contact_form', $template_args);
	}
}


function cmsms_forms_init() {
	global $frm;
	
	
	$frm = new Cmsms_Forms();
}


add_action('init', 'cmsms_forms_init');

