<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.1.1
 * 
 * Website Header Template
 * Created by CMSMasters
 * 
 */


$cmsms_option = cmsms_get_global_options();

global $woocommerce;


?><!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8)]><!-->
<html <?php language_attributes(); ?> class="cmsms_html">
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<?php echo ($cmsms_option[CMSMS_SHORTNAME . '_responsive']) ? '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />' : ''; ?>
<title><?php echo (defined('WPSEO_VERSION')) ? wp_title('|', false, 'right') : wp_title('', false, 'right'); ?></title>

<?php cmsms_favicon(); ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php 
// echo '<link rel="stylesheet/less" href="' . get_template_directory_uri() . '/css/style.less" type="text/css" media="screen" />' . "\n" . 
// '<link rel="stylesheet/less" href="' . get_template_directory_uri() . '/css/adaptive.less" type="text/css" media="screen" />' . "\n" . 
// '<link rel="stylesheet/less" href="' . get_template_directory_uri() . '/css/cmsms-woo-style.less" type="text/css" media="screen" />' . "\n" . 
// '<link rel="stylesheet/less" href="' . get_template_directory_uri() . '/css/cmsms-woo-adaptive.less" type="text/css" media="screen" />' . "\n" . 
// '<link rel="stylesheet/less" href="' . get_template_directory_uri() . '/css/cmsms-events-style.less" type="text/css" media="screen" />' . "\n" . 
// '<link rel="stylesheet/less" href="' . get_template_directory_uri() . '/css/cmsms-events-adaptive.less" type="text/css" media="screen" />' . "\n";
?>

<?php 
$ua = $_SERVER['HTTP_USER_AGENT'];

$checker = array( 
	'ios' => 			preg_match('/iPhone|iPod|iPad/', $ua), 
	'blackberry' => 	preg_match('/BlackBerry/', $ua), 
	'android' => 		preg_match('/Android/', $ua), 
	'mac' => 			preg_match('/Macintosh/', $ua), 
	'chrome' => 		preg_match('/Chrome/', $ua), 
	'safari' => 		preg_match('/Safari/', $ua), 
	'ie' => 			preg_match('/MSIE/', $ua), 
	'ie11' => 			preg_match('/Trident/', $ua) 
);


if (is_singular() && get_option('thread_comments')) {
	wp_enqueue_script('comment-reply');
}


$nav_args = array( 
	'theme_location' => 	'primary', 
	'menu_id' => 			'navigation', 
	'menu_class' => 		'navigation', 
	'link_before' => 		'<span>', 
	'link_after' => 		'</span>', 
	'fallback_cb' => 		'cmsms_fallback_menu' 
);


if (class_exists('Walker_Cmsms_Nav_Mega_Menu')) {
	$nav_args['link_before'] = '';
	$nav_args['link_after'] = '';
	$nav_args['walker'] = new Walker_Cmsms_Nav_Mega_Menu();
}


if ($cmsms_option[CMSMS_SHORTNAME . '_preload']) {
	if ($cmsms_option[CMSMS_SHORTNAME . '_preload_effect'] == 'grow' || $cmsms_option[CMSMS_SHORTNAME . '_preload_effect'] == 'fade') {
		$body_classes = 'cmsms_page_invisible';
	} elseif ( 
		$cmsms_option[CMSMS_SHORTNAME . '_preload_effect'] == 'fill-left' || 
		$cmsms_option[CMSMS_SHORTNAME . '_preload_effect'] == 'big-counter' || 
		$cmsms_option[CMSMS_SHORTNAME . '_preload_effect'] == 'bounce' || 
		$cmsms_option[CMSMS_SHORTNAME . '_preload_effect'] == 'loading-bar' || 
		$cmsms_option[CMSMS_SHORTNAME . '_preload_effect'] == 'center-circle' || 
		$cmsms_option[CMSMS_SHORTNAME . '_preload_effect'] == 'center-atom' || 
		$cmsms_option[CMSMS_SHORTNAME . '_preload_effect'] == 'center-radar' || 
		$cmsms_option[CMSMS_SHORTNAME . '_preload_effect'] == 'center-simple' 
	) {
		$body_classes = array( 
			'cmsms_page_pace_invisible', 
			'cmsms-pace-theme', 
			'cmsms-pace-theme-' . $cmsms_option[CMSMS_SHORTNAME . '_preload_effect'] 
		);
	} else {
		$body_classes = array( 
			'cmsms-pace-theme', 
			'cmsms-pace-theme-' . $cmsms_option[CMSMS_SHORTNAME . '_preload_effect'] 
		);
	}
} else {
	$body_classes = '';
}


