<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Contact Form Builder
 * @version 	1.2.5
 * 
 * Contact Form Shortcode reCAPTCHA Validator
 * Changed by CMSMasters
 * 
 */


$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);

require_once($parse_uri[0] . 'wp-load.php');


require_once(CMSMS_FORM_BUILDER_PATH . 'inc/recaptchalib.php');


$current_theme = get_option('template');

$recaptcha_private_key = get_option('cmsms_options_' . $current_theme . '_recaptcha_private_key');


$resp = recaptcha_check_answer($recaptcha_private_key, $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);


if (!$resp->is_valid) {
	echo 'error';
} else {
	echo 'success';
}

