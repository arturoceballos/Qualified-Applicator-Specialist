<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.1.0
 * 
 * Content Editor Additionals
 * Created by CMSMasters
 * 
 */


function change_mce_options($initArray) {
    $ext = 'pre[id|name|class|style], iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src]';
    
	
    if (isset($initArray['extended_valid_elements'])) {
        $initArray['extended_valid_elements'] .= ',' . $ext;
    } else {
        $initArray['extended_valid_elements'] = $ext;
    }
    
	
    return $initArray;
}

add_filter('tiny_mce_before_init', 'change_mce_options');



function change_mce_fontsizeselect_buttons($initArray) {
	$initArray['block_formats'] = __('Paragraph', 'cmsms_content_composer') . '=p;' . 
	__('Div', 'cmsms_content_composer') . '=div;' . 
	__('Header 1', 'cmsms_content_composer') . '=h1;' . 
	__('Header 2', 'cmsms_content_composer') . '=h2;' . 
	__('Header 3', 'cmsms_content_composer') . '=h3;' . 
	__('Header 4', 'cmsms_content_composer') . '=h4;' . 
	__('Header 5', 'cmsms_content_composer') . '=h5;' . 
	__('Header 6', 'cmsms_content_composer') . '=h6;' . 
	__('Address', 'cmsms_content_composer') . '=address;' . 
	__('Pre', 'cmsms_content_composer') . '=pre;' . 
	__('Superscript', 'cmsms_content_composer') . '=superscript;' . 
	__('Subscript', 'cmsms_content_composer') . '=subscript;' . 
	__('Code', 'cmsms_content_composer') . '=code';
	
	
	$initArray['fontsize_formats'] = '8pt 10pt 12pt 14pt 16pt 18pt 20pt 24pt 28pt 36pt 48pt 60pt 72pt 84pt 100pt';
	
	
	return $initArray;
}

add_filter('tiny_mce_before_init', 'change_mce_fontsizeselect_buttons');



function wysiwyg_editor($mce_buttons) {
    $pos = array_search('wp_more', $mce_buttons, true);
    
	
    if ($pos !== false) {
        $tmp_buttons = array_slice($mce_buttons, 0, $pos + 1);
		
        $tmp_buttons[] = 'wp_page';
		
        $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos + 1));
    }
    
	
    return $mce_buttons;
}

add_filter('mce_buttons', 'wysiwyg_editor');



function wysiwyg_editor2($mce_buttons_2) {
    $pos = array_search('forecolor', $mce_buttons_2, true);
    
	
    if ($pos !== false) {
        $tmp_buttons = array_slice($mce_buttons_2, 0, $pos + 1);
		
        $tmp_buttons[] = 'backcolor';
		
        $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons_2, $pos + 1));
    }
    
	
    return $mce_buttons;
}

add_filter('mce_buttons_2', 'wysiwyg_editor2');



function wysiwyg_editor3($mce_buttons_2) {
    $pos = array_search('formatselect', $mce_buttons_2, true);
    
	
    if ($pos !== false) {
        $tmp_buttons = array_slice($mce_buttons_2, 0, $pos + 1);
		
        $tmp_buttons[] = 'fontselect';
		
        $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons_2, $pos + 1));
    }
    
	
    return $mce_buttons;
}

add_filter('mce_buttons_2', 'wysiwyg_editor3');



function wysiwyg_editor4($mce_buttons_2) {
    $pos = array_search('fontselect', $mce_buttons_2, true);
    
	
    if ($pos !== false) {
        $tmp_buttons = array_slice($mce_buttons_2, 0, $pos + 1);
		
        $tmp_buttons[] = 'fontsizeselect';
		
        $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons_2, $pos + 1));
    }
    
	
    return $mce_buttons;
}

add_filter('mce_buttons_2', 'wysiwyg_editor4');

