<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Profiles Page Horizontal Profile Format Template
 * Created by CMSMasters
 * 
 */


global $profile_columns;


$columns_num = '';
	
if ($profile_columns == 1) {
	$columns_num = 'one_first';
} elseif ($profile_columns == 2) {
	$columns_num = 'one_half';
} elseif ($profile_columns == 3) {
	$columns_num = 'one_third';
} elseif ($profile_columns == 4) {
	$columns_num = 'one_fourth';
} 

$cmsms_profile_social = get_post_meta(get_the_ID(), 'cmsms_profile_social', true);

$cmsms_profile_subtitle = get_post_meta(get_the_ID(), 'cmsms_profile_subtitle', true);

$cmsms_profile_read_more = get_post_meta(get_the_ID(), 'cmsms_profile_read_more', true);

?>

<!--_________________________ Start Horizontal Profile _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class($columns_num); ?>>
	<?php 
	if (has_post_thumbnail()) {
		echo '<div class="pl_img">' . "\n" . 
			'<figure>' . "\n" . 
				'<a href="' . esc_url(get_permalink()) . '">' . 
					get_the_post_thumbnail(get_the_ID(), 'square-thumb', array( 
						'alt' => cmsms_title(get_the_ID(), false), 
						'title' => cmsms_title(get_the_ID(), false) 
					)) . 
				'</a>' . 
			'</figure>' . "\n";
			
	
			if ($cmsms_profile_social != '') {
				echo '<div class="pl_social">' . "\n" . 
					'<ul class="pl_social_list">' . "\n";
						
						foreach ($cmsms_profile_social as $social_icons) {
							$social_icon = explode('|', str_replace(' ', '', $social_icons));
							
							
							echo '<li>' . "\n\t" . 
								'<a href="' . esc_url($social_icon[1]) . '" class="' . $social_icon[0] . '" title="' . esc_attr($social_icon[2]) . '"' . (($social_icon[3] == 'true') ? ' target="_blank"' : '') . '></a>' . "\r" . 
							'</li>' . "\n";
						}
						
					echo '</ul>' . "\n" . 
				'</div>' . "\n";
			}
			
		echo '</div>' . "\n";
	}
	
	
	echo '<div class="pl_content">' . "\n" . 
		'<h3 class="entry-title">' . "\n" . 
			'<a href="' . esc_url(get_permalink()) . '">' . cmsms_title(get_the_ID(), false) . '</a>' . "\n" . 
		'</h3>' . "\n";
		
		if ($cmsms_profile_subtitle != '') {
			echo '<h6 class="pl_subtitle">' . esc_html($cmsms_profile_subtitle) . '</h6>' . "\n";
		}
		
		echo '<div class="entry-content">' . "\n" . 
			get_the_excerpt() . 
		'</div>' . "\n" . 
	'</div>' . "\n";
	
	
	if ($cmsms_profile_read_more != '') {
		echo '<footer class="cmsms_profile_footer entry-meta">';
		
			cmsms_profile_more(get_the_ID());
			
		echo '</footer>';
	}
	?>
	<div class="cl"></div>
</article>
<!--_________________________ Finish Horizontal Profile _________________________ -->

