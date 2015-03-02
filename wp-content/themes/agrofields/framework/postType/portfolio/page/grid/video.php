<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Portfolio Grid Video Project Format Template
 * Created by CMSMasters
 * 
 */


global $cmsms_pj_metadata;


$cmsms_project_metadata = explode(',', $cmsms_pj_metadata);

$title = in_array('title', $cmsms_project_metadata) ? true : false;
$excerpt = in_array('excerpt', $cmsms_project_metadata) ? true : false;
$categories = (get_the_terms(get_the_ID(), 'pj-categs') && in_array('categories', $cmsms_project_metadata)) ? true : false;
$comments = (comments_open() && in_array('comments', $cmsms_project_metadata)) ? true : false;
$likes = in_array('likes', $cmsms_project_metadata) ? true : false;
$rollover = in_array('rollover', $cmsms_project_metadata) ? true : false;

$cmsms_project_link_url = get_post_meta(get_the_ID(), 'cmsms_project_link_url', true);
$cmsms_project_link_redirect = get_post_meta(get_the_ID(), 'cmsms_project_link_redirect', true);


global $cmsms_pj_layout_mode;


$project_thumb_size = (($cmsms_pj_layout_mode == 'masonry') ? 'project-masonry-thumb' : 'project-thumb');

$project_thumb_high = (($cmsms_pj_layout_mode == 'masonry') ? true : false);


$cmsms_project_video_type = get_post_meta(get_the_ID(), 'cmsms_project_video_type', true);

$cmsms_project_video_link = get_post_meta(get_the_ID(), 'cmsms_project_video_link', true);

$cmsms_project_video_links = get_post_meta(get_the_ID(), 'cmsms_project_video_links', true);


$project_sort_categs = get_the_terms(0, 'pj-categs');
$project_categs = '';

if ($project_sort_categs != '') {
	foreach ($project_sort_categs as $project_sort_categ) {
		$project_categs .= ' ' . $project_sort_categ->slug;
	}
	
	$project_categs = ltrim($project_categs, ' ');
}

?>

<!--_________________________ Start Video Project _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); echo (($project_categs != '') ? ' data-category="' . $project_categs . '"' : '') ?>>
	<div class="project_outer">
	<?php 
		cmsms_thumb_rollover(get_the_ID(), $project_thumb_size, $rollover, true, false, false, $cmsms_project_video_type, $cmsms_project_video_link, $cmsms_project_video_links, $project_thumb_high, true, $cmsms_project_link_redirect, $cmsms_project_link_url);
		
		if (!$title) {
			echo '<div class="dn">';
				cmsms_project_heading(get_the_ID(), 'h5');
			echo '</div>';
		}
		
		if ($title || $categories || $excerpt || $likes || $comments) {
			echo '<div class="project_inner">';
			
				if ($likes || $comments) {
					echo '<footer class="cmsms_project_footer entry-meta">';
					
						($likes) ? cmsms_project_like('page') : '';
						
						($comments) ? cmsms_project_comments('page') : '';
						
					echo '</footer>';
				}
			
				($title) ? cmsms_project_heading(get_the_ID(), 'h5', true, $cmsms_project_link_redirect, $cmsms_project_link_url) : '';
				
				if ($categories) {
					echo '<div class="cmsms_project_cont_info entry-meta">';
					
						cmsms_project_category(get_the_ID(), 'pj-categs', 'page');
						
					echo '</div>';
				}
				
				($excerpt) ? cmsms_project_exc_cont() : '';
				
			echo '</div>';
		}
		
		echo '<span class="dn meta-date">' . get_the_time('YmdHis') . '</span>';
	?>
		<div class="cl"></div>
	</div>
</article>
<!--_________________________ Finish Video Project _________________________ -->

