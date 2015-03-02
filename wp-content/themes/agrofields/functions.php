<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Main Theme Functions File
 * Created by CMSMasters
 * 
 */


// Current Theme Constants
define('CMSMS_SHORTNAME', 'agrofields');
define('CMSMS_FULLNAME', 'Agrofields');



/*** START EDIT THEME PARAMETERS HERE ***/

// Theme Settings System Fonts List
function cmsms_system_fonts_list() {
	$fonts = array( 
		"Arial, Helvetica, 'Nimbus Sans L', sans-serif" => 'Arial', 
		"Calibri, 'AppleGothic', 'MgOpen Modata', sans-serif" => 'Calibri', 
		"'Trebuchet MS', Helvetica, Garuda, sans-serif" => 'Trebuchet MS', 
		"'Comic Sans MS', Monaco, 'TSCu_Comic', cursive" => 'Comic Sans MS', 
		"Georgia, Times, 'Century Schoolbook L', serif" => 'Georgia', 
		"Verdana, Geneva, 'DejaVu Sans', sans-serif" => 'Verdana', 
		"Tahoma, Geneva, Kalimati, sans-serif" => 'Tahoma', 
		"'Lucida Sans Unicode', 'Lucida Grande', Garuda, sans-serif" => 'Lucida Sans', 
		"'Times New Roman', Times, 'Nimbus Roman No9 L', serif" => 'Times New Roman', 
		"'Courier New', Courier, 'Nimbus Mono L', monospace" => 'Courier New', 
	);
	
	
	return $fonts;
}



// Theme Settings Google Fonts List
function cmsms_google_fonts_list() {
	$fonts = array( 
		'' => __('None', 'cmsmasters'), 
		'Roboto:300,300italic,400,400italic,500,500italic,700,700italic' => 'Roboto', 
		'Roboto+Condensed:400,400italic,700,700italic' => 'Roboto Condensed', 
		'Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic' => 'Open Sans', 
		'Open+Sans+Condensed:300,300italic,700' => 'Open Sans Condensed', 
		'Droid+Sans:400,700' => 'Droid Sans', 
		'Droid+Serif:400,400italic,700,700italic' => 'Droid Serif', 
		'PT+Sans:400,400italic,700,700italic' => 'PT Sans', 
		'PT+Sans+Caption:400,700' => 'PT Sans Caption', 
		'PT+Sans+Narrow:400,700' => 'PT Sans Narrow', 
		'PT+Serif:400,400italic,700,700italic' => 'PT Serif', 
		'Ubuntu:400,400italic,700,700italic' => 'Ubuntu', 
		'Ubuntu+Condensed' => 'Ubuntu Condensed', 
		'Headland+One' => 'Headland One', 
		'Source+Sans+Pro:300,300italic,400,400italic,700,700italic' => 'Source Sans Pro', 
		'Lato:400,400italic,700,700italic' => 'Lato', 
		'Cuprum:400,400italic,700,700italic' => 'Cuprum', 
		'Oswald:300,400,700' => 'Oswald', 
		'Yanone+Kaffeesatz:300,400,700' => 'Yanone Kaffeesatz', 
		'Lobster' => 'Lobster', 
		'Lobster+Two:400,400italic,700,700italic' => 'Lobster Two', 
		'Questrial' => 'Questrial', 
		'Raleway:300,400,500,600,700' => 'Raleway', 
		'Dosis:300,400,500,700' => 'Dosis', 
		'Cutive+Mono' => 'Cutive Mono', 
		'Quicksand:300,400,700' => 'Quicksand', 
		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic' => 'Titillium Web', 
		'Montserrat:400,700' => 'Montserrat', 
		'Cookie' => 'Cookie', 
	);
	
	
	return $fonts;
}



// Theme Settings Font Weights List
function cmsms_font_weight_list() {
	$list = array( 
		'normal' => 	'normal', 
		'100' => 		'100', 
		'200' => 		'200', 
		'300' => 		'300', 
		'400' => 		'400', 
		'500' => 		'500', 
		'600' => 		'600', 
		'700' => 		'700', 
		'800' => 		'800', 
		'900' => 		'900', 
		'bold' => 		'bold', 
		'bolder' => 	'bolder', 
		'lighter' => 	'lighter', 
	);
	
	
	return $list;
}



