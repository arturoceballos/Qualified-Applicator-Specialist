/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.3.0
 * 
 * Visual Content Composer Schortcodes
 * Created by CMSMasters
 * 
 */


// CMSMasters Custom Shortcodes
var cmsmsShortcodes = { 
	// Text Block
	cmsms_text : { 
		title : 	cmsms_shortcodes.text_title, 
		icon : 		'admin-icon-text', 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<div>{{ data.content }}</div>', 
		multiple : 	false, 
		def : 		'<p>' + cmsms_shortcodes.def_text + '</p>', 
		fields : { 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsms_shortcodes.content, 
				descr : 	'', 
				def : 		'<p>' + cmsms_shortcodes.def_text + '</p>', 
				required : 	true, 
				width : 	'full' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Heading
	cmsms_heading : { 
		title : 	cmsms_shortcodes.heading_title, 
		icon : 		'admin-icon-heading', 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<{{ data.type }} class="{{ data.icon }}">{{ data.content }}</{{ data.type }}>', 
		multiple : 	false, 
		def : 		cmsms_shortcodes.heading_title, 
		fields : { 
			// Heading Text
			content : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.heading_field_content_title, 
				descr : 	'', 
				def : 		cmsms_shortcodes.heading_title, 
				required : 	true, 
				width : 	'half' 
			}, 
			// Heading Type
			type : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.heading_field_type_title, 
				descr : 	'', 
				def : 		'h1', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'h1' : 	'H1', 
							'h2' : 	'H2', 
							'h3' : 	'H3', 
							'h4' : 	'H4', 
							'h5' : 	'H5', 
							'h6' : 	'H6' 
				} 
			}, 
			
			// Google Font
			font_family : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.heading_field_font_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_fonts() 
			}, 
			// Font Size
			font_size : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.heading_field_font_size_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_zero_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Line Height
			line_height : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.heading_field_line_height_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_zero_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Font Weight
			font_weight : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.heading_field_font_weight_title, 
				descr : 	'', 
				def : 		'normal', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_font_weight() 
			}, 
			// Font Style
			font_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.heading_field_font_style_title, 
				descr : 	'', 
				def : 		'normal', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_font_style() 
			}, 
			// Heading Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsms_shortcodes.heading_field_icon_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_icons() 
			}, 
			// Text Align
			text_align : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.text_align, 
				descr : 	'', 
				def : 		'left', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsms_shortcodes.choice_left, 
							'center' : 		cmsms_shortcodes.choice_center, 
							'right' : 		cmsms_shortcodes.choice_right 
				} 
			}, 
			// Color
			color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.heading_field_color_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.heading_field_color_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Background Color
			bg_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.heading_field_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Border Radius
			border_radius : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.heading_field_border_radius_title, 
				descr : 	cmsms_shortcodes.heading_field_border_radius_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.border_radius_descr_note_1 + " <br />" + cmsms_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsms_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_5 + "</a>. <br />" + cmsms_shortcodes.heading_field_border_radius_descr_note + ".</span>", 
				def : 		'', 
				required : 	false 
			}, 
			// Heading Link
			link : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.heading_field_link_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'full' 
			}, 
			// Heading Link Target
			target : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.link_target, 
				descr : 	'', 
				def : 		'self', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'self' : 	cmsms_shortcodes.link_target_choice_self, 
							'blank' : 	cmsms_shortcodes.link_target_choice_blank 
				}, 
				depend : 	'link:!' 
			}, 
			// Top Margin
			margin_top : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.top_margin, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number' 
			}, 
			// Bottom Margin
			margin_bottom : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.bottom_margin, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note + "</span>", 
				def : 		'20', 
				required : 	false, 
				width : 	'number' 
			}, 
			// Divider
			divider : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.divider, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_show 
				} 
			}, 
			// Divider Type
			divider_type : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.divider_length, 
				descr : 	'', 
				def : 		'short', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'short' : 	cmsms_shortcodes.choice_short, 
							'medium' : 	cmsms_shortcodes.choice_medium, 
							'long' : 	cmsms_shortcodes.choice_long 
				}, 
				depend : 	'divider:true' 
			}, 
			// Divider Height
			divider_height : { 
				type : 		'range', 
				title : 	cmsms_shortcodes.divider_width, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_pixel + "</span>", 
				def : 		'1', 
				required : 	false, 
				width : 	'number', 
				min : 		'1', 
				max : 		'20', 
				depend : 	'divider:true' 
			}, 
			// Divider Style
			divider_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.divider_style, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'solid' : 	cmsms_shortcodes.choice_solid, 
							'dotted' : 	cmsms_shortcodes.choice_dotted, 
							'dashed' : 	cmsms_shortcodes.choice_dashed, 
							'double' : 	cmsms_shortcodes.choice_double, 
							'groove' : 	cmsms_shortcodes.choice_groove, 
							'ridge' : 	cmsms_shortcodes.choice_ridge 
				}, 
				depend : 	'divider:true' 
			}, 
			// Divider Color
			divider_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.heading_field_divider_color_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.heading_field_divider_color_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'divider:true' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note  + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Audio
	cmsms_audios : { 
		title : 	cmsms_shortcodes.audio, 
		icon : 		'admin-icon-audio', 
		pair : 		true, 
		content : 	'audio', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsms_audio]' + cmsms_shortcodes.media_def + '[/cmsms_audio]', 
		fields : { 
			// Audio
			audio : { 
				type : 		'multiple', 
				title : 	cmsms_shortcodes.audio, 
				descr : 	cmsms_shortcodes.audio_field_audio_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.audio_field_audio_descr_note + ' (' + cmsms_shortcodes.more_info + " <a href='http://www.w3schools.com/html/html5_audio.asp' target='_blank'>" + cmsms_shortcodes.click_here + "</a>)</span>", 
				def : 		'[cmsms_audio]' + cmsms_shortcodes.media_def + '[/cmsms_audio]', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Autoplay
			autoplay : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.autoplay, 
				descr : 	cmsms_shortcodes.audio_field_autoplay_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Repeat
			loop : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.repeat, 
				descr : 	cmsms_shortcodes.audio_field_repeat_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Preload
			preload : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.preload, 
				descr : 	cmsms_shortcodes.audio_field_preload_descr, 
				def : 		'none', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'none' : 		cmsms_shortcodes.audio_field_preload_choice_none, 
							'auto' : 		cmsms_shortcodes.audio_field_preload_choice_auto, 
							'metadata' : 	cmsms_shortcodes.audio_field_preload_choice_metadata 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Blog
	cmsms_blog : { 
		title : 	cmsms_shortcodes.blog_title, 
		icon : 		'admin-icon-blog', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.orderby_title, 
				descr : 	cmsms_shortcodes.blog_field_orderby_descr, 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsms_shortcodes.choice_date, 
							'name' : 		cmsms_shortcodes.name, 
							'id' : 			cmsms_shortcodes.choice_id, 
							'menu_order' : 	cmsms_shortcodes.choice_menu, 
							'popular' : 	cmsms_shortcodes.choice_popular 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.order_title, 
				descr : 	cmsms_shortcodes.order_descr, 
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsms_shortcodes.choice_asc, 
							'DESC' : 	cmsms_shortcodes.choice_desc 
				} 
			}, 
			// Posts Number
			count : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.blog_field_postsnumber_title, 
				descr : 	cmsms_shortcodes.blog_field_postsnumber_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.blog_field_postsnumber_descr_note + "</span>", 
				def : 		'12', 
				required : 	false, 
				width : 	'number', 
				min : 		'1' 
			}, 
			// Categories
			categories : { 
				type : 		'select_multiple', 
				title : 	cmsms_shortcodes.categories, 
				descr : 	cmsms_shortcodes.blog_field_categories_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.blog_field_categories_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_categories() 
			}, 
			// Layout
			layout : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.layout, 
				descr : 	'', 
				def : 		'standard', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'standard' : 	cmsms_shortcodes.blog_field_layout_choice_standard, 
							'columns' : 	cmsms_shortcodes.blog_field_layout_choice_columns, 
							'timeline' : 	cmsms_shortcodes.blog_field_layout_choice_timeline 
				} 
			}, 
			// Layout Mode
			layout_mode : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.layout_mode, 
				descr : 	cmsms_shortcodes.blog_field_layout_mode_descr, 
				def : 		'grid', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'grid' : 		cmsms_shortcodes.choice_grid, 
							'masonry' : 	cmsms_shortcodes.blog_field_layout_mode_choice_masonry 
				}, 
				depend : 	'layout:columns' 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.columns_count, 
				descr : 	cmsms_shortcodes.blog_field_columns_count_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.blog_field_columns_count_descr_note + "</span>", 
				def : 		'3', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				}, 
				depend : 	'layout:columns' 
			}, 
			// Metadata
			metadata : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.metadata, 
				descr : 	cmsms_shortcodes.blog_field_metadata_descr, 
				def : 		'date,categories,author,comments,likes,more', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsms_shortcodes.choice_date, 
							'categories' : 	cmsms_shortcodes.choice_categories, 
							'author' : 		cmsms_shortcodes.choice_author, 
							'comments' : 	cmsms_shortcodes.choice_comments, 
							'likes' : 		cmsms_shortcodes.choice_likes, 
							'tags' : 		cmsms_shortcodes.choice_tags, 
							'more' : 		cmsms_shortcodes.choice_more 
				} 
			}, 
			// Filter
			filter : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.filter, 
				descr : 	cmsms_shortcodes.blog_field_filter_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				}, 
				depend : 	'layout:columns' 
			}, 
			// Filter Button Text
			filter_text : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.filter_text_title, 
				descr : 	cmsms_shortcodes.filter_text_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.filter_text_descr_note + ". <br />" + cmsms_shortcodes.filter_enabled_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'layout:columns' 
			}, 
			// Filter 'All Categories' Text
			filter_cats_text : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.filter_cats_text_title, 
				descr : 	cmsms_shortcodes.filter_cats_text_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.filter_cats_text_descr_note + ". <br />" + cmsms_shortcodes.filter_enabled_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'layout:columns' 
			}, 
			// Pagination
			pagination : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.pagination_title, 
				descr : 	cmsms_shortcodes.pagination_descr, 
				def : 		'pagination', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'pagination' : 	cmsms_shortcodes.pagination_choice_pagination, 
							'more' : 		cmsms_shortcodes.pagination_choice_more, 
							'disabled' : 	cmsms_shortcodes.pagination_choice_disabled 
				} 
			}, 
			// 'Load More' Button Text
			more_text : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.pagination_more_text_title, 
				descr : 	cmsms_shortcodes.pagination_more_text_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.pagination_more_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'pagination:more' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Button
	cmsms_button : { 
		title : 	cmsms_shortcodes.button, 
		icon : 		'admin-icon-button', 
		pair : 		true, 
		content : 	'button_title', 
		visual : 	'<div><a href="javascript:void(0);" class="cmsms_button {{ data.button_icon }}">{{ data.button_title }}&nbsp;</a></div>', 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Button Title
			button_title : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_label_title, 
				descr : 	cmsms_shortcodes.button_field_label_descr, 
				def : 		cmsms_shortcodes.button, 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Link
			button_link : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_link_title, 
				descr : 	cmsms_shortcodes.button_field_link_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Button Target
			button_target : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.button_field_target_title, 
				descr : 	cmsms_shortcodes.button_field_target_descr, 
				def : 		'self', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'self' : 	cmsms_shortcodes.link_target_choice_self, 
							'blank' : 	cmsms_shortcodes.link_target_choice_blank 
				} 
			}, 
			// Button Position
			button_text_align : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.button_field_text_align_title, 
				descr : 	cmsms_shortcodes.button_field_text_align_descr, 
				def : 		'center', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsms_shortcodes.choice_left, 
							'center' : 		cmsms_shortcodes.choice_center, 
							'right' : 		cmsms_shortcodes.choice_right, 
				} 
			}, 
			// Button Style
			button_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'' : 									cmsms_shortcodes.choice_default, 
							'cmsms_but_bg_hover' : 					cmsms_shortcodes.choice_but_bg_hover, 
							'cmsms_but_bg_slide_left' : 			cmsms_shortcodes.choice_but_bg_slide_left, 
							'cmsms_but_bg_slide_right' : 			cmsms_shortcodes.choice_but_bg_slide_right, 
							'cmsms_but_bg_slide_top' : 				cmsms_shortcodes.choice_but_bg_slide_top, 
							'cmsms_but_bg_slide_bottom' : 			cmsms_shortcodes.choice_but_bg_slide_bottom, 
							'cmsms_but_bg_expand_vert' : 			cmsms_shortcodes.choice_but_bg_expand_vert, 
							'cmsms_but_bg_expand_hor' : 			cmsms_shortcodes.choice_but_bg_expand_hor, 
							'cmsms_but_bg_expand_diag' : 			cmsms_shortcodes.choice_but_bg_expand_diag, 
							'cmsms_but_shadow' : 					cmsms_shortcodes.choice_but_shadow, 
							'cmsms_but_icon_dark_bg' : 				cmsms_shortcodes.choice_but_icon_dark_bg, 
							'cmsms_but_icon_light_bg' : 			cmsms_shortcodes.choice_but_icon_light_bg, 
							'cmsms_but_icon_divider' : 				cmsms_shortcodes.choice_but_icon_divider, 
							'cmsms_but_icon_inverse' : 				cmsms_shortcodes.choice_but_icon_inverse, 
							'cmsms_but_icon_slide_left' : 			cmsms_shortcodes.choice_but_slide_left, 
							'cmsms_but_icon_slide_right' : 			cmsms_shortcodes.choice_but_slide_right, 
							'cmsms_but_icon_hover_slide_left' : 	cmsms_shortcodes.choice_but_hover_slide_left, 
							'cmsms_but_icon_hover_slide_right' : 	cmsms_shortcodes.choice_but_hover_slide_right, 
							'cmsms_but_icon_hover_slide_top' : 		cmsms_shortcodes.choice_but_hover_slide_top, 
							'cmsms_but_icon_hover_slide_bottom' : 	cmsms_shortcodes.choice_but_hover_slide_bottom 
				} 
			}, 
			// Button Google Font
			button_font_family : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_label_google_font_title, 
				descr : 	cmsms_shortcodes.button_field_label_google_font_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_label_google_font_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_fonts() 
			}, 
			// Button Font Size
			button_font_size : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_label_font_size_title, 
				descr : 	cmsms_shortcodes.button_field_label_font_size_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_label_font_size_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Button Line Height
			button_line_height : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_label_line_hight_title, 
				descr : 	cmsms_shortcodes.button_field_label_line_height_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_label_line_height_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Button Font Weight
			button_font_weight : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_label_font_weight_title, 
				descr : 	cmsms_shortcodes.button_field_label_font_weight_descr, 
				def : 		'normal', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_font_weight() 
			}, 
			// Button Font Style
			button_font_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_label_font_style_title, 
				descr : 	cmsms_shortcodes.button_field_label_font_style_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_font_style() 
			}, 
			// Button Left & Right Paddings
			button_padding_hor : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_paddings_title, 
				descr : 	cmsms_shortcodes.button_field_paddings_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_paddings_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Button Icon
			button_icon : { 
				type : 		'icon', 
				title : 	cmsms_shortcodes.button_field_icon_title, 
				descr : 	cmsms_shortcodes.button_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full', 
				choises : 	cmsms_composer_icons() 
			}, 
			// Button Border Width
			button_border_width : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_border_width_title, 
				descr : 	cmsms_shortcodes.button_field_border_width_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Button Border Style
			button_border_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_border_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'solid' : 	cmsms_shortcodes.choice_solid, 
							'dotted' : 	cmsms_shortcodes.choice_dotted, 
							'dashed' : 	cmsms_shortcodes.choice_dashed, 
							'double' : 	cmsms_shortcodes.choice_double, 
							'groove' : 	cmsms_shortcodes.choice_groove, 
							'ridge' : 	cmsms_shortcodes.choice_ridge, 
							'inset' : 	cmsms_shortcodes.choice_inset, 
							'outset' : 	cmsms_shortcodes.choice_outset 
				} 
			}, 
			// Button Border Radius
			button_border_radius : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_border_radius_title, 
				descr : 	cmsms_shortcodes.button_field_border_radius_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.border_radius_descr_note_1 + " <br />" + cmsms_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsms_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'', 
				required : 	false 
			}, 
			// Button Background Color
			button_bg_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bg_color_title, 
				descr : 	cmsms_shortcodes.button_field_bg_color_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Text Color
			button_text_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_txt_color_title, 
				descr : 	cmsms_shortcodes.button_field_txt_color_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Border Color
			button_border_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bd_color_title, 
				descr : 	cmsms_shortcodes.button_field_bd_color_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Background Color on Mouseover
			button_bg_color_h : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bg_color_h_title, 
				descr : 	cmsms_shortcodes.button_field_bg_color_h_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Text Color on Mouseover
			button_text_color_h : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_txt_color_h_title, 
				descr : 	cmsms_shortcodes.button_field_txt_color_h_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Border Color on Mouseover
			button_border_color_h : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bd_color_h_title, 
				descr : 	cmsms_shortcodes.button_field_bd_color_h_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note  + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Clients
	cmsms_clients : { 
		title : 	cmsms_shortcodes.clients_title, 
		icon : 		'admin-icon-clients', 
		pair : 		true, 
		content : 	'clients', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsms_client]' + cmsms_shortcodes.name + '[/cmsms_client]', 
		fields : { 
			// Clients
			clients : { 
				type : 		'multiple', 
				title : 	cmsms_shortcodes.clients_title, 
				descr : 	cmsms_shortcodes.clients_field_clients_descr, 
				def : 		'[cmsms_client]' + cmsms_shortcodes.name + '[/cmsms_client]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.columns_count, 
				descr : 	cmsms_shortcodes.clients_field_col_count_descr, 
				def : 		'5', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4', 
							'5' : 	'5' 
				} 
			}, 
			// Layout
			layout : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.layout, 
				descr : 	'', 
				def : 		'grid', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'grid' : 	cmsms_shortcodes.choice_grid, 
							'slider' : 	cmsms_shortcodes.choice_slider 
				} 
			}, 
			// Slider Height
			height : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.height, 
				descr : 	cmsms_shortcodes.clients_field_height_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clients_field_height_descr_note + "</span>", 
				def : 		'180', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Clients border
			border : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.border, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Slider Slideshow
			autoplay : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.autoplay, 
				descr : 	cmsms_shortcodes.autoplay_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			}, 
			// Slider Slideshow Speed
			speed : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.clients_field_speed_title, 
				descr : 	cmsms_shortcodes.clients_field_speed_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clients_field_speed_descr_note + "</span>", 
				def : 		'1', 
				required : 	false, 
				width : 	'number', 
				min : 		'1', 
				depend : 	'layout:slider' 
			}, 
			// Slider Slides Control
			slides_control : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.clients_field_slides_control_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			}, 
			// Slider Arrow Control
			arrow_control : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.clients_field_arrow_control_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Contact Form
	cmsms_contact_form : { 
		title : 	cmsms_shortcodes.contact_form_title, 
		icon : 		'admin-icon-mail', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Contact Form Plugin
			form_plugin : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.contact_form_field_form_plugin_title, 
				descr : 	cmsms_shortcodes.contact_form_field_form_plugin_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.contact_form_field_form_plugin_descr_note + "</span>", 
				def : 		'cf7', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'cf7' : 	cmsms_shortcodes.contact_form_cf7, 
							'cfb' : 	cmsms_shortcodes.contact_form_cfb 
				} 
			}, 
			// Contact Form 7 - Form Name
			form_cf7 : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.contact_form_field_cf7_id_title, 
				descr : 	cmsms_shortcodes.contact_form_field_cf7_id_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsms_composer_cf7_forms(), 
				depend : 	'form_plugin:cf7' 
			}, 
			// CMSMasters Contact Form Builder - Form Name
			form_cfb : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.contact_form_field_cfb_id_title, 
				descr : 	cmsms_shortcodes.contact_form_field_cfb_id_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsms_composer_cfb_forms(), 
				depend : 	'form_plugin:cfb' 
			}, 
			// CMSMasters Contact Form Builder - Email Address
			email_cfb : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.contact_form_field_cfb_email_title, 
				descr : 	cmsms_shortcodes.contact_form_field_cfb_email_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.contact_form_field_cfb_email_descr_note + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				depend : 	'form_plugin:cfb' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Counters
	cmsms_counters : { 
		title : 	cmsms_shortcodes.counters_title, 
		icon : 		'admin-icon-counter', 
		pair : 		true, 
		content : 	'counters', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsms_counter value="0"]' + cmsms_shortcodes.title + '[/cmsms_counter]', 
		fields : { 
			// Counters
			counters : { 
				type : 		'multiple', 
				title : 	cmsms_shortcodes.counters_title, 
				descr : 	cmsms_shortcodes.counters_field_counters_descr, 
				def : 		'[cmsms_counter value="0"]' + cmsms_shortcodes.title + '[/cmsms_counter]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Type
			type : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.counters_field_type_title, 
				descr : 	'', 
				def : 		'horizontal', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'horizontal' : 	cmsms_shortcodes.choice_icon_side, 
							'vertical' : 	cmsms_shortcodes.choice_icon_top 
				} 
			}, 
			// Number per Row
			count : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.counters_field_number_per_row_title, 
				descr : 	cmsms_shortcodes.counters_field_number_per_row_descr, 
				def : 		'5', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'5' : 	'5', 
							'4' : 	'4', 
							'3' : 	'3', 
							'2' : 	'2', 
							'1' : 	'1' 
				} 
			}, 
			// Icon Size
			icon_size : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_list_field_icon_size_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.value_zero + "</span>", 
				def : 		'30', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Icon Space
			icon_space : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_list_field_icon_space_title, 
				descr : 	cmsms_shortcodes.icon_list_field_icon_space_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.value_zero + "</span>", 
				def : 		'60', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Icon Border Width
			icon_border_width : { 
				type : 		'range', 
				title : 	cmsms_shortcodes.icon_box_field_icon_border_width_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_pixel + "</span>", 
				def : 		'0', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Icon Border Radius
			icon_border_radius : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_box_field_icon_border_radius_title, 
				descr : 	cmsms_shortcodes.counter_field_icon_border_radius_descr + ' ' + cmsms_shortcodes.value_zero + ". <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.border_radius_descr_note_1 + " <br />" + cmsms_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsms_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'50%', 
				required : 	false, 
				width : 	'half' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Divider
	cmsms_divider : { 
		title : 	cmsms_shortcodes.divider, 
		icon : 		'admin-icon-divider', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Divider width
			width : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.divider_length, 
				descr : 	'', 
				def : 		'long', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'short' : 	cmsms_shortcodes.choice_short, 
							'medium' : 	cmsms_shortcodes.choice_medium, 
							'long' : 	cmsms_shortcodes.choice_long 
				} 
			}, 
			// Divider Height
			height : { 
				type : 		'range', 
				title : 	cmsms_shortcodes.divider_width, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_pixel + "</span>", 
				def : 		'1', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Divider Style
			style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.divider_style, 
				descr : 	'', 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'solid' : 	cmsms_shortcodes.choice_solid, 
							'dotted' : 	cmsms_shortcodes.choice_dotted, 
							'dashed' : 	cmsms_shortcodes.choice_dashed, 
							'double' : 	cmsms_shortcodes.choice_double, 
							'groove' : 	cmsms_shortcodes.choice_groove, 
							'ridge' : 	cmsms_shortcodes.choice_ridge 
				} 
			}, 
			// Divider Position
			position : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.divider_position, 
				descr : 	'', 
				def : 		'center', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsms_shortcodes.choice_left, 
							'center' : 		cmsms_shortcodes.choice_center, 
							'right' : 		cmsms_shortcodes.choice_right 
				} 
			}, 
			// Divider Color
			color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.divider_custom_color, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.divider_custom_color_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Top Margin
			margin_top : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.top_margin, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' +  cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.value_zero + "</span>", 
				def : 		'50', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Bottom Margin
			margin_bottom : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.bottom_margin, 
				descr : 	 "<span>" + cmsms_shortcodes.note + ' ' +  cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.value_zero + "</span>", 
				def : 		'50', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Embed
	cmsms_embed : { 
		title : 	cmsms_shortcodes.embed_title, 
		icon : 		'admin-icon-embed', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Link
			link : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.link, 
				descr : 	cmsms_shortcodes.embed_field_link_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.embed_field_link_descr_note + ' ' + "<a href='http://codex.wordpress.org/Embed_Shortcode#Okay.2C_So_What_Sites_Can_I_Embed_From.3F' target='_blank'>" + cmsms_shortcodes.embed_field_link_descr_note_link + "</a></span>", 
				def : 		'', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Max Width
			width : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.embed_field_maxwidth_title, 
				descr : 	cmsms_shortcodes.embed_field_maxwidth_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' +  cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.embed_field_maxwidth_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Max Height
			height : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.embed_field_maxheight_title, 
				descr : 	cmsms_shortcodes.embed_field_maxheight_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' +  cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.embed_field_maxheight_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Wrap Video
			wrap : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.embed_field_wrap_title, 
				descr : 	cmsms_shortcodes.embed_field_wrap_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.embed_field_wrap_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	'Enable' 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Featured Block
	cmsms_featured_block : { 
		title : 	cmsms_shortcodes.featured_title, 
		icon : 		'admin-icon-featured-block', 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<div><div>{{ data.content }}</div></div>', 
		multiple : 	false, 
		def : 		"<p>" + cmsms_shortcodes.def_text + "</p>", 
		fields : { 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsms_shortcodes.content, 
				descr : 	"", 
				def : 		"<p>" + cmsms_shortcodes.def_text + "</p>", 
				required : 	false, 
				width : 	'full' 
			}, 
			// Text Width
			text_width : { 
				type : 		'range', 
				title : 	cmsms_shortcodes.featured_field_text_width_title, 
				descr : 	cmsms_shortcodes.featured_field_text_width_descr, 
				def : 		'100', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'100' 
			}, 
			// Text Position
			text_position : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.featured_field_text_position, 
				descr : 	'', 
				def : 		'center', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsms_shortcodes.choice_left, 
							'center' : 		cmsms_shortcodes.choice_center, 
							'right' : 		cmsms_shortcodes.choice_right 
				} 
			}, 
			// Text Paddings
			text_padding : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.featured_field_text_padding_title, 
				descr : 	cmsms_shortcodes.featured_field_text_padding_descr + ". <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.featured_field_text_padding_descr_note + ". <br />" + cmsms_shortcodes.featured_field_text_padding_descr_note_1 + " <a href=\"#\" target=\"_blank\">" + cmsms_shortcodes.featured_field_text_padding_descr_note_2 + "</a>.</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Text Align
			text_align : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.text_align, 
				descr : 	'', 
				def : 		'left', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsms_shortcodes.choice_left, 
							'center' : 		cmsms_shortcodes.choice_center, 
							'right' : 		cmsms_shortcodes.choice_right 
				} 
			}, 
			// Color Overlay
			color_overlay : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.row_field_color_overlay_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Background Color
			fb_bg_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.featured_field_block_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Background Image
			bg_img : { 
				type : 			'upload', 
				title : 		cmsms_shortcodes.row_field_bg_image_title, 
				descr : 		"", 
				def : 			'', 
				required : 		false, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			true 
			}, 
			// Background Position
			bg_position : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.row_field_bg_position_title, 
				descr : 	"", 
				def : 		'top center', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'top left' : 		cmsms_shortcodes.row_field_bg_position_choice_vert_top + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_left, 
							'top center' : 		cmsms_shortcodes.row_field_bg_position_choice_vert_top + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_center, 
							'top right' : 		cmsms_shortcodes.row_field_bg_position_choice_vert_top + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_right, 
							'center left' : 	cmsms_shortcodes.row_field_bg_position_choice_vert_center + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_left, 
							'center center' : 	cmsms_shortcodes.row_field_bg_position_choice_vert_center + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_center, 
							'center right' : 	cmsms_shortcodes.row_field_bg_position_choice_vert_center + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_right, 
							'bottom left' : 	cmsms_shortcodes.row_field_bg_position_choice_vert_bottom + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_left, 
							'bottom center' : 	cmsms_shortcodes.row_field_bg_position_choice_vert_bottom + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_center, 
							'bottom right' : 	cmsms_shortcodes.row_field_bg_position_choice_vert_bottom + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_right 
				}, 
				depend : 	'bg_img:!' 
			}, 
			// Background Repeat
			bg_repeat : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.row_field_bg_repeat_title, 
				descr : 	"", 
				def : 		'no-repeat', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'no-repeat' : 	cmsms_shortcodes.row_field_bg_repeat_choice_none, 
							'repeat-x' : 	cmsms_shortcodes.row_field_bg_repeat_choice_horiz, 
							'repeat-y' : 	cmsms_shortcodes.row_field_bg_repeat_choice_vert, 
							'repeat' : 		cmsms_shortcodes.row_field_bg_repeat_choice_repeat 
				}, 
				depend : 	'bg_img:!' 
			}, 
			// Background Attachment
			bg_attachment : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.row_field_bg_attachement_title, 
				descr : 	"", 
				def : 		'scroll', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'scroll' : 	cmsms_shortcodes.row_field_bg_attachement_choice_scroll, 
							'fixed' : 	cmsms_shortcodes.row_field_bg_attachement_choice_fixed 
				}, 
				depend : 	'bg_img:!' 
			}, 
			// Background Size
			bg_size : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.row_field_bg_size_title, 
				descr : 	"<span>" + cmsms_shortcodes.row_field_bg_size_choice_auto + ': ' + cmsms_shortcodes.row_field_bg_size_descr_auto + "<br />" + cmsms_shortcodes.row_field_bg_size_choice_cover + ': ' + cmsms_shortcodes.row_field_bg_size_descr_cover + "<br />" + cmsms_shortcodes.row_field_bg_size_choice_contain + ': ' + cmsms_shortcodes.row_field_bg_size_descr_contain + "</span>", 
				def : 		'cover', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'auto' : 		cmsms_shortcodes.row_field_bg_size_choice_auto, 
							'cover' : 		cmsms_shortcodes.row_field_bg_size_choice_cover, 
							'contain' : 	cmsms_shortcodes.row_field_bg_size_choice_contain 
				}, 
				depend : 	'bg_img:!' 
			}, 
			// Top Padding
			top_padding : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.featured_field_top_padding_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.value_zero + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Bottom Padding
			bottom_padding : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.featured_field_bottom_padding_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.value_zero + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Border Radius
			border_radius : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.featured_field_border_radius_title, 
				descr : 	cmsms_shortcodes.featured_field_border_radius_descr + ' ' + cmsms_shortcodes.value_zero + ". <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.border_radius_descr_note_1 + " <br />" + cmsms_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsms_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Gallery
	cmsms_gallery : { 
		title : 	cmsms_shortcodes.gallery_title, 
		icon : 		'admin-icon-gallery', 
		pair : 		true, 
		content : 	'images', 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Images
			images : { 
				type : 		'gallery', 
				title : 	cmsms_shortcodes.gallery_field_images_title, 
				descr : 	cmsms_shortcodes.gallery_field_images_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Layout
			layout : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.layout, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.gallery_field_layout_descr_note + "</span>", 
				def : 		'hover', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'hover' : 	cmsms_shortcodes.gallery_field_layout_choice_hover, 
							'slider' : 	cmsms_shortcodes.choice_slider, 
							'gallery' : cmsms_shortcodes.gallery_field_layout_choice_gallery 
				} 
			}, 
			// Image Size Slider
			image_size_slider : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.gallery_field_image_size_slider_title, 
				descr : 	'', 
				def : 		'full', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_thumbnail_sizes(), 
				depend : 	'layout:slider' 
			}, 
			// Image Size Gallery
			image_size_gallery : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.gallery_field_image_size_title, 
				descr : 	cmsms_shortcodes.gallery_field_image_size_descr, 
				def : 		'full', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_thumbnail_sizes(), 
				depend : 	'layout:gallery' 
			}, 
			// Hover Slider Pause Time
			hover_pause : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.pause_time, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.autoslide_def + "</span>", 
				def : 		'5', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'layout:hover' 
			}, 
			// Hover Slider Active Slide
			hover_active : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.gallery_field_hoversl_activesl_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.gallery_field_hoversl_activesl_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'1', 
				depend : 	'layout:hover' 
			}, 
			// Hover Slider Pause on Hover
			hover_pause_on_hover : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.pause_on_hover, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				}, 
				depend : 	'layout:hover' 
			}, 
			// Slider Animation Effect
			slider_effect : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.gallery_field_sl_animeffect_title, 
				descr : 	'', 
				def : 		'slide', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'slide' : 		cmsms_shortcodes.gallery_field_sl_animeffect_choice_slide, 
							'fade' : 		cmsms_shortcodes.gallery_field_sl_animeffect_choice_fade
				}, 
				depend : 	'layout:slider' 
			}, 
			// Slider Autoplay
			slider_autoplay : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.autoplay, 
				descr : 	cmsms_shortcodes.autoplay_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			}, 
			// Slider Slideshow Speed
			slider_slideshow_speed : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.gallery_field_sl_slideshow_speed_title, 
				descr : 	cmsms_shortcodes.gallery_field_sl_slideshow_speed_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.gallery_field_sl_slideshow_speed_descr_note + "</span>", 
				def : 		'7', 
				required : 	false, 
				width : 	'number', 
				min : 		'1', 
				depend : 	'layout:slider' 
			}, 
			// Slider Animation Speed
			slider_animation_speed : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.gallery_field_sl_anim_speed_title, 
				descr : 	cmsms_shortcodes.gallery_field_sl_anim_speed_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.gallery_field_sl_anim_speed_descr_note + "</span>", 
				def : 		'600', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50', 
				depend : 	'layout:slider' 
			},
			// Slider Pause on Hover
			slider_pause_on_hover : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.pause_on_hover, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			}, 
			// Slider Rewind
			slider_rewind : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.gallery_field_sl_rewind_title, 
				descr : 	cmsms_shortcodes.gallery_field_sl_rewind_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			}, 
			// Slider Rewind Speed
			slider_rewind_speed : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.gallery_field_sl_rewind_speed_title, 
				descr : 	cmsms_shortcodes.gallery_field_sl_rewind_speed_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.gallery_field_sl_rewind_speed_descr_note + "</span>", 
				def : 		'1000', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50', 
				depend : 	'layout:slider' 
			},
			// Slider Navigation Control
			slider_nav_control : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.gallery_field_sl_navcontrol_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			},  
			// Slider Arrow Navigation
			slider_nav_arrow : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.gallery_field_sl_arrownav_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			},
			// Image Gallery Columns
			gallery_columns : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.gallery_field_imagegall_columns_title, 
				descr : 	'', 
				def : 		'4', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'4' : 		cmsms_shortcodes.gallery_field_imagegall_columns_choice_four, 
							'3' : 		cmsms_shortcodes.gallery_field_imagegall_columns_choice_three, 
							'2' : 		cmsms_shortcodes.gallery_field_imagegall_columns_choice_two, 
							'1' : 		cmsms_shortcodes.gallery_field_imagegall_columns_choice_one
				}, 
				depend : 	'layout:gallery' 
			}, 
			// Gallery Images Links
			gallery_links : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.gallery_field_imagegall_imglinks_title, 
				descr : 	'', 
				def : 		'lightbox', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'lightbox' : 	cmsms_shortcodes.gallery_field_imagegall_imglinks_choice_box, 
							'self' : 		cmsms_shortcodes.gallery_field_imagegall_imglinks_choice_self, 
							'blank' : 		cmsms_shortcodes.gallery_field_imagegall_imglinks_choice_blank, 
							'none' : 		cmsms_shortcodes.gallery_field_imagegall_imglinks_choice_none 
				}, 
				depend : 	'layout:gallery' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Google Map Markers
	cmsms_google_map_markers : { 
		title : 	cmsms_shortcodes.map_markers_title, 
		icon : 		'admin-icon-map', 
		pair : 		true, 
		content : 	'markers', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsms_google_map_marker][/cmsms_google_map_marker]', 
		fields : { 
			// Markers
			markers : { 
				type : 		'multiple', 
				title : 	cmsms_shortcodes.map_markers_field_markers_title, 
				descr : 	cmsms_shortcodes.map_markers_field_markers_descr, 
				def : 		'[cmsms_google_map_marker][/cmsms_google_map_marker]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Address Type
			address_type : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.map_markers_field_address_type_title, 
				descr : 	'', 
				def : 		'address', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'address' : 		cmsms_shortcodes.map_markers_field_address_type_choice_address, 
							'coordinates' : 	cmsms_shortcodes.map_markers_field_address_type_choice_coord 
				} 
			}, 
			// Address
			address : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.map_markers_field_address_title, 
				descr : 	cmsms_shortcodes.map_markers_field_address_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				depend : 	'address_type:address' 
			}, 
			// Latitude
			latitude : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.map_markers_field_latitude_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.value_number + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'small', 
				depend : 	'address_type:coordinates' 
			}, 
			// Longitude
			longitude : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.map_markers_field_longitude_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.value_number + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'small', 
				depend : 	'address_type:coordinates' 
			}, 
			// Type
			type : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.map_markers_field_type_title, 
				descr : 	'', 
				def : 		'ROADMAP', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ROADMAP' : 	cmsms_shortcodes.map_markers_field_type_choice_roadmap, 
							'TERRAIN' : 	cmsms_shortcodes.map_markers_field_type_choice_terrain, 
							'HYBRID' : 		cmsms_shortcodes.map_markers_field_type_choice_hybrid, 
							'SATELLITE' : 	cmsms_shortcodes.map_markers_field_type_choice_sattelite 
				} 
			}, 
			// Zoom
			zoom : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.map_markers_field_zoom_title, 
				descr : 	'', 
				def : 		'14', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4', 
							'5' : 	'5', 
							'6' : 	'6', 
							'7' : 	'7', 
							'8' : 	'8', 
							'9' : 	'9', 
							'10' : 	'10', 
							'11' : 	'11', 
							'12' : 	'12', 
							'13' : 	'13', 
							'14' : 	'14', 
							'15' : 	'15', 
							'16' : 	'16', 
							'17' : 	'17', 
							'18' : 	'18', 
							'19' : 	'19' 
				} 
			}, 
			// Height Type
			height_type : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.map_markers_field_height_type_title, 
				descr : 	'', 
				def : 		'auto', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'auto' : 	cmsms_shortcodes.map_markers_field_height_type_choice_auto, 
							'fixed' : 	cmsms_shortcodes.map_markers_field_height_type_choice_fixed 
				} 
			}, 
			// Height
			height : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.height, 
				descr : 	cmsms_shortcodes.map_markers_field_height_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' +  cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.map_markers_field_height_descr_note + "</span>", 
				def : 		'300', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'height_type:fixed' 
			}, 
			// Scrollwheel
			scroll_wheel : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.map_markers_field_scrollwheel_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	'Enable' 
				} 
			}, 
			// Double Click Zoom
			double_click_zoom : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.map_markers_field_doubleclick_zoom_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Pan Control
			pan_control : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.map_markers_field_pan_control_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Zoom Control
			zoom_control : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.map_markers_field_zoom_control_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Map Type Control
			map_type_control : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.map_markers_field_maptype_control_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Scale Control
			scale_control : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.map_markers_field_scale_control_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Street View Control
			street_view_control : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.map_markers_field_strtview_control_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' +  cmsms_shortcodes.map_markers_field_strtview_control_descr_note + "</span>", 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Overview Map Control
			overview_map_control : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.map_markers_field_overview_map_control_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Icon
	cmsms_simple_icon : { 
		title : 	cmsms_shortcodes.icon, 
		icon : 		'admin-icon-icon', 
		pair : 		true, 
		content : 	'classes', 
		visual : 	'<div><div class="cmsms_simple_icon {{ data.icon }}" style="font-size:{{ data.size }}px; line-height:{{ data.size }}px; text-align:{{ data.text_align }};"></div></div>', 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsms_shortcodes.icon, 
				descr : 	cmsms_shortcodes.icon_field_icon_descr, 
				def : 		'cmsms-icon-thumbs-up-5', 
				required : 	true, 
				width : 	'full', 
				choises : 	cmsms_composer_icons() 
			}, 
			// Size
			size : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.size, 
				descr : 	cmsms_shortcodes.icon_field_size_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.icon_field_size_descr_note + "</span>", 
				def : 		'40', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Space
			space : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_list_field_icon_space_title, 
				descr : 	cmsms_shortcodes.icon_list_field_icon_space_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.icon_field_space_descr_note + "</span>", 
				def : 		'60', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Display
			display : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.icon_field_display_title, 
				descr : 	cmsms_shortcodes.icon_field_display_descr, 
				def : 		'block', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'block' : 			cmsms_shortcodes.choice_block, 
							'inline' : 			cmsms_shortcodes.choice_inline, 
							'inline-block' : 	cmsms_shortcodes.choice_inline_block
				} 
			}, 
			// Icon Position
			text_align : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.icon_field_text_align_title, 
				descr : 	cmsms_shortcodes.icon_field_text_align_descr, 
				def : 		'center', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsms_shortcodes.choice_left, 
							'center' : 		cmsms_shortcodes.choice_center, 
							'right' : 		cmsms_shortcodes.choice_right, 
				}, 
				depend : 	'display:block' 
			}, 
			// Border Width
			border_width : { 
				type : 		'range', 
				title : 	cmsms_shortcodes.icon_field_border_width_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_pixel + "</span>", 
				def : 		'0', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Border Radius
			border_radius : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_field_border_radius_title, 
				descr : 	cmsms_shortcodes.icon_field_border_radius_descr + ' ' + cmsms_shortcodes.value_zero + ". <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.border_radius_descr_note_1 + " <br />" + cmsms_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsms_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'50%', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Icon Link
			link : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_field_link_title, 
				descr : 	cmsms_shortcodes.icon_field_link_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full' 
			}, 
			// Icon Link Target
			target : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.icon_field_target_title, 
				descr : 	cmsms_shortcodes.icon_field_target_descr, 
				def : 		'self', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'self' : 	cmsms_shortcodes.link_target_choice_self, 
							'blank' : 	cmsms_shortcodes.link_target_choice_blank 
				}, 
				depend : 	'link:!' 
			}, 
			// Color
			color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.icon_field_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Background Color
			bg_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.icon_field_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Border Color
			bd_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.icon_field_bd_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note  + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Icon Box
	cmsms_icon_box : { 
		title : 	cmsms_shortcodes.icon_title, 
		icon : 		'admin-icon-icon-box', 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<div class="{{ data.box_type }} {{ data.box_icon }}"><h2>{{ data.title }}</h2>{{ data.content }}<div class="cl"></div><a href="javascript:void(0);" class="cmsms_button">{{ data.button_title }}</a></div>', 
		multiple : 	false, 
		def : 		"<p>" + cmsms_shortcodes.def_text + "</p>", 
		fields : { 
			// Box Type
			box_type : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.icon_field_box_icon_pos_title, 
				descr : 	'', 
				def : 		'cmsms_icon_heading_left', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'cmsms_icon_top' : 				cmsms_shortcodes.icon_box_choice_pos_top, 
							'cmsms_icon_box_top' : 			cmsms_shortcodes.icon_box_choice_pos_box_top, 
							'cmsms_icon_heading_left' : 	cmsms_shortcodes.icon_box_choice_pos_heading_left, 
							'cmsms_icon_box_left' : 		cmsms_shortcodes.icon_box_choice_pos_box_left, 
							'cmsms_icon_box_left_top' : 	cmsms_shortcodes.icon_box_choice_pos_box_left_top 
				} 
			}, 
			// Box Title
			title : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_field_box_title_title, 
				descr : 	cmsms_shortcodes.icon_field_box_title_descr, 
				def : 		cmsms_shortcodes.icon_field_box_title_def, 
				required : 	true, 
				width : 	'half' 
			},  
			// Heading Type
			heading_type : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.heading_field_type_title, 
				descr : 	'', 
				def : 		'h1', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'h1' : 	'H1', 
							'h2' : 	'H2', 
							'h3' : 	'H3', 
							'h4' : 	'H4', 
							'h5' : 	'H5', 
							'h6' : 	'H6' 
				} 
			}, 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsms_shortcodes.content, 
				descr : 	"", 
				def : 		"<p>" + cmsms_shortcodes.def_text + "</p>", 
				required : 	true, 
				width : 	'full' 
			}, 
			// Box Icon Type
			box_icon_type : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.icon_list_field_icon_type_title, 
				descr : 	cmsms_shortcodes.icon_list_field_icon_type_descr, 
				def : 		'icon', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'icon' : 	cmsms_shortcodes.icon, 
							'image' : 	cmsms_shortcodes.image, 
							'number' : 	cmsms_shortcodes.number 
				} 
			}, 
			// Box Icon
			box_icon : { 
				type : 		'icon', 
				title : 	cmsms_shortcodes.icon_field_box_icon_title, 
				descr : 	'', 
				def : 		'cmsms-icon-heart-7', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_icons(), 
				depend : 	'box_icon_type:icon' 
			}, 
			// Box Icon Number
			box_icon_number : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_box_field_icon_number_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'box_icon_type:number' 
			}, 
			// Box Icon Image
			box_icon_image : { 
				type : 			'upload', 
				title : 		cmsms_shortcodes.icon_box_field_icon_image_title, 
				descr : 		'', 
				def : 			'', 
				required : 		false, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			false, 
				depend : 		'box_icon_type:image' 
			}, 
			// Box Icon Size
			box_icon_size : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_list_field_icon_size_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.value_zero + "</span>", 
				def : 		'30', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Box Icon Space
			box_icon_space : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_list_field_icon_space_title, 
				descr : 	cmsms_shortcodes.icon_list_field_icon_space_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.icon_box_field_icon_space_descr_note + "</span>", 
				def : 		'50', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Box Icon Border Width
			box_icon_border_width : { 
				type : 		'range', 
				title : 	cmsms_shortcodes.icon_box_field_icon_border_width_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_pixel + "</span>", 
				def : 		'0', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Box Icon Border Radius
			box_icon_border_radius : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_box_field_icon_border_radius_title, 
				descr : 	cmsms_shortcodes.icon_box_field_icon_border_radius_descr + ' ' + cmsms_shortcodes.value_zero + ". <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.border_radius_descr_note_1 + " <br />" + cmsms_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsms_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'50%', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Icon Color
			box_icon_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.icon_field_box_icon_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Icon Background Color
			box_icon_bg_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.icon_field_box_icon_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Icon Border Color
			box_icon_bd_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.icon_field_box_icon_bd_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Border Width
			box_border_width : { 
				type : 		'range', 
				title : 	cmsms_shortcodes.icon_box_field_border_width_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_pixel + "</span>", 
				def : 		'0', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Box Border Radius
			box_border_radius : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_box_field_border_radius_title, 
				descr : 	cmsms_shortcodes.icon_box_field_border_radius_descr + ' ' + cmsms_shortcodes.value_zero + ". <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.border_radius_descr_note_1 + " <br />" + cmsms_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsms_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Color
			box_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.icon_field_box_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Background Color
			box_bg_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.icon_field_box_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Border Color
			box_bd_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.icon_field_box_bd_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Show
			button_show : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.button_field_show_title, 
				descr : 	cmsms_shortcodes.button_field_show_descr, 
				def : 		'false', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'true' : 	cmsms_shortcodes.choice_show 
				} 
			}, 
			// Button Title
			button_title : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_label_title, 
				descr : 	cmsms_shortcodes.button_field_label_descr, 
				def : 		cmsms_shortcodes.button, 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Link
			button_link : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_link_title, 
				descr : 	cmsms_shortcodes.button_field_link_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Target
			button_target : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.button_field_target_title, 
				descr : 	cmsms_shortcodes.button_field_target_descr, 
				def : 		'self', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'self' : 	cmsms_shortcodes.link_target_choice_self, 
							'blank' : 	cmsms_shortcodes.link_target_choice_blank 
				}, 
				depend : 	'button_show:true' 
			}, 
			// Button Icon
			button_icon : { 
				type : 		'icon', 
				title : 	cmsms_shortcodes.button_field_icon_title, 
				descr : 	cmsms_shortcodes.button_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_icons(), 
				depend : 	'button_show:true' 
			}, 
			// Button Style
			button_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'' : 									cmsms_shortcodes.choice_default, 
							'cmsms_but_bg_hover' : 					'cmsms_but_bg_hover', 
							'cmsms_but_bg_slide_left' : 			'cmsms_but_bg_slide_left', 
							'cmsms_but_bg_slide_right' : 			'cmsms_but_bg_slide_right', 
							'cmsms_but_bg_slide_top' : 				'cmsms_but_bg_slide_top', 
							'cmsms_but_bg_slide_bottom' : 			'cmsms_but_bg_slide_bottom', 
							'cmsms_but_bg_expand_vert' : 			'cmsms_but_bg_expand_vert', 
							'cmsms_but_bg_expand_hor' : 			'cmsms_but_bg_expand_hor', 
							'cmsms_but_bg_expand_diag' : 			'cmsms_but_bg_expand_diag', 
							'cmsms_but_shadow' : 					'cmsms_but_shadow', 
							'cmsms_but_icon_dark_bg' : 				'cmsms_but_icon_dark_bg', 
							'cmsms_but_icon_light_bg' : 			'cmsms_but_icon_light_bg', 
							'cmsms_but_icon_divider' : 				'cmsms_but_icon_divider', 
							'cmsms_but_icon_inverse' : 				'cmsms_but_icon_inverse', 
							'cmsms_but_icon_slide_left' : 			'cmsms_but_icon_slide_left', 
							'cmsms_but_icon_slide_right' : 			'cmsms_but_icon_slide_right', 
							'cmsms_but_icon_hover_slide_left' : 	'cmsms_but_icon_hover_slide_left', 
							'cmsms_but_icon_hover_slide_right' : 	'cmsms_but_icon_hover_slide_right', 
							'cmsms_but_icon_hover_slide_top' : 		'cmsms_but_icon_hover_slide_top', 
							'cmsms_but_icon_hover_slide_bottom' : 	'cmsms_but_icon_hover_slide_bottom' 
				}, 
				depend : 	'button_show:true' 
			}, 
			// Button Google Font
			button_font_family : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_label_google_font_title, 
				descr : 	cmsms_shortcodes.button_field_label_google_font_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_label_google_font_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_fonts(), 
				depend : 	'button_show:true' 
			}, 
			// Button Font Size
			button_font_size : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_label_font_size_title, 
				descr : 	cmsms_shortcodes.button_field_label_font_size_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_label_font_size_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'button_show:true' 
			}, 
			// Button Line Height
			button_line_height : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_label_line_hight_title, 
				descr : 	cmsms_shortcodes.button_field_label_line_height_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_label_line_height_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'button_show:true' 
			}, 
			// Button Font Weight
			button_font_weight : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_label_font_weight_title, 
				descr : 	cmsms_shortcodes.button_field_label_font_weight_descr, 
				def : 		'normal', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_font_weight(), 
				depend : 	'button_show:true' 
			}, 
			// Button Font Style
			button_font_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_label_font_style_title, 
				descr : 	cmsms_shortcodes.button_field_label_font_style_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_font_style(), 
				depend : 	'button_show:true' 
			}, 
			// Button Left & Right Paddings
			button_padding_hor : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_paddings_title, 
				descr : 	cmsms_shortcodes.button_field_paddings_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_paddings_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Width
			button_border_width : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_border_width_title, 
				descr : 	cmsms_shortcodes.button_field_border_width_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Style
			button_border_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_border_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'solid' : 	cmsms_shortcodes.choice_solid, 
							'dotted' : 	cmsms_shortcodes.choice_dotted, 
							'dashed' : 	cmsms_shortcodes.choice_dashed, 
							'double' : 	cmsms_shortcodes.choice_double, 
							'groove' : 	cmsms_shortcodes.choice_groove, 
							'ridge' : 	cmsms_shortcodes.choice_ridge, 
							'inset' : 	cmsms_shortcodes.choice_inset, 
							'outset' : 	cmsms_shortcodes.choice_outset 
				}, 
				depend : 	'button_show:true' 
			}, 
			// Button Border Radius
			button_border_radius : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_border_radius_title, 
				descr : 	cmsms_shortcodes.button_field_border_radius_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.border_radius_descr_note_1 + " <br />" + cmsms_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsms_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'', 
				required : 	false, 
				depend : 	'button_show:true' 
			}, 
			// Button Background Color
			button_bg_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bg_color_title, 
				descr : 	cmsms_shortcodes.button_field_bg_color_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Text Color
			button_text_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_txt_color_title, 
				descr : 	cmsms_shortcodes.button_field_txt_color_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Color
			button_border_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bd_color_title, 
				descr : 	cmsms_shortcodes.button_field_bd_color_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Background Color on Mouseover
			button_bg_color_h : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bg_color_h_title, 
				descr : 	cmsms_shortcodes.button_field_bg_color_h_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Text Color on Mouseover
			button_text_color_h : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_txt_color_h_title, 
				descr : 	cmsms_shortcodes.button_field_txt_color_h_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Color on Mouseover
			button_border_color_h : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bd_color_h_title, 
				descr : 	cmsms_shortcodes.button_field_bd_color_h_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Icon List
	cmsms_icon_list_items : { 
		title : 	cmsms_shortcodes.icon_list_title, 
		icon : 		'admin-icon-list', 
		pair : 		true, 
		content : 	'list', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsms_icon_list_item title="' + cmsms_shortcodes.title + '"]<p>' + cmsms_shortcodes.def_text + '</p>[/cmsms_icon_list_item]', 
		fields : { 
			// Icon List
			list : { 
				type : 		'multiple', 
				title : 	cmsms_shortcodes.icon_list_title, 
				descr : 	cmsms_shortcodes.icon_list_field_icon_list_descr, 
				def : 		'[cmsms_icon_list_item title="' + cmsms_shortcodes.title + '"]<p>' + cmsms_shortcodes.def_text + '</p>[/cmsms_icon_list_item]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// List Type
			type : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.icon_list_field_list_type_title, 
				descr : 	cmsms_shortcodes.icon_list_field_list_type_descr, 
				def : 		'block', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'block' : 	cmsms_shortcodes.icon_list_field_list_type_choice_block, 
							'list' : 	cmsms_shortcodes.icon_list_field_list_type_choice_list 
				} 
			}, 
			// Icon Type
			icon_type : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.icon_list_field_icon_type_title, 
				descr : 	cmsms_shortcodes.icon_list_field_icon_type_descr, 
				def : 		'icon', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'icon' : 					cmsms_shortcodes.icon, 
							'image' : 					cmsms_shortcodes.image, 
							'decimal' : 				cmsms_shortcodes.choice_decimal, 
							'decimal-leading-zero' : 	cmsms_shortcodes.choice_decimal_zero, 
							'lower-roman' : 			cmsms_shortcodes.choice_l_roman, 
							'upper-roman' : 			cmsms_shortcodes.choice_u_roman, 
							'lower-greek' : 			cmsms_shortcodes.choice_l_greek, 
							'lower-latin' : 			cmsms_shortcodes.choice_l_latin, 
							'upper-latin' : 			cmsms_shortcodes.choice_u_latin 
				}, 
				depend : 	'type:block' 
			}, 
			// Default Icon
			icon : { 
				type : 		'icon', 
				title : 	'Default Icon', 
				descr : 	"Choose default icon for your icon list", 
				def : 		'cmsms-icon-thumbs-up-5', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsms_composer_icons() 
			}, 
			// Icon Size
			icon_size : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_list_field_icon_size_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.value_zero + "</span>", 
				def : 		'30', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Heading Type
			heading : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.heading_field_type_title, 
				descr : 	"</span>", 
				def : 		'h4', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'h1' : 	'H1', 
							'h2' : 	'H2', 
							'h3' : 	'H3', 
							'h4' : 	'H4', 
							'h5' : 	'H5', 
							'h6' : 	'H6' 
				}, 
				depend : 	'type:block' 
			}, 
			// Icon Space
			icon_space : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_list_field_icon_space_title, 
				descr : 	cmsms_shortcodes.icon_list_field_icon_space_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.icon_list_field_icon_space_descr_note + "</span>", 
				def : 		'100', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'type:block' 
			}, 
			// List Items Color Type
			items_color_type : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.icon_list_field_items_color_title, 
				descr : 	cmsms_shortcodes.icon_list_field_items_color_descr, 
				def : 		'border', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'border' : 	cmsms_shortcodes.icon_list_field_items_color_choice_border, 
							'bg' : 		cmsms_shortcodes.icon_list_field_items_color_choice_bg, 
							'icon' : 	cmsms_shortcodes.icon_list_field_items_color_choice_icon 
				}, 
				depend : 	'type:block' 
			}, 
			// Border Width
			border_width : { 
				type : 		'range', 
				title : 	cmsms_shortcodes.icon_list_field_border_width_title, 
				descr : 	cmsms_shortcodes.icon_list_field_border_width_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note + "</span>", 
				def : 		'10', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20', 
				depend : 	'type:block' 
			}, 
			// Border Radius
			border_radius : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_list_field_border_radius_title, 
				descr : 	cmsms_shortcodes.icon_list_field_border_radius_descr + ' ' + cmsms_shortcodes.value_zero + ". <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.border_radius_descr_note_1 + " <br />" + cmsms_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsms_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'50%', 
				required : 	false, 
				width : 	'half', 
				depend : 	'type:block' 
			}, 
			// List Items Unifier Width
			unifier_width : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_list_field_items_unifier_title, 
				descr : 	cmsms_shortcodes.icon_list_field_items_unifier_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.value_zero + "</span>", 
				def : 		'1', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20', 
				depend : 	'type:block' 
			}, 
			// Icon Position
			position : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.icon_list_field_icon_position_title, 
				descr : 	cmsms_shortcodes.icon_list_field_icon_position_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.icon_list_field_icon_position_descr_note + "</span>", 
				def : 		'left', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'left' : 	cmsms_shortcodes.position_choice_left_side, 
							'right' : 	cmsms_shortcodes.position_choice_right_side 
				}, 
				depend : 	'type:block' 
			}, 
			// List Item Height
			item_height : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.icon_list_field_item_height_title, 
				descr : 	cmsms_shortcodes.icon_list_field_item_height_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.icon_list_field_item_height_descr_note + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'type:list' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Image
	cmsms_image : { 
		title : 	cmsms_shortcodes.image_title, 
		icon : 		'admin-icon-image', 
		pair : 		true, 
		content : 	'image', 
		visual : 	'<div><img src="{{ data.image }}" alt="" class="{{ data.align }}" /></div>', 
		multiple : 	false, 
		def : 		cmsms_shortcodes.theme_url + '/framework/admin/inc/img/image.png', 
		fields : { 
			// Image
			image : { 
				type : 			'upload', 
				title : 		cmsms_shortcodes.image_title, 
				descr : 		'', 
				def : 			cmsms_shortcodes.theme_url + '/framework/admin/inc/img/image.png', 
				required : 		true, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		true, 
				align : 		true, 
				link : 			true, 
				size : 			true 
			}, 
			// Image Align
			align : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.image_field_image_align_title, 
				descr : 	'', 
				def : 		'center', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'left' : 	cmsms_shortcodes.choice_left, 
							'center' : 	cmsms_shortcodes.choice_center, 
							'right' : 	cmsms_shortcodes.choice_right, 
							'none' : 	cmsms_shortcodes.image_field_image_align_choice_none
				}
			}, 
			// Caption
			caption : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.image_field_caption_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.image_field_caption_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Image Link
			link : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.image_field_image_link_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.image_field_image_link_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Link Target
			target : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.link_target, 
				descr : 	cmsms_shortcodes.image_field_link_target_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				}, 
				depend : 	'link:!' 
			}, 
			// Lightbox
			lightbox : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.image_field_link_lightbox_title, 
				descr : 	cmsms_shortcodes.image_field_link_lightbox_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				}, 
				depend : 	'link:!' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Notice
	cmsms_notice : { 
		title : 	cmsms_shortcodes.notice_title, 
		icon : 		'admin-icon-notice', 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<div class="{{ data.type }} {{ data.icon }} {{ data.close }}">{{ data.content }}</div>', 
		multiple : 	false, 
		def : 		"<p>" + cmsms_shortcodes.def_text + "</p>", 
		fields : { 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsms_shortcodes.notice_field_content_title, 
				descr : 	"", 
				def : 		"<p>" + cmsms_shortcodes.def_text + "</p>", 
				required : 	true, 
				width : 	'full' 
			}, 
			// Notice Type
			type : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.notice_field_notice_type_title, 
				descr : 	'', 
				def : 		'cmsms_notice_success', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'cmsms_notice_success' : 	cmsms_shortcodes.notice_field_notice_type_choice_success, 
							'cmsms_notice_error' : 		cmsms_shortcodes.notice_field_notice_type_choice_error, 
							'cmsms_notice_info' : 		cmsms_shortcodes.notice_field_notice_type_choice_info, 
							'cmsms_notice_warning' : 	cmsms_shortcodes.notice_field_notice_type_choice_warning, 
							'cmsms_notice_download' : 	cmsms_shortcodes.notice_field_notice_type_choice_download, 
							'cmsms_notice_custom' : 	cmsms_shortcodes.notice_field_notice_type_choice_custom 
				} 
			}, 
			// Background Color
			bg_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.background_color, 
				descr : 	cmsms_shortcodes.notice_field_bg_color_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'type:cmsms_notice_custom' 
			}, 
			// Border Color
			bd_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.notice_field_border_color_title, 
				descr : 	cmsms_shortcodes.notice_field_border_color_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'type:cmsms_notice_custom' 
			}, 
			// Text Color
			color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.notice_field_txt_color_title, 
				descr : 	cmsms_shortcodes.notice_field_txt_color_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'type:cmsms_notice_custom' 
			}, 
			// Close Button
			close : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.notice_field_close_button_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	'Show' 
				} 
			}, 
			// Notice Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsms_shortcodes.notice_field_notice_icon_title, 
				descr : 	'', 
				def : 		'cmsms-icon-check-2', 
				required : 	false, 
				width : 	'full', 
				choises : 	cmsms_composer_icons() 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Portfolio
	cmsms_portfolio : { 
		title : 	cmsms_shortcodes.portfolio_title, 
		icon : 		'admin-icon-portfolio', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.orderby_title, 
				descr : 	cmsms_shortcodes.portfolio_field_orderby_descr, 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsms_shortcodes.choice_date, 
							'name' : 		cmsms_shortcodes.name, 
							'id' : 			cmsms_shortcodes.choice_id, 
							'menu_order' : 	cmsms_shortcodes.choice_menu, 
							'popular' : 	cmsms_shortcodes.choice_popular 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.order_title, 
				descr : 	cmsms_shortcodes.order_descr, 
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsms_shortcodes.choice_asc, 
							'DESC' : 	cmsms_shortcodes.choice_desc
				} 
			}, 
			// Projects Number
			count : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.portfolio_field_pj_number_title, 
				descr : 	cmsms_shortcodes.portfolio_field_pj_number_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.portfolio_field_pj_number_descr_note + "</span>", 
				def : 		'10', 
				required : 	false, 
				width : 	'number', 
				min : 		'1' 
			}, 
			// Categories
			categories : { 
				type : 		'select_multiple', 
				title : 	cmsms_shortcodes.categories, 
				descr : 	cmsms_shortcodes.portfolio_field_categories_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.portfolio_field_categories_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_pj_categories() 
			}, 
			// Layout
			layout : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.layout, 
				descr : 	cmsms_shortcodes.portfolio_field_layout_descr, 
				def : 		'grid', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'grid' : 	cmsms_shortcodes.portfolio_field_layout_choice_grid, 
							'puzzle' : 	cmsms_shortcodes.portfolio_field_layout_choice_puzzle 
				} 
			}, 
			// Layout Mode
			layout_mode : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.layout_mode, 
				descr : 	cmsms_shortcodes.portfolio_field_layout_mode_descr, 
				def : 		'perfect', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'perfect' : 	cmsms_shortcodes.portfolio_field_layout_mode_choice_perfect, 
							'masonry' : 	cmsms_shortcodes.portfolio_field_layout_mode_choice_masonry 
				}, 
				depend : 	'layout:grid' 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.columns_count, 
				descr : 	cmsms_shortcodes.portfolio_field_col_count_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.portfolio_field_col_count_descr_note + "<br />" + cmsms_shortcodes.portfolio_field_col_count_descr_note_custom + "</span>", 
				def : 		'4', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4', 
							'5' : 	'5' 
				}, 
				depend : 	'layout:grid' 
			}, 
			// Metadata
			metadata : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.metadata, 
				descr : 	cmsms_shortcodes.portfolio_field_metadata_descr, 
				def : 		'title,categories,rollover', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'title' : 		cmsms_shortcodes.choice_title, 
							'excerpt' : 	cmsms_shortcodes.choice_excerpt, 
							'categories' : 	cmsms_shortcodes.choice_categories, 
							'comments' : 	cmsms_shortcodes.choice_comments, 
							'likes' : 		cmsms_shortcodes.choice_likes, 
							'rollover' : 	cmsms_shortcodes.choice_rollover 
				} 
			}, 
			// Gap
			gap : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.portfolio_field_gap_title, 
				descr : 	cmsms_shortcodes.portfolio_field_gap_descr, 
				def : 		'large', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'large' : 	cmsms_shortcodes.portfolio_field_gap_choice_large, 
							'small' : 	cmsms_shortcodes.portfolio_field_gap_choice_small, 
							'zero' : 	cmsms_shortcodes.portfolio_field_gap_choice_zero 
				} 
			}, 
			// Filter
			filter : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.filter, 
				descr : 	cmsms_shortcodes.portfolio_field_filter_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Filter Button Text
			filter_text : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.filter_text_title, 
				descr : 	cmsms_shortcodes.filter_text_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.filter_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'filter:true' 
			}, 
			// Filter 'All Categories' Text
			filter_cats_text : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.filter_cats_text_title, 
				descr : 	cmsms_shortcodes.filter_cats_text_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.filter_cats_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'filter:true' 
			}, 
			// Sorting
			sorting : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.portfolio_field_sorting_title, 
				descr : 	cmsms_shortcodes.portfolio_field_sorting_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				}, 
				depend : 	'layout:grid' 
			}, 
			// Sorting By Name Button Text
			sorting_name_text : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.sorting_name_text_title, 
				descr : 	cmsms_shortcodes.sorting_name_text_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.sorting_name_text_descr_note + ". <br />" + cmsms_shortcodes.sorting_enabled_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'layout:grid' 
			}, 
			// Sorting By Date Button Text
			sorting_date_text : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.sorting_date_text_title, 
				descr : 	cmsms_shortcodes.sorting_date_text_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.sorting_date_text_descr_note + ". <br />" + cmsms_shortcodes.sorting_enabled_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'layout:grid' 
			}, 
			// Pagination
			pagination : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.pagination_title, 
				descr : 	cmsms_shortcodes.pagination_descr, 
				def : 		'pagination', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'pagination' : 	cmsms_shortcodes.pagination_choice_pagination, 
							'more' : 		cmsms_shortcodes.pagination_choice_more, 
							'disabled' : 	cmsms_shortcodes.pagination_choice_disabled 
				} 
			}, 
			// 'Load More' Button Text
			more_text : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.pagination_more_text_title, 
				descr : 	cmsms_shortcodes.pagination_more_text_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.pagination_more_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'pagination:more' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Posts Slider
	cmsms_posts_slider : { 
		title : 	cmsms_shortcodes.posts_slider_title, 
		icon : 		'admin-icon-post-slider', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.orderby_title, 
				descr : 	cmsms_shortcodes.posts_slider_field_orderby_descr, 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsms_shortcodes.choice_date, 
							'name' : 		cmsms_shortcodes.name, 
							'id' : 			cmsms_shortcodes.choice_id, 
							'menu_order' : 	cmsms_shortcodes.choice_menu, 
							'popular' : 	cmsms_shortcodes.choice_popular, 
							'rand' : 		cmsms_shortcodes.choice_rand 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.order_title, 
				descr : 	cmsms_shortcodes.order_descr, 
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsms_shortcodes.choice_asc, 
							'DESC' : 	cmsms_shortcodes.choice_desc 
				} 
			}, 
			// Posts Type
			post_type : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.posts_slider_field_poststype_title, 
				descr : 	'', 
				def : 		'post', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'post' : 		cmsms_shortcodes.posts_slider_field_poststype_choice_post, 
							'project' : 	cmsms_shortcodes.posts_slider_field_poststype_choice_project 
				} 
			}, 
			// Posts Categories
			blog_categories : { 
				type : 		'select_multiple', 
				title : 	cmsms_shortcodes.posts_slider_field_postscateg_title, 
				descr : 	cmsms_shortcodes.posts_slider_field_postscateg_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.posts_slider_field_postscateg_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_categories(), 
				depend : 	'post_type:post' 
			}, 
			// Projects Categories
			portfolio_categories : { 
				type : 		'select_multiple', 
				title : 	cmsms_shortcodes.posts_slider_field_pjcateg_title, 
				descr : 	cmsms_shortcodes.posts_slider_field_pjcateg_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.posts_slider_field_pjcateg_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_pj_categories(), 
				depend : 	'post_type:project' 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.columns_count, 
				descr : 	cmsms_shortcodes.posts_slider_field_col_count_descr, 
				def : 		'4', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				}, 
				depend : 	'post_type:project' 
			}, 
			// Posts Amount
			amount : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.posts_slider_field_postsamount_title, 
				descr : 	cmsms_shortcodes.posts_slider_field_postsamount_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.posts_slider_field_postsamount_descr_note + "</span>", 
				def : 		'1', 
				required : 	false, 
				width : 	'number', 
				min : 		'1', 
				depend : 	'post_type:post' 
			}, 
			// Posts Number
			count : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.posts_slider_field_postsnumber_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.posts_slider_field_postsnumber_descr_note + "</span>", 
				def : 		'12', 
				required : 	false, 
				width : 	'number', 
				min : 		'1' 
			}, 
			// Pause Time
			pause : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.pause_time, 
				descr : 	cmsms_shortcodes.posts_slider_field_pausetime_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.autoslide_def + "</span>", 
				def : 		'5', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Posts Metadata
			blog_metadata : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.posts_slider_field_postsmeta_title, 
				descr : 	cmsms_shortcodes.posts_slider_field_postsmeta_descr, 
				def : 		'title,date,categories,comments,likes,more', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'title' : 		cmsms_shortcodes.choice_title, 
							'excerpt' : 	cmsms_shortcodes.choice_excerpt, 
							'date' : 		cmsms_shortcodes.choice_date, 
							'categories' : 	cmsms_shortcodes.choice_categories, 
							'author' : 		cmsms_shortcodes.choice_author, 
							'comments' : 	cmsms_shortcodes.choice_comments, 
							'likes' : 		cmsms_shortcodes.choice_likes, 
							'more' : 		cmsms_shortcodes.choice_more 
				}, 
				depend : 	'post_type:post' 
			}, 
			// Projects Metadata
			portfolio_metadata : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.posts_slider_field_pjmeta_title, 
				descr : 	cmsms_shortcodes.posts_slider_field_pjmeta_descr, 
				def : 		'title,categories,likes', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'title' : 		cmsms_shortcodes.choice_title, 
							'excerpt' : 	cmsms_shortcodes.choice_excerpt, 
							'categories' : 	cmsms_shortcodes.choice_categories, 
							'comments' : 	cmsms_shortcodes.choice_comments, 
							'likes' : 		cmsms_shortcodes.choice_likes 
				}, 
				depend : 	'post_type:project' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Pricing Table Items
	cmsms_pricing_table_items : { 
		title : 	cmsms_shortcodes.pricing_title, 
		icon : 		'admin-icon-price', 
		pair : 		true, 
		content : 	'offers', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsms_pricing_table_item currency="$" price="99"]' + cmsms_shortcodes.title + '[/cmsms_pricing_table_item]', 
		fields : { 
			// Offers
			offers : { 
				type : 		'multiple', 
				title : 	cmsms_shortcodes.pricing_field_offers_title, 
				descr : 	cmsms_shortcodes.pricing_field_offers_descr, 
				def : 		'[cmsms_pricing_table_item currency="$" price="99"]' + cmsms_shortcodes.title + '[/cmsms_pricing_table_item]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Columns Count
			columns : { 
				type : 		'select',   
				title : 	cmsms_shortcodes.columns_count, 
				descr : 	cmsms_shortcodes.pricing_field_col_count_descr, 
				def : 		'4', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Profiles
	cmsms_profiles : { 
		title : 	cmsms_shortcodes.profiles_title, 
		icon : 		'admin-icon-profiles', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.orderby_title, 
				descr : 	cmsms_shortcodes.profiles_field_orderby_descr, 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsms_shortcodes.choice_date, 
							'name' : 		cmsms_shortcodes.name, 
							'id' : 			cmsms_shortcodes.choice_id, 
							'menu_order' : 	cmsms_shortcodes.choice_menu, 
							'rand' : 		cmsms_shortcodes.choice_rand 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.order_title, 
				descr : 	cmsms_shortcodes.order_descr, 
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsms_shortcodes.choice_asc, 
							'DESC' : 	cmsms_shortcodes.choice_desc
				} 
			}, 
			// Profiles Number
			count : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.profiles_field_profiles_number_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.profiles_field_profiles_number_descr_note + "</span>", 
				def : 		'4', 
				required : 	false, 
				width : 	'number', 
				min : 		'1' 
			}, 
			// Categories
			categories : { 
				type : 		'select_multiple', 
				title : 	cmsms_shortcodes.categories, 
				descr : 	cmsms_shortcodes.profiles_field_categories_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.profiles_field_categories_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_pl_categories() 
			}, 
			// Layout
			layout : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.layout, 
				descr : 	'', 
				def : 		'vertical', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'vertical' : 	cmsms_shortcodes.choice_vertical, 
							'horizontal' : 	cmsms_shortcodes.choice_horizontal 
				} 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.columns_count, 
				descr : 	cmsms_shortcodes.profiles_field_col_count_descr, 
				def : 		'4', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				}, 
				depend : 	'layout:horizontal' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Progress Bars
	cmsms_stats : { 
		title : 	cmsms_shortcodes.prog_bars_title, 
		icon : 		'admin-icon-stats', 
		pair : 		true, 
		content : 	'stats', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsms_stat progress="50"]' + cmsms_shortcodes.title + '[/cmsms_stat]', 
		fields : { 
			// Progress Bars
			stats : { 
				type : 		'multiple', 
				title : 	cmsms_shortcodes.prog_bars_title, 
				descr : 	cmsms_shortcodes.prog_bars_field_prog_bars_descr, 
				def : 		'[cmsms_stat progress="50"]' + cmsms_shortcodes.title + '[/cmsms_stat]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Mode
			mode : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.mode, 
				descr : 	cmsms_shortcodes.prog_bars_field_mode_descr, 
				def : 		'bars', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'bars' : 		cmsms_shortcodes.prog_bars_field_mode_choice_bars, 
							'circles' : 	cmsms_shortcodes.prog_bars_field_mode_choice_circles 
				} 
			}, 
			// Type
			type : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.prog_bars_field_type_title, 
				descr : 	'', 
				def : 		'horizontal', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'horizontal' : 	cmsms_shortcodes.choice_icon_side, 
							'vertical' : 	cmsms_shortcodes.choice_icon_top 
				}, 
				depend : 	'mode:bars' 
			}, 
			// Number per Row
			count : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.prog_bars_field_number_per_row_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.prog_bars_field_number_per_row_descr_note + "</span>", 
				def : 		'5', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'5' : 	'5', 
							'4' : 	'4', 
							'3' : 	'3', 
							'2' : 	'2', 
							'1' : 	'1' 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Quotes
	cmsms_quotes : { 
		title : 	cmsms_shortcodes.quotes_title, 
		icon : 		'admin-icon-quotes', 
		pair : 		true, 
		content : 	'quotes', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsms_quote name="Name"]' + "<p>" + cmsms_shortcodes.def_text + "</p>" + '[/cmsms_quote]', 
		fields : { 
			// Quotes
			quotes : { 
				type : 		'multiple', 
				title : 	cmsms_shortcodes.quotes_title, 
				descr : 	"Here you can add, edit, remove or sort quotes", 
				def : 		'[cmsms_quote name="Name"]' + "<p>" + cmsms_shortcodes.def_text + "</p>" + '[/cmsms_quote]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Mode
			mode : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.mode, 
				descr : 	cmsms_shortcodes.quotes_field_mode_descr, 
				def : 		'grid', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'grid' : 	cmsms_shortcodes.quotes_field_mode_choice_grid, 
							'slider' : 	cmsms_shortcodes.quotes_field_mode_choice_slider 
				} 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.columns_count, 
				descr : 	cmsms_shortcodes.quotes_field_col_count_descr, 
				def : 		'2', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				}, 
				depend : 	'mode:grid' 
			}, 
			// Pause Time
			speed : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.pause_time, 
				descr : 	cmsms_shortcodes.quotes_field_slideshow_speed_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.quotes_field_slideshow_speed_descr_note + "</span>", 
				def : 		'5', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'mode:slider' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Sidebar
	cmsms_sidebar : { 
		title : 	cmsms_shortcodes.sidebar_title, 
		icon : 		'admin-icon-sidebar', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Sidebar
			sidebar : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.sidebar_title, 
				descr : 	cmsms_shortcodes.sidebar_field_sidebar_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.sidebar_field_sidebar_descr_note + '<a href=\"' + cmsms_shortcodes.admin_url + 'admin.php?page=cmsms-settings&tab=sidebar\" target=\"_blank\">' + ' ' + cmsms_shortcodes.sidebar_field_sidebar_descr_note_link + "</a></span>", 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsms_composer_sidebars() 
			}, 
			// Sidebar Layout
			layout : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.sidebar_field_sidebar_layout_title, 
				descr : 	"<span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.sidebar_field_sidebar_layout_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_layouts() 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Slider
	cmsms_slider : { 
		title : 	cmsms_shortcodes.slider_title, 
		icon : 		'admin-icon-slider', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Slider Plugin
			slider_plugin : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.slider_field_plugin_title, 
				descr : 	cmsms_shortcodes.slider_field_plugin_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.slider_field_plugin_descr_note + "</span>", 
				def : 		'layer', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'layer' : 	cmsms_shortcodes.slider_layer, 
							'rev' : 	cmsms_shortcodes.slider_rev 
				} 
			}, 
			// Layer Slider Name
			slider_layer : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.slider_field_layer_id_title, 
				descr : 	cmsms_shortcodes.slider_field_layer_id_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsms_composer_layer_slider(), 
				depend : 	'slider_plugin:layer' 
			}, 
			// Revolution Slider Name
			slider_rev : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.slider_field_rev_id_title, 
				descr : 	cmsms_shortcodes.slider_field_rev_id_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsms_composer_rev_slider(), 
				depend : 	'slider_plugin:rev' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Social Sharing
	cmsms_social : { 
		title : 	cmsms_shortcodes.social_sharing_title, 
		icon : 		'admin-icon-social', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Facebook Like Button
			facebook : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.social_sharing_field_fb_button_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_show 
				} 
			}, 
			// Twitter Tweet Button
			twitter : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.social_sharing_field_twitter_button_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_show 
				} 
			}, 
			// GooglePlus +1 Button
			google : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.social_sharing_field_googleplus_button_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_show 
				} 
			}, 
			// Pinterest Pin it Button
			pinterest : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.social_sharing_field_pinterest_button_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_show 
				} 
			}, 
			// Buttons Type
			type : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.social_sharing_field_buttons_type_title, 
				descr : 	'', 
				def : 		'horizontal', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'horizontal' : 	cmsms_shortcodes.choice_horizontal, 
							'vertical' : 	cmsms_shortcodes.choice_vertical 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Table
	cmsms_table : { 
		title : 	cmsms_shortcodes.table_title, 
		icon : 		'admin-icon-table', 
		pair : 		true, 
		content : 	'table', 
		visual : 	false, 
		multiple : 	false, 
		def : 		'[cmsms_tr][cmsms_td][/cmsms_td][cmsms_td][/cmsms_td][cmsms_td][/cmsms_td][/cmsms_tr][cmsms_tr][cmsms_td][/cmsms_td][cmsms_td][/cmsms_td][cmsms_td][/cmsms_td][/cmsms_tr][cmsms_tr][cmsms_td][/cmsms_td][cmsms_td][/cmsms_td][cmsms_td][/cmsms_td][/cmsms_tr]', 
		fields : { 
			// Table Content
			table : { 
				type : 		'table', 
				title : 	cmsms_shortcodes.table_field_table_content_title, 
				descr : 	cmsms_shortcodes.table_field_table_content_descr, 
				def : 		'[cmsms_tr][cmsms_td][/cmsms_td][cmsms_td][/cmsms_td][cmsms_td][/cmsms_td][/cmsms_tr][cmsms_tr][cmsms_td][/cmsms_td][cmsms_td][/cmsms_td][cmsms_td][/cmsms_td][/cmsms_tr][cmsms_tr][cmsms_td][/cmsms_td][cmsms_td][/cmsms_td][cmsms_td][/cmsms_td][/cmsms_tr]', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Table Caption
			caption : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.table_field_table_caption_title, 
				descr : 	cmsms_shortcodes.table_field_table_caption_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note  + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Tabs
	cmsms_tabs : { 
		title : 	cmsms_shortcodes.tabs_title, 
		icon : 		'admin-icon-tabs', 
		pair : 		true, 
		content : 	'tabs', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsms_tab title="' + cmsms_shortcodes.title + '"]<p>' + cmsms_shortcodes.def_text + '</p>[/cmsms_tab]', 
		fields : { 
			// Tabs
			tabs : { 
				type : 		'multiple', 
				title : 	cmsms_shortcodes.tabs_title, 
				descr : 	cmsms_shortcodes.tabs_field_tabs_descr, 
				def : 		'[cmsms_tab title="' + cmsms_shortcodes.title + '"]<p>' + cmsms_shortcodes.def_text + '</p>[/cmsms_tab]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Mode
			mode : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.mode, 
				descr : 	cmsms_shortcodes.tabs_field_mode_descr, 
				def : 		'tab', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'tab' : 	cmsms_shortcodes.tabs_field_mode_choice_tabs, 
							'tour' : 	cmsms_shortcodes.tabs_field_mode_choice_tour 
				} 
			}, 
			// Position
			position : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.tabs_field_position_title, 
				descr : 	cmsms_shortcodes.tabs_field_position_descr, 
				def : 		'left', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'left' : 	cmsms_shortcodes.position_choice_left_side, 
							'right' : 	cmsms_shortcodes.position_choice_right_side 
				}, 
				depend : 	'mode:tour' 
			}, 
			// Active Tab
			active : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.tabs_field_active_title, 
				descr : 	cmsms_shortcodes.tabs_field_active_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.tabs_field_active_descr_note + "</span>", 
				def : 		'1', 
				required : 	true, 
				width : 	'half' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Toggles
	cmsms_toggles : { 
		title : 	cmsms_shortcodes.toggles_title, 
		icon : 		'admin-icon-toggles', 
		pair : 		true, 
		content : 	'toggles', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsms_toggle title="' + cmsms_shortcodes.title + '"]<p>' + cmsms_shortcodes.def_text + '</p>[/cmsms_toggle]', 
		fields : { 
			// Toggles
			toggles : { 
				type : 		'multiple', 
				title : 	cmsms_shortcodes.toggles_title, 
				descr : 	cmsms_shortcodes.toggles_field_toggles_descr, 
				def : 		'[cmsms_toggle title="' + cmsms_shortcodes.title + '"]<p>' + cmsms_shortcodes.def_text + '</p>[/cmsms_toggle]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Mode
			mode : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.mode, 
				descr : 	cmsms_shortcodes.toggles_field_mode_descr, 
				def : 		'toggle', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'toggle' : 		cmsms_shortcodes.toggles_field_mode_choice_toggles, 
							'accordion' : 	cmsms_shortcodes.toggles_field_mode_choice_accordion 
				} 
			}, 
			// Active Toggle
			active : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.toggles_field_active_title, 
				descr : 	cmsms_shortcodes.toggles_field_active_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.toggles_field_active_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Sorting
			sort : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.toggles_field_sorting_title, 
				descr : 	cmsms_shortcodes.toggles_field_sorting_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			},  
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half'
			} 
		} 
	}, 
	
	
	// Twitter Stripe
	cmsms_twitter : { 
		title : 	cmsms_shortcodes.twitter_title, 
		icon : 		'admin-icon-twitter', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Twitter Username
			user : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.twitter_field_username_title, 
				descr : 	cmsms_shortcodes.twitter_field_username_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Tweets Number
			count : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.twitter_field_tweets_number_title, 
				descr : 	cmsms_shortcodes.twitter_field_tweets_number_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.value_number + ' ' + cmsms_shortcodes.twitter_field_tweets_number_descr_note + "</span>", 
				def : 		'5', 
				required : 	true, 
				width : 	'number', 
				min : 		'1' 
			}, 
			// Date visibility
			date : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.twitter_field_tweets_date_title, 
				descr : 	cmsms_shortcodes.twitter_field_tweets_date_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Twitter Controls
			control : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.twitter_field_slider_controls_title, 
				descr : 	cmsms_shortcodes.twitter_field_slider_controls_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Twitter Autoplay
			autoplay : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.autoplay, 
				descr : 	cmsms_shortcodes.twitter_field_slider_autoplay_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Twitter Speed
			speed : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.pause_time, 
				descr : 	cmsms_shortcodes.twitter_field_slider_speed_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.twitter_field_slider_speed_descr_note + "</span>", 
				def : 		'3', 
				required : 	false, 
				width : 	'small'
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Video
	cmsms_videos : { 
		title : 	cmsms_shortcodes.video_title, 
		icon : 		'admin-icon-video', 
		pair : 		true, 
		content : 	'video', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsms_video]' + cmsms_shortcodes.media_def + '[/cmsms_video]', 
		fields : { 
			// Video
			video : { 
				type : 		'multiple', 
				title : 	cmsms_shortcodes.video_title, 
				descr : 	cmsms_shortcodes.video_field_video_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.video_field_video_descr_note + ' (' + cmsms_shortcodes.more_info + " <a href='http://www.w3schools.com/html/html5_video.asp' target='_blank'>" + cmsms_shortcodes.click_here + "</a>)</span>", 
				def : 		'[cmsms_video]' + cmsms_shortcodes.media_def + '[/cmsms_video]', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Poster
			poster : { 
				type : 			'upload', 
				title : 		cmsms_shortcodes.video_field_poster_title, 
				descr : 		cmsms_shortcodes.video_field_poster_descr, 
				def : 			'', 
				required : 		false, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			true 
			}, 
			// Max Width
			width : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.video_field_maxwidth_title, 
				descr : 	cmsms_shortcodes.video_field_maxwidth_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.embed_field_maxwidth_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Max Height
			height : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.video_field_maxheight_title, 
				descr : 	cmsms_shortcodes.video_field_maxheight_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.embed_field_maxheight_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Wrap Video
			wrap : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.embed_field_wrap_title, 
				descr : 	cmsms_shortcodes.embed_field_wrap_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Autoplay
			autoplay : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.autoplay, 
				descr : 	cmsms_shortcodes.video_field_autoplay_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Muted
			muted : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.video_field_muted_title, 
				descr : 	cmsms_shortcodes.video_field_muted_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Repeat
			loop : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.repeat, 
				descr : 	cmsms_shortcodes.video_field_repeat_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Preload
			preload : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.preload, 
				descr : 	cmsms_shortcodes.video_field_preload_descr, 
				def : 		'none', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'none' : 		cmsms_shortcodes.video_field_preload_choice_none, 
							'auto' : 		cmsms_shortcodes.video_field_preload_choice_auto, 
							'metadata' : 	cmsms_shortcodes.video_field_preload_choice_metadata 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Custom HTML
	cmsms_html : { 
		title : 	cmsms_shortcodes.custom_html_title, 
		icon : 		'admin-icon-html', 
		pair : 		true, 
		content : 	'html', 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// HTML Code
			html : { 
				type : 		'base64', 
				title : 	cmsms_shortcodes.custom_html_field_code_title, 
				descr : 	cmsms_shortcodes.custom_html_field_code_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Custom CSS
	cmsms_css : { 
		title : 	cmsms_shortcodes.custom_css_title, 
		icon : 		'admin-icon-css', 
		pair : 		true, 
		content : 	'css', 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// CSS Code
			css : { 
				type : 		'base64', 
				title : 	cmsms_shortcodes.custom_css_field_code_title, 
				descr : 	cmsms_shortcodes.custom_css_field_code_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Custom JS
	cmsms_js : { 
		title : 	cmsms_shortcodes.custom_js_title, 
		icon : 		'admin-icon-js', 
		pair : 		true, 
		content : 	'js', 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// JavaScript Code
			js : { 
				type : 		'base64', 
				title : 	cmsms_shortcodes.custom_js_field_code_title, 
				descr : 	cmsms_shortcodes.custom_js_field_code_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	} 
};


// CMSMasters Custom Shortcodes WooCommerce Extension
if (cmsms_composer_products() === 'true') {
	cmsmsShortcodes.cmsms_products = {
		title : 	cmsms_shortcodes.products_title, 
		icon : 		'admin-icon-shop', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Products Shortcode Choise
			products_shortcode : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.products_shortcode_title, 
				descr : 	cmsms_shortcodes.products_shortcode_descr, 
				def : 		'recent_products', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'recent_products' : 		cmsms_shortcodes.choice_recent_products, 
							'featured_products' : 		cmsms_shortcodes.choice_featured_products, 
							'sale_products' : 			cmsms_shortcodes.choice_sale_products, 
							'best_selling_products' : 	cmsms_shortcodes.choice_best_selling_products, 
							'top_rated_products' : 		cmsms_shortcodes.choice_top_rated_products 
				} 
			}, 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.orderby_title, 
				descr : 	cmsms_shortcodes.products_field_orderby_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.products_field_orderby_descr_note + ' ' + cmsms_shortcodes.choice_best_selling_products + ' and ' + cmsms_shortcodes.choice_top_rated_products + "</span>", 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsms_shortcodes.choice_date, 
							'name' : 		cmsms_shortcodes.name, 
							'id' : 			cmsms_shortcodes.choice_id 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.order_title, 
				descr : 	cmsms_shortcodes.order_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.products_field_orderby_descr_note + ' ' + cmsms_shortcodes.choice_best_selling_products + ' and ' + cmsms_shortcodes.choice_top_rated_products + "</span>",  
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsms_shortcodes.choice_asc, 
							'DESC' : 	cmsms_shortcodes.choice_desc
				} 
			}, 
			// Products Number
			count : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.products_field_prod_number_title, 
				descr : 	cmsms_shortcodes.products_field_prod_number_descr, 
				def : 		'10', 
				required : 	true, 
				width : 	'number', 
				min : 		'1' 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.columns_count, 
				descr : 	cmsms_shortcodes.products_field_col_count_descr, 
				def : 		'4', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				} 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	};
	
	
	cmsmsShortcodes.cmsms_selected_products = {
		title : 	cmsms_shortcodes.selected_products_title, 
		icon : 		'admin-icon-product', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.orderby_title, 
				descr : 	cmsms_shortcodes.products_field_orderby_descr, 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsms_shortcodes.choice_date, 
							'name' : 		cmsms_shortcodes.name, 
							'id' : 			cmsms_shortcodes.choice_id 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.order_title, 
				descr : 	cmsms_shortcodes.order_descr, 
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsms_shortcodes.choice_asc, 
							'DESC' : 	cmsms_shortcodes.choice_desc
				} 
			}, 
			// IDs
			ids : { 
				type : 		'select_multiple', 
				title : 	cmsms_shortcodes.selected_products_field_ids, 
				descr : 	cmsms_shortcodes.selected_products_field_ids_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.selected_products_field_ids_descr_note + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsms_composer_product_ids() 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.columns_count, 
				descr : 	cmsms_shortcodes.products_field_col_count_descr, 
				def : 		'4', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				} 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	};
}