wp_head();

?>
</head>
<body <?php body_class($body_classes); ?>>
	
<!-- _________________________ Start Page _________________________ -->
<div id="page" class="<?php 
if ( 
	!$checker['ios'] && 
	!$checker['blackberry'] && 
	!$checker['android'] && 
	!$checker['mac'] 
) { 
	echo 'csstransition '; 
}

if ($checker['chrome']) { 
	echo 'chrome_only '; 
}

if ($checker['safari'] && !$checker['chrome']) { 
	echo 'safari_only '; 
}

if ($checker['ie'] || $checker['ie11']) { 
	echo 'ie_only '; 
}

echo 'cmsms_' . $cmsms_option[CMSMS_SHORTNAME . '_theme_layout'] . ' ';

if ($cmsms_option[CMSMS_SHORTNAME . '_fixed_header']) {
	echo 'fixed_header ';
}

if ($cmsms_option[CMSMS_SHORTNAME . '_fixed_footer'] && $cmsms_option[CMSMS_SHORTNAME . '_footer_type'] == 'default') {
	echo 'fixed_footer ';
}

if ($cmsms_option[CMSMS_SHORTNAME . '_header_top_line']) {
	echo 'enable_header_top ';
}

if ($cmsms_option[CMSMS_SHORTNAME . '_header_styles'] == 'default') {
	echo 'enable_header_bottom ';
}

if ($cmsms_option[CMSMS_SHORTNAME . '_header_styles'] == 'r_nav') {
	echo 'enable_header_right ';
}

if ($cmsms_option[CMSMS_SHORTNAME . '_header_styles'] == 'c_nav') {
	echo 'enable_header_centered ';
}
?>hfeed site">

