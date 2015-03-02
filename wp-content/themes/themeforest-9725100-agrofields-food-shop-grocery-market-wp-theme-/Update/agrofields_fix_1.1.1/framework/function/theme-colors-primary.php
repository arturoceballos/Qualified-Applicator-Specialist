<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version 	1.1.0
 * 
 * Theme Primary Color Schemes Rules
 * Created by CMSMasters
 * 
 */


function cmsms_theme_colors_primary() {
	$cmsms_option = cmsms_get_global_options();
	
	
	$cmsms_color_schemes = cmsms_color_schemes_list();
	
	
	unset($cmsms_color_schemes['header']);
	
	unset($cmsms_color_schemes['header_top']);
	
	unset($cmsms_color_schemes['header_bottom']);
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.1.0
 * 
 * Theme Color Schemes Rules
 * Created by CMSMasters
 * 
 */

";
	
	
	foreach ($cmsms_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsms_color_scheme_{$scheme} " : '');
		
		
		$cmsms_color = explode('|', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_color']);
		
		$cmsms_link = explode('|', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']);
		
		$cmsms_bg = explode('|', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']);
		
		$cmsms_alt = explode('|', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']);
		
		$cmsms_bd = explode('|', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']);
		
		
		$custom_css .= "
/***************** Start {$title} Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	" . (($scheme == 'default') ? "body," : '') . (($scheme != 'default') ? ".cmsms_color_scheme_{$scheme}," : '') . "
	{$rule}a:hover,
	{$rule}input[type=text],
	{$rule}input[type=number],
	{$rule}input[type=email],
	{$rule}input[type=password],
	{$rule}input[type=submit],
	{$rule}textarea,
	{$rule}select,
	{$rule}option,
	{$rule}.cmsms_icon_list_type_list .cmsms_icon_list_item:before,
	{$rule}.cmsmsLike, 
	{$rule}.cmsmsLike:hover, 
	{$rule}.cmsms_search_post_comments, 
	{$rule}.cmsms_slider_post_comments, 
	{$rule}.cmsms_project_comments, 
	{$rule}.cmsms_slider_project_comments, 
	{$rule}.cmsms_profile_comments,
	{$rule}.cmsms_post_comments,
	{$rule}.cmsms_search_post_comments:hover, 
	{$rule}.cmsms_slider_post_comments:hover, 
	{$rule}.cmsms_project_comments:hover, 
	{$rule}.cmsms_slider_project_comments:hover, 
	{$rule}.cmsms_profile_comments:hover,
	{$rule}.cmsms_twitter .cmsms_twitter_item,
	{$rule}.search_bar_wrap .cmsms_theme_icon_search:before,
	{$rule}.cmsms_clients_slider .owl-buttons > div.owl-prev:hover .cmsms_prev_arrow:before,
	{$rule}.cmsms_clients_slider .owl-buttons > div.owl-next:hover .cmsms_next_arrow:before,
	{$rule}.cmsms_tabs.lpr .cmsms_tabs_list .cmsms_tabs_list_item > a,
	{$rule}.cmsms_post_comments:hover {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_color']) . "
	}
	
	{$rule}abbr,
	{$rule}acronym {
		" . cmsms_color_css('border-bottom-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_color']) . "
	}
	
	{$rule}input::-webkit-input-placeholder {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_color']) . "
	}
	{$rule}input:-moz-placeholder {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}a,
	{$rule}h1 a:hover,
	{$rule}h2 a:hover,
	{$rule}h3 a:hover,
	{$rule}h4 a:hover,
	{$rule}h5 a:hover,
	{$rule}h6 a:hover,
	{$rule}.color_2,
	{$rule}.post.cmsms_masonry_type .cmsms_post_cont .cmsms_post_cont_inner .cmsms_post_read_more,
	{$rule}.post.cmsms_timeline_type .cmsms_post_cont .cmsms_post_footer .cmsms_post_read_more,
	{$rule}.cmsmsLike.active:before, 
	{$rule}.cmsmsLike:hover:before, 
	{$rule}.cmsms_post_comments:hover:before,
	{$rule}.cmsms_search_post_comments:hover:before, 
	{$rule}.cmsms_slider_post_comments:hover:before, 
	{$rule}.cmsms_project_comments:hover:before, 
	{$rule}.cmsms_slider_project_comments:hover:before, 
	{$rule}.cmsms_profile_comments:hover:before,
	{$rule}.post_nav a:hover,
	{$rule}q:before, 
	{$rule}.related_posts > ul li > a:hover, 
	{$rule}.related_posts > ul li > a.current, 
	{$rule}.post_comments .commentlist > li.bypostauthor > .comment-body .fn:before, 
	" . (($scheme == 'default') ? "#slide_top:hover:before," : '') . "
	{$rule}.quote_grid .quote_image:before,
	{$rule}.cmsms_toggles .cmsms_toggle_wrap.current_toggle .cmsms_toggle_title a,
	{$rule}.cmsms_toggles .cmsms_toggle_wrap .cmsms_toggle_title:hover a,
	{$rule}.quote_subtitle,
	{$rule}.quote_link,
	{$rule}.owl-buttons .owl-prev:hover .cmsms_prev_arrow:before, 
	{$rule}.owl-buttons .owl-next:hover .cmsms_next_arrow:before,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type='checkbox'] + span.wpcf7-list-item-label:after, 
	{$rule}.cmsms-form-builder .check_parent input[type='checkbox'] + label:after,
	{$rule}.cmsms_pricing_table .cmsms_pricing_item .cmsms_price_wrap .cmsms_price,
	{$rule}.cmsms_pricing_table .cmsms_pricing_item .cmsms_price_wrap .cmsms_currency,
	{$rule}.cmsms_pricing_table .cmsms_pricing_item .cmsms_price_wrap .cmsms_coins,
	{$rule}.twr_icon:before,
	{$rule}.cmsms_profile .pl_subtitle,
	{$rule}.widget_nav_menu ul li > a:hover,
	{$rule}.widget_nav_menu ul li.current-menu-item > a,
	{$rule}.cmsms_posts_slider .owl-controls .owl-buttons > div:hover .cmsms_next_arrow:before,
	{$rule}.cmsms_posts_slider .owl-controls .owl-buttons > div:hover .cmsms_prev_arrow:before,
	{$rule}.cmsms_tabs.lpr .cmsms_tabs_list .cmsms_tabs_list_item:hover > a,
	{$rule}.cmsms_tabs.lpr .cmsms_tabs_list .cmsms_tabs_list_item.current_tab > a,
	{$rule}blockquote:before {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.button:hover, 
	{$rule}.cmsms_button:hover, 
	{$rule}.cmsms_post_loader:hover, 
	{$rule}.cmsms_project_loader:hover, 
	{$rule}.comment-reply-link:hover, 
	{$rule}#cancel-comment-reply-link:hover, 
	{$rule}input[type='submit']:hover, 
	{$rule}input[type='button']:hover, 
	{$rule}button:hover, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button, 
	{$rule}.related_posts .related_posts_content .related_posts_content_tab .rel_post_content figure.alignleft .img_placeholder, 
	{$rule}.owl-carousel .owl-controls .owl-pagination .owl-page:hover, 
	{$rule}.owl-carousel .owl-controls .owl-pagination .owl-page.active, 
	{$rule}.post.format-status.cmsms_default_type .cmsms_post_cont, 
	{$rule}.post.format-aside.cmsms_default_type .cmsms_post_cont, 
	{$rule}.post.cmsms_timeline_type .cmsms_post_date, 
	{$rule}.post.cmsms_timeline_type .cmsms_post_format_img, 
	{$rule}.post.cmsms_masonry_type .cmsms_post_format_img, 
	{$rule}.post.cmsms_default_type .cmsms_post_format_img, 
	{$rule}.cmsms_posts_slider .post .cmsms_slider_post_cont .cmsms_post_format_img, 
	{$rule}.cmsms_wrap_pagination ul li .page-numbers.current, 
	{$rule}.cmsms_wrap_pagination ul li .page-numbers:hover, 
	{$rule}.cmsms_post_filter_wrap .cmsms_post_filter .cmsms_post_filter_block .cmsms_post_filter_list li .button:hover,
	{$rule}.cmsms_project_filter_wrap .cmsms_project_filter .cmsms_project_filter_block .cmsms_project_filter_list li .button:hover,
	{$rule}.cmsms_post_filter_wrap .cmsms_post_filter .cmsms_post_filter_block .cmsms_post_filter_list li.current .button,
	{$rule}.cmsms_project_filter_wrap .cmsms_project_filter .cmsms_project_filter_block .cmsms_project_filter_list li.current .button,
	{$rule}.cmsms_post_filter_wrap .cmsms_post_filter .cmsms_post_filter_block .cmsms_post_filter_but.current,
	{$rule}.cmsms_project_filter_wrap .cmsms_project_filter .cmsms_project_filter_block .cmsms_project_filter_but.current,
	{$rule}.cmsms_project_sort_but.current,
	{$rule}.cmsms_clients_slider.owl-carousel .owl-controls .owl-pagination .owl-page.active,
	{$rule}.cmsms_clients_slider.owl-carousel .owl-controls .owl-pagination .owl-page:hover,
	{$rule}.cmsms_tabs.tabs_mode_tour .cmsms_tabs_list .cmsms_tabs_list_item.current_tab > a,
	{$rule}.cmsms_tabs.tabs_mode_tour .cmsms_tabs_list .cmsms_tabs_list_item > a:hover,
	{$rule}.cmsms_toggles.toggles_mode_accordion .cmsms_toggle_wrap.current_toggle .cmsms_toggle_title .cmsms_toggle_plus_hor,
	{$rule}.cmsms_toggles.toggles_mode_accordion .cmsms_toggle_wrap .cmsms_toggle_title:hover > .cmsms_toggle_plus .cmsms_toggle_plus_hor,
	{$rule}.cmsms_toggles.toggles_mode_accordion .cmsms_toggle_wrap .cmsms_toggle_title:hover > .cmsms_toggle_plus .cmsms_toggle_plus_vert,
	{$rule}.cmsms_toggles.toggles_mode_toggle .cmsms_toggle_wrap.current_toggle .cmsms_toggle_title .cmsms_toggle_plus_hor,
	{$rule}.cmsms_toggles.toggles_mode_toggle .cmsms_toggle_wrap .cmsms_toggle_title:hover > .cmsms_toggle_plus .cmsms_toggle_plus_hor,
	{$rule}.cmsms_toggles.toggles_mode_toggle .cmsms_toggle_wrap .cmsms_toggle_title:hover > .cmsms_toggle_plus .cmsms_toggle_plus_vert,
	{$rule}.cmsms_icon_list_items.cmsms_color_type_bg .cmsms_icon_list_item .cmsms_icon_list_icon,
	{$rule}.cmsms_icon_list_items.cmsms_color_type_icon .cmsms_icon_list_item:hover .cmsms_icon_list_icon,
	{$rule}.cmsms-form-builder .check_parent input[type='radio'] + label:after, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type='radio'] + span.wpcf7-list-item-label:after,
	{$rule}.cmsms_pricing_table .cmsms_pricing_item .cmsms_button,
	{$rule}.cmsms_search .cmsms_search_post .cmsms_search_post_number,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_list .cmsms_tabs_list_item > a:hover,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_list .cmsms_tabs_list_item.current_tab > a:hover,
	{$rule}.cmsms_dropcap.type2 {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}input[type=text]:focus,
	{$rule}input[type=email]:focus,
	{$rule}input[type=password]:focus,
	{$rule}textarea:focus, 
	{$rule}select:focus,
	{$rule}.cmsms_post_filter_wrap .cmsms_post_filter .cmsms_post_filter_block .cmsms_post_filter_list li .button:hover,
	{$rule}.cmsms_post_filter_wrap .cmsms_post_filter .cmsms_post_filter_block .cmsms_post_filter_list li.current .button,
	{$rule}.cmsms_project_filter_wrap .cmsms_project_filter .cmsms_project_filter_block .cmsms_project_filter_list li .button:hover,
	{$rule}.cmsms_project_filter_wrap .cmsms_project_filter .cmsms_project_filter_block .cmsms_project_filter_list li.current .button,
	{$rule}.cmsms_tabs.tabs_mode_tour .cmsms_tabs_list .cmsms_tabs_list_item.current_tab > a,
	{$rule}.cmsms_tabs.tabs_mode_tour .cmsms_tabs_list .cmsms_tabs_list_item > a:hover,
	{$rule}.cmsms_tabs.tabs_mode_tour .cmsms_tabs_list .cmsms_tabs_list_item.current_tab:first-child > a,
	{$rule}.cmsms_tabs.tabs_mode_tour .cmsms_tabs_list .cmsms_tabs_list_item:first-child > a:hover,
	{$rule}.cmsms_pricing_table .cmsms_pricing_item.pricing_best,
	{$rule}.cmsms_quotes_slider .owl-buttons > div:hover,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_list .cmsms_tabs_list_item > a:hover,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_list .cmsms_tabs_list_item.current_tab > a:hover,
	{$rule}.cmsms_posts_slider .owl-controls .owl-buttons > div:hover,
	{$rule}.cmsms_icon_list_items.cmsms_color_type_border .cmsms_icon_list_item .cmsms_icon_list_icon:after {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.sidebar.fl .widget_nav_menu ul li > a:hover,
	{$rule}.sidebar.fl .widget_nav_menu ul li.current-menu-item > a {
		" . cmsms_color_css('border-' . (is_rtl() ? 'left' : 'right') . '-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.widget_nav_menu ul li > a:hover,
	{$rule}.widget_nav_menu ul li.current-menu-item > a {
		" . cmsms_color_css('border-' . (is_rtl() ? 'right' : 'left') . '-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsms_profile.horizontal .pl_img:hover .pl_social,
	{$rule}.cmsms_img_rollover_wrap:hover .cmsms_img_rollover,
	{$rule}.cmsms_posts_slider .project .slider_project_outer:hover .cmsms_img_rollover,
	{$rule}.portfolio.puzzle .project .project_outer:hover .cmsms_img_rollover {
		background-color:rgba(" . hex2rgb($cmsms_link[0]) . ", 0.8);
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}a:hover, 
	{$rule}.tweet_list li:before, 
	{$rule}.profiles.opened-article .profile .profile_sidebar .profile_social_icons .profile_social_icons_list li a:before, 
	{$rule}.cmsms_profile.vertical .pl_content_meta .pl_social_list li a:before, 
	{$rule}.post.cmsms_masonry_type .cmsms_post_cont .cmsms_post_cont_inner .cmsms_post_read_more:hover,
	{$rule}.post.cmsms_timeline_type .cmsms_post_cont .cmsms_post_footer .cmsms_post_read_more:hover {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.button, 
	{$rule}.cmsms_button, 
	{$rule}.cmsms_post_loader, 
	{$rule}.cmsms_project_loader, 
	{$rule}.comment-reply-link, 
	{$rule}#cancel-comment-reply-link, 
	{$rule}input[type='submit'], 
	{$rule}input[type='button'], 
	{$rule}button,
	{$rule}.cmsms_pricing_item .cmsms_button {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}h1,
	{$rule}h2,
	{$rule}h3,
	{$rule}h4,
	{$rule}h5,
	{$rule}h6,
	{$rule}h1 a,
	{$rule}h2 a,
	{$rule}h3 a,
	{$rule}h4 a,
	{$rule}h5 a,
	{$rule}h6 a,
	{$rule}.cmsms_table tr th, 
	{$rule}.cmsms_table tr.cmsms_table_row_footer td, 
	{$rule}.cmsms_table tr th, 
	{$rule}dl dt, 
	{$rule}.post.cmsms_masonry_type.format-chat .cmsms_post_cont .cmsms_chat .cmsms_chat_author_time .cmsms_chat_author, 
	{$rule}.cmsms_dropcap.type1, 
	{$rule}.post_nav a, 
	{$rule}.cmsms_wrap_pagination ul li .page-numbers, 
	{$rule}.cmsms_wrap_pagination ul li .page-numbers .cmsms_prev_arrow:before, 
	{$rule}.cmsms_wrap_pagination ul li .page-numbers .cmsms_next_arrow:before, 
	{$rule}.related_posts > ul li > a, 
	{$rule}.cmsms_stats.stats_mode_circles .cmsms_stat_wrap .cmsms_stat .cmsms_stat_inner .cmsms_stat_counter_wrap, 
	{$rule}.cmsms_post_filter_wrap .cmsms_post_filter .cmsms_post_filter_block .cmsms_post_filter_list li .button span,
	{$rule}.cmsms_project_filter_wrap .cmsms_project_filter .cmsms_project_filter_block .cmsms_project_filter_list li .button span,
	" . (($scheme == 'default') ? "#slide_top:before," : '') . "
	{$rule}.post.cmsms_default_type.format-quote .cmsms_post_cont .cmsms_quote_author, 
	{$rule}.cmsms_tabs .cmsms_tabs_list .cmsms_tabs_list_item > a, 
	{$rule}.portfolio.opened-article .project .project_sidebar .project_details .project_details_item .project_details_item_title, 
	{$rule}.cmsms_toggles .cmsms_toggle_wrap .cmsms_toggle_title > a, 
	{$rule}.cmsms_icon_list_items.cmsms_color_type_border .cmsms_icon_list_item .cmsms_icon_list_icon:before,
	{$rule}.cmsms_twitter .owl-buttons > div .cmsms_prev_arrow:before, 
	{$rule}.cmsms_twitter .owl-buttons > div .cmsms_next_arrow:before,
	{$rule}.owl-buttons .cmsms_prev_arrow:before, 
	{$rule}.owl-buttons .cmsms_next_arrow:before,
	{$rule}.profiles.opened-article .profile .profile_sidebar .profile_details .profile_details_item .profile_details_item_title,
	{$rule}.profiles.opened-article .profile .profile_sidebar .profile_features .profile_features_item .profile_features_item_title,
	{$rule}.widget_nav_menu ul li > a,
	{$rule}#wp-calendar caption,
	{$rule}.widget_custom_popular_projects_entries .owl-buttons > div:hover .cmsms_prev_arrow:before,
	{$rule}.widget_custom_popular_projects_entries .owl-buttons > div:hover .cmsms_next_arrow:before,
	{$rule}.widget_custom_latest_projects_entries .owl-buttons > div:hover .cmsms_prev_arrow:before,
	{$rule}.widget_custom_latest_projects_entries .owl-buttons > div:hover .cmsms_next_arrow:before,
	{$rule}.cmsms_sitemap_wrap .cmsms_sitemap > li > ul > li > a,
	{$rule}.cmsms_sitemap_wrap .cmsms_sitemap > li > a,
	{$rule}.cmsms_notice .notice_close:hover:before,
	{$rule}.post.cmsms_default_type .cmsms_post_date .cmsms_day_mon {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.fixed_footer #footer .footer_inner .footer_nav > li:before, 
	{$rule}.cmsms_toggles .cmsms_toggle_wrap .cmsms_toggle_title > .cmsms_toggle_plus .cmsms_toggle_plus_hor, 
	{$rule}.cmsms_toggles .cmsms_toggle_wrap .cmsms_toggle_title > .cmsms_toggle_plus .cmsms_toggle_plus_vert {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.button, 
	{$rule}.cmsms_button, 
	{$rule}.cmsms_post_loader, 
	{$rule}.cmsms_project_loader, 
	{$rule}.button:hover,
	{$rule}.cmsms_button:hover,
	{$rule}.cmsms_post_loader:hover,
	{$rule}.cmsms_project_loader:hover,
	{$rule}.comment-reply-link, 
	{$rule}.comment-reply-link:hover, 
	{$rule}#cancel-comment-reply-link, 
	{$rule}input[type='submit'], 
	{$rule}button,
	{$rule}input[type='button'],
	{$rule}.cmsms_dropcap.type2,
	{$rule}.portfolio.puzzle .project .project_outer .project_inner .cmsms_project_header .cmsms_project_title a,
	{$rule}.portfolio.puzzle .project .project_outer .project_inner .cmsms_project_category a,
	{$rule}.portfolio.puzzle .project .project_outer .project_inner,
	{$rule}.portfolio.puzzle .project .project_outer .project_inner a,
	{$rule}.portfolio.puzzle .project .project_outer .cmsmsLike,
	{$rule}.portfolio.puzzle .project .project_outer .cmsmsLike:before,
	{$rule}.portfolio.puzzle .project .project_outer .cmsms_project_comments,
	{$rule}.portfolio.puzzle .project .project_outer .cmsms_project_comments:before,
	{$rule}.cmsms_posts_slider .project .slider_project_outer .slider_project_inner *,
	{$rule}.cmsms_posts_slider .project .slider_project_outer .slider_project_inner *:before,
	{$rule}.related_posts .related_posts_content .related_posts_content_tab .rel_post_content figure.alignleft .img_placeholder:before,
	{$rule}.cmsms_wrap_pagination ul li .page-numbers.current,
	{$rule}.cmsms_wrap_pagination ul li .page-numbers:hover,
	{$rule}.cmsms_wrap_pagination ul li .page-numbers:hover .cmsms_prev_arrow:before,
	{$rule}.cmsms_wrap_pagination ul li .page-numbers:hover .cmsms_next_arrow:before,
	{$rule}.post.format-aside .cmsms_post_cont,
	{$rule}.post.format-aside .cmsms_post_cont a,
	{$rule}.post.format-aside .cmsms_post_cont .cmsmsLike:before, 
	{$rule}.post.format-aside .cmsms_post_cont .cmsms_post_comments:before,
	{$rule}.post.cmsms_timeline_type .cmsms_post_date .cmsms_day_mon,
	{$rule}.post.cmsms_timeline_type .cmsms_post_date .cmsms_year,
	{$rule}.post.format-status .cmsms_post_cont,
	{$rule}.post.format-status .cmsms_post_cont a,
	{$rule}.cmsms_post_filter_wrap .cmsms_post_filter .cmsms_post_filter_block .cmsms_post_filter_list li .button:hover span,
	{$rule}.cmsms_project_filter_wrap .cmsms_project_filter .cmsms_project_filter_block .cmsms_project_filter_list li .button:hover span,
	{$rule}.cmsms_post_filter_wrap .cmsms_post_filter .cmsms_post_filter_block .cmsms_post_filter_list li.current .button span,
	{$rule}.cmsms_project_filter_wrap .cmsms_project_filter .cmsms_project_filter_block .cmsms_project_filter_list li.current .button span,
	{$rule}.post.format-status .cmsms_post_cont .cmsmsLike:before, 
	{$rule}.cmsms_stats.stats_mode_bars .cmsms_stat_wrap .cmsms_stat .cmsms_stat_inner .cmsms_stat_counter_wrap,  
	{$rule}.cmsms_stats.stats_mode_bars .cmsms_stat_wrap .cmsms_stat .cmsms_stat_inner[class^='cmsms-icon-']:before, 
	{$rule}.cmsms_stats.stats_mode_bars .cmsms_stat_wrap .cmsms_stat .cmsms_stat_inner[class*=' cmsms-icon-']:before,
	{$rule}.cmsms_icon_list_items.cmsms_color_type_bg .cmsms_icon_list_item .cmsms_icon_list_icon:before,
	{$rule}.cmsms_icon_list_items.cmsms_color_type_icon .cmsms_icon_list_item:hover .cmsms_icon_list_icon:before,
	{$rule}.cmsms_tabs.tabs_mode_tour .cmsms_tabs_list .cmsms_tabs_list_item.current_tab > a,
	{$rule}.cmsms_tabs.tabs_mode_tour .cmsms_tabs_list .cmsms_tabs_list_item > a:hover,
	{$rule}.cmsms_profile.horizontal .pl_social_list li a:before,
	{$rule}.cmsms_search .cmsms_search_post .cmsms_search_post_number,
	{$rule}.cmsms_posts_slider .post.format-quote .cmsms_slider_post_quote_content:before,
	{$rule}.cmsms_posts_slider .post .cmsms_slider_post_cont .cmsms_slider_post_cont_wrap *,
	{$rule}.cmsms_posts_slider .post .cmsms_slider_post_cont .cmsms_slider_post_cont_wrap a,
	{$rule}.cmsms_posts_slider .post .cmsms_slider_post_cont .cmsms_slider_post_cont_wrap a:before,
	{$rule}.cmsms_posts_slider .post .cmsms_slider_post_cont .cmsms_post_format_img .cmsms_slider_post_date .cmsms_mon, 
	{$rule}.cmsms_posts_slider .post .cmsms_slider_post_cont .cmsms_post_format_img .cmsms_slider_post_date .cmsms_day,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_list .cmsms_tabs_list_item > a:hover,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_list .cmsms_tabs_list_item.current_tab > a:hover,
	{$rule}.post.format-status .cmsms_post_cont .cmsms_post_comments:before {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	" . (($scheme == 'default') ? "body," : '') . (($scheme != 'default') ? ".cmsms_color_scheme_{$scheme}," : '') . "
	{$rule}input[type=text]:focus,
	{$rule}input[type=number]:focus,
	{$rule}input[type=email]:focus,
	{$rule}input[type=password]:focus,
	{$rule}textarea:focus,
	{$rule}select:focus,
	{$rule}.middle_inner,
	{$rule}.cmsms_quotes_slider .quote_content,
	{$rule}#navigation ul,
	{$rule}#navigation > li.menu-item-mega li:hover > a,
	{$rule}#navigation > li.menu-item-mega li.current-menu-ancestor > a,
	{$rule}#navigation > li.menu-item-mega > div.menu-item-mega-container,
	{$rule}.post.cmsms_masonry_type.format-status .cmsms_post_cont .cmsms_post_cont_info:before, 
	{$rule}.post.cmsms_masonry_type.format-aside .cmsms_post_cont .cmsms_post_cont_info:before,
	{$rule}.post.cmsms_timeline_type.format-aside .cmsms_post_cont .cmsms_post_cont_info:before, 
	{$rule}.post.cmsms_timeline_type.format-status .cmsms_post_cont .cmsms_post_cont_info:before,
	{$rule}.post.cmsms_masonry_type.format-status .cmsms_post_cont .cmsms_post_footer:before, 
	{$rule}.post.cmsms_masonry_type.format-aside .cmsms_post_cont .cmsms_post_footer:before,
	{$rule}.post.cmsms_timeline_type.format-aside .cmsms_post_cont .cmsms_post_footer:before, 
	{$rule}.post.cmsms_timeline_type.format-status .cmsms_post_cont .cmsms_post_footer:before,
	{$rule}.owl-carousel .owl-controls .owl-pagination .owl-page,
	{$rule}.post.cmsms_timeline_type .cmsms_post_cont,
	{$rule}.related_posts .related_posts_content,
	{$rule}.related_posts > ul li > a.current,
	{$rule}.related_posts > ul li > a:hover,
	{$rule}.cmsms_stats.stats_mode_circles .cmsms_stat_wrap .cmsms_stat .cmsms_stat_inner,
	{$rule}.cmsms_post_filter_wrap .cmsms_post_filter .cmsms_post_filter_block .cmsms_post_filter_list li .button,
	{$rule}.cmsms_project_filter_wrap .cmsms_project_filter .cmsms_project_filter_block .cmsms_project_filter_list li .button,
	" . (($scheme == 'default') ? "#slide_top," : '') . "
	{$rule}.quote_grid .quote_image:before,
	{$rule}.cmsms_img.with_caption,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_wrap,
	{$rule}.cmsms_toggles.toggles_mode_accordion .cmsms_toggle_wrap .cmsms_toggle_title > a,
	{$rule}.cmsms_pricing_table .cmsms_pricing_item,
	{$rule}.cmsms_profile.vertical .profile .pl_img .pl_noimg,
	{$rule}.cmsms_img_rollover_wrap .img_placeholder,
	{$rule}.cmsms_notice .notice_close,
	{$rule}.tweet_list li:before,
	{$rule}.cmsms_tabs.lpr .cmsms_tabs_wrap,
	{$rule}.img_placeholder_small,
	{$rule}.cmsms_tabs.lpr .cmsms_tabs_list .cmsms_tabs_list_item.current_tab > a,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_list .cmsms_tabs_list_item.current_tab > a span,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_list .cmsms_tabs_list_item.current_tab > a span:before,
	{$rule}.cmsms_tabs.lpr .cmsms_tabs_list .cmsms_tabs_list_item:hover > a,
	{$rule}.post.cmsms_default_type .cmsms_post_cont,
	{$rule}.post.cmsms_timeline_type .cmsms_post_cont,
	{$rule}.wp-caption {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.post.cmsms_default_type.format-quote .cmsms_post_cont:after {
		" . cmsms_color_css('border-' . (is_rtl() ? 'left' : 'right') . '-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsms_quotes_slider .quote_content:after {
		" . cmsms_color_css('border-top-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}input[type=text],
	{$rule}input[type=number],
	{$rule}input[type=email],
	{$rule}input[type=password],
	{$rule}textarea,
	{$rule}select,
	{$rule}option,
	{$rule}.search_bar_wrap,
	{$rule}.cmsms_table th,
	{$rule}.cmsms_table tfoot td,
	{$rule}pre,
	{$rule}.cmsms_post_filter_wrap,
	{$rule}.cmsms_project_filter_wrap,
	{$rule}.blog.timeline:before,
	{$rule}.related_posts > ul li > a,
	{$rule}.cmsms_wrap_pagination ul li .page-numbers,
	{$rule}.portfolio.opened-article .project .cmsms_project_header,
	{$rule}.cmsms_stats.stats_mode_circles .cmsms_stat_wrap .cmsms_stat canvas,
	{$rule}.cmsms_stats.stats_mode_bars.stats_type_horizontal:before,
	{$rule}.cmsms_icon_list_items.cmsms_color_type_icon .cmsms_icon_list_item .cmsms_icon_list_icon,
	{$rule}.cmsms_icon_list_items.cmsms_icon_list_type_block .cmsms_icon_list_item:before,
	{$rule}.cmsms_profile.vertical .profile:before,
	{$rule}.profiles.opened-article .profile .cmsms_profile_header,
	{$rule}.cmsms_tabs.lpr .cmsms_tabs_list .cmsms_tabs_list_item > a,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_list .cmsms_tabs_list_item > a,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_list .cmsms_tabs_list_item > a > span,
	{$rule}.cmsms_table th {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.post.cmsms_default_type.format-quote .cmsms_post_cont, 
	{$rule}.post.cmsms_masonry_type .cmsms_post_cont, 
	{$rule}.wp-caption, 
	{$rule}.cmsms_img.with_caption,
	{$rule}.post.cmsms_timeline_type .cmsms_post_cont, 
	{$rule}.about_author .about_author_inner, 
	{$rule}.related_posts > ul li > a, 
	{$rule}.related_posts .related_posts_content, 
	{$rule}.related_posts .related_posts_content, 
	{$rule}.commentlist .comment-body, 
	{$rule}.cmsms_quotes_slider .quote_content, 
	{$rule}.cmsms_clients_slider, 
	{$rule}.quote_grid .quote_image:before, 
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_wrap, 
	{$rule}.cmsms_icon_list_items.cmsms_color_type_bg .cmsms_icon_list_item .cmsms_icon_list_icon:after, 
	{$rule}.cmsms_icon_list_items.cmsms_color_type_icon .cmsms_icon_list_item .cmsms_icon_list_icon:after, 
	{$rule}.cmsms_pricing_table .cmsms_pricing_item,
	{$rule}.cmsms_img_rollover_wrap .img_placeholder,
	{$rule}.cmsms_profile.horizontal .profile,
	{$rule}.cmsms_profile.vertical .profile .pl_img .pl_noimg,
	{$rule}.cmsms_quotes_slider .owl-buttons > div,
	{$rule}.cmsms_posts_slider .owl-controls .owl-buttons > div,
	{$rule}.widget_custom_popular_projects_entries .img_placeholder, 
	{$rule}.widget_custom_latest_projects_entries .img_placeholder,
	{$rule}.tweet_list li:before,
	{$rule}.tweet_list li,
	{$rule}.cmsms_tabs.lpr .cmsms_tabs_wrap,
	{$rule}.cmsms_tabs.lpr .cmsms_tabs_list .cmsms_tabs_list_item > a,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_list .cmsms_tabs_list_item > a,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_list .cmsms_tabs_list_item > a >span,
	{$rule}.opened-article .post.format-quote .cmsms_post_cont_wrap .cmsms_post_cont,
	{$rule}.cmsms_tabs.tabs_mode_tab .cmsms_tabs_list .cmsms_tabs_list_item.current_tab > a span,
	{$rule}code {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.cmsms_tabs.tabs_mode_tour .cmsms_tabs_list .cmsms_tabs_list_item:first-child > a,
	{$rule}.cmsms_clients_grid .cmsms_clients_item,
	{$rule}.post.cmsms_masonry_type .cmsms_post_cont figure + .cmsms_post_cont_inner,
	{$rule}.post.cmsms_masonry_type.format-gallery .cmsms_owl_slider + .cmsms_post_cont_inner,
	{$rule}.post.cmsms_masonry_type.format-video .cmsms_video_wrap + .cmsms_post_cont_inner,
	{$rule}.post.cmsms_timeline_type .cmsms_post_cont figure + .cmsms_post_cont_inner, 
	{$rule}.post.cmsms_timeline_type.format-gallery .cmsms_owl_slider + .cmsms_post_cont_inner, 
	{$rule}.post.cmsms_timeline_type.format-video .cmsms_video_wrap + .cmsms_post_cont_inner, 
	{$rule}.opened-article .post .cmsms_post_footer, 
	{$rule}.cmsms_quotes_slider .quote_content:before, 
	{$rule}.cmsms_search .cmsms_search_post .cmsms_search_post_cont .cmsms_search_post_footer, 
	{$rule}.post.cmsms_default_type .cmsms_post_cont_info {
		" . cmsms_color_css('border-top-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.cmsms_toggles.toggles_mode_toggle .cmsms_toggle_wrap.current_toggle .cmsms_toggle_title,
	{$rule}hr,
	{$rule}.widget .widgettitle,
	{$rule}.cmsms_divider,
	{$rule}.cmsms_widget_divider,
	{$rule}.cmsms_tabs.tabs_mode_tour .cmsms_tabs_list .cmsms_tabs_list_item:last-child > a, 
	{$rule}.cmsms_clients_grid .cmsms_clients_item,
	{$rule}.quote_grid .quotes_list,
	{$rule}.portfolio.opened-article .project .project_sidebar .project_details .project_details_title {
		" . cmsms_color_css('border-bottom-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.cmsms_tabs.tabs_mode_tour .cmsms_tabs_list .cmsms_tabs_list_item > a, 
	{$rule}.cmsms_clients_grid .cmsms_clients_item:last-child, 
	{$rule}.cmsms_clients_grid.clients_two .cmsms_clients_item:nth-child(2n), 
	{$rule}.cmsms_clients_grid.clients_three .cmsms_clients_item:nth-child(3n), 
	{$rule}.cmsms_clients_grid.clients_four .cmsms_clients_item:nth-child(4n), 
	{$rule}.cmsms_clients_grid.clients_five .cmsms_clients_item:nth-child(5n) {
		" . cmsms_color_css('border-right-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.post.cmsms_default_type.format-quote .cmsms_post_cont:before,
	{$rule}.sidebar.fl .widget_nav_menu ul li > a {
		" . cmsms_color_css('border-' . (is_rtl() ? 'left' : 'right') . '-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.cmsms_tabs.tabs_mode_tour .cmsms_tabs_list .cmsms_tabs_list_item > a, 
	{$rule}.quote_grid.quote_four:after, 
	{$rule}.quote_grid.quote_four:before, 
	{$rule}.quote_grid.quote_three:before,
	{$rule}.quote_grid .quote_vert,
	{$rule}.widget_nav_menu ul li > a,
	{$rule}.cmsms_clients_grid.clients_two .cmsms_clients_item:nth-child(2n+1), 
	{$rule}.cmsms_clients_grid.clients_three .cmsms_clients_item:nth-child(3n+1), 
	{$rule}.cmsms_clients_grid.clients_four .cmsms_clients_item:nth-child(4n+1), 
	{$rule}.cmsms_clients_grid.clients_five .cmsms_clients_item:nth-child(5n+1) {
		" . cmsms_color_css('border-left-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.widget_nav_menu ul li > a {
		" . cmsms_color_css('border-' . (is_rtl() ? 'right' : 'left') . '-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	@media only screen and (max-width: 767px) {
		{$rule}html #page .quote_grid.quote_two .quotes_list .cmsms_quote {
			" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
		}
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	
	{$rule}ul li:before, 
	{$rule}.cmsms_prev_arrow:before,
	{$rule}.cmsms_next_arrow:before, 
	{$rule}.cmsmsLike:before, 
	{$rule}.cmsms_search_post_comments:before, 
	{$rule}.cmsms_slider_post_comments:before, 
	{$rule}.cmsms_project_comments:before, 
	{$rule}.cmsms_slider_project_comments:before, 
	{$rule}.cmsms_profile_comments:before,
	{$rule}.cmsms_clients_slider .owl-buttons > div.owl-prev .cmsms_prev_arrow:before,
	{$rule}.cmsms_clients_slider .owl-buttons > div.owl-next .cmsms_next_arrow:before,
	{$rule}.cmsms_quotes_slider .owl-buttons .cmsms_prev_arrow:before,
	{$rule}.cmsms_quotes_slider .owl-buttons .cmsms_next_arrow:before,
	{$rule}.cmsms_posts_slider .owl-controls .owl-buttons .cmsms_next_arrow:before,
	{$rule}.cmsms_posts_slider .owl-controls .owl-buttons .cmsms_prev_arrow:before,
	{$rule}.cmsms_notice .notice_close:before,
	{$rule}.widget_custom_popular_projects_entries .owl-buttons > div .cmsms_prev_arrow:before,
	{$rule}.widget_custom_popular_projects_entries .owl-buttons > div .cmsms_next_arrow:before,
	{$rule}.widget_custom_latest_projects_entries .owl-buttons > div .cmsms_prev_arrow:before,
	{$rule}.widget_custom_latest_projects_entries .owl-buttons > div .cmsms_next_arrow:before,
	{$rule}.widget_custom_popular_projects_entries .owl-buttons:before,
	{$rule}.widget_custom_latest_projects_entries .owl-buttons:before,
	{$rule}.img_placeholder_small:before,
	{$rule}.cmsms_post_comments:before {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsms_sitemap_wrap .cmsms_sitemap > li:before,
	{$rule}.post.cmsms_default_type.format-chat .cmsms_post_cont .cmsms_chat .cmsms_chat_text:before,
	{$rule}.cmsms_icon_list_items.cmsms_color_type_border .cmsms_icon_list_item .cmsms_icon_list_icon,
	{$rule}.cmsms_clients_slider.owl-carousel .owl-controls .owl-pagination .owl-page,
	{$rule}.post.cmsms_timeline_type:before {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsms_icon_list_items.cmsms_color_type_icon .cmsms_icon_list_item .cmsms_icon_list_icon:after,
	{$rule}.cmsms_toggles.toggles_mode_accordion .cmsms_toggle_title > a,
	{$rule}.cmsms_post_filter_wrap .cmsms_post_filter .cmsms_post_filter_block .cmsms_post_filter_list li .button,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type='checkbox'] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsms-form-builder .check_parent input[type='checkbox'] + label:before,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type='radio'] + span.wpcf7-list-item-label:before,
	{$rule}.cmsms-form-builder .check_parent input[type='radio'] + label:before,
	{$rule}input[type=text],
	{$rule}input[type=email],
	{$rule}input[type=password],
	{$rule}textarea,
	{$rule}select,
	{$rule}option,
	{$rule}fieldset,
	{$rule}.img_placeholder_small,
	{$rule}.cmsms_notice .notice_close,
	{$rule}.cmsms_project_filter_wrap .cmsms_project_filter .cmsms_project_filter_block .cmsms_project_filter_list li .button,
	" . (($scheme == 'default') ? "#slide_top," : '') . "
	{$rule}.search_bar_wrap {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.widget_archive ul li, 
	{$rule}.widget_recent_comments ul li, 
	{$rule}.widget_recent_entries ul li, 
	{$rule}.widget_meta ul li, 
	{$rule}.widget_categories ul li, 
	{$rule}.widget_pages ul li,
	{$rule}.cmsms_tabs.tabs_mode_tour .cmsms_tabs_list .cmsms_tabs_list_item > a,
	{$rule}.cmsms_table tr:first-child, 
	{$rule}.post_nav, 
	{$rule}.widget_nav_menu ul li > a, 
	{$rule}.cmsms_pricing_table .cmsms_pricing_item .cmsms_price_wrap:after,
	{$rule}.cmsms_pricing_table .cmsms_pricing_item .cmsms_price_wrap:before,
	{$rule}.post.cmsms_timeline_type .cmsms_post_cont .cmsms_post_footer, 
	{$rule}.post.cmsms_masonry_type .cmsms_post_cont .cmsms_post_footer {
		" . cmsms_color_css('border-top-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.portfolio.opened-article .project .project_sidebar .project_details .project_details_item, 
	{$rule}.post.cmsms_default_type .cmsms_post_cont_info,
	{$rule}.post.cmsms_masonry_type.format-quote .cmsms_post_cont .cmsms_post_cont_info,
	{$rule}.post.cmsms_timeline_type.format-quote .cmsms_post_cont .cmsms_post_cont_info,
	{$rule}.opened-article .post .cmsms_post_footer,
	{$rule}.post_nav,
	{$rule}.cmsms_toggles.toggles_mode_toggle .cmsms_toggle_wrap .cmsms_toggle_title,
	{$rule}.cmsms_heading_divider,
	{$rule}.profiles.opened-article .profile .profile_sidebar .profile_details .profile_details_item,
	{$rule}.profiles.opened-article .profile .profile_sidebar .profile_features .profile_features_item,
	{$rule}.cmsms_table tr th,
	{$rule}.cmsms_table tr td {
		" . cmsms_color_css('border-bottom-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsms_table tr th:first-child,
	{$rule}.cmsms_table tr td:first-child {
		" . cmsms_color_css('border-' . (is_rtl() ? 'right' : 'left') . '-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsms_table tr th:last-child,
	{$rule}.cmsms_table tr td:last-child {
		" . cmsms_color_css('border-' . (is_rtl() ? 'left' : 'right') . '-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.portfolio.small_gap .project .project_outer {
		-webkit-box-shadow:0 0 0 1px rgba(" . hex2rgb($cmsms_bd[0]) . ", " . ((int) $cmsms_bd[1] / 100) . ");
		-moz-box-shadow:0 0 0 1px rgba(" . hex2rgb($cmsms_bd[0]) . ", " . ((int) $cmsms_bd[1] / 100) . ");
		box-shadow:0 0 0 1px rgba(" . hex2rgb($cmsms_bd[0]) . ", " . ((int) $cmsms_bd[1] / 100) . ");
	}
	/* Finish Borders Color */
	
	";
	
	
	if ($scheme == 'default') {
	$cmsms_def_bd = explode('|', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']);
	
	
	$custom_css .= "
	#slide_top:hover {
		border-color:rgba(" . hex2rgb($cmsms_def_bd[0]) . ", 0.5);
	}
	";
	}
	
	
	$custom_css .= "
	/* Finish Custom Rules */

/***************** Finish {$title} Color Scheme Rules ******************/


/***************** Start {$title} Button Color Scheme Rules ******************/
	
	{$rule}.cmsms_button.cmsms_but_bg_hover {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_bg_hover:hover, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_bg_hover {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsms_button.cmsms_but_bg_slide_left, 
	{$rule}.cmsms_button.cmsms_but_bg_slide_right, 
	{$rule}.cmsms_button.cmsms_but_bg_slide_top, 
	{$rule}.cmsms_button.cmsms_but_bg_slide_bottom, 
	{$rule}.cmsms_button.cmsms_but_bg_expand_vert, 
	{$rule}.cmsms_button.cmsms_but_bg_expand_hor, 
	{$rule}.cmsms_button.cmsms_but_bg_expand_diag {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_bg_slide_left:hover, 
	{$rule}.cmsms_button.cmsms_but_bg_slide_right:hover, 
	{$rule}.cmsms_button.cmsms_but_bg_slide_top:hover, 
	{$rule}.cmsms_button.cmsms_but_bg_slide_bottom:hover, 
	{$rule}.cmsms_button.cmsms_but_bg_expand_vert:hover, 
	{$rule}.cmsms_button.cm.sms_but_bg_expand_hor:hover, 
	{$rule}.cmsms_button.cmsms_but_bg_expand_diag:hover, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_bg_slide_left, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_bg_slide_right, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_bg_slide_top, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_bg_slide_bottom, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_bg_expand_vert, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_bg_expand_hor, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_bg_expand_diag {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_bg_slide_left:after, 
	{$rule}.cmsms_button.cmsms_but_bg_slide_right:after, 
	{$rule}.cmsms_button.cmsms_but_bg_slide_top:after, 
	{$rule}.cmsms_button.cmsms_but_bg_slide_bottom:after, 
	{$rule}.cmsms_button.cmsms_but_bg_expand_vert:after, 
	{$rule}.cmsms_button.cmsms_but_bg_expand_hor:after, 
	{$rule}.cmsms_button.cmsms_but_bg_expand_diag:after {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsms_button.cmsms_but_shadow {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_shadow:hover, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_shadow {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsms_button.cmsms_but_icon_dark_bg, 
	{$rule}.cmsms_button.cmsms_but_icon_light_bg, 
	{$rule}.cmsms_button.cmsms_but_icon_divider {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_icon_dark_bg:hover, 
	{$rule}.cmsms_button.cmsms_but_icon_light_bg:hover, 
	{$rule}.cmsms_button.cmsms_but_icon_divider:hover, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_icon_dark_bg, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_icon_light_bg, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_icon_divider {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_icon_divider:after {
		" . cmsms_color_css('border-right-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_icon_inverse {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_icon_inverse:before {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_icon_inverse:after {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_icon_inverse:hover, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_icon_inverse {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_icon_inverse:hover:before, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_icon_inverse:before {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_icon_inverse:hover:after, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_icon_inverse:after {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsms_button.cmsms_but_icon_slide_left, 
	{$rule}.cmsms_button.cmsms_but_icon_slide_right {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_icon_slide_left:hover, 
	{$rule}.cmsms_button.cmsms_but_icon_slide_right:hover, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_icon_slide_left, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_icon_slide_right {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsms_button.cmsms_but_icon_hover_slide_left, 
	{$rule}.cmsms_button.cmsms_but_icon_hover_slide_right, 
	{$rule}.cmsms_button.cmsms_but_icon_hover_slide_top, 
	{$rule}.cmsms_button.cmsms_but_icon_hover_slide_bottom {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsms_button.cmsms_but_icon_hover_slide_left:hover, 
	{$rule}.cmsms_button.cmsms_but_icon_hover_slide_right:hover, 
	{$rule}.cmsms_button.cmsms_but_icon_hover_slide_top:hover, 
	{$rule}.cmsms_button.cmsms_but_icon_hover_slide_bottom:hover, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_icon_hover_slide_left, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_icon_hover_slide_right, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_icon_hover_slide_top, 
	{$rule}.cmsms_paypal_donations > form:hover + .cmsms_button.cmsms_but_icon_hover_slide_bottom {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}

/***************** Finish {$title} Button Color Scheme Rules ******************/


";
	}
	
	
	return $custom_css;
}

