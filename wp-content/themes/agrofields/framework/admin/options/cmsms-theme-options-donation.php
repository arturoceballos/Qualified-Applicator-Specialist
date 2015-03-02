<?php 
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version 	1.0.0
 * 
 * Donation Options Functions
 * Created by CMSMasters
 * 
 */


$cmsms_option = cmsms_get_global_options();


$cmsms_global_layout = (isset($cmsms_option[CMSMS_SHORTNAME . '_layout']) && $cmsms_option[CMSMS_SHORTNAME . '_layout'] !== '') ? $cmsms_option[CMSMS_SHORTNAME . '_layout'] : 'r_sidebar';

$cmsms_global_bottom_sidebar = (isset($cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar']) && $cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar'] !== '') ? (($cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar'] == 1) ? 'true' : 'false') : 'true';

$cmsms_global_bottom_sidebar_layout = (isset($cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar_layout'])) ? $cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar_layout'] : '14141414';

$cmsms_global_bg = (isset($cmsms_option[CMSMS_SHORTNAME . '_theme_layout']) && $cmsms_option[CMSMS_SHORTNAME . '_theme_layout'] === 'boxed') ? true : false;


$tabs_array = array();


$tabs_array['cmsms_donation'] = array( 
	'label' => esc_html__('Donation', 'cmsmasters'), 
	'value'	=> 'cmsms_donation' 
);


$tabs_array['cmsms_donator'] = array( 
	'label' => esc_html__('Donator', 'cmsmasters'), 
	'value'	=> 'cmsms_donator' 
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


$custom_donation_meta_fields = array( 
	array( 
		'id'	=> 'cmsms_donation_tabs', 
		'type'	=> 'tabs', 
		'std'	=> 'cmsms_donation', 
		'options' => $tabs_array 
	), 
	array( 
		'id'	=> 'cmsms_donation', 
		'type'	=> 'tab_start', 
		'std'	=> 'true' 
	), 
	array( 
		'label'	=> __('Amount', 'cmsmasters'), 
		'desc'	=> __('do not add currency symbol', 'cmsmasters'), 
		'id'	=> 'cmsms_donation_amount', 
		'type'	=> 'number', 
		'hide'	=> '', 
		'std'	=> '', 
		'min' 	=> '1', 
		'max' 	=> '', 
		'step' 	=> '1' 
	), 
	array( 
		'label'	=> __('Recurrence', 'cmsmasters'), 
		'desc'	=> __('Choose whether and how often you want to repeat this donation', 'cmsmasters'), 
		'id'	=> 'cmsms_recurrence_period', 
		'type'	=> 'radio', 
		'hide'	=> '', 
		'std'	=> '1', 
		'options' => array( 
			'1' => array( 
				'label' => __('Not recurring', 'cmsmasters'), 
				'value'	=> '1' 
			), 
			'7' => array( 
				'label' => __('Weekly', 'cmsmasters'), 
				'value'	=> '7' 
			), 
			'30' => array( 
				'label' => __('Monthly', 'cmsmasters'), 
				'value'	=> '30' 
			), 
			'365' => array( 
				'label' => __('Yearly', 'cmsmasters'), 
				'value'	=> '365' 
			) 
		) 
	), 
	array( 
		'label'	=> __('Campaign', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_donation_campaign', 
		'type'	=> 'select', 
		'hide'	=> '', 
		'std'	=> '', 
		'options' => cmsms_get_donation_campaigns() 
	), 
	array( 
		'label'	=> __('Hide Donator Information?', 'cmsmasters'), 
		'desc'	=> __('Yes', 'cmsmasters'), 
		'id'	=> 'cmsms_anonymous_donation', 
		'type'	=> 'checkbox', 
		'hide'	=> '', 
		'std'	=> 'false' 
	), 
	array( 
		'id'	=> 'cmsms_donation', 
		'type'	=> 'tab_finish' 
	), 
	array( 
		'id'	=> 'cmsms_donator', 
		'type'	=> 'tab_start', 
		'std'	=> '' 
	), 
	array( 
		'label'	=> __('First Name', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_donator_firstname', 
		'type'	=> 'text', 
		'hide'	=> '', 
		'std'	=> '' 
	), 
	array( 
		'label'	=> __('Last Name', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_donator_lastname', 
		'type'	=> 'text', 
		'hide'	=> '', 
		'std'	=> '' 
	), 
	array( 
		'label'	=> __('Email', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_donator_email', 
		'type'	=> 'text', 
		'hide'	=> '', 
		'std'	=> '' 
	), 
	array( 
		'label'	=> __('Company', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_donator_company', 
		'type'	=> 'text', 
		'hide'	=> '', 
		'std'	=> '' 
	), 
	array( 
		'label'	=> __('Address', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_donator_address', 
		'type'	=> 'text', 
		'hide'	=> '', 
		'std'	=> '' 
	), 
	array( 
		'label'	=> __('City', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_donator_city', 
		'type'	=> 'text', 
		'hide'	=> '', 
		'std'	=> '' 
	), 
	array( 
		'label'	=> __('State / Province', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_donator_state', 
		'type'	=> 'text', 
		'hide'	=> '', 
		'std'	=> '' 
	), 
	array( 
		'label'	=> __('Postal / Zip Code', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_donator_zip', 
		'type'	=> 'text', 
		'hide'	=> '', 
		'std'	=> '' 
	), 
	array( 
		'label'	=> __('Country', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_donator_country', 
		'type'	=> 'text', 
		'hide'	=> '', 
		'std'	=> '' 
	), 
	array( 
		'label'	=> __('Phone Number', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_donator_phone', 
		'type'	=> 'text', 
		'hide'	=> '', 
		'std'	=> '' 
	), 
	array( 
		'label'	=> __('Website', 'cmsmasters'), 
		'desc'	=> '', 
		'id'	=> 'cmsms_donator_website', 
		'type'	=> 'text', 
		'hide'	=> '', 
		'std'	=> '' 
	), 
	array( 
		'id'	=> 'cmsms_donator', 
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
		'label'	=> __('About Donator Box', 'cmsmasters'), 
		'desc'	=> __('Show', 'cmsmasters'), 
		'id'	=> 'cmsms_donator_box', 
		'type'	=> 'checkbox', 
		'hide'	=> '', 
		'std'	=> 'true' 
	), 
	array( 
		'id'	=> 'cmsms_layout', 
		'type'	=> 'tab_finish' 
	) 
);



/* Get Donation Campaigns Array For Select */
function cmsms_get_donation_campaigns() {
	$campaigns = get_posts(array( 
		'post_type' => 			'campaign', 
		'orderby' => 			'post_date', 
	    'order' => 				'ASC', 
	    'posts_per_page' => 	-1 
	) );
	
	
	$array = array();
	
	
	$array[''] = array( 
		'label' => 	__('No special campaign', 'cmsmasters'), 
		'value' => 	'' 
	);
	
	
	foreach ($campaigns as $campaign) {
		$array[$campaign->ID] = array( 
			'label' => 	$campaign->post_title, 
			'value' => 	$campaign->ID 
		);
	}
	
	
	return $array;
}