// CMSMasters Custom Shortcodes PayPal Donations Extension
if (cmsms_composer_paypal_donations() === 'true') {
	cmsmsShortcodes.cmsms_paypal_donations = {
		title : 	cmsms_shortcodes.paypal_donations_title, 
		icon : 		'admin-icon-donate', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Amount
			amount : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.paypal_donations_field_amount_title, 
				descr : 	cmsms_shortcodes.paypal_donations_field_amount_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.paypal_donations_field_amount_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Purpose
			purpose : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.paypal_donations_field_purpose_title, 
				descr : 	cmsms_shortcodes.paypal_donations_field_purpose_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.paypal_donations_field_purpose_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Reference
			reference : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.paypal_donations_field_reference_title, 
				descr : 	cmsms_shortcodes.paypal_donations_field_reference_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.paypal_donations_field_reference_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Title
			button_title : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_label_title, 
				descr : 	cmsms_shortcodes.button_field_label_descr, 
				def : 		cmsms_shortcodes.button, 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Position
			button_text_align : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.button_field_text_align_title, 
				descr : 	cmsms_shortcodes.button_field_text_align_descr, 
				def : 		'center', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsms_shortcodes.choice_left, 
							'center' : 		cmsms_shortcodes.choice_center, 
							'right' : 		cmsms_shortcodes.choice_right, 
				} 
			}, 
			// Button Style
			button_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'' : 									cmsms_shortcodes.choice_default, 
							'cmsms_but_bg_hover' : 					'cmsms_but_bg_hover', 
							'cmsms_but_bg_slide_left' : 			'cmsms_but_bg_slide_left', 
							'cmsms_but_bg_slide_right' : 			'cmsms_but_bg_slide_right', 
							'cmsms_but_bg_slide_top' : 				'cmsms_but_bg_slide_top', 
							'cmsms_but_bg_slide_bottom' : 			'cmsms_but_bg_slide_bottom', 
							'cmsms_but_bg_expand_vert' : 			'cmsms_but_bg_expand_vert', 
							'cmsms_but_bg_expand_hor' : 			'cmsms_but_bg_expand_hor', 
							'cmsms_but_bg_expand_diag' : 			'cmsms_but_bg_expand_diag', 
							'cmsms_but_shadow' : 					'cmsms_but_shadow', 
							'cmsms_but_icon_dark_bg' : 				'cmsms_but_icon_dark_bg', 
							'cmsms_but_icon_light_bg' : 			'cmsms_but_icon_light_bg', 
							'cmsms_but_icon_divider' : 				'cmsms_but_icon_divider', 
							'cmsms_but_icon_inverse' : 				'cmsms_but_icon_inverse', 
							'cmsms_but_icon_slide_left' : 			'cmsms_but_icon_slide_left', 
							'cmsms_but_icon_slide_right' : 			'cmsms_but_icon_slide_right', 
							'cmsms_but_icon_hover_slide_left' : 	'cmsms_but_icon_hover_slide_left', 
							'cmsms_but_icon_hover_slide_right' : 	'cmsms_but_icon_hover_slide_right', 
							'cmsms_but_icon_hover_slide_top' : 		'cmsms_but_icon_hover_slide_top', 
							'cmsms_but_icon_hover_slide_bottom' : 	'cmsms_but_icon_hover_slide_bottom' 
				} 
			}, 
			// Button Google Font
			button_font_family : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_label_google_font_title, 
				descr : 	cmsms_shortcodes.button_field_label_google_font_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_label_google_font_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_fonts() 
			}, 
			// Button Font Size
			button_font_size : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_label_font_size_title, 
				descr : 	cmsms_shortcodes.button_field_label_font_size_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_label_font_size_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Button Line Height
			button_line_height : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_label_line_hight_title, 
				descr : 	cmsms_shortcodes.button_field_label_line_height_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_label_line_height_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Button Font Weight
			button_font_weight : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_label_font_weight_title, 
				descr : 	cmsms_shortcodes.button_field_label_font_weight_descr, 
				def : 		'normal', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_font_weight() 
			}, 
			// Button Font Style
			button_font_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_label_font_style_title, 
				descr : 	cmsms_shortcodes.button_field_label_font_style_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_font_style() 
			}, 
			// Button Left & Right Paddings
			button_padding_hor : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_paddings_title, 
				descr : 	cmsms_shortcodes.button_field_paddings_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_paddings_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Button Border Width
			button_border_width : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_border_width_title, 
				descr : 	cmsms_shortcodes.button_field_border_width_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Button Border Style
			button_border_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_border_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'solid' : 	cmsms_shortcodes.choice_solid, 
							'dotted' : 	cmsms_shortcodes.choice_dotted, 
							'dashed' : 	cmsms_shortcodes.choice_dashed, 
							'double' : 	cmsms_shortcodes.choice_double, 
							'groove' : 	cmsms_shortcodes.choice_groove, 
							'ridge' : 	cmsms_shortcodes.choice_ridge, 
							'inset' : 	cmsms_shortcodes.choice_inset, 
							'outset' : 	cmsms_shortcodes.choice_outset 
				} 
			}, 
			// Button Border Radius
			button_border_radius : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_border_radius_title, 
				descr : 	cmsms_shortcodes.button_field_border_radius_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.border_radius_descr_note_1 + " <br />" + cmsms_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsms_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'', 
				required : 	false 
			}, 
			// Button Background Color
			button_bg_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bg_color_title, 
				descr : 	cmsms_shortcodes.button_field_bg_color_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Text Color
			button_text_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_txt_color_title, 
				descr : 	cmsms_shortcodes.button_field_txt_color_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Border Color
			button_border_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bd_color_title, 
				descr : 	cmsms_shortcodes.button_field_bd_color_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Background Color on Mouseover
			button_bg_color_h : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bg_color_h_title, 
				descr : 	cmsms_shortcodes.button_field_bg_color_h_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Text Color on Mouseover
			button_text_color_h : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_txt_color_h_title, 
				descr : 	cmsms_shortcodes.button_field_txt_color_h_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Border Color on Mouseover
			button_border_color_h : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bd_color_h_title, 
				descr : 	cmsms_shortcodes.button_field_bd_color_h_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Icon
			button_icon : { 
				type : 		'icon', 
				title : 	cmsms_shortcodes.button_field_icon_title, 
				descr : 	cmsms_shortcodes.button_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full', 
				choises : 	cmsms_composer_icons() 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note  + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	};
}