<!-- _________________________ Start Main _________________________ -->
<div id="main">
<!-- _________________________ Start Header _________________________ -->
<header id="header" class="header_default">
	<?php if ($cmsms_option[CMSMS_SHORTNAME . '_header_top_line']) { ?>
		<div class="header_top" data-height="<?php echo $cmsms_option[CMSMS_SHORTNAME . '_header_top_height']; ?>">
			<div class="header_top_outer">
				<div class="header_top_inner">
				<?php 
					if ($cmsms_option[CMSMS_SHORTNAME . '_header_top_line_add_cont'] !== 'none') {
						echo '<div class="header_top_right">' . 
							'<div class="header_top_aligner"></div>';
						
						
						if ($cmsms_option[CMSMS_SHORTNAME . '_header_top_line_add_cont'] == 'social' && isset($cmsms_option[CMSMS_SHORTNAME . '_social_icons'])) {
							cmsms_social_icons();
						} elseif ($cmsms_option[CMSMS_SHORTNAME . '_header_top_line_add_cont'] == 'nav' && has_nav_menu('top_line')) {
							echo '<div class="nav_wrap">' . 
								'<a class="responsive_top_nav cmsms_theme_icon_resp_nav" href="javascript:void(0);"></a>' . 
								'<nav>';
							
							
							wp_nav_menu(array( 
								'theme_location' => 	'top_line', 
								'menu_id' => 			'top_line_nav', 
								'menu_class' => 		'top_line_nav' 
							));
							
							
							echo '</nav>' . 
							'</div>';
						}
						
						
						echo '</div>';
					}
					
					
					if ($cmsms_option[CMSMS_SHORTNAME . '_header_top_line_short_info'] !== '') {
						echo '<div class="header_top_left">' . 
							'<div class="header_top_aligner"></div>' . 
							'<div class="meta_wrap">' . 
								stripslashes($cmsms_option[CMSMS_SHORTNAME . '_header_top_line_short_info']) . 
							'</div>' . 
							'<div class="cl"></div>' . 
						'</div>';
					} 
				?>
					<div class="cl"></div>
				</div>
			</div>
			<div class="cl"></div>
			<div class="header_top_but closed">
				<div class="header_top_but_arrow"></div>
			</div>
		</div>
	<?php } ?>
	<div class="header_mid" data-height="<?php echo $cmsms_option[CMSMS_SHORTNAME . '_header_mid_height']; ?>">
		<div class="header_mid_outer">
			<div class="header_mid_inner">
			<?php 
			if (
				$cmsms_option[CMSMS_SHORTNAME . '_header_search']
			) {
			?>
				<div class="search_wrap">
					<div class="search_wrap_inner">
						<div class="search_wrap_in_inner">
							<?php get_search_form(); ?>
							<a href="javascript:void(0);" class="search_but cmsms-icon-search-2"></a>
						</div>
					</div>
				</div>
			<?php 
			}
			
			
			if (
				$cmsms_option[CMSMS_SHORTNAME . '_header_social'] && 
				isset($cmsms_option[CMSMS_SHORTNAME . '_social_icons'])
			) {
				echo '<div class="social_mid">' . 
				'<div class="social_mid_inner">';
				
				cmsms_social_icons();
				
				echo '<div class="social_but_wrap"><a href="javascript:void(0);" class="social_but cmsms-icon-share"></a></div>' . 
				'</div>' . 
				'</div>';
			}
			?>
			<div class="resp_nav_wrap">
				<div class="resp_nav_wrap_inner">
					<a class="responsive_nav cmsms_theme_icon_resp_nav" href="javascript:void(0);"></a>
				</div>
			</div>
			<?php
			
			if (class_exists('woocommerce')) {
				cmsms_woocommerce_cart_dropdown(); 
			}
			?>
			
				<div class="logo_wrap"><?php cmsms_logo(); ?></div>
				<div class="cl"></div>
			</div>
		</div>
	</div>
	<div class="header_bot" data-height="<?php echo $cmsms_option[CMSMS_SHORTNAME . '_header_bot_height']; ?>">
		<div class="header_bot_outer">
			<div class="header_bot_inner">
				<div class="header_line_wrap">
					<div class="header_line">
						
						<!-- _________________________ Start Navigation _________________________ -->
						<nav role="navigation">
						<?php
							echo "\t";
							
							
							wp_nav_menu($nav_args);
							
							
							echo "\r";
						?>
							<div class="cl"></div>
						</nav>
						<!-- _________________________ Finish Navigation _________________________ -->
						
						<div class="cl"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- _________________________ Finish Header _________________________ -->

<?php 
	if (!is_404()) {
		cmsms_page_heading();
	}

	list($cmsms_layout, $cmsms_page_scheme) = cmsms_theme_page_layout_scheme();
?>
	
<!-- _________________________ Start Middle _________________________ -->
<div id="middle"<?php echo (is_404()) ? ' class="error_page"' : ''; ?>>
<?php 

	echo '<div class="middle_inner' . (($cmsms_page_scheme != 'default') ? ' cmsms_color_scheme_' . $cmsms_page_scheme : '') . '">' . "\n";
	
	if (
		class_exists('woocommerce') && 
		(
			is_tax('product_cat') || 
			is_tax('product_tag') || 
			is_post_type_archive('product') || 
			is_page(wc_get_page_id('shop'))
		)
	) {
		echo '<div class="cmsms_woo_wrap_result">' . 
			'<div class="cmsms_woo_wrap_result_inner">';
				do_action('woocommerce_before_shop_loop');
			echo '</div>' . 
		'</div>';
	}
	
	echo '<div class="content_wrap ' . $cmsms_layout . 
	((is_singular('project')) ? ' project_page' : '') . 
	((is_singular('profile')) ? ' profile_page' : '') . 
	((class_exists('woocommerce') && (is_woocommerce() || is_cart() || is_checkout() || is_checkout_pay_page() || is_account_page() || is_order_received_page() || is_add_payment_method_page())) ? ' cmsms_woo' : '') . 
	'">' . "\n\n";

