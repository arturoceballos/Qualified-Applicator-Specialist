<?php 
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.1.0
 * 
 * Admin Panel Main Functions
 * Created by CMSMasters
 * 
 */


add_action('admin_menu', 'cmsms_add_menu');
add_action('admin_init', 'cmsms_register_settings');


define('CMSMS_PAGE_BASENAME', 'cmsms-settings');


require_once(CMSMS_SETTINGS . '/inc/cmsms-helper-functions.php');
require_once(CMSMS_SETTINGS . '/cmsms-theme-settings-general.php');
require_once(CMSMS_SETTINGS . '/cmsms-theme-settings-style.php');
require_once(CMSMS_SETTINGS . '/cmsms-theme-settings-font.php');
require_once(CMSMS_SETTINGS . '/cmsms-theme-settings-color.php');
require_once(CMSMS_SETTINGS . '/cmsms-theme-settings-single.php');
require_once(CMSMS_SETTINGS . '/cmsms-theme-settings-demo.php');


function cmsms_get_settings() {
	$output = array();
	
	$page = cmsms_get_admin_page();
	$tab = cmsms_get_the_tab();
	
	switch ($page) {
	case CMSMS_PAGE_BASENAME:
		$cmsms_option_name = 'cmsms_options_' . CMSMS_SHORTNAME;
		$cmsms_settings_page_title = esc_html__('Theme General Settings', 'cmsmasters');
		$cmsms_page_sections = cmsms_options_general_sections();
		$cmsms_page_fields = cmsms_options_general_fields();
		$cmsms_page_tabs = cmsms_options_general_tabs();
		
		switch ($tab) {
		case 'general':
			$cmsms_option_name = $cmsms_option_name . '_general';
			
			break;
		case 'sidebar':
			$cmsms_option_name = $cmsms_option_name . '_sidebar';
			
			break;
		case 'sitemap':
			$cmsms_option_name = $cmsms_option_name . '_sitemap';
			
			break;
		case 'error':
			$cmsms_option_name = $cmsms_option_name . '_error';
			
			break;
		case 'lightbox':
			$cmsms_option_name = $cmsms_option_name . '_lightbox';
			
			break;
		case 'code':
			$cmsms_option_name = $cmsms_option_name . '_code';
			
			break;
		case 'wpml':
			$cmsms_option_name = $cmsms_option_name . '_wpml';
			
			break;
		case 'recaptcha':
			$cmsms_option_name = $cmsms_option_name . '_recaptcha';
			
			break;
		}
		
		break;
	case CMSMS_PAGE_BASENAME . '-style':
		$cmsms_option_name = 'cmsms_options_' . CMSMS_SHORTNAME . '_style';
		$cmsms_settings_page_title = esc_html__('Theme Appearance', 'cmsmasters');
		$cmsms_page_sections = cmsms_options_style_sections();
		$cmsms_page_fields = cmsms_options_style_fields();
		$cmsms_page_tabs = cmsms_options_style_tabs();
		
		switch ($tab) {
		case 'logo':
			$cmsms_option_name = $cmsms_option_name . '_logo';
			
			break;
		case 'bg':
			$cmsms_option_name = $cmsms_option_name . '_bg';
			
			break;
		case 'header':
			$cmsms_option_name = $cmsms_option_name . '_header';
			
			break;
		case 'content':
			$cmsms_option_name = $cmsms_option_name . '_content';
			
			break;
		case 'footer':
			$cmsms_option_name = $cmsms_option_name . '_footer';
			
			break;
		case 'icon':
			$cmsms_option_name = $cmsms_option_name . '_icon';
			
			break;
		}
		
		break;
	case CMSMS_PAGE_BASENAME . '-font':
		$cmsms_option_name = 'cmsms_options_' . CMSMS_SHORTNAME . '_font';
		$cmsms_settings_page_title = esc_html__('Theme Fonts Settings', 'cmsmasters');
		$cmsms_page_sections = cmsms_options_font_sections();
		$cmsms_page_fields = cmsms_options_font_fields();
		$cmsms_page_tabs = cmsms_options_font_tabs();
		
		switch ($tab) {
		case 'content':
			$cmsms_option_name = $cmsms_option_name . '_content';
			
			break;
		case 'link':
			$cmsms_option_name = $cmsms_option_name . '_link';
			
			break;
		case 'nav':
			$cmsms_option_name = $cmsms_option_name . '_nav';
			
			break;
		case 'heading':
			$cmsms_option_name = $cmsms_option_name . '_heading';
			
			break;
		case 'other':
			$cmsms_option_name = $cmsms_option_name . '_other';
			
			break;
		}
		
		break;
	case CMSMS_PAGE_BASENAME . '-color':
		$cmsms_option_name = 'cmsms_options_' . CMSMS_SHORTNAME . '_color';
		$cmsms_settings_page_title = esc_html__('Theme Color Schemes', 'cmsmasters');
		$cmsms_page_sections = cmsms_options_color_sections();
		$cmsms_page_fields = cmsms_options_color_fields();
		$cmsms_page_tabs = cmsms_options_color_tabs();
		
		
		$cmsms_option_name = $cmsms_option_name . '_' . $tab;
		
		
		break;
	case CMSMS_PAGE_BASENAME . '-single':
		$cmsms_option_name = 'cmsms_options_' . CMSMS_SHORTNAME . '_single';
		$cmsms_settings_page_title = esc_html__('Theme Single Posts Settings', 'cmsmasters');
		$cmsms_page_sections = cmsms_options_single_sections();
		$cmsms_page_fields = cmsms_options_single_fields();
		$cmsms_page_tabs = cmsms_options_single_tabs();
		
		switch ($tab) {
		case 'post':
			$cmsms_option_name = $cmsms_option_name . '_post';
			
			break;
		case 'project':
			$cmsms_option_name = $cmsms_option_name . '_project';
			
			break;
		case 'profile':
			$cmsms_option_name = $cmsms_option_name . '_profile';
			
			break;
		case 'campaign':
			$cmsms_option_name = $cmsms_option_name . '_campaign';
			
			break;
		}
		
		break;
	case CMSMS_PAGE_BASENAME . '-demo':
		$cmsms_option_name = 'cmsms_options_' . CMSMS_SHORTNAME . '_demo';
		$cmsms_settings_page_title = esc_html__('Theme Settings Import/Export', 'cmsmasters');
		$cmsms_page_sections = cmsms_options_demo_sections();
		$cmsms_page_fields = cmsms_options_demo_fields();
		$cmsms_page_tabs = cmsms_options_demo_tabs();
		
		switch ($tab) {
		case 'import':
			$cmsms_option_name = $cmsms_option_name . '_import';
			
			break;
		case 'export':
			$cmsms_option_name = $cmsms_option_name . '_export';
			
			break;
		}
		
		break;
	default:
		$cmsms_option_name = '';
		$cmsms_settings_page_title = '';
		$cmsms_page_tabs = '';
		$cmsms_page_sections = '';
		$cmsms_page_fields = '';
		
		break;
	}
	
	$output['cmsms_option_name'] = $cmsms_option_name;
	$output['cmsms_page_title'] = $cmsms_settings_page_title;
	$output['cmsms_page_tabs'] = $cmsms_page_tabs;
	$output['cmsms_page_sections'] = $cmsms_page_sections;
	$output['cmsms_page_fields'] = $cmsms_page_fields;
	
	return $output;
}


