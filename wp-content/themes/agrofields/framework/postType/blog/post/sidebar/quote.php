<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Blog Post with Sidebar Quote Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsms_option = cmsms_get_global_options();


$cmsms_post_quote_text = get_post_meta(get_the_ID(), 'cmsms_post_quote_text', true);

$cmsms_post_quote_author = get_post_meta(get_the_ID(), 'cmsms_post_quote_author', true);

?>

<!--_________________________ Start Quote Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php cmsms_post_highlight(get_the_ID(), get_post_format()); ?>
	
	<span class="cmsms_post_format_img cmsms_theme_icon_quote"></span>
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
				echo '<p>' . esc_html__('There is no excerpt because this is a protected post.', 'cmsmasters') . '</p>';
			}
			?>
			<div class="cmsms_quote_info">
				<?php 	
				if ($cmsms_post_quote_author != '' && !post_password_required()) {
					echo '<p class="cmsms_quote_author">' . $cmsms_post_quote_author . '</p>' . "\n";
				}
				
				
				if (
					$cmsms_option[CMSMS_SHORTNAME . '_blog_post_date'] || 
					$cmsms_option[CMSMS_SHORTNAME . '_blog_post_like'] || 
					$cmsms_option[CMSMS_SHORTNAME . '_blog_post_comment'] || 
					$cmsms_option[CMSMS_SHORTNAME . '_blog_post_author'] || 
					$cmsms_option[CMSMS_SHORTNAME . '_blog_post_cat'] || 
					$cmsms_option[CMSMS_SHORTNAME . '_blog_post_tag']
				) {
					echo '<footer class="cmsms_post_footer entry-meta">';
						if (
							$cmsms_option[CMSMS_SHORTNAME . '_blog_post_like'] || 
							$cmsms_option[CMSMS_SHORTNAME . '_blog_post_comment']
						) {
							echo '<div class="cmsms_post_meta_info">';
							
								cmsms_post_comments('post');
								
								cmsms_post_like('post');
							
							echo '</div>';
						}
						
						
						if (
							$cmsms_option[CMSMS_SHORTNAME . '_blog_post_date'] || 
							$cmsms_option[CMSMS_SHORTNAME . '_blog_post_author'] || 
							$cmsms_option[CMSMS_SHORTNAME . '_blog_post_cat'] || 
							$cmsms_option[CMSMS_SHORTNAME . '_blog_post_tag']
						) {
							echo '<div class="cmsms_post_cont_info">';
							
								cmsms_post_date('post');
							
								cmsms_post_author('post');
								
								cmsms_post_category('post');
								
								cmsms_post_tags('post');
							
							echo '</div>';
						}
					echo '</footer>';
				}
				?>
			</div>
		</div>
	</div>
</article>
<!--_________________________ Finish Quote Article _________________________ -->

