<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Blog Page Default Quote Post Format Template
 * Created by CMSMasters
 * 
 */


global $cmsms_metadata;


$cmsms_post_metadata = explode(',', $cmsms_metadata);

$date = (in_array('date', $cmsms_post_metadata) || is_home() || is_archive() || is_search()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsms_post_metadata) || is_home() || is_archive() || is_search())) ? true : false;
$author = (in_array('author', $cmsms_post_metadata) || is_home() || is_archive() || is_search()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsms_post_metadata) || is_home() || is_archive() || is_search())) ? true : false;
$likes = (in_array('likes', $cmsms_post_metadata) || is_home() || is_archive() || is_search()) ? true : false;
$tags = (get_the_tags() && (in_array('tags', $cmsms_post_metadata) || is_home() || is_archive() || is_search())) ? true : false;


$cmsms_post_quote_text = get_post_meta(get_the_ID(), 'cmsms_post_quote_text', true);

$cmsms_post_quote_author = get_post_meta(get_the_ID(), 'cmsms_post_quote_author', true);

?>

<!--_________________________ Start Quote Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsms_default_type'); ?>>
	<?php cmsms_post_highlight(get_the_ID(), get_post_format()); ?>
	
	<div class="cmsms_post_info entry-meta">
		<span class="cmsms_post_format_img <?php 
			if (is_sticky()) {
				echo ' cmsms_theme_icon_attach';
			} else {
				echo ' cmsms_theme_icon_quote';
			}
		?>"></span>
		
		<?php $date ? cmsms_post_date('page', 'default') : ''; ?>
	</div>
	<div class="cmsms_post_cont_wrap">
		<div class="cmsms_post_cont">
		<?php 
			if (!post_password_required()) {
				echo '<blockquote class="entry-content cmsms_quote_content">';
				
					if ($cmsms_post_quote_text != '') {
						echo '<p>' . str_replace("\n", '<br />', $cmsms_post_quote_text) . '</p>';
					} else {
						echo '<p>' . theme_excerpt(55, false) . '</p>';
					}
					
				echo '</blockquote>';
			} else {
				echo '<p>' . __('There is no excerpt because this is a protected post.', 'cmsmasters') . '</p>';
			}
			
			
			echo '<h1 class="entry-title dn">' . cmsms_title(get_the_ID(), false) . '</h1>';
			
			
			if ($cmsms_post_quote_author != '' || $author || $categories || $tags || $likes || $comments) {
				echo '<div class="cmsms_quote_info">';
				
					if ($cmsms_post_quote_author != '' && !post_password_required()) {
						echo '<p class="cmsms_quote_author">' . $cmsms_post_quote_author . '</p>' . "\n";
					}
					
					if ($likes || $comments || $author || $categories || $tags) {
						echo '<footer class="cmsms_post_footer entry-meta">';
							
							$author ? cmsms_post_author('page') : '';
							
							$categories ? cmsms_post_category('page') : '';
							
							$tags ? cmsms_post_tags('page') : '';
							
							$likes ? cmsms_post_like('page') : '';
							
							$comments ? cmsms_post_comments('page') : '';
								
						echo '</footer>';
					}
				
				echo '</div>';
			}
		?>
		</div>
	</div>
</article>
<!--_________________________ Finish Quote Article _________________________ -->

