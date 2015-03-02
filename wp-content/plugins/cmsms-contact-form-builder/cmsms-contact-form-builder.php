<?php 
/*
Plugin Name: CMSMasters Contact Form Builder
Plugin URI: http://cmsmasters.net/
Description: CMSMasters Contact Form Builder created by <a href="http://cmsmasters.net/" title="CMSMasters">CMSMasters</a> team. Contact form plugin with visual form builder create form shortcode & widget for <a href="http://themeforest.net/user/cmsmasters/portfolio" title="cmsmasters">cmsmasters</a> WordPress themes.
Version: 1.2.5
Author: cmsmasters
Author URI: http://cmsmasters.net/
*/

/*  Copyright 2014 CMSMasters (email : cmsmstrs@gmail.com). All Rights Reserved.
	
	This software is distributed exclusively as appendant 
	to Wordpress themes, created by CMSMasters studio and 
	should be used in strict compliance to the terms, 
	listed in the License Terms & Conditions included 
	in software archive.
	
	If your archive does not include this file, 
	you may find the license text by url 
	http://cmsmasters.net/files/license/cmsms-contact-form-builder/license.txt 
	or contact CMSMasters Studio at email 
	copyright.cmsmasters@gmail.com 
	about this.
	
	Please note, that any usage of this software, that 
	contradicts the license terms is a subject to legal pursue 
	and will result copyright reclaim and damage withdrawal.
*/


