<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.1.0
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


function cmsms_theme_fonts() {
	$cmsms_option = cmsms_get_global_options();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.1.0
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


/***************** Start Theme Font Styles ******************/

	/* Start Content Font */
	body, 
	.cmsms_breadcrumbs .cmsms_breadcrumbs_inner, 
	.post.cmsms_masonry_type .cmsms_post_cont .cmsms_post_cont_inner .cmsms_post_read_more, 
	.post.cmsms_timeline_type .cmsms_post_cont .cmsms_post_footer .cmsms_post_read_more, 
	.cmsms_breadcrumbs .cmsms_breadcrumbs_inner a {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_content_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_content_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_content_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_content_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_content_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_content_font_font_style'] . ";
	}
	/* Finish Content Font */


	/* Start Link Font */
	a,
	#cancel-comment-reply-link {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_link_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_link_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_link_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_link_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_link_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_link_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_link_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_link_font_text_decoration'] . ";
	}

	a:hover {
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_link_hover_decoration'] . ";
	}
	/* Finish Link Font */


	/* Start Navigation Title Font */
	#navigation > li > a {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_nav_title_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_nav_title_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_nav_title_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_nav_title_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_nav_title_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_nav_title_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_nav_title_font_text_transform'] . ";
	}

	#navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li > a,
	#navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li:hover > a {
		font-weight:700; /* static */
	}
	
	@media only screen and (max-width: 1024px) {
		html #page #header nav #navigation li a {
			font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_nav_title_font_font_size'] - 1) . "px;
			font-weight:400; /* static */
		}
		
		html #page #header nav #navigation > li > a {
			font-weight:500; /* static */
		}
		
		html #page #header nav #navigation li li li a {
			font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_nav_title_font_font_size'] - 3) . "px;
		}
	}
	/* Finish Navigation Title Font */


	/* Start Navigation Dropdown Font */
	#navigation ul li a {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_nav_dropdown_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_nav_dropdown_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_nav_dropdown_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_nav_dropdown_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_nav_dropdown_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_nav_dropdown_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_nav_dropdown_font_text_transform'] . ";
	}
	/* Finish Navigation Dropdown Font */


	/* Start H1 Font */
	h1,
	h1 a,
	.widget_custom_colored_blocks_entries .widgettitle,
	.cmsms_pricing_table .cmsms_pricing_item .cmsms_price_wrap .cmsms_coins,
	.cmsms_pricing_table .cmsms_pricing_item .cmsms_price_wrap .cmsms_currency,
	.cmsms_pricing_table .cmsms_pricing_item .cmsms_price_wrap .cmsms_price,
	#header .logo .title {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h1_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_text_decoration'] . ";
	}
	
	.cmsms_dropcap {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h1_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_system_font'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_text_decoration'] . ";
	}
	
	.widget_custom_colored_blocks_entries .widgettitle {
		font-size:36px;
		line-height:42px;
	}
	
	.cmsms_dropcap {
		font-size:40px; /* static */
		font-weight:normal;
	}
	
	.cmsms_dropcap.type2 {
		font-size:30px; /* static */
	}
	
	.cmsms_pricing_table .cmsms_pricing_item .cmsms_price_wrap .cmsms_price {
		font-size:70px;
		line-height:70px;
	}
	
	.cmsms_pricing_table .cmsms_pricing_item .cmsms_price_wrap .cmsms_coins,
	.cmsms_pricing_table .cmsms_pricing_item .cmsms_price_wrap .cmsms_currency {
		line-height:44px;
		font-size:30px;
	} 
	/* Finish H1 Font */


	/* Start H2 Font */
	h2,
	h2 a,
	.cmsms_stats.stats_mode_bars.stats_type_vertical .cmsms_stat_wrap .cmsms_stat .cmsms_stat_inner .cmsms_stat_counter_wrap,
	.cmsms_stats.stats_mode_circles .cmsms_stat_wrap .cmsms_stat .cmsms_stat_inner .cmsms_stat_counter_wrap,
	.post.cmsms_default_type.format-aside .entry-title,
	.post.cmsms_default_type.format-status .entry-title,
	.post.format-aside .cmsms_post_content .entry-content,
	.post.format-status .cmsms_post_content .entry-content {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h2_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_text_decoration'] . ";
	}
	
	.cmsms_counters .cmsms_counter_wrap .cmsms_counter .cmsms_counter_inner .cmsms_counter_counter_wrap,
	.cmsms_stats.stats_mode_counters.stats_type_numbers .cmsms_stat_wrap .cmsms_stat .cmsms_stat_inner .cmsms_stat_counter_wrap,
	.post.cmsms_default_type .cmsms_post_date .cmsms_day_mon {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h2_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_system_font'] . ";
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_text_decoration'] . ";
	}
	
	.cmsms_counters .cmsms_counter_wrap .cmsms_counter .cmsms_counter_inner .cmsms_counter_counter_wrap,
	.cmsms_stats.stats_mode_counters.stats_type_numbers .cmsms_stat_wrap .cmsms_stat .cmsms_stat_inner .cmsms_stat_counter_wrap {
		font-size:35px;
		line-height:40px;
	}
	
	.post.cmsms_default_type .cmsms_post_date .cmsms_day_mon {
		font-size:19px; /* static */
		line-height:20px; /* static */
	}
	/* Finish H2 Font */


	/* Start H3 Font */
	h3,
	h3 a,
	.cmsms_sitemap_wrap .cmsms_sitemap > li > a,
	.cmsms_search .cmsms_search_post .cmsms_search_post_number,
	.cmsms_pricing_table .cmsms_pricing_item .pricing_title {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h3_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_text_decoration'] . ";
	}
	
	.cmsms_posts_slider .post .cmsms_slider_post_cont .cmsms_post_format_img .cmsms_slider_post_date .cmsms_mon,
	.cmsms_posts_slider .post .cmsms_slider_post_cont .cmsms_post_format_img .cmsms_slider_post_date .cmsms_day,
	.cmsms_profile .entry-title,
	.cmsms_profile .entry-title a,
	.post.cmsms_timeline_type .cmsms_post_date .cmsms_year,
	.post.cmsms_default_type.format-quote .cmsms_post_cont .cmsms_quote_author {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h3_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_system_font'] . ";
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_font_style'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_text_decoration'] . ";
	}
	
	.cmsms_posts_slider .post .cmsms_slider_post_cont .cmsms_post_format_img .cmsms_slider_post_date .cmsms_mon {
		font-size:16px;
		line-height:20px;
	}
	.cmsms_posts_slider .post .cmsms_slider_post_cont .cmsms_post_format_img .cmsms_slider_post_date .cmsms_day {
		font-size:28px;
		line-height:20px;
	}
	
	.post.cmsms_timeline_type .cmsms_post_date .cmsms_year {
		font-size:18px;
		line-height:20px;
		text-transform:none;
	}
	
	.cmsms_search .cmsms_search_post .cmsms_search_post_number {
		line-height:52px;
	}
	
	.cmsms_profile .entry-title,
	.cmsms_profile .entry-title a {
		font-size:20px;
		line-height:26px;
	}
	
	.post.cmsms_default_type.format-quote .cmsms_post_cont .cmsms_quote_author {
		font-size:12px;
		line-height:20px;
		text-transform:uppercase;
	}
	/* Finish H3 Font */


	/* Start H4 Font */
	h4, 
	h4 a,
	.cmsms_posts_slider .format-aside .cmsms_slider_post_cont .cmsms_slider_post_content .entry-title,
	.cmsms_posts_slider .format-status .cmsms_slider_post_cont .cmsms_slider_post_content .entry-title,
	.cmsms_sitemap_wrap .cmsms_sitemap > li > ul > li > a,
	.quote_grid .quote_title,
	.post.cmsms_masonry_type.format-aside .cmsms_post_cont .cmsms_post_content .entry-title, 
	.post.cmsms_timeline_type.format-aside .cmsms_post_cont .cmsms_post_content .entry-title, 
	.post.cmsms_masonry_type.format-status .cmsms_post_cont .cmsms_post_content .entry-title, 
	.post.cmsms_timeline_type.format-status .cmsms_post_cont .cmsms_post_content .entry-title {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h4_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_text_decoration'] . ";
	}
	
	.post.cmsms_timeline_type .cmsms_post_date .cmsms_day_mon {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h4_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_system_font'] . ";
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_font_style'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_text_decoration'] . ";
	}
	
	.post.cmsms_timeline_type .cmsms_post_date .cmsms_day_mon {
		font-size:11px;
		line-height:10px;
		text-transform:uppercase;
	}
	/* Finish H4 Font */


	/* Start H5 Font */
	h5,
	h5 a,
	.cmsms_counters .cmsms_counter_wrap .cmsms_counter .cmsms_counter_inner .cmsms_counter_title,
	.cmsms_quotes_slider .quote_title,
	.post_nav a,
	.related_posts > ul li > a,
	.cmsms_stats.stats_mode_counters.stats_type_numbers .cmsms_stat_wrap .cmsms_stat .cmsms_stat_inner .cmsms_stat_title,
	.cmsms_stats.stats_mode_bars .cmsms_stat_title,
	.cmsms_stats.stats_mode_circles .cmsms_stat_wrap .cmsms_stat .cmsms_stat_inner .cmsms_stat_title,
	.widgettitle {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h5_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_text_decoration'] . ";
	}
	
	.post.cmsms_timeline_type.format-chat .cmsms_post_cont .cmsms_chat .cmsms_chat_author_time .cmsms_chat_author,
	.post.cmsms_masonry_type.format-chat .cmsms_post_cont .cmsms_chat .cmsms_chat_author_time .cmsms_chat_author {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h5_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_system_font'] . ";
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_font_style'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_text_decoration'] . ";
	}
	
	.post.cmsms_masonry_type.format-chat .cmsms_post_cont .cmsms_chat .cmsms_chat_author_time .cmsms_chat_author,
	.post.cmsms_timeline_type.format-chat .cmsms_post_cont .cmsms_chat .cmsms_chat_author_time .cmsms_chat_author {
		font-size:12px;
		line-height:20px;
		text-transform:uppercase;
	}
	
	.cmsms_stats.stats_mode_bars .cmsms_stat_title {
		line-height:20px;
	}
	/* Finish H5 Font */


	/* Start H6 Font */
	h6,
	h6 a,
	.widget_custom_colored_blocks_entries .widget_colored_cell .button_widget,
	.cmsms_posts_slider .post.format-chat .cmsms_slider_post_cont .cmsms_slider_post_chat .cmsms_chat_author,
	.cmsms_posts_slider .post.format-quote .cmsms_slider_post_quote_content,
	.cmsms_sitemap_category > li > a,
	.cmsms_sitemap_archive > li > a,
	.cmsms_sitemap_wrap .cmsms_sitemap > li > ul > li > ul > li > a,
	.tweet_text,
	.tweet_text a,
	.quote_subtitle,
	.quote_link,
	.cmsms_table tr th, 
	.cmsms_table tr.cmsms_table_row_footer td, 
	.cmsms_table tr th,
	dl dt, 
	.widget_nav_menu ul li > a,
	.cmsms_twitter .cmsms_twitter_item .cmsms_twitter_item_content,
	.cmsms_twitter .cmsms_twitter_item .cmsms_twitter_item_content a,
	.post.cmsms_default_type .cmsms_post_date .cmsms_year,
	.post.format-chat .cmsms_post_cont .cmsms_chat .cmsms_chat_author_time .cmsms_chat_author {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h6_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_text_decoration'] . ";
	}
	
	.cmsms_toggles .cmsms_toggle_wrap .cmsms_toggle_title > a,
	.cmsms_tabs .cmsms_tabs_list .cmsms_tabs_list_item > a,
	.cmsms_stats.stats_mode_bars.stats_type_horizontal .cmsms_stat_wrap .cmsms_stat .cmsms_stat_inner .cmsms_stat_counter_wrap,
	.post.cmsms_masonry_type.format-quote .cmsms_post_cont .cmsms_quote_author,
	.post.cmsms_timeline_type.format-quote .cmsms_post_cont .cmsms_quote_author,
	.post.cmsms_masonry_type .cmsms_post_cont .cmsms_quote_content,
	.post.cmsms_timeline_type .cmsms_post_cont .cmsms_quote_content {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h6_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_weight'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_text_decoration'] . ";
	}
	
	.cmsms_sitemap_category > li > a,
	.cmsms_sitemap_archive > li > a,
	.cmsms_sitemap_wrap .cmsms_sitemap > li > ul > li > ul > li > a {
		font-size:13px;
	}
	
	.cmsms_posts_slider .post.format-quote .cmsms_slider_post_quote_content {
		line-height:22px;
	}
	
	.tweet_text a,
	.tweet_text {
		font-size:13px;
		line-height:20px;
		font-style:italic;
	}
	
	.cmsms_twitter .cmsms_twitter_item .cmsms_twitter_item_content,
	.cmsms_twitter .cmsms_twitter_item .cmsms_twitter_item_content a {
		font-weight:normal;
	}
	
	.cmsms_toggles .cmsms_toggle_wrap .cmsms_toggle_title > a,
	.cmsms_tabs .cmsms_tabs_list .cmsms_tabs_list_item > a {
		font-sixe:16px;
		line-height:20px;
	}
	
	.post.cmsms_masonry_type .cmsms_post_cont .cmsms_quote_content,
	.post.cmsms_timeline_type .cmsms_post_cont .cmsms_quote_content {
		font-style:italic;
	}
	
	
	.cmsms_stats.stats_mode_bars.stats_type_horizontal .cmsms_stat_wrap .cmsms_stat .cmsms_stat_inner .cmsms_stat_counter_wrap {
		font-size:15px;
		line-height:20px;
	}
	
	.post.cmsms_masonry_type.format-quote .cmsms_post_cont .cmsms_quote_author,
	.post.cmsms_timeline_type.format-quote .cmsms_post_cont .cmsms_quote_author {
		font-size:12px;
		text-transform:uppercase;
	}
	/* Finish H6 Font */


	/* Start Button Font */
	.button,
	.cmsms_button, 
	.cmsms_post_loader, 
	.cmsms_project_loader, 
	.comment-reply-link, 
	#cancel-comment-reply-link, 
	input[type='submit'], 
	input[type='button'], 
	button {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_button_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_button_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_button_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_button_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_button_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_button_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_button_font_text_transform'] . ";
	}
	
	.button, 
	.cmsms_post_loader, 
	.cmsms_project_loader, 
	.comment-reply-link, 
	#cancel-comment-reply-link, 
	input[type='submit'], 
	input[type='button'], 
	button {
		line-height:18px;
	}
	
	.gform_wrapper .gform_footer input.button, 
	.gform_wrapper .gform_footer input[type=submit] {
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_button_font_font_size'] . "px !important;
	}
	/* Finish Button Font */


	/* Start Small Text Font */
	small {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_small_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_small_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_small_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_small_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_small_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_small_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_small_font_text_transform'] . ";
	}

	.gform_wrapper .description, 
	.gform_wrapper .gfield_description, 
	.gform_wrapper .gsection_description, 
	.gform_wrapper .instruction {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_small_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_small_font_system_font'] . " !important;
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_small_font_font_size'] . "px !important;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_small_font_line_height'] . "px !important;
	}
	
	.meta_wrap > div[class^=\"cmsms-icon-\"]:before,
	.meta_wrap > p[class^=\"cmsms-icon-\"]:before,
	.meta_wrap > span[class^=\"cmsms-icon-\"]:before,
	.meta_wrap > strong[class^=\"cmsms-icon-\"]:before,
	.meta_wrap > div[class*=\" cmsms-icon-\"]:before,
	.meta_wrap > p[class*=\" cmsms-icon-\"]:before,
	.meta_wrap > span[class*=\" cmsms-icon-\"]:before,
	.meta_wrap > strong[class*=\" cmsms-icon-\"]:before {
		font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_small_font_line_height'] - 2) . "px;
	}
	/* Finish Small Text Font */


	/* Start Text Fields Font */
	input[type=text],
	input[type=email],
	input[type=password],
	input[type=number],
	input[type=url],
	input[type=tel],
	textarea,
	select,
	option, 
	code {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_input_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_input_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_input_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_input_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_input_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_input_font_font_style'] . ";
	}
	
	.gform_wrapper input[type=text], 
	.gform_wrapper input[type=url], 
	.gform_wrapper input[type=email], 
	.gform_wrapper input[type=tel], 
	.gform_wrapper input[type=number], 
	.gform_wrapper input[type=password], 
	.gform_wrapper textarea, 
	.gform_wrapper select {
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_input_font_font_size'] . "px !important;
	}
	/* Finish Text Fields Font */


	/* Start Blockquote Font */
	q,
	blockquote {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_quote_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_quote_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_quote_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_quote_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_quote_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_quote_font_font_style'] . ";
	}
	
	q:before,
	blockquote:before {
		font:70px/40px Georgia, Times, 'Century Schoolbook L', serif; /* static */
	}
	
	.quote_grid .quote_image:before {
		font:70px/84px Georgia, Times, 'Century Schoolbook L', serif;
	}
	/* Finish Blockquote Font */

/***************** Finish Theme Font Styles ******************/


";


if (class_exists('woocommerce')) {

	$custom_css .= "
/***************** Start WooCommerce Font Styles ******************/

	/* Start Content Font */
	.checkout #order_review .shop_table tr.cart_item th, 
	.checkout #order_review .shop_table tr.cart_item td, 
	.checkout #order_review .shop_table tr.cart_item th *, 
	.checkout #order_review .shop_table tr.cart_item td *, 
	.shop_table.order_details tr.order_item th, 
	.shop_table.order_details tr.order_item td, 
	.shop_table.order_details tr.order_item th *, 
	.shop_table.order_details tr.order_item td *, 
	ul.order_details li > strong {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_content_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_content_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_content_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_content_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_content_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_content_font_font_style'] . ";
	}
	/* Finish Content Font */
	
	
	/* Start Link Font */
	/* Finish Link Font */
	
	
	/* Start H1 Font */
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	.cmsms_products .product .product_outer .product_inner .cmsms_product_info .price, 
	.cmsms_single_product .cmsms_product_right_column .product_title, 
	.cmsms_single_product .cmsms_product_right_column .price, 
	.cmsms_single_product .cmsms_woo_tabs .cmsms_tabs_wrap .cmsms_tab .cmsms_tab_inner > h2, 
	.cmsms_single_product .cmsms_woo_tabs #reviews #comments > h2 {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h3_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_text_decoration'] . ";
	}
	
	.cmsms_products .product .product_outer .product_inner .cmsms_product_info .price, 
	.cmsms_single_product .cmsms_product_right_column .price del {
		font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_h3_font_font_size'] - 4) . "px;
	}
	
	.cmsms_products .product .product_outer .product_inner .cmsms_product_info .price del {
		font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_h3_font_font_size'] - 7) . "px;
	}
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	.cart_totals > h2, 
	.cart_totals > h2 *, 
	.shipping_calculator > h2, 
	.shipping_calculator > h2 *, 
	.checkout .woocommerce-billing-fields > h3, 
	.checkout .woocommerce-shipping-fields > h3 {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h4_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_text_decoration'] . ";
	}
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	.product_list_widget li .amount, 
	.cmsms_dynamic_cart .widget_shopping_cart_content .cart_list li .quantity {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h5_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_text_decoration'] . ";
	}
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	.shop_table th, 
	.shop_table td.product-name, 
	.shop_table td.product-name *, 
	.shop_table td.product-price, 
	.shop_table td.product-price *, 
	.shop_table td.product-subtotal, 
	.shop_table td.product-subtotal *, 
	.cart_totals table, 
	.cart_totals table *, 
	.checkout #order_review .shop_table th, 
	.checkout #order_review .shop_table td, 
	.checkout #order_review .shop_table th *, 
	.checkout #order_review .shop_table td *, 
	.shop_table.order_details th, 
	.shop_table.order_details td, 
	.shop_table.order_details th *, 
	.shop_table.order_details td *, 
	ul.order_details li > span, 
	.product_list_widget li > a, 
	.cmsms_dynamic_cart .widget_shopping_cart_content .cart_list li a {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h6_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_text_decoration'] . ";
	}
	
	.shop_table th {
		font-size:" . ((int)$cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_size'] + 1) . "px;
	}
	
	.shop_table td.product-name, 
	.shop_table td.product-name *, 
	.shop_table td.product-price, 
	.shop_table td.product-price *, 
	.shop_table td.product-subtotal, 
	.shop_table td.product-subtotal *, 
	.cart_totals table, 
	.cart_totals table *, 
	.checkout #order_review .shop_table th, 
	.checkout #order_review .shop_table td, 
	.checkout #order_review .shop_table th *, 
	.checkout #order_review .shop_table td *, 
	.shop_table.order_details th, 
	.shop_table.order_details td, 
	.shop_table.order_details th *, 
	.shop_table.order_details td *, 
	ul.order_details li > span, 
	.product_list_widget li > a, 
	.product_list_widget li .amount {
		font-size:" . ((int)$cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_size'] - 1) . "px;
	}
	
	.cmsms_dynamic_cart .widget_shopping_cart_content .cart_list li a, 
	.cmsms_dynamic_cart .widget_shopping_cart_content .cart_list li .quantity {
		font-size:" . ((int)$cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_size'] - 2) . "px;
		font-weight:600;
	}
	
	.product_list_widget li .amount, 
	.cmsms_dynamic_cart .widget_shopping_cart_content .cart_list li .quantity {
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_line_height'] . "px;
	}
	
	.onsale, 
	.out-of-stock {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h6_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_system_font'] . ";
	}
	
	.shop_table td.product-price, 
	.shop_table td.product-price * {
		font-weight:normal;
	}
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	/* Finish Small Text Font */

/***************** Finish WooCommerce Font Styles ******************/


";

}


if (class_exists('TribeEvents')) {

	$custom_css .= "
/***************** Start Events Font Styles ******************/

	/* Start Content Font */
	.recurringinfo, 
	.recurringinfo *, 
	#tribe-events-content.tribe-events-photo #tribe-events-photo-events .tribe-events-photo-event .tribe-events-photo-event-wrap .tribe-events-event-details .tribe-events-event-meta .time-details, 
	#tribe-events-content.tribe-events-photo #tribe-events-photo-events .tribe-events-photo-event .tribe-events-photo-event-wrap .tribe-events-event-details .tribe-events-event-meta .time-details *, 
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-allday .column.first, 
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-grid-wrapper .tribe-grid-body .tribe-week-grid-hours, 
	#tribe-mobile-container .tribe-mobile-day .tribe-events-mobile .tribe-events-event-body .time-details, 
	.widget .vcalendar .vevent .cmsms_widget_event_info *, 
	.widget .tribe-events-widget-link a, 
	.widget .vcalendar .vevent .cmsms_widget_event_venue_info_loc, 
	.widget .vcalendar .vevent .cmsms_widget_event_venue_info_loc *, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td *, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info .tribe-mini-calendar-event-venue a, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info .recurringinfo * {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_content_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_content_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_content_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_content_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_content_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_content_font_font_style'] . ";
	}
	
	#tribe-events-content.tribe-events-single .cmsms_single_event_meta .tribe-events-meta-group .cmsms_event_meta_info .cmsms_event_meta_info_item .cmsms_event_meta_info_item_title, 
	#tribe-events-content.tribe-events-single .cmsms_single_event_meta .tribe-events-meta-group .cmsms_event_meta_info .cmsms_event_meta_info_item dt {
		font-weight:bold;
	}
	
	.tribe-events-tooltip,
	#tribe-events-content.tribe-events-list .vevent .cmsms_events_list_event_wrap .tribe-events-event-meta .time-details, 
	#tribe-events-content.tribe-events-list .vevent .cmsms_events_list_event_wrap .tribe-events-event-meta .time-details *, 
	#tribe-events-content.tribe-events-list .vevent .cmsms_events_list_event_wrap .tribe-events-event-meta .tribe-events-venue-details, 
	#tribe-events-content.tribe-events-list .vevent .cmsms_events_list_event_wrap .tribe-events-event-meta .tribe-events-venue-details *, 
	#tribe-events-content.tribe-events-photo #tribe-events-photo-events .tribe-events-photo-event .tribe-events-photo-event-wrap .tribe-events-event-details .tribe-events-event-meta .time-details, 
	#tribe-events-content.tribe-events-photo #tribe-events-photo-events .tribe-events-photo-event .tribe-events-photo-event-wrap .tribe-events-event-details .tribe-events-event-meta .time-details *, 
	#tribe-mobile-container .tribe-mobile-day .tribe-events-mobile .tribe-events-event-body .time-details, 
	.widget .vcalendar .vevent .cmsms_widget_event_info *, 
	.widget .tribe-events-widget-link a, 
	.widget .vcalendar .vevent .cmsms_widget_event_venue_info_loc, 
	.widget .vcalendar .vevent .cmsms_widget_event_venue_info_loc * {
		font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_content_font_font_size'] - 1) . "px;
	}
	
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-allday .column.first, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td *, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info .tribe-mini-calendar-event-venue a, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info .recurringinfo * {
		font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_content_font_font_size'] - 2) . "px;
	}
	
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-allday .column.first span {
		height:" . $cmsms_option[CMSMS_SHORTNAME . '_content_font_line_height'] . "px;
	}
	
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-grid-wrapper .tribe-grid-body .tribe-week-grid-hours {
		font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_content_font_font_size'] - 3) . "px;
	}
	/* Finish Content Font */
	
	
	/* Start Link Font */
	/* Finish Link Font */
	
	
	/* Start H1 Font */
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-number, 
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-colon {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h1_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h1_font_text_decoration'] . ";
	}
	
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-number, 
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-colon {
		font-size:40px;
		line-height:1em;
	}
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	#tribe-events-content.tribe-events-single .cmsms_single_event_header .cmsms_single_event_header_left .tribe-events-single-event-title,
	#tribe-mobile-container .tribe-mobile-day .tribe-mobile-day-heading, 
	#tribe-mobile-container .tribe-mobile-day .tribe-mobile-day-date {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h2_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h2_font_text_decoration'] . ";
	}
	
	#tribe-mobile-container .tribe-mobile-day .tribe-mobile-day-heading, 
	#tribe-mobile-container .tribe-mobile-day .tribe-mobile-day-date {
		text-transform:uppercase;
	}
	/* Finish H2 Font */
	
	
	/* Start H3 Font */ 
	.tribe-events-related-events-title,
	.tribe-events-page-title, 
	.tribe-events-countdown-widget .tribe-countdown-text a, 
	.widget .vcalendar .vevent .entry-title, 
	.widget .vcalendar .vevent .entry-title a {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h3_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h3_font_text_decoration'] . ";
	}
	
	.tribe-events-related-events-title {
		text-transform:uppercase;
	}
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	ul.tribe-related-events > li .tribe-related-event-info .tribe-related-events-title a,
	ul.tribe-related-events > li .tribe-related-event-info .tribe-related-events-title,
	#tribe-events-content.tribe-events-single .cmsms_single_event_meta .tribe-events-meta-group .tribe-events-single-section-title,  
	#tribe-events-content.tribe-events-photo #tribe-events-photo-events .tribe-events-photo-event .tribe-events-photo-event-wrap .tribe-events-event-details .tribe-events-list-event-title,
	#tribe-events-content.tribe-events-photo #tribe-events-photo-events .tribe-events-photo-event .tribe-events-photo-event-wrap .tribe-events-event-details .tribe-events-list-event-title a,
	#tribe-events-content.tribe-events-day .tribe-events-day-time-slot > h5,
	#tribe-events-content.tribe-events-list .vevent .cmsms_events_list_event_wrap .cmsms_events_list_event_header .tribe-events-event-cost,
	.tribe-events-list .tribe-events-list-event-title,
	.tribe-events-list .tribe-events-list-event-title a,
	#tribe-events-content.tribe-events-list .tribe-events-list-separator-month, 
	#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-date-filter label, 
	#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-search-filter label, 
	#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-geoloc-filter label, 
	#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-submit label {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h4_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h4_font_text_decoration'] . ";
	}
	
	#tribe-events-content.tribe-events-list .vevent .cmsms_events_list_event_wrap .cmsms_events_list_event_header .tribe-events-event-cost {
		font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_h4_font_font_size'] + 2) . "px;
	}
	
	#tribe-events-content.tribe-events-day .tribe-events-day-time-slot > h5,
	#tribe-events-content.tribe-events-list .tribe-events-list-separator-month {
		text-transform:uppercase;
	}
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	.tribe-events-adv-list-widget .vcalendar .vevent .entry-title,
	.tribe-events-adv-list-widget .vcalendar .vevent .entry-title a,
	.tribe-events-venue-widget .vcalendar .vevent .entry-title,
	.tribe-events-venue-widget .vcalendar .vevent .entry-title a,
	#tribe-events-content.tribe-events-month table.tribe-events-calendar thead th, 
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header .tribe-grid-content-wrap .column, 
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header .tribe-grid-content-wrap .column *, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-date span.list-daynumber, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info h2, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info h2 a {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h5_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h5_font_text_decoration'] . ";
	}
	
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header .tribe-grid-content-wrap .column, 
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header .tribe-grid-content-wrap .column *, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-date span.list-daynumber, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info h2, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info h2 a {
		font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_h5_font_font_size'] - 1) . "px;
	}
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	.tribe-events-tooltip .entry-title, 
	.tribe-events-tooltip .entry-title a,
	#tribe-events-content.tribe-events-single .cmsms_single_event_header .cmsms_single_event_header_right .tribe-events-cal-links a, 
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-daynum-\"], 
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-daynum-\"] a, 
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-event-\"] .tribe-events-month-event-title, 
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-event-\"] .tribe-events-month-event-title a, 
	#tribe-events-footer > a, 
	#tribe-events-content.tribe-events-list .vevent .cmsms_events_list_event_wrap .tribe-events-list-event-description .tribe-events-read-more, 
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td .tribe-events-viewmore, 
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td .tribe-events-viewmore a, 
	.tribe-events-venue .cmsms_events_venue_header .cmsms_events_venue_header_left .tribe-events-event-meta .venue-address span, 
	.tribe-events-venue .cmsms_events_venue_header .cmsms_events_venue_header_left .tribe-events-event-meta .venue-address span a, 
	.tribe-events-venue .cmsms_events_venue_header .cmsms_events_venue_header_right a, 
	.tribe-events-organizer .cmsms_events_organizer_header .cmsms_events_organizer_header_left .tribe-events-event-meta .organizer-address span, 
	.tribe-events-organizer .cmsms_events_organizer_header .cmsms_events_organizer_header_left .tribe-events-event-meta .organizer-address span a, 
	.tribe-events-organizer .cmsms_events_organizer_header .cmsms_events_organizer_header_right a, 
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title, 
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title a, 
	#tribe-mobile-container .tribe-mobile-day .tribe-events-mobile .tribe-events-event-body .tribe-events-read-more, 
	.tribe-events-viewmore a, 
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-number .tribe-countdown-under, 
	.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name, 
	.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name a, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar th.tribe-mini-calendar-dayofweek, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-date span.list-dayname {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_h6_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsms_option[CMSMS_SHORTNAME . '_h6_font_text_decoration'] . ";
	}
	
	#tribe-events-content.tribe-events-single .cmsms_single_event_header .cmsms_single_event_header_right .tribe-events-back a, 
	#tribe-events-content.tribe-events-single .cmsms_single_event_header .cmsms_single_event_header_right .tribe-events-cal-links a, 
	#tribe-events-footer > a,  
	.tribe-events-venue .cmsms_events_venue_header .cmsms_events_venue_header_right a, 
	.tribe-events-organizer .cmsms_events_organizer_header .cmsms_events_organizer_header_right a {
		font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_size'] - 2) . "px;
	}
	 
	.tribe-events-venue .cmsms_events_venue_header .cmsms_events_venue_header_right a:before, 
	.tribe-events-organizer .cmsms_events_organizer_header .cmsms_events_organizer_header_right a:before {
		font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_size'] + 1) . "px;
	}
	
	#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title a,
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-daynum-\"], 
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-daynum-\"] a, 
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td .tribe-events-viewmore, 
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td .tribe-events-viewmore a, 
	.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name, 
	#tribe-events-content.tribe-events-list .vevent .cmsms_events_list_event_wrap .tribe-events-list-event-description .tribe-events-read-more,
	.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name a, 
	#tribe-mobile-container .tribe-mobile-day .tribe-events-mobile .tribe-events-event-body .tribe-events-read-more {
		font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_size'] - 1) . "px;
	}
	
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-number .tribe-countdown-under, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar th.tribe-mini-calendar-dayofweek {
		font-size:" . ((int) $cmsms_option[CMSMS_SHORTNAME . '_h6_font_font_size'] - 3) . "px;
	}
	
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-date span.list-dayname {
		font-size:10px;
	}
	
	.tribe-events-tooltip .entry-title, 
	.tribe-events-tooltip .entry-title a,
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-event-\"] .tribe-events-month-event-title, 
	#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-event-\"] .tribe-events-month-event-title a, 
	#tribe-events-footer > a, 
	.tribe-events-venue .cmsms_events_venue_header .cmsms_events_venue_header_right a, 
	.tribe-events-organizer .cmsms_events_organizer_header .cmsms_events_organizer_header_right a, 
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-number .tribe-countdown-under, 
	.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name, 
	.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name a, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar th.tribe-mini-calendar-dayofweek, 
	.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-date span.list-dayname {
		font-weight:normal;
	}
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option a {
		font-family:" . cmsms_get_google_font($cmsms_option[CMSMS_SHORTNAME . '_button_font_google_font']) . $cmsms_option[CMSMS_SHORTNAME . '_button_font_system_font'] . ";
		font-size:" . $cmsms_option[CMSMS_SHORTNAME . '_button_font_font_size'] . "px;
		line-height:" . $cmsms_option[CMSMS_SHORTNAME . '_button_font_line_height'] . "px;
		font-weight:" . $cmsms_option[CMSMS_SHORTNAME . '_button_font_font_weight'] . ";
		font-style:" . $cmsms_option[CMSMS_SHORTNAME . '_button_font_font_style'] . ";
		text-transform:" . $cmsms_option[CMSMS_SHORTNAME . '_button_font_text_transform'] . ";
	}
	
	#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option a {
		text-transform:none;
		line-height:20px;
	}
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	/* Finish Small Text Font */

/***************** Finish Events Font Styles ******************/


";

}
	
	return $custom_css;
}



function cmsms_get_google_font($font) {
	if ($font != '') {
		if (strpos($font, ':')) {
			$google_font_array = explode(':', $font);
			
			
			$google_font = "'" . str_replace('+', ' ', $google_font_array[0]) . "', ";
		} elseif (strpos($font, '&')) {
			$google_font_array = explode('&', $font);
			
			
			$google_font = "'" . str_replace('+', ' ', $google_font_array[0]) . "', ";
		} else {
			$google_font = "'" . str_replace('+', ' ', $font) . "', ";
		}
	} else {
		$google_font = '';
	}
	
	
	return $google_font;
}