function cmsms_create_settings_field($args = array()) {
	$defaults = array( 
		'id' => 		'default_field', 
		'title' => 		__('Default Field', 'cmsmasters'), 
		'desc' => 		__('This is a default description.', 'cmsmasters'), 
		'std' => 		'', 
		'type' => 		'text', 
		'section' => 	'main_section', 
		'choices' => 	array(), 
		'class' => 		'', 
		'min' => 		'', 
		'max' => 		'', 
		'step' => 		'', 
		'frame' => 		'select', 
		'multiple' => 	false 
	);
	
	extract(wp_parse_args($args, $defaults));
	
	$field_args = array( 
		'type' => 		$type, 
		'id' => 		$id, 
		'desc' => 		$desc, 
		'std' => 		$std, 
		'choices' => 	$choices, 
		'label_for' => 	$id, 
		'class' => 		$class, 
		'min' => 		$min, 
		'max' => 		$max, 
		'step' => 		$step, 
		'frame' => 		$frame, 
		'multiple' => 	$multiple 
	);
	
	add_settings_field( 
		$id, 
		$title, 
		'cmsms_form_field_fn', 
		__FILE__, 
		$section, 
		$field_args 
	);
}


function cmsms_register_settings() {
	$settings_output = cmsms_get_settings();
	
	
	$cmsms_option_name = $settings_output['cmsms_option_name'];
	
	
	$current_page = (isset($_GET['page'])) ? trim($_GET['page']) : '';
	
	$page_updated = (isset($_GET['settings-updated'])) ? trim($_GET['settings-updated']) : '';
	
	
	register_setting($cmsms_option_name, $cmsms_option_name, 'cmsms_validate_options');
	
	
	if (!empty($settings_output['cmsms_page_sections'])) {
		foreach ($settings_output['cmsms_page_sections'] as $id => $title) {
			add_settings_section($id, $title, 'cmsms_section_fn', __FILE__);
		}
	}
	
	
	if (!empty($settings_output['cmsms_page_fields'])) {
		foreach ($settings_output['cmsms_page_fields'] as $option) {
			cmsms_create_settings_field($option);
		}
	}
	
	
	if (($current_page === 'cmsms-settings-color' || $current_page === 'cmsms-settings-font') && $page_updated) {
		cmsms_regenerate_styles();
	}
}


function cmsms_settings_scripts() {
	wp_register_style('cmsms_theme_settings_css', get_template_directory_uri() . '/framework/admin/settings/css/cmsms-theme-settings.css', array(), '1.0.0', 'screen');
	
	wp_register_style('cmsms_theme_settings_css_rtl', get_template_directory_uri() . '/framework/admin/settings/css/cmsms-theme-settings-rtl.css', array(), '1.0.0', 'screen');
	
	
	wp_enqueue_style('wp-jquery-ui-dialog');
	
	
	wp_enqueue_style('cmsms_theme_settings_css');
	
	
	if (is_rtl()) {
		wp_enqueue_style('cmsms_theme_settings_css_rtl');
	}
	
	
	wp_register_script('cmsms_theme_settings_js', get_template_directory_uri() . '/framework/admin/settings/js/cmsms-theme-settings.js', array('jquery', 'farbtastic'), '1.0.0', true);
	
	wp_localize_script('cmsms_theme_settings_js', 'cmsms_setting', array( 
		'remove' => 			esc_attr__('Remove', 'cmsmasters'), 
		'remove_sidebar' => 	esc_html__('Do you realy want to remove this sidebar?', 'cmsmasters'), 
		'find' => 				esc_attr__('Find icons', 'cmsmasters'), 
		'remove_icon' => 		esc_html__('Do you realy want to remove this social icon?', 'cmsmasters'), 
		'theme_uri' => 			get_template_directory_uri(), 
		'shortname' => 			CMSMS_SHORTNAME, 
		'done' => 				esc_html__('All theme settings were imported successfully.', 'cmsmasters'), 
		'fail' => 				esc_html__("Error on page!!!\nPlease reload page and try again.", 'cmsmasters') 
	));
	
	wp_register_script('cmsms_theme_settings_js_toggle', get_template_directory_uri() . '/framework/admin/settings/js/cmsms-theme-settings-toggle.js', array('jquery'), '1.0.0', true);
	
	wp_localize_script('cmsms_theme_settings_js_toggle', 'cmsms_settings', array( 
		'shortname' => 	CMSMS_SHORTNAME 
	));
	
	
	wp_enqueue_script('jquery-ui-sortable');
	
	
	wp_enqueue_script('cmsms_theme_settings_js');
	
	wp_enqueue_script('cmsms_theme_settings_js_toggle');
	
	
	wp_enqueue_media();
}


function cmsms_add_menu() {
	$settings_output = cmsms_get_settings();
	
	add_menu_page( 
		esc_attr__('Theme Settings', 'cmsmasters'), 
		esc_attr__('Theme Settings', 'cmsmasters'), 
		'manage_options', 
		CMSMS_PAGE_BASENAME, 
		'cmsms_settings_page_fn', 
		'' 
	); 
	
	
	$cmsms_settings_general = add_submenu_page( 
		CMSMS_PAGE_BASENAME, 
		esc_attr__('Theme General Settings', 'cmsmasters'), 
		esc_attr__('General', 'cmsmasters'), 
		'manage_options', 
		CMSMS_PAGE_BASENAME, 
		'cmsms_settings_page_fn' 
	);
	
	add_action('load-' . $cmsms_settings_general, 'cmsms_settings_scripts');
	
	
	$cmsms_settings_style = add_submenu_page( 
		CMSMS_PAGE_BASENAME, 
		esc_attr__('Theme Appearance', 'cmsmasters'), 
		esc_attr__('Appearance', 'cmsmasters'), 
		'manage_options', 
		CMSMS_PAGE_BASENAME . '-style', 
		'cmsms_settings_page_fn' 
	);
	
	add_action('load-' . $cmsms_settings_style, 'cmsms_settings_scripts');
	
	
	$cmsms_settings_font = add_submenu_page( 
		CMSMS_PAGE_BASENAME, 
		esc_attr__('Theme Fonts Settings', 'cmsmasters'), 
		esc_attr__('Fonts', 'cmsmasters'), 
		'manage_options', 
		CMSMS_PAGE_BASENAME . '-font', 
		'cmsms_settings_page_fn' 
	);
	
	add_action('load-' . $cmsms_settings_font, 'cmsms_settings_scripts');
	
	
	$cmsms_settings_color = add_submenu_page( 
		CMSMS_PAGE_BASENAME, 
		esc_attr__('Theme Color Schemes', 'cmsmasters'), 
		esc_attr__('Colors', 'cmsmasters'), 
		'manage_options', 
		CMSMS_PAGE_BASENAME . '-color', 
		'cmsms_settings_page_fn' 
	);
	
	add_action('load-' . $cmsms_settings_color, 'cmsms_settings_scripts');
	
	
	$cmsms_settings_single = add_submenu_page( 
		CMSMS_PAGE_BASENAME, 
		esc_attr__('Theme Single Posts Settings', 'cmsmasters'), 
		esc_attr__('Single Posts', 'cmsmasters'), 
		'manage_options', 
		CMSMS_PAGE_BASENAME . '-single', 
		'cmsms_settings_page_fn' 
	);
	
	add_action('load-' . $cmsms_settings_single, 'cmsms_settings_scripts');
	
	
	$cmsms_settings_demo = add_submenu_page( 
		CMSMS_PAGE_BASENAME, 
		esc_attr__('Theme Settings Import/Export', 'cmsmasters'), 
		esc_attr__('Import/Export', 'cmsmasters'), 
		'manage_options', 
		CMSMS_PAGE_BASENAME . '-demo', 
		'cmsms_settings_page_fn' 
	);
	
	add_action('load-' . $cmsms_settings_demo, 'cmsms_settings_scripts');
}