// Theme Settings Font Styles List
function cmsms_font_style_list() {
	$list = array( 
		'normal' => 	'normal', 
		'italic' => 	'italic', 
		'oblique' => 	'oblique', 
		'inherit' => 	'inherit', 
	);
	
	
	return $list;
}



// Theme Settings Text Transforms List
function cmsms_text_transform_list() {
	$list = array( 
		'none' => 'none', 
		'uppercase' => 'uppercase', 
		'lowercase' => 'lowercase', 
		'capitalize' => 'capitalize', 
	);
	
	
	return $list;
}



// Theme Settings Text Decorations List
function cmsms_text_decoration_list() {
	$list = array( 
		'none' => 'none', 
		'underline' => 'underline', 
		'overline' => 'overline', 
		'line-through' => 'line-through', 
	);
	
	
	return $list;
}



// Theme Settings Custom Color Schemes
function cmsms_custom_color_schemes_list() {
	$list = array( 
		'first' => __('Custom 1', 'cmsmasters'), 
		'second' => __('Custom 2', 'cmsmasters'), 
		'third' => __('Custom 3', 'cmsmasters'), 
	);
	
	
	return $list;
}

/*** STOP EDIT THEME PARAMETERS HERE ***/



// Theme Image Thumbnails Size
function cmsms_image_thumbnail_list() {
	$list = array( 
		'small-thumb' => array( 
			'width' => 		55, 
			'height' => 	55, 
			'crop' => 		true 
		), 
		'square-thumb' => array( 
			'width' => 		250, 
			'height' => 	250, 
			'crop' => 		true, 
			'title' => 		__('Square', 'cmsmasters') 
		), 
		'blog-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	390, 
			'crop' => 		true, 
			'title' => 		__('Masonry Blog', 'cmsmasters') 
		), 
		'project-thumb' => array( 
			'width' => 		580, 
			'height' => 	400, 
			'crop' => 		true, 
			'title' => 		__('Project', 'cmsmasters') 
		), 
		'project-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	9999, 
			'title' => 		__('Masonry Project', 'cmsmasters') 
		), 
		'post-thumbnail' => array( 
			'width' => 		820, 
			'height' => 	490, 
			'crop' => 		true, 
			'title' => 		__('Featured', 'cmsmasters') 
		), 
		'masonry-thumb' => array( 
			'width' => 		820, 
			'height' => 	9999, 
			'title' => 		__('Masonry', 'cmsmasters') 
		), 
		'full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	700, 
			'crop' => 		true, 
			'title' => 		__('Full', 'cmsmasters') 
		), 
		'project-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	800, 
			'crop' => 		true, 
			'title' => 		__('Project Full', 'cmsmasters') 
		), 
		'full-masonry-thumb' => array( 
			'width' => 		1160, 
			'height' => 	9999, 
			'title' => 		__('Masonry Full', 'cmsmasters') 
		) 
	);
	
	
	return $list;
}



// Theme Settings All Color Schemes List
function cmsms_all_color_schemes_list() {
	$list = array( 
		'default' => 		__('Default', 'cmsmasters'), 
		'header' => 		__('Header', 'cmsmasters'), 
		'header_top' => 	__('Header Top', 'cmsmasters'), 
		'header_bottom' => 	__('Header Bottom', 'cmsmasters'),
		'bottom' => 		__('Bottom', 'cmsmasters'), 
		'footer' => 		__('Footer', 'cmsmasters') 
	);
	
	
	$out = array_merge($list, cmsms_custom_color_schemes_list());
	
	
	return $out;
}



// Theme Settings Color Schemes List
function cmsms_color_schemes_list() {
	$list = cmsms_all_color_schemes_list();
	
	
	unset($list['header']);
	
	unset($list['header_top']);
	
	unset($list['header_bottom']);
	
	
	$out = array_merge($list, cmsms_custom_color_schemes_list());
	
	
	return $out;
}



