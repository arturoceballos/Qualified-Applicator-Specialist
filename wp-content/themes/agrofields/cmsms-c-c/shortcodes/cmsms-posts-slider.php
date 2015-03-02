<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version 	1.0.0
 * 
 * Content Composer Posts Slider Shortcode
 * Created by CMSMasters
 * 
 */


extract(shortcode_atts($new_atts, $atts));


$unique_id = uniqid();


global $cmsms_post_metadata;

$cmsms_post_metadata = $blog_metadata;


global $cmsms_project_metadata;

$cmsms_project_metadata = $portfolio_metadata;


$args = array( 
	'post_type' => 				$post_type,
	'ignore_sticky_posts' => 	1, 
	'orderby' => 				$orderby, 
	'order' => 					$order, 
	'posts_per_page' => 		$count 
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


if ($query->have_posts()) : 
	
	$out = "<div class=\"cmsms_posts_slider" . 
		(($classes != '') ? ' ' . $classes : '') . 
		(($post_type == 'post') ? ' cmsms_blog_slider' : ' cmsms_portfolio_slider') . 
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
						'"<span class=\"cmsms_prev_arrow\"></span>", ' . 
						'"<span class=\"cmsms_next_arrow\"></span>" ' . 
					"] 
				} );
			} );
		</script>
		<div id=\"cmsms_owl_carousel_{$unique_id}\" class=\"" . 
			'cmsms_owl_slider ' . 
			'cmsms_slider_' . $unique_id . '">';
			
			
			while ($query->have_posts()) : $query->the_post();
				
				if ($post_type == 'post') {
					if (get_post_format() != '') {
						$out .= '<div>' . 
							load_template_part('framework/postType/posts-slider/blog/' . get_post_format()) . 
						'</div>';
					} else {
						$out .= '<div>' . 
							load_template_part('framework/postType/posts-slider/blog/standard') . 
						'</div>';
					}
				} elseif ($post_type == 'project') {
					if (get_post_format() != '') {
						$out .= '<div>' . 
							load_template_part('framework/postType/posts-slider/portfolio/' . get_post_format()) . 
						'</div>';
					} else {
						$out .= '<div>' . 
							load_template_part('framework/postType/posts-slider/portfolio/standard') . 
						'</div>';
					}
				}
				
			endwhile;
			
			
		$out .= '</div>' . 
	'</div>';

endif;


wp_reset_postdata();

wp_reset_query();