function cmsms_section_fn($desc) {
	$tab = cmsms_get_the_tab();
	
	switch ($tab) {
	case 'general':
		echo '';
		
		break;
	default:
		break;
	}
}


function cmsms_settings_page_fn() {
	$settings_output = cmsms_get_settings();
	$current_tab = cmsms_get_the_tab();
	
	echo '<div class="wrap">';
	
	cmsms_settings_page_header();
	
	if ($current_tab != 'wpml') {
		echo '<form action="options.php" method="post" class="cmsms_admin_page"' . (($current_tab == 'recaptcha') ? ' style="background-color:#fdffc6; padding:35px 0 15px 25px; margin:0;"' : '') . '>' . 
		'<p class="submit-top">' . 
			(($current_tab != 'import' && $current_tab != 'export') ? '<input name="submit-top" type="submit" class="button button-primary button-large" value="' . esc_attr__('Save Changes', 'cmsmasters') . '" />' : '') . 
		'</p>';
		
		settings_fields($settings_output['cmsms_option_name']);
		
		do_settings_sections(__FILE__);
		
		echo '<p class="submit">' . 
				(($current_tab != 'import' && $current_tab != 'export') ? '<input name="submit" type="submit" class="button button-primary button-large" value="' . esc_attr__('Save Changes', 'cmsmasters') . '" />' : (($current_tab == 'import') ? '<input name="import" type="button" class="button button-primary button-large cmsms-demo-import" value="' . esc_attr__('Import Settings', 'cmsmasters') . '" />' : '')) . 
			'</p>' . 
		'</form>';
	} else {
		do_settings_sections(__FILE__);
	}
	
	
	echo '</div>';
}


