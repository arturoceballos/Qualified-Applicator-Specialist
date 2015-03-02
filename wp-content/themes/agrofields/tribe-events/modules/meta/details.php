<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */
?>

<div class="tribe-events-meta-group tribe-events-meta-group-details">
	<h2 class="tribe-events-single-section-title"><?php _e('Details', 'tribe-events-calendar'); ?></h2>
	<div class="cmsms_event_meta_info">
		<?php
		do_action('tribe_events_single_meta_details_section_start');
		
		$time_format = get_option('time_format', TribeDateUtils::TIMEFORMAT);
		$time_range_separator = tribe_get_option('timeRangeSeparator', ' - ');
		
		$start_datetime = tribe_get_start_date();
		$start_date = tribe_get_start_date(null, false);
		$start_time = tribe_get_start_date(null, false, $time_format);
		$start_ts = tribe_get_start_date(null, false, TribeDateUtils::DBDATEFORMAT);
		
		$end_datetime = tribe_get_end_date();
		$end_date = tribe_get_end_date(null, false);
		$end_time = tribe_get_end_date(null, false,  $time_format);
		$end_ts = tribe_get_end_date(null, false, TribeDateUtils::DBDATEFORMAT);
		
		// All day (multiday) events
		if (tribe_event_is_all_day() && tribe_event_is_multiday()) :
		?>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php _e('Start:', 'tribe-events-calendar'); ?></span>
				<span class="cmsms_event_meta_info_item_descr">
					<abbr class="tribe-events-abbr updated published dtstart" title="<?php esc_attr_e($start_ts); ?>"><?php esc_html_e($start_date); ?></abbr>
				</span>
			</div>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php _e('End:', 'tribe-events-calendar'); ?></span>
				<span class="cmsms_event_meta_info_item_descr">
					<abbr class="tribe-events-abbr dtend" title="<?php esc_attr_e($end_ts); ?>"><?php esc_html_e($end_date); ?></abbr>
				</span>
			</div>
		<?php
		// All day (single day) events
		elseif ( tribe_event_is_all_day() ):
			?>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php _e('Date:', 'tribe-events-calendar'); ?></span>
				<span class="cmsms_event_meta_info_item_descr">
					<abbr class="tribe-events-abbr updated published dtstart" title="<?php esc_attr_e($start_ts); ?>"><?php esc_html_e($start_date); ?></abbr>
				</span>
			</div>
		<?php
		// Multiday events
		elseif ( tribe_event_is_multiday() ) :
			?>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php _e('Start:', 'tribe-events-calendar'); ?></span>
				<span class="cmsms_event_meta_info_item_descr">
					<abbr class="tribe-events-abbr updated published dtstart" title="<?php esc_attr_e($start_ts); ?>"><?php esc_html_e($start_datetime); ?></abbr>
				</span>
			</div>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php _e('End:', 'tribe-events-calendar'); ?></span>
				<span class="cmsms_event_meta_info_item_descr">
					<abbr class="tribe-events-abbr dtend" title="<?php esc_attr_e($end_ts); ?>"><?php esc_html_e($end_datetime); ?></abbr>
				</span>
			</div>
		<?php
		// Single day events
		else :
			?>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php _e('Date:', 'tribe-events-calendar'); ?></span>
				<span class="cmsms_event_meta_info_item_descr">
					<abbr class="tribe-events-abbr updated published dtstart" title="<?php esc_attr_e($start_ts); ?>"><?php esc_html_e($start_date); ?></abbr>
				</span>
			</div>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php _e('Time:', 'tribe-events-calendar'); ?></span>
				<span class="cmsms_event_meta_info_item_descr">
					<abbr class="tribe-events-abbr updated published dtstart" title="<?php esc_attr_e($end_ts); ?>">
						<?php if ($start_time == $end_time) esc_html_e($start_time); else esc_html_e($start_time . $time_range_separator . $end_time); ?>
					</abbr>
				</span>
			</div>
		<?php endif;
		
		
		$cost = tribe_get_formatted_cost();
		if (!empty($cost)): ?>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php _e('Cost:', 'tribe-events-calendar') ?></span>
				<span class="cmsms_event_meta_info_item_descr tribe-events-event-cost"><?php esc_html_e(tribe_get_formatted_cost()); ?></span>
			</div>
		<?php endif;
		
		
		echo tribe_get_event_categories(get_the_id(), array(
			'before' => 		'',
			'sep' => 			', ',
			'after' => 			'',
			'label' => 			null, // An appropriate plural/singular label will be provided
			'label_before' => 	'<div class="cmsms_event_meta_info_item"><span class="cmsms_event_meta_info_item_title">',
			'label_after' => 	'</span>',
			'wrap_before' => 	'<span class="cmsms_event_meta_info_item_descr tribe-events-event-categories">',
			'wrap_after' => 	'</span></div>'
		));
		
		
		$cmsms_event_tags = tribe_meta_event_tags(__('Event Tags:', 'tribe-events-calendar'), ', ', false);
		
		if ($cmsms_event_tags) {
			echo '<div class="cmsms_event_meta_info_item cmsms_event_tags">' . 
				'<dl>' . $cmsms_event_tags . '</dl>' . 
			'</div>';
		}
		
		
		$website = tribe_get_event_website_link();
		if (!empty($website)):
		?>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php _e('Website:', 'tribe-events-calendar'); ?></span>
				<span class="cmsms_event_meta_info_item_descr tribe-events-event-url"><?php echo $website ?></span>
			</div>
		<?php endif;

		do_action('tribe_events_single_meta_details_section_end'); ?>
	</div>
</div>