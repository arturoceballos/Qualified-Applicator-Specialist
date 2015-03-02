<?php 
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Template Functions for Widgets
 * Created by CMSMasters
 * 
 */
 
 
/* Get Projects Widget Category Function */
function cmsms_widget_category($cmsms_id, $taxonomy, $widget_type = 'l_projects', $show = true) {
	
	if (get_the_terms($cmsms_id, $taxonomy)) {
		if ($widget_type = 'l_projects') {
			$out = '<span class="cmsms_project_category">' . 
				get_the_term_list($cmsms_id, $taxonomy, '', ', ', '') . 
			'</span>';
		}
		
		
		if ($show) {
			echo $out;
		} else {
			return $out;
		}
	}
}

/* Get Widget Like Function */
function cmsms_widget_like($widget_type = 'l_projects', $show = true) {
	if ($widget_type == 'l_projects') {
		$out = cmsmsLike(false);
	} 
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}