// Theme Settings Color Schemes Default Colors
function cmsms_color_schemes_defaults() {
	$list = array( 
		'default' => array( // content default color scheme
			'color' => 		'#838383|100', 
			'link' => 		'#ff8f3c|100', 
			'hover' => 		'#b7b7b7|100', 
			'heading' => 	'#444444|100', 
			'bg' => 		'#ffffff|100', 
			'alternate' => 	'#f7f7f7|100', 
			'border' => 	'#ebebeb|100' 
		), 
		'header' => array( // Header color scheme
			'color' => 				'#ffffff|100', 
			'link' => 				'#ffffff|100', 
			'hover' => 				'#ffffff|100', 
			'bg' => 				'#ffffff|0', 
			'icons' => 				'#d8d8d8|100'
		), 
		'header_top' => array( // Header Top color scheme
			'color' => 				'#ffffff|100', 
			'link' => 				'#ffffff|100', 
			'hover' => 				'#ffffff|70', 
			'bg' => 				'#ffffff|0', 
			'border' => 			'#ffffff|0', 
			'dropdown_link' => 		'#9f9f9f|100', 
			'dropdown_hover' => 	'#ff8f3c|100', 
			'dropdown_bg' => 		'#ffffff|100', 
			'dropdown_border' => 	'#f0f0f0|100' 
		), 
		'header_bottom' => array( // Header Bottom color scheme
			'color' => 				'#767676|100', 
			'link' => 				'#767676|100', 
			'hover' => 				'#ffffff|100', 
			'subtitle' => 			'#767676|100', 
			'bg' => 				'#ffffff|100', 
			'hover_bg' => 			'#ff8f3c|100', 
			'border' => 			'#ebebeb|100', 
			'dropdown_link' => 		'#9f9f9f|100', 
			'dropdown_hover' => 	'#ff8f3c|100', 
			'dropdown_subtitle' => 	'#767676|100', 
			'dropdown_bg' => 		'#ffffff|100', 
			'dropdown_border' => 	'#f0f0f0|100' 
		), 
		'bottom' => array( // Bottom color scheme
			'color' => 		'#9f9f9f|100', 
			'link' => 		'#9f9f9f|100', 
			'hover' => 		'#656565|100', 
			'heading' => 	'#656565|100', 
			'bg' => 		'#fbfbfb|100', 
			'alternate' => 	'#ececec|100', 
			'border' => 	'#e9e9e9|100' 
		),
		'footer' => array( // Footer color scheme
			'color' => 		'#9f9f9f|100', 
			'link' => 		'#9f9f9f|100', 
			'hover' => 		'#656565|100', 
			'heading' => 	'#656565|100', 
			'bg' => 		'#ffffff|100', 
			'alternate' => 	'#ececec|100', 
			'border' => 	'#e9e9e9|100' 
		), 
		'first' => array( // custom color scheme 1
			'color' => 		'#ffffff|100', 
			'link' => 		'#ffffff|100', 
			'hover' => 		'#ffffff|60', 
			'heading' => 	'#ffffff|100', 
			'bg' => 		'#3d3d3d|0', 
			'alternate' => 	'#ffffff|100', 
			'border' => 	'#ffffff|100' 
		), 
		'second' => array( // custom color scheme 2
			'color' => 		'#838383|100', 
			'link' => 		'#9bdb2b|100', 
			'hover' => 		'#b7b7b7|100', 
			'heading' => 	'#656565|100', 
			'bg' => 		'#ffffff|100', 
			'alternate' => 	'#f7f7f7|100', 
			'border' => 	'#ebebeb|100' 
		), 
		'third' => array( // custom color scheme 3
			'color' => 		'#9c9c9c|100', 
			'link' => 		'#838383|100', 
			'hover' => 		'#ffffff|100', 
			'heading' => 	'#ffffff|100', 
			'bg' => 		'#3d3d3d|100', 
			'alternate' => 	'#1f1f1f|100', 
			'border' => 	'#333333|100' 
		) 
	);
	
	
	return $list;
}



