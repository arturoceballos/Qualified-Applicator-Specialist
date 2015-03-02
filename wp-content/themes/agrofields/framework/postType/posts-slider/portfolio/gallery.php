<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Posts Slider Gallery Project Format Template
 * Created by CMSMasters
 * 
 */


global $cmsms_project_metadata;


$cmsms_metadata = explode(',', $cmsms_project_metadata);

$title = in_array('title', $cmsms_metadata) ? true : false;
$excerpt = in_array('excerpt', $cmsms_metadata) ? true : false;
$categories = (get_the_terms(get_the_ID(), 'pj-categs') && in_array('categories', $cmsms_metadata)) ? true : false;
$comments = (comments_open() && in_array('comments', $cmsms_metadata)) ? true : false;
$likes = in_array('likes', $cmsms_metadata) ? true : false;

$cmsms_project_link_url = get_post_meta(get_the_ID(), 'cmsms_project_link_url', true);
$cmsms_project_link_redirect = get_post_meta(get_the_ID(), 'cmsms_project_link_redirect', true);


$cmsms_project_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsms_project_images', true))));

?>

<!--_________________________ Start Gallery Project _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="slider_project_outer">
	<?php 
		cmsms_thumb_rollover(get_the_ID(), 'project-thumb', false, true, false, $cmsms_project_images, false, false, false, false, true, $cmsms_project_link_redirect, $cmsms_project_link_url);
		
		
		if ($title || $categories || $excerpt || $likes || $comments) {
			echo '<div class="slider_project_inner">';
				
				if ($likes || $comments) {
					echo '<footer class="cmsms_slider_project_footer entry-meta">';
					
						($likes) ? cmsms_slider_post_like('project') : '';
						
						($comments) ? cmsms_slider_post_comments('project') : '';
						
					echo '</footer>';
				}
				
				echo '<div class="cmsms_slider_project_cont_wrap">';
				
				($title) ? cmsms_slider_post_heading(get_the_ID(), 'project', 'h5', true, $cmsms_project_link_redirect, $cmsms_project_link_url) : '';
				
				if ($categories) {
					echo '<div class="cmsms_slider_project_cont_info entry-meta">';
					
						cmsms_slider_post_category('project', get_the_ID(), 'pj-categs');
						
					echo '</div>';
				}
				
				($excerpt) ? cmsms_slider_post_exc_cont('project') : '';
				
			echo '</div>' . 
			'</div>';
		}
	?>
		<div class="cl"></div>
	</div>
</article>
<!--_________________________ Finish Gallery Project _________________________ -->

