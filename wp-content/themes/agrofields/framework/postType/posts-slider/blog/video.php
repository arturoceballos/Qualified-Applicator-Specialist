<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Posts Slider Video Post Format Template
 * Created by CMSMasters
 * 
 */


global $cmsms_post_metadata;


$cmsms_metadata = explode(',', $cmsms_post_metadata);

$title = in_array('title', $cmsms_metadata) ? true : false;
$excerpt = in_array('excerpt', $cmsms_metadata) ? true : false;
$date = in_array('date', $cmsms_metadata) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsms_metadata))) ? true : false;
$author = in_array('author', $cmsms_metadata) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsms_metadata))) ? true : false;
$likes = in_array('likes', $cmsms_metadata) ? true : false;


$cmsms_post_video_type = get_post_meta(get_the_ID(), 'cmsms_post_video_type', true);

$cmsms_post_video_link = get_post_meta(get_the_ID(), 'cmsms_post_video_link', true);

$cmsms_post_video_links = get_post_meta(get_the_ID(), 'cmsms_post_video_links', true);

?>

<!--_________________________ Start Video Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cmsms_slider_post_cont">
		<span class="cmsms_post_format_img <?php 
			if (is_sticky()) {
				echo ' cmsms_theme_icon_attach';
			} else {
				echo ' cmsms_theme_icon_videocam';
			}
		?>">
			<?php $date ? cmsms_slider_post_date('post') : ''; ?>
		</span>
	<?php
		if (!post_password_required()) {
			cmsms_thumb_rollover(get_the_ID(), 'post-thumbnail', false, true, true, false, $cmsms_post_video_type, $cmsms_post_video_link, $cmsms_post_video_links, false, true);
		}
		

		echo '<div class="cmsms_slider_post_cont_wrap cmsms_post_format_img">';
		
			$title ? cmsms_slider_post_heading(get_the_ID(), 'post', 'h4') : '';
			
			
			if ($author || $categories) {
				echo '<div class="cmsms_slider_post_cont_info entry-meta">';
				
					$author ? cmsms_slider_post_author('post') : '';
					
					$categories ? cmsms_slider_post_category('post') : '';
					
				echo '</div>';
			}
			
			
			$excerpt ? cmsms_slider_post_exc_cont('post') : '';
			
			
			if ($likes || $comments) {
				echo '<footer class="cmsms_slider_post_footer entry-meta">' . 
					'<div class="cmsms_slider_post_meta_info">';
					
						$comments ? cmsms_slider_post_comments('post') : '';
						
						$likes ? cmsms_slider_post_like('post') : '';
					
					echo '</div>' . 
				'</footer>';
			}
		
		echo '</div>';
	?>
	</div>
</article>
<!--_________________________ Finish Video Article _________________________ -->

