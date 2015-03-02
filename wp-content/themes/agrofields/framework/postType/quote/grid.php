<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 * 
 * Quotes Grid Format Template
 * Created by CMSMasters
 * 
 */


global $quote_content,
	$quote_image,
	$quote_name,
	$quote_subtitle,
	$quote_link,
	$quote_website;

?>

<!--_________________________ Start Grid Article _________________________ -->

<article class="cmsms_quote_inner">
	<?php
	if ($quote_image != '') {
		echo '<figure class="quote_image">' . "\n" . 
			wp_get_attachment_image($quote_image, 'thumbnail') . 
		'</figure>' . "\n";
	}
	?>
	<div class="quote_content_wrap">
		<?php
		echo cmsms_divpdel('<div class="quote_content">' . "\n" . 
			do_shortcode(wpautop($quote_content)) . 
		'</div>' . "\n");
		
		if ($quote_name != '') {
			echo '<h6 class="quote_title">' . $quote_name . '</h6>' . "\n";
		}
		
		if ($quote_subtitle != '') {
			echo '<span class="quote_subtitle">' . $quote_subtitle . '</span>' . "\n";
		}
	
		if ($quote_subtitle != '' && ($quote_link != '' || $quote_website != '')) {
			echo ' - ';
		}
		
		if ($quote_link != '' && $quote_website != '') {
			echo '<a class="quote_link" target="_blank" href="' . $quote_link . '">' . $quote_website . '</a>' . "\n";
		} elseif ($quote_link == '' && $quote_website != '') {
			echo '<span class="quote_site">' . $quote_website . '</span>' . "\n";
		} elseif ($quote_link != '' && $quote_website == '') {
			echo '<a class="quote_link" target="_blank" href="' . $quote_link . '">' . $quote_link . '</a>' . "\n";
		}
		?>
	</div>
</article>
<!--_________________________ Finish Grid Article _________________________ -->

