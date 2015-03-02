<?php 
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version 	1.0.0
 * 
 * Donations Campaign Options Functions
 * Created by CMSMasters
 * 
 */


$cmsms_option = cmsms_get_global_options();


$cmsms_global_layout = (isset($cmsms_option[CMSMS_SHORTNAME . '_layout']) && $cmsms_option[CMSMS_SHORTNAME . '_layout'] !== '') ? $cmsms_option[CMSMS_SHORTNAME . '_layout'] : 'r_sidebar';

$cmsms_global_bottom_sidebar = (isset($cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar']) && $cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar'] !== '') ? (($cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar'] == 1) ? 'true' : 'false') : 'true';

$cmsms_global_bottom_sidebar_layout = (isset($cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar_layout'])) ? $cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar_layout'] : '14141414';

$cmsms_global_donations_campaign_title = (isset($cmsms_option[CMSMS_SHORTNAME . '_donations_campaign_title']) && $cmsms_option[CMSMS_SHORTNAME . '_donations_campaign_title'] !== '') ? (($cmsms_option[CMSMS_SHORTNAME . '_donations_campaign_title'] == 1) ? 'true' : 'false') : 'true';

$cmsms_global_donations_campaign_share_box = (isset($cmsms_option[CMSMS_SHORTNAME . '_donations_campaign_share_box']) && $cmsms_option[CMSMS_SHORTNAME . '_donations_campaign_share_box'] !== '') ? (($cmsms_option[CMSMS_SHORTNAME . '_donations_campaign_share_box'] == 1) ? 'true' : 'false') : 'true';

$cmsms_global_donations_campaign_author_box = (isset($cmsms_option[CMSMS_SHORTNAME . '_donations_campaign_author_box']) && $cmsms_option[CMSMS_SHORTNAME . '_donations_campaign_author_box'] !== '') ? (($cmsms_option[CMSMS_SHORTNAME . '_donations_campaign_author_box'] == 1) ? 'true' : 'false') : 'true';

$cmsms_global_bg = (isset($cmsms_option[CMSMS_SHORTNAME . '_theme_layout']) && $cmsms_option[CMSMS_SHORTNAME . '_theme_layout'] === 'boxed') ? true : false;


if (isset($cmsms_option[CMSMS_SHORTNAME . '_donations_more_campaigns_box']) && $cmsms_option[CMSMS_SHORTNAME . '_donations_more_campaigns_box'] !== '') {
	$cmsms_global_donations_more_campaigns_box = array();
	
	
	foreach($cmsms_option[CMSMS_SHORTNAME . '_donations_more_campaigns_box'] as $key => $val) {
		if ($val == 'true') {
			$cmsms_global_donations_more_campaigns_box[] = $key;
		}
	}
} else {
	$cmsms_global_donations_more_campaigns_box = array( 
		'related', 
		'popular', 
		'recent' 
	);
}


$cmsms_option_name = 'cmsms_campaign_';


$tabs_array = array();


$tabs_array['cmsms_campaign'] = array( 
	'label' => esc_html__('Campaign', 'cmsmasters'), 
	'value'	=> 'cmsms_campaign' 
);


$tabs_array['cmsms_layout'] = array( 
	'label' => esc_html__('Layout', 'cmsmasters'), 
	'value'	=> 'cmsms_layout' 
);


if ($cmsms_global_bg) {
	$tabs_array['cmsms_bg'] = array( 
		'label' => esc_html__('Background', 'cmsmasters'), 
		'value'	=> 'cmsms_bg' 
	);
}


$tabs_array['cmsms_heading'] = array( 
	'label' => esc_html__('Heading', 'cmsmasters'), 
	'value'	=> 'cmsms_heading' 
);


$custom_campaign_meta_fields = array( 
	array( 
		'id'	=> $cmsms_option_name . 'tabs', 
		'type'	=> 'tabs', 
		'std'	=> 'cmsms_campaign', 
		'options' => $tabs_array 
	), 
	array( 
		'id'	=> 'cmsms_campaign', 
		'type'	=> 'tab_start', 
		'std'	=> 'true' 
	), 
	array( 
		'label'	=> __('Campaign Target', 'cmsmasters'), 
		'desc'	=> __('do not add currency symbol', 'cmsmasters'), 
		'id'	=> $cmsms_option_name . 'target', 
		'type'	=> 'number', 
		'hide'	=> '', 
		'std'	=> '0', 
		'min' 	=> '0', 
		'max' 	=> '', 
		'step' 	=> '10', 
		'size' 	=> '10' 
	), 
	array( 
		'label'	=> __('Campaign Title', 'cmsmasters'), 
		'desc'	=> __('Show', 'cmsmasters'), 
		'id'	=> $cmsms_option_name . 'title', 
		'type'	=> 'checkbox', 
		'hide'	=> '', 
		'std'	=> $cmsms_global_donations_campaign_title 
	), 
	array( 
		'label'	=> __('Sharing Box', 'cmsmasters'), 
		'desc'	=> __('Show', 'cmsmasters'), 
		'id'	=> $cmsms_option_name . 'sharing_box', 
		'type'	=> 'checkbox', 
		'hide'	=> '', 
		'std'	=> $cmsms_global_donations_campaign_share_box 
	), 
	array( 
		'label'	=> __('About Author Box', 'cmsmasters'), 
		'desc'	=> __('Show', 'cmsmasters'), 
		'id'	=> $cmsms_option_name . 'author_box', 
		'type'	=> 'checkbox', 
		'hide'	=> '', 
		'std'	=> $cmsms_global_donations_campaign_author_box 
	), 
	array( 
		'label'	=> __('More Campaigns Box', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> $cmsms_option_name . 'more_posts', 
		'type'	=> 'checkbox_group', 
		'hide'	=> '', 
		'std'	=> ((isset($_GET['post']) && get_post_meta($_GET['post'], 'cmsms_heading', true)) ? '' : $cmsms_global_donations_more_campaigns_box), 
		'options' => array( 
			'related' => array( 
				'label' => __('Show Related Tab', 'cmsmasters'),
				'value'	=> 'related' 
			), 
			'popular' => array( 
				'label' => __('Show Popular Tab', 'cmsmasters'),
				'value'	=> 'popular' 
			), 
			'recent' => array( 
				'label' => __('Show Recent Tab', 'cmsmasters'),
				'value'	=> 'recent' 
			) 
		) 
	), 
	array( 
		'id'	=> 'cmsms_campaign', 
		'type'	=> 'tab_finish' 
	), 
	array( 
		'id'	=> 'cmsms_layout', 
		'type'	=> 'tab_start', 
		'std'	=> '' 
	), 
	array( 
		'label'	=> __('Page Color Scheme', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_page_scheme', 
		'type'	=> 'select_scheme', 
		'hide'	=> 'false', 
		'std'	=> 'default' 
	), 
	array( 
		'label'	=> __('Bottom Sidebar', 'cmsmasters'), 
		'desc'	=> __('Show', 'cmsmasters'), 
		'id'	=> 'cmsms_bottom_sidebar', 
		'type'	=> 'checkbox', 
		'hide'	=> '', 
		'std'	=> $cmsms_global_bottom_sidebar 
	), 
	array( 
		'label'	=> __('Choose Bottom Sidebar', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_bottom_sidebar_id', 
		'type'	=> 'select_sidebar', 
		'hide'	=> 'true', 
		'std'	=> '' 
	), 
	array( 
		'label'	=> __('Choose Bottom Sidebar Layout', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_bottom_sidebar_layout', 
		'type'	=> 'select', 
		'hide'	=> 'true', 
		'std'	=> $cmsms_global_bottom_sidebar_layout, 
		'options' => array( 
			'11' => array( 
				'label' => '1/1',
				'value'	=> '11' 
			), 
			'1212' => array( 
				'label' => '1/2 + 1/2',
				'value'	=> '1212' 
			), 
			'1323' => array( 
				'label' => '1/3 + 2/3',
				'value'	=> '1323' 
			), 
			'2313' => array( 
				'label' => '2/3 + 1/3',
				'value'	=> '2313' 
			), 
			'1434' => array( 
				'label' => '1/4 + 3/4',
				'value'	=> '1434' 
			), 
			'3414' => array( 
				'label' => '3/4 + 1/4',
				'value'	=> '3414' 
			), 
			'131313' => array( 
				'label' => '1/3 + 1/3 + 1/3',
				'value'	=> '131313' 
			), 
			'121414' => array( 
				'label' => '1/2 + 1/4 + 1/4',
				'value'	=> '121414' 
			), 
			'141214' => array( 
				'label' => '1/4 + 1/2 + 1/4',
				'value'	=> '141214' 
			), 
			'141412' => array( 
				'label' => '1/4 + 1/4 + 1/2',
				'value'	=> '141412' 
			), 
			'14141414' => array( 
				'label' => '1/4 + 1/4 + 1/4 + 1/4',
				'value'	=> '14141414' 
			) 
		) 
	), 
	array( 
		'id'	=> 'cmsms_layout', 
		'type'	=> 'tab_finish' 
	) 
);

