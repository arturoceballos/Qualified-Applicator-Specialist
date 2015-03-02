<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Profiles Page Vertical Profile Format Template
 * Created by CMSMasters
 * 
 */


$cmsms_profile_social = get_post_meta(get_the_ID(), 'cmsms_profile_social', true);

$cmsms_profile_subtitle = get_post_meta(get_the_ID(), 'cmsms_profile_subtitle', true);

?>

<!--_________________________ Start Vertical Profile _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	echo '<div class="pl_content_meta">' . "\n" . 
		'<h3 class="entry-title">' . "\n" . 
			'<a href="' . esc_url(get_permalink()) . '">' . cmsms_title(get_the_ID(), false) . '</a>' . "\n" . 
		'</h3>' . "\n";
		
		if ($cmsms_profile_subtitle != '') {
			echo '<h6 class="pl_subtitle">' . esc_html($cmsms_profile_subtitle) . '</h6>' . "\n";
		}
		
		echo '<div class="pl_social">' . "\n";
		
			if ($cmsms_profile_social != '') {
				echo '<ul class="pl_social_list">' . "\n";
				
				foreach ($cmsms_profile_social as $social_icons) {
					$social_icon = explode('|', str_replace(' ', '', $social_icons));
					
					
					echo '<li>' . "\n\t" . 
						'<a href="' . esc_url($social_icon[1]) . '" class="' . $social_icon[0] . '" title="' . esc_attr($social_icon[2]) . '"' . (($social_icon[3] == 'true') ? ' target="_blank"' : '') . '></a>' . "\r" . 
					'</li>' . "\n";
				}
				
				echo '</ul>' . "\n";
			}
			
		echo '</div>' . "\n" . 
	'</div>' . "\n";
	
	
	if (has_post_thumbnail()) {
		echo '<div class="pl_img">' . "\n";
		
		cmsms_thumb_rollover(get_the_ID(), 'square-thumb', true, true, false, false, false, false, false, true, true);
			
		echo '</div>' . "\n";
	} else {
		echo '<div class="pl_img"><a href="' . esc_url(get_permalink()) . '"><div class="pl_noimg cmsms_theme_icon_user"></div></a></div>' . "\n";
	}
	
	echo '<div class="pl_content entry-content">' . "\n" . 
		get_the_excerpt() . 
	'</div>' . "\n";
	?>
	<div class="cl"></div>
</article>
<!--_________________________ Finish Vertical Profile _________________________ -->

