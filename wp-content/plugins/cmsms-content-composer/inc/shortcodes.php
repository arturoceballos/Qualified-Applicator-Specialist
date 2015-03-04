<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.4.0
 * 
 * CMSMasters Custom Shortcodes
 * Created by CMSMasters
 * 
 */


/**
 * Section
 */
function cmsms_row($atts, $content = null) {
    extract(shortcode_atts(array( 
		'data_color' => 				'default', 
		'data_bg_color' => 				'', 
		'data_bg_img' => 				'', 
		'data_bg_position' => 			'top center', 
		'data_bg_repeat' => 			'no-repeat', 
		'data_bg_attachment' => 		'scroll', 
		'data_bg_size' => 				'auto', 
		'data_bg_parallax' => 			'', 
		'data_bg_parallax_ratio' => 	'0.5', 
		'data_color_overlay' => 		'', 
		'data_padding_top' => 			'', 
		'data_padding_bottom' => 		'', 
		'data_width' => 				'boxed', 
		'data_padding_left' => 			'', 
		'data_padding_right' => 		'', 
		'data_merge' => 				'', 
		'data_id' => 					'', 
		'data_classes' => 				'' 
    ), $atts));
	
	
	global $prev_out;
	
	
	$unique_id = uniqid();
	
	
	$out_style_start = '<style type="text/css"> ' . "\n";
	
	
	$out_style = '';
	
	
	$out_style_content = '';
	
	
	$data_bg_color_array = explode('|', $data_bg_color);
	
	
	if ( 
		$data_bg_img != '' || 
		($data_bg_color != '' && sizeof($data_bg_color_array) > 1) 
	) {
		$out_style .= '#cmsms_row_' . $unique_id . ' { ';
		
		
		if ($data_bg_color != '' && sizeof($data_bg_color_array) > 1) {
			$out_style .= "\n\t" . cmsms_color_css('background-color', $data_bg_color);
		}
		
		
		if ($data_bg_img != '') {
			$new_bg_img = explode('|', $data_bg_img);
			
			
			$new_bg_src = wp_get_attachment_image_src($new_bg_img[0], 'full');
			
			
			$out_style .= "\n\t" . 'background-image: url(' . $new_bg_src[0] . '); ' . 
			"\n\t" . 'background-position: ' . $data_bg_position . '; ' . 
			"\n\t" . 'background-repeat: ' . $data_bg_repeat . '; ' . 
			"\n\t" . 'background-attachment: ' . $data_bg_attachment . '; ' . 
			"\n\t" . 'background-size: ' . $data_bg_size . '; ' . 
			(($data_bg_attachment == 'fixed' && preg_match('/Safari/', $_SERVER['HTTP_USER_AGENT'])) ? "\n\t" . 'position: static; ' : '');
		}
		
		
		$out_style .= "\n" . '} ' . "\n\n";
	}
	
	
	if ($data_padding_top != '') {
		$out_style .= '#cmsms_row_' . $unique_id . ' .cmsms_row_outer_parent { ' . 
			"\n\t" . 'padding-top: ' . $data_padding_top . 'px; ' . 
		"\n" . '} ' . "\n\n";
	}
	
	
	if ($data_padding_bottom != '') {
		$out_style .= '#cmsms_row_' . $unique_id . ' .cmsms_row_outer_parent { ' . 
			"\n\t" . 'padding-bottom: ' . $data_padding_bottom . 'px; ' . 
		"\n" . '} ' . "\n\n";
	}
	
	
	if ($data_color_overlay != '') {
		$data_color_overlay_array = explode('|', $data_color_overlay);
		
		
		if (sizeof($data_color_overlay_array) > 1) {
			$out_style .= '#cmsms_row_' . $unique_id . ' .cmsms_row_overlay { ' .
				"\n\t" . cmsms_color_css('background-color', $data_color_overlay) . 
			"\n" . '} ' . "\n\n";
		}
	}
	
	
	if ($data_width == 'fullwidth') {
		if ($data_padding_left != '') {
			$out_style_content .= '#cmsms_row_' . $unique_id . ' .cmsms_row_inner.cmsms_row_fullwidth { ' . 
				"\n\t" . 'padding-left:' . $data_padding_left . '%; ' . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($data_padding_right != '') {
			$out_style_content .= '#cmsms_row_' . $unique_id . ' .cmsms_row_inner.cmsms_row_fullwidth { ' . 
				"\n\t" . 'padding-right:' . $data_padding_right . '%; ' . 
			"\n" . '} ' . "\n";
		}
	}
	
	
	$out_style_finish = '</style>';
	
	
	$out_start = '<div id="cmsms_row_' . $unique_id . '" class="cmsms_row cmsms_color_scheme_' . $data_color . 
	(($data_classes != '') ? ' ' . $data_classes : '') . 
	'"' . 
	(($data_bg_parallax != '') ? ' data-stellar-background-ratio="' . $data_bg_parallax_ratio . '"' : '') . 
	'>' . "\n" . 
		'<div' . 
		(($data_id != '') ? ' id="' . $data_id . '"' : '') . 
		' class="cmsms_row_outer_parent">' . "\n" . 
			(($data_color_overlay != '') ? '<div class="cmsms_row_overlay"></div>' . "\n" : '') . 
			'<div class="cmsms_row_outer">' . "\n";
	
	
	$out_content = $prev_out . 
		'<div class="cmsms_row_inner' . 
		(($data_width == 'fullwidth') ? ' cmsms_row_fullwidth' : '') . 
		'">' . "\n" . 
		'<div class="cmsms_row_margin">' . "\n" . 
			do_shortcode($content) . 
		'</div>' . "\n" . 
	'</div>' . "\n";
	
	
	$out_finish = '</div>' . "\n" . 
		'</div>' . "\n" . 
	'</div>' . "\n";
	
	
	$out = (($out_style != '' || $out_style_content != '') ? $out_style_start . $out_style . $out_style_content . $out_style_finish : '') . 
		$out_start . 
		$out_content . 
		$out_finish;
	
	
	if ($data_merge == 'true') {
		$prev_out = (($out_style_content != '') ? $out_style_start . $out_style_content . $out_style_finish : '') . 
			$out_content;
	} else {
		$prev_out = '';
		
		
		return $out;
	}
}

add_shortcode('cmsms_row', 'cmsms_row');



/**
 * Column
 */
function cmsms_column($atts, $content = null) {
//    print $content;
	
	
	extract(shortcode_atts(array( 
		'data_width' => 			'1/1', 
		'data_animation' => 		'', 
		'data_animation_delay' => 	'', 
		'data_classes' => 			'' 
    ), $atts));
	
	
	if ($data_width == '1/1') {
		$new_width = 'one_first';
	} elseif ($data_width == '3/4') {
		$new_width = 'three_fourth';
	} elseif ($data_width == '2/3') {
		$new_width = 'two_third';
	} elseif ($data_width == '1/2') {
		$new_width = 'one_half';
	} elseif ($data_width == '1/3') {
		$new_width = 'one_third';
	} elseif ($data_width == '1/4') {
		$new_width = 'one_fourth';
	}
	

    return cmsms_divpdel('<div class="cmsms_column ' . $new_width . 
	(($data_classes != '') ? ' ' . $data_classes : '') . 
	'"' . 
	(($data_animation != '') ? ' data-animation="' . $data_animation . '"' : '') . 
	(($data_animation != '' && $data_animation_delay != '') ? ' data-delay="' . $data_animation_delay . '"' : '') . 
	'>' . "\n" . 
		do_shortcode(wpautop($content, false)) . 
	'</div>' . "\n");
}

add_shortcode('cmsms_column', 'cmsms_column');



/**
 * Text Block
 */
function cmsms_text($atts, $content = null) {
    extract(shortcode_atts(array( 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ), $atts));
	
	
    return cmsms_divpdel('<div class="cmsms_text' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		do_shortcode(wpautop($content)) . 
	'</div>' . "\n");
}

add_shortcode('cmsms_text', 'cmsms_text');



/**
 * Notice
 */
function cmsms_notice($atts, $content = null) {
	$new_atts = apply_filters('cmsms_notice_atts_filter', array( 
		'type' => 				'cmsms_notice_success', 
		'icon' => 				'', 
		'close' => 				'', 
		'bg_color' => 			'', 
		'bd_color' => 			'', 
		'color' => 				'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
	) );
	
	
	$shortcode_name = 'notice';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	$out = '';
	
	
	if ($type == 'cmsms_notice_custom') {
		$out .= '<style type="text/css"> ' . "\n" . 
			'#cmsms_notice_' . $unique_id . ' { ' . 
				"\n\t" . cmsms_color_css('background-color', $bg_color) . 
				"\n\t" . cmsms_color_css('border-color', $bd_color) . 
				"\n\t" . cmsms_color_css('color', $color) . 
			"\n" . '} ' . "\n" . 
			'.cmsms_notice:before {' . "\n" . 
				"\n\t" . cmsms_color_css('color', $bd_color) . 
			"\n" . '}' . "\n" . 
		'</style>';
	}
	
	
    $out .= '<div id="cmsms_notice_' . $unique_id . '" class="cmsms_notice ' . $type . 
	(($icon != '') ? ' ' . $icon : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		(($close != '') ? '<a href="#" class="notice_close cmsms-icon-cancel-3"></a>' : '') . 
		'<div class="notice_icon"></div>' . "\n" . 
		cmsms_divpdel('<div class="notice_content">' . "\n" . 
			do_shortcode(wpautop($content)) . 
		'</div>' . "\n") . 
	'</div>' . "\n";
	
	
	return $out;
}

add_shortcode('cmsms_notice', 'cmsms_notice');



/**
 * Icon Box
 */
function cmsms_icon_box($atts, $content = null) {
    $new_atts = apply_filters('cmsms_icon_box_atts_filter', array( 
		'box_type' => 					'cmsms_icon_heading_left', 
		'title' => 						'', 
		'heading_type' => 				'h1', 
		'box_icon_type' => 				'icon', 
		'box_icon' => 					'cmsms-icon-heart-7', 
		'box_icon_number' => 			'1', 
		'box_icon_image' => 			'', 
		'box_icon_size' => 				'0', 
		'box_icon_space' => 			'50', 
		'box_icon_border_width' => 		'0', 
		'box_icon_border_radius' => 	'0', 
		'box_icon_color' => 			'', 
		'box_icon_bg_color' => 			'', 
		'box_icon_bd_color' => 			'', 
		'box_border_width' => 			'0', 
		'box_border_radius' => 			'0', 
		'box_color' => 					'', 
		'box_bg_color' => 				'', 
		'box_bd_color' => 				'', 
		'button_show' => 				'', 
		'button_title' => 				'', 
		'button_link' => 				'#', 
		'button_target' => 				'', 
		'button_style' => 				'', 
		'button_font_family' => 		'', 
		'button_font_size' => 			'', 
		'button_line_height' => 		'', 
		'button_font_weight' => 		'', 
		'button_font_style' => 			'', 
		'button_padding_hor' => 		'', 
		'button_border_width' => 		'', 
		'button_border_style' => 		'', 
		'button_border_radius' => 		'', 
		'button_bg_color' => 			'', 
		'button_text_color' => 			'', 
		'button_border_color' => 		'', 
		'button_bg_color_h' => 			'', 
		'button_text_color_h' => 		'', 
		'button_border_color_h' => 		'', 
		'button_icon' => 				'', 
		'animation' => 					'', 
		'animation_delay' => 			'', 
		'classes' => 					'' 
    ) );
	
	
	$shortcode_name = 'icon-box';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	if ($button_font_family != '') {
		$font_family_array = explode(':', $button_font_family);
		
		$font_family_name = "'" . $font_family_array[0] . "'";
		
		
		cmsms_theme_google_font($button_font_family, $font_family_array[0]);
	}
	
	
	if (
		$button_style != '' || 
		$button_font_family != '' || 
		$button_font_size != '' || 
		$button_line_height != '' || 
		$button_font_weight != '' || 
		$button_font_style != '' || 
		$button_padding_hor != '' || 
		$button_border_width != '' || 
		$button_border_style != '' || 
		$button_border_radius != '' || 
		$button_bg_color != '' || 
		$button_text_color != '' || 
		$button_border_color != '' || 
		$button_bg_color_h != '' || 
		$button_text_color_h != '' || 
		$button_border_color_h != '' 
	) {
		$button_custom_styles = 'true';
	} else {
		$button_custom_styles = 'false';
	}
	
	
	$out = '<style type="text/css"> ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . ' { ' . 
			(($box_border_width != '') ? "\n\t" . 'border-width:' . $box_border_width . 'px; ' : '') . 
			(((int) $box_border_radius > 0) ? "\n\t" . '-webkit-border-radius:' . $box_border_radius . '; ' . "\n\t" . 'border-radius:' . $box_border_radius . '; ' : '') . 
			(($box_color != '') ? "\n\t" . cmsms_color_css('color', $box_color) : '') . 
			(($box_bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $box_bg_color) : '') . 
			(($box_bd_color != '') ? "\n\t" . cmsms_color_css('border-color', $box_bd_color) : '') . 
		"\n" . '} ' . "\n\n" . 
		'#cmsms_icon_box_' . $unique_id . ':before, ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . ' .icon_box_heading:before { ' . 
			"\n\t" . 'font-size:' . $box_icon_size . 'px; ' . 
			"\n\t" . 'line-height:' . ((int) $box_icon_space - ((int) $box_icon_border_width * 2)) . 'px; ' . 
			"\n\t" . 'width:' . $box_icon_space . 'px; ' . 
			"\n\t" . 'height:' . $box_icon_space . 'px; ' . 
			"\n\t" . 'border-width:' . $box_icon_border_width . 'px; ' . 
			(((int) $box_icon_border_radius > 0) ? "\n\t" . '-webkit-border-radius:' . $box_icon_border_radius . '; ' . "\n\t" . 'border-radius:' . $box_icon_border_radius . '; ' : '') . 
			(($box_icon_color != '') ? "\n\t" . cmsms_color_css('color', $box_icon_color) : '') . 
			(($box_icon_bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $box_icon_bg_color) : '') . 
			(($box_icon_bd_color != '') ? "\n\t" . cmsms_color_css('border-color', $box_icon_bd_color) : '') . 
		"\n" . '} ' . "\n\n";
	
	
	if ( 
		$box_bg_color != '' || 
		( 
			$box_bd_color != '' && 
			((int) $box_border_width > 0) 
		) 
	) {
		$out .= '#cmsms_icon_box_' . $unique_id . '.cmsms_icon_heading_left, ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . '.cmsms_icon_top, ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_left_top { ' . 
			"\n\t" . 'padding:30px 20px; ' . 
		'} ' . "\n\n" . 
		'#cmsms_icon_box_' . $unique_id . '.cmsms_icon_top:before { ' . 
			"\n\t" . 'top:30px;' . 
		'} ' . "\n\n";
	}
	
	
	if ($box_color != '') {
		$out .= '#cmsms_icon_box_' . $unique_id . ' a:not(.cmsms_button), ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . ' a:not(.cmsms_button):hover, ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . ' h1, ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . ' h2, ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . ' h3, ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . ' h4, ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . ' h5, ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . ' h6 { ' . 
			"\n\t" . cmsms_color_css('color', $box_color) . 
		'} ' . "\n\n" . 
		'#cmsms_icon_box_' . $unique_id . ' a:not(.cmsms_button) { ' . "\n" . 
			"\n\t" . 'text-decoration:underline;' . 
		'} ' . "\n\n" . 
		'#cmsms_icon_box_' . $unique_id . ' a:not(.cmsms_button):hover { ' . "\n" . 
			"\n\t" . 'text-decoration:none;' . 
		'} ' . "\n\n";
	}
	
	
	if ($box_type == 'cmsms_icon_top' || $box_type == 'cmsms_icon_box_top') {
		$out .= '#cmsms_icon_box_' . $unique_id . ' { ' . 
			"\n\t" . 'padding-top:' . ((int) $box_icon_space + 30) . 'px; ' . 
		'} ' . "\n\n" . 
		'#cmsms_icon_box_' . $unique_id . ':before, ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . ' .icon_box_heading:before { ' . 
			"\n\t" . 'margin-left:-' . ((int) $box_icon_space / 2) . 'px; ' . 
		"\n\t" . '} ' . "\n\n";
	}
	
	
	if ($box_type == 'cmsms_icon_top') {
		$out .= '#cmsms_icon_box_' . $unique_id . '.cmsms_icon_top { ' . 
			"\n\t" . 'padding-top:' . ((int) $box_icon_space + 60) . 'px; ' . 
		"\n\t" . '} ' . "\n\n";
	}
	
	
	if ($box_type == 'cmsms_icon_box_top') {
		$out .= '#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_top { ' . 
			"\n\t" . 'padding-top:' . ((int) $box_icon_space - ((int) $box_icon_space / 2) + 30) . 'px; ' . 
			"\n\t" . 'margin-top:' . ((int) $box_icon_space / 2) . 'px; ' . 
		"\n\t" . '} ' . "\n\n" . 
		'#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_top:before { ' . 
			"\n\t" . 'top:-' . ((int) $box_icon_space / 2) . 'px; ' . 
		"\n\t" . '} ' . "\n\n";
	}
	
	
	if ($box_type == 'cmsms_icon_box_left' || $box_type == 'cmsms_icon_box_left_top') {
		if (!is_rtl()) {
			$out .= '#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_left, ' . "\n" . 
			'#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_left_top { ' . 
				"\n\t" . 'padding-left:' . ((int) $box_icon_space - ((int) $box_icon_space / 2) + 30) . 'px; ' . 
				"\n\t" . 'margin-left:' . ((int) $box_icon_space / 2) . 'px; ' . 
			"\n\t" . '} ' . "\n\n" . 
			'#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_left:before, ' . "\n" . 
			'#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_left_top:before { ' . 
				"\n\t" . 'left:-' . ((int) $box_icon_space / 2) . 'px; ' . 
			"\n\t" . '} ' . "\n\n";
		} else {
			$out .= '#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_left, ' . "\n" . 
			'#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_left_top { ' . 
				"\n\t" . 'padding-right:' . ((int) $box_icon_space - ((int) $box_icon_space / 2) + 30) . 'px; ' . 
				"\n\t" . 'margin-right:' . ((int) $box_icon_space / 2) . 'px; ' . 
			"\n\t" . '} ' . "\n\n" . 
			'#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_left:before, ' . "\n" . 
			'#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_left_top:before { ' . 
				"\n\t" . 'right:-' . ((int) $box_icon_space / 2) . 'px; ' . 
			"\n\t" . '} ' . "\n\n";
		}
	}
	
	
	if ($box_type == 'cmsms_icon_box_left') {
		$out .= '#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_left:before { ' . 
			"\n\t" . 'margin-top:-' . ((int) $box_icon_space / 2) . 'px; ' . 
		"\n\t" . '} ' . "\n\n";
	}
	
	
	if ( 
		$box_type == 'cmsms_icon_box_left_top' && 
		( 
			$box_bg_color != '' || 
			( 
				$box_bd_color != '' && 
				((int) $box_border_width > 0) 
			) 
		) 
	) {
		$out .= '#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_left_top { ' . 
			"\n\t" . 'padding-top:' . ((int) $box_icon_space - ((int) $box_icon_space / 2)) . 'px; ' . 
			"\n\t" . 'margin-top:' . ((int) $box_icon_space / 2) . 'px; ' . 
		"\n\t" . '} ' . "\n\n" . 
		'#cmsms_icon_box_' . $unique_id . '.cmsms_icon_box_left_top:before { ' . 
			"\n\t" . 'margin-top:-' . ((int) $box_icon_space / 2) . 'px; ' . 
		"\n\t" . '} ' . "\n\n";
	}
	
	
	if ($box_icon_type == 'image' && $box_icon_image != '') {
		$image_id = explode('|', $box_icon_image);
		
		
		if (is_numeric($image_id[0]) && is_array(wp_get_attachment_image_src($image_id[0], 'full'))) {
			$image_url_src = wp_get_attachment_image_src($image_id[0], 'full');
		
			$image_url = $image_url_src[0];
		} else if ($image_id[0] != '') {
			$image_url = $image_id[0];
		} else {
			$image_url = $image_id[1];
		}
		
		
		$out .= '#cmsms_icon_box_' . $unique_id . ':before, ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . '.cmsms_icon_heading_left .icon_box_heading:before { ' . 
			"\n\t" . "content:''; " . 
			"\n\t" . 'background-image:url(' . $image_url . '); ' . 
		"\n" . '} ' . "\n";
	}
	
	
	if ($box_icon_type == 'number') {
		$out .= '#cmsms_icon_box_' . $unique_id . ':before, ' . "\n" . 
		'#cmsms_icon_box_' . $unique_id . '.cmsms_icon_heading_left .icon_box_heading:before { ' . 
			"\n\t" . "content:'" . $box_icon_number . "'; " . 
		"\n" . '} ' . "\n";
	}
	
	
	if ($button_show == 'true') {
		$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button:before { ' . 
			"\n\t" . 'margin-right:' . (($button_title != '') ? '.5em; ' : '0;') . 
			"\n\t" . 'margin-left:0; ' . 
			"\n\t" . 'vertical-align:baseline; ' . 
		"\n" . '} ' . "\n\n";
		
		
		if ($button_custom_styles == 'true') {
			$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button { ' . 
				(($button_font_family != '') ? "\n\t" . 'font-family:' . str_replace('+', ' ', $font_family_name) . '; ' : '') . 
				(($button_font_size != '') ? "\n\t" . 'font-size:' . $button_font_size . 'px; ' : '') . 
				(($button_line_height != '') ? "\n\t" . 'line-height:' . $button_line_height . 'px; ' : '') . 
				(($button_font_weight != '') ? "\n\t" . 'font-weight:' . $button_font_weight . '; ' : '') . 
				(($button_font_style != '') ? "\n\t" . 'font-style:' . $button_font_style . '; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-right:' . $button_padding_hor . 'px; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-left:' . $button_padding_hor . 'px; ' : '') . 
				(($button_border_width != '') ? "\n\t" . 'border-width:' . $button_border_width . 'px; ' : '') . 
				(($button_border_style != '') ? "\n\t" . 'border-style:' . $button_border_style . '; ' : '') . 
				(($button_border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $button_border_radius . '; ' . "\n\t" . 'border-radius:' . $button_border_radius . '; ' : '') . 
				(($button_bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color) : '') . 
				(($button_text_color != '') ? "\n\t" . cmsms_color_css('color', $button_text_color) : '') . 
				(($button_border_color != '') ? "\n\t" . cmsms_color_css('border-color', $button_border_color) : '') . 
			"\n" . '} ' . "\n";
			
			$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button:hover { ' . 
				(($button_bg_color_h != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color_h) : '') . 
				(($button_text_color_h != '') ? "\n\t" . cmsms_color_css('color', $button_text_color_h) : '') . 
				(($button_border_color_h != '') ? "\n\t" . cmsms_color_css('border-color', $button_border_color_h) : '') . 
			"\n" . '} ' . "\n";
			
			
			if ($button_style != '') {
				if (
					$button_style == 'cmsms_but_bg_slide_left' || 
					$button_style == 'cmsms_but_bg_slide_right' || 
					$button_style == 'cmsms_but_bg_slide_top' || 
					$button_style == 'cmsms_but_bg_slide_bottom' || 
					$button_style == 'cmsms_but_bg_expand_vert' || 
					$button_style == 'cmsms_but_bg_expand_hor' || 
					$button_style == 'cmsms_but_bg_expand_diag' 
				) {
					if ($button_bg_color != '') {
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_left:hover, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_right:hover, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_top:hover, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_bottom:hover, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_vert:hover, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_hor:hover, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_diag:hover { ' . 
							"\n\t" . cmsms_color_css('background-color', $button_bg_color) . 
						"\n" . '} ' . "\n";
					}
					
					if ($button_bg_color_h != '') {
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_left:after, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_right:after, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_top:after, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_bottom:after, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_vert:after, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_hor:after, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_diag:after { ' . 
							"\n\t" . cmsms_color_css('background-color', $button_bg_color_h) . 
						"\n" . '} ' . "\n";
					}
				}
				
				
				if (
					$button_style == 'cmsms_but_icon_dark_bg' || 
					$button_style == 'cmsms_but_icon_light_bg' || 
					$button_style == 'cmsms_but_icon_divider' || 
					$button_style == 'cmsms_but_icon_inverse' 
				) {
					$but_icon_pad = ($button_padding_hor != '' ? $button_padding_hor : '20') + ($button_line_height != '' ? $button_line_height : '40');
					
					if ($button_padding_hor != '' || $button_line_height != '') {
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_dark_bg, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_light_bg, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider, ' .  
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse { ' . 
							"\n\t" . 'padding-left:' . $but_icon_pad . 'px; ' . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_dark_bg:before, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_light_bg:before, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:before, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:before, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_dark_bg:after, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_light_bg:after, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:after, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:after { ' . 
							"\n\t" . 'width:' . $button_line_height . 'px; ' . 
						"\n" . '} ' . "\n";
					}
					
					
					if ($button_border_color != '' || $button_border_color_h != '') {
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:after { ' . 
							"\n\t" . cmsms_color_css('border-color', $button_border_color) . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:hover:after { ' . 
							"\n\t" . cmsms_color_css('border-color', $button_border_color_h) . 
						"\n" . '} ' . "\n";
					}
					
					
					if ($button_style == 'cmsms_but_icon_inverse') {
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:before { ' . 
							(($button_text_color_h != '') ? "\n\t" . cmsms_color_css('color', $button_text_color_h) : '') . 
						"\n" . '} ' . "\n";
					
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:after { ' . 
							(($button_bg_color_h != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color_h) : '') . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:hover:before { ' . 
							(($button_text_color != '') ? "\n\t" . cmsms_color_css('color', $button_text_color) : '') . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:hover:after { ' . 
							(($button_bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color) : '') . 
						"\n" . '} ' . "\n";
					}
				}
				
				
				if (
					$button_style == 'cmsms_but_icon_slide_left' || 
					$button_style == 'cmsms_but_icon_slide_right' 
				) {
					if ($button_padding_hor != '') {
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_left, ' . 
						'#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_right { ' . 
							"\n\t" . 'padding-left:' . ($button_padding_hor * 2) . 'px; ' . 
							"\n\t" . 'padding-right:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_left:before { ' . 
							"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
							"\n\t" . 'left:-' . ($button_padding_hor * 2) . 'px; ' . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_left:hover:before { ' . 
							"\n\t" . 'left:0; ' . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_right:before { ' . 
							"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
							"\n\t" . 'right:-' . ($button_padding_hor * 2) . 'px; ' . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsms_icon_box_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_right:hover:before { ' . 
							"\n\t" . 'right:0; ' . 
						"\n" . '} ' . "\n";
					}
				}
			}
		}
	}
	
	
	$box_icon = ($box_icon_type == 'icon') ? $box_icon : '';
	
	
	$out .= '</style>' . "\n" . 
	'<div id="cmsms_icon_box_' . $unique_id . '" class="cmsms_icon_box ' . $box_type . ' box_icon_type_' . $box_icon_type . 
	(($box_type != 'cmsms_icon_heading_left') ? ' ' . $box_icon : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		'<div class="icon_box_inner">' . "\n" . 
			'<' . $heading_type . ' class="icon_box_heading' . (($box_type == 'cmsms_icon_heading_left') ? ' ' . $box_icon  . '' : '') . '">' . $title . '</' . $heading_type . '>' . "\n" . 
			cmsms_divpdel('<div class="icon_box_text">' . "\n" . 
				do_shortcode(wpautop($content)) . 
			'</div>' . "\n");
	
	
	if ($button_show == 'true') {
		$out .= '<a href="' . $button_link . '" class="cmsms_button icon_box_button' . 
		(($button_style != '') ? ' cmsms_but_clear_styles ' . $button_style : '') . 
		(($button_icon != '') ? ' ' . $button_icon : '') . 
		'"' . 
		(($button_target == 'blank') ? ' target="_blank"' : '') . 
		'><span>' . $button_title . '</span></a>' . "\n";
	}
	
	
	$out .= '</div>' . "\n" . 
	'</div>' . "\n";
	
	
	return $out;
}

add_shortcode('cmsms_icon_box', 'cmsms_icon_box');



/**
 * Featured Block
 */
function cmsms_featured_block($atts, $content = null) {
	$new_atts = apply_filters('cmsms_featured_block_atts_filter', array( 
		'text_width' => 		'100', 
		'text_position' => 		'center', 
		'text_padding' => 		'', 
		'text_align' => 		'left', 
		'color_overlay' => 		'', 
		'fb_bg_color' => 		'', 
		'bg_img' => 			'', 
		'bg_position' => 		'', 
		'bg_repeat' => 			'', 
		'bg_attachment' => 		'', 
		'bg_size' => 			'', 
		'top_padding' => 		'', 
		'bottom_padding' => 	'', 
		'border_radius' => 		'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
	) );
	
	
	$shortcode_name = 'featured-block';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	$out = '<style type="text/css"> ' . "\n\n";
	
	if ( 
		$top_padding != '' || 
		$bottom_padding != '' || 
		$border_radius != '' || 
		$fb_bg_color != '' || 
		$bg_img != '' 
	) {
		$out .= '#cmsms_fb_' . $unique_id . ' { ' . 
			(($top_padding != '') ? "\n\t" . 'padding-top:' . $top_padding . 'px; ' : '') . 
			(($bottom_padding != '') ? "\n\t" . 'padding-bottom:' . $bottom_padding . 'px; ' : '') . 
			(($border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $border_radius . '; ' . "\n\t" . 'border-radius:' . $border_radius . '; ' : '') . 
			(($fb_bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $fb_bg_color) : '');
		
		
		if ($bg_img != '') {
			$new_bg_img = explode('|', $bg_img);
			
			
			$new_bg_src = wp_get_attachment_image_src($new_bg_img[0], 'full');
			
			
			$out .= "\n\t" . 'background-image: url(' . $new_bg_src[0] . '); ' . 
			"\n\t" . 'background-position: ' . $bg_position . '; ' . 
			"\n\t" . 'background-repeat: ' . $bg_repeat . '; ' . 
			"\n\t" . 'background-attachment: ' . $bg_attachment . '; ' . 
			"\n\t" . 'background-size: ' . $bg_size . '; ' . 
			(($bg_attachment == 'fixed' && preg_match('/Safari/', $_SERVER['HTTP_USER_AGENT'])) ? "\n\t" . 'position: static; ' : '');
		}
		
		
		$out .= "\n" . '} ' . "\n\n";
	}
	
	
	$out .= '#cmsms_fb_' . $unique_id . ' .featured_block_inner { ' . 
			"\n\t" . 'width: ' . $text_width . '%; ' . 
			"\n\t" . 'padding: ' . $text_padding . '; ' . 
			"\n\t" . 'text-align: ' . $text_align . '; ' . 
			(($text_position == 'center') ? "\n\t" . 'margin:0 auto; ' : "\n\t" . 'float:' . $text_position . '; ') . 
			(($color_overlay != '') ? "\n\t" . cmsms_color_css('background-color', $color_overlay) : '') . 
		"\n" . '} ' . "\n\n" . 
		'#cmsms_fb_' . $unique_id . ' .featured_block_text { ' . 
			"\n\t" . 'text-align: ' . $text_align . '; ' . 
		"\n" . '} ' . "\n\n" . 
	'</style>';
	
	
    $out .= '<div id="cmsms_fb_' . $unique_id . '" class="cmsms_featured_block' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		'<div class="featured_block_inner">' . "\n" . 
			cmsms_divpdel('<div class="featured_block_text">' . "\n" . 
				do_shortcode(wpautop($content)) . 
			'</div>' . "\n");
	
	
	$out .= '</div>' . "\n" . 
	'</div>' . "\n";
	
	
	return $out;
}

add_shortcode('cmsms_featured_block', 'cmsms_featured_block');



/**
 * Special Heading
 */
function cmsms_custom_heading($atts, $content = null) {
    $new_atts = apply_filters('cmsms_custom_heading_atts_filter', array( 
		'type' => 					'h1', 
		'font_family' => 			'', 
		'font_size' => 				'', 
		'line_height' => 			'', 
		'font_weight' => 			'400', 
		'font_style' => 			'normal', 
		'icon' => 					'', 
		'text_align' => 			'left', 
		'color' => 					'', 
		'bg_color' => 				'', 
		'link' => 					'', 
		'target' => 				'', 
		'margin_top' => 			'0', 
		'margin_bottom' => 			'0', 
		'border_radius' => 			'', 
		'divider' => 				'', 
		'divider_type' => 			'short', 
		'divider_height' => 		'1', 
		'divider_style' => 			'solid', 
		'divider_color' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'custom-heading';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	if ($font_family != '') {
		$font_family_array = str_replace('+', ' ', explode(':', $font_family));
		
		$font_family_name = "'" . $font_family_array[0] . "'";
		
		
		cmsms_theme_google_font($font_family, $font_family_array[0]);
	}
	
	
	$out = '<style type="text/css"> ' . "\n" . 
		'#cmsms_heading_' . $unique_id . ' { ' . 
			"\n\t" . 'text-align:' . $text_align . '; ' . 
			"\n\t" . 'margin-top:' . $margin_top . 'px; ' . 
			"\n\t" . 'margin-bottom:' . $margin_bottom . 'px; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsms_heading_' . $unique_id . ' .cmsms_heading { ' . 
			"\n\t" . 'text-align:' . $text_align . '; ' . 
			(($bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $bg_color) : '') . 
			(($bg_color != '') ? "\n\t" . 'padding-left:1em; ' : '') . 
			(($bg_color != '') ? "\n\t" . 'padding-right:1em; ' : '') . 
			(($divider != '' && $text_align != 'left') ? "\n\t" . 'margin-left:1em; ' : '') . 
			(($divider != '' && $text_align != 'right') ? "\n\t" . 'margin-right:1em; ' : '') . 
			(($border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $border_radius . '; ' . "\n\t" . 'border-radius:' . $border_radius . '; ' : '') . 
		"\n" . '} ' . "\n\n" . 
		'#cmsms_heading_' . $unique_id . ' .cmsms_heading, ' . 
		'#cmsms_heading_' . $unique_id . ' .cmsms_heading a { ' . 
			(($font_family != '') ? "\n\t" . 'font-family:' . $font_family_name . '; ' : '') . 
			(($font_size != '' && $font_size != '0') ? "\n\t" . 'font-size:' . $font_size . 'px; ' : '') . 
			(($line_height != '' && $line_height != '0') ? "\n\t" . 'line-height:' . $line_height . 'px; ' : '') . 
			"\n\t" . 'font-weight:' . $font_weight . '; ' . 
			"\n\t" . 'font-style:' . $font_style . '; ' . 
			(($color != '') ? "\n\t" . cmsms_color_css('color', $color) : '') . 
		"\n" . '} ' . "\n\n" . 
		'#cmsms_heading_' . $unique_id . ' .cmsms_heading_divider { ' . 
			(($divider != '') ? "\n\t" . 'border-bottom-width:' . $divider_height . 'px; ' : '') . 
			(($divider != '') ? "\n\t" . 'border-bottom-style:' . $divider_style . '; ' : '') . 
			(($divider != '' && $divider_color != '') ? "\n\t" . cmsms_color_css('border-bottom-color', $divider_color) : '') . 
			(($divider != '') ? "\n\t" . 'margin-top:-' . round((int) $divider_height / 2) . 'px; ' : '') . 
		"\n" . '} ' . "\n\n" . 
	'</style>' . "\n";
	
	
	$out .= '<div id="cmsms_heading_' . $unique_id . '" class="cmsms_heading_wrap cmsms_heading_align_' . $text_align . 
	(($divider != '') ? ' cmsms_heading_divider_' . $divider_type : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n\t";
	
	
	if ($divider != '' && $text_align != 'left') {
		$out .= '<span class="cmsms_heading_divider_left_wrap"><span class="cmsms_heading_divider cmsms_heading_divider_left"></span></span>' . "\n";
	}
	
	
	$out .= '<' . $type . ' class="cmsms_heading' . 
	(($icon != '' && $link == '') ? ' ' . $icon : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	if ($link != '') {
		$out .= '<a href="' . $link . '"' . 
		(($icon != '') ? ' class="' . $icon . '"' : '') . 
		(($target == 'blank') ? ' target="_blank"' : '') . 
		'>';
	}
	
	
	$out .= $content;
	
	
	if ($link != '') {
		$out .= '</a>';
	}
	
	
	$out .= '</' . $type . '>' . "\n";
	
	
	if ($divider != '' && $text_align != 'right') {
		$out .= '<span class="cmsms_heading_divider_right_wrap"><span class="cmsms_heading_divider cmsms_heading_divider_right"></span></span>' . "\n";
	}
	
	
	$out .= '</div>';
	
	
	return $out;
}

add_shortcode('cmsms_heading', 'cmsms_custom_heading');



/**
 * Dropcap
 */
function cmsms_dropcap($atts, $content = null) {
    $new_atts = apply_filters('cmsms_dropcap_atts_filter', array( 
		'type' => 		'type1', 
		'classes' => 	'' 
    ) );
	
	
	$shortcode_name = 'dropcap';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$out = '<div class="cmsms_dropcap ' . $type . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">' . $content . '</div>';
	
	
	return $out;
}

add_shortcode('cmsms_dropcap', 'cmsms_dropcap');



/**
 * Toggles
 */
function cmsms_toggles($atts, $content = null) {
    $new_atts = apply_filters('cmsms_toggles_atts_filter', array( 
		'mode' => 				'toggle', 
		'active' => 			'', 
		'sort' => 				'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'toggles';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $sort_toggles, 
		$toggle_active, 
		$toggle_counter;
	
	
	$sort_toggles = array();
	
	$toggle_active = (int) $active;
	
	$toggle_counter = 0;
	
	$toggles_filter = '';
	
	$toggles = do_shortcode($content);
	
	
	if ($sort == 'true') {
		$toggles_filter = '<div class="cmsms_toggles_filter">' . "\n\t" . 
			'<a href="#" data-key="all" title="' . __('All', 'cmsms_content_composer') . '" class="current_filter">' . __('All', 'cmsms_content_composer') . '</a>' . "\n";
		
		foreach ($sort_toggles as $sort_toggle_key => $sort_toggle_value) {
			$toggles_filter .= "\t" . ' / <a href="#" data-key="' . $sort_toggle_key . '" title="' . $sort_toggle_value . '">' . $sort_toggle_value . '</a>' . "\n";
		}
		
		$toggles_filter .= '</div>';
	}
	
	
	return '<div class="cmsms_toggles toggles_mode_' . $mode . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . 
		$toggles_filter . "\n" . 
		$toggles . 
	'</div>';
}

add_shortcode('cmsms_toggles', 'cmsms_toggles');

/**
 * Single Toggle
 */
function cmsms_toggle($atts, $content = null) {
    $new_atts = apply_filters('cmsms_toggle_atts_filter', array( 
		'title' => 		__('Title', 'cmsms_content_composer'), 
		'tags' => 		'', 
		'classes' => 	'' 
    ) );
	
	
	$shortcode_name = 'toggle';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $sort_toggles, 
		$toggle_active, 
		$toggle_counter;
	
	
	$toggle_counter++;
	
	
	$toggle_tags = explode(',', $tags);
	
	
	foreach ($toggle_tags as $toggle_tag) {
		if ($toggle_tag != '') {
			$sort_toggles[generateSlug(trim($toggle_tag), 30)] = trim($toggle_tag);
		}
	}
	
	
	$out = '<div class="cmsms_toggle_wrap' . 
	(($toggle_active == $toggle_counter) ? ' current_toggle' : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'" data-tags="all ';
	
	
	$tgl_tag_str = '';
	
	
	foreach ($toggle_tags as $tgl_tag) {
		$tgl_tag_str .= generateSlug(trim($tgl_tag), 30) . ' ';
	}
	
	
	$out .= substr($tgl_tag_str, 0, strlen($tgl_tag_str) - 1);
	
	
	$out .= '">' . "\n" . 
		'<div class="cmsms_toggle_title">' . "\n" . 
			'<span class="cmsms_toggle_plus">' . "\n" . 
				'<span class="cmsms_toggle_plus_hor"></span>' . "\n" . 
				'<span class="cmsms_toggle_plus_vert"></span>' . "\n" . 
			'</span>' . "\n" . 
			'<a href="#">' . $title . '</a>' . "\n" . 
		'</div>' . "\n" . 
		'<div class="cmsms_toggle">' . "\n" . 
			cmsms_divpdel('<div class="cmsms_toggle_inner">' . "\n" . 
				do_shortcode(wpautop($content)) . 
			'</div>' . "\n") . 
		'</div>' . "\n" . 
	'</div>';
	
	
	return $out;
}

add_shortcode('cmsms_toggle', 'cmsms_toggle');



/**
 * Tabs
 */
function cmsms_tabs($atts, $content = null) {
    $new_atts = apply_filters('cmsms_tabs_atts_filter', array( 
		'mode' => 				'tab', 
		'position' => 			'left', 
		'active' => 			'1', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'tabs';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $style_tab, 
		$out_tabs, 
		$tabs_mode, 
		$tab_active, 
		$tab_counter;
	
	
	$style_tab = '';
	
	$out_tabs = '';
	
	$tabs_mode = $mode;
	
	$tab_active = (int) $active;
	
	$tab_counter = 0;
	
	
	$tabs = do_shortcode($content);
	
	
	$out = (($style_tab != '') ? '<style type="text/css"> ' . $style_tab . '</style> ' . "\n" : '') . 
	'<div class="cmsms_tabs tabs_mode_' . $mode . 
	(($mode == 'tour') ? ' ' . 'tabs_pos_' . $position : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		'<ul class="cmsms_tabs_list">' . "\n" . 
			$out_tabs . 
		'</ul>' . "\n" . 
		'<div class="cmsms_tabs_wrap">' . "\n" . 
			$tabs . 
		'</div>' . "\n" . 
	'</div>';
	
	
	return $out;
}

add_shortcode('cmsms_tabs', 'cmsms_tabs');

/**
 * Single Tab
 */
function cmsms_tab($atts, $content = null) {
    $new_atts = apply_filters('cmsms_tab_atts_filter', array( 
		'title' => 			__('Title', 'cmsms_content_composer'), 
		'custom_colors' => 	'', 
		'bg_color' => 		'', 
		'icon' => 			'', 
		'classes' => 		'' 
    ) );
	
	
	$shortcode_name = 'tab';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $style_tab, 
		$out_tabs, 
		$tabs_mode, 
		$tab_active, 
		$tab_counter;
	
	
	$tab_counter++;
	
	if ($custom_colors == 'true') { 
		$style_tab .= "\n" . '#cmsms_tabs_list_item_' . $unique_id . ' a:hover,' . 
		'#cmsms_tabs_list_item_' . $unique_id . '.current_tab a { ' . 
			"\n\t" . cmsms_color_css('background-color', $bg_color) . 
			"\n\t" . cmsms_color_css('border-color', $bg_color) . 
		"\n" . '} ' . "\n";
	}
	
	
	$out_tabs .= '<li id="cmsms_tabs_list_item_' . $unique_id . '" class="cmsms_tabs_list_item' . 
	(($tab_active == $tab_counter) ? ' current_tab' : '') . 
	'">' . "\n" . 
		'<a href="#"' . 
		(($icon != '') ? ' class="' . $icon . '"' : '') . 
		'>' . "\n" . 
			'<span>' . $title . '</span>' . "\n" . 
		'</a>' . "\n" . 
	'</li>';
	
	
	return '<div id="cmsms_tab_' . $unique_id . '" class="cmsms_tab' . 
	(($tab_active == $tab_counter) ? ' active_tab' : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">' . "\n" . 
		cmsms_divpdel('<div class="cmsms_tab_inner">' . "\n" . 
			do_shortcode(wpautop($content)) . 
		'</div>' . "\n") . 
	'</div>';
}

add_shortcode('cmsms_tab', 'cmsms_tab');



/**
 * Icon List Items
 */
function cmsms_icon_list_items($atts, $content = null) {
    $new_atts = apply_filters('cmsms_icon_list_items_atts_filter', array( 
		'type' => 				'block', 
		'icon_type' => 			'icon', 
		'icon' => 				'cmsms-icon-thumbs-up-5', 
		'icon_size' => 			'0', 
		'heading' => 			'h4', 
		'items_color_type' => 	'border', 
		'border_width' => 		'10', 
		'border_radius' => 		'50%', 
		'unifier_width' => 		'0', 
		'position' => 			'left', 
		'icon_space' => 		'100', 
		'item_height' => 		'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'icon-list-items';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $style_item, 
		$out_inner, 
		$list_type, 
		$list_icon_type, 
		$list_icon, 
		$list_icon_size, 
		$list_heading, 
		$list_items_color_type, 
		$list_icon_space;
	
	
	$unique_id = uniqid();
	
	
	$list_type = $type;
	
	$list_icon_type = $icon_type;
	
	$list_icon = $icon;
	
	$list_icon_size = $icon_size;
	
	$list_heading = $heading;
	
	$list_items_color_type = $items_color_type;
	
	$list_icon_space = $icon_space;
	
	$style_item = '';
	
	$out_inner = '';
	
	
	if ($list_type == 'block') {
		if ($icon_type != 'icon' && $icon_type != 'image') {
			$style_item .= '#cmsms_icon_list_items_' . $unique_id . ' { ' . 
				"\n\t" . 'counter-reset:counter_' . $unique_id . '; ' . 
			"\n" . '} ' . "\n\n" . 
			'#cmsms_icon_list_items_' . $unique_id . ' .cmsms_icon_list_item { ' . 
				"\n\t" . 'counter-increment:counter_' . $unique_id . '; ' . 
			"\n" . '} ' . "\n\n" . 
			'#cmsms_icon_list_items_' . $unique_id . ' .cmsms_icon_list_item .cmsms_icon_list_icon:before { ' . 
				"\n\t" . 'content:counter(counter_' . $unique_id . ', ' . $icon_type . '); ' . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($position == 'left') {
			$style_item .= "\n" . '#cmsms_icon_list_items_' . $unique_id . '.cmsms_icon_list_items .cmsms_icon_list_item:before { ' . 
				"\n\t" . 'left:' . (((int) $icon_space / 2) - (((int) $unifier_width != 0) ? ($unifier_width / 2) : 0)) . 'px; ' . 
				"\n\t" . 'top:' . $icon_space  . 'px; ' . 
			"\n" . '} ' . "\n";
		} else {
			$style_item .= '#cmsms_icon_list_items_' . $unique_id . '.cmsms_icon_list_pos_right .cmsms_icon_list_item:before { ' . 
				"\n\t" . 'left:auto; ' . 
				"\n\t" . 'right:' . (((int) $icon_space / 2) - (((int) $unifier_width != 0) ? ($unifier_width / 2) : 0)) . 'px; ' . 
				"\n\t" . 'top:' . $icon_space  . 'px; ' . 
			"\n" . '} ' . "\n";
		}
		
		
		$style_item .= '#cmsms_icon_list_items_' . $unique_id . '.cmsms_icon_list_type_block .cmsms_icon_list_item:before { ' . 
			"\n\t" . 'width:' . $unifier_width . 'px; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsms_icon_list_items_' . $unique_id . ' .cmsms_icon_list_icon { ' . 
			"\n\t" . 'width:' . $icon_space . 'px; ' . 
			"\n\t" . 'height:' . $icon_space . 'px; ' . 
			"\n\t" . '-webkit-border-radius:' . $border_radius . '; ' . 
			"\n\t" . 'border-radius:' . $border_radius . '; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsms_icon_list_items_' . $unique_id . ' .cmsms_icon_list_icon:before { ' . 
			"\n\t" . 'font-size:' . $icon_size . 'px; ' . 
			"\n\t" . 'line-height:' . $icon_space . 'px; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsms_icon_list_items_' . $unique_id . ' .cmsms_icon_list_icon:after { ' . 
			"\n\t" . 'border-width:' . $border_width . 'px; ' . 
			"\n\t" . 'width:' . ((int) $icon_space + 2) . 'px; ' . 
			"\n\t" . 'height:' . ((int) $icon_space + 2) . 'px; ' . 
			"\n\t" . '-webkit-border-radius:' . $border_radius . '; ' . 
			"\n\t" . 'border-radius:' . $border_radius . '; ' . 
		"\n" . '} ' . "\n";
	} else {
		$style_item .= '#cmsms_icon_list_items_' . $unique_id . ' { ' . 
			"\n\t" . 'padding-left:' . ((int) $icon_size + 20) . 'px; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsms_icon_list_items_' . $unique_id . ' .cmsms_icon_list_item:before { ' . 
			"\n\t" . 'font-size:' . $icon_size . 'px; ' . 
			"\n\t" . 'left:-' . ((int) $icon_size + 20) . 'px; ' . 
		"\n" . '} ' . "\n";
		
		
		if ($item_height != '') {
			$style_item .= '#cmsms_icon_list_items_' . $unique_id . ' .cmsms_icon_list_item { ' . 
				"\n\t" . 'line-height:' . $item_height . 'px; ' . 
			"\n" . '} ' . "\n\n" . 
			'#cmsms_icon_list_items_' . $unique_id . ' .cmsms_icon_list_item:before { ' . 
				"\n\t" . 'line-height:' . ((int) $item_height - 2) . 'px; ' . 
			"\n" . '} ' . "\n";
		}
	}
	
	
	do_shortcode($content);
	
	
	$out = '<style type="text/css"> ' . $style_item . '</style> ' . "\n" . 
	'<ul id="cmsms_icon_list_items_' . $unique_id . '" class="cmsms_icon_list_items cmsms_icon_list_type_' . $type . ' cmsms_icon_list_pos_' . $position . ' cmsms_color_type_' . $items_color_type . 
	(($icon_type != 'icon' && $icon_type != 'image') ? ' cmsms_icon_list_icon_type_number' : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . 
		$out_inner . 
	'</ul>';
	
	
	return $out;
}

add_shortcode('cmsms_icon_list_items', 'cmsms_icon_list_items');

/**
 * Single Icon List Item
 */
function cmsms_icon_list_item($atts, $content = null) {
    $new_atts = apply_filters('cmsms_icon_list_item_atts_filter', array( 
		'icon' => 			'', 
		'image' => 			'', 
		'title' => 			__('Title', 'cmsms_content_composer'), 
		'color' => 			'', 
		'classes' => 		'' 
    ) );
	
	
	$shortcode_name = 'icon-list-item';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $style_item, 
		$out_inner, 
		$list_type, 
		$list_icon_type, 
		$list_icon, 
		$list_icon_size, 
		$list_heading, 
		$list_items_color_type, 
		$list_icon_space;
	
	
	$unique_id = uniqid();
	
	
	$list_type = ($list_type != 'list') ? 'block' : 'list';
	
	
	if ($list_type == 'block') {
		if ($list_icon_type == 'icon') {
			$icon = ($icon != '') ? $icon : $list_icon;
		} else {
			$icon = '';
		}
		
		
		if ($list_icon_type == 'image' && $image != '') {
			$image_id = explode('|', $image);
			
			
			if (is_numeric($image_id[0]) && is_array(wp_get_attachment_image_src($image_id[0], 'full'))) {
				$image_url_src = wp_get_attachment_image_src($image_id[0], 'full');
			
				$image_url = $image_url_src[0];
			} else if ($image_id[0] != '') {
				$image_url = $image_id[0];
			} else {
				$image_url = $image_id[1];
			}
			
			
			$style_item .= "\n" . '.cmsms_icon_list_items #cmsms_icon_list_item_' . $unique_id . '.cmsms_icon_type_image .cmsms_icon_list_icon { ' . 
				"\n\t" . 'background-image:url(' . $image_url . '); ' . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($list_items_color_type == 'border') {
			if ($color != '') {
				$style_item .= "\n" . '.cmsms_icon_list_items.cmsms_color_type_border #cmsms_icon_list_item_' . $unique_id . ' .cmsms_icon_list_icon:after { ' . 
					"\n\t" . cmsms_color_css('border-color', $color) . 
				"\n" . '} ' . "\n";
			}
			
			
			$style_item .= "\n" . '.cmsms_icon_list_items.cmsms_color_type_border #cmsms_icon_list_item_' . $unique_id . ':hover .cmsms_icon_list_icon:after { ' . 
				"\n\t" . 'border-color:transparent; ' . 
				"\n\t" . 'border-width:0; ' . 
			"\n" . '} ' . "\n";
		} elseif ($list_items_color_type == 'bg') {
			if ($color != '') {
				$style_item .= "\n" . '.cmsms_icon_list_items.cmsms_color_type_bg #cmsms_icon_list_item_' . $unique_id . ' .cmsms_icon_list_icon { ' . 
					"\n\t" . cmsms_color_css('background-color', $color) . 
				"\n" . '} ' . "\n";
			}
			
			
			$style_item .= "\n" . '.cmsms_icon_list_items.cmsms_color_type_bg #cmsms_icon_list_item_' . $unique_id . ':hover .cmsms_icon_list_icon:after { ' . 
				"\n\t" . 'border-color:transparent; ' . 
				"\n\t" . 'border-width:0; ' . 
			"\n" . '} ' . "\n";
		} elseif ($list_items_color_type == 'icon') {
			if ($color != '') {
				$style_item .= "\n" . '.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_' . $unique_id . ' .cmsms_icon_list_icon:before { ' . 
					"\n\t" . cmsms_color_css('color', $color) . 
				"\n" . '} ' . "\n\n" . 
				'.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_' . $unique_id . ':hover .cmsms_icon_list_icon { ' . 
					"\n\t" . cmsms_color_css('background-color', $color) . 
				"\n" . '} ' . "\n";
			}
			
			
			$style_item .= "\n" . '.cmsms_icon_list_items.cmsms_color_type_icon #cmsms_icon_list_item_' . $unique_id . ':hover .cmsms_icon_list_icon:before { ' . 
				"\n\t" . 'color:inherit; ' . 
			"\n" . '} ' . "\n";
		}
		
		
		$out_inner .= '<li id="cmsms_icon_list_item_' . $unique_id . '" class="cmsms_icon_list_item' . 
		(($list_icon_type == 'image') ? ' cmsms_icon_type_image' : '') . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">' . "\n" . 
			'<div class="cmsms_icon_list_item_inner">' . "\n" . 
				'<div class="cmsms_icon_list_icon_wrap">' . "\n" . 
					'<span class="cmsms_icon_list_icon ' . $icon . '"></span>' . "\n" . 
				'</div>' . "\n" . 
				'<div class="cmsms_icon_list_item_content">' . "\n" . 
					'<' . $list_heading . ' class="cmsms_icon_list_item_title">' . $title . '</' . $list_heading . '>' . "\n" . 
					cmsms_divpdel('<div class="cmsms_icon_list_item_text">' . "\n" . 
						do_shortcode(wpautop($content)) . 
					'</div>' . "\n") . 
				'</div>' . "\n" . 
			'</div>' . "\n" . 
		'</li>';
	} else {
		if ($color != '') {
			$style_item .= "\n" . '.cmsms_icon_list_items #cmsms_icon_list_item_' . $unique_id . ':before { ' . 
				"\n\t" . cmsms_color_css('color', $color) . 
			"\n" . '} ' . "\n";
		}
		
		
		$out_inner .= '<li id="cmsms_icon_list_item_' . $unique_id . '" class="cmsms_icon_list_item ' . $icon . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">' . $title . '</li>';
	}
}

add_shortcode('cmsms_icon_list_item', 'cmsms_icon_list_item');



/**
 * Progress Bars
 */
function cmsms_stats($atts, $content = null) {
    $new_atts = apply_filters('cmsms_stats_atts_filter', array( 
		'mode' => 				'bars', 
		'type' => 				'horizontal', 
		'count' => 				'5', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'stats';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	if ($mode == 'circles') {
		wp_enqueue_script('easePieChart');
	}
	
	
	global $style_stats, 
		$stats_mode, 
		$stats_type, 
		$stats_count;
	
	
	$style_stats = '';
	
	$stats_mode = $mode;
	
	$stats_type = $type;
	
	
	if ($count == 5) {
		$stats_count = ' one_fifth';
	} elseif ($count == 4) {
		$stats_count = ' one_fourth';
	} elseif ($count == 3) {
		$stats_count = ' one_third';
	} elseif ($count == 2) {
		$stats_count = ' one_half';
	} else {
		$stats_count = ' one_first';
	}
	
	
	$stats = do_shortcode($content);
	
	
	return '<style type="text/css"> ' . $style_stats . '</style> ' . "\n" . 
	'<div class="cmsms_stats stats_mode_' . $mode . ' stats_type_' . $type . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . 
		$stats . 
	'</div>';
}

add_shortcode('cmsms_stats', 'cmsms_stats');

/**
 * Single Progress Bar
 */
function cmsms_stat($atts, $content = null) {
    $new_atts = apply_filters('cmsms_stat_atts_filter', array( 
		'subtitle' => 		'', 
		'progress' => 		'0', 
		'icon' => 			'', 
		'color' => 			'', 
		'classes' => 		'' 
    ) );
	
	
	$shortcode_name = 'stat';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $style_stats, 
		$stats_mode, 
		$stats_type, 
		$stats_count;
	
	
	if ($stats_mode == 'bars') {
		$style_stats .= "\n" . '.cmsms_stats.shortcode_animated #cmsms_stat_' . $unique_id . '.cmsms_stat { ' . 
			"\n\t" . (($stats_type == 'horizontal') ? 'width' : 'height') . ':' . $progress . '%; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsms_stat_' . $unique_id . ' .cmsms_stat_inner { ' . 
			(($color != '') ? "\n\t" . cmsms_color_css('background-color', $color) : '') . 
		"\n" . '} ' . "\n";
	}
	
	
	$hex_color = explode('|', $color);
	
	
	return '<div class="cmsms_stat_wrap' . (($stats_mode == 'circles' || ($stats_mode == 'bars' && $stats_type == 'vertical')) ? $stats_count : '') . '">' . "\n" . 
		(($stats_mode == 'bars' && $stats_type == 'vertical') ? '<div class="cmsms_stat_container">' . "\n" : '') . 
			'<div id="cmsms_stat_' . $unique_id . '" class="cmsms_stat' . 
			(($classes != '') ? ' ' . $classes : '') . 
			(($content != '' && $icon != '') ? ' stat_has_titleicon' : '') . '"' . 
			' data-percent="' . $progress . '"' . 
			(($stats_mode == 'circles' && $color != '') ? ' data-bar-color="' . $hex_color[0] . '"' : '') . 
			'>' . "\n" . 
				'<div class="cmsms_stat_inner' . 
				(($icon != '') ? ' ' . $icon : '') . 
				'">' . "\n" . 
					(($content != '' && ($stats_mode == 'circles' || ($stats_mode == 'bars' && $stats_type == 'horizontal'))) ? '<span class="cmsms_stat_title">' . $content . '</span>' . "\n" : '') . 
					'<span class="cmsms_stat_counter_wrap">' . "\n" . 
						'<span class="cmsms_stat_counter">' . (($stats_mode == 'bars') ? $progress : '0') . '</span>' . 
						'<span class="cmsms_stat_units">%</span>' . "\n" . 
					'</span>' . "\n" . 
				'</div>' . "\n" . 
			'</div>' . "\n" . 
		(($stats_mode == 'bars' && $stats_type == 'vertical') ? '</div>' . "\n" : '') . 
		(($content != '' && $stats_mode == 'bars' && $stats_type == 'vertical') ? '<span class="cmsms_stat_title">' . $content . '</span>' . "\n" : '') . 
		(($subtitle != '') ? '<span class="cmsms_stat_subtitle">' . $subtitle . '</span>' . "\n" : '') . 
	'</div>';
}

add_shortcode('cmsms_stat', 'cmsms_stat');



/**
 * Counters
 */
function cmsms_counters($atts, $content = null) {
    $new_atts = apply_filters('cmsms_counters_atts_filter', array( 
		'type' => 					'horizontal', 
		'count' => 					'5', 
		'icon_size' => 				'0', 
		'icon_space' => 			'0', 
		'icon_border_width' => 		'0', 
		'icon_border_radius' => 	'0', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'counters';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $style_counters, 
		$counters_count;
	
	
	if ($count == 5) {
		$counters_count = ' one_fifth';
	} elseif ($count == 4) {
		$counters_count = ' one_fourth';
	} elseif ($count == 3) {
		$counters_count = ' one_third';
	} elseif ($count == 2) {
		$counters_count = ' one_half';
	} else {
		$counters_count = ' one_first';
	}
	
	
	$style_counters = "\n" . '#cmsms_counters_' . $unique_id . ' .cmsms_counter.counter_has_icon .cmsms_counter_inner, ' . "\n" . 
	'#cmsms_counters_' . $unique_id . ' .cmsms_counter.counter_has_image .cmsms_counter_inner { ' . 
		"\n\t" . 'padding-' . (($type == 'horizontal') ? ((is_rtl()) ? 'right' : 'left') : 'top') . ':' . ((int) $icon_space + 20) . 'px; ' . 
	"\n" . '} ' . "\n\n" . 
	'#cmsms_counters_' . $unique_id . '.counters_type_vertical .cmsms_counter .cmsms_counter_inner:before { ' . 
		"\n\t" . 'margin-' . ((is_rtl()) ? 'right' : 'left') . ':-' . ((int) $icon_space / 2) . 'px; ' . 
	"\n" . '} ' . "\n\n" . 
	'#cmsms_counters_' . $unique_id . '.counters_type_horizontal .cmsms_counter .cmsms_counter_inner .cmsms_counter_counter_wrap { ' . 
		"\n\t" . 'line-height:' . $icon_space . 'px; ' . 
	"\n" . '} ' . "\n\n" . 
	'#cmsms_counters_' . $unique_id . ' .cmsms_counter .cmsms_counter_inner:before { ' . 
		"\n\t" . 'font-size:' . $icon_size . 'px; ' . 
		"\n\t" . 'line-height:' . ((int) $icon_space - ((int) $icon_border_width * 2)) . 'px; ' . 
		"\n\t" . 'width:' . $icon_space . 'px; ' . 
		"\n\t" . 'height:' . $icon_space . 'px; ' . 
		"\n\t" . 'border-width:' . $icon_border_width . 'px; ' . 
		(((int) $icon_border_radius > 0) ? "\n\t" . '-webkit-border-radius:' . $icon_border_radius . '; ' : '') . 
		(((int) $icon_border_radius > 0) ? "\n\t" . 'border-radius:' . $icon_border_radius . '; ' : '') . 
	"\n" . '} ' . "\n\n";
	
	
	$counters = do_shortcode($content);
	
	
	return '<style type="text/css"> ' . $style_counters . '</style> ' . "\n" . 
	'<div id="cmsms_counters_' . $unique_id . '" class="cmsms_counters counters_type_' . $type . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . 
		$counters . 
	'</div>';
}

add_shortcode('cmsms_counters', 'cmsms_counters');

/**
 * Single Counter
 */
function cmsms_counter($atts, $content = null) {
    $new_atts = apply_filters('cmsms_counter_atts_filter', array( 
		'subtitle' => 		'', 
		'value' => 			'0', 
		'value_prefix' => 	'', 
		'value_suffix' => 	'', 
		'color' => 			'', 
		'icon_type' => 		'icon', 
		'icon' => 			'', 
		'image' => 			'', 
		'icon_color' => 	'', 
		'icon_bg_color' => 	'', 
		'icon_bd_color' => 	'', 
		'classes' => 		'' 
    ) );
	
	
	$shortcode_name = 'counter';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $style_counters, 
		$counters_count;
	
	
	$style_counters .= "\n" . '#cmsms_counter_' . $unique_id . ' .cmsms_counter_inner:before { ' . 
		(($icon_color != '') ? "\n\t" . cmsms_color_css('color', $icon_color) : '') . 
		(($icon_bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $icon_bg_color) : '') . 
		(($icon_bd_color != '') ? "\n\t" . cmsms_color_css('border-color', $icon_bd_color) : '') . 
	"\n" . '} ' . "\n\n";
	
	
	if ($icon_type == 'image' && $image != '') {
		$image_id = explode('|', $image);
		
		
		$image_url_array = wp_get_attachment_image_src($image_id[0], 'full');
		
		
		if (is_numeric($image_id[0]) && is_array($image_url_array)) {
			$image_url = $image_url_array[0];
		} else if ($image_id[0] != '') {
			$image_url = $image_id[0];
		} else {
			$image_url = $image_id[1];
		}
		
		
		$style_counters .= '#cmsms_counter_' . $unique_id . ' .cmsms_counter_inner:before { ' . 
			"\n\t" . "content:''; " . 
			"\n\t" . 'background-image:url(' . $image_url . '); ' . 
		"\n" . '} ' . "\n";
	}
	
	
	if ($color != '') {
		$style_counters .= '#cmsms_counter_' . $unique_id . ' .cmsms_counter_counter { ' . 
			"\n\t" . cmsms_color_css('color', $color) . 
		"\n" . '} ' . "\n";
	}
	
	
	$hex_color = explode('|', $color);
	
	
	return '<div class="cmsms_counter_wrap' . $counters_count . '">' . "\n" . 
		'<div id="cmsms_counter_' . $unique_id . '" class="cmsms_counter' . 
		(($classes != '') ? ' ' . esc_attr($classes) : '') . 
		(($icon_type == 'icon' && $icon != '') ? ' counter_has_icon' : '') . 
		(($icon_type == 'image' && $image != '') ? ' counter_has_image' : '') . 
		'" data-percent="' . $value . '">' . "\n" . 
			'<div class="cmsms_counter_inner' . 
			(($icon != '') ? ' ' . esc_attr($icon) : '') . 
			'">' . "\n" . 
				'<span class="cmsms_counter_counter_wrap">' . "\n" . 
					'<span class="cmsms_counter_prefix">' . esc_html($value_prefix) . '</span>' . 
					'<span class="cmsms_counter_counter">0</span>' . 
					'<span class="cmsms_counter_suffix">' . esc_html($value_suffix) . '</span>' . "\n" . 
				'</span>' . "\n" . 
				(($content != '') ? '<span class="cmsms_counter_title">' . $content . '</span>' . "\n" : '') . 
			'</div>' . "\n" . 
			(($subtitle != '') ? '<span class="cmsms_counter_subtitle">' . $subtitle . '</span>' . "\n" : '') . 
		'</div>' . "\n" . 
	'</div>';
}

add_shortcode('cmsms_counter', 'cmsms_counter');



/**
 * Embed
 */
function cmsms_embed($atts, $content = null) {
    $new_atts = apply_filters('cmsms_embed_atts_filter', array( 
		'link' => 				'', 
		'width' => 				'', 
		'height' => 			'', 
		'wrap' => 				'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'embed';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $wp_embed;
	
	
    $shcd_out = '';
	
	
	if ($wrap != '') {
		$shcd_out .= '[cmsms_video_wrap' . 
		(($width != '') ? ' width="' . $width . '"' : '') . 
		(($animation != '') ? ' animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		(($classes != '') ? ' classes="' . $classes . '"' : '') . 
		']';
	} else {
		$shcd_out .= '<div class="cmsms_embed_wrap' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n";
	}
	
	
	$shcd_out .= $wp_embed->run_shortcode('[embed' . 
	(($width != '') ? ' width="' . $width . '"' : '') . 
	(($height != '') ? ' height="' . $height . '"' : '') . 
	']' . $link . '[/embed]');
	
	
	if ($wrap != '') {
		$shcd_out .= '[/cmsms_video_wrap]';
	} else {
		$shcd_out .= '</div>';
	}
	
	
	$out = do_shortcode($shcd_out);
	
	
	return $out;
}

add_shortcode('cmsms_embed', 'cmsms_embed');



/**
 * Videos
 */
function cmsms_videos($atts, $content = null) {
    $new_atts = apply_filters('cmsms_videos_atts_filter', array( 
		'poster' => 			'', 
		'width' => 				'', 
		'height' => 			'', 
		'wrap' => 				'', 
		'autoplay' => 			'', 
		'loop' => 				'', 
		'preload' => 			'none', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'videos';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$out = '';
	
	
	$attrs = array( 
		'preload' => $preload 
	);
	
	
	if ($poster != '') {
		$newPosterArray = explode('|', $poster);
		
		
		$newPoster = wp_get_attachment_image_src($newPosterArray[0], 'full');
		
		
		$attrs['poster'] = $newPoster[0];
	}
	
	
	if ($width != '') {
		$attrs['width'] = $width;
	}
	
	
	if ($height != '') {
		$attrs['height'] = $height;
	}
	
	
	if ($autoplay != '') {
		$attrs['autoplay'] = 'on';
	}
	
	
	if ($loop != '') {
		$attrs['loop'] = 'on';
	}
	
	
	$content = str_replace('[/cmsms_video][cmsms_video]', ',', $content);
	
	$content = str_replace('[cmsms_video]', '', $content);
	
	$content = str_replace('[/cmsms_video]', '', $content);
	
	
	$newContentArray = explode(',', $content);
	
	
	foreach ($newContentArray as $newContentItem) {
		$newContentItemArray = explode('|', $newContentItem);
		
		
		if (count($newContentItemArray) > 1) {
			$newContentItemVal = $newContentItemArray[1];
		} else {
			$newContentItemVal = $newContentItemArray[0];
		}
		
		
		$attrs[substr(strrchr($newContentItemVal, '.'), 1)] = $newContentItemVal;
	}
	
	
	if ($wrap != '') {
		$out .= '[cmsms_video_wrap' . 
		(($width != '') ? ' width="' . $width . '"' : '') . 
		(($animation != '') ? ' animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		(($classes != '') ? ' classes="' . $classes . '"' : '') . 
		']';
	} else {
		$out .= '<div class="cmsms_video' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n";
	}
	
	
	$out .= wp_video_shortcode($attrs);
	
	
	if ($wrap != '') {
		$out .= '[/cmsms_video_wrap]';
	} else {
		$out .= '</div>';
	}
	
	
	$out = do_shortcode($out);
	
	
	return $out;
}

add_shortcode('cmsms_videos', 'cmsms_videos');



/**
 * Video Wrap
 */
function cmsms_video_wrap($atts, $content = null) {
    $new_atts = apply_filters('cmsms_video_wrap_atts_filter', array( 
		'width' => 				'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'video-wrap';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	$out = '';
	
	
	if ($width != '') {
		$out .= '<style type="text/css"> ' . "\n" . 
			'#cmsms_video_wrap_' . $unique_id . ' { ' . 
				"\n\t" . 'max-width:' . $width . 'px; ' . 
			"\n" . '} ' . "\n" . 
		'</style>';
	}
	
	
    $out .= cmsms_divpdel('<div id="cmsms_video_wrap_' . $unique_id . '" class="cmsms_video_wrap' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		do_shortcode(wpautop($content)) . 
	'</div>' . "\n");
	
	
	return $out;
}

add_shortcode('cmsms_video_wrap', 'cmsms_video_wrap');



/**
 * Audio
 */
function cmsms_audios($atts, $content = null) {
    $new_atts = apply_filters('cmsms_audios_atts_filter', array( 
		'autoplay' => 			'', 
		'loop' => 				'', 
		'preload' => 			'none', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'audios';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$attrs = array( 
		'preload' => $preload 
	);
	
	
	if ($autoplay != '') {
		$attrs['autoplay'] = 'on';
	}
	
	
	if ($loop != '') {
		$attrs['loop'] = 'on';
	}
	
	
	$content = str_replace('[/cmsms_audio][cmsms_audio]', ',', $content);
	
	$content = str_replace('[cmsms_audio]', '', $content);
	
	$content = str_replace('[/cmsms_audio]', '', $content);
	
	
	$newContentArray = explode(',', $content);
	
	
	foreach ($newContentArray as $newContentItem) {
		$newContentItemArray = explode('|', $newContentItem);
		
		
		if (count($newContentItemArray) > 1) {
			$newContentItemVal = $newContentItemArray[1];
		} else {
			$newContentItemVal = $newContentItemArray[0];
		}
		
		
		$attrs[substr(strrchr($newContentItemVal, '.'), 1)] = $newContentItemVal;
	}
	
	
	return '<div class="cmsms_audio' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		wp_audio_shortcode($attrs) . 
	'</div>';
}

add_shortcode('cmsms_audios', 'cmsms_audios');



/**
 * Table
 */
function cmsms_table($atts, $content = null) {
    $new_atts = apply_filters('cmsms_table_atts_filter', array( 
		'caption' => 			'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'table';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	return '<table class="cmsms_table' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . 
		'<caption>' . $caption . '</caption>' . 
		do_shortcode($content) . 
	'</table>';
}

add_shortcode('cmsms_table', 'cmsms_table');

/**
 * Table Row
 */
function cmsms_tr($atts, $content = null) {
    $new_atts = apply_filters('cmsms_tr_atts_filter', array( 
		'type' => 	'' 
    ) );
	
	
	$shortcode_name = 'tr';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$out = '';
	
	
	if ($type == 'header') {
		$out .= '<thead>';
	} else if ($type == 'footer') {
		$out .= '<tfoot>';
	}
	
	
	$out .= '<tr' . 
		(($type != '') ? ' class="cmsms_table_row_' . $type . '"' : '') . 
	'>' . 
		do_shortcode($content) . 
	'</tr>';
	
	
	if ($type == 'header') {
		$out .= '</thead>';
	} else if ($type == 'footer') {
		$out .= '</tfoot>';
	}
	
	
	return $out;
}

add_shortcode('cmsms_tr', 'cmsms_tr');

/**
 * Table Cell
 */
function cmsms_td($atts, $content = null) {
    $new_atts = apply_filters('cmsms_td_atts_filter', array( 
		'type' => 	'', 
		'align' => 	'left' 
    ) );
	
	
	$shortcode_name = 'td';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	return '<' . (($type == 'header') ? 'th' : 'td') . 
	(($align != '') ? ' class="cmsms_table_cell_align' . $align . '"' : '') . 
	'>' . 
		do_shortcode($content) . 
	'</' . (($type == 'header') ? 'th' : 'td') . '>';
}

add_shortcode('cmsms_td', 'cmsms_td');



/**
 * Divider
 */
function cmsms_divider($atts, $content = null) {
	$new_atts = apply_filters('cmsms_divider_atts_filter', array( 
		'width' => 			'short', 
		'height' => 		'1', 
		'style' => 			'solid', 
		'position' => 		'center', 
		'color' => 			'', 
		'margin_top' => 	'0', 
		'margin_bottom' => 	'0', 
		'classes' => 		'' 
	) );
	
	
	$shortcode_name = 'divider';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	$out = '<style type="text/css"> ' . "\n" . 
		'#cmsms_divider_' . $unique_id . ' { ' . 
			"\n\t" . 'border-bottom-width:' . $height . 'px; ' . 
			"\n\t" . 'border-bottom-style:' . $style . '; ' . 
			"\n\t" . 'padding-top:' . $margin_top . 'px; ' . 
			"\n\t" . 'margin-bottom:' . $margin_bottom . 'px; ' . 
			(($color != '') ? "\n\t" . cmsms_color_css('border-bottom-color', $color) : '') . 
		"\n" . '} ' . "\n" . 
	'</style>' . "\n";
	
	
	$out .= '<div id="cmsms_divider_' . $unique_id . '" class="' . 
	(($height < 1) ? 'cl' : 'cmsms_divider cmsms_divider_width_' . $width . ' cmsms_divider_pos_' . $position) . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"></div>';
	
	
	return $out;
}

add_shortcode('cmsms_divider', 'cmsms_divider');



/**
 * Contact Form
 */
function cmsms_contact_form($atts, $content = null) {
    $new_atts = apply_filters('cmsms_contact_form_atts_filter', array( 
		'form_plugin' => 		'', 
		'form_cf7' => 			'', 
		'form_cfb' => 			'', 
		'email_cfb' => 			'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'contact-form';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
    $out = '<div class="cmsms_contact_form' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>';
	
	
	if ($form_plugin == 'cf7' && $form_cf7 != '') {
		$cf7_array = explode('{|}', $form_cf7);
		
		
		$out .= do_shortcode('[contact-form-7 id="' . $cf7_array[0] . '" title="' . stripslashes($cf7_array[1]) . '"]');
	} elseif ($form_plugin == 'cfb' && $form_cfb != '' && $email_cfb != '') {
		$out .= do_shortcode('[cmsms_contact_form_sc formname="' . $form_cfb . '" email="' . $email_cfb . '"]');
	}
	
	
	$out .= '</div>';
	
	
	return $out;
}

add_shortcode('cmsms_contact_form', 'cmsms_contact_form');



/**
 * Slider
 */
function cmsms_slider($atts, $content = null) {
    $new_atts = apply_filters('cmsms_slider_atts_filter', array( 
		'slider_plugin' => 		'', 
		'slider_layer' => 		'', 
		'slider_rev' => 		'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'slider';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
    $out = '<div class="cmsms_slider' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	if ($slider_plugin == 'layer' && $slider_layer != '') {
		$out .= do_shortcode('[layerslider id="' . $slider_layer . '"]');
	} elseif ($slider_plugin == 'rev' && $slider_rev != '') {
		$out .= do_shortcode('[rev_slider ' . $slider_rev . ']');
	}
	
	
	$out .= '</div>';
	
	
	return $out;
}

add_shortcode('cmsms_slider', 'cmsms_slider');



/**
 * Clients
 */
function cmsms_clients($atts, $content = null) {
    $new_atts = apply_filters('cmsms_clients_atts_filter', array( 
		'columns' => 			'5', 
		'layout' => 			'', 
		'height' => 			'180', 
		'border' => 			'', 
		'autoplay' => 			'', 
		'speed' => 				'1', 
		'slides_control' => 	'', 
		'arrow_control' => 		'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'clients';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	$clients_col = '';
	
	global $client_out;
	
	$client_out = '';
	
	if ($columns == 1) {
		$clients_col = 'clients_one';
	} elseif ($columns == 2) {
		$clients_col = 'clients_two';
	} elseif ($columns == 3) {
		$clients_col = 'clients_three';
	} elseif ($columns == 4) {
		$clients_col = 'clients_four';
	} elseif ($columns == 5) {
		$clients_col = 'clients_five';
	}
	
	
	do_shortcode($content);
	
	$out = '<style type="text/css"> ' . "\n" . 
		'#cmsms_clients_' . $unique_id . ' .cmsms_clients_item { ' . 
			'height:' . $height . 'px; ' .  
			'line-height:' . $height . 'px; ' .  
		'} ' . "\n" . 
		'#cmsms_clients_' . $unique_id . ' .cmsms_clients_item a { ' . 
			'line-height:' . $height . 'px; ' .  
		'} ' . "\n" . 
	'</style>' . "\n";
	
	
	if ($layout == 'slider') {
		$out .= '<script type="text/javascript">' . 
			'jQuery(document).ready(function () { ' . 
				'jQuery("#cmsms_clients_' . $unique_id . '").owlCarousel( { ' . 
					'singleItem : false, ' . 
					'items : ' . $columns . ', ' . 
					'itemsDesktopSmall : [768,2], ' . 
					'itemsTablet: [540,1], ' . 
					'slideSpeed : ' . ($speed * 1000) . ', ' . 
					'paginationSpeed : 	' . ($speed * 1000) . ', ' . 
					(($autoplay != 'true') ? 'autoPlay : false, ' : 'autoPlay : true,') . 
					'stopOnHover: true, ' . 
					(($slides_control != 'true') ? 'pagination: false, ' : '') . 
					(($arrow_control == 'true') ? 'navigation : true, ' : '') . 
					'navigationText : 	[ ' . 
						'"<span class=\"cmsms_prev_arrow\"><span></span></span>", ' . 
						'"<span class=\"cmsms_next_arrow\"><span></span></span>" ' . 
					'] ' . 
				'} );' . 
			'} );' . 
		'</script>' . "\n" . 
		'<div class="cmsms_clients_slider_wrap"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n" . 
			'<div id="cmsms_clients_' . $unique_id . '" class="cmsms_clients_slider owl-carousel' . 
			(($classes != '') ? ' ' . $classes : '') . 
			(($border == '') ? ' clients_noborder' : '') . 
			'"' . 
			'>' . "\n" . 
			$client_out . 
			'</div>' . "\n" . 
		'</div>' . "\n";
	} else {
		$out .= '<div class="cmsms_clients_grid_wrap"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n" . 
		'<div id="cmsms_clients_' . $unique_id . '" class="cmsms_clients_grid' . ' ' . $clients_col . 
		(($classes != '') ? ' ' . $classes : '') . 
		(($border == '') ? ' clients_noborder' : '') . 
		'">' . "\n" . 
		'<div class="cmsms_clients_items slides">' . "\n" . 
			$client_out . 
		'</div>' . "\n" . 
		'</div>' . "\n" . 
		'</div>' . "\n";
	}
	
	return $out;
}

add_shortcode('cmsms_clients', 'cmsms_clients');

/**
 * Single Client
 */
function cmsms_client($atts, $content = null) {
    $new_atts = apply_filters('cmsms_client_atts_filter', array( 
		'logo' => 		'', 
		'link' => 		'', 
		'classes' => 	'' 
    ) );
	
	
	$shortcode_name = 'client';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $client_out;
	
	
	$counter = 0;
	
	if ($content == null) {
		$content = __('Name', 'cmsms_content_composer');
	}
	
	
	if ($logo != '') {
		$client_logo = wp_get_attachment_image_src($logo, 'full');
		
		if ($link != '') {
			$client_out .= '<div class="cmsms_clients_item item' . 
			(($classes != '') ? ' ' . $classes : '') . 
			'">' . "\n" . 
				'<a href="' . (($link != '') ? '' . $link : '') . '" target="_blank">' .  
					'<img src="' . $client_logo[0] . '" alt="' . $content . '" title="' . $content . '" />' . 
				'</a>' . "\n" . 
			'</div>' . "\n";
		} else {
			$client_out .= '<div class="cmsms_clients_item item' . 
			(($classes != '') ? ' ' . $classes : '') . 
			'">' . "\n" . 
				'<img src="' . $client_logo[0] . '" alt="' . $content . '" title="' . $content . '" />' . "\n" .
			'</div>' . "\n";
		}
	}
}

add_shortcode('cmsms_client', 'cmsms_client');



/**
 * Button
 */
function cmsms_button($atts, $content = null) {
    $new_atts = apply_filters('cmsms_button_atts_filter', array( 
		'button_title' => 			'', 
		'button_link' => 			'#', 
		'button_target' => 			'', 
		'button_text_align' => 		'center', 
		'button_style' => 			'', 
		'button_font_family' => 	'', 
		'button_font_size' => 		'', 
		'button_line_height' => 	'', 
		'button_font_weight' => 	'', 
		'button_font_style' => 		'', 
		'button_padding_hor' => 	'', 
		'button_border_width' => 	'', 
		'button_border_style' => 	'', 
		'button_border_radius' => 	'', 
		'button_bg_color' => 		'', 
		'button_text_color' => 		'', 
		'button_border_color' => 	'', 
		'button_bg_color_h' => 		'', 
		'button_text_color_h' => 	'', 
		'button_border_color_h' => 	'', 
		'button_icon' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'button';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	if ($button_font_family != '') {
		$font_family_array = explode(':', $button_font_family);
		
		$font_family_name = "'" . $font_family_array[0] . "'";
		
		
		cmsms_theme_google_font($button_font_family, $font_family_array[0]);
	}
	
	
	$out = '';
	
	
	if (
		$button_style != '' || 
		$button_font_family != '' || 
		$button_font_size != '' || 
		$button_line_height != '' || 
		$button_font_weight != '' || 
		$button_font_style != '' || 
		$button_padding_hor != '' || 
		$button_border_width != '' || 
		$button_border_style != '' || 
		$button_border_radius != '' || 
		$button_bg_color != '' || 
		$button_text_color != '' || 
		$button_border_color != '' || 
		$button_bg_color_h != '' || 
		$button_text_color_h != '' || 
		$button_border_color_h != '' 
	) {
		$button_custom_styles = 'true';
	} else {
		$button_custom_styles = 'false';
	}
	
	
	$out .= '<style type="text/css">' . "\n" . 
		'#cmsms_button_' . $unique_id . ' { ' . 
			"\n\t" . (($button_text_align == 'center') ? 'text-align' : 'float') . ':' . $button_text_align . '; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsms_button_' . $unique_id . ' .cmsms_button:before { ' . 
			"\n\t" . 'margin-right:' . (($content != null) ? '.5em; ' : '0;') . 
			"\n\t" . 'margin-left:0; ' . 
			"\n\t" . 'vertical-align:baseline; ' . 
		"\n" . '} ' . "\n\n";
		
		if ($button_custom_styles == 'true') {
			$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button { ' . 
				(($button_font_family != '') ? "\n\t" . 'font-family:' . str_replace('+', ' ', $font_family_name) . '; ' : '') . 
				(($button_font_size != '') ? "\n\t" . 'font-size:' . $button_font_size . 'px; ' : '') . 
				(($button_line_height != '') ? "\n\t" . 'line-height:' . $button_line_height . 'px; ' : '') . 
				(($button_font_weight != '') ? "\n\t" . 'font-weight:' . $button_font_weight . '; ' : '') . 
				(($button_font_style != '') ? "\n\t" . 'font-style:' . $button_font_style . '; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-right:' . $button_padding_hor . 'px; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-left:' . $button_padding_hor . 'px; ' : '') . 
				(($button_border_width != '') ? "\n\t" . 'border-width:' . $button_border_width . 'px; ' : '') . 
				(($button_border_style != '') ? "\n\t" . 'border-style:' . $button_border_style . '; ' : '') . 
				(($button_border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $button_border_radius . '; ' . "\n\t" . 'border-radius:' . $button_border_radius . '; ' : '') . 
				(($button_bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color) : '') . 
				(($button_text_color != '') ? "\n\t" . cmsms_color_css('color', $button_text_color) : '') . 
				(($button_border_color != '') ? "\n\t" . cmsms_color_css('border-color', $button_border_color) : '') . 
			"\n" . '} ' . "\n";
			
			$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button:hover { ' . 
				(($button_bg_color_h != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color_h) : '') . 
				(($button_text_color_h != '') ? "\n\t" . cmsms_color_css('color', $button_text_color_h) : '') . 
				(($button_border_color_h != '') ? "\n\t" . cmsms_color_css('border-color', $button_border_color_h) : '') . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($button_style != '') {
			if (
				$button_style == 'cmsms_but_bg_slide_left' || 
				$button_style == 'cmsms_but_bg_slide_right' || 
				$button_style == 'cmsms_but_bg_slide_top' || 
				$button_style == 'cmsms_but_bg_slide_bottom' || 
				$button_style == 'cmsms_but_bg_expand_vert' || 
				$button_style == 'cmsms_but_bg_expand_hor' || 
				$button_style == 'cmsms_but_bg_expand_diag' 
			) {
				if ($button_bg_color != '') {
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_left:hover, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_right:hover, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_top:hover, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_bottom:hover, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_vert:hover, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_hor:hover, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_diag:hover { ' . 
						"\n\t" . cmsms_color_css('background-color', $button_bg_color) . 
					"\n" . '} ' . "\n";
				}
				
				if ($button_bg_color_h != '') {
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_left:after, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_right:after, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_top:after, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_bottom:after, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_vert:after, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_hor:after, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_diag:after { ' . 
						"\n\t" . cmsms_color_css('background-color', $button_bg_color_h) . 
					"\n" . '} ' . "\n";
				}
			}
			
			
			if (
				$button_style == 'cmsms_but_icon_dark_bg' || 
				$button_style == 'cmsms_but_icon_light_bg' || 
				$button_style == 'cmsms_but_icon_divider' || 
				$button_style == 'cmsms_but_icon_inverse' 
			) {
				$but_icon_pad = ($button_padding_hor != '' ? $button_padding_hor : '20') + ($button_line_height != '' ? $button_line_height : '40');
				
				if ($button_padding_hor != '' || $button_line_height != '') {
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_dark_bg, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_light_bg, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider, ' .  
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse { ' . 
						"\n\t" . 'padding-left:' . $but_icon_pad . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_dark_bg:before, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_light_bg:before, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:before, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:before, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_dark_bg:after, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_light_bg:after, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:after, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:after { ' . 
						"\n\t" . 'width:' . $button_line_height . 'px; ' . 
					"\n" . '} ' . "\n";
				}
				
				
				if ($button_border_color != '' || $button_border_color_h != '') {
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:after { ' . 
						"\n\t" . cmsms_color_css('border-color', $button_border_color) . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:hover:after { ' . 
						"\n\t" . cmsms_color_css('border-color', $button_border_color_h) . 
					"\n" . '} ' . "\n";
				}
				
				
				if ($button_style == 'cmsms_but_icon_inverse') {
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:before { ' . 
						(($button_text_color_h != '') ? "\n\t" . cmsms_color_css('color', $button_text_color_h) : '') . 
					"\n" . '} ' . "\n";
				
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:after { ' . 
						(($button_bg_color_h != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color_h) : '') . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:hover:before { ' . 
						(($button_text_color != '') ? "\n\t" . cmsms_color_css('color', $button_text_color) : '') . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:hover:after { ' . 
						(($button_bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color) : '') . 
					"\n" . '} ' . "\n";
				}
			}
			
			
			if (
				$button_style == 'cmsms_but_icon_slide_left' || 
				$button_style == 'cmsms_but_icon_slide_right' 
			) {
				if ($button_padding_hor != '') {
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_left, ' . 
					'#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_right { ' . 
						"\n\t" . 'padding-left:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'padding-right:' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_left:before { ' . 
						"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'left:-' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_left:hover:before { ' . 
						"\n\t" . 'left:0; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_right:before { ' . 
						"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'right:-' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_button_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_right:hover:before { ' . 
						"\n\t" . 'right:0; ' . 
					"\n" . '} ' . "\n";
				}
			}
		}
	$out .= '</style>' . "\n";
	
	
	$out .= '<div id="cmsms_button_' . $unique_id . '" class="button_wrap">' . 
		'<a href="' . $button_link . '" class="cmsms_button' . 
		(($button_style != '') ? ' cmsms_but_clear_styles ' . $button_style : '') . 
		(($button_icon != '') ? ' ' . $button_icon : '') . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		(($button_target == 'blank') ? ' target="_blank"' : '') . 
		'><span>' . $content . '</span></a>' . 
	'</div>' . "\n";
	
	
	return $out;
}

add_shortcode('cmsms_button', 'cmsms_button');



/**
 * Icon
 */
function cmsms_simple_icon($atts, $content = null) {
    $new_atts = apply_filters('cmsms_simple_icon_atts_filter', array( 
		'icon' => 					'', 
		'size' => 					'40', 
		'space' => 					'60', 
		'display' => 				'block', 
		'text_align' => 			'center', 
		'border_width' => 			'0', 
		'border_radius' => 			'0', 
		'link' => 					'', 
		'target' => 				'', 
		'color' => 					'', 
		'bg_color' => 				'', 
		'bd_color' => 				'', 
		'animation' => 				'', 
		'animation_delay' => 		'' 
    ) );
	
	
	$shortcode_name = 'simple-icon';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
    $unique_id = uniqid();
	
	
	$out = '<style type="text/css"> ' . "\n" . 
		'#cmsms_icon_' . $unique_id . ' { ' . 
			"\n\t" . 'display:' . $display . '; ' . 
			"\n\t" . 'text-align:' . $text_align . '; ' . 
		'} ' . "\n\n" . 
		'#cmsms_icon_' . $unique_id . ' .cmsms_simple_icon { ' . 
			"\n\t" . 'border-width:' . $border_width . 'px; ' . 
			"\n\t" . 'width:' . $space . 'px; ' . 
			"\n\t" . 'height:' . $space . 'px; ' . 
			"\n\t" . 'font-size:' . $size . 'px; ' . 
			"\n\t" . 'line-height:' . ((int) $space - ((int) $border_width * 2)) . 'px; ' . 
			"\n\t" . 'text-align:' . $text_align . '; ' . 
			(($border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $border_radius . '; ' . "\n\t" . 'border-radius:' . $border_radius . '; ' : '') . 
			(($color != '') ? "\n\t" . cmsms_color_css('color', $color) : '') . 
			(($bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $bg_color) : '') . 
			(($bd_color != '') ? "\n\t" . cmsms_color_css('border-color', $bd_color) : '') . 
		'} ' . "\n" . 
	'</style>' . "\n";
	
	
    $out .= '<div id="cmsms_icon_' . $unique_id . '" class="cmsms_icon_wrap">' . 
		(($link != '') ? '<a href="' . $link . '"' . (($target == 'blank') ? ' target="_blank"' : '') . '>' : '') . 
			'<span class="cmsms_simple_icon' . 
			(($icon != '') ? ' ' . $icon : '') . 
			(($content != '') ? ' ' . $content : '') . 
			'"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
			'></span>' . 
		(($link != '') ? '</a>' : '') . 
	'</div>' . "\n";
	
	
	return $out;
}

add_shortcode('cmsms_simple_icon', 'cmsms_simple_icon');



/**
 * Image
 */
function cmsms_image($atts, $content = null) {
    $new_atts = apply_filters('cmsms_image_atts_filter', array( 
		'align' => 				'', 
		'caption' => 			'', 
		'link' => 				'', 
		'target' => 			'', 
		'lightbox' => 			'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'image';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	if ($align == 'left') {
		$img_align = ' cmsms_image_l';
	} elseif ($align == 'right') {
		$img_align = ' cmsms_image_r';
	} elseif ($align == 'center') {
		$img_align = ' cmsms_image_c';
	} else {
		$img_align = ' cmsms_image_n';
	}
	
	
	$out = '';
	
	
	if ($content != null) {
		$new_image_thumb = explode('|', $content);
		
		
		if (!isset($new_image_thumb[2]) || $new_image_thumb[2] == '') {
			$new_image_size = 'full';
		} else {
			$new_image_size = $new_image_thumb[2];
		}
		
		
		if (is_numeric($new_image_thumb[0])) {
			$new_image = wp_get_attachment_image_src($new_image_thumb[0], $new_image_size);
			
			
			$out .= (($align == 'center') ? '<div class="aligncenter">' . "\n" : '');
			
			
			if ($link != '') {
				$out .= '<div class="cmsms_img ' . $img_align . 
				(($caption != '') ? ' with_caption' : '') . 
				(($classes != '') ? ' ' . $classes : '') . 
				'"' . 
				(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
				(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
				'>' . "\n" . 
					'<a href="' . $link . '"' . 
					(($lightbox == 'true') ? ' rel="ilightbox"' : '') . 
					(($target == 'true') ? ' target="_blank"' : '') . 
					'>' . 
						'<img src="' . $new_image[0] . '" alt="' . 
						(($caption != '') ? ' ' . $caption : '') . 
						'" />' . 
					'</a>' . "\n" . 
					(($caption != '') ? '<p class="cmsms_img_caption">' . $caption . '</p>' : '') . 
				'</div>' . "\n";
			} else {
				$out .= '<div class="cmsms_img ' . $img_align . 
				(($caption != '') ? ' with_caption' : '') . 
				(($classes != '') ? ' ' . $classes : '') . 
				'"' . 
				(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
				(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
				'>' . "\n" . 
					'<img src="' . $new_image[0] . '" alt="' . 
					(($caption != '') ? ' ' . $caption : '') . 
					'" />' . "\n" . 
					(($caption != '') ? '<p class="cmsms_img_caption">' . $caption . '</p>' : '') . 
				'</div>' . "\n";
			}
			
			
			$out .= (($align == 'center') ? '</div>' . "\n" : '');
		}
	}
	
	
	return $out;
}

add_shortcode('cmsms_image', 'cmsms_image');



/**
 * Gallery
 */
function cmsms_gallery($atts, $content = null) { 
    $new_atts = apply_filters('cmsms_gallery_atts_filter', array( 
		'layout' => 				'', 
		'image_size_slider' => 		'', 
		'image_size_gallery' => 	'', 
		'hover_pause' => 			'5', 
		'hover_active' => 			'1', 
		'hover_pause_on_hover' => 	'true', 
		'slider_effect' => 			'', 
		'slider_autoplay' => 		'', 
		'slider_slideshow_speed' => '7', 
		'slider_animation_speed' => '600', 
		'slider_pause_on_hover' => 	'', 
		'slider_rewind' => 			'', 
		'slider_rewind_speed' => 	'1000', 
		'slider_nav_control' => 	'', 
		'slider_nav_arrow' => 		'', 
		'gallery_columns' => 		'', 
		'gallery_links' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'gallery';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	if ($gallery_columns == '4') {
		$new_gallery_col = 'one_fourth';
	} elseif ($gallery_columns == '3') {
		$new_gallery_col = 'one_third';
	} elseif ($gallery_columns == '2') {
		$new_gallery_col = 'one_half';
	} else {
		$new_gallery_col = 'one_first';
	}
	
	
	$images = explode(',', do_shortcode($content));
	
	$unique_id = uniqid();
	
	$out = '';
	
	if ($layout == 'slider') {
		if ($image_size_slider == 'thumbnail' || $image_size_slider == 'medium' || $image_size_slider == 'large' || $image_size_slider == 'full') {
			$slider_size = get_option($image_size_slider . '_size_w');
		} else {
			$slider_size_array = cmsms_image_thumbnail_list();
			
			$slider_size = $slider_size_array[$image_size_slider]['width'];
		}
	} elseif ($layout == 'gallery') {
		if ($image_size_gallery == 'thumbnail' || $image_size_gallery == 'medium' || $image_size_gallery == 'large' || $image_size_gallery == 'full') {
			$slider_size = get_option($image_size_gallery . '_size_w');
		} else {
			$slider_size_array = cmsms_image_thumbnail_list();
			
			$slider_size = $slider_size_array[$image_size_gallery]['width'];
		}
	}
	
	if ($content != null) {
		if ($layout == 'hover') {
			$out .= '<script type="text/javascript">' . 
					'jQuery(document).ready(function () { ' . 
						'jQuery("#cmsms_hover_slider_' . $unique_id . '").cmsmsHoverSlider( { ' . 
							'sliderBlock : "#cmsms_hover_slider_' . $unique_id . '", ' . 
							'sliderItems : ".cmsms_hover_slider_items", ' . 
							'thumbWidth : "100", ' . 
							'thumbHeight : "60", ' . 
							'activeSlide : ' . $hover_active . ', ' . 
							'pauseTime : ' . ($hover_pause * 1000) . ', ' . 
							'pauseOnHover : ' . $hover_pause_on_hover . ' ' . 
						'} );' . 
					'} );' . 
				'</script>' . 
			'<div id="cmsms_hover_slider_' . $unique_id . '" class="cmsms_hover_slider' . 
			(($classes != '') ? ' ' . $classes : '') . 
			'"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
			'>' . "\n" . 
			'<ul class="cmsms_hover_slider_items">' . "\n";
			
			
			foreach ($images as $image) { 
				$out .= '<li>' . 
					'<figure class="cmsms_hover_slider_full_img">' . 
						wp_get_attachment_image($image, 'post-thumbnail') . 
					'</figure>' . 
				'</li>';
			}
			
			$out .= '</ul>' . "\n" . 
			'</div>' . "\n";
		} elseif ($layout == 'slider') {
			$out .= '<div class="content_slider_wrap" style="max-width:' . $slider_size . 'px;"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
			'>' . "\n" . 
				'<script type="text/javascript">' . 
					'jQuery(document).ready(function () { ' . 
						'jQuery("#cmsms_slider_' . $unique_id . '.content_slider").owlCarousel( { ' . 
							'singleItem : true, ' . 
							(($slider_effect == 'slide') ? 'transitionStyle: false, ' : 'transitionStyle: "fade", ') . 
							(($slider_rewind != 'true') ? 'rewindNav: false, ' : '') . 
							'rewindSpeed : ' . $slider_rewind_speed . ', ' . 
							'slideSpeed : ' . $slider_animation_speed . ', ' . 
							'autoHeight : true, ' . 
							'paginationSpeed : 	' . $slider_animation_speed . ', ' . 
							(($slider_autoplay != 'true') ? 'autoPlay : false, ' : 'autoPlay : ' . ($slider_slideshow_speed * 1000) . ',') . 
							(($slider_pause_on_hover == 'true') ? 'stopOnHover: true, ' : '') . 
							(($slider_nav_control != 'true') ? 'pagination: false, ' : '') . 
							(($slider_nav_arrow == 'true') ? 'navigation : true, ' : '') . 
							'navigationText : 	[ ' . 
								'"<span class=\"cmsms_prev_arrow\"><span></span></span>", ' . 
								'"<span class=\"cmsms_next_arrow\"><span></span></span>" ' . 
							'] ' . 
						'} );' . 
					'} );' . 
				'</script>' . "\n" . 
				'<div id="cmsms_slider_' . $unique_id . '" class="content_slider owl-carousel' . 
				(($classes != '') ? ' ' . $classes : '') . 
				'">' . "\n";
			
			
			foreach ($images as $image) { 
				$out .= '<div class="item">' . 
					wp_get_attachment_image($image, $image_size_slider) . 
				'</div>';
			}
			
			$out .= '</div>' . "\n" . 
			'</div>' . "\n";
		} else {
			$out .= '<div class="cmsms_gallery' .  
			(($classes != '') ? ' ' . $classes : '') . 
			'"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
			'>' . "\n" . 
			'<ul>' . "\n";
			
			if ($gallery_links == 'none') {
				foreach ($images as $image) { 
					$out .= '<li class="' . $new_gallery_col . ((get_post_field('post_excerpt', $image) != '') ? ' cmsms_caption' : '') . '">' . 
						'<figure>' . 
							wp_get_attachment_image($image, $image_size_gallery) . 
							((get_post_field('post_excerpt', $image) != '') ? '<figcaption>' . get_post_field('post_excerpt', $image) . '</figcaption>' : '') . 
						'</figure>' . 
					'</li>';
				}
			} else {
				foreach ($images as $image) { 
					$image_src = wp_get_attachment_image_src($image, 'full');
					
					$out .= '<li class="' . $new_gallery_col . ((get_post_field('post_excerpt', $image) != '') ? ' cmsms_caption' : '') . '">' . "\n" . 
						'<figure>' . 
							'<a'. (($gallery_links == 'blank') ? ' target="_blank"' : '') . ' href="' . $image_src[0] . '"' . (($gallery_links == 'lightbox') ? ' rel="ilightbox[' . $unique_id . ']"' : '') . '>' . 
								wp_get_attachment_image($image, $image_size_gallery) . 
							'</a>' . 
							((get_post_field('post_excerpt', $image) != '') ? '<figcaption>' . get_post_field('post_excerpt', $image) . '</figcaption>' : '') . 
						'</figure>' . 
					'</li>' . "\n";
				}
			}
			
			$out .= '</ul>' . "\n" . 
			'</div>' . "\n";
		}
		
		return $out;
	}
}

add_shortcode('cmsms_gallery', 'cmsms_gallery');



/**
 * Quotes
 */
function cmsms_quotes($atts, $content = null) {
    $new_atts = apply_filters('cmsms_quotes_atts_filter', array( 
		'mode' => 				'', 
		'columns' => 			'2', 
		'speed' => 				'10', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'quotes';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	if ($columns == '4') {
		$new_columns = 'quote_four';
	} elseif ($columns == '3') {
		$new_columns = 'quote_three';
	} elseif ($columns == '2') {
		$new_columns = 'quote_two';
	} else {
		$new_columns = 'quote_one';
	}
	
	
	global $quote_out,
		$quote_mode,
		$quote_counter,
		$column_count;
	
	
	$column_count = $columns;
	
	$unique_id = uniqid();
	
	$quote_mode = $mode;
	
	$quote_out = '';
	
	$quotes_out = '';
	
	$quote_counter = 0;
	
	
	do_shortcode($content);
	
	
	if ($quote_mode == 'slider') {
		$quotes_out .= '<div class="cmsms_quotes_slider_wrap"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n" . 
			'<script type="text/javascript">' . 
				'jQuery(document).ready(function () { ' . 
					'jQuery("#cmsms_quotes_slider_' . $unique_id . '").owlCarousel( { ' . 
						'singleItem : true, ' . 
						(($speed == 0) ? 'autoPlay : false, ' : 'autoPlay : ' . ($speed * 1000) . ',') . 
						'stopOnHover: true, ' . 
						'pagination: false, ' . 
						'navigation : true, ' . 
						'navigationText : 	[ ' . 
							'"<span class=\"cmsms_prev_arrow\"><span></span></span>", ' . 
							'"<span class=\"cmsms_next_arrow\"><span></span></span>" ' . 
						'] ' . 
					'} );' . 
				'} );' . 
			'</script>' . "\n" . 
			'<div id="cmsms_quotes_slider_' . $unique_id . '" class="cmsms_quotes_slider owl-carousel' . 
			(($classes != '') ? ' ' . $classes : '') . 
			'">' . "\n" . 
				$quote_out . 
			'</div>' . "\n" . 
		'</div>';
	} else {
		$quotes_out .= '<div class="quote_grid' . ' ' . $new_columns . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n" . 
		'<div class="quote_vert"></div>' . 
			'<div class="quotes_list">' . "\n" . 
				$quote_out . 
			'</div>' . "\n" . 
		'</div>';
	}
	
	
	return $quotes_out;
}

add_shortcode('cmsms_quotes', 'cmsms_quotes');

/**
 * Single Quote
 */
function cmsms_quote($atts, $content = null) {
    $new_atts = apply_filters('cmsms_quote_atts_filter', array( 
		'image' => 		'', 
		'name' => 		'', 
		'subtitle' => 	'', 
		'link' => 		'', 
		'website' => 	'', 
		'classes' => 	'' 
    ) );
	
	
	$shortcode_name = 'quote';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $quote_out,
		$quote_mode,
		$quote_counter,
		$column_count,
		$quote_content,
		$quote_image,
		$quote_name,
		$quote_subtitle,
		$quote_link,
		$quote_website;
	
	
	$quote_counter++;
	
	
	if ($content == null || $content == "<br />\n") {
		$quote_content = __('Enter quote text here', 'cmsms_content_composer');
	} else {
		$quote_content = $content;
	}
	
	$quote_image = 		$image;
	$quote_name = 		$name;
	$quote_subtitle = 	$subtitle;
	$quote_link = 		$link;
	$quote_website = 	$website;
	
	
	$quote_out .= '<div class="cmsms_quote' . 
		(($classes != '') ? ' ' . $classes : '') . 
	'">' . "\n" . 
	
		load_template_part('framework/postType/quote/' . $quote_mode) . 
		
	'</div>' . "\n";
	
	
	if ($quote_mode == 'grid' && (($quote_counter % $column_count) == 0)) {
		$quote_out .= '</div><div class="quotes_list">' . "\n";
	}
}

add_shortcode('cmsms_quote', 'cmsms_quote');



/**
 * Pricing Table Items
 */
function cmsms_pricing_table_items($atts, $content = null) {
    $new_atts = apply_filters('cmsms_pricing_table_items_atts_filter', array( 
		'columns' => 			'4', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'pricing-table-items';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $price_out,
		$price_columns,
		$style_pricing;
	
	
	$out = '';
	
	$price_out = '';
	
	
	if ($columns == '4') {
		$price_columns = 'pricing_four';
	} elseif ($columns == '3') {
		$price_columns = 'pricing_three';
	} elseif ($columns == '2') {
		$price_columns = 'pricing_two';
	} else {
		$price_columns = 'pricing_one';
	}
	
	
	do_shortcode($content);
	
	
	$out .= (($style_pricing != '') ? '<style type="text/css">' . "\n" . $style_pricing . '</style> ' . "\n" : '');
	
	$out .= '<div class="cmsms_pricing_table' . ' ' . $price_columns . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		$price_out . 
	'</div>' . "\n";
	
	return $out;
}

add_shortcode('cmsms_pricing_table_items', 'cmsms_pricing_table_items');

/**
 * Single Pricing Table Items
 */
function cmsms_pricing_table_item($atts, $content = null) {
    $new_atts = apply_filters('cmsms_pricing_table_item_atts_filter', array( 
		'price' => 					'100', 
		'coins' => 					'', 
		'currency' => 				'$', 
		'period' => 				'', 
		'features' => 				'', 
		'best' => 					'', 
		'best_bg_color' => 			'', 
		'best_text_color' => 		'', 
		'button_show' => 			'', 
		'button_title' => 			'', 
		'button_link' => 			'#', 
		'button_target' => 			'', 
		'button_style' => 			'', 
		'button_font_family' => 	'', 
		'button_font_size' => 		'', 
		'button_line_height' => 	'', 
		'button_font_weight' => 	'', 
		'button_font_style' => 		'', 
		'button_padding_hor' => 	'', 
		'button_border_width' => 	'', 
		'button_border_style' => 	'', 
		'button_border_radius' => 	'', 
		'button_bg_color' => 		'', 
		'button_text_color' => 		'', 
		'button_border_color' => 	'', 
		'button_bg_color_h' => 		'', 
		'button_text_color_h' => 	'', 
		'button_border_color_h' => 	'', 
		'button_icon' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'pricing-table-item';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	if ($button_font_family != '') {
		$font_family_array = explode(':', $button_font_family);
		
		$font_family_name = "'" . $font_family_array[0] . "'";
		
		
		cmsms_theme_google_font($button_font_family, $font_family_array[0]);
	}
	
	
	if (
		$button_style != '' || 
		$button_font_family != '' || 
		$button_font_size != '' || 
		$button_line_height != '' || 
		$button_font_weight != '' || 
		$button_font_style != '' || 
		$button_padding_hor != '' || 
		$button_border_width != '' || 
		$button_border_style != '' || 
		$button_border_radius != '' || 
		$button_bg_color != '' || 
		$button_text_color != '' || 
		$button_border_color != '' || 
		$button_bg_color_h != '' || 
		$button_text_color_h != '' || 
		$button_border_color_h != '' 
	) {
		$button_custom_styles = 'true';
	} else {
		$button_custom_styles = 'false';
	}
	
	
	$feature_array = explode('||', $features);
	
	
	global $price_out,
		$style_pricing;
		
		
	if ($best == 'true') {
		if ($best_bg_color != '') {
			$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' { ' . 
				"\n\t" . cmsms_color_css('background-color', $best_bg_color) . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($best_text_color != '') {
			$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .pricing_title, ' . 
			'#cmsms_pricing_item_' . $unique_id . ' .pricing_title *, ' . 
			'#cmsms_pricing_item_' . $unique_id . ' .cmsms_price_wrap, ' . 
			'#cmsms_pricing_item_' . $unique_id . ' .cmsms_price_wrap *, ' . 
			'#cmsms_pricing_item_' . $unique_id . ' .feature_list, ' . 
			'#cmsms_pricing_item_' . $unique_id . ' .feature_list * { ' . 
				"\n\t" . cmsms_color_css('color', $best_text_color) . 
			"\n" . '} ' . "\n";
		}
	}
	
	
	if ($button_show == 'true') {
		$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button:before { ' . 
			"\n\t" . 'margin-right:' . (($button_title != '') ? '.5em; ' : '0;') . 
			"\n\t" . 'margin-left:0; ' . 
			"\n\t" . 'vertical-align:baseline; ' . 
		"\n" . '} ' . "\n\n";
	
		if ($button_custom_styles == 'true') {
			$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button { ' . 
				(($button_font_family != '') ? "\n\t" . 'font-family:' . str_replace('+', ' ', $font_family_name) . '; ' : '') . 
				(($button_font_size != '') ? "\n\t" . 'font-size:' . $button_font_size . 'px; ' : '') . 
				(($button_line_height != '') ? "\n\t" . 'line-height:' . $button_line_height . 'px; ' : '') . 
				(($button_font_weight != '') ? "\n\t" . 'font-weight:' . $button_font_weight . '; ' : '') . 
				(($button_font_style != '') ? "\n\t" . 'font-style:' . $button_font_style . '; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-right:' . $button_padding_hor . 'px; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-left:' . $button_padding_hor . 'px; ' : '') . 
				(($button_border_width != '') ? "\n\t" . 'border-width:' . $button_border_width . 'px; ' : '') . 
				(($button_border_style != '') ? "\n\t" . 'border-style:' . $button_border_style . '; ' : '') . 
				(($button_border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $button_border_radius . '; ' . "\n\t" . 'border-radius:' . $button_border_radius . '; ' : '') . 
				(($button_bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color) : '') . 
				(($button_text_color != '') ? "\n\t" . cmsms_color_css('color', $button_text_color) : '') . 
				(($button_border_color != '') ? "\n\t" . cmsms_color_css('border-color', $button_border_color) : '') . 
			"\n" . '} ' . "\n";
			
			$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button:hover { ' . 
				(($button_bg_color_h != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color_h) : '') . 
				(($button_text_color_h != '') ? "\n\t" . cmsms_color_css('color', $button_text_color_h) : '') . 
				(($button_border_color_h != '') ? "\n\t" . cmsms_color_css('border-color', $button_border_color_h) : '') . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($button_style != '') {
			if (
				$button_style == 'cmsms_but_bg_slide_left' || 
				$button_style == 'cmsms_but_bg_slide_right' || 
				$button_style == 'cmsms_but_bg_slide_top' || 
				$button_style == 'cmsms_but_bg_slide_bottom' || 
				$button_style == 'cmsms_but_bg_expand_vert' || 
				$button_style == 'cmsms_but_bg_expand_hor' || 
				$button_style == 'cmsms_but_bg_expand_diag' 
			) {
				if ($button_bg_color != '') {
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_left:hover, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_right:hover, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_top:hover, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_bottom:hover, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_vert:hover, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_hor:hover, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_diag:hover { ' . 
						"\n\t" . cmsms_color_css('background-color', $button_bg_color) . 
					"\n" . '} ' . "\n";
				}
				
				if ($button_bg_color_h != '') {
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_left:after, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_right:after, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_top:after, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_bottom:after, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_vert:after, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_hor:after, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_diag:after { ' . 
						"\n\t" . cmsms_color_css('background-color', $button_bg_color_h) . 
					"\n" . '} ' . "\n";
				}
			}
			
			
			if (
				$button_style == 'cmsms_but_icon_dark_bg' || 
				$button_style == 'cmsms_but_icon_light_bg' || 
				$button_style == 'cmsms_but_icon_divider' || 
				$button_style == 'cmsms_but_icon_inverse' 
			) {
				$but_icon_pad = ($button_padding_hor != '' ? $button_padding_hor : '20') + ($button_line_height != '' ? $button_line_height : '40');
				
				if ($button_padding_hor != '' || $button_line_height != '') {
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_dark_bg, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_light_bg, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider, ' .  
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse { ' . 
						"\n\t" . 'padding-left:' . $but_icon_pad . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_dark_bg:before, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_light_bg:before, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:before, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:before, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_dark_bg:after, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_light_bg:after, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:after, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:after { ' . 
						"\n\t" . 'width:' . $button_line_height . 'px; ' . 
					"\n" . '} ' . "\n";
				}
				
				
				if ($button_border_color != '' || $button_border_color_h != '') {
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:after { ' . 
						"\n\t" . cmsms_color_css('border-color', $button_border_color) . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:hover:after { ' . 
						"\n\t" . cmsms_color_css('border-color', $button_border_color_h) . 
					"\n" . '} ' . "\n";
				}
				
				
				if ($button_style == 'cmsms_but_icon_inverse') {
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:before { ' . 
						(($button_text_color_h != '') ? "\n\t" . cmsms_color_css('color', $button_text_color_h) : '') . 
					"\n" . '} ' . "\n";
				
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:after { ' . 
						(($button_bg_color_h != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color_h) : '') . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:hover:before { ' . 
						(($button_text_color != '') ? "\n\t" . cmsms_color_css('color', $button_text_color) : '') . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:hover:after { ' . 
						(($button_bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color) : '') . 
					"\n" . '} ' . "\n";
				}
			}
			
			
			if (
				$button_style == 'cmsms_but_icon_slide_left' || 
				$button_style == 'cmsms_but_icon_slide_right' 
			) {
				if ($button_padding_hor != '') {
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_left, ' . 
					'#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_right { ' . 
						"\n\t" . 'padding-left:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'padding-right:' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_left:before { ' . 
						"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'left:-' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_left:hover:before { ' . 
						"\n\t" . 'left:0; ' . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_right:before { ' . 
						"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'right:-' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsms_pricing_item_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_right:hover:before { ' . 
						"\n\t" . 'right:0; ' . 
					"\n" . '} ' . "\n";
				}
			}
		}
	}
	
	
	$price_out .= '<div id="cmsms_pricing_item_' . $unique_id . '" class="cmsms_pricing_item' . 
	(($best == 'true') ? ' pricing_best' : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		'<h1 class="pricing_title">' . $content . '</h1>' . "\n" . 
		'<div class="cmsms_price_wrap">' . "\n" . 
		'<span class="cmsms_currency">' . $currency . '</span>' . "\n" . 
		'<span class="cmsms_price">' . $price . '</span>' . "\n" . 
		(($coins != '') ? '<span class="cmsms_coins">.' . $coins . '</span>' . "\n" : '') . 
		(($period != '') ? '<br /><span class="cmsms_period">' . $period . '</span>' . "\n" : '') . 
		'</div>' . "\n";
		
		if (!empty($feature_array)) {
			$price_out .= '<ul class="feature_list">' . "\n";
		}
		
		
		foreach ($feature_array as $feature) { 
			$feature_atts = explode('|', $feature);
			
			
			$feature_atts = preg_replace('/^title\{([^\}]*)\}/','$1', $feature_atts);
			
			$feature_atts = preg_replace('/^link\{([^\}]*)\}/','$1', $feature_atts);
			
			$feature_atts = preg_replace('/^icon\{([^\}]*)\}/','$1', $feature_atts);
			 
			$price_out .= '<li>' . 
			((isset($feature_atts[2]) && $feature_atts[2] != '') ? '<span class="feature_icon ' . $feature_atts[2] . '">' : '') . 
			((isset($feature_atts[1]) && $feature_atts[1] != '') ? '<a href="' . $feature_atts[1] . '" class="feature_link">' : '') . 
			$feature_atts[0] . 
			((isset($feature_atts[1]) && $feature_atts[1] != '') ? '</a>' : '') . 
			((isset($feature_atts[2]) && $feature_atts[2] != '') ? '</span>' : '') . 
			'</li>' . "\n";
		}
		
		
		if (!empty($feature_array)) { 
			$price_out .= '</ul>' . "\n";
		}
		
		
		if ($button_show == 'true') {
			$price_out .= '<a href="' . $button_link . '" class="cmsms_button' . 
			(($button_style != '') ? ' cmsms_but_clear_styles ' . $button_style : '') . 
			(($button_icon != '') ? ' ' . $button_icon : '') . 
			'"' . 
			(($button_target == 'blank') ? ' target="_blank"' : '') . 
			'><span>' . $button_title . '</span></a>' . "\n";
		}
		
	$price_out .= '</div>' . "\n";
}

add_shortcode('cmsms_pricing_table_item', 'cmsms_pricing_table_item');



/**
 * Google Map Markers
 */
function cmsms_google_map_markers($atts, $content = null) {
    $new_atts = apply_filters('cmsms_google_map_markers_atts_filter', array( 
		'address_type' => 			'', 
		'address' => 				'', 
		'latitude' => 				'', 
		'longitude' => 				'', 
		'type' => 					'', 
		'zoom' => 					'14', 
		'height_type' => 			'', 
		'height' => 				'300', 
		'scroll_wheel' => 			'', 
		'double_click_zoom' => 		'', 
		'pan_control' => 			'', 
		'zoom_control' => 			'', 
		'map_type_control' => 		'', 
		'scale_control' => 			'', 
		'street_view_control' => 	'', 
		'overview_map_control' => 	'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'google-map-markers';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $map_out;
	
	
	$map_out = '';
	
	
	do_shortcode($content);
	
	
	$unique_id = uniqid();
	
	
	$maps_out = (($height_type == 'fixed') ? '<style type="text/css">' . "\n" . 
		'#google_map_' . $unique_id . '{' . "\n\t" . 
			'height: ' . $height . 'px;' . "\n" . 
		'}' . "\n" . 
	'</style>' . "\n" : '') . 
    '<script type="text/javascript">' . 
        'jQuery(document).ready(function () { ' . 
            'jQuery("#google_map_' . $unique_id . '").gMap( { ';
				if ($address_type == 'address') {
					$maps_out .= 'address: "' . $address . '", ' ;
				} else {
					$maps_out .= 'markers: {' . 
						(($latitude != '') ? 'latitude: ' . $latitude  . ', ' : '') . 
						(($longitude != '') ? 'latitude: ' . $longitude  . ' ' : '') . 
					'},';
				}
				$maps_out .= 'maptype: "' . $type . '", ' . 
				'zoom: ' . $zoom . ', ' . 
				(($scroll_wheel == 'true') ? 'scrollwheel: ' . $scroll_wheel  . ', ' : '') . 
				(($double_click_zoom == 'true') ? 'doubleClickZoom: ' . $double_click_zoom  . ', ' : '') . 
				'controls: {' . 
					(($pan_control == 'true') ? 'panControl: ' . $pan_control  . ', ' : '') . 
					(($zoom_control == 'true') ? 'zoomControl: ' . $zoom_control  . ', ' : '') . 
					(($map_type_control == 'true') ? 'mapTypeControl: ' . $map_type_control  . ', ' : '') . 
					(($scale_control == 'true') ? 'scaleControl: ' . $scale_control  . ', ' : '') . 
					(($street_view_control == 'true') ? 'streetViewControl: ' . $street_view_control  . ', ' : '') . 
					(($overview_map_control == 'true') ? 'overviewMapControl: ' . $overview_map_control  . ', ' : '') . 
				'},';
				$maps_out .= 'markers: [' . 
					$map_out . 
				']';
			$maps_out .= ' } );' . 
        ' } );' . 
    '</script>' . "\n" . 
	cmsms_divpdel((($height_type != 'fixed') ? '<div class="resizable_block">' . "\n" : '') . 
		'<div id="google_map_' . $unique_id . '" class="google_map' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'></div>' . "\n" . 
	(($height_type != 'fixed') ? '</div>' . "\n" : ''));
	
	
	return $maps_out;
}

add_shortcode('cmsms_google_map_markers', 'cmsms_google_map_markers');

/**
 * Google Map Marker
 */
function cmsms_google_map_marker($atts, $content = null) {
    $new_atts = apply_filters('cmsms_google_map_marker_atts_filter', array( 
		'address_type' => 	'', 
		'address' => 		'', 
		'latitude' => 		'', 
		'longitude' => 		'', 
		'popup' => 			''
    ) );
	
	
	$shortcode_name = 'google-map-marker';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $map_out;
	
	
	$map_out .= '{';
	if ($address_type == 'address') { 
		$map_out .= 'address: "' . $address . '",'; 
	} elseif  ($address_type == 'coordinates') { 
		$map_out .= 'latitude: ' . $latitude . ',' . 
		'longitude: ' . $longitude . ',';
	} 
	
	$map_out .= (($content != '') ? 'html: "' . $content . '",' : '') . 
	(($popup == 'true') ? 'popup: true' : '');
	$map_out .= '},';
}

add_shortcode('cmsms_google_map_marker', 'cmsms_google_map_marker');



/**
 * Social Sharing
 */
function cmsms_social($atts, $content = null) {
    $new_atts = apply_filters('cmsms_social_atts_filter', array( 
		'facebook' => 			'', 
		'twitter' => 			'', 
		'google' => 			'', 
		'pinterest' => 			'', 
		'type' => 				'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'social';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$out = '';
	
	if ($facebook == 'true' || $twitter == 'true' || $google == 'true' || $pinterest == 'true') {
		$out .= '<div class="cmsms_sharing' . 
		(($type == 'vertical') ? ' social_vertical' : '') . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n";
		
		if ($twitter == 'true') {
			$out .= '<div class="share_wrap">' . "\n" . 
				'<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">' . __('Tweet', 'cmsms_content_composer') . '</a>' . "\n" . 
				'<script type="text/javascript">
					!function (d, s, id) { 
						var js = undefined, 
							fjs = d.getElementsByTagName(s)[0];
						
						if (d.getElementById(id)) { 
							d.getElementById(id).parentNode.removeChild(d.getElementById(id));
						}
						
						js = d.createElement(s);
						js.id = id;
						js.src = "//platform.twitter.com/widgets.js";
						
						fjs.parentNode.insertBefore(js, fjs);
					} (document, "script", "twitter-wjs");
				</script>' . 
			'</div>' . "\n";
		}
		
		if ($google == 'true') {
			$out .= '<div class="share_wrap">' . "\n" . 
				'<div class="g-plusone" data-size="medium"></div>
				<script type="text/javascript">
					(function () { 
						var po = document.createElement("script"), 
							s = document.getElementsByTagName("script")[0];
						
						po.type = "text/javascript";
						po.async = true;
						po.src = "https://apis.google.com/js/plusone.js";
						
						s.parentNode.insertBefore(po, s);
					} )();
				</script>' . 
			'</div>' . "\n";
		}
		
		if ($pinterest == 'true') {
			$out .= '<div class="share_wrap">' . "\n" . 
				'<a href="http://pinterest.com/pin/create/button/?url=url_text&media=http%3A%2F%2Ftext&description=descr_text" class="pin-it-button" count-layout="horizontal">
					<img border="0" src="//assets.pinterest.com/images/PinExt.png" title="' . __('Pin It', 'cmsms_content_composer') . '" />
				</a>
				<script type="text/javascript">
					(function (d, s, id) { 
						var js = undefined, 
							fjs = d.getElementsByTagName(s)[0];
						
						if (d.getElementById(id)) { 
							d.getElementById(id).parentNode.removeChild(d.getElementById(id));
						}
						
						js = d.createElement(s);
						js.id = id;
						js.src = "//assets.pinterest.com/js/pinit.js";
						
						fjs.parentNode.insertBefore(js, fjs);
					} (document, "script", "pinterest-wjs"));
				</script>' . 
			'</div>' . "\n";
		}
		
		if ($facebook == 'true') {
			$out .= '<div class="share_wrap">' . "\n" . 
				'<div class="fb-like" data-send="false" data-layout="button_count" data-width="200" data-show-faces="false" data-font="arial"></div>
				<script type="text/javascript">
					(function (d, s, id) { 
						var js = undefined, 
							fjs = d.getElementsByTagName(s)[0];
						
						if (d.getElementById(id)) { 
							d.getElementById(id).parentNode.removeChild(d.getElementById(id));
						}
						
						js = d.createElement(s);
						js.id = id;
						js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
						
						fjs.parentNode.insertBefore(js, fjs);
					} (document, "script", "facebook-jssdk"));
				</script>' . "\n" . 
			'</div>' . "\n";
		}
		
		$out .= '<div class="cl"></div>' . "\n" . 
		'</div>' . "\n";
	}
	
	return $out;
}

add_shortcode('cmsms_social', 'cmsms_social');



/**
 * Custom HTML
 */
function cmsms_html($atts, $content = null) {
    extract(shortcode_atts(array( 
		'classes' => 	'' 
    ), $atts));
	
	
	$out = '';
	
	
	if ($content != null ) {
		$out .= cmsms_divpdel('<div class="custom_html' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">' . "\n" . 
		wpautop(base64_decode($content)) . 
		'</div>' . "\n");
	}
	
	
	return $out;
}

add_shortcode('cmsms_html', 'cmsms_html');



/**
 * Custom JS
 */
function cmsms_js($atts, $content = null) {
    extract(shortcode_atts(array( 
		'classes' => 	'' 
    ), $atts));
	
	
	$out = '';
	
	
	if ($content != null ) {
		$out .= '<div class="custom_js' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">' . "\n" . 
		'<script type="javascript">' . "\n" . 
			base64_decode($content) . 
		'</script>' . "\n" . 
		'</div>' . "\n";
	}
	
	
	return $out;
}


add_shortcode('cmsms_js', 'cmsms_js');



/**
 * Custom CSS
 */
function cmsms_css($atts, $content = null) {
    extract(shortcode_atts(array( 
		'classes' => 	'' 
    ), $atts));
	
	
	$out = '';
	
	
	if ($content != null ) {
		$out .= '<div class="custom_css' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">' . "\n" . 
		'<style type="text/css">' . "\n" . 
			base64_decode($content) . 
		'</style>' . "\n" . 
		'</div>' . "\n";
	}
	
	
	return $out;
}


add_shortcode('cmsms_css', 'cmsms_css');



/**
 * Sidebar
 */
function cmsms_sidebar($atts, $content = null) { 
    extract(shortcode_atts(array( 
		'sidebar' => 	'', 
		'layout' => 	'', 
		'classes' => 	'' 
    ), $atts));
	
	
	$layout_sidebar = '';
	
	$out = '';
	
	
	if ($layout == '') {
		$layout_sidebar = 'sidebar_layout_11';
	} elseif ($layout == '1212') {
		$layout_sidebar = 'sidebar_layout_1212';
	} elseif ($layout == '1323') {
		$layout_sidebar = 'sidebar_layout_1323';
	} elseif ($layout == '2313') {
		$layout_sidebar = 'sidebar_layout_2313';
	} elseif ($layout == '1434') {
		$layout_sidebar = 'sidebar_layout_1434';
	} elseif ($layout == '3414') {
		$layout_sidebar = 'sidebar_layout_3414';
	} elseif ($layout == '131313') {
		$layout_sidebar = 'sidebar_layout_131313';
	} elseif ($layout == '121414') {
		$layout_sidebar = 'sidebar_layout_121414';
	} elseif ($layout == '141214') {
		$layout_sidebar = 'sidebar_layout_141214';
	} elseif ($layout == '141412') {
		$layout_sidebar = 'sidebar_layout_141412';
	} elseif ($layout == '14141414') {
		$layout_sidebar = 'sidebar_layout_14141414';
	}
	
	if(!function_exists('get_dynamic_sidebar')){
		function get_dynamic_sidebar($sidebar = 1) {
			$sidebar_contents = '';
			
			ob_start();
			
			dynamic_sidebar($sidebar);
			
			$sidebar_contents = ob_get_clean();
			
			return $sidebar_contents;
		}
	}
	
	if ($sidebar != '') {
		$out = '<div class="cmsms_sidebar ' . $layout_sidebar . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">' . 
		get_dynamic_sidebar($sidebar);
		
		$out .= '<div class="cl"></div>' . "\n" . 
		'</div>';
	}
	
	
	return $out;
}

add_shortcode('cmsms_sidebar', 'cmsms_sidebar');



/**
 * Twitter Stripe
 */
function cmsms_twitter($atts, $content = null) { 
    $new_atts = apply_filters('cmsms_twitter_atts_filter', array( 
		'user' => 				'', 
		'count' => 				'', 
		'date' => 				'', 
		'control' => 			'', 
		'autoplay' => 			'', 
		'speed' => 				'1', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'twitter';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$out = '';
	
	
	$unique_id = uniqid();
	
	
	if ($user != '') {
		$out .= '<div><script type="text/javascript">' . 
					'jQuery(document).ready(function () { ' . 
						'jQuery("#cmsms_twitter_' . $unique_id . '").owlCarousel( { ' . 
							'singleItem : true, ' . 
							'transitionStyle: "fade", ' . 
							'stopOnHover: true, ' . 
							'pagination: false, ' . 
							(($control == 'true') ? 'navigation : true, ' : '') . 
							(($autoplay != 'true') ? 'autoPlay : false, ' : 'autoPlay : ' . ($speed * 1000) . ',') . 
							'navigationText : 	[ ' . 
								'"<span class=\"cmsms_prev_arrow\"><span></span></span>", ' . 
								'"<span class=\"cmsms_next_arrow\"><span></span></span>" ' . 
							'] ' . 
						'} );' . 
					'} );' . 
				'</script></div>' . "\n" . 
		'<div class="cmsms-icon-twitter-bird-1 twr_icon"></div>' . "\n" . 
		'<div id="cmsms_twitter_' . $unique_id . '" class="owl-carousel cmsms_twitter' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n";
		
			$tweets = cmsms_get_tweets($user, $count);
			
			if ($tweets != '') {
				foreach ($tweets as $t) {
					$out .= '<div class="cmsms_twitter_item">' . "\n" . 
						(($date == 'true') ? '<abbr title="" class="published">' . human_time_diff( $t['time'], current_time('timestamp') ) . ' ' . __('ago', 'cmsms_content_composer') . '</abbr>' : '') . 
						'<span class="cmsms_twitter_item_content">' . "\n" . $t['text'] . '</span>' . "\n" . 
					'</div>' . "\n";
				}
			} else {
				echo '<div class="cmsms_notice cmsms_notice_error cmsms-icon-cancel-6">' . "\n" . 
					'<div class="notice_content">' . "\n" . 
						'<p>' . __('Please add your Twitter API keys', 'cmsmasters') . ', ' . '<a target="_blank" href="http://docs.cmsmasters.net/admin2/twitter-functionality/">' . __('read more how', 'cmsmasters') . '</a></p>' . "\n" . 
					'</div>' . "\n" . 
				'</div>' . "\n";
			}
		
		$out .= '</div>' . "\n";
	}
	
	
	return $out;
}

add_shortcode('cmsms_twitter', 'cmsms_twitter');



/**
 * Posts Slider
 */
function cmsms_posts_slider($atts, $content = null) { 
    $new_atts = apply_filters('cmsms_posts_slider_atts_filter', array( 
		'orderby' => 				'', 
		'order' => 					'', 
		'post_type' => 				'', 
		'blog_categories' => 		'', 
		'portfolio_categories' => 	'', 
		'columns' => 				'', 
		'amount' => 				'', 
		'count' => 					'', 
		'pause' => 					'', 
		'speed' => 					'', 
		'blog_metadata' => 			'', 
		'portfolio_metadata' => 	'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'posts-slider';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $cmsms_post_metadata;
	
	$cmsms_post_metadata = $blog_metadata;
	
	
	global $cmsms_project_metadata;
	
	$cmsms_project_metadata = $portfolio_metadata;
	
	
    $args = array( 
		'post_type' => 				$post_type,
		'orderby' => 				$orderby, 
		'order' => 					$order, 
		'posts_per_page' => 		$count, 
		'ignore_sticky_posts' => 	true 
	);
	
	
	if ($post_type == 'post' && $blog_categories != '') {
		$args['category_name'] = $blog_categories;
	} elseif ($post_type == 'project' && $portfolio_categories != '') {
		$cat_array = explode(",", $portfolio_categories);
		
		$args['tax_query'] = array(
			array( 
				'taxonomy' => 	'pj-categs', 
				'field' => 		'slug', 
				'terms' => 		$cat_array 
			)
		);
	}
	
	
	$query = new WP_Query($args);
	
	
	if ($post_type == 'post') {
		$columns = 1;
	}
	
	
	$amount_count = 0;
	
	$amount = ($amount == '' ? 1 : $amount);
	
	$pause = ($pause == '' ? 0 : $pause);
	
	
	$out = "";
	
	
	if ($query->have_posts()) : 
		
		$out .= "<div class=\"cmsms_posts_slider" . 
			(($classes != '') ? ' ' . $classes : '') . 
		"\" " . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		">
			<script type=\"text/javascript\">
				jQuery(document).ready(function () { 
					var container = jQuery('.cmsms_slider_{$unique_id}');
						containerWidth = container.width(), 
						firstPost = container.find('article'), 
						postMinWidth = Number(firstPost.css('minWidth').replace('px', '')), 
						postThreeColumns = (postMinWidth * 4) - 1;
						postTwoColumns = (postMinWidth * 3) - 1;
						postOneColumns = (postMinWidth * 2) - 1; 
					
					
					jQuery('.cmsms_slider_{$unique_id}').owlCarousel( {
						items : {$columns}, 
						itemsDesktop : false,
						itemsDesktopSmall : [postThreeColumns," . (($columns > 3) ? '3' : $columns) . "], 
						itemsTablet : [postTwoColumns," . (($columns > 2) ? '2' : $columns) . "], 
						itemsMobile : [postOneColumns,1], 
						transitionStyle : false, 
						rewindNav : true, 
						slideSpeed : 200, 
						paginationSpeed : 800, 
						rewindSpeed : 1000, " . 
						(($pause == '0') ? 'autoPlay : false, ' : 'autoPlay : ' . ($pause * 1000) . ', ') . 
						"stopOnHover : true, 
						autoHeight : true, 
						addClassActive : true, 
						responsiveBaseWidth : '.cmsms_slider_{$unique_id}', 
						pagination : false, 
						navigation : true, 
						navigationText : [ " . 
							'"<span class=\"cmsms_prev_arrow\"><span></span></span>", ' . 
							'"<span class=\"cmsms_next_arrow\"><span></span></span>" ' . 
						"] 
					} );
				} );
			</script>
			<div id=\"cmsms_owl_carousel_{$unique_id}\" class=\"" . 
				'cmsms_owl_slider ' . 
				'cmsms_slider_' . $unique_id . '">';
				
				
				if ($post_type == 'post') {
					$out .= '<div>';
				
						while ($query->have_posts()) : $query->the_post();
							
							if ($amount_count == $amount) {
								$out .= '</div><div>';
								
								$amount_count = 0;
							}
							
							if (get_post_format() != '') {
								$out .= load_template_part('framework/postType/posts-slider/blog/' . get_post_format());
							} else {
								$out .= load_template_part('framework/postType/posts-slider/blog/standard');
							}
							
							$amount_count ++;
							
						endwhile;
					
					$out .= '</div>';
				}
				
				
				if ($post_type == 'project') {
					while ($query->have_posts()) : $query->the_post();
						
						$out .= '<div>';
						
							if (get_post_format() != '') {
								$out .= load_template_part('framework/postType/posts-slider/portfolio/' . get_post_format());
							} else {
								$out .= load_template_part('framework/postType/posts-slider/portfolio/standard');
							}
						
						$out .= '</div>';
						
					endwhile;
				}
				
				
			$out .= '</div>' . 
		'</div>';
	
	endif;
	
	
	wp_reset_postdata();
	
	wp_reset_query();
	
	
	return $out;
}

add_shortcode('cmsms_posts_slider', 'cmsms_posts_slider');



/**
 * Blog
 */
function cmsms_blog($atts, $content = null) {
	$new_atts = apply_filters('cmsms_blog_atts_filter', array( 
		'orderby' => 			'date', 
		'order' => 				'DESC', 
		'count' => 				'12', 
		'categories' => 		'', 
		'layout' => 			'standard', 
		'layout_mode' => 		'', 
		'columns' => 			'', 
		'metadata' => 			'', 
		'filter' => 			'', 
		'filter_text' => 		'', 
		'filter_cats_text' => 	'', 
		'pagination' => 		'pagination', 
		'more_text' => 			'', 
		'classes' => 			'' 
	) );
	
	
	$shortcode_name = 'blog';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $cmsms_metadata;
	
	
	$cmsms_metadata = $metadata;
	
	
	$more_text = ($more_text != '') ? $more_text : __('Load More Posts', 'cmsmasters');
	
	
	$filter_text = ($filter_text != '') ? $filter_text : __('Filter', 'cmsmasters');
	
	
	$filter_cats_text = ($filter_cats_text != '') ? $filter_cats_text : __('All Categories', 'cmsmasters');
	
	
	$out = "<div class=\"cmsms_wrap_blog entry-summary\" id=\"blog_{$unique_id}\" data-meta=\"{$metadata}\">";
	
	
	if ( 
		$layout != 'standard' || 
		($layout == 'standard' && $pagination == 'more') 
	) {
		wp_enqueue_style('isotope');
		
		
		wp_enqueue_script('isotope');
		
		wp_enqueue_script('isotopeMode');
		
		
		$out .= "<script type=\"text/javascript\">
jQuery(document).ready(function () {
	(function ($) {
		if ($('#blog_{$unique_id}').find('article').length == '0') {
			return false;
		}
		
	
		startBlog( 
			'" . $unique_id . "', 
			'" . $layout . "', 
			'" . $layout_mode . "', 
			'" . CMSMS_CONTENT_COMPOSER_URL . "', 
			'" . $orderby . "', 
			'" . $order . "', 
			'" . $count . "', 
			'" . $categories . "' 
		);
	} )(jQuery);
} );
</script>
";

		if ($filter !== '') {
			$out .= "<div class=\"cmsms_post_filter_wrap\">
				<div class=\"cmsms_post_filter\">
					<span class=\"cmsms_post_filter_loader\"></span>
					<div class=\"cmsms_post_filter_block\">
						<a class=\"cmsms_post_filter_but cmsms-icon-menu button\">
							<span>" . $filter_text . "</span>
						</a>
						<ul class=\"cmsms_post_filter_list\">
							<li class=\"current\">
								<a class=\"button\" data-filter=\"article.post\"  title=\"" . $filter_cats_text . "\" href=\"javascript:void(0);\">
									<span>" . $filter_cats_text . "</span>
								</a>
							</li>";
							
							
							$cat_args = array( 
								'orderby' => 	'name' 
							);
							
							
							if ($categories != '') {
								$cat_array = explode(',', $categories);
								
								
								for ($i = 0; $i < count($cat_array); $i++) {
									$idObj = get_category_by_slug($cat_array[$i]);
									
									$cat_array[$i] = $idObj->term_id;
								}
							} else {
								$cat_array = $categories;
							}
							
							
							if (count($cat_array) == 1 && $categories != '') {
								$cat_args['child_of'] = $categories;
							} elseif (count($cat_array) > 1) {
								$cat_args['include'] = $cat_array;
							}
							
							
							$post_categs = get_terms('category', $cat_args);
							
							
							if (is_array($post_categs) && !empty($post_categs)) {
								foreach ($post_categs as $post_categ) {
									$out .= "<li>
										<a class=\"button\" href=\"#\" data-filter=\"article.post[data-category~='{$post_categ->slug}']\" title=\"{$post_categ->name}\">
											<span>{$post_categ->name}</span>
										</a>
									</li>";
								}
							}
							
						$out .= "</ul>
					</div>
				</div>
			</div>";
		}
	}
	
	$out .= '<div class="blog ' . 
		$layout . 
		(($layout_mode !== '') ? ' ' . $layout_mode : '') . 
		(($columns !== '') ? ' cmsms_' . $columns : '') . 
		(($classes !== '') ? ' ' . $classes : '') . 
	'">';
	
	
	$orderby = ($orderby == 'popular') ? 'meta_value_num' : $orderby;
	
	
	$args = array( 
		'post_type' => 				'post', 
		'orderby' => 				$orderby, 
		'order' => 					$order, 
		'posts_per_page' => 		$count, 
		'category_name' => 			$categories 
	);
	
	
	if ($pagination == 'more') {
		$args['ignore_sticky_posts'] = 1;
	}
	
	
	if ($pagination == 'pagination') {
		if (get_query_var('paged')) { 
			$paged = get_query_var('paged'); 
		} elseif (get_query_var('page')) { 
			$paged = get_query_var('page'); 
		} else { 
			$paged = 1; 
		}
		
		
		$args['paged'] = $paged;
	}
	
	
	if ($orderby == 'meta_value_num') {
		$args['meta_key'] = 'cmsms_likes';
	}
	
	
	$query = new WP_Query($args);
	
	
	if ($query->have_posts()) : 
		while ($query->have_posts()) : $query->the_post();
			if ($layout == 'columns') {
				if (get_post_format() != '') {
					$out .= load_template_part('framework/postType/blog/page/masonry/' . get_post_format());
				} else {
					$out .= load_template_part('framework/postType/blog/page/masonry/standard');
				}
			} elseif ($layout == 'timeline') {
				if (get_post_format() != '') {
					$out .= load_template_part('framework/postType/blog/page/timeline/' . get_post_format());
				} else {
					$out .= load_template_part('framework/postType/blog/page/timeline/standard');
				}
			} else {
				if (get_post_format() != '') {
					$out .= load_template_part('framework/postType/blog/page/default/' . get_post_format());
				} else {
					$out .= load_template_part('framework/postType/blog/page/default/standard');
				}
			}
		endwhile;
		
		
		if ($pagination == 'more') {
			wp_enqueue_style('mediaelement');
			
			wp_enqueue_style('wp-mediaelement');
			
			
			wp_enqueue_script('mediaelement');
			
			wp_enqueue_script('wp-mediaelement');
		}
	endif;
	
	
	$out .= '</div>';
	
	
	if ($pagination !== 'disabled') {
		$out .= '<div class="cmsms_wrap_more_posts">';
		
			if ($pagination == 'pagination' && $query->max_num_pages > 1) {
				$out .= pagination($query->max_num_pages);
			} elseif ($pagination == 'more' && $query->found_posts > $count) {
				$out .= "<div class=\"cmsms_wrap_post_loader\">
					<a href=\"javascript:void(0);\" class=\"cmsms_button cmsms_post_loader\">
						<span>" . $more_text . "</span>
					</a>
				</div>";
			}
		
		$out .= '</div>';
	}
	
	$out .= '</div>';
	
	
	wp_reset_postdata();
	
	wp_reset_query();
	
	
	return $out;
}

add_shortcode('cmsms_blog', 'cmsms_blog');



/**
 * Portfolio
 */
function cmsms_portfolio($atts, $content = null) {
	$new_atts = apply_filters('cmsms_portfolio_atts_filter', array( 
		'orderby' => 			'date', 
		'order' => 				'DESC', 
		'count' => 				'12', 
		'categories' => 		'', 
		'layout' => 			'grid', 
		'layout_mode' => 		'perfect', 
		'columns' => 			'4', 
		'metadata' => 			'', 
		'gap' => 				'large', 
		'filter' => 			'', 
		'filter_text' => 		'', 
		'filter_cats_text' => 	'', 
		'sorting' => 			'', 
		'sorting_name_text' => 	'', 
		'sorting_date_text' => 	'', 
		'pagination' => 		'pagination', 
		'more_text' => 			'', 
		'classes' => 			'' 
	) );
	
	
	$shortcode_name = 'portfolio';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $cmsms_pj_metadata;
	
	
	$cmsms_pj_metadata = $metadata;
	
	
	global $cmsms_pj_layout_mode;
	
	
	$cmsms_pj_layout_mode = $layout_mode;
	
	
	$more_text = ($more_text != '') ? $more_text : __('Load More Projects', 'cmsmasters');
	
	$filter_text = ($filter_text != '') ? $filter_text : __('Filter', 'cmsmasters');
	
	$filter_cats_text = ($filter_cats_text != '') ? $filter_cats_text : __('All Categories', 'cmsmasters');
	
	$sorting_name_text = ($sorting_name_text != '') ? $sorting_name_text : __('Name', 'cmsmasters');
	
	$sorting_date_text = ($sorting_date_text != '') ? $sorting_date_text : __('Date', 'cmsmasters');
	
	
	$out = "<div class=\"cmsms_wrap_portfolio entry-summary\" id=\"portfolio_{$unique_id}\" data-meta=\"{$metadata}\">
<script type=\"text/javascript\">
jQuery(document).ready(function () {
	(function ($) {
		if ($('#portfolio_{$unique_id}').find('article').length == '0') {
			return false;
		}
		
	
		startPortfolio( 
			'" . $unique_id . "', 
			'" . $layout . "', 
			'" . $layout_mode . "', 
			'" . CMSMS_CONTENT_COMPOSER_URL . "', 
			'" . $orderby . "', 
			'" . $order . "', 
			'" . $count . "', 
			'" . $categories . "' 
		);
	} )(jQuery);
} );
</script>
";
	
	
	if ($filter != '' || $sorting != '') {
		$out .= "<div class=\"cmsms_project_filter_wrap\">
			<div class=\"cmsms_project_filter\">
				<span class=\"cmsms_project_filter_loader\"></span>";
				
				if ($sorting != '') {
					$out .= "<div class=\"cmsms_project_sort_block\">
						<a href=\"#\" name=\"project_name\" title=\"" . $sorting_name_text . "\" class=\"button cmsms_project_sort_but" . (($orderby == 'name') ? " current" . (($order == 'DESC') ? " reversed" : "") : "") . "\">
							<span>" . $sorting_name_text . "</span>
						</a>
						<a href=\"#\" name=\"project_date\" title=\"" . $sorting_date_text . "\" class=\"button cmsms_project_sort_but" . (($orderby == 'date') ? " current" . (($order == 'DESC') ? " reversed" : "") : "") . "\">
							<span>" . $sorting_date_text . "</span>
						</a>
					</div>";
				}
				
				
				if ($filter != '') {
					$out .= "<div class=\"cmsms_project_filter_block\">
						<a class=\"cmsms_project_filter_but cmsms-icon-menu button\">
							<span>" . $filter_text . "</span>
						</a>
						<ul class=\"cmsms_project_filter_list\">
							<li class=\"current\">
								<a class=\"button\" data-filter=\"article.project\"  title=\"" . $filter_cats_text . "\" href=\"javascript:void(0);\">
									<span>" . $filter_cats_text . "</span>
								</a>
							</li>";
							
							
							if ($categories != '') {
								$cat_array = explode(',', $categories);
								
								
								for ($i = 0; $i < count($cat_array); $i++) {
									$idObj = get_term_by('slug', $cat_array[$i], 'pj-categs');
									
									$cat_array[$i] = $idObj->term_id;
								}
							} else {
								$cat_array = $categories;
							}
							
							
							$cat_args = array( 
								'orderby' => 	'name', 
								'include' => 	$cat_array 
							);
							
							
							$project_categs = get_terms('pj-categs', $cat_args);
							
							
							if (is_array($project_categs) && !empty($project_categs)) {
								foreach ($project_categs as $project_categ) {
									$out .= "<li>
										<a class=\"button\" href=\"#\" data-filter=\"article.project[data-category~='{$project_categ->slug}']\" title=\"{$project_categ->name}\">
											<span>{$project_categ->name}</span>
										</a>
									</li>";
								}
							}
						
						$out .= "</ul>
					</div>";
				}
				
			$out .= "</div>
		</div>";
	}
	
	$out .= '<div class="portfolio ' . $layout . ' ' . $gap . '_gap ' . $layout_mode . 
		(($layout != 'puzzle') ? ' cmsms_' . $columns : '') . 
		(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	$orderby = ($orderby == 'popular') ? 'meta_value_num' : $orderby;
	
	
	$args = array( 
		'post_type' => 				'project', 
		'orderby' => 				$orderby, 
		'order' => 					$order, 
		'posts_per_page' => 		$count 
	);
	
	if ($layout == 'puzzle') {
		$args['ignore_sticky_posts'] = true;
	}
	
	if ($categories != '') {
		$cat_array = explode(",", $categories);
		
		$args['tax_query'] = array( 
			array( 
				'taxonomy' => 'pj-categs', 
				'field' => 'slug', 
				'terms' => $cat_array 
			)
		);
	}
	
	
	if ($pagination == 'pagination') {
		if (get_query_var('paged')) { 
			$paged = get_query_var('paged'); 
		} elseif (get_query_var('page')) { 
			$paged = get_query_var('page'); 
		} else { 
			$paged = 1; 
		}
		
		
		$args['paged'] = $paged;
	}
	
	
	if ($orderby == 'meta_value_num') {
		$args['meta_key'] = 'cmsms_likes';
	}
	
	
	$query = new WP_Query($args);
	
	
	if ($query->have_posts()) : 
		while ($query->have_posts()) : $query->the_post();
			if ($layout == 'puzzle') {
				if (get_post_format() != '') {
					$out .= load_template_part('framework/postType/portfolio/page/puzzle/' . get_post_format());
				} else {
					$out .= load_template_part('framework/postType/portfolio/page/puzzle/standard');
				}
			} else {
				if (get_post_format() != '') {
					$out .= load_template_part('framework/postType/portfolio/page/grid/' . get_post_format());
				} else {
					$out .= load_template_part('framework/postType/portfolio/page/grid/standard');
				}
			}
		endwhile;
		
		
		if ($pagination == 'more') {
			wp_enqueue_style('mediaelement');
			
			wp_enqueue_style('wp-mediaelement');
			
			
			wp_enqueue_script('mediaelement');
			
			wp_enqueue_script('wp-mediaelement');
		}
	endif;
	
	
	$out .= '</div>';
	
	
	if ($pagination !== 'disabled') {
		$out .= '<div class="cmsms_wrap_more_projects">';
		
			if ($pagination == 'pagination' && $query->max_num_pages > 1) {
				$out .= pagination($query->max_num_pages);
			} elseif ($pagination == 'more' && $query->found_posts > $count) {
				$out .= "<div class=\"cmsms_wrap_project_loader\">
					<a href=\"javascript:void(0);\" class=\"cmsms_button cmsms_project_loader\">
						<span>" . $more_text . "</span>
					</a>
				</div>";
			}
		
		$out .= '</div>';
	}
	
	$out .= '</div>';
	
	
	wp_reset_postdata();
	
	wp_reset_query();
	
	
	return $out;
}

add_shortcode('cmsms_portfolio', 'cmsms_portfolio');



/**
 * Profiles
 */
function cmsms_profiles($atts, $content = null) { 
    $new_atts = apply_filters('cmsms_profiles_atts_filter', array( 
		'orderby' => 			'', 
		'order' => 				'', 
		'count' => 				'', 
		'categories' => 		'', 
		'layout' => 			'', 
		'columns' => 			'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'profiles';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $profile_columns;
	
	$profile_columns = $columns;
	
	
	$args = array( 
		'post_type' => 				'profile', 
		'orderby' => 				$orderby, 
		'order' => 					$order, 
		'posts_per_page' => 		$count, 
		'ignore_sticky_posts' => 	true 
	);
	
	
	if ($categories != '') {
		$cat_array = explode(",", $categories);
		
		$args['tax_query'] = array( 
			array( 
				'taxonomy' => 	'pl-categs', 
				'field' => 		'slug', 
				'terms' => 		$cat_array 
			)
		);
	}
	
	
	$query = new WP_Query($args);
	
	
	$out = '';
	
	
	if ($query->have_posts()) :
		
		$out .= '<div id="' . $unique_id . '" class="cmsms_profile ' . $layout . 
			(($classes != '') ? ' ' . $classes : '') . 
			'"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n";
		
		
        while ($query->have_posts()) : $query->the_post();
			
			if ($layout == 'vertical') {
				$out .= load_template_part('framework/postType/profile/page/vertical');
			} else {
				$out .= load_template_part('framework/postType/profile/page/horizontal');
			}
			
		endwhile;
		
		
		$out .= '</div>' . "\n";
		
    endif;
	
	
	wp_reset_postdata();
	
	wp_reset_query();
	
	
	return $out;
}

add_shortcode('cmsms_profiles', 'cmsms_profiles');



/* ==================== Start WooCommerce Shortcodes ==================== */

/**
 * Products
 */
function cmsms_products($atts, $content = null) {
    $new_atts = apply_filters('cmsms_products_atts_filter', array( 
		'products_shortcode' => 	'recent_products', 
		'orderby' => 				'date', 
		'order' => 					'DESC', 
		'count' => 					'10', 
		'columns' => 				'4', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'products';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
    $out = '<div class="cmsms_products_shortcode' . ' cmsms_' . $products_shortcode . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	$out .= do_shortcode('[' . $products_shortcode . ' ' . (($products_shortcode != 'best_selling_products' && $products_shortcode != 'top_rated_products') ? 'orderby="' . $orderby . '" order="' . $order . '" ' : '') . 'per_page="' . $count . '" columns="' . $columns . '"]');
	
	
	$out .= '</div>';
	
	
	return $out;
}

add_shortcode('cmsms_products', 'cmsms_products');



/**
 * Selected Products
 */
function cmsms_selected_products($atts, $content = null) {
    $new_atts = apply_filters('cmsms_selected_products_atts_filter', array( 
		'orderby' => 				'date', 
		'order' => 					'DESC', 
		'ids' => 					'', 
		'columns' => 				'4', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'selected-products';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
    $out = '<div class="cmsms_selected_products_shortcode' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	$out .= do_shortcode('[products orderby="' . $orderby . '" order="' . $order . '" columns="' . $columns . '" ids="' . $ids . '"]');
	
	
	$out .= '</div>';
	
	
	return $out;
}

add_shortcode('cmsms_selected_products', 'cmsms_selected_products');

/* ==================== Finish WooCommerce Shortcodes ==================== */



/* ==================== Start PayPal Donations Shortcode ==================== */

/**
 * PayPal Donations
 */
function cmsms_paypal_donations($atts, $content = null) {
    $new_atts = apply_filters('cmsms_paypal_donations_atts_filter', array( 
		'amount' => 				'', 
		'purpose' => 				'', 
		'reference' => 				'', 
		'button_title' => 			'', 
		'button_text_align' => 		'center', 
		'button_style' => 			'', 
		'button_font_family' => 	'', 
		'button_font_size' => 		'', 
		'button_line_height' => 	'', 
		'button_font_weight' => 	'', 
		'button_font_style' => 		'', 
		'button_padding_hor' => 	'', 
		'button_border_width' => 	'', 
		'button_border_style' => 	'', 
		'button_border_radius' => 	'', 
		'button_bg_color' => 		'', 
		'button_text_color' => 		'', 
		'button_border_color' => 	'', 
		'button_bg_color_h' => 		'', 
		'button_text_color_h' => 	'', 
		'button_border_color_h' => 	'', 
		'button_icon' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'paypal-donations';
	
	$shortcode_path = CMSMS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsms-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsms_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	if ($button_font_family != '') {
		$font_family_array = explode(':', $button_font_family);
		
		$font_family_name = "'" . $font_family_array[0] . "'";
		
		
		cmsms_theme_google_font($button_font_family, $font_family_array[0]);
	}
	
	
	$out = '';
	
	
	if (
		$button_style != '' || 
		$button_font_family != '' || 
		$button_font_size != '' || 
		$button_line_height != '' || 
		$button_font_weight != '' || 
		$button_font_style != '' || 
		$button_padding_hor != '' || 
		$button_border_width != '' || 
		$button_border_style != '' || 
		$button_border_radius != '' || 
		$button_bg_color != '' || 
		$button_text_color != '' || 
		$button_border_color != '' || 
		$button_bg_color_h != '' || 
		$button_text_color_h != '' || 
		$button_border_color_h != '' 
	) {
		$button_custom_styles = 'true';
	} else {
		$button_custom_styles = 'false';
	}
	
	
	$out .= '<style type="text/css">' . "\n" . 
		'#cmsms_paypal_donations_' . $unique_id . ' { ' . 
			"\n\t" . 'text-align:' . $button_text_align . '; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button:before { ' . 
			"\n\t" . 'margin-right:' . (($button_title != '') ? '.5em; ' : '0;') . 
			"\n\t" . 'margin-left:0; ' . 
			"\n\t" . 'vertical-align:baseline; ' . 
		"\n" . '} ' . "\n\n";
		
		if ($button_custom_styles == 'true') {
			$out .= '#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button { ' . 
				(($button_font_family != '') ? "\n\t" . 'font-family:' . str_replace('+', ' ', $font_family_name) . '; ' : '') . 
				(($button_font_size != '') ? "\n\t" . 'font-size:' . $button_font_size . 'px; ' : '') . 
				(($button_line_height != '') ? "\n\t" . 'line-height:' . $button_line_height . 'px; ' : '') . 
				(($button_font_weight != '') ? "\n\t" . 'font-weight:' . $button_font_weight . '; ' : '') . 
				(($button_font_style != '') ? "\n\t" . 'font-style:' . $button_font_style . '; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-right:' . $button_padding_hor . 'px; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-left:' . $button_padding_hor . 'px; ' : '') . 
				(($button_border_width != '') ? "\n\t" . 'border-width:' . $button_border_width . 'px; ' : '') . 
				(($button_border_style != '') ? "\n\t" . 'border-style:' . $button_border_style . '; ' : '') . 
				(($button_border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $button_border_radius . '; ' . "\n\t" . 'border-radius:' . $button_border_radius . '; ' : '') . 
				(($button_bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color) : '') . 
				(($button_text_color != '') ? "\n\t" . cmsms_color_css('color', $button_text_color) : '') . 
				(($button_border_color != '') ? "\n\t" . cmsms_color_css('border-color', $button_border_color) : '') . 
			"\n" . '} ' . "\n";
			
			$out .= '#cmsms_paypal_donations_' . $unique_id . ' form:hover + .cmsms_button { ' . 
				(($button_bg_color_h != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color_h) : '') . 
				(($button_text_color_h != '') ? "\n\t" . cmsms_color_css('color', $button_text_color_h) : '') . 
				(($button_border_color_h != '') ? "\n\t" . cmsms_color_css('border-color', $button_border_color_h) : '') . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($button_style != '') {
			if (
				$button_style == 'cmsms_but_bg_slide_left' || 
				$button_style == 'cmsms_but_bg_slide_right' || 
				$button_style == 'cmsms_but_bg_slide_top' || 
				$button_style == 'cmsms_but_bg_slide_bottom' || 
				$button_style == 'cmsms_but_bg_expand_vert' || 
				$button_style == 'cmsms_but_bg_expand_hor' || 
				$button_style == 'cmsms_but_bg_expand_diag' 
			) {
				if ($button_bg_color != '') {
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' form:hover + .cmsms_button.cmsms_but_bg_slide_left, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' form:hover + .cmsms_button.cmsms_but_bg_slide_right, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' form:hover + .cmsms_button.cmsms_but_bg_slide_top, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' form:hover + .cmsms_button.cmsms_but_bg_slide_bottom, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' form:hover + .cmsms_button.cmsms_but_bg_expand_vert, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' form:hover + .cmsms_button.cmsms_but_bg_expand_hor, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' form:hover + .cmsms_button.cmsms_but_bg_expand_diag { ' . 
						"\n\t" . cmsms_color_css('background-color', $button_bg_color) . 
					"\n" . '} ' . "\n";
				}
				
				if ($button_bg_color_h != '') {
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_left:after, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_right:after, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_top:after, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_bg_slide_bottom:after, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_vert:after, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_hor:after, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_bg_expand_diag:after { ' . 
						"\n\t" . cmsms_color_css('background-color', $button_bg_color_h) . 
					"\n" . '} ' . "\n";
				}
			}
			
			
			if (
				$button_style == 'cmsms_but_icon_dark_bg' || 
				$button_style == 'cmsms_but_icon_light_bg' || 
				$button_style == 'cmsms_but_icon_divider' || 
				$button_style == 'cmsms_but_icon_inverse' 
			) {
				$but_icon_pad = ($button_padding_hor != '' ? $button_padding_hor : '20') + ($button_line_height != '' ? $button_line_height : '40');
				
				if ($button_padding_hor != '' || $button_line_height != '') {
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_dark_bg, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_light_bg, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider, ' .  
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse { ' . 
						"\n\t" . 'padding-left:' . $but_icon_pad . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_dark_bg:before, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_light_bg:before, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:before, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:before, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_dark_bg:after, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_light_bg:after, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:after, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:after { ' . 
						"\n\t" . 'width:' . $button_line_height . 'px; ' . 
					"\n" . '} ' . "\n";
				}
				
				
				if ($button_border_color != '' || $button_border_color_h != '') {
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_divider:after { ' . 
						"\n\t" . cmsms_color_css('border-color', $button_border_color) . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' form:hover + .cmsms_button.cmsms_but_icon_divider:after { ' . 
						"\n\t" . cmsms_color_css('border-color', $button_border_color_h) . 
					"\n" . '} ' . "\n";
				}
				
				
				if ($button_style == 'cmsms_but_icon_inverse') {
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:before { ' . 
						(($button_text_color_h != '') ? "\n\t" . cmsms_color_css('color', $button_text_color_h) : '') . 
					"\n" . '} ' . "\n";
				
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_inverse:after { ' . 
						(($button_bg_color_h != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color_h) : '') . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' form:hover + .cmsms_button.cmsms_but_icon_inverse:before { ' . 
						(($button_text_color != '') ? "\n\t" . cmsms_color_css('color', $button_text_color) : '') . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' form:hover + .cmsms_button.cmsms_but_icon_inverse:after { ' . 
						(($button_bg_color != '') ? "\n\t" . cmsms_color_css('background-color', $button_bg_color) : '') . 
					"\n" . '} ' . "\n";
				}
			}
			
			
			if (
				$button_style == 'cmsms_but_icon_slide_left' || 
				$button_style == 'cmsms_but_icon_slide_right' 
			) {
				if ($button_padding_hor != '') {
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_left, ' . 
					'#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_right { ' . 
						"\n\t" . 'padding-left:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'padding-right:' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_left:before { ' . 
						"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'left:-' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' form:hover + .cmsms_button.cmsms_but_icon_slide_left:before { ' . 
						"\n\t" . 'left:0; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' .cmsms_button.cmsms_but_icon_slide_right:before { ' . 
						"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'right:-' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsms_paypal_donations_' . $unique_id . ' form:hover + .cmsms_button.cmsms_but_icon_slide_right:before { ' . 
						"\n\t" . 'right:0; ' . 
					"\n" . '} ' . "\n";
				}
			}
		}
	$out .= '</style>' . "\n";
	
	
	$out .= '<div id="cmsms_paypal_donations_' . $unique_id . '" class="cmsms_paypal_donations_wrap">' . "\n" . 
		'<div class="cmsms_paypal_donations">' . "\n" . 
			do_shortcode('[paypal-donation' . 
				($amount != '' ? ' amount="' . $amount . '"' : '') . 
				($purpose != '' ? ' purpose="' . $purpose . '"' : '') . 
				($reference != '' ? ' reference="' . $reference . '"' : '') . 
			']') . 
			
			'<span class="cmsms_button' . 
			(($button_style != '') ? ' cmsms_but_clear_styles ' . $button_style : '') . 
			(($button_icon != '') ? ' ' . $button_icon : '') . 
			(($classes != '') ? ' ' . $classes : '') . 
			'"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
			'>' . 
				'<span>' . $button_title . '</span>' . 
			'</span>' . 
		'</div>' . "\n" . 
	'</div>' . "\n";
	
	
	return $out;
}

add_shortcode('cmsms_paypal_donations', 'cmsms_paypal_donations');

/* ==================== Finish PayPal Donations Shortcode ==================== */