// CMSMasters Custom Multiple Fields Shortcodes
var cmsmsMultipleShortcodes = { 
	// Audio Link
	cmsms_audio : { 
		title : 	cmsms_shortcodes.audio, 
		pair : 		true, 
		content : 	'link', 
		visual : 	'<span class="cmsms_multiple_text">{{ data.link }}</span>', 
		def : 		"", 
		fields : { 
			// Audio Link
			link : { 
				type : 			'upload', 
				title : 		cmsms_shortcodes.audio_link_field_audio_link_title, 
				descr : 		cmsms_shortcodes.audio_link_field_audio_link_descr, 
				def : 			'', 
				required : 		true, 
				width : 		'full', 
				frame : 		'select', 
				library : 		'audio', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			false 
			} 
		} 
	}, 
	
	
	// Client
	cmsms_client : { 
		title : 	cmsms_shortcodes.client_title, 
		pair : 		true, 
		content : 	'name', 
		visual : 	'<span class="cmsms_multiple_text">{{ data.name }}</span>', 
		def : 		"", 
		fields : { 
			// Name
			name : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.name, 
				descr : 	cmsms_shortcodes.client_field_name_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Logo
			logo : { 
				type : 			'upload', 
				title : 		cmsms_shortcodes.client_field_logo_title, 
				descr : 		cmsms_shortcodes.client_field_logo_descr, 
				def : 			'', 
				required : 		true, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			false 
			}, 
			// Link
			link : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.link, 
				descr : 	cmsms_shortcodes.client_field_link_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Counter
	cmsms_counter : { 
		title : 	cmsms_shortcodes.counter_title, 
		pair : 		true, 
		content : 	'title', 
		visual : 	'<span class="cmsms_multiple_text {{ data.icon }}">{{ data.title }} &nbsp; {{ data.value }}</span>', 
		def : 		"", 
		fields : { 
			// Title
			title : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.title, 
				descr : 	'', 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Subtitle
			subtitle : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.counter_subtitle, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Counter Value
			value : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.counter_field_counter_value_title, 
				descr : 	'', 
				def : 		'0', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Counter Value Prefix
			value_prefix : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.counter_field_counter_value_prefix_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'small' 
			}, 
			// Counter Value Suffix
			value_suffix : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.counter_field_counter_value_suffix_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'small' 
			}, 
			// Counter Custom Color
			color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.counter_field_counter_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Icon Type
			icon_type : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.icon_type, 
				descr : 	'', 
				def : 		'icon', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'icon' : 	cmsms_shortcodes.icon, 
							'image' : 	cmsms_shortcodes.image 
				} 
			}, 
			// Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsms_shortcodes.icon, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_icons(), 
				depend : 	'icon_type:icon' 
			}, 
			// Image
			image : { 
				type : 			'upload', 
				title : 		cmsms_shortcodes.image, 
				descr : 		'', 
				def : 			'', 
				required : 		false, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			false, 
				depend : 		'icon_type:image' 
			}, 
			// Icon Color
			icon_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.counter_field_icon_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Icon Background Color
			icon_bg_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.counter_field_icon_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Icon Border Color
			icon_bd_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.counter_field_icon_bd_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Google Map Marker
	cmsms_google_map_marker : { 
		title : 	cmsms_shortcodes.map_marker_title, 
		pair : 		true, 
		content : 	'html', 
		visual : 	'<span class="cmsms_multiple_text"><span class="cmsms_multiple_hide_empty">{{ data.address }}</span><span class="cmsms_multiple_hide_empty">{{ data.latitude }} {{ data.longitude }}</span></span>', 
		def : 		"", 
		fields : { 
			// Address Type
			address_type : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.map_marker_field_address_type_title, 
				descr : 	cmsms_shortcodes.map_marker_field_address_type_descr, 
				def : 		'address', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'address' : 		cmsms_shortcodes.map_markers_field_address_type_choice_address, 
							'coordinates' : 	cmsms_shortcodes.map_markers_field_address_type_choice_coord 
				} 
			}, 
			// Address
			address : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.map_markers_field_address_title, 
				descr : 	cmsms_shortcodes.map_marker_field_address_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				depend : 	'address_type:address' 
			}, 
			// Latitude
			latitude : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.map_markers_field_latitude_title, 
				descr : 	cmsms_shortcodes.map_marker_field_latitude_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.value_number + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'small', 
				depend : 	'address_type:coordinates' 
			}, 
			// Longitude
			longitude : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.map_markers_field_longitude_title, 
				descr : 	cmsms_shortcodes.map_marker_field_longitude_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.value_number + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'small', 
				depend : 	'address_type:coordinates' 
			}, 
			// Popup HTML
			html : { 
				type : 		'textarea', 
				title : 	cmsms_shortcodes.map_marker_field_popup_html_title, 
				descr : 	cmsms_shortcodes.map_marker_field_popup_html_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Popup Visibility
			popup : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.map_marker_field_popup_visibility_title, 
				descr : 	cmsms_shortcodes.map_marker_field_popup_visibility_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_show 
				} 
			} 
		} 
	}, 
	
	
	// Icon List Item
	cmsms_icon_list_item : { 
		title : 	cmsms_shortcodes.icon_list_item_title, 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<span class="cmsms_multiple_text {{ data.icon }}">{{ data.title }}</span>', 
		def : 		"", 
		fields : { 
			// Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsms_shortcodes.icon, 
				descr : 	cmsms_shortcodes.icon_list_item_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_icons() 
			}, 
			// Image
			image : { 
				type : 			'upload', 
				title : 		cmsms_shortcodes.image, 
				descr : 		cmsms_shortcodes.icon_list_item_field_image_descr, 
				def : 			'', 
				required : 		false, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			false 
			}, 
			// Title
			title : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.title, 
				descr : 	cmsms_shortcodes.icon_list_item_field_title_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsms_shortcodes.content, 
				descr : 	cmsms_shortcodes.icon_list_item_field_content_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.icon_list_item_field_content_descr_note + "</span>", 
				def : 		"<p>" + cmsms_shortcodes.def_text + "</p>", 
				required : 	false, 
				width : 	'full' 
			}, 
			// Color
			color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.icon_list_item_field_item_color_title, 
				descr : 	cmsms_shortcodes.icon_list_item_field_color_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.icon_list_item_field_content_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Pricing Table Offer
	cmsms_pricing_table_item : { 
		title : 	cmsms_shortcodes.pricing_offer_title, 
		pair : 		true, 
		content : 	'title', 
		visual : 	'<span class="cmsms_multiple_text">{{ data.title }} &nbsp; {{ data.currency }}{{ data.price }}<sup class="cmsms_multiple_hide_empty">{{ data.coins }}</sup></span>', 
		def : 		"", 
		fields : { 
			// Title
			title : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.title, 
				descr : 	cmsms_shortcodes.pricing_offer_field_title_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Price
			price : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.pricing_offer_field_price_title, 
				descr : 	cmsms_shortcodes.pricing_offer_field_price_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'small' 
			}, 
			// Coins
			coins : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.pricing_offer_field_coins_title, 
				descr : 	cmsms_shortcodes.pricing_offer_field_coins_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'small' 
			}, 
			// Currency
			currency : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.pricing_offer_field_currency_title, 
				descr : 	cmsms_shortcodes.pricing_offer_field_currency_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'small' 
			}, 
			// Period
			period : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.pricing_offer_field_period_title, 
				descr : 	cmsms_shortcodes.pricing_offer_field_period_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'small' 
			}, 
			// Features
			features : { 
				type : 		'link', 
				title : 	cmsms_shortcodes.pricing_offer_field_features_title, 
				descr : 	cmsms_shortcodes.pricing_offer_field_features_descr, 
				def : 		"", 
				required : 	false, 
				width : 	'full' 
			}, 
			// Best Offer
			best : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.pricing_offer_field_best_offer_title, 
				descr : 	cmsms_shortcodes.pricing_offer_field_best_offer_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsms_shortcodes.choice_enable
				} 
			}, 
			// Best offer Color
			best_bg_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.pricing_offer_field_best_offer_bg_title, 
				descr : 	cmsms_shortcodes.pricing_offer_field_best_offer_bg_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'best:true' 
			}, 
			// Best offer Text Color
			best_text_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.pricing_offer_field_best_offer_txt_title, 
				descr : 	cmsms_shortcodes.pricing_offer_field_best_offer_txt_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'best:true' 
			}, 
			// Button Show
			button_show : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.button_field_show_title, 
				descr : 	cmsms_shortcodes.button_field_show_descr, 
				def : 		'false', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'true' : 	cmsms_shortcodes.choice_show 
				} 
			}, 
			// Button Title
			button_title : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_label_title, 
				descr : 	cmsms_shortcodes.button_field_label_descr, 
				def : 		cmsms_shortcodes.button, 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Link
			button_link : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_link_title, 
				descr : 	cmsms_shortcodes.button_field_link_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Target
			button_target : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.button_field_target_title, 
				descr : 	cmsms_shortcodes.button_field_target_descr, 
				def : 		'self', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'self' : 	cmsms_shortcodes.link_target_choice_self, 
							'blank' : 	cmsms_shortcodes.link_target_choice_blank 
				}, 
				depend : 	'button_show:true' 
			}, 
			// Button Style
			button_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'' : 									cmsms_shortcodes.choice_default, 
							'cmsms_but_bg_hover' : 					'cmsms_but_bg_hover', 
							'cmsms_but_bg_slide_left' : 			'cmsms_but_bg_slide_left', 
							'cmsms_but_bg_slide_right' : 			'cmsms_but_bg_slide_right', 
							'cmsms_but_bg_slide_top' : 				'cmsms_but_bg_slide_top', 
							'cmsms_but_bg_slide_bottom' : 			'cmsms_but_bg_slide_bottom', 
							'cmsms_but_bg_expand_vert' : 			'cmsms_but_bg_expand_vert', 
							'cmsms_but_bg_expand_hor' : 			'cmsms_but_bg_expand_hor', 
							'cmsms_but_bg_expand_diag' : 			'cmsms_but_bg_expand_diag', 
							'cmsms_but_shadow' : 					'cmsms_but_shadow', 
							'cmsms_but_icon_dark_bg' : 				'cmsms_but_icon_dark_bg', 
							'cmsms_but_icon_light_bg' : 			'cmsms_but_icon_light_bg', 
							'cmsms_but_icon_divider' : 				'cmsms_but_icon_divider', 
							'cmsms_but_icon_inverse' : 				'cmsms_but_icon_inverse', 
							'cmsms_but_icon_slide_left' : 			'cmsms_but_icon_slide_left', 
							'cmsms_but_icon_slide_right' : 			'cmsms_but_icon_slide_right', 
							'cmsms_but_icon_hover_slide_left' : 	'cmsms_but_icon_hover_slide_left', 
							'cmsms_but_icon_hover_slide_right' : 	'cmsms_but_icon_hover_slide_right', 
							'cmsms_but_icon_hover_slide_top' : 		'cmsms_but_icon_hover_slide_top', 
							'cmsms_but_icon_hover_slide_bottom' : 	'cmsms_but_icon_hover_slide_bottom' 
				}, 
				depend : 	'button_show:true' 
			}, 
			// Button Google Font
			button_font_family : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_label_google_font_title, 
				descr : 	cmsms_shortcodes.button_field_label_google_font_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_label_google_font_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_fonts(), 
				depend : 	'button_show:true' 
			}, 
			// Button Font Size
			button_font_size : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_label_font_size_title, 
				descr : 	cmsms_shortcodes.button_field_label_font_size_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_label_font_size_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'button_show:true' 
			}, 
			// Button Line Height
			button_line_height : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_label_line_hight_title, 
				descr : 	cmsms_shortcodes.button_field_label_line_height_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_label_line_height_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'button_show:true' 
			}, 
			// Button Font Weight
			button_font_weight : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_label_font_weight_title, 
				descr : 	cmsms_shortcodes.button_field_label_font_weight_descr, 
				def : 		'normal', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_font_weight(), 
				depend : 	'button_show:true' 
			}, 
			// Button Font Style
			button_font_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_label_font_style_title, 
				descr : 	cmsms_shortcodes.button_field_label_font_style_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsms_composer_font_style(), 
				depend : 	'button_show:true' 
			}, 
			// Button Left & Right Paddings
			button_padding_hor : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_paddings_title, 
				descr : 	cmsms_shortcodes.button_field_paddings_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.button_field_paddings_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Width
			button_border_width : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_border_width_title, 
				descr : 	cmsms_shortcodes.button_field_border_width_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Style
			button_border_style : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.button_field_border_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'solid' : 	cmsms_shortcodes.choice_solid, 
							'dotted' : 	cmsms_shortcodes.choice_dotted, 
							'dashed' : 	cmsms_shortcodes.choice_dashed, 
							'double' : 	cmsms_shortcodes.choice_double, 
							'groove' : 	cmsms_shortcodes.choice_groove, 
							'ridge' : 	cmsms_shortcodes.choice_ridge, 
							'inset' : 	cmsms_shortcodes.choice_inset, 
							'outset' : 	cmsms_shortcodes.choice_outset 
				}, 
				depend : 	'button_show:true' 
			}, 
			// Button Border Radius
			button_border_radius : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.button_field_border_radius_title, 
				descr : 	cmsms_shortcodes.button_field_border_radius_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.border_radius_descr_note_1 + " <br />" + cmsms_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsms_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsms_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'', 
				required : 	false, 
				depend : 	'button_show:true' 
			}, 
			// Button Background Color
			button_bg_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bg_color_title, 
				descr : 	cmsms_shortcodes.button_field_bg_color_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Text Color
			button_text_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_txt_color_title, 
				descr : 	cmsms_shortcodes.button_field_txt_color_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Color
			button_border_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bd_color_title, 
				descr : 	cmsms_shortcodes.button_field_bd_color_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Background Color on Mouseover
			button_bg_color_h : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bg_color_h_title, 
				descr : 	cmsms_shortcodes.button_field_bg_color_h_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Text Color on Mouseover
			button_text_color_h : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_txt_color_h_title, 
				descr : 	cmsms_shortcodes.button_field_txt_color_h_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Color on Mouseover
			button_border_color_h : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.button_field_bd_color_h_title, 
				descr : 	cmsms_shortcodes.button_field_bd_color_h_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Icon
			button_icon : { 
				type : 		'icon', 
				title : 	cmsms_shortcodes.button_field_icon_title, 
				descr : 	cmsms_shortcodes.button_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full', 
				choises : 	cmsms_composer_icons(), 
				depend : 	'button_show:true' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsms_shortcodes.animation_title, 
				descr : 	cmsms_shortcodes.animation_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.animation_delay_title, 
				descr : 	cmsms_shortcodes.animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Progress Bar
	cmsms_stat : { 
		title : 	cmsms_shortcodes.prog_bar_title, 
		pair : 		true, 
		content : 	'title', 
		visual : 	'<span class="cmsms_multiple_text {{ data.icon }}">{{ data.title }}</span>', 
		def : 		"", 
		fields : { 
			// Title
			title : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.title, 
				descr : 	cmsms_shortcodes.prog_bar_field_title_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Subtitle
			subtitle : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.prog_bar_subtitle, 
				descr : 	cmsms_shortcodes.prog_bar_field_subtitle_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Progress
			progress : { 
				type : 		'range', 
				title : 	cmsms_shortcodes.prog_bar_field_progress_title, 
				descr : 	cmsms_shortcodes.prog_bar_field_progress_descr, 
				def : 		'0', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'100' 
			}, 
			// Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsms_shortcodes.icon, 
				descr : 	cmsms_shortcodes.prog_bar_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full', 
				choises : 	cmsms_composer_icons() 
			}, 
			// Bar Color
			color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.prog_bar_field_bar_color_title, 
				descr : 	cmsms_shortcodes.prog_bar_field_bar_color_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Quote
	cmsms_quote : { 
		title : 	cmsms_shortcodes.quote_title, 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<span class="cmsms_multiple_text">Quote by: {{ data.name }}</span>', 
		def : 		"", 
		fields : { 
			// Image
			image : { 
				type : 			'upload', 
				title : 		cmsms_shortcodes.quote_field_image_title, 
				descr : 		cmsms_shortcodes.quote_field_image_descr, 
				def : 			'', 
				required : 		false, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	true, 
				caption : 		true, 
				align : 		false, 
				link : 			false, 
				size : 			true 
			}, 
			// Name
			name : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.name, 
				descr : 	cmsms_shortcodes.quote_field_name_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Subtitle
			subtitle : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.quote_field_subtitle_title, 
				descr : 	cmsms_shortcodes.quote_field_subtitle_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Quote
			content : { 
				type : 		'editor', 
				title : 	cmsms_shortcodes.quote_field_quote_title, 
				descr : 	cmsms_shortcodes.quote_field_quote_descr, 
				def : 		"<p>" + cmsms_shortcodes.def_text + "</p>", 
				required : 	true, 
				width : 	'full' 
			},
			// Website Link
			link : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.quote_field_link_title, 
				descr : 	cmsms_shortcodes.quote_field_link_descr, 
				def : 		"", 
				required : 	false, 
				width : 	'full' 
			}, 
			// Website Name
			website : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.quote_field_website_name_title, 
				descr : 	cmsms_shortcodes.quote_field_website_name_descr, 
				def : 		"", 
				required : 	false, 
				width : 	'half' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Tab
	cmsms_tab : { 
		title : 	cmsms_shortcodes.tab_title, 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<span class="cmsms_multiple_text {{ data.icon }}">{{ data.title }}</span>', 
		def : 		"", 
		fields : { 
			// Title
			title : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.title, 
				descr : 	cmsms_shortcodes.tab_field_title_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsms_shortcodes.content, 
				descr : 	cmsms_shortcodes.tab_field_content_descr, 
				def : 		"<p>" + cmsms_shortcodes.def_text + "</p>", 
				required : 	true, 
				width : 	'full' 
			}, 
			// Custom Tab Selector Color
			custom_colors : { 
				type : 		'checkbox', 
				title : 	cmsms_shortcodes.tab_field_tab_selector_color_title, 
				descr : 	cmsms_shortcodes.tab_field_tab_selector_color_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'true' : cmsms_shortcodes.choice_enable 
				} 
			}, 
			// Tab Color
			bg_color : { 
				type : 		'rgba', 
				title : 	cmsms_shortcodes.tab_field_tab_color_title, 
				descr : 	cmsms_shortcodes.tab_field_tab_color_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'custom_colors:true' 
			}, 
			// Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsms_shortcodes.icon, 
				descr : 	cmsms_shortcodes.tab_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full', 
				choises : 	cmsms_composer_icons() 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Toggle
	cmsms_toggle : { 
		title : 	cmsms_shortcodes.toggle_title, 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<span class="cmsms_multiple_text">{{ data.title }}</span>', 
		def : 		"", 
		fields : { 
			// Title
			title : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.title, 
				descr : 	cmsms_shortcodes.toggle_field_title_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsms_shortcodes.content, 
				descr : 	cmsms_shortcodes.toggle_field_title_descr, 
				def : 		"<p>" + cmsms_shortcodes.def_text + "</p>", 
				required : 	true, 
				width : 	'full' 
			}, 
			// Toggle Tags
			tags : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.toggle_field_toggle_tags_title, 
				descr : 	cmsms_shortcodes.toggle_field_toggle_tags_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' +  cmsms_shortcodes.toggle_field_toggle_tags_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Video Link
	cmsms_video : { 
		title : 	cmsms_shortcodes.video_link_title, 
		pair : 		true, 
		content : 	'link', 
		visual : 	'<span class="cmsms_multiple_text">{{ data.link }}</span>', 
		def : 		"", 
		fields : { 
			// Video Link
			link : { 
				type : 			'upload', 
				title : 		cmsms_shortcodes.video_link_field_video_link_title, 
				descr : 		cmsms_shortcodes.video_link_field_video_link_descr, 
				def : 			'', 
				required : 		true, 
				width : 		'full', 
				frame : 		'select', 
				library : 		'video', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			false 
			} 
		} 
	} 
};


// CMSMasters Editor Shortcodes
cmsmsEditorShortcodes = { 
	// Dropcap
	cmsms_dropcap : { 
		title : 	cmsms_shortcodes.dropcap_title, 
		icon : 		'admin-icon-dropcap', 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<div>{{ data.content }}</div>', 
		multiple : 	false, 
		def : 		"A", 
		fields : { 
			// Content
			content : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.content, 
				descr : 	cmsms_shortcodes.dropcap_field_content_descr, 
				def : 		'A', 
				required : 	true, 
				width : 	'small' 
			}, 
			// Type
			type : { 
				type : 		'radio', 
				title : 	cmsms_shortcodes.dropcap_field_type_title, 
				descr : 	cmsms_shortcodes.dropcap_field_type_descr, 
				def : 		'type1', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'type1' : 	cmsms_shortcodes.dropcap_field_type_choice_one, 
							'type2' : 	cmsms_shortcodes.dropcap_field_type_choice_two 
				} 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsms_shortcodes.classes_title, 
				descr : 	cmsms_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	} 
};


// CMSMasters Item Shortcode
cmsmsLinkShortcode = { 
	title : 	cmsms_shortcodes.item_title, 
	content : 	false, 
	fields : { 
		// Title
		title : { 
			type : 		'input', 
			title : 	cmsms_shortcodes.title, 
			descr : 	cmsms_shortcodes.item_field_title_descr, 
			def : 		'', 
			required : 	true, 
			width : 	'half' 
		}, 
		// Link
		link : { 
			type : 		'input', 
			title : 	cmsms_shortcodes.link, 
			descr : 	cmsms_shortcodes.item_field_link_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'full' 
		}, 
		// Icon
		icon : { 
			type : 		'icon', 
			title : 	cmsms_shortcodes.icon, 
			descr : 	cmsms_shortcodes.item_field_icon_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'full', 
			choises : 	cmsms_composer_icons() 
		} 
	} 
};


// CMSMasters Column Shortcode
cmsmsColumn = { 
	title : 	cmsms_shortcodes.column_title, 
	content : 	false, 
	fields : { 
		// CSS3 Animation
		animation : { 
			type : 		'select', 
			title : 	cmsms_shortcodes.animation_title, 
			descr : 	cmsms_shortcodes.column_field_animation_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_descr_note + "</span>", 
			def : 		'', 
			required : 	false, 
			width : 	'half', 
			choises : 	get_animations() 
		}, 
		// Animation Delay
		animation_delay : { 
			type : 		'input', 
			title : 	cmsms_shortcodes.animation_delay_title, 
			descr : 	cmsms_shortcodes.column_field_animation_delay_descr + " <br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.animation_delay_descr_note + "</span>", 
			def : 		'0', 
			required : 	false, 
			width : 	'number', 
			min : 		'0', 
			step : 		'50' 
		}, 
		// Additional Classes
		classes : { 
			type : 		'input', 
			title : 	cmsms_shortcodes.classes_title, 
			descr : 	cmsms_shortcodes.column_field_classes_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half' 
		} 
	} 
};


// CMSMasters Row Shortcode
cmsmsRow = { 
	button :	cmsms_shortcodes.row_button, 
	title :		cmsms_shortcodes.row_title, 
	icon : 		'admin-icon-row', 
	content : 	false, 
	fields : { 
		// Content Width
		width : { 
			type : 		'radio', 
			title : 	cmsms_shortcodes.row_field_content_width_title, 
			descr : 	cmsms_shortcodes.row_field_content_width_descr, 
			def : 		'boxed', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'boxed' : 		cmsms_shortcodes.row_field_content_width_choice_boxed, 
						'fullwidth' : 	cmsms_shortcodes.row_field_content_width_choice_custom 
			} 
		}, 
		// Left Custom Padding
		padding_left : { 
			type : 		'input', 
			title : 	cmsms_shortcodes.row_field_left_custom_padding_title, 
			descr : 	cmsms_shortcodes.row_field_left_custom_padding_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_percentage + "</span>", 
			def : 		'3', 
			required : 	false, 
			width : 	'number', 
			min : 		'0', 
			max : 		'100', 
			depend : 	'width:fullwidth' 
		}, 
		// Right Custom Padding
		padding_right : { 
			type : 		'input', 
			title : 	cmsms_shortcodes.row_field_right_custom_padding_title, 
			descr : 	cmsms_shortcodes.row_field_right_custom_padding_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_percentage + "</span>", 
			def : 		'3', 
			required : 	false, 
			width : 	'number', 
			min : 		'0', 
			max : 		'100', 
			depend : 	'width:fullwidth' 
		}, 
		// Merge with the Next Section
		merge : { 
			type : 		'checkbox', 
			title : 	cmsms_shortcodes.row_field_merge_title, 
			descr : 	cmsms_shortcodes.row_field_merge_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.row_field_merge_descr_note + "</span>", 
			def : 		'', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'true' : 	cmsms_shortcodes.choice_enable 
			} 
		}, 
		// Color Scheme
		color : { 
			type : 		'select', 
			title : 	cmsms_shortcodes.row_field_color_scheme_title, 
			descr : 	cmsms_shortcodes.row_field_color_scheme_descr, 
			def : 		'default', 
			required : 	false, 
			width : 	'half', 
			choises : 	cmsms_composer_colors() 
		}, 
		// Background Color
		bg_color : { 
			type : 		'rgba', 
			title : 	cmsms_shortcodes.background_color, 
			descr : 	cmsms_shortcodes.row_field_bg_color_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half' 
		}, 
		// Background Image
		bg_img : { 
			type : 			'upload', 
			title : 		cmsms_shortcodes.row_field_bg_image_title, 
			descr : 		cmsms_shortcodes.row_field_bg_image_descr, 
			def : 			'', 
			required : 		false, 
			width : 		'half', 
			frame : 		'post', 
			library : 		'image', 
			multiple : 		false, 
			description : 	false, 
			caption : 		false, 
			align : 		false, 
			link : 			false, 
			size : 			true 
		}, 
		// Background Position
		bg_position : { 
			type : 		'select', 
			title : 	cmsms_shortcodes.row_field_bg_position_title, 
			descr : 	cmsms_shortcodes.row_field_bg_position_descr, 
			def : 		'top center', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'top left' : 		cmsms_shortcodes.row_field_bg_position_choice_vert_top + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_left, 
						'top center' : 		cmsms_shortcodes.row_field_bg_position_choice_vert_top + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_center, 
						'top right' : 		cmsms_shortcodes.row_field_bg_position_choice_vert_top + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_right, 
						'center left' : 	cmsms_shortcodes.row_field_bg_position_choice_vert_center + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_left, 
						'center center' : 	cmsms_shortcodes.row_field_bg_position_choice_vert_center + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_center, 
						'center right' : 	cmsms_shortcodes.row_field_bg_position_choice_vert_center + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_right, 
						'bottom left' : 	cmsms_shortcodes.row_field_bg_position_choice_vert_bottom + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_left, 
						'bottom center' : 	cmsms_shortcodes.row_field_bg_position_choice_vert_bottom + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_center, 
						'bottom right' : 	cmsms_shortcodes.row_field_bg_position_choice_vert_bottom + ' - ' + cmsms_shortcodes.row_field_bg_position_choice_horiz_right 
			}, 
			depend : 	'bg_img:!' 
		}, 
		// Background Repeat
		bg_repeat : { 
			type : 		'radio', 
			title : 	cmsms_shortcodes.row_field_bg_repeat_title, 
			descr : 	cmsms_shortcodes.row_field_bg_repeat_descr, 
			def : 		'no-repeat', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'no-repeat' : 	cmsms_shortcodes.row_field_bg_repeat_choice_none, 
						'repeat-x' : 	cmsms_shortcodes.row_field_bg_repeat_choice_horiz, 
						'repeat-y' : 	cmsms_shortcodes.row_field_bg_repeat_choice_vert, 
						'repeat' : 		cmsms_shortcodes.row_field_bg_repeat_choice_repeat 
			}, 
			depend : 	'bg_img:!' 
		}, 
		// Background Attachment
		bg_attachment : { 
			type : 		'radio', 
			title : 	cmsms_shortcodes.row_field_bg_attachement_title, 
			descr : 	cmsms_shortcodes.row_field_bg_attachement_descr, 
			def : 		'scroll', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'scroll' : 	cmsms_shortcodes.row_field_bg_attachement_choice_scroll, 
						'fixed' : 	cmsms_shortcodes.row_field_bg_attachement_choice_fixed 
			}, 
			depend : 	'bg_img:!' 
		}, 
		// Background Size
		bg_size : { 
			type : 		'radio', 
			title : 	cmsms_shortcodes.row_field_bg_size_title, 
			descr : 	cmsms_shortcodes.row_field_bg_size_descr + "<br /><span>" + cmsms_shortcodes.row_field_bg_size_choice_auto + ': ' + cmsms_shortcodes.row_field_bg_size_descr_auto + "<br />" + cmsms_shortcodes.row_field_bg_size_choice_cover + ': ' + cmsms_shortcodes.row_field_bg_size_descr_cover + "<br />" + cmsms_shortcodes.row_field_bg_size_choice_contain + ': ' + cmsms_shortcodes.row_field_bg_size_descr_contain + "</span>", 
			def : 		'cover', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'auto' : 		cmsms_shortcodes.row_field_bg_size_choice_auto, 
						'cover' : 		cmsms_shortcodes.row_field_bg_size_choice_cover, 
						'contain' : 	cmsms_shortcodes.row_field_bg_size_choice_contain 
			}, 
			depend : 	'bg_img:!' 
		}, 
		// Background Parallax
		bg_parallax : { 
			type : 		'checkbox', 
			title : 	cmsms_shortcodes.row_field_bg_parallax_title, 
			descr : 	cmsms_shortcodes.row_field_bg_parallax_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'true' : 	cmsms_shortcodes.choice_enable 
			}, 
			depend : 	'bg_img:!' 
		}, 
		// Background Parallax Ratio
		bg_parallax_ratio : { 
			type : 		'input', 
			title : 	cmsms_shortcodes.row_field_bg_parallax_ratio_title, 
			descr : 	cmsms_shortcodes.row_field_bg_parallax_ratio_descr, 
			def : 		'0.5', 
			required : 	false, 
			width : 	'number', 
			min : 		'0.05', 
			max : 		'1', 
			step : 		'0.05', 
			depend : 	'bg_img:!' 
		}, 
		// Color Overlay
		color_overlay : { 
			type : 		'rgba', 
			title : 	cmsms_shortcodes.row_field_color_overlay_title, 
			descr : 	cmsms_shortcodes.row_field_color_overlay_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half' 
		}, 
		// Top Padding
		padding_top : { 
			type : 		'input', 
			title : 	cmsms_shortcodes.row_field_top_padding_title, 
			descr : 	cmsms_shortcodes.row_field_top_padding_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.value_zero + "</span>", 
			def : 		'0', 
			required : 	false, 
			width : 	'number', 
			min : 		'0' 
		}, 
		// Bottom Padding
		padding_bottom : { 
			type : 		'input', 
			title : 	cmsms_shortcodes.row_field_bottom_padding_title, 
			descr : 	cmsms_shortcodes.row_field_bottom_padding_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.size_note_short + ' ' + cmsms_shortcodes.value_zero + "</span>", 
			def : 		'50', 
			required : 	false, 
			width : 	'number', 
			min : 		'0' 
		}, 
		// Section ID
		id : { 
			type : 		'input', 
			title : 	cmsms_shortcodes.row_field_section_id_title, 
			descr : 	cmsms_shortcodes.row_field_section_id_descr + "<br /><span>" + cmsms_shortcodes.note + ' ' + cmsms_shortcodes.row_field_section_id_descr_note + "<span>", 
			def : 		'', 
			required : 	false, 
			width : 	'small' 
		}, 
		// Additional Classes
		classes : { 
			type : 		'input', 
			title : 	cmsms_shortcodes.classes_title, 
			descr : 	cmsms_shortcodes.row_field_classes_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half' 
		} 
	} 
};


