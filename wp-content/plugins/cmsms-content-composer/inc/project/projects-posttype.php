<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.4.0
 * 
 * Projects Post Type
 * Created by CMSMasters
 * 
 */


class Cmsms_Projects {
	public function __construct() {
		$current_theme = get_option('template');
		
		$portfolio_project_slug = get_option('cmsms_options_' . $current_theme . '_portfolio_project_slug');
		
		
		$project_labels = array( 
			'name' => 					__('Projects', 'cmsms_content_composer'), 
			'singular_name' => 			__('Project', 'cmsms_content_composer'), 
			'menu_name' => 				__('Projects', 'cmsms_content_composer'), 
			'all_items' => 				__('All Projects', 'cmsms_content_composer'), 
			'add_new' => 				__('Add New', 'cmsms_content_composer'), 
			'add_new_item' => 			__('Add New Project', 'cmsms_content_composer'), 
			'edit_item' => 				__('Edit Project', 'cmsms_content_composer'), 
			'new_item' => 				__('New Project', 'cmsms_content_composer'), 
			'view_item' => 				__('View Project', 'cmsms_content_composer'), 
			'search_items' => 			__('Search Projects', 'cmsms_content_composer'), 
			'not_found' => 				__('No projects found', 'cmsms_content_composer'), 
			'not_found_in_trash' => 	__('No projects found in Trash', 'cmsms_content_composer') 
		);
		
		
		$project_args = array( 
			'labels' => 			$project_labels, 
			'query_var' => 			'project', 
			'capability_type' => 	'post', 
			'menu_position' => 		51, 
			'menu_icon' => 			'dashicons-images-alt', 
			'public' => 			true, 
			'show_ui' => 			true, 
			'hierarchical' => 		false, 
			'has_archive' => 		true, 
			'supports' => array( 
				'title', 
				'editor', 
				'author', 
				'thumbnail', 
				'excerpt', 
				'trackbacks', 
				'custom-fields', 
				'comments', 
				'revisions', 
				'page-attributes', 
				'post-formats' 
			), 
			'rewrite' => array( 
				'slug' => 			(isset($portfolio_project_slug) && $portfolio_project_slug != '') ? $portfolio_project_slug : 'project', 
				'with_front' => 	true 
			) 
		);
		
		
		register_post_type('project', $project_args);
		
		
		add_filter('manage_edit-project_columns', array(&$this, 'edit_columns'));
		
		add_filter('manage_edit-project_sortable_columns', array(&$this, 'edit_sortable_columns'));
		
		
		register_taxonomy('pj-categs', array('project'), array( 
			'hierarchical' => 		true, 
			'label' => 				__('Project Categories', 'cmsms_content_composer'), 
			'singular_label' => 	__('Project Category', 'cmsms_content_composer'), 
			'rewrite' => array( 
				'slug' => 			'pj-categs', 
				'with_front' => 	true 
			) 
		));
		
		
		register_taxonomy('pj-tags', array('project'), array( 
			'hierarchical' => 		false, 
			'label' => 				__('Project Tags', 'cmsms_content_composer'), 
			'singular_label' => 	__('Project Tag', 'cmsms_content_composer'), 
			'rewrite' => array( 
				'slug' => 			'pj-tags', 
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
			'pj_thumb' => 		__('Thumbnail', 'cmsms_content_composer'), 
			'pj_categs' => 		__('Categories', 'cmsms_content_composer'), 
			'pj_tags' => 		__('Tags', 'cmsms_content_composer'), 
			'date' => 			__('Date', 'cmsms_content_composer'), 
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
			case 'pj_thumb':
				if (has_post_thumbnail() != '') {
					echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array( 
						'alt' => 	cmsms_title(get_the_ID(), false), 
						'title' => 	cmsms_title(get_the_ID(), false), 
						'style' => 	'width:75px; height:75px;' 
					));
				} else {
					echo '<em>' . __('No Thumbnail', 'cmsms_content_composer') . '</em>';
				}
				
				
				break;
			case 'pj_categs':
				if (get_the_terms(0, 'pj-categs') != '') {
					$pj_categs = get_the_terms(0, 'pj-categs');
					
					$pj_categs_html = array();
					
					
					foreach ($pj_categs as $pj_categ) {
						array_push($pj_categs_html, '<a href="' . get_term_link($pj_categ->slug, 'pj-categs') . '">' . $pj_categ->name . '</a>');
					}
					
					
					echo implode($pj_categs_html, ', ');
				} else {
					echo '<em>' . __('Uncategorized', 'cmsms_content_composer') . '</em>';
				}
				
				
				break;
			case 'pj_tags':
				if (get_the_terms(0, 'pj-tags') != '') {
					$pj_tags = get_the_terms(0, 'pj-tags');
					
					$pj_tag_html = array();
					
					
					foreach ($pj_tags as $pj_tag) {
						array_push($pj_tag_html, '<a href="' . get_term_link($pj_tag->slug, 'pj-tags') . '">' . $pj_tag->name . '</a>');
					}
					
					
					echo implode($pj_tag_html, ', ');
				} else {
					echo '<em>' . __('No Tags', 'cmsms_content_composer') . '</em>';
				}
				
				
				break;
		}
	}
}


function cmsms_projects_init() {
	global $pj;
	
	
	$pj = new Cmsms_Projects();
}

add_action('init', 'cmsms_projects_init');

