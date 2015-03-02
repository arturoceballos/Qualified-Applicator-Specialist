/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Visual Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */
 

/* 
// For Change Fields in Shortcodes

var sc_name_new_fields = {};


for (var id in cmsmsShortcodes.sc_name.fields) {
	if (id === 'field_name') { // Delete Field
		delete cmsmsShortcodes.sc_name.fields[id];
	} else if (id === 'field_name') { // Delete Field Attribute
		delete cmsmsShortcodes.sc_name.fields[id]['field_attribute'];  
		
		
		sc_name_new_fields[id] = cmsmsShortcodes.sc_name.fields[id];
	} else if (id === 'field_name') { // Add/Change Field Attribute
		cmsmsShortcodes.sc_name.fields[id]['field_attribute'] = 'value';
		
		
		sc_name_new_fields[id] = cmsmsShortcodes.sc_name.fields[id];
	} else if (id === 'field_name') { // Add Field (after the field as found, add new field)
		sc_name_new_fields['field_name'] = { 
			type : 		'rgba', 
			title : 	composer_shortcodes_extend.sc_name_field_custom_bg_color, 
			descr : 	'', 
			def : 		'', 
			required : 	false, 
			width : 	'half' 
		};
		
		
		sc_name_new_fields[id] = cmsmsShortcodes.sc_name.fields[id];
	} else { // Allways add this in the bottom
		sc_name_new_fields[id] = cmsmsShortcodes.sc_name.fields[id];
	}
}


cmsmsShortcodes.sc_name.fields = sc_name_new_fields; 
*/



/**
 * Posts Slider Extend
 */

var posts_slider_new_fields = {};


for (var id in cmsmsShortcodes.cmsms_posts_slider.fields) {
	if (id === 'amount') {
		delete cmsmsShortcodes.cmsms_posts_slider.fields[id];
	} else if (id === 'columns') {
		delete cmsmsShortcodes.cmsms_posts_slider.fields[id]['depend'];
		
		
		posts_slider_new_fields[id] = cmsmsShortcodes.cmsms_posts_slider.fields[id];
	} else {
		posts_slider_new_fields[id] = cmsmsShortcodes.cmsms_posts_slider.fields[id];
	}
}


cmsmsShortcodes.cmsms_posts_slider.fields = posts_slider_new_fields;



/**
 * Button Extend
 */

var button_new_fields = {};


for (var id in cmsmsShortcodes.cmsms_button.fields) {
	if (id === 'button_font_weight') {
		cmsmsShortcodes.cmsms_button.fields[id]['def'] = '600';
		
		button_new_fields[id] = cmsmsShortcodes.cmsms_button.fields[id];
	} else {
		button_new_fields[id] = cmsmsShortcodes.cmsms_button.fields[id];
	}
}


cmsmsShortcodes.cmsms_button.fields = button_new_fields;



/**
 * Single Pricing Table Items Extend
 */

var pricing_table_item_new_fields = {};


for (var id in cmsmsMultipleShortcodes.cmsms_pricing_table_item.fields) {
	if (id === 'button_font_weight') {
		cmsmsMultipleShortcodes.cmsms_pricing_table_item.fields[id]['def'] = '600';
		
		pricing_table_item_new_fields[id] = cmsmsMultipleShortcodes.cmsms_pricing_table_item.fields[id];
	} else {
		pricing_table_item_new_fields[id] = cmsmsMultipleShortcodes.cmsms_pricing_table_item.fields[id];
	}
}


cmsmsMultipleShortcodes.cmsms_pricing_table_item.fields = pricing_table_item_new_fields;