function cmsms_form_field_fn($args = array()) {
	extract($args);
	
	$settings_output = cmsms_get_settings();
	
	$cmsms_option_name = $settings_output['cmsms_option_name'];
	
	$options = get_option($cmsms_option_name);
	
	if (!isset($options[$id])) {
		$options[$id] = $std;
	}
	
	$field_class = ($class != '') ? ' ' . $class : '';
	
	switch ($type) {
	case 'text':
		$options[$id] = esc_attr(stripslashes($options[$id]));
		
		echo '<input class="regular-text' . $field_class . '" type="text" id="' . $id . '" name="' . $cmsms_option_name . '[' . $id . ']" value="' . $options[$id] . '" />' . 
		(($desc != '') ? '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'multi-text':
		foreach ($choices as $item) {
			$item = explode('|', $item);
			$item[0] = esc_html($item[0]);
			
			if (!empty($options[$id])) {
				foreach ($options[$id] as $option_key => $option_val) {
					if ($item[1] == $option_key) {
						$value = $option_val;
					}
				}
			} else {
				$value = '';
			}
			
			echo '<span>' . $item[0] . ':</span> ' . 
			'<input class="' . $field_class . '" type="text" id="' . $id . '|' . $item[1] . '" name="' . $cmsms_option_name . '[' . $id . '|' . $item[1] . ']" value="' . $value . '" />' . 
			'<br />';
		}
		
		echo (($desc != '') ? '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'textarea':
		$options[$id] = esc_html(stripslashes($options[$id]));
		
		echo '<textarea class="textarea' . $field_class . '" id="' . $id . '" name="' . $cmsms_option_name . '[' . $id . ']" rows="5" cols="30">' . $options[$id] . '</textarea>' . 
		(($desc != '') ? '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'select':
		echo '<select id="' . $id . '" class="select' . $field_class . '" name="' . $cmsms_option_name . '[' . $id . ']">';
		
		foreach ($choices as $item) {
			$item = explode('|', $item);
			$item[0] = esc_html($item[0]);
			
			$selected = ($options[$id] == $item[1]) ? ' selected="selected"' : '';
			
			echo '<option value="' . $item[1] . '"' . $selected . '>' . $item[0] . '</option>';
		}
		
		echo '</select>' . 
		(($desc != '') ? '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'select_scheme':
		echo '<select id="' . $id . '" class="select_scheme' . $field_class . '" name="' . $cmsms_option_name . '[' . $id . ']">';
		
		foreach ($choices as $key => $value) {
			$selected = ($options[$id] == $key) ? ' selected="selected"' : '';
			
			echo '<option value="' . $key . '"' . $selected . '>' . esc_html($value) . '</option>';
		}
		
		echo '</select>' . 
		(($desc != '') ? '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'checkbox':
		echo '<input class="checkbox' . $field_class . '" type="checkbox" id="' . $id . '" name="' . $cmsms_option_name . '[' . $id . ']" value="1" ' . checked($options[$id], 1, false) . ' /> &nbsp;' . 
		(($desc != '') ? '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'multi-checkbox':
		foreach ($choices as $item) {
			$item = explode('|', $item);
			$item[0] = esc_html($item[0]);
			$checked = '';
			
			if (isset($options[$id][$item[1]]) && $options[$id][$item[1]] == 'true') {
				$checked = ' checked="checked"';
			}
			
			echo '<input class="checkbox' . $field_class . '" type="checkbox" id="' . $id . '|' . $item[1] . '" name="' . $cmsms_option_name . '[' . $id . '|' . $item[1] . ']" value="1"' . $checked . ' /> &nbsp;' . 
			'<label for="' . $id . '|' . $item[1] . '">' . $item[0] . '</label>' . 
			'<br />';
		}
		
		echo (($desc != '') ? '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'number':
		$options[$id] = esc_attr(stripslashes($options[$id]));
		
		echo '<input class="small-text' . $field_class . '" type="number" id="' . $id . '" name="' . $cmsms_option_name . '[' . $id . ']" value="' . $options[$id] . '"' . (($min != '') ? ' min="' . $min . '"' : '') . (($max != '') ? ' max="' . $max . '"' : '') . (($step != '') ? ' step="' . $step . '"' : '') . ' />' . 
		(($desc != '') ? ' &nbsp; ' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'radio':
		foreach ($choices as $item) {
			$item = explode('|', $item);
			$item[0] = esc_html($item[0]);
			
			echo '<input class="radio' . $field_class . '" type="radio" id="' . $id . '|' . $item[1] . '" name="' . $cmsms_option_name . '[' . $id . ']" value="' . $item[1] . '" ' . checked($options[$id], $item[1], false) . ' /> &nbsp;' . 
			'<label for="' . $id . '|' . $item[1] . '">' . $item[0] . '</label>' . 
			'<br />';
		}
		
		echo (($desc != '') ? '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'radio_img':
		foreach ($choices as $item) {
			$item = explode('|', $item);
			$item[0] = esc_html($item[0]);
			
			echo '<div style="text-align:center; float:' . (is_rtl() ? 'right' : 'left') . '; margin-' . (is_rtl() ? 'left' : 'right') . ':20px;">' . 
				'<input class="radio' . $field_class . '" type="radio" id="' . $id . '|' . $item[2] . '" name="' . $cmsms_option_name . '[' . $id . ']" value="' . $item[2] . '" ' . checked($options[$id], $item[2], false) . ' />' . 
				'<br />' . 
				'<label for="' . $id . '|' . $item[2] . '">' . 
					'<img src="' . esc_url($item[1]) . '" alt="' . esc_attr($item[0]) . '" title="' . esc_attr($item[0]) . '" />' . 
					'<br />' . 
					$item[0] . 
				'</label>' . 
			'</div>';
		}
		
		echo (($desc != '') ? '<div style="clear:both;"></div>' . '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'button':
		echo '<input type="button" id="' . $id . '" name="' . $cmsms_option_name . '[' . $id . ']" value="' . $std . '" class="button button-primary button-large ' . $class . '" />' . 
		'<br /><br />' . 
		'<span class="description">' . 
			(($desc != '') ? $desc . '<br />' : '') . 
		'</span>';
		
		
		break;
	case 'color':
		$options[$id] = esc_attr(stripslashes($options[$id]));
		
		
		echo '<input type="text" id="' . $id . '" name="' . $cmsms_option_name . '[' . $id . ']" value="' . $options[$id] . '" class="cmsms-color-field" data-default-color="' . $std . '" />' . 
		'<br />' . 
		'<span class="description">' . 
			(($desc != '') ? $desc . '<br />' : '') . 
		'</span>';
		
		
		break;
	case 'rgba':
		$options[$id] = esc_attr(stripslashes($options[$id]));
		
		
		$id_array = explode('|', $options[$id]);
		
		$std_array = explode('|', $std);
		
		
		echo '<input type="text" id="' . $id . '" name="' . $cmsms_option_name . '[' . $id . ']" value="' . $id_array[0] . '" class="cmsms-color-field" data-default-color="' . $std_array[0] . '" />' . 
		'<br />' . 
		'<small>' . esc_html__('Color opacity', 'cmsmasters') . ':</small>' . 
		'<div class="cl"></div>' . 
		'<input type="range" name="' . $cmsms_option_name . '[' . $id . '_opacity]" id="' . $id . '_opacity" value="' . (isset($id_array[1]) ? $id_array[1] : 0) . '" size="30" min="0" max="100" step="1" class="cmsms-range-field ' . $field_class . '" />' . 
		'<input type="text" name="' . $cmsms_option_name . '_number" id="' . $cmsms_option_name . '_number" value="' . (isset($id_array[1]) ? $id_array[1] : 0) . '" size="5" class="cmsms-range-field-number" readonly="readonly" />' . 
		'<span class="description">' . 
			(($desc != '') ? $desc . '<br />' : '') . 
		'</span>';
		
		
		break;
	case 'upload':
		$image_array = explode('|', $std);
		
		
		$id_array = explode('|', $options[$id]);
		
		
		$image = (isset($image_array[1]) && $image_array[1] != '') ? $image_array[1] : '';
		
		
		if ( 
			$options[$id] != $std && 
			isset($id_array[1]) && 
			$id_array[1] != '' 
		) {
			$image = $id_array[1];
		}
		
		
		echo '<div class="cmsms_upload_parent cmsms_select_parent">' . 
			'<input type="button" id="cmsms_upload_' . $id . '_button" class="cmsms_upload_button button button-large" value="' . esc_attr__('Choose Image', 'cmsmasters') . '" data-title="' . esc_attr__('Choose Image', 'cmsmasters') . '" data-button="' . __('Insert Image', 'cmsmasters') . '" data-id="cmsms-media-select-frame-' . $id . '" data-classes="media-frame cmsms-media-select-frame' . ((!isset($description)) ? ' cmsms-frame-no-description' : '') . ((!isset($caption)) ? ' cmsms-frame-no-caption' : '') . ((!isset($align)) ? ' cmsms-frame-no-align' : '') . ((!isset($link)) ? ' cmsms-frame-no-link' : '') . ((!isset($size)) ? ' cmsms-frame-no-size' : '') . '" data-library="image" data-type="' . $frame . '"' . (($frame == 'post') ? ' data-state="insert"' : '') . ' data-multiple="' . $multiple . '" />' . 
			'<div class="cmsms_upload"' . (($image != '') ? ' style="display:block;"' : '') . '>' . 
				'<img src="' . (($image != '') ? $image : '') . '" class="cmsms_preview_image" alt="" />' . 
				'<a href="#" class="cmsms_upload_cancel admin-icon-remove" title="' . esc_attr__('Remove', 'cmsmasters') . '"></a>' . 
			'</div>' . 
			'<input id="' . $id . '" name="' . $cmsms_option_name . '[' . $id . ']" type="hidden" class="cmsms_upload_image" value="' . $options[$id] . '" />' . 
		'</div>' . 
		'<div style="clear:both;"></div>' . 
		(($desc != '') ? '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		
		break;
	case 'typorgaphy':
		$system_font = (in_array('system_font', $choices)) ? true : false;
		$google_font = (in_array('google_font', $choices)) ? true : false;
		$font_color = (in_array('font_color', $choices)) ? true : false;
		$font_size = (in_array('font_size', $choices)) ? true : false;
		$line_height = (in_array('line_height', $choices)) ? true : false;
		$font_weight = (in_array('font_weight', $choices)) ? true : false;
		$font_style = (in_array('font_style', $choices)) ? true : false;
		$text_transform = (in_array('text_transform', $choices)) ? true : false;
		$text_decoration = (in_array('text_decoration', $choices)) ? true : false;
		
		if ($system_font) {
			echo '<div class="cmsms_admin_block">' . 
				'<select class="select" id="' . $id . '_system_font" name="' . $cmsms_option_name . '[' . $id . '_system_font]">';
				
				foreach (cmsms_system_fonts_list() as $key => $value) {
					echo '<option value="' . $key . '"' . (($options[$id . '_system_font'] == $key) ? ' selected="selected"' : '') . '>' . $value .'</option>';
				}
				
				echo '</select>' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_system_font">' . esc_html__('System Font', 'cmsmasters') . '</label>' . 
			'</div>';
		}
		
		if ($google_font) {
			echo '<div class="cmsms_admin_block">' . 
				'<select class="select" id="' . $id . '_google_font" name="' . $cmsms_option_name . '[' . $id . '_google_font]">';
				
				foreach (cmsms_google_fonts_list() as $key => $value) {
					echo '<option value="' . $key . '"' . (($options[$id . '_google_font'] == $key) ? ' selected="selected"' : '') . '>' . $value .'</option>';
				}
				
				echo '</select>' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_google_font">' . esc_html__('Google Font', 'cmsmasters') . '</label>' . 
			'</div>';
		}
		
		if ($font_color) {
			echo '<div class="cmsms_admin_block" style="padding-bottom:20px;">' . 
				'<input type="text" id="' . $id . '_font_color" name="' . $cmsms_option_name . '[' . $id . '_font_color]" value="' . $options[$id . '_font_color'] . '" class="cmsms-color-field" data-default-color="' . $std['font_color'] . '" />' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_font_color" style="padding-bottom:15px;">' . esc_html__('Font Color', 'cmsmasters') . '</label>' . 
			'</div>';
		}
		
		if ($font_size) {
			echo '<div class="cmsms_admin_block">' . 
				'<input class="small-text" type="number" id="' . $id . '_font_size_number" name="' . $cmsms_option_name . '[' . $id . '_font_size]" value="' . $options[$id . '_font_size'] . '" min="0" step="1" /> ' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_font_size_number">' . esc_html__('Font Size', 'cmsmasters') . ' <em>(' . __('in pixels', 'cmsmasters') . ')</em></label>' . 
			'</div>';
		}
		
		if ($line_height) {
			echo '<div class="cmsms_admin_block">' . 
				'<input class="small-text" type="number" id="' . $id . '_line_height_number" name="' . $cmsms_option_name . '[' . $id . '_line_height]" value="' . $options[$id . '_line_height'] . '" min="0" step="1" /> ' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_line_height_number">' . esc_html__('Line Height', 'cmsmasters') . ' <em>(' . __('in pixels', 'cmsmasters') . ')</em></label>' . 
			'</div>';
		}
		
		if ($font_weight) {
			echo '<div class="cmsms_admin_block">' . 
				'<select class="select" id="' . $id . '_font_weight" name="' . $cmsms_option_name . '[' . $id . '_font_weight]">';
				
				foreach (cmsms_font_weight_list() as $key => $value) {
					echo '<option value="' . $key . '"' . (($options[$id . '_font_weight'] == $key) ? ' selected="selected"' : '') . '>' . $value .'</option>';
				}
				
				echo '</select>' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_font_weight">' . esc_html__('Font Weight', 'cmsmasters') . '</label>' . 
			'</div>';
		}
		
		if ($font_style) {
			echo '<div class="cmsms_admin_block">' . 
				'<select class="select" id="' . $id . '_font_style" name="' . $cmsms_option_name . '[' . $id . '_font_style]">';
				
				foreach (cmsms_font_style_list() as $key => $value) {
					echo '<option value="' . $key . '"' . (($options[$id . '_font_style'] == $key) ? ' selected="selected"' : '') . '>' . $value .'</option>';
				}
				
				echo '</select>' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_font_style">' . esc_html__('Font Style', 'cmsmasters') . '</label>' . 
			'</div>';
		}
		
		if ($text_transform) {
			echo '<div class="cmsms_admin_block">' . 
				'<select class="select" id="' . $id . '_text_transform" name="' . $cmsms_option_name . '[' . $id . '_text_transform]">';
				
				foreach (cmsms_text_transform_list() as $key => $value) {
					echo '<option value="' . $key . '"' . (($options[$id . '_text_transform'] == $key) ? ' selected="selected"' : '') . '>' . $value .'</option>';
				}
				
				echo '</select>' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_text_transform">' . esc_html__('Text Transform', 'cmsmasters') . '</label>' . 
			'</div>';
		}
		
		if ($text_decoration) {
			echo '<div class="cmsms_admin_block">' . 
				'<select class="select" id="' . $id . '_text_decoration" name="' . $cmsms_option_name . '[' . $id . '_text_decoration]">';
				
				foreach (cmsms_text_decoration_list() as $key => $value) {
					echo '<option value="' . $key . '"' . (($options[$id . '_text_decoration'] == $key) ? ' selected="selected"' : '') . '>' . $value .'</option>';
				}
				
				echo '</select>' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_text_decoration">' . esc_html__('Text Decoration', 'cmsmasters') . '</label>' . 
			'</div>';
		}
		
		echo (($desc != '') ? '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'sidebar':
		echo (($desc != '') ? '<span class="description">' . $desc . '</span>' . '<br />' . '<br />': '') . 
		'<div class="sidebar_management">' . 
			'<p>' . 
				'<input class="all-options" type="text" id="new_sidebar_name" />' . 
				'<input class="button" type="button" id="add_sidebar" value="' . esc_attr__('Add Sidebar', 'cmsmasters') . '" />' . 
			'</p>' . 
			'<div></div>' . 
			'<ul>';
			
			if (isset($options[$id]) && is_array($options[$id])) {
				$i = 0;
				
				foreach($options[$id] as $sidebar) {
					$i++;
					
					echo '<li>' . 
						'<a href="#" class="sidebar_del admin-icon-remove"></a> ' . 
						$sidebar . 
						'<input type="hidden" name="' . $cmsms_option_name . '[' . $id . '_-_' . $i . ']" value="' . $sidebar . '" />' . 
					'</li>';
				}
			}
			
			echo '</ul>' . 
			'<input id="custom_sidebars_number" type="hidden" name="' . $cmsms_option_name . '[' . $id . '_number]" value="' . ((isset($options[$id]) && is_array($options[$id])) ? $i : 0) . '" />' . 
		'</div>';
		
		break;
	
	case 'wpml':
		echo '<div class="wrap otgsi_downloads_form">' .
			'<span>' . __("This plugin makes it easy to build multilingual sites and run them. It's powerful enough for corporate sites, yet simple for blogs.", 'cmsmasters') . '</span>';
	
		// CONFIG
		$config['template'] = 'compact'; //required
		$config['product_name'] = 'WPML'; 
		$config['box_title'] = 'Multilingual Agrofields';
		$config['name'] = 'Agrofields'; //name of theme/plugin 
		$config['box_description'] = 'Agrofields theme is fully compatible with WPML - the WordPress Multilingual plugin. WPML lets you add languages to your existing sites and includes advanced translation management.'; 
		$config['repository'] = 'wpml'; // required
		$config['package'] = 'multilingual-cms'; // required
		$config['product'] = 'multilingual-cms'; // required  

		WP_Installer_Show_Products($config);
    
		echo "</div>";
		
		break;
	
	case 'social':
		echo (($desc != '') ? '<span class="description">' . $desc . '</span>' . '<br />' . '<br />': '') . 
		'<div class="icon_management">' . 
			'<p>' . 
				'<input class="icon_upload_image all-options" type="hidden" id="' . $id . '" value="" />' . 
				'<span id="' . $id . '_icon" data-class="cmsms_new_icon_img"></span>' . 
				'<input id="' . $id . '_button" class="cmsms_icon_choose_button button" type="button" value="' . esc_attr__('Choose icon', 'cmsmasters') . '" />' . 
				'<a href="#" class="cmsms_remove_icon admin-icon-remove" title="' . esc_attr__('Cancel changes', 'cmsmasters') . '"></a>' . 
			'</p>' . 
			'<span class="cl"><br /></span>' . 
			'<span class="icon_upload_link" style="display:none;">' . 
				'<label for="new_icon_link">' . 
					'<input class="all-options" type="text" id="new_icon_link" /> ' . 
					__('Icon Link', 'cmsmasters') . 
				'</label>' . 
				'<label for="new_icon_title">' . 
					'<input class="all-options" type="text" id="new_icon_title" /> ' . 
					__('Icon Title', 'cmsmasters') . 
				'</label>' . 
				'<label for="new_icon_target">' . 
					'<input type="checkbox" id="new_icon_target" value="true" /> ' . 
					__('Open link in a new tab/window?', 'cmsmasters') . 
				'</label>' . 
			'</span>' . 
			'<span class="cl"></span>' . 
			'<input class="button button-primary" type="button" id="add_icon" value="' . esc_attr__('Add Icon', 'cmsmasters') . '" />' . 
			'<input class="button button-primary" type="button" id="edit_icon" value="' . esc_attr__('Save Icon', 'cmsmasters') . '" />' . 
			'<ul>';
			
			
			$i = 0;
			
			
			if (isset($options[$id]) && is_array($options[$id])) {
				foreach($options[$id] as $icon) {
					$i++;
					
					
					$icon_attrs = explode('|', $icon);
					
					
					echo '<li>' . 
						'<div class="' . $icon_attrs[0] . '">' . 
							'<input type="hidden" id="' . $cmsms_option_name . '_' . $id . '_-_' . $i . '" name="' . $cmsms_option_name . '[' . $id . '_-_' . $i . ']" value="' . $icon . '" />' . 
						'</div>' . 
						'<a href="#" class="icon_del admin-icon-remove" title="' . esc_attr__('Remove', 'cmsmasters') . '"></a> ' . 
						'<span class="icon_move admin-icon-move"></span> ' . 
					'</li>';
				}
			}
			
			
			echo '</ul>' . 
			'<input id="custom_icons_number" type="hidden" name="' . $cmsms_option_name . '[' . $id . '_number]" value="' . $i . '" />' . 
		'</div>';
		
		
		break;
	}
}


function cmsms_validate_options($input) {
	$valid_input = array();
	
	$settings_output = cmsms_get_settings();
	$options = $settings_output['cmsms_page_fields'];
	
	foreach ($options as $option) {
		switch ($option['type']) {
		case 'text':
			switch ($option['class']) {
			case 'numeric':
				$input[$option['id']] = trim($input[$option['id']]);
				
				$valid_input[$option['id']] = (is_numeric($input[$option['id']])) ? $input[$option['id']] : __('Expecting a Numeric value!', 'cmsmasters');
				
				if (is_numeric($input[$option['id']]) == false) {
					add_settings_error(
						$option['id'],
						CMSMS_SHORTNAME . '_txt_numeric_error',
						__('Expecting a Numeric value! Please fix.', 'cmsmasters'),
						'error'
					);
				}
				
				break;
			case 'multinumeric':
				$input[$option['id']] = trim($input[$option['id']]);
				
				if ($input[$option['id']] != '') {
					$valid_input[$option['id']] = (preg_match('/^-?\d+(?:,\s?-?\d+)*$/', $input[$option['id']]) == 1) ? $input[$option['id']] : __('Expecting comma separated numeric values', 'cmsmasters');
				} else {
					$valid_input[$option['id']] = $input[$option['id']];
				}
				
				if ($input[$option['id']] != '' && preg_match('/^-?\d+(?:,\s?-?\d+)*$/', $input[$option['id']]) != 1) {
					add_settings_error(
						$option['id'],
						CMSMS_SHORTNAME . '_txt_multinumeric_error',
						__('Expecting comma separated numeric values! Please fix.','cmsmasters'),
						'error'
					);
				}
				
				break;
			case 'nohtml':
				$input[$option['id']] = sanitize_text_field($input[$option['id']]);
				
				$valid_input[$option['id']] = addslashes($input[$option['id']]);
				
				break;
			case 'url':
				$input[$option['id']] = trim($input[$option['id']]);
				
				$valid_input[$option['id']] = esc_url_raw($input[$option['id']]);
				
				break;
			case 'email':
				$input[$option['id']] = trim($input[$option['id']]);
				
				if ($input[$option['id']] != '') {
					$valid_input[$option['id']] = (is_email($input[$option['id']]) !== false) ? $input[$option['id']] : __('Invalid email! Please re-enter!', 'cmsmasters');
				} elseif ($input[$option['id']] == '') {
					$valid_input[$option['id']] = __('This setting field cannot be empty! Please enter a valid email address.', 'cmsmasters');
				}
				
				if (is_email($input[$option['id']]) == false || $input[$option['id']] == '') {
					add_settings_error(
						$option['id'],
						CMSMS_SHORTNAME . '_txt_email_error',
						__('Please enter a valid email address.', 'cmsmasters'),
						'error'
					);
				}
				
				break;
			default:
				$allowed_html = array( 
					'a' => array( 
						'href' => array(), 
						'title' => array() 
					), 
					'b' => array(), 
					'em' => array(), 
					'i' => array(), 
					'strong' => array() 
				);
				
				$input[$option['id']] = trim($input[$option['id']]);
				$input[$option['id']] = force_balance_tags($input[$option['id']]);
				$input[$option['id']] = wp_kses( $input[$option['id']], $allowed_html);
				
				$valid_input[$option['id']] = addslashes($input[$option['id']]);
				
				break;
			}
			
			break;
		case 'multi-text':
			$textarray = array();
			$text_values = array();
			
			foreach ($option['choices'] as $k => $v) {
				$pieces = explode('|', $v);
				
				$text_values[] = $pieces[1];
			}
			
			foreach ($text_values as $v) {
				if (!empty($input[$option['id'] . '|' . $v])) {
					switch ($option['class']) {
						case 'numeric':
							$input[$option['id'] . '|' . $v] = trim($input[$option['id'] . '|' . $v]);
							
							$input[$option['id'] . '|' . $v] = (is_numeric($input[$option['id'] . '|' . $v])) ? $input[$option['id'] . '|' . $v] : '';
						break;
						
						default:
							$input[$option['id'] . '|' . $v] = sanitize_text_field($input[$option['id'] . '|' . $v]);
							$input[$option['id'] . '|' . $v] = addslashes($input[$option['id'] . '|' . $v]);
						break;
					}
					
					$textarray[$v] = $input[$option['id'] . '|' . $v];
				} else {
					$textarray[$v] = '';
				}
			}
			
			if (!empty($textarray)) {
				$valid_input[$option['id']] = $textarray;
			}
			
			break;
		case 'textarea':
			switch ($option['class']) {
			case 'inlinehtml':
				$input[$option['id']] = trim($input[$option['id']]);
				$input[$option['id']] = force_balance_tags($input[$option['id']]);
				$input[$option['id']] = addslashes($input[$option['id']]);
				
				$valid_input[$option['id']] = wp_filter_kses($input[$option['id']]);
				
				break;
			case 'nohtml':
				$input[$option['id']] = sanitize_text_field($input[$option['id']]);
				
				$valid_input[$option['id']] = addslashes($input[$option['id']]);
				
				break;
			case 'allowlinebreaks':
				$input[$option['id']] = wp_strip_all_tags($input[$option['id']]);
				
				$valid_input[$option['id']] = addslashes($input[$option['id']]);
				
				break;
			default:
				$allowed_html = array( 
					'script' => array( 
						'type' => array() 
					), 
					'style' => array( 
						'type' => array(), 
						'media' => array() 
					), 
					'a' => array( 
						'class' => array(), 
						'href' => array(), 
						'title' => array() 
					), 
					'b' => array(), 
					'blockquote' => array( 
						'cite' => array() 
					), 
					'br' => array(), 
					'dd' => array(), 
					'dl' => array(), 
					'dt' => array(), 
					'em' => array(), 
					'i' => array(), 
					'li' => array(), 
					'ol' => array(), 
					'p' => array( 
						'class' => array(), 
						'style' => array() 
					), 
					'span' => array( 
						'class' => array(), 
						'style' => array() 
					), 
					'div' => array( 
						'class' => array(), 
						'style' => array() 
					), 
					'img' => array( 
						'src' => array(),
						'width' => array(),
						'height' => array(), 
						'class' => array(),
						'alt' => array() 
					), 
					'q' => array( 
						'cite' => array() 
					), 
					'strong' => array(), 
					'ul' => array(), 
					'h1' => array( 
						'align' => array(), 
						'class' => array(), 
						'id' => array(), 
						'style' => array() 
					), 
					'h2' => array( 
						'align' => array(), 
						'class' => array(), 
						'id' => array(), 
						'style' => array() 
					), 
					'h3' => array( 
						'align' => array(), 
						'class' => array(), 
						'id' => array(), 
						'style' => array() 
					), 
					'h4' => array( 
						'align' => array(), 
						'class' => array(), 
						'id' => array(), 
						'style' => array() 
					), 
					'h5' => array( 
						'align' => array(), 
						'class' => array(), 
						'id' => array(), 
						'style' => array() 
					), 
					'h6' => array( 
						'align' => array(), 
						'class' => array(), 
						'id' => array(), 
						'style' => array() 
					) 
				);
				
				$input[$option['id']] = trim($input[$option['id']]);
				$input[$option['id']] = force_balance_tags($input[$option['id']]);
				$input[$option['id']] = wp_kses($input[$option['id']], $allowed_html);
				
				$valid_input[$option['id']] = addslashes($input[$option['id']]);
				
				break;
			}
			
			break;
		case 'select':
			$select_values = array();
			
			foreach ($option['choices'] as $k => $v) {
				$pieces = explode('|', $v);
				
				$select_values[] = $pieces[1];
			}
			
			$valid_input[$option['id']] = (in_array($input[$option['id']], $select_values) ? $input[$option['id']] : '');
			
			break;
		case 'select_scheme':
			$select_values = array();
			
			
			foreach ($option['choices'] as $k => $v) {
				$select_values[] = $k;
			}
			
			
			$valid_input[$option['id']] = (in_array($input[$option['id']], $select_values) ? $input[$option['id']] : '');
			
			
			break;
		case 'checkbox':
			if (!isset($input[$option['id']])) {
				$input[$option['id']] = null;
			}
			
			$valid_input[$option['id']] = (($input[$option['id']] == 1) ? 1 : 0);
			
			break;
		case 'multi-checkbox':
			$checkboxarray = array();
			$check_values = array();
			
			foreach ($option['choices'] as $k => $v) {
				$pieces = explode('|', $v);
				
				$check_values[] = $pieces[1];
			}
			
			foreach ($check_values as $v) {
				if (!empty($input[$option['id'] . '|' . $v])) {
					$checkboxarray[$v] = 'true';
				} else {
					$checkboxarray[$v] = 'false';
				}
			}
			
			if (!empty($checkboxarray)) {
				$valid_input[$option['id']] = $checkboxarray;
			}
			
			break;
		case 'number':
			$input[$option['id']] = trim($input[$option['id']]);
			$valid_input[$option['id']] = (is_numeric($input[$option['id']])) ? $input[$option['id']] : __('Number!', 'cmsmasters');
			
			if (is_numeric($input[$option['id']]) == false) {
				add_settings_error(
					$option['id'],
					CMSMS_SHORTNAME . '_txt_numeric_error',
					__('Expecting a Numeric value! Please fix.', 'cmsmasters'),
					'error'
				);
			}
			
			break;
		case 'radio':
			$select_values = array();
			
			foreach ($option['choices'] as $k => $v) {
				$pieces = explode('|', $v);
				
				$select_values[] = $pieces[1];
			}
			
			$valid_input[$option['id']] = (in_array($input[$option['id']], $select_values) ? $input[$option['id']] : '');
			
			break;
		case 'radio_img':
			$select_values = array();
			
			foreach ($option['choices'] as $k => $v) {
				$pieces = explode('|', $v);
				
				$select_values[] = $pieces[2];
			}
			
			$valid_input[$option['id']] = (in_array($input[$option['id']], $select_values) ? $input[$option['id']] : '');
			
			break;
		case 'rgba':
			$valid_input[$option['id']] = $input[$option['id']] . '|' . $input[$option['id'] . '_opacity'];
			
			
			break;
		case 'typorgaphy':
			foreach ($option['choices'] as $v) {
				if (!empty($input[$option['id'] . '_' . $v])) {
					$valid_input[$option['id'] . '_' . $v] = $input[$option['id'] . '_' . $v];
				} else {
					$valid_input[$option['id'] . '_' . $v] = '';
				}
			}
			
			break;
		case 'sidebar':
			$valid_vals = array();
			
			for ($n = 1, $i = $input[$option['id'] . '_number']; $n <= $i; $n++) {
				$valid_vals[] = $input[$option['id'] . '_-_' . $n];
			}
			
			if (!empty($valid_vals)) {
				$valid_input[$option['id']] = $valid_vals;
			}
			
			break;
		case 'heading':
			$valid_vals = array();
			
			for ($n = 1, $i = $input[$option['id'] . '_number']; $n <= $i; $n++) {
				$valid_vals[] = $input[$option['id'] . '_-_' . $n];
			}
			
			if (!empty($valid_vals)) {
				$valid_input[$option['id']] = $valid_vals;
			}
			
			break;
		case 'social':
			$valid_vals = array();
			
			for ($n = 1, $i = $input[$option['id'] . '_number']; $n <= $i; $n++) {
				$valid_vals[] = $input[$option['id'] . '_-_' . $n];
			}
			
			if (!empty($valid_vals)) {
				$valid_input[$option['id']] = $valid_vals;
			}
			
			break;
		default:
			$valid_input[$option['id']] = $input[$option['id']];
			
			break;
		}
	}
	
	return $valid_input;
}


function theme_admin_bar_render() {
	global $wp_admin_bar;
	
	
	$wp_admin_bar->add_menu(array( 
		'id' => CMSMS_SHORTNAME . '_options', 
		'title' => esc_attr__('Theme Settings', 'cmsmasters'), 
		'href' => admin_url('admin.php?page=cmsms-settings') 
	));
	
	
	$wp_admin_bar->add_menu(array( 
		'parent' => CMSMS_SHORTNAME . '_options', 
		'id' => CMSMS_SHORTNAME . '_theme_settings', 
		'title' => esc_attr__('General', 'cmsmasters'), 
		'href' => admin_url('admin.php?page=cmsms-settings') 
	));
	
	$wp_admin_bar->add_menu(array( 
		'parent' => CMSMS_SHORTNAME . '_options', 
		'id' => CMSMS_SHORTNAME . '_theme_settings_style', 
		'title' => esc_attr__('Appearance', 'cmsmasters'), 
		'href' => admin_url('admin.php?page=cmsms-settings-style') 
	));
	
	$wp_admin_bar->add_menu(array( 
		'parent' => CMSMS_SHORTNAME . '_options', 
		'id' => CMSMS_SHORTNAME . '_theme_settings_font', 
		'title' => esc_attr__('Fonts', 'cmsmasters'), 
		'href' => admin_url('admin.php?page=cmsms-settings-font') 
	));
	
	$wp_admin_bar->add_menu(array( 
		'parent' => CMSMS_SHORTNAME . '_options', 
		'id' => CMSMS_SHORTNAME . '_theme_settings_color', 
		'title' => esc_attr__('Colors', 'cmsmasters'), 
		'href' => admin_url('admin.php?page=cmsms-settings-color') 
	));
	
	$wp_admin_bar->add_menu(array( 
		'parent' => CMSMS_SHORTNAME . '_options', 
		'id' => CMSMS_SHORTNAME . '_theme_settings_single', 
		'title' => esc_attr__('Single', 'cmsmasters'), 
		'href' => admin_url('admin.php?page=cmsms-settings-single') 
	));
}

add_action('wp_before_admin_bar_render', 'theme_admin_bar_render');


function cmsms_show_msg($message, $msgclass = 'info') {
	echo '<div id="message" class="' . $msgclass . '">' . $message . '</div>';
}


function cmsms_admin_msgs() {
	global $pagenow;
	
	$cmsms_settings_pg = (isset($_GET['page'])) ? strpos($_GET['page'], CMSMS_PAGE_BASENAME) : '';
	
	$set_errors = get_settings_errors(); 
	
	if ($pagenow == 'admin.php' && current_user_can('manage_options') && $cmsms_settings_pg !== false && !empty($set_errors)) {
		if ($set_errors[0]['code'] == 'settings_updated' && isset($_GET['settings-updated'])) {
			cmsms_show_msg('<p><strong>' . $set_errors[0]['message'] . '</strong></p>', 'updated');
		} else {
			foreach ($set_errors as $set_error) {
				cmsms_show_msg('<p class="setting-error-message" title="' . esc_attr($set_error['setting']) . '">' . $set_error['message'] . '</p>', 'error');
			}
		}
	}
}

add_action('admin_notices', 'cmsms_admin_msgs');


function cmsms_add_global_options() {
	$cmsms_option_names = array( 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_general', 
			cmsms_options_general_fields('general') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_sidebar', 
			cmsms_options_general_fields('sidebar') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_sitemap', 
			cmsms_options_general_fields('sitemap') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_error', 
			cmsms_options_general_fields('error') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_lightbox', 
			cmsms_options_general_fields('lightbox') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_code', 
			cmsms_options_general_fields('code') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_wpml', 
			cmsms_options_general_fields('wpml') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_recaptcha', 
			'' 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_style_logo', 
			cmsms_options_style_fields('logo') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_style_bg', 
			cmsms_options_style_fields('bg') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_style_header', 
			cmsms_options_style_fields('header') 
		),
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_style_content', 
			cmsms_options_style_fields('content') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_style_footer', 
			cmsms_options_style_fields('footer') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_style_icon', 
			cmsms_options_style_fields('icon') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_font_content', 
			cmsms_options_font_fields('content') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_font_link', 
			cmsms_options_font_fields('link') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_font_nav', 
			cmsms_options_font_fields('nav') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_font_heading', 
			cmsms_options_font_fields('heading') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_font_other', 
			cmsms_options_font_fields('other') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_single_post', 
			cmsms_options_single_fields('post') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_single_project', 
			cmsms_options_single_fields('project') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_single_profile', 
			cmsms_options_single_fields('profile') 
		), 
		array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_single_campaign', 
			cmsms_options_single_fields('campaign') 
		) 
	);
	
	foreach (cmsms_all_color_schemes_list() as $key => $value) {
		array_push($cmsms_option_names, array( 
			'cmsms_options_' . CMSMS_SHORTNAME . '_color_' . $key, 
			cmsms_options_color_fields($key) 
		));
	}
	
	foreach ($cmsms_option_names as $cmsms_option_name) {
		$start_options = array();
		
		if ($cmsms_option_name[1] !== '') {
			foreach ($cmsms_option_name[1] as $selected_option) {
				if ( 
					is_array($selected_option['std']) && 
					$selected_option['id'] !== CMSMS_SHORTNAME . '_social_icons' 
				) {
					foreach ($selected_option['std'] as $key => $value) {
						$start_options[$selected_option['id'] . '_' . $key] = $value;
					}
				} else {
					$start_options[$selected_option['id']] = $selected_option['std'];
				}
			}
			
			if (count($start_options) == 1) {
				foreach ($start_options as $key => $val) {
					if (empty($val)) {
						$start_options_val = '';
					} else {
						$start_options_val = $start_options;
					}
				}
			} else {
				$start_options_val = $start_options;
			}
		} else {
			$start_options_val = '';
		}
		
		if (get_option($cmsms_option_name[0]) == false) {
			add_option($cmsms_option_name[0], $start_options_val, '', 'yes');
		}
	}
}


function cmsms_get_global_options() {
	$cmsms_option = array();
	
	$cmsms_option_names = array( 
		'cmsms_options_' . CMSMS_SHORTNAME . '_general', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_sidebar', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_sitemap', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_error', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_lightbox', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_code', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_recaptcha', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_style_logo', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_style_bg', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_style_header', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_style_content', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_style_footer', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_style_icon', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_font_content', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_font_link', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_font_nav', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_font_heading', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_font_other', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_single_post', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_single_project', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_single_profile', 
		'cmsms_options_' . CMSMS_SHORTNAME . '_single_campaign'
	);
	
	foreach (cmsms_all_color_schemes_list() as $key => $value) {
		array_push($cmsms_option_names, 'cmsms_options_' . CMSMS_SHORTNAME . '_color_' . $key);
	}
	
	foreach ($cmsms_option_names as $cmsms_option_name) {
		if (get_option($cmsms_option_name) != false) {
			$option = get_option($cmsms_option_name);
			
			$cmsms_option = array_merge($cmsms_option, $option);
		}
	}
	
	return $cmsms_option;
}

