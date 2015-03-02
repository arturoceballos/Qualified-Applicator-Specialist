<?php
/**
 * Related Events Template
 * The template for displaying related events on the single event page.
 * 
 * You can recreate an ENTIRELY new related events view by doing a template override, and placing
 * a related-events.php file in a tribe-events/pro/ directory within your theme directory, which
 * will override the /views/related-events.php. 
 *
 * You can use any or all filters included in this file or create your own filters in 
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters
 *
 * @package TribeEventsCalendarPro
 *
 */
 
if (!defined('ABSPATH')) { die('-1'); }

//Maximum Number of related posts to display
$num_posts = 3;

$posts = tribe_get_related_posts($num_posts);


if (is_array($posts) && !empty($posts)) {
	echo '<h2 class="tribe-events-related-events-title">' . __('Related Events', 'tribe-events-calendar-pro') . '</h2>' . 
	'<ul class="tribe-related-events tribe-clearfix hfeed vcalendar clearfix">';
	
		foreach ($posts as $post) {
			echo '<li>';

				$thumb = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'project-thumb') : '<span class="cmsms_events_img_placeholder"></span>';
				
				echo '<div class="tribe-related-events-thumbnail">' . 
					'<a href="' . esc_url(tribe_get_event_link($post)) . '" class="url" rel="bookmark">' . $thumb . '</a>' . 
				'</div>' . 
				'<div class="tribe-related-event-info">' . 
					'<h3 class="tribe-related-events-title summary"><a href="' . esc_url(tribe_get_event_link($post)) . '" class="url" rel="bookmark">' . get_the_title($post->ID) . '</a></h3>';

						if ($post->post_type == TribeEvents::POSTTYPE) {
							echo tribe_events_event_schedule_details($post);
						}
						
				echo '</div>' . 
			'</li>';
		}
		
	echo '</ul>';
}
?>