<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.4.0
 * 
 * Profiles Post Type
 * Created by CMSMasters
 * 
 */


class Cmsms_Profiles {
	public function __construct() {
		$current_theme = get_option('template');
		
		$profile_post_slug = get_option('cmsms_options_' . $current_theme . '_profile_post_slug');
		
		
		$profile_labels = array( 
			'name' => 					__('Profiles', 'cmsms_content_composer'), 
			'singular_name' => 			__('Profiles', 'cmsms_content_composer'), 
			'menu_name' => 				__('Profiles', 'cmsms_content_composer'), 
			'all_items' => 				__('All Profiles', 'cmsms_content_composer'), 
			'add_new' => 				__('Add New', 'cmsms_content_composer'), 
			'add_new_item' => 			__('Add New Profile', 'cmsms_content_composer'), 
			'edit_item' => 				__('Edit Profile', 'cmsms_content_composer'), 
			'new_item' => 				__('New Profile', 'cmsms_content_composer'), 
			'view_item' => 				__('View Profile', 'cmsms_content_composer'), 
			'search_items' => 			__('Search Profiles', 'cmsms_content_composer'), 
			'not_found' => 				__('No Profiles found', 'cmsms_content_composer'), 
			'not_found_in_trash' => 	__('No Profiles found in Trash', 'cmsms_content_composer') 
		);
		
		
		$profile_args = array( 
			'labels' => 			$profile_labels, 
			'query_var' => 			'profile', 
			'capability_type' => 	'post', 
			'menu_position' => 		52, 
			'menu_icon' => 			'dashicons-id', 
			'public' => 			true, 
			'show_ui' => 			true, 
			'hierarchical' => 		false, 
			'has_archive' => 		true, 
			'supports' => array( 
				'title', 
				'editor', 
				'thumbnail', 
				'excerpt', 
				'trackbacks', 
				'custom-fields', 
				'comments', 
				'revisions', 
				'page-attributes' 
			), 
			'rewrite' => array( 
				'slug' => 			(isset($profile_post_slug) && $profile_post_slug != '') ? $profile_post_slug : 'profile', 
				'with_front' => 	true 
			) 
		);
		
		
		register_post_type('profile', $profile_args);
		
		
		add_filter('manage_edit-profile_columns', array(&$this, 'edit_columns'));
		
		add_filter('manage_edit-profile_sortable_columns', array(&$this, 'edit_sortable_columns'));
		
		
		register_taxonomy('pl-categs', array('profile'), array( 
			'hierarchical' => 		true, 
			'label' => 				__('Profile Categories', 'cmsms_content_composer'), 
			'singular_label' => 	__('Profile Category', 'cmsms_content_composer'), 
			'rewrite' => array( 
				'slug' => 			'pl-categs', 
				'with_front' => 	true 
			) 
		));
		
		
		add_action('manage_posts_custom_column', array(&$this, 'custom_columns'));
	}
	
	
	public function edit_columns($columns) {
		unset($columns['author']);
		
		unset($columns['comments']);
		
		unset($columns['date']);
		
		
		$new_columns = array( 
			'cb' => 			'<input type="checkbox" />', 
			'title' => 			__('Title', 'cmsms_content_composer'), 
			'pl_avatar' => 		__('Avatar', 'cmsms_content_composer'), 
			'pl_categs' => 		__('Categories', 'cmsms_content_composer'), 
			'comments' => 		'<span class="vers"><div title="' . __('Comments', 'cmsms_content_composer') . '" class="comment-grey-bubble"></div></span>', 
			'menu_order' => 	'<span class="vers"><div class="dashicons dashicons-sort" title="' . __('Order', 'cmsms_content_composer') . '"></div></span>' 
		);
		
		
		$result_columns = array_merge($columns, $new_columns);
		
		
		return $result_columns;
	}
	
	
	public function edit_sortable_columns($columns) {
		$columns['menu_order'] = 'menu_order';
		
		
		return $columns;
	}
	
	
	public function custom_columns($column) {
		switch ($column) {
			case 'pl_avatar':
				if (has_post_thumbnail() != '') {
					echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array( 
						'alt' => cmsms_title(get_the_ID(), false), 
						'title' => cmsms_title(get_the_ID(), false), 
						'style' => 'width:75px; height:75px;' 
					));
				} else {
					echo '<em>' . __('No Avatar', 'cmsms_content_composer') . '</em>';
				}
				
				
				break;
			case 'pl_categs':
				if (get_the_terms(0, 'pl-categs') != '') {
					$pl_categs = get_the_terms(0, 'pl-categs');
					
					$pl_categs_html = array();
					
					
					foreach ($pl_categs as $pl_categ) {
						array_push($pl_categs_html, '<a href="' . get_term_link($pl_categ->slug, 'pl-categs') . '">' . $pl_categ->name . '</a>');
					}
					
					
					echo implode($pl_categs_html, ', ');
				} else {
					echo '<em>' . __('Uncategorized', 'cmsms_content_composer') . '</em>';
				}
				
				
				break;
			case 'menu_order':
				$custom_pl_post = get_post(get_the_ID());
				
				$custom_pl_ord = $custom_pl_post->menu_order;
				
				
				echo $custom_pl_ord;
				
				
				break;
		}
	}
}


function cmsms_profiles_init() {
	global $pl;
	
	
	$pl = new Cmsms_Profiles();
}

add_action('init', 'cmsms_profiles_init');

