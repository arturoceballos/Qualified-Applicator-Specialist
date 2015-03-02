<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Theme Settings Exporter
 * Created by CMSMasters
 * 
 */


$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);

require_once($parse_uri[0] . 'wp-load.php');


header('Content-disposition: attachment; filename=theme-settings.txt');

header('Content-type: text/plain');


$options = array( 
	'cmsms_options_agrofields_general', 
	'cmsms_options_agrofields_sidebar', 
	'cmsms_options_agrofields_sitemap', 
	'cmsms_options_agrofields_error', 
	'cmsms_options_agrofields_code', 
	'cmsms_options_agrofields_recaptcha', 
	'cmsms_options_agrofields_style_bg', 
	'cmsms_options_agrofields_style_logo', 
	'cmsms_options_agrofields_style_header', 
	'cmsms_options_agrofields_style_content', 
	'cmsms_options_agrofields_style_footer', 
	'cmsms_options_agrofields_style_icon', 
	'cmsms_options_agrofields_color_default', 
	'cmsms_options_agrofields_color_header', 
	'cmsms_options_agrofields_color_header_top', 
	'cmsms_options_agrofields_color_header_bottom', 
	'cmsms_options_agrofields_color_bottom', 
	'cmsms_options_agrofields_color_footer', 
	'cmsms_options_agrofields_color_first', 
	'cmsms_options_agrofields_color_second', 
	'cmsms_options_agrofields_color_third', 
	'cmsms_options_agrofields_color_fourth', 
	'cmsms_options_agrofields_color_fifth', 
	'cmsms_options_agrofields_font_content', 
	'cmsms_options_agrofields_font_link', 
	'cmsms_options_agrofields_font_nav', 
	'cmsms_options_agrofields_font_heading', 
	'cmsms_options_agrofields_font_other', 
	'cmsms_options_agrofields_single_post', 
	'cmsms_options_agrofields_single_project', 
	'cmsms_options_agrofields_single_profile', 
	'thumbnail_size_w', 
	'thumbnail_size_h', 
	'medium_size_w', 
	'medium_size_h', 
	'large_size_w', 
	'large_size_h', 
	'theme_mods_agrofields', 
	'sidebars_widgets', 
	'widget_custom-advertisement', 
	'widget_akismet_widget', 
	'widget_archives', 
	'widget_calendar', 
	'widget_categories', 
	'widget_custom-contact-form', 
	'widget_custom-contact-info', 
	'widget_nav_menu', 
	'widget_custom-divider', 
	'widget_custom-video', 
	'widget_custom-facebook', 
	'widget_custom-flickr', 
	'widget_custom-html5-audio', 
	'widget_custom-html5-video', 
	'widget_custom-latest-projects', 
	'widget_layerslider_widget', 
	'widget_meta', 
	'widget_pages', 
	'widget_custom-popular-projects', 
	'widget_custom-posts-tabs', 
	'widget_custom-recent-comments', 
	'widget_custom-recent-posts', 
	'widget_rev-slider-widget', 
	'widget_rss', 
	'widget_search', 
	'widget_tag_cloud', 
	'widget_text', 
	'widget_custom-twitter', 
	'widget_icl_lang_sel_widget' 
);


$settings = array();


foreach ($options as $option) {
	if (get_option($option)) {
		$settings[$option] = get_option($option);
	}
}


$result = base64_encode(json_encode($settings));


echo $result;

