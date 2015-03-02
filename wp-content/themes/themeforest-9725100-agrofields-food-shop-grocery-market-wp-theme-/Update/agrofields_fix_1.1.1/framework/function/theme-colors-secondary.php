<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version 	1.1.0
 * 
 * Theme Secondary Color Schemes Rules
 * Created by CMSMasters
 * 
 */


function cmsms_theme_colors_secondary() {
	$cmsms_option = cmsms_get_global_options();
	
	
	$cmsms_color_schemes = cmsms_color_schemes_list();
	
	
	unset($cmsms_color_schemes['header']);
	
	unset($cmsms_color_schemes['header_top']);
	
	unset($cmsms_color_schemes['header_bottom']);
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version 	1.1.0
 * 
 * Theme Secondary Color Schemes Rules
 * Created by CMSMasters
 * 
 */

";
	
	
	foreach ($cmsms_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsms_color_scheme_{$scheme} " : '');
		
		
		if (class_exists('woocommerce')) {
			$custom_css .= "
/***************** Start {$title} WooCommerce Color Scheme Rules ******************/

	/* Start Stars Font Color */
	{$rule}.comment-form-rating .stars > span a:hover, 
	{$rule}.comment-form-rating .stars > span a.active, 
	{$rule}.cmsms_star_rating .cmsms_star_color_wrap {
		color:#ffc232;
	}
	/* Finish Stars Font Color */
	
	/* Start Main Content Font Color */
	{$rule}.buttons_added, 
	{$rule}.header_mid .widget_shopping_cart_content, 
	{$rule}.header_mid .cmsms_added_product_info, 
	{$rule}.buttons_added .minus, 
	{$rule}.buttons_added .plus, 
	{$rule}.buttons_added .text, 
	{$rule}.shop_table td.product-price, 
	{$rule}.shop_table td.product-price *, 
	{$rule}.checkout #order_review .shop_table tr.cart_item th, 
	{$rule}.checkout #order_review .shop_table tr.cart_item td, 
	{$rule}.shop_table.order_details tr.order_item th, 
	{$rule}.shop_table.order_details tr.order_item td {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.header_mid .cmsms_dynamic_cart a,
	{$rule}.cmsms_products .product .product_outer .product_inner .cmsms_product_info .price, 
	{$rule}.cmsms_single_product .cmsms_product_right_column .price, 
	{$rule}.buttons_added .minus:hover, 
	{$rule}.buttons_added .plus:hover, 
	{$rule}.shop_table td.product-remove .remove:hover, 
	{$rule}.shop_table td.product-name a:hover, 
	{$rule}.shop_table td.product-subtotal, 
	{$rule}.shop_table td.product-subtotal *, 
	{$rule}.cart_totals table .amount, 
	{$rule}.checkout .required, 
	{$rule}.checkout #order_review .shop_table tr.order-total th, 
	{$rule}.checkout #order_review .shop_table tr.order-total td, 
	{$rule}.checkout #order_review .shop_table tr.order-total th *, 
	{$rule}.checkout #order_review .shop_table tr.order-total td *, 
	{$rule}.shop_table.order_details tfoot tr:last-child th, 
	{$rule}.shop_table.order_details tfoot tr:last-child td, 
	{$rule}.shop_table.order_details tfoot tr:last-child th *, 
	{$rule}.shop_table.order_details tfoot tr:last-child td *, 
	{$rule}.product_list_widget li > a:hover, 
	{$rule}.product_list_widget li .amount, 
	{$rule}.widget_shopping_cart .widget_shopping_cart_content .total .amount, 
	{$rule}.cmsms_dynamic_cart .widget_shopping_cart_content .cart_list li .quantity .amount, 
	{$rule}.cmsms_dynamic_cart .widget_shopping_cart_content .total .amount {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsms_products .product .product_outer .product_inner .cmsms_product_footer > a:hover, 
	{$rule}.cmsms_products .product .product_outer .product_inner .cmsms_product_footer > a.added_to_cart, 
	{$rule}.cmsms_products .product .product_outer .product_inner .cmsms_product_footer > a.cmsms_add_to_cart_button.loading, 
	{$rule}.onsale, 
	{$rule}.cmsms_single_product .cmsms_product_right_column .cart .single_add_to_cart_button, 
	{$rule}.shop_table td.actions .button.checkout-button, 
	{$rule}.shipping_calculator .shipping-calculator-form .button, 
	{$rule}#shipping_method input[type=\"checkbox\"] + label:after, 
	{$rule}#ship-to-different-address input[type=\"checkbox\"] + label:after, 
	{$rule}.payment_methods input[type=\"checkbox\"] + label:after, 
	{$rule}#shipping_method input[type=\"radio\"] + label:after, 
	{$rule}#ship-to-different-address input[type=\"radio\"] + label:after, 
	{$rule}.payment_methods input[type=\"radio\"] + label:after, 
	{$rule}.widget_shopping_cart .widget_shopping_cart_content .buttons .button.checkout, 
	{$rule}.widget_price_filter .price_slider_wrapper .price_slider .ui-slider-handle, 
	{$rule}.cmsms_dynamic_cart .widget_shopping_cart_content .buttons .button.checkout {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsms_single_product .cmsms_product_left_column .cmsms_hover_slider .cmsms_hover_slider_thumbs .cmsms_hover_slider_thumb:hover, 
	{$rule}.cmsms_single_product .cmsms_product_left_column .cmsms_hover_slider .cmsms_hover_slider_thumbs .hovered_item .cmsms_hover_slider_thumb {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.header_mid .cmsms_dynamic_cart a:hover,
	{$rule}.cmsms_star_rating .cmsms_star_trans_wrap, 
	{$rule}.comment-form-rating .stars > span, 
	{$rule}.cmsms_products .product .product_outer .product_inner .cmsms_product_info .price del, 
	{$rule}.cmsms_single_product .cmsms_product_right_column .price del, 
	{$rule}.shop_table td.product-remove .remove, 
	{$rule}.product_list_widget li del .amount {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.cmsms_products .product .product_outer .product_inner .cmsms_product_footer > a, 
	{$rule}.cmsms_products .product .product_outer .product_inner .cmsms_product_footer > a.added_to_cart:hover, 
	{$rule}.out-of-stock, 
	{$rule}.shop_table td.actions .button.checkout-button:hover, 
	{$rule}.shipping_calculator .shipping-calculator-form .button:hover, 
	{$rule}.widget_shopping_cart .widget_shopping_cart_content .buttons .button.checkout:hover, 
	{$rule}.cmsms_dynamic_cart .widget_shopping_cart_content .buttons .button.checkout:hover {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.cmsms_single_product .cmsms_woo_tabs .shop_attributes th, 
	{$rule}.shop_table td.product-name, 
	{$rule}.shop_table td.product-name *, 
	{$rule}.cart_totals table tr.cart-subtotal th, 
	{$rule}.cart_totals table tr.order-total th, 
	{$rule}.shipping_calculator > h2 a, 
	{$rule}.shipping_calculator > h2 a:hover, 
	{$rule}.checkout #order_review .shop_table th, 
	{$rule}.checkout #order_review .shop_table td, 
	{$rule}.shop_table.order_details th, 
	{$rule}.shop_table.order_details td, 
	{$rule}ul.order_details li > span, 
	{$rule}.product_list_widget > li > a, 
	{$rule}.cmsms_dynamic_cart .widget_shopping_cart_content .cart_list li > a,
	{$rule}.widget_shopping_cart .widget_shopping_cart_content .total {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsms_single_product .cmsms_product_right_column .cart .single_add_to_cart_button:hover {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.header_mid .cmsms_dynamic_cart .button, 
	{$rule}.header_mid .cmsms_dynamic_cart .button:hover, 
	{$rule}.cmsms_products .product .product_outer .product_inner .cmsms_product_footer > a, 
	{$rule}.cmsms_products .product .product_outer .product_inner .cmsms_product_footer > a:hover, 
	{$rule}.cmsms_products .product .product_outer .product_inner .cmsms_product_footer > a.cmsms_add_to_cart_button.loading:before, 
	{$rule}.onsale, 
	{$rule}.out-of-stock {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsms_woo_wrap_result select, 
	{$rule}.cmsms_woo_wrap_result select option, 
	{$rule}.cmsms_products .product .product_outer .product_inner, 
	{$rule}.buttons_added, 
	{$rule}.shop_table, 
	{$rule}.shop_table td.actions .coupon .input-text, 
	{$rule}.cart_totals table, 
	{$rule}#shipping_method input[type=\"checkbox\"] + label:before, 
	{$rule}#ship-to-different-address input[type=\"checkbox\"] + label:before, 
	{$rule}.payment_methods input[type=\"checkbox\"] + label:before, 
	{$rule}#shipping_method input[type=\"radio\"] + label:before, 
	{$rule}#ship-to-different-address input[type=\"radio\"] + label:before, 
	{$rule}.payment_methods input[type=\"radio\"] + label:before, 
	{$rule}.checkout #order_review .shop_table th,
	{$rule}.checkout #order_review .shop_table td, 
	{$rule}.shop_table.order_details th,
	{$rule}.shop_table.order_details td, 
	{$rule}.checkout #order_review #payment, 
	{$rule}.checkout #order_review #payment .payment_methods .payment_box, 
	{$rule}.widget_price_filter .price_slider_wrapper .price_slider, 
	{$rule}.cmsms_dynamic_cart .widget_shopping_cart_content, 
	{$rule}.cmsms_added_product_info {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.checkout #order_review #payment .payment_methods .payment_box:after, 
	{$rule}.cmsms_dynamic_cart .widget_shopping_cart_content:after, 
	{$rule}.cmsms_added_product_info:after {
		" . cmsms_color_css('border-bottom-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}.alternate_bg_color {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.cmsms_woo_wrap_result, 
	{$rule}.shop_table th, 
	{$rule}.shop_table td.actions, 
	{$rule}.cart_totals table tr.cart-subtotal th, 
	{$rule}.cart_totals table tr.cart-subtotal td, 
	{$rule}.cart_totals table tr.order-total th, 
	{$rule}.cart_totals table tr.order-total td, 
	{$rule}.checkout #order_review .shop_table thead th, 
	{$rule}.checkout #order_review .shop_table tr.cart-subtotal th, 
	{$rule}.checkout #order_review .shop_table tr.cart-subtotal td,
	{$rule}.checkout #order_review .shop_table tr.order-total th, 
	{$rule}.checkout #order_review .shop_table tr.order-total td, 
	{$rule}.shop_table.order_details thead th, 
	{$rule}.shop_table.order_details tfoot tr:last-child th, 
	{$rule}.shop_table.order_details tfoot tr:last-child td, 
	{$rule}ul.order_details li > span, 
	{$rule}.widget_price_filter .price_slider_wrapper .price_slider .ui-slider-range {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.cmsms_products .product .product_outer .product_inner:hover, 
	{$rule}.cmsms_single_product .cmsms_product_left_column > figure, 
	{$rule}.cmsms_single_product .cmsms_product_left_column .cmsms_hover_slider .cmsms_hover_slider_items > li, 
	{$rule}.cmsms_single_product .cmsms_product_left_column .cmsms_hover_slider .cmsms_hover_slider_thumbs .cmsms_hover_slider_thumb, 
	{$rule}.buttons_added, 
	{$rule}.buttons_added .text, 
	{$rule}.cmsms_single_product .cmsms_woo_tabs #reviews #comments .commentlist, 
	{$rule}.woocommerce-error, 
	{$rule}.woocommerce-message, 
	{$rule}.woocommerce-info, 
	{$rule}.checkout #order_review #payment .payment_methods .payment_box, 
	{$rule}.cmsms_dynamic_cart .widget_shopping_cart_content, 
	{$rule}.cmsms_added_product_info {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	@media only screen and (max-width: 1024px) {
		{$rule}.cmsms_products .product .product_outer .product_inner {
			" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
		}
	}
	
	{$rule}.checkout #order_review #payment .payment_methods .payment_box:before, 
	{$rule}.cmsms_dynamic_cart .widget_shopping_cart_content:before, 
	{$rule}.cmsms_added_product_info:before {
		" . cmsms_color_css('border-bottom-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.border_color {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsms_single_product .cmsms_woo_tabs .shop_attributes th, 
	{$rule}.cmsms_single_product .cmsms_woo_tabs .shop_attributes td, 
	{$rule}.cmsms_single_product .cmsms_woo_tabs #reviews #comments .commentlist .comment, 
	{$rule}.shop_table, 
	{$rule}.shop_table th, 
	{$rule}.shop_table td, 
	{$rule}.cart_totals table, 
	{$rule}.cart_totals table tr th, 
	{$rule}.cart_totals table tr td, 
	{$rule}#shipping_method input[type=\"checkbox\"] + label:before, 
	{$rule}#ship-to-different-address input[type=\"checkbox\"] + label:before, 
	{$rule}.payment_methods input[type=\"checkbox\"] + label:before, 
	{$rule}#shipping_method input[type=\"radio\"] + label:before, 
	{$rule}#ship-to-different-address input[type=\"radio\"] + label:before, 
	{$rule}.payment_methods input[type=\"radio\"] + label:before, 
	{$rule}.checkout #order_review #payment, 
	{$rule}ul.order_details, 
	{$rule}ul.order_details li, 
	{$rule}ul.order_details li > span, 
	{$rule}.widget_shopping_cart .widget_shopping_cart_content .cart_list li, 
	{$rule}.product_list_widget li, 
	{$rule}.widget_price_filter .price_slider_wrapper .price_slider, 
	{$rule}.cmsms_dynamic_cart .widget_shopping_cart_content .cart_list li {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */
	
/***************** Finish {$title} WooCommerce Color Scheme Rules ******************/


";
		}
		
		
if (class_exists('TribeEvents')) {
			$custom_css .= "
/***************** Start {$title} Events Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option a, 
	{$rule}#tribe-events-content.tribe-events-single .cmsms_single_event_header .cmsms_single_event_header_left .tribe-events-schedule > h6.tribe-events-cost, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-number .tribe-countdown-under, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events div, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events * {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_color']) . "
	}
	
	
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-date span.list-daynumber {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.tribe-related-event-info .date-start,
	{$rule}.tribe-related-event-info .date-end,
	{$rule}.tribe-events-sub-nav li a:hover:before,
	{$rule}#tribe-events-content.tribe-events-single .cmsms_single_event_header .cmsms_single_event_header_left .tribe-events-schedule > h6, 
	{$rule}#tribe-events-content.tribe-events-single .cmsms_single_event_header .cmsms_single_event_header_right .tribe-events-cal-links a:hover, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-daynum-\"] a:hover, 
	{$rule}.tribe-events-tooltip .entry-title, 
	{$rule}#tribe-events-footer > a:hover, 
	{$rule}#tribe-events-content.tribe-events-list .vevent .cmsms_events_list_event_wrap .cmsms_events_list_event_header .tribe-events-event-cost, 
	{$rule}#tribe-events-content.tribe-events-list .vevent .cmsms_events_list_event_wrap .tribe-events-event-meta .time-details, 
	{$rule}.recurringinfo a:hover, 
	{$rule}#tribe-events-content.tribe-events-list .vevent .cmsms_events_list_event_wrap .tribe-events-event-meta .tribe-events-venue-details a:hover, 
	{$rule}ul.tribe-related-events > li .tribe-related-events-thumbnail .cmsms_events_img_placeholder:hover, 
	{$rule}.tribe-events-venue .cmsms_events_venue_header .cmsms_events_venue_header_right a:hover, 
	{$rule}.tribe-events-organizer .cmsms_events_organizer_header .cmsms_events_organizer_header_right a:hover, 
	{$rule}#tribe-events-content.tribe-events-photo #tribe-events-photo-events .tribe-events-photo-event .tribe-events-photo-event-wrap .tribe-events-event-details .tribe-events-event-meta .time-details, 
	{$rule}#tribe-mobile-container .tribe-mobile-day .tribe-events-mobile .tribe-events-event-body .time-details, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-text a:hover, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name a:hover, 
	{$rule}.widget .vcalendar .vevent .entry-title a:hover, 
	{$rule}.widget .vcalendar .vevent .cmsms_widget_event_info, 
	{$rule}.widget .tribe-events-widget-link a:hover, 
	{$rule}.widget .vcalendar .vevent .cmsms_widget_event_venue_info_loc .cmsms_widget_event_venue_info a:hover, 
	{$rule}.widget .vcalendar .vevent .cmsms_widget_event_venue_info_loc .cmsms_widget_event_venue_loc a, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events:hover *, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info .tribe-mini-calendar-event-venue a:hover {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.tribe-bar-views-open label.button, 
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option a:hover, 
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option.tribe-bar-active a, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-present div[id*=\"tribe-events-daynum-\"], 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header .tribe-grid-content-wrap .column a:hover, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event:hover > div:first-child, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar th.tribe-mini-calendar-dayofweek, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-has-events div .tribe-mini-calendar-day-link:before, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-present, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div .tribe-mini-calendar-nav-link:hover, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-date span.list-dayname {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.tribe-events-sub-nav li a:hover,
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option a:hover, 
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option.tribe-bar-active a {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	@media only screen and (max-width: 767px) {
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-thismonth:hover * {
			" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		}
		
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-thismonth.tribe-events-present {
			" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_link']) . "
		}
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	@media only screen and (max-width: 767px) {
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-has-events:before {
			" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_hover']) . "
		}
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.tribe-events-month-event-title a, 
	{$rule}.tribe-events-month-event-title a:hover, 
	
	{$rule}#tribe-events-content.tribe-events-single .cmsms_single_event_header .cmsms_single_event_header_right .tribe-events-cal-links a, 
	{$rule}#tribe-events-content.tribe-events-single .cmsms_single_event_meta .tribe-events-meta-group .cmsms_event_meta_info .cmsms_event_meta_info_item .cmsms_event_meta_info_item_title, 
	{$rule}#tribe-events-content.tribe-events-single .cmsms_single_event_meta .tribe-events-meta-group .cmsms_event_meta_info .cmsms_event_meta_info_item dt, 
	{$rule}#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-date-filter label, 
	{$rule}#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-search-filter label, 
	{$rule}#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-geoloc-filter label, 
	{$rule}#tribe-events-bar .tribe-bar-filters .tribe-bar-filters-inner .tribe-bar-submit label, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-daynum-\"], 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-daynum-\"] a, 
	{$rule}.tribe-events-tooltip .tribe-events-event-body .duration, 
	{$rule}#tribe-events-footer > a, 
	{$rule}#tribe-events-content.tribe-events-list .tribe-events-list-separator-month, 
	{$rule}#tribe-mobile-container .tribe-mobile-day .tribe-mobile-day-heading, 
	{$rule}#tribe-mobile-container .tribe-mobile-day .tribe-mobile-day-date, 
	{$rule}.recurringinfo a, 
	{$rule}.recurringinfo, 
	{$rule}#tribe-events-content.tribe-events-list .vevent .cmsms_events_list_event_wrap .tribe-events-event-meta .tribe-events-venue-details .author, 
	{$rule}#tribe-events-content.tribe-events-list .vevent .cmsms_events_list_event_wrap .tribe-events-event-meta .tribe-events-venue-details a, 
	{$rule}#tribe-events-content.tribe-events-day .tribe-events-day-time-slot > h5, 
	{$rule}.tribe-events-notices, 
	{$rule}ul.tribe-related-events > li .tribe-related-events-thumbnail .cmsms_events_img_placeholder, 
	{$rule}.tribe-events-venue .cmsms_events_venue_header .cmsms_events_venue_header_right a, 
	{$rule}.tribe-events-organizer .cmsms_events_organizer_header .cmsms_events_organizer_header_right a, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child > .entry-title a, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-text a, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-number, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-timer .tribe-countdown-colon, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-wrapper .tribe-venue-widget-venue .tribe-venue-widget-venue-name a, 
	{$rule}.widget .vcalendar .vevent .entry-title, 
	{$rule}.widget .vcalendar .vevent .entry-title a, 
	{$rule}.widget .tribe-events-widget-link a, 
	{$rule}.widget .vcalendar .vevent .cmsms_widget_event_venue_info_loc .cmsms_widget_event_venue_info a, 
	{$rule}.widget .vcalendar .vevent .cmsms_widget_event_venue_info_loc .cmsms_widget_event_venue_loc a:hover, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info .tribe-mini-calendar-event-venue, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-info .tribe-mini-calendar-event-venue a {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar thead th, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-mini-calendar-today {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	
	@media only screen and (max-width: 767px) {
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-thismonth * {
			" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_color']) . "
		}
	
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-thismonth.mobile-active {
			" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_heading']) . "
		}
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */ 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div .tribe-mini-calendar-nav-link:before,
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option a:hover, 
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option.tribe-bar-active a, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar thead th, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-present div[id*=\"tribe-events-daynum-\"], 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-present div[id*=\"tribe-events-daynum-\"] a, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-present div[id*=\"tribe-events-daynum-\"] a:hover, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header .tribe-grid-content-wrap .column, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-header .tribe-grid-content-wrap .column a, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event:hover > div:first-child a, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .tribe-mini-calendar-nav div, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar th.tribe-mini-calendar-dayofweek, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-present *, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-present:hover *, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-mini-calendar-today *, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-mini-calendar-today:hover *, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-date span.list-dayname, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-list-wrapper .tribe-events-loop .vevent .tribe-mini-calendar-event .list-date span.list-daynumber {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option a,
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner label.button .cmsms_next_arrow, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar, 
	{$rule}.tribe-events-tooltip, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid,  
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-present div .tribe-mini-calendar-day-link:before, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-mini-calendar-today div .tribe-mini-calendar-day-link:before {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner label.button .cmsms_next_arrow:before, 
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner label.button .cmsms_next_arrow:after {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.tribe-events-tooltip:after {
		" . cmsms_color_css('border-top-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.recurringinfo .recurring-info-tooltip:after {
		" . cmsms_color_css('border-bottom-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-body .tribe-events-tooltip:after {
		" . cmsms_color_css('border-right-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-body .tribe-events-right .tribe-events-tooltip:after {
		" . cmsms_color_css('border-left-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	@media only screen and (max-width: 767px) {
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-thismonth.mobile-active *, 
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-thismonth.tribe-events-present * {
			" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
		}
		
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-has-events.mobile-active:before, 
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-present:before {
			" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_bg']) . "
		}
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-daynum-\"], 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-event-\"]:hover, 
	{$rule}#tribe-events-content.tribe-events-list .tribe-events-list-separator-month, 
	{$rule}#tribe-mobile-container .tribe-mobile-day .tribe-mobile-day-heading, 
	{$rule}#tribe-mobile-container .tribe-mobile-day .tribe-mobile-day-date, 
	{$rule}#tribe-events-content.tribe-events-day .tribe-events-day-time-slot > h5, 
	{$rule}.tribe-events-notices, 
	{$rule}ul.tribe-related-events > li .tribe-related-events-thumbnail .cmsms_events_img_placeholder, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-allday, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-grid-wrapper .tribe-grid-body .tribe-week-grid-hours div, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-today, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar .vcalendar td.tribe-events-othermonth {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.tribe-events-sub-nav li a {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	@media only screen and (max-width: 767px) {
		{$rule}#main #tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td.tribe-events-thismonth {
			" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_alternate']) . "
		}
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.tribe-events-sub-nav li a:before,
	{$rule}.bd_font_color {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}#tribe-events-bar #tribe-bar-views .tribe-bar-views-inner ul.tribe-bar-views-list li.tribe-bar-views-option a,
	
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-event > div:first-child,
	{$rule}#tribe-events-content.tribe-events-single .cmsms_single_event_header, 
	{$rule}#tribe-events-content.tribe-events-single .cmsms_single_event_meta .tribe-events-meta-group .cmsms_event_meta_info .cmsms_event_meta_info_item, 
	{$rule}.tribe-bar-filters, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td div[id*=\"tribe-events-daynum-\"], 
	{$rule}.tribe-events-tooltip, 
	{$rule}#tribe-events-content.tribe-events-list .vevent, 
	{$rule}.tribe-events-notices, 
	{$rule}#tribe-events-content.tribe-events-month table.tribe-events-calendar tbody td .tribe-events-viewmore, 
	{$rule}.tribe-events-venue .cmsms_events_venue_header, 
	{$rule}.tribe-events-organizer .cmsms_events_organizer_header, 
	{$rule}.tribe-events-photo #tribe-events-header, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .slimScrollDiv, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-content-wrap .column, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-allday, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-grid-wrapper .tribe-week-grid-outer-wrap .tribe-week-grid-inner-wrap .tribe-week-grid-block div, 
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-week-grid-wrapper .tribe-grid-body .tribe-week-grid-hours div, 
	{$rule}#tribe-mobile-container .tribe-mobile-day .tribe-events-mobile, 
	{$rule}.widget .vcalendar .vevent, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar th, 
	{$rule}.widget.tribe_mini_calendar_widget .tribe-mini-calendar-wrapper .tribe-mini-calendar-grid-wrapper .tribe-mini-calendar td {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.tribe-events-tooltip:before {
		" . cmsms_color_css('border-top-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.recurringinfo .recurring-info-tooltip:before {
		" . cmsms_color_css('border-bottom-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-body .tribe-events-tooltip:before {
		" . cmsms_color_css('border-right-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}#tribe-events-content.tribe-events-week-grid .tribe-events-grid .tribe-grid-body .tribe-events-right .tribe-events-tooltip:before {
		" . cmsms_color_css('border-left-color', $cmsms_option[CMSMS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */

/***************** Finish {$title} Events Color Scheme Rules ******************/


";
		}
		
	}
	
	
	$cmsms_header_bg = explode('|', $cmsms_option[CMSMS_SHORTNAME . '_header_bg']);
	
	
	$cmsms_header_bottom_bg = explode('|', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_bg']);
	
	$cmsms_header_bottom_dropdown_bg = explode('|', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_bg']);
	
	
	$cmsms_header_top_bd = explode('|', $cmsms_option[CMSMS_SHORTNAME . '_header_top_border']);
	
	$cmsms_header_top_dropdown_bg = explode('|', $cmsms_option[CMSMS_SHORTNAME . '_header_top_dropdown_bg']);
	
	
	$custom_css .= "
/***************** Start Header Color Scheme Rules ******************/

	/* Start Header Content Color */
	.header_mid {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_color']) . "
	}
	/* Finish Header Content Color */
	
	/* Start Header Primary Color */
	.header_mid a {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_link']) . "
	}
	
	.header_mid .search_wrap .search_wrap_inner .search_wrap_in_inner .search_but,
	.header_mid .search_wrap .search_wrap_inner .search_wrap_in_inner .search_bar_wrap,
	.header_mid .social_mid .social_mid_inner .social_but_wrap .social_but,
	.header_mid .cmsms_dynamic_cart .cmsms_dynamic_cart_button {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_link']) . "
	}
	/* Finish Header Primary Color */
	
	
	/* Start Header Rollover Color */
	.header_mid a:hover {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_hover']) . "
	}
	
	.header_mid .search_wrap .search_wrap_inner .search_wrap_in_inner .search_but,
	.header_mid .social_mid .social_mid_inner .social_but_wrap .social_but,
	.header_mid .cmsms_dynamic_cart .cmsms_dynamic_cart_button, {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_hover']) . "
	}
	/* Finish Header Rollover Color */
	
	
	/* Start Header Icons Color */
	.header_mid .search_wrap .search_wrap_inner .search_wrap_in_inner .search_bar_wrap input[type='text'],
	.header_mid .search_wrap .search_wrap_inner .search_wrap_in_inner .search_but:before,
	.header_mid .social_mid .social_mid_inner .social_but_wrap .social_but:before,
	.header_mid .cmsms_dynamic_cart .cmsms_dynamic_cart_button:before {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_icons']) . "
	}
	/* Finish Header Icons Color */
	
	
	/* Start Header Background Color */	
	.header_mid_outer {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bg']) . "
	}
	/* Finish Header Background Color */
	";
	
	
	$custom_css .= "
	/* Finish Header Custom Rules */

/***************** Finish Header Color Scheme Rules ******************/



/***************** Start Header Top Color Scheme Rules ******************/

	/* Start Header Top Content Color */
	.header_top,
	.header_top_outer .meta_wrap, 
	.header_top_inner .social_wrap a {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_color']) . "
	}
	/* Finish Header Top Content Color */
	
	
	/* Start Header Top Primary Color */
	.header_top a,
	.header_top .color_2,
	.header_top_outer nav > div > ul > li a,
	.header_top_outer .meta_wrap a,
	.header_top h1,
	.header_top h2,
	.header_top h3,
	.header_top h4,
	.header_top h5,
	.header_top h6,
	.header_top h1 a,
	.header_top h2 a,
	.header_top h3 a,
	.header_top h4 a,
	.header_top h5 a,
	.header_top h6 a,
	.header_top h1 a:hover,
	.header_top h2 a:hover,
	.header_top h3 a:hover,
	.header_top h4 a:hover,
	.header_top h5 a:hover,
	.header_top h6 a:hover,
	.header_top .search_bar_wrap button[type=submit][class^=\"cmsms-icon-\"],
	.header_top .search_bar_wrap button[type=submit][class*=\" cmsms-icon-\"], 
	.header_top .search_bar_wrap button[type=submit][class^=\"cmsms_theme_icon_\"],
	.header_top .search_bar_wrap button[type=submit][class*=\" cmsms_theme_icon_\"] {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_link']) . "
	}
	
	/* @media only screen and (max-width: 1024px) {
		html #page #header .header_top .header_top_outer .header_top_inner .header_top_right .nav_wrap nav #top_line_nav li > a {
			" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_link']) . "
		}
	} */
	
	.header_top .cmsms_button,
	.header_top .button:hover,
	.header_top_outer nav > div > ul > li > a > span.cmsms_count,
	.header_top .button {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_link']) . "
	}
	
	.header_top input[type=text]:focus,
	.header_top input[type=number]:focus,
	.header_top input[type=email]:focus,
	.header_top input[type=password]:focus,
	.header_top textarea:focus {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_link']) . "
	}
	/* Finish Header Top Primary Color */
	
	
	/* Start Header Top Rollover Color */
	.header_top a:hover,
	.header_top_outer nav > div > ul > li:hover > a,
	.header_top_outer nav > div > ul > li.current-menu-item > a,
	.header_top_outer nav > div > ul > li.current-menu-ancestor > a,
	.header_top_outer .meta_wrap a:hover, 
	.header_top_inner .social_wrap a:hover {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_hover']) . "
	}
	/* Finish Header Top Rollover Color */
	
	
	/* Start Header Top Background Color */
	.header_top_outer nav > div > ul > li > a > span.cmsms_count,
	.header_top .cmsms_button,
	.header_top .cmsms_button:hover {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_bg']) . "
	}
	
	.header_top,
	.header_top input[type=text]:focus,
	.header_top input[type=number]:focus,
	.header_top input[type=email]:focus,
	.header_top input[type=password]:focus,
	.header_top textarea:focus,
	.header_top_outer {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_bg']) . "
	}
	/* Finish Header Top Background Color */
	
	
	/* Start Header Top Borders Color */
	.header_top input[type=text],
	.header_top input[type=number],
	.header_top input[type=email],
	.header_top input[type=password],
	.header_top input[type=submit],
	.header_top button,
	.header_top textarea,
	.header_top select,
	.header_top option {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_border']) . "
	}
	
	.header_top hr,
	.header_top .cmsms_divider {
		" . cmsms_color_css('border-bottom-color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_border']) . "
	}
	/* Finish Header Top Borders Color */
	
	
	/* Start Header Top Dropdown Link Color */
	.header_top_outer nav > div > ul > li ul li > a,
	.header_top .button,
	.header_top .button:hover {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_dropdown_link']) . "
	}
	/* Finish Header Top Dropdown Link Color */
	
	
	/* Start Header Top Dropdown Rollover Color */
	.header_top_outer nav > div > ul > li ul li:hover > a,
	.header_top_outer nav > div > ul > li ul li.current-menu-item > a,
	.header_top_outer nav > div > ul > li ul li.current-menu-ancestor > a {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_dropdown_hover']) . "
	}
	/* Finish Header Top Dropdown Rollover Color */
	
	
	/* Start Header Top Dropdown Background Color */
	.header_top input[type=text],
	.header_top input[type=number],
	.header_top input[type=email],
	.header_top input[type=password],
	.header_top input[type=submit],
	.header_top button,
	.header_top textarea,
	.header_top select,
	.header_top option,
	.header_top_outer nav > div > ul > li ul,
	.header_top .search_bar_wrap,
	.header_top .search_bar_wrap input[type=text],
	.header_top .search_bar_wrap input[type=text]:focus {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_dropdown_bg']) . "
	}
	/* Finish Header Top Dropdown Background Color */
	
	
	/* Start Header Top Dropdown Border Color */
	
	.header_top_outer nav > div > ul > li.menu-item-has-children > a:before {
		" . cmsms_color_css('border-bottom-color', $cmsms_option[CMSMS_SHORTNAME . '_header_top_dropdown_border']) . "
	}
	/* Finish Header Top Dropdown Border Color */
	
	
	/* Start Header Top Custom Rules */
	";
	
	
	if ($cmsms_option[CMSMS_SHORTNAME . '_header_top_dropdown_shadow']) {
	$custom_css .= "
	.header_top_outer nav > div > ul > li ul {
		-webkit-box-shadow:0 0 3px rgba(0, 0, 0, " . ((int) $cmsms_option[CMSMS_SHORTNAME . '_header_top_dropdown_shadow_opacity'] / 100) . ");
		-moz-box-shadow:0 0 3px rgba(0, 0, 0, " . ((int) $cmsms_option[CMSMS_SHORTNAME . '_header_top_dropdown_shadow_opacity'] / 100) . ");
		box-shadow:0 0 3px rgba(0, 0, 0, " . ((int) $cmsms_option[CMSMS_SHORTNAME . '_header_top_dropdown_shadow_opacity'] / 100) . ");
	}
	";
	}
	
	
	$custom_css .= "
	/* Finish Header Top Custom Rules */

/***************** Finish Header Top Color Scheme Rules ******************/



/***************** Start Header Bottom Color Scheme Rules ******************/
	
	@media only screen and (max-width: 1024px) {
		.header_top,
		.header_mid,
		#header .search_wrap .search_wrap_inner .search_wrap_in_inner .search_bar_wrap input[type='text'],
		.header_top_outer .meta_wrap {
			" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_color']) . "
		}
		
		html #header .header_bot #navigation > li.current-menu-ancestor > a > span, 
		html #header .header_bot #navigation > li.current-menu-item > a > span, 
		html #header .header_bot #navigation > li.menu-item-highlight > a > span,
		html #header .header_bot #navigation > li.current-menu-ancestor > a > span .nav_subtitle, 
		html #header .header_bot #navigation > li.current-menu-item > a > span .nav_subtitle, 
		html #header .header_bot #navigation > li.menu-item-highlight > a > span .nav_subtitle,
		.header_mid .search_wrap .search_wrap_inner .search_wrap_in_inner .search_but:before, 
		.header_mid .social_mid .social_mid_inner .social_but_wrap .social_but:before, 
		.header_mid .cmsms_dynamic_cart .cmsms_dynamic_cart_button:before,
		.responsive_nav:before,
		.header_top .header_top_outer .header_top_inner .header_top_right .nav_wrap .responsive_top_nav,
		.header_top .header_top_outer .header_top_inner .header_top_right .nav_wrap .responsive_top_nav:hover, 
		.header_top .header_top_outer .header_top_inner .header_top_right .nav_wrap .responsive_top_nav.active {
			" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_bg']) . "
		}
		
		.header_top,
		.header_mid {
			" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_bg']) . "
		}
		
		.header_mid a,
		.header_top a,
		.header_top .color_2,
		.header_top_outer nav > div > ul > li a,
		.header_top_outer .meta_wrap a,
		.header_top h1,
		.header_top h2,
		.header_top h3,
		.header_top h4,
		.header_top h5,
		.header_top h6,
		.header_top h1 a,
		.header_top h2 a,
		.header_top h3 a,
		.header_top h4 a,
		.header_top h5 a,
		.header_top h6 a,
		.header_top h1 a:hover,
		.header_top h2 a:hover,
		.header_top h3 a:hover,
		.header_top h4 a:hover,
		.header_top h5 a:hover,
		.header_top h6 a:hover,
		.header_top .search_bar_wrap button[type=submit][class^=\"cmsms-icon-\"],
		.header_top .search_bar_wrap button[type=submit][class*=\" cmsms-icon-\"], 
		.header_top .search_bar_wrap button[type=submit][class^=\"cmsms_theme_icon_\"],
		.header_top .search_bar_wrap button[type=submit][class*=\" cmsms_theme_icon_\"] {
			" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_link']) . "
		}
		
		.header_top a:hover,
		.header_top_outer nav > div > ul > li:hover > a,
		.header_top_outer nav > div > ul > li.current-menu-item > a,
		.header_top_outer nav > div > ul > li.current-menu-ancestor > a,
		.header_top_outer .meta_wrap a:hover, 
		#header .header_mid .social_mid .social_mid_inner .social_wrap .social_wrap_inner ul li a:hover,
		.header_top_inner .social_wrap a:hover {
			" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_hover']) . "
		}
		
		#header .header_mid .social_mid .social_mid_inner .social_wrap .social_wrap_inner ul li a,
		.header_top_inner .social_wrap a {
			" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_border']) . "
		}
		
		#header nav > div > ul#navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li,
		.header_bot nav #navigation li,
		#header nav > div > ul#navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li > ul > li:first-child,
		.header_top .header_top_outer .header_top_inner .header_top_right .nav_wrap nav #top_line_nav li a {
			" . cmsms_color_css('border-top-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_border']) . "
		}
		
		.header_top .header_top_outer .header_top_inner .header_top_right,
		.header_top .header_top_outer .header_top_inner .header_top_left,
		.header_top .header_top_but {
			" . cmsms_color_css('border-bottom-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_border']) . "
		}
		
		.header_mid .search_wrap .search_wrap_inner .search_wrap_in_inner .search_but, 
		.header_mid .search_wrap .search_wrap_inner .search_wrap_in_inner .search_bar_wrap, 
		.header_mid .social_mid .social_mid_inner .social_but_wrap .social_but, 
		.header_mid .cmsms_dynamic_cart .cmsms_dynamic_cart_button,
		.responsive_nav,
		.header_top .header_top_outer .header_top_inner .header_top_right .nav_wrap .responsive_top_nav {
			" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_border']) . "
		}
		
		.responsive_nav:hover,
		.responsive_nav.active,
		.header_top .header_top_outer .header_top_inner .header_top_right .nav_wrap .responsive_top_nav:hover, 
		.header_top .header_top_outer .header_top_inner .header_top_right .nav_wrap .responsive_top_nav.active {
			" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_hover']) . "
		}
	}
	
	/* Start Header Bottom Content Color */
	.header_bot {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_color']) . "
	}
	/* Finish Header Bottom Content Color */
	
	
	/* Start Header Bottom Primary Color */
	.header_bot a,
	.header_bot h1 a:hover,
	.header_bot h2 a:hover,
	.header_bot h3 a:hover,
	.header_bot h4 a:hover,
	.header_bot h5 a:hover,
	.header_bot h6 a:hover,
	.header_bot .color_2,
	.header_bot h1,
	.header_bot h2,
	.header_bot h3,
	.header_bot h4,
	.header_bot h5,
	.header_bot h6,
	.header_bot h1 a,
	.header_bot h2 a,
	.header_bot h3 a,
	.header_bot h4 a,
	.header_bot h5 a,
	.header_bot h6 a,
	.header_bot #navigation > li > a span,
	.header_bot .search_bar_wrap button[type=submit][class^=\"cmsms-icon-\"],
	.header_bot .search_bar_wrap button[type=submit][class*=\" cmsms-icon-\"], 
	.header_bot .search_bar_wrap button[type=submit][class^=\"cmsms_theme_icon_\"],
	.header_bot .search_bar_wrap button[type=submit][class*=\" cmsms_theme_icon_\"] {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_link']) . "
	}
	
	.header_bot .cmsms_button,
	.header_bot .responsive_nav,
	.header_bot .button:hover,
	.header_bot .button,
	.header_bot #navigation > li > a[data-tag]:before {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_link']) . "
	}
	/* Finish Header Bottom Primary Color */
	
	
	/* Start Header Bottom Rollover Color */
	.header_bot a:hover,
	#header .header_bot #navigation > li.current-menu-item:hover > a > span,
	#header .header_bot #navigation > li.current-menu-ancestor:hover > a > span,
	.header_bot #navigation > li:hover > a > span,
	.header_bot #navigation > li.menu-item-highlight > a > span,
	.header_bot #navigation > li.menu-item-highlight > a > span > span.nav_subtitle {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_hover']) . "
	}
	
	@media only screen and (min-width: 1024px) {
		.header_bot #navigation > li:hover > a > span,
		.header_bot #navigation > li:hover > a > span > span.nav_subtitle {
			" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_hover']) . "
		}
	}
	
	.header_bot #navigation > li > a[data-tag]:hover:before, 
	.header_bot #navigation > li.current-menu-item > a[data-tag]:before,
	.header_bot #navigation > li.current-menu-ancestor > a[data-tag]:before,
	.header_bot #navigation > li.menu-item-highlight > a[data-tag]:before {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_hover']) . "
	}
	
	@media only screen and (min-width: 1024px) {
		.header_bot #navigation > li:hover > a[data-tag]:before {
			" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_hover']) . "
		}
	}
	/* Finish Header Bottom Rollover Color */
	
	
	/* Start Header Bottom Subtitle Color */
	.header_bot #navigation > li > a > span > span.nav_subtitle {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_subtitle']) . "
	}
	/* Finish Header Bottom Subtitle Color */
	
	
	/* Start Header Bottom Background Color */
	.header_bot #navigation > li.current-menu-item > a,
	.header_bot #navigation > li.current-menu-ancestor > a,
	.header_bot_inner #navigation > li.menu-item-highlight > a,
	.header_bot .cmsms_button,
	.header_bot .responsive_nav,
	.header_bot .cmsms_button:hover,
	.header_bot #navigation > li > a[data-tag]:before {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_bg']) . "
	}
	
	.header_bot input[type=text]:focus,
	.header_bot input[type=number]:focus,
	.header_bot input[type=email]:focus,
	.header_bot input[type=password]:focus,
	.header_bot textarea:focus,
	.header_bot .header_bot_outer:before,
	.header_default .header_line_wrap {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_bg']) . "
	}
	/* Finish Header Bottom Background Color */
	
	
	/* Start Header Bottom Rollover Background Color */
	.header_bot #navigation > li.current-menu-item > a,
	.header_bot #navigation > li.current-menu-ancestor > a,
	.header_bot #navigation > li > a[data-tag]:hover:before, 
	.header_bot #navigation > li.current-menu-item > a[data-tag]:before,
	.header_bot #navigation > li.current-menu-ancestor > a[data-tag]:before,
	.header_bot #navigation > li.menu-item-highlight > a[data-tag]:before {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_hover_bg']) . "
	}
	
	@media only screen and (min-width: 1024px) {
		.header_bot #navigation > li:hover > a[data-tag]:before {
			" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_hover_bg']) . "
		}
	}
	
	.header_bot #navigation > li > a > span.nav_bg_hov, 
	.header_bot_inner #navigation > li > a > span.nav_bg_clr,
	.header_bot_inner #navigation > li.menu-item-highlight > a > span.nav_bg_clr {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_hover_bg']) . "
	}
	/* Finish Header Bottom Rollover Background Color */
	
	
	/* Start Header Borders Color */
	.header_bot input[type=text],
	.header_bot input[type=number],
	.header_bot input[type=email],
	.header_bot input[type=password],
	.header_bot input[type=submit],
	.header_bot button,
	.header_bot textarea,
	.header_bot select,
	.header_bot option {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_border']) . "
	}
	
	.header_bot .header_line_wrap,
	.header_bot .header_bot_outer:before,
	.header_bot_outer,
	.header_bot hr,
	.header_bot .cmsms_divider {
		" . cmsms_color_css('border-bottom-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_border']) . "
	}
	/* Finish Header Bottom Borders Color */
	
	
	/* Start Header Bottom Dropdown Link Color */
	.header_bot #navigation ul li a,
	.header_bot .button,
	.header_bot .button:hover {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_link']) . "
	}
	
	.header_bot #navigation ul li > a[data-tag]:before {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_link']) . "
	}
	/* Finish Header Bottom Dropdown Link Color */
	
	
	/* Start Header Bottom Dropdown Rollover Color */
	.header_bot #navigation > li.menu-item-mega li > a:hover,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container > ul li li > a:hover,
	.header_bot #navigation ul li > a:hover,
	.header_bot #navigation > li.menu-item-mega > ul > li > a:hover,
	.header_bot #navigation > li.menu-item-mega li.current-menu-ancestor > a,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container li > a:hover,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container li.current-menu-item > a,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li > a[href]:hover,
	.header_bot #navigation ul li.current-menu-item > a,
	.header_bot #navigation ul li.current-menu-ancestor > a,
	.header_bot #navigation > li.menu-item-mega li li > a:hover,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li > a,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li > a:hover,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container > ul li li:hover > a:hover,
	.header_bot #navigation > li li.menu-item-highlight > a,
	.header_bot #navigation > li li.menu-item-highlight > a:hover,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container li.menu-item-highlight > a,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container li.menu-item-highlight > a:hover,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container li.menu-item-highlight:hover > a:hover {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_hover']) . "
	}
	
	@media only screen and (min-width: 1024px) {
		.header_bot #navigation > li.menu-item-mega li:hover > a,
		.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container > ul li li:hover > a,
		.header_bot #navigation ul li:hover > a,
		.header_bot #navigation > li.menu-item-mega > ul > li:hover > a,
		.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container li:hover > a,
		.header_bot #navigation > li li.menu-item-highlight:hover > a,
		.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container li.menu-item-highlight:hover > a {
			" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_hover']) . "
		}
	}
	
	.header_bot .responsive_nav.active,
	.header_bot .responsive_nav:hover,
	.header_bot #navigation > li:not(.menu-item-mega) ul li > a[data-tag]:hover:before, 
	.header_bot #navigation > li:not(.menu-item-mega) ul li.current-menu-item > a[data-tag]:before,
	.header_bot #navigation > li:not(.menu-item-mega) ul li.current-menu-ancestor > a[data-tag]:before,
	.header_bot #navigation > li.menu-item-mega li li:hover > a[data-tag]:hover:before,
	.header_bot #navigation > li.menu-item-mega li li.current-menu-item > a[data-tag]:before {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_hover']) . "
	}
	
	@media only screen and (min-width: 1024px) {
		.header_bot #navigation > li:not(.menu-item-mega) ul li:hover > a[data-tag]:before {
			" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_hover']) . "
		}
	}
	/* Finish Header Bottom Dropdown Rollover Color */
	
	
	/* Start Header Bottom Dropdown Subtitle Color */
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li > a,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li:hover > a,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li > a:hover > span > span.nav_subtitle,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li > a > span > span.nav_subtitle {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_subtitle']) . "
	}
	
	@media only screen and (min-width: 1024px) {
		.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container > ul > li:hover > a > span > span.nav_subtitle {
			" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_subtitle']) . "
		}
	}
	/* Finish Header Bottom Dropdown Subtitle Color */
	
	
	/* Start Header Bottom Dropdown Background Color */
	.header_bot #navigation ul li > a[data-tag]:before {
		" . cmsms_color_css('color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_bg']) . "
	}
	
	.header_bot input[type=text],
	.header_bot input[type=number],
	.header_bot input[type=email],
	.header_bot input[type=password],
	.header_bot input[type=submit],
	.header_bot button,
	.header_bot textarea,
	.header_bot select,
	.header_bot option,
	.header_bot #navigation ul,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_bg']) . "
	}
	/* Finish Header Bottom Dropdown Background Color */
	
	
	/* Start Header Bottom Dropdown Borders Color */
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container > ul:after {
		" . cmsms_color_css('background-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_border']) . "
	}
	
	.header_bot #navigation ul,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container {
		" . cmsms_color_css('border-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_border']) . "
	}
	
	.header_bot #navigation ul li,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container li li li:first-child {
		" . cmsms_color_css('border-top-color', $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_border']) . "
	}
	/* Finish Header Bottom Dropdown Borders Color */
	
	
	/* Start Header Bottom Custom Rules */
	";
	
	
	if ($cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_shadow']) {
	$custom_css .= "
	.header_bot #navigation ul,
	.header_bot #navigation > li.menu-item-mega > div.menu-item-mega-container {
		-webkit-box-shadow:0 0 3px rgba(0, 0, 0, " . ((int) $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_shadow_opacity'] / 100) . ");
		-moz-box-shadow:0 0 3px rgba(0, 0, 0, " . ((int) $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_shadow_opacity'] / 100) . ");
		box-shadow:0 0 3px rgba(0, 0, 0, " . ((int) $cmsms_option[CMSMS_SHORTNAME . '_header_bottom_dropdown_shadow_opacity'] / 100) . ");
	}
	";
	}
	
	
	$custom_css .= "
	/* Finish Header Bottom Custom Rules */

/***************** Finish Header Bottom Color Scheme Rules ******************/

";
	
	
	return $custom_css;
}

