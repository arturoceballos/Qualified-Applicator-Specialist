<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Blog Page Timeline Chat Post Format Template
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
 
?>

<!--_________________________ Start Chat Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsms_timeline_type'); ?>>
	<?php 
		cmsms_post_highlight(get_the_ID(), get_post_format(), 'timeline'); 
		
		$date ? cmsms_post_date('page', 'timeline') : '';
	?>
	<div class="cmsms_post_cont">
		<div class="cmsms_post_cont_inner">
			<span class="cmsms_post_format_img cmsms_theme_icon_star"></span>
			<div class="cmsms_post_cont_info_wrap">
		<?php
			echo '<h4 class="entry-title dn">' . cmsms_title(get_the_ID(), false) . '</h4>';
			
			if ($author || $categories || $tags) {
				echo '<div class="cmsms_post_cont_info entry-meta">';
				
					$author ? cmsms_post_author('page') : '';
					
					$categories ? cmsms_post_category('page') : '';
					
					$tags ? cmsms_post_tags('page') : '';
					
				echo '</div>';
			} 
			
			echo '</div>' . 
			'<div class="cl"></div>';
			
			cmsms_post_format_chat();
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
<!--_________________________ Finish Chat Article _________________________ -->

