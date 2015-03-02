<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Posts Slider Chat Post Format Template
 * Created by CMSMasters
 * 
 */


global $cmsms_post_metadata;


$cmsms_metadata = explode(',', $cmsms_post_metadata);

$title = in_array('title', $cmsms_metadata) ? true : false;
$date = in_array('date', $cmsms_metadata) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsms_metadata))) ? true : false;
$likes = in_array('likes', $cmsms_metadata) ? true : false;

?>

<!--_________________________ Start Chat Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cmsms_slider_post_cont">
		<span class="cmsms_post_format_img <?php 
			if (is_sticky()) {
				echo ' cmsms_theme_icon_attach';
			} else {
				echo ' cmsms_theme_icon_star';
			}
		?>">
			<?php $date ? cmsms_slider_post_date('post') : ''; ?>
		</span>
		<span class="posts_slider_placeholder"></span>
		<div class="cmsms_slider_post_cont_wrap cmsms_post_format_img">
		<?php
			$title ? cmsms_slider_post_heading(get_the_ID(), 'post', 'h4') : '';
			
			cmsms_slider_post_format_chat();
			
			
			echo '<h1 class="entry-title dn">' . cmsms_title(get_the_ID(), false) . '</h1>';
			
			
			if ($likes || $comments) {
				echo '<footer class="cmsms_slider_post_footer entry-meta">' . 
					'<div class="cmsms_slider_post_meta_info">';
					
						$comments ? cmsms_slider_post_comments('post') : '';
						
						$likes ? cmsms_slider_post_like('post') : '';
					
					echo '</div>' . 
				'</footer>';
			}
		?>
		</div>
	</div>
</article>
<!--_________________________ Finish Standard Article _________________________ -->

