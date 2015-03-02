<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_address_exists() ) return;
$phone = tribe_get_phone();
$website = tribe_get_venue_website_link();
?>

<div class="tribe-events-meta-group tribe-events-meta-group-venue">
	<h2 class="tribe-events-single-section-title"><?php _e(tribe_get_venue_label_singular(), 'tribe-events-calendar'); ?></h2>
	<div class="cmsms_event_meta_info">
		<?php do_action('tribe_events_single_meta_venue_section_start'); ?>
		
		<div class="cmsms_event_meta_info_item">
			<span class="cmsms_event_meta_info_item_title"><?php _e('Venue Name:', 'cmsmasters'); ?></span>
			<span class="cmsms_event_meta_info_item_descr author fn org"><?php echo tribe_get_venue(); ?></span>
		</div>
		
		<?php
		// Do we have an address?
		$address = tribe_address_exists() ? '<address class="tribe-events-address">' . tribe_get_full_address() . '</address>' : '';
		
		// Do we have a Google Map link to display?
		$gmap_link = tribe_show_google_map_link() ? tribe_get_map_link_html() : '';
		$gmap_link = apply_filters('tribe_event_meta_venue_address_gmap', $gmap_link);
		
		// Display if appropriate
		if (!empty($address)): ?> 
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php _e('Address:', 'cmsmasters'); ?></span>
				<span class="cmsms_event_meta_info_item_descr location"><?php echo $address . $gmap_link; ?></span>
			</div>
		<?php
		endif;
		
		
		if (!empty($phone)): ?>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php _e('Phone:', 'tribe-events-calendar'); ?></span>
				<span class="cmsms_event_meta_info_item_descr tel"><?php echo $phone; ?></span>
			</div>
		<?php endif;

		
		if (!empty($website)): ?>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php _e('Website:', 'tribe-events-calendar'); ?></span>
				<span class="cmsms_event_meta_info_item_descr url"><?php echo $website; ?></span>
			</div>
		<?php endif;

		do_action('tribe_events_single_meta_venue_section_end'); ?>
	</div>
</div>