class Cmsms_Form_Builder {
	var $form_handle = 'form-builder';
	
	
	function __construct() { 
		define('CMSMS_FORM_BUILDER_VERSION', '1.2.5');
		
		define('CMSMS_FORM_BUILDER_PATH', plugin_dir_path(__FILE__));
		
		define('CMSMS_FORM_BUILDER_URL', plugin_dir_url(__FILE__));
		
		
		require_once(CMSMS_FORM_BUILDER_PATH . 'inc/form-builder-posttype.php');
		
		
		require_once(CMSMS_FORM_BUILDER_PATH . 'inc/form-builder-shortcode.php');
		
		require_once(CMSMS_FORM_BUILDER_PATH . 'inc/form-builder-widget.php');
		
		
		add_action('admin_enqueue_scripts', array($this, 'form_builder_admin_scripts'));
		
		
		add_action('wp_enqueue_scripts', array($this, 'form_builder_scripts'));
		
		
		add_action('admin_menu', array($this, 'cmsmasters_enable_form_builder'));
		
		// Load Plugin Local File
		load_plugin_textdomain('cmsms_form_builder', false, dirname(plugin_basename(__FILE__)) . '/languages/');
	}
	
	
	function form_builder_admin_scripts() {
		wp_register_style('cmsms_form_builder_css', CMSMS_FORM_BUILDER_URL . 'css/cmsms-contact-form-builder.css', array(), CMSMS_FORM_BUILDER_VERSION, 'screen');
		
		wp_register_style('cmsms_form_builder_css_rtl', CMSMS_FORM_BUILDER_URL . 'css/cmsms-contact-form-builder-rtl.css', array(), CMSMS_FORM_BUILDER_VERSION, 'screen');
		
		
		wp_register_script('cmsms_form_builder_js', CMSMS_FORM_BUILDER_URL . 'js/cmsms-contact-form-builder.js', array('jquery', 'jquery-ui-sortable'), CMSMS_FORM_BUILDER_VERSION, true);
		
		wp_localize_script('cmsms_form_builder_js', 'cmsms_fb', array( 
			'enter_form_name' => 		__('Enter Form Name!', 'cmsms_form_builder'), 
			'enter_mess_text' => 		__('Enter your message text!', 'cmsms_form_builder'), 
			'enter_mess_subj' => 		__('Enter your message subject text!', 'cmsms_form_builder'), 
			'enter_success_text' => 	__('Enter the text about your message successfully sending!', 'cmsms_form_builder'), 
			'enter_submit_text' => 		__('Enter the contact form submit button text!', 'cmsms_form_builder'), 
			'enter_field_labels' => 	__('Please fill all field labels!', 'cmsms_form_builder'), 
			'enter_field_options' => 	__('Please fill all field options!', 'cmsms_form_builder'), 
			'error_on_page' => 			__('Error on page! Please reload page and try again.', 'cmsms_form_builder'), 
			'form_name_exists' => 		__('Form with this name already exists, try another name.', 'cmsms_form_builder'), 
			'form_saving_error' => 		__('Form saving error was detected! Please try again.', 'cmsms_form_builder'), 
			'save_form_as' => 			__("It is no form with this name in your database. \nSave this form as", 'cmsms_form_builder'), 
			'new_form_name' => 			__('Please enter new form name.', 'cmsms_form_builder'), 
			'form_name_invalid' => 		__('Form name is invalid.', 'cmsms_form_builder'), 
			'cmsms_text' => 			__('Text', 'cmsms_form_builder'), 
			'cmsms_field_label' => 		__('Field Label', 'cmsms_form_builder'), 
			'cmsms_required' => 		__('Required', 'cmsms_form_builder'), 
			'cmsms_row' => 				__('New Row', 'cmsms_form_builder'), 
			'cmsms_field_descr' => 		__('Field Description', 'cmsms_form_builder'), 
			'cmsms_field_opts' => 		__('Field Options', 'cmsms_form_builder'), 
			'cmsms_min_text_size' => 	__('Min text size', 'cmsms_form_builder'), 
			'cmsms_max_text_size' => 	__('Max text size', 'cmsms_form_builder'), 
			'cmsms_choose_width' => 	__('Choose field width', 'cmsms_form_builder'),
			'cmsms_choose_verif' => 	__('Choose verification', 'cmsms_form_builder'),
			'cmsms_email' => 			__('Email', 'cmsms_form_builder'),
			'cmsms_url' => 				__('URL', 'cmsms_form_builder'),
			'cmsms_number' => 			__('Number', 'cmsms_form_builder'),
			'cmsms_only_nb_sp' => 		__('Only Numbers & Spaces', 'cmsms_form_builder'),
			'cmsms_only_lt_sp' => 		__('Only Letters & Spaces', 'cmsms_form_builder'),
			'cmsms_items' => 			__('Items', 'cmsms_form_builder'),
			'cmsms_label' => 			__('Label', 'cmsms_form_builder'),
			'cmsms_thank_you' => 		__("Thank You! \nYour message has been sent successfully.", 'cmsms_form_builder'),
			'cmsms_form_subj' => 		__('Form Subject', 'cmsms_form_builder'),
			'your_mess_text' => 		__('Your message text...', 'cmsms_form_builder'),
			'form_del_error' => 		__("Form deleting error was detected! \nIt is no such form in your database.", 'cmsms_form_builder'),
			'del_the_form_first' => 	__('Are you sure you want to delete the form', 'cmsms_form_builder'),
			'del_the_form_last' => 		__('and all the fields it contains?', 'cmsms_form_builder'),
			'please_choose_form' => 	__('Please choose form!', 'cmsms_form_builder'),
			'want_to_proceed' => 		__("All unsaved changes will be lost! \nDo you want to proceed?", 'cmsms_form_builder'),
			'error_was_detect' => 		__("Error was detected! \nIt is no such form in your database.", 'cmsms_form_builder'),
			'cmsms_form_name' => 		__('Form Name', 'cmsms_form_builder'),
			'cmsms_drag_and_drop' => 	__('Drag & Drop to change fields order', 'cmsms_form_builder'),
			'add_remove_edit' => 		__('Add / Remove / Edit Fields', 'cmsms_form_builder'),
			'add_new_field' => 			__('Add New Field', 'cmsms_form_builder'),
			'cmsms_text_field' => 		__('Text Field', 'cmsms_form_builder'),
			'cmsms_email_field' => 		__('Email Field', 'cmsms_form_builder'),
			'cmsms_text_area' => 		__('Text Area', 'cmsms_form_builder'),
			'cmsms_dropdown' => 		__('Dropdown', 'cmsms_form_builder'),
			'cmsms_radiobuttons' => 	__('Radiobuttons', 'cmsms_form_builder'),
			'cmsms_checkbox' => 		__('Checkbox', 'cmsms_form_builder'),
			'cmsms_checkboxes' => 		__('Checkboxes', 'cmsms_form_builder'),
			'cmsms_mess_comp' => 		__('Message Composer', 'cmsms_form_builder'),
			'the_mess_subj' => 			__('The Message Subject', 'cmsms_form_builder'),
			'the_mess_button' => 		__('Submit Button Text', 'cmsms_form_builder'),
			'cmsms_form_button' => 		__('Send Message', 'cmsms_form_builder'),
			'success_send_text' => 		__('The Message About Succesful Sending Text', 'cmsms_form_builder'),
			'cmsms_use_captcha' => 		__('Use CAPTCHA', 'cmsms_form_builder'),
			'add_reset_button' => 		__('Add Reset Button', 'cmsms_form_builder'),
			'cmsms_save_form' => 		__('Save Form', 'cmsms_form_builder'),
			'cmsms_loading' => 			__('Loading', 'cmsms_form_builder'),
			'form_not_saved' => 		__('Form not saved! Form name is invalid.', 'cmsms_form_builder'),
			'enter_valid_number' => 	__('Please enter valid number.', 'cmsms_form_builder'),
			'choose_field_type' => 		__('Please choose field type!', 'cmsms_form_builder'),
			'del_this_field' => 		__('Are you sure you want to delete this field?', 'cmsms_form_builder'),
			'field_del_error' => 		__("Field deleting error was detected! \nIt is no such field in your database.", 'cmsms_form_builder'),
			'del_this_option' => 		__('Are you sure you want to delete this option?', 'cmsms_form_builder'),
			'less_two_options' => 		__('Here can\'t be less than 2 options!', 'cmsms_form_builder'),
			'cmsms_field' => 			__('Field', 'cmsms_form_builder'),
			'settings_lost' => 			__("All unsaved changes will be lost! \nAre you sure you want to leave this page?", 'cmsms_form_builder')
		));
		
		
		if (isset($_GET['page']) && $_GET['page'] == $this->form_handle) {
			wp_enqueue_style('cmsms_form_builder_css');
			
			
			if (is_rtl()) {
				wp_enqueue_style('cmsms_form_builder_css_rtl');
			}
			
			
			wp_enqueue_script('jquery-ui-sortable');
			
			wp_enqueue_script('cmsms_form_builder_js');
		}
	}
	
	
	function form_builder_scripts() {
		if (!is_admin()) {
			wp_register_style('cmsms_contact_form_style', CMSMS_FORM_BUILDER_URL . 'css/contact-form-style.css', array(), CMSMS_FORM_BUILDER_VERSION, 'screen');
			
			wp_register_style('cmsms_contact_form_style_rtl', CMSMS_FORM_BUILDER_URL . 'css/contact-form-style-rtl.css', array(), CMSMS_FORM_BUILDER_VERSION, 'screen');
			
			
			wp_register_script('validator', CMSMS_FORM_BUILDER_URL . 'js/jquery.validationEngine.min.js', array('jquery'), '2.6.2', true);
			
			wp_register_script('validatorLanguage', CMSMS_FORM_BUILDER_URL . 'js/jquery.validationEngine-lang.js', array('jquery', 'validator'), CMSMS_FORM_BUILDER_VERSION, true);
			
			wp_localize_script('validatorLanguage', 'cmsms_ve', array( 
				'required' => 			__('* This field is required', 'cmsms_form_builder'), 
				'select_option' => 		__('* Please select an option', 'cmsms_form_builder'), 
				'required_checkbox' => 	__('* This checkbox is required', 'cmsms_form_builder'), 
				'min' => 				__('* Minimum', 'cmsms_form_builder'), 
				'allowed' => 			__(' characters allowed', 'cmsms_form_builder'), 
				'max' => 				__('* Maximum', 'cmsms_form_builder'), 
				'invalid_email' => 		__('* Invalid email address', 'cmsms_form_builder'), 
				'invalid_number' => 	__('* Invalid number', 'cmsms_form_builder'), 
				'invalid_url' => 		__('* Invalid URL', 'cmsms_form_builder'), 
				'numbers_spaces' => 	__('* Numbers and spaces only', 'cmsms_form_builder'), 
				'letters_spaces' => 	__('* Letters and spaces only', 'cmsms_form_builder') 
			));
		}
	}
	
	
	function form_builder_forms_list() {
		global $post;
		
		
		$admin_post_object = $post;
		
		
		$option_query = new WP_Query(array( 
			'orderby' => 			'name', 
			'order' => 				'ASC', 
			'post_type' => 			'cmsms_contact_form', 
			'posts_per_page' => 	-1 
		));
		
		
		$forms = array();
		
		
		if ($option_query->have_posts()) : 
			while ($option_query->have_posts() ) : $option_query->the_post();
				if (get_the_excerpt() == 'form') {
					$forms[get_the_ID()] = get_the_title();
				}
			endwhile;
		endif;
		
		
		wp_reset_query();
		
		
		$post = $admin_post_object;
		
		
		return $forms;
	}
	
	
	function cmsms_form_builder() {
	?>
		<div class="wrap" style="position:relative; overflow:hidden;">
			<?php screen_icon('themes'); ?>
			<h2 style="padding-top:12px;"><?php _e('Contact Form Builder', 'cmsms_form_builder'); ?></h2>
		</div>
		<div id="settings_save" class="updated fade below-h2 myadminpanel" style="display:none;"><p><strong><?php _e('Form settings succesfully saved.', 'cmsms_form_builder'); ?></strong></p></div>
		<div id="settings_error" class="error fade below-h2 myadminpanel" style="display:none;"><p><strong><?php _e('Form succesfully deleted.', 'cmsms_form_builder'); ?></strong></p></div>
		<div class="slider wrap">
			<div class="bot">
				<div class="rght form_builder_mp">
					<form method="post" action="" id="adminoptions_form">
						<div id="form_choose_tab" class="tabb top">
							<table class="form-table cmsmasters-options">
								<tr>
									<td>
										<input type="hidden" name="loader_image_url" value="<?php echo CMSMS_FORM_BUILDER_URL; ?>" />
										<button class="button add" type="button" name="add_form"><span class="dashicons-plus"></span><?php _e('Add New', 'cmsms_form_builder'); ?></button>
										<input class="button" type="button" name="cancel_form" value="<?php _e('Cancel', 'cmsms_form_builder'); ?>" />
										<div class="fr submit_loader spinner"></div>
										<select id="form_choose" class="fl">
											<option value=""><?php _e('Select your form here', 'cmsms_form_builder'); ?></option>
										<?php
											$forms_array = $this->form_builder_forms_list();
											
											
											if (!empty($forms_array)) {
												foreach ($forms_array as $key => $value) {
													echo '<option value="' . $key . '">' . $value . '</option>';
												}
											}
										?>
										</select>
										<button class="button edit fl" type="button" name="edit_form"><span class="dashicons-edit"></span><?php _e('Edit', 'cmsms_form_builder'); ?></button>
										<div class="fl submit_loader spinner"></div>
										<div class="fl">
											<button class="button delete fl" type="button" name="delete_form"><span class="dashicons-post-trash"></span><?php _e('Delete', 'cmsms_form_builder'); ?></button>
											<div class="fl submit_loader spinner"></div>
										</div>
										<div class="fl">
											<input class="button" type="button" name="save_as_form" value="<?php _e('Save As...', 'cmsms_form_builder'); ?>" />
											<div class="fl submit_loader spinner"></div>
										</div>
									</td>
								</tr>
								<tr><td style="padding:0; margin:0;"></td></tr>
							</table>
						</div>
						<div class="clsep">
							<div id="form_build_tab" class="tabb bot"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php
	}
	
	
	function cmsmasters_enable_form_builder() {
		add_menu_page( 
			__('Form Builder', 'cmsms_form_builder'), 
			__('Form Builder', 'cmsms_form_builder'), 
			'manage_options', 
			$this->form_handle, 
			array($this, 'cmsms_form_builder'), 
			'dashicons-email-alt', 
			112 
		);
	}
}


global $frm_bldr;


$frm_bldr = new Cmsms_Form_Builder();

