<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Blog Page Timeline Video Post Format Template
 * Created by CMSMasters
 * 
 */


global $cmsms_metadata;


$cmsms_post_metadata = explode(',', $cmsms_metadata);

$date = (in_array('date', $cmsms_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsms_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsms_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsms_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsms_post_metadata) || is_home()) ? true : false;
$tags = (get_the_tags() && (in_array('tags', $cmsms_post_metadata) || is_home())) ? true : false;
$more = (in_array('more', $cmsms_post_metadata) || is_home()) ? true : false;


$cmsms_post_video_type = get_post_meta(get_the_ID(), 'cmsms_post_video_type', true);

$cmsms_post_video_link = get_post_meta(get_the_ID(), 'cmsms_post_video_link', true);

$cmsms_post_video_links = get_post_meta(get_the_ID(), 'cmsms_post_video_links', true);

?>

<!--_________________________ Start Video Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsms_timeline_type'); ?>>
	<?php 
		cmsms_post_highlight(get_the_ID(), get_post_format(), 'timeline'); 
		
		$date ? cmsms_post_date('page', 'timeline') : '';
	?>
	<div class="cmsms_post_cont">
		<?php
		if (!post_password_required()) {
			if ($cmsms_post_video_type == 'selfhosted' && !empty($cmsms_post_video_links) && sizeof($cmsms_post_video_links) > 0) {
				$video_size = cmsms_image_thumbnail_list();
				
				
				$attrs = array( 
					'preload'  => 'none', 
					'height'   => $video_size['post-thumbnail']['height'], 
					'width'    => $video_size['post-thumbnail']['width'] 
				);
				
				
				if (has_post_thumbnail()) {
					$video_poster = wp_get_attachment_image_src((int) get_post_thumbnail_id(get_the_ID()), 'post-thumbnail');
					
					
					$attrs['poster'] = $video_poster[0];
				}
				
				
				foreach ($cmsms_post_video_links as $cmsms_post_video_link_url) {
					$attrs[substr(strrchr($cmsms_post_video_link_url, '.'), 1)] = $cmsms_post_video_link_url;
				}
				
				
				echo '<div class="cmsms_video_wrap">' . 
					wp_video_shortcode($attrs) . 
				'</div>';
			} elseif ($cmsms_post_video_type == 'embedded' && $cmsms_post_video_link != '') {
				global $wp_embed;
				
				
				$video_size = cmsms_image_thumbnail_list();
				
				
				echo '<div class="cmsms_video_wrap">' . 
					do_shortcode($wp_embed->run_shortcode('[embed width="' . $video_size['post-thumbnail']['width'] . '" height="' . $video_size['post-thumbnail']['height'] . '"]' . $cmsms_post_video_link . '[/embed]')) . 
				'</div>';
			} elseif (has_post_thumbnail()) {
				cmsms_thumb(get_the_ID(), 'post-thumbnail', true, false, true, false, true, true, false);
			}
		}
		
		echo '<div class="cmsms_post_cont_inner">' . 
			'<span class="cmsms_post_format_img cmsms_theme_icon_videocam"></span>' . 
			'<div class="cmsms_post_cont_info_wrap">';
				
				cmsms_post_heading(get_the_ID(), 'h4');
				
				if ($author || $categories || $tags) {
					echo '<div class="cmsms_post_cont_info entry-meta">';
					
						$author ? cmsms_post_author('page') : '';
						
						$categories ? cmsms_post_category('page') : '';
						
						$tags ? cmsms_post_tags('page') : '';
						
					echo '</div>';
				} 
				
			echo '</div>' . 
			'<div class="cl"></div>';
			
			cmsms_post_exc_cont(); 
			
		echo '</div>';
		
		if ($likes || $comments || $more) {
			echo '<footer class="cmsms_post_footer entry-meta">';
				
				$comments ? cmsms_post_comments('page') : '';
				
				$likes ? cmsms_post_like('page') : '';
				
				$more ? cmsms_post_more(get_the_ID()) : '';
				
			echo '</footer>';
		}
	?>
	</div>
</article>
<!--_________________________ Finish Video Article _________________________ -->

