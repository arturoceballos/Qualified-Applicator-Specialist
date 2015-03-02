<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Posts Slider Status Post Format Template
 * Created by CMSMasters
 * 
 */


global $cmsms_post_metadata;


$cmsms_metadata = explode(',', $cmsms_post_metadata);

$date = in_array('date', $cmsms_metadata) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsms_metadata))) ? true : false;
$likes = in_array('likes', $cmsms_metadata) ? true : false;

 
$cmsms_post_status_text = get_post_meta(get_the_ID(), 'cmsms_post_status_text', true);

?>

<!--_________________________ Start Status Article _________________________ -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cmsms_slider_post_cont">
		<span class="cmsms_post_format_img <?php 
			if (is_sticky()) {
				echo ' cmsms_theme_icon_attach';
			} else {
				echo ' cmsms_theme_icon_user';
			}
		?>">
			<?php $date ? cmsms_slider_post_date('post') : ''; ?>
		</span>
		<span class="posts_slider_placeholder"></span>
		<div class="cmsms_slider_post_cont_wrap cmsms_post_format_img">
		<?php
		if (!post_password_required()) {
			if ($cmsms_post_status_text != '') {
				echo '<div class="cmsms_slider_post_content">' . 
					'<div class="cmsms_slider_post_content_aligner"></div>' . 
					'<div class="entry-title entry-content">' . $cmsms_post_status_text . '</div>' . 
				'</div>';
			} else {
				echo '<div class="cmsms_slider_post_content">' . 
					'<div class="cmsms_slider_post_content_aligner"></div>' . 
					'<div class="entry-title entry-content">' . theme_excerpt(55, false) . '</div>' . 
				'</div>';
			}
		} else {
			echo '<p class="cmsms_slider_post_content">' . esc_html__('There is no excerpt because this is a protected post.', 'cmsmasters') . '</p>';
		}
		
		
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

