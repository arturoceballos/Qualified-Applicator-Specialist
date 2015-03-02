<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;


$attachment_ids = $product->get_gallery_attachment_ids();

$image_thumb = get_the_post_thumbnail($post->ID, apply_filters('single_product_large_thumbnail_size', 'shop_single'));


if (sizeof($attachment_ids) > 0) {
	echo '<script type="text/javascript">' . 
		'jQuery(document).ready(function () { ' . 
			'jQuery("#cmsms_hover_slider_' . $post->ID . '").cmsmsHoverSlider( { ' . 
				'sliderBlock : "#cmsms_hover_slider_' . $post->ID . '", ' . 
				'sliderItems : ".cmsms_hover_slider_items", ' . 
				'thumbWidth : "77", ' . 
				'thumbHeight : "77", ' . 
				'activeSlide : 1, ' . 
				'pauseTime : 5000, ' . 
				'pauseOnHover : true ' . 
			'} );' . 
		'} );' . 
	'</script>' . 
	'<div id="cmsms_hover_slider_' . $post->ID . '" class="cmsms_hover_slider">' . "\n" . 
	'<ul class="cmsms_hover_slider_items">' . "\n";
	
	
	if (has_post_thumbnail()) {
		echo '<li>' . 
			'<figure class="cmsms_hover_slider_full_img">' . 
				$image_thumb . 
			'</figure>' . 
		'</li>';
	}
	
	
	foreach ($attachment_ids as $attachment_id) { 
		$image_attach = wp_get_attachment_image($attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single'));
	
		echo '<li>' . 
			'<figure class="cmsms_hover_slider_full_img">' . 
				$image_attach . 
			'</figure>' . 
		'</li>';
	}
	
	
	echo '</ul>' . "\n" . 
	'</div>' . "\n";
} elseif (has_post_thumbnail()) {
	echo '<figure class="preloader">' . 
		$image_thumb . 
	'</figure>';
} else {
	echo '<figure class="preloader">' . 
		'<img src="' . esc_url(wc_placeholder_img_src()) . '" alt="Placeholder" />' . 
	'</figure>';
}

