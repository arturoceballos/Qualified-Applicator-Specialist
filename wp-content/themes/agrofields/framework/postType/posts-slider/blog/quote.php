<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Posts Slider Quote Post Format Template
 * Created by CMSMasters
 * 
 */


global $cmsms_post_metadata;


$cmsms_metadata = explode(',', $cmsms_post_metadata);

$date = in_array('date', $cmsms_metadata) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsms_metadata))) ? true : false;
$likes = in_array('likes', $cmsms_metadata) ? true : false;


$cmsms_post_quote_text = get_post_meta(get_the_ID(), 'cmsms_post_quote_text', true);

$cmsms_post_quote_author = get_post_meta(get_the_ID(), 'cmsms_post_quote_author', true);

?>

<!--_________________________ Start Quote Article _________________________ -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cmsms_slider_post_cont">
		<span class="cmsms_post_format_img <?php 
			if (is_sticky()) {
				echo ' cmsms_theme_icon_attach';
			} else {
				echo ' cmsms_theme_icon_quote';
			}
		?>">
			<?php $date ? cmsms_slider_post_date('post') : ''; ?>
		</span>
		<span class="posts_slider_placeholder"></span>
		<div class="cmsms_slider_post_cont_wrap cmsms_post_format_img">
		<?php 
			if (!post_password_required()) {
				echo '<blockquote class="entry-content cmsms_slider_post_quote_content">';
				
					if ($cmsms_post_quote_text != '') {
						echo '<p>' . str_replace("\n", '<br />', $cmsms_post_quote_text) . '</p>';
					} else {
						echo '<p>' . theme_excerpt(20, false) . '</p>';
					}
					
				echo '</blockquote>';
			} else {
				echo '<p>' . esc_html__('There is no excerpt because this is a protected post.', 'cmsmasters') . '</p>';
			}
			
			
			echo '<h1 class="entry-title dn">' . cmsms_title(get_the_ID(), false) . '</h1>';
			
			
			if ($cmsms_post_quote_author != '' && !post_password_required()) {
				echo '<p class="cmsms_slider_post_quote_author">' . $cmsms_post_quote_author . '</p>' . "\n";
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
<!--_________________________ Finish Quote Article _________________________ -->