// CSS3 Animations List
function get_animations() { 
	return { 
		'' : 					'None', 
		'bounceIn' : 			'Bounce In', 
		'bounceInUp' : 			'Bounce In Up', 
		'bounceInDown' : 		'Bounce In Down', 
		'bounceInLeft' : 		'Bounce In Left', 
		'bounceInRight' : 		'Bounce In Right', 
		'fadeIn' : 				'Fade In', 
		'fadeInUp' : 			'Fade In Up', 
		'fadeInUpBig' : 		'Fade In Up Big', 
		'fadeInDown' : 			'Fade In Down', 
		'fadeInDownBig' : 		'Fade In Down Big', 
		'fadeInLeft' : 			'Fade In Left', 
		'fadeInLeftBig' : 		'Fade In Left Big', 
		'fadeInRight' : 		'Fade In Right', 
		'fadeInRightBig' : 		'Fade In Right Big', 
		'flipInX' : 			'Flip In X', 
		'flipInY' : 			'Flip In Y', 
		'rotateIn' : 			'Rotate In', 
		'rotateInUpLeft' : 		'Rotate In Up Left', 
		'rotateInUpRight' : 	'Rotate In Up Right', 
		'rotateInDownLeft' : 	'Rotate In Down Left', 
		'rotateInDownRight' : 	'Rotate In Down Right', 
		'slideInDown' : 		'Slide In Down', 
		'slideInLeft' : 		'Slide In Left', 
		'slideInRight' : 		'Slide In Right', 
		'rollIn' : 				'Roll In', 
		'bounce' : 				'Bounce', 
		'flash' : 				'Flash', 
		'pulse' : 				'Pulse', 
		'shake' : 				'Shake', 
		'swing' : 				'Swing', 
		'tada' : 				'Tada', 
		'wobble' : 				'Wobble', 
		'flip' : 				'Flip', 
		'lightSpeedIn' : 		'Light Speed In' 
	};
}


// Sidebar Layouts List
function get_layouts() { 
	return { 
		'' : 			'1/1', 
		'1212' : 		'1/2 + 1/2', 
		'1323' : 		'1/3 + 2/3', 
		'2313' : 		'2/3 + 1/3', 
		'1434' : 		'1/4 + 3/4', 
		'3414' : 		'3/4 + 1/4', 
		'131313' : 		'1/3 + 1/3 + 1/3', 
		'121414' : 		'1/2 + 1/4 + 1/4', 
		'141214' : 		'1/4 + 1/2 + 1/4', 
		'141412' : 		'1/4 + 1/4 + 1/2', 
		'14141414' : 	'1/4 + 1/4 + 1/4 + 1/4' 
	};
}

