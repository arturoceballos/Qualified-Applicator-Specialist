<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Blog Page Masonry Link Post Format Template
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


$cmsms_post_link_text = get_post_meta(get_the_ID(), 'cmsms_post_link_text', true);

$cmsms_post_link_address = get_post_meta(get_the_ID(), 'cmsms_post_link_address', true);

if ($cmsms_post_link_text == '') {
	$cmsms_post_link_text = __('Enter link text', 'cmsmasters');
}

if ($cmsms_post_link_address == '') {
	$cmsms_post_link_address = '#';
}


$post_sort_categs = get_the_terms(0, 'category');

if ($post_sort_categs != '') {
	$post_categs = '';
	
	foreach ($post_sort_categs as $post_sort_categ) {
		$post_categs .= ' ' . $post_sort_categ->slug;
	}
	
	$post_categs = ltrim($post_categs, ' ');
}

?>

<!--_________________________ Start Link Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsms_masonry_type'); ?> data-category="<?php echo $post_categs; ?>">
	<?php cmsms_post_highlight(get_the_ID(), get_post_format()); ?>
	
	<div class="cmsms_post_cont">
		<div class="cmsms_post_cont_inner">
			<span class="cmsms_post_format_img <?php 
				if (is_sticky()) {
					echo ' cmsms_theme_icon_attach';
				} else {
					echo ' cmsms_theme_icon_globe';
				}
			?>"></span>
			<div class="cmsms_post_cont_info_wrap">
				<header class="cmsms_post_header entry-header">
				<?php 
					if (!post_password_required()) {
						echo '<h4 class="cmsms_post_title entry-title">' . 
							'<a href="' . $cmsms_post_link_address . '" target="_blank">' . $cmsms_post_link_text . '</a>' . 
						'</h4>' . 
						'<h6 class="cmsms_post_subtitle">' . $cmsms_post_link_address . '</h6>';
					} else {
						echo '<h4 class="cmsms_post_title entry-title">' . $cmsms_post_link_text . '</h4>';
					}
				?>
				</header>
		<?php
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
			
			$more ? cmsms_post_more(get_the_ID()) : '';
			
		echo '</div>';
			
		if ($date || $likes || $comments) {
			echo '<footer class="cmsms_post_footer entry-meta">';
				
				$date ? cmsms_post_date('page', 'masonry') : '';
			
				$likes ? cmsms_post_like('page') : '';
				
				$comments ? cmsms_post_comments('page') : '';
				
			echo '</footer>';
		}
		?>
	</div>
</article>
<!--_________________________ Finish Link Article _________________________ -->