// CMSMasters Framework Directories Constants
define('CMSMS_FRAMEWORK', get_template_directory() . '/framework');
define('CMSMS_ADMIN', CMSMS_FRAMEWORK . '/admin');
define('CMSMS_SETTINGS', CMSMS_ADMIN . '/settings');
define('CMSMS_OPTIONS', CMSMS_ADMIN . '/options');
define('CMSMS_ADMIN_INC', CMSMS_ADMIN . '/inc');
define('CMSMS_CLASS', CMSMS_FRAMEWORK . '/class');
define('CMSMS_FUNCTION', CMSMS_FRAMEWORK . '/function');

define('CMSMS_COMPOSER', get_template_directory() . '/cmsms-c-c');



// Load Framework Parts
require_once(CMSMS_SETTINGS . '/cmsms-theme-settings.php');

require_once(CMSMS_OPTIONS . '/cmsms-theme-options.php');

require_once(CMSMS_ADMIN_INC . '/admin-scripts.php');

require_once(CMSMS_ADMIN_INC . '/plugin-activator.php');

require_once(CMSMS_CLASS . '/likes-posttype.php');

require_once(CMSMS_CLASS . '/twitteroauth.php');

require_once(CMSMS_CLASS . '/widgets.php');

require_once(CMSMS_FUNCTION . '/breadcrumbs.php');

require_once(CMSMS_FUNCTION . '/likes.php');

require_once(CMSMS_FUNCTION . '/pagination.php');

require_once(CMSMS_FUNCTION . '/single-comment.php');

require_once(CMSMS_FUNCTION . '/theme-functions.php');

require_once(CMSMS_FUNCTION . '/theme-fonts.php');

require_once(CMSMS_FUNCTION . '/theme-colors-primary.php');

require_once(CMSMS_FUNCTION . '/theme-colors-secondary.php');

require_once(CMSMS_FUNCTION . '/template-functions.php');

require_once(CMSMS_FUNCTION . '/template-functions-post.php');

require_once(CMSMS_FUNCTION . '/template-functions-project.php');

require_once(CMSMS_FUNCTION . '/template-functions-profile.php');

require_once(CMSMS_FUNCTION . '/template-functions-shortcodes.php');

require_once(CMSMS_FUNCTION . '/template-functions-widgets.php');



if (class_exists('Cmsms_Content_Composer')) {
	require_once(CMSMS_COMPOSER . '/filters/cmsms-c-c-atts-filters.php');
}



// Woocommerce functions
if (class_exists('woocommerce')) {
	require_once(get_template_directory() . '/woocommerce/cmsms-woo-functions.php');
}



//include the WPML installer in the theme
include get_template_directory() . '/installer/loader.php';

WP_Installer_Setup($wp_installer_instance,  
    array(
        'plugins_install_tab' => 1,   // optional, default value: 1
        'affiliate_id' => '46196',   // optional, default value: empty
        'affiliate_key' => 'N9YfTTsunQtc',   // optional, default value: empty
        'src_name' => 'Agrofields',   // optional, default value: empty, needed for coupons
        'src_author' => 'Cmsmasters',// optional, default value: empty, needed for coupons
        'repositories_include' => array('wpml') // optional, default to empty (show all)
    )
); 



// Events functions
if (class_exists('TribeEvents')) {
	require_once(get_template_directory() . '/tribe-events/cmsms-events-functions.php');
}





// Load Theme Local File
$locale = get_locale();

load_theme_textdomain('cmsmasters', CMSMS_FRAMEWORK . '/languages');

$locale_file = CMSMS_FRAMEWORK . '/languages/' . $locale . '.php';

if (is_readable($locale_file)) {
    require_once($locale_file);
}





// Framework Activation & Data Import
function cmsms_theme_activation() {
	if (get_option('cmsms_active_theme') != CMSMS_SHORTNAME) {
		add_option('cmsms_active_theme', CMSMS_SHORTNAME, '', 'yes');
		
		
		cmsms_add_global_options();
		
		cmsms_regenerate_styles();
		
		cmsms_add_global_icons();
		
		
		wp_redirect(admin_url('admin.php?page=cmsms-settings&upgraded=true'));
	}
}

add_action('after_switch_theme', 'cmsms_theme_activation');



// Framework Deactivation
function cmsms_theme_deactivation() {
	delete_option('cmsms_active_theme');
}

add_action('switch_theme', 'cmsms_theme_deactivation');

