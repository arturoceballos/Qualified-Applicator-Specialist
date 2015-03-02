<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version 	1.0.0
 * 
 * Custom Theme Widgets
 * Created by CMSMasters
 * 
 */


/**
 * Advertisement Widget Class
 */
class WP_Widget_Custom_Advertisement extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_advertisement_entries', 
			'description' => 	esc_attr__('Your advertisement', 'cmsmasters') 
		);
		
		$control_ops = array( 
			'width' => 	600 
		);
		
		parent::__construct('custom-advertisement', esc_attr__('Advertisement', 'cmsmasters'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Advertisement', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
        $image1 = isset($instance['image1']) ? $instance['image1'] : '';
        $link1 = isset($instance['link1']) ? $instance['link1'] : '';
        $image2 = isset($instance['image2']) ? $instance['image2'] : '';
        $link2 = isset($instance['link2']) ? $instance['link2'] : '';
        $image3 = isset($instance['image3']) ? $instance['image3'] : '';
        $link3 = isset($instance['link3']) ? $instance['link3'] : '';
        $image4 = isset($instance['image4']) ? $instance['image4'] : '';
        $link4 = isset($instance['link4']) ? $instance['link4'] : '';
        $image5 = isset($instance['image5']) ? $instance['image5'] : '';
        $link5 = isset($instance['link5']) ? $instance['link5'] : '';
        $image6 = isset($instance['image6']) ? $instance['image6'] : '';
        $link6 = isset($instance['link6']) ? $instance['link6'] : '';
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		echo '<div class="adv_image_wrap">';
		
		if ($image1 != '' && $link1 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link1) . '" target="_blank">' . 
					'<img src="' . esc_url($image1) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image2 != '' && $link2 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link2) . '" target="_blank">' . 
					'<img src="' . esc_url($image2) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image3 != '' && $link3 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link3) . '" target="_blank">' . 
					'<img src="' . esc_url($image3) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image4 != '' && $link4 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link4) . '" target="_blank">' . 
					'<img src="' . esc_url($image4) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image5 != '' && $link5 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link5) . '" target="_blank">' . 
					'<img src="' . esc_url($image5) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image6 != '' && $link6 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link6) . '" target="_blank">' . 
					'<img src="' . esc_url($image6) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}
		
        echo '</div>';
		
        echo $after_widget;
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['image1'] = strip_tags($new_instance['image1']);
        $instance['link1'] = strip_tags($new_instance['link1']);
        $instance['image2'] = strip_tags($new_instance['image2']);
        $instance['link2'] = strip_tags($new_instance['link2']);
        $instance['image3'] = strip_tags($new_instance['image3']);
        $instance['link3'] = strip_tags($new_instance['link3']);
        $instance['image4'] = strip_tags($new_instance['image4']);
        $instance['link4'] = strip_tags($new_instance['link4']);
        $instance['image5'] = strip_tags($new_instance['image5']);
        $instance['link5'] = strip_tags($new_instance['link5']);
        $instance['image6'] = strip_tags($new_instance['image6']);
        $instance['link6'] = strip_tags($new_instance['link6']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$image1 = isset($instance['image1']) ? esc_attr($instance['image1']) : '';
		$link1 = isset($instance['link1']) ? esc_attr($instance['link1']) : '';
		$image2 = isset($instance['image2']) ? esc_attr($instance['image2']) : '';
		$link2 = isset($instance['link2']) ? esc_attr($instance['link2']) : '';
		$image3 = isset($instance['image3']) ? esc_attr($instance['image3']) : '';
		$link3 = isset($instance['link3']) ? esc_attr($instance['link3']) : '';
		$image4 = isset($instance['image4']) ? esc_attr($instance['image4']) : '';
		$link4 = isset($instance['link4']) ? esc_attr($instance['link4']) : '';
		$image5 = isset($instance['image5']) ? esc_attr($instance['image5']) : '';
		$link5 = isset($instance['link5']) ? esc_attr($instance['link5']) : '';
		$image6 = isset($instance['image6']) ? esc_attr($instance['image6']) : '';
		$link6 = isset($instance['link6']) ? esc_attr($instance['link6']) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('image1'); ?>"><?php esc_html_e('Image', 'cmsmasters'); ?> #1:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" type="text" value="<?php echo $image1; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('link1'); ?>"><?php esc_html_e('Link', 'cmsmasters'); ?> #1:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo $link1; ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('image2'); ?>"><?php esc_html_e('Image', 'cmsmasters'); ?> #2:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('image2'); ?>" name="<?php echo $this->get_field_name('image2'); ?>" type="text" value="<?php echo $image2; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('link2'); ?>"><?php esc_html_e('Link', 'cmsmasters'); ?> #2:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo $link2; ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('image3'); ?>"><?php esc_html_e('Image', 'cmsmasters'); ?> #3:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('image3'); ?>" name="<?php echo $this->get_field_name('image3'); ?>" type="text" value="<?php echo $image3; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('link3'); ?>"><?php esc_html_e('Link', 'cmsmasters'); ?> #3:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('link3'); ?>" name="<?php echo $this->get_field_name('link3'); ?>" type="text" value="<?php echo $link3; ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('image4'); ?>"><?php esc_html_e('Image', 'cmsmasters'); ?> #4:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('image4'); ?>" name="<?php echo $this->get_field_name('image4'); ?>" type="text" value="<?php echo $image4; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('link4'); ?>"><?php esc_html_e('Link', 'cmsmasters'); ?> #4:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('link4'); ?>" name="<?php echo $this->get_field_name('link4'); ?>" type="text" value="<?php echo $link4; ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('image5'); ?>"><?php esc_html_e('Image', 'cmsmasters'); ?> #5:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('image5'); ?>" name="<?php echo $this->get_field_name('image5'); ?>" type="text" value="<?php echo $image5; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('link5'); ?>"><?php esc_html_e('Link', 'cmsmasters'); ?> #5:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('link5'); ?>" name="<?php echo $this->get_field_name('link5'); ?>" type="text" value="<?php echo $link5; ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('image6'); ?>"><?php esc_html_e('Image', 'cmsmasters'); ?> #6:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('image6'); ?>" name="<?php echo $this->get_field_name('image6'); ?>" type="text" value="<?php echo $image6; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('link6'); ?>"><?php esc_html_e('Link', 'cmsmasters'); ?> #6:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('link6'); ?>" name="<?php echo $this->get_field_name('link6'); ?>" type="text" value="<?php echo $link6; ?>" />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Contact Information Widget Class
 */
class WP_Widget_Custom_Contact_Info extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_contact_info_entries', 
			'description' => 	esc_html__('Your contact information', 'cmsmasters') 
		);
		
		$control_ops = array( 
			'width' => 	600 
		);
		
		parent::__construct('custom-contact-info', esc_attr__('Contact Information', 'cmsmasters'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Contact Information', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
        $name = isset($instance['name']) ? esc_html($instance['name']) : '';
        $address = isset($instance['address']) ? esc_html($instance['address']) : '';
        $city = isset($instance['city']) ? esc_html($instance['city']) : '';
        $state = isset($instance['state']) ? esc_html($instance['state']) : '';
        $zip = isset($instance['zip']) ? esc_html($instance['zip']) : '';
        $phone = isset($instance['phone']) ? esc_html($instance['phone']) : '';
        $email = isset($instance['email']) ? sanitize_email($instance['email']) : '';
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		if ($name != '') { 
			echo '<span class="contact_widget_name">' . $name . '</span>';
		}
		
		if ($address != '' || $city != '' || $state != '' || $zip != '') {
			echo '<div class="adress_wrap">';
		}
		
		if ($address != '') { 
			echo '<span class="contact_widget_address">' . $address . '</span>';
		}
		
		if ($city != '') { 
			echo '<span class="contact_widget_city">' . $city . '</span>';
		}
		
		if ($state != '') { 
			echo '<span class="contact_widget_state">' . $state . '</span>';
		}
		
		if ($zip != '') { 
			echo '<span class="contact_widget_zip">' . $zip . '</span>';
		}
		
		if ($address != '' || $city != '' || $state != '' || $zip != '') {
			echo '</div>';
		}
		
		if ($phone != '') { 
            echo '<span class="contact_widget_phone">' . 
				'<span class="contact_widget_phone_inner">' . esc_html__('Phone', 'cmsmasters') . ':&nbsp;</span>' . 
				$phone . 
			'</span>';
		}
		
        if ($email != '') { 
            echo '<span class="contact_widget_email">' . 
				'<span class="contact_widget_email_inner">' . esc_html__('Email', 'cmsmasters') . ':&nbsp;</span>' . 
				'<a href="mailto:' . antispambot($email, 1) . '">' . antispambot($email) . '</a>' . 
			'</span>';
		}
		
        echo $after_widget;
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['name'] = strip_tags($new_instance['name']);
        $instance['address'] = strip_tags($new_instance['address']);
        $instance['city'] = strip_tags($new_instance['city']);
        $instance['state'] = strip_tags($new_instance['state']);
        $instance['zip'] = strip_tags($new_instance['zip']);
        $instance['phone'] = strip_tags($new_instance['phone']);
        $instance['email'] = strip_tags($new_instance['email']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $name = isset($instance['name']) ? esc_attr($instance['name']) : '';
        $address = isset($instance['address']) ? esc_attr($instance['address']) : '';
        $city = isset($instance['city']) ? esc_attr($instance['city']) : '';
        $state = isset($instance['state']) ? esc_attr($instance['state']) : '';
        $zip = isset($instance['zip']) ? esc_attr($instance['zip']) : '';
        $phone = isset($instance['phone']) ? esc_attr($instance['phone']) : '';
        $email = isset($instance['email']) ? esc_attr($instance['email']) : '';
        ?>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('name'); ?>"><?php esc_html_e('Name', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $name; ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php esc_html_e('Address', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('city'); ?>"><?php esc_html_e('City', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('city'); ?>" name="<?php echo $this->get_field_name('city'); ?>" type="text" value="<?php echo $city; ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('state'); ?>"><?php esc_html_e('State', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('state'); ?>" name="<?php echo $this->get_field_name('state'); ?>" type="text" value="<?php echo $state; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('zip'); ?>"><?php esc_html_e('Zip', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('zip'); ?>" name="<?php echo $this->get_field_name('zip'); ?>" type="text" value="<?php echo $zip; ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('phone'); ?>"><?php esc_html_e('Phone', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('email'); ?>"><?php esc_html_e('Email', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Divider Widget Class
 */
class WP_Widget_Custom_Divider extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_divider_entries', 
			'description' => 	esc_html__('Divider for widgets rows', 'cmsmasters') 
		);
		
		parent::__construct('custom-divider', esc_attr__('Divider', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
        $divider = isset($instance['divider']) ? $instance['divider'] : false;
        $divider_bdr = isset($instance['divider_bdr']) ? $instance['divider_bdr'] : 'solid';
		
		if ($divider) {
			echo '<div class="cmsms_widget_divider ' . esc_attr($divider_bdr) . '"></div>';
		} else {
			echo '<div class="cl"></div>';
		}
    }
	
	function update($new_instance, $old_instance) {
		$new_instance = (array) $new_instance;
		
		$instance = array( 
			'divider' => 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		$instance['divider_bdr'] = strip_tags($new_instance['divider_bdr']);
		
		return $instance;
	}
	
	function form($instance) {
		$instance = wp_parse_args((array) $instance, array( 
			'divider' => false 
		) );
		$divider_bdr = isset($instance['divider_bdr']) ? esc_attr($instance['divider_bdr']) : 'solid';
        ?>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['divider'], true); ?> id="<?php echo $this->get_field_id('divider'); ?>" name="<?php echo $this->get_field_name('divider'); ?>" /> 
			<label for="<?php echo $this->get_field_id('divider'); ?>"><?php esc_html_e('Show Divider Line', 'cmsmasters'); ?></label>
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('divider_bdr'); ?>"><?php esc_html_e('Divider Type', 'cmsmasters'); ?>:<br />
				<select class="widefat" id="<?php echo $this->get_field_id('divider_bdr'); ?>" name="<?php echo $this->get_field_name('divider_bdr'); ?>">
					<option value="solid"<?php if ($divider_bdr == 'solid') { echo ' selected="selected"'; } ?>><?php esc_html_e('Solid Line', 'cmsmasters'); ?></option>
					<option value="dashed"<?php if ($divider_bdr == 'dashed') { echo ' selected="selected"'; } ?>><?php esc_html_e('Dashed Line', 'cmsmasters'); ?></option>
					<option value="dotted"<?php if ($divider_bdr == 'dotted') { echo ' selected="selected"'; } ?>><?php esc_html_e('Dotted Line', 'cmsmasters'); ?></option>
					<option value="transparent"<?php if ($divider_bdr == 'transparent') { echo ' selected="selected"'; } ?>><?php esc_html_e('Transparent Line', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
		<?php
	}
}


/**
 * Embedded Video Widget Class
 */
class WP_Widget_Custom_Video extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_video_entries', 
			'description' => 	esc_attr__('Video from youtube, vimeo or dailymotion', 'cmsmasters') 
		);
		
		parent::__construct('custom-video', esc_attr__('Embedded Widget', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		global $wp_embed;
		
		$wrap_embed = isset($instance['wrap_embed']) ? $instance['wrap_embed'] : true;
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Embedded Widget', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
        $url = isset($instance['url']) ? $instance['url'] : '';
        $width = isset($instance['width']) ? $instance['width'] : '';
        $height = isset($instance['height']) ? $instance['height'] : '';
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		if ($url != '') {
			if ($wrap_embed) {
				echo '<div class="cmsms_video_wrap">';
			}
			
			echo $wp_embed->run_shortcode('[embed' . 
				(($width != '' && $wrap_embed == '') ? ' width="' . esc_attr($width) . '"' : '') . 
				(($height != '' && $wrap_embed == '') ? ' height="' . esc_attr($height) . '"' : '') . 
			']' . esc_url($url) . '[/embed]');
			
			if ($wrap_embed) {
				echo '</div>';
			}
		}
		
        echo $after_widget;
    }
	
	function update($new_instance, $old_instance) {
		$new_instance = (array) $new_instance;
		
		$instance = array( 
			'wrap_embed' => 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
        $instance['width'] = strip_tags($new_instance['width']);
        $instance['height'] = strip_tags($new_instance['height']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$url = isset($instance['url']) ? esc_attr($instance['url']) : '';
		$width = isset($instance['width']) ? esc_attr($instance['width']) : '';
		$height = isset($instance['height']) ? esc_attr($instance['height']) : '';
		$instance = wp_parse_args((array) $instance, array( 
			'wrap_embed' => true 
		) );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('url'); ?>"><?php esc_html_e('Embed URL', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('width'); ?>"><?php esc_html_e('Max Width', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('height'); ?>"><?php esc_html_e('Max Height', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" />
            </label>
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['wrap_embed'], true); ?> id="<?php echo $this->get_field_id('wrap_embed'); ?>" name="<?php echo $this->get_field_name('wrap_embed'); ?>" /> 
			<label for="<?php echo $this->get_field_id('wrap_embed'); ?>"><?php esc_html_e('If checked, ignore default video height/max-height and set a 16:9 proportion instead', 'cmsmasters'); ?></label>
		</p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Facebook Widget Class
 */
class WP_Widget_Custom_Facebook extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_facebook_entries', 
			'description' => 	esc_attr__('Your Facebook like box', 'cmsmasters') 
		);
		
		parent::__construct('custom-facebook', esc_attr__('Facebook', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Facebook', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
		$url = isset($instance['url']) ? $instance['url'] : '';
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		echo '<iframe src="//www.facebook.com/plugins/likebox.php?href=' . urlencode(esc_url($url)) . '&amp;width=100&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23ffffff&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; background:#ffffff; overflow:hidden; width:100%; height:258px;" allowTransparency="true"></iframe>' . 
		'<div class="cl"></div>' . 
		$after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $url = isset($instance['url']) ? esc_attr($instance['url']) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('url'); ?>"><?php esc_html_e('Facebook Page URL', 'cmsmasters'); ?> :<br />
                <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Flickr Widget Class
 */
class WP_Widget_Custom_Flickr extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_flickr_entries', 
			'description' => 	esc_attr__('Your Flickr account latest images', 'cmsmasters') 
		);
		
		parent::__construct('custom-flickr', esc_attr__('Flickr', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Flickr', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
		$user = isset($instance['user']) ? $instance['user'] : '';
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 6;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
		echo $before_widget . 
			'<div id="flickr">';
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		echo '<div class="wrap">' . 
				'<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=' . esc_attr($number) . '&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=' . esc_attr($user) . '"></script>' . 
			'</div>' . 
			'<div class="cl"></div>' . 
			'<a href="http://www.flickr.com/photos/' . esc_attr($user) . '" class="more_button" target="_blank"><span>' . esc_html__('More flickr images', 'cmsmasters') . '</span></a>' . 
			'</div>' . 
		$after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['user'] = strip_tags($new_instance['user']);
        $instance['number'] = absint($new_instance['number']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $user = isset($instance['user']) ? esc_attr($instance['user']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 6;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('user'); ?>"><?php esc_html_e('Flickr ID', 'cmsmasters'); ?> (<a href="http://www.idgettr.com" target="_blank">idGettr</a>):<br />
                <input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo $user; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e("Enter the number of latest flickr images you'd like to display", 'cmsmasters'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small class="s_red"><?php esc_html_e('default is', 'cmsmasters'); ?> 6</small><br />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * HTML5 Audio Widget Class
 */
class WP_Widget_Custom_HTML5_Audio extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_html5_audio_entries', 
			'description' => 	esc_attr__('Your HTML5 Audio', 'cmsmasters') 
		);
		
		$control_ops = array( 
			'width' => 	600 
		);
		
		parent::__construct('custom-html5-audio', esc_attr__('HTML5 Audio', 'cmsmasters'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('HTML5 Audio', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
        $srcmp3 = isset($instance['srcmp3']) ? $instance['srcmp3'] : '';
        $srcogg = isset($instance['srcogg']) ? $instance['srcogg'] : '';
        $srcwebm = isset($instance['srcwebm']) ? $instance['srcwebm'] : '';
        $preload = isset($instance['preload']) ? $instance['preload'] : 'none';
        $autoplay = isset($instance['autoplay']) ? $instance['autoplay'] : false;
        $loop = isset($instance['loop']) ? $instance['loop'] : false;
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		$attrs = array( 
			'preload' => esc_attr($preload) 
		);
		
		if ($autoplay) {
			$attrs['autoplay'] = 'on';
		}
		
		if ($loop) {
			$attrs['loop'] = 'on';
		}
		
		if ($srcmp3 != '') {
			$attrs[substr(strrchr($srcmp3, '.'), 1)] = esc_url($srcmp3);
		}
		
		if ($srcogg != '') {
			$attrs[substr(strrchr($srcogg, '.'), 1)] = esc_url($srcogg);
		}
		
		if ($srcwebm != '') {
			$attrs[substr(strrchr($srcwebm, '.'), 1)] = esc_url($srcwebm);
		}
		
		$out = '<div class="cmsms_audio">' . 
			wp_audio_shortcode($attrs) . 
		'</div>';
		
		echo $out . 
		$after_widget;
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance = array( 
			'autoplay' 	=> 0, 
			'loop' 		=> 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['srcmp3'] = strip_tags($new_instance['srcmp3']);
        $instance['srcogg'] = strip_tags($new_instance['srcogg']);
		$instance['srcwebm'] = strip_tags($new_instance['srcwebm']);
		$instance['preload'] = strip_tags($new_instance['preload']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$srcmp3 = isset($instance['srcmp3']) ? esc_attr($instance['srcmp3']) : '';
		$srcogg = isset($instance['srcogg']) ? esc_attr($instance['srcogg']) : '';
		$srcwebm = isset($instance['srcwebm']) ? esc_attr($instance['srcwebm']) : '';
		$preload = isset($instance['preload']) ? esc_attr($instance['preload']) : 'none';
		
		$instance = wp_parse_args((array) $instance, array( 
			'autoplay' 	=> false, 
			'loop' 		=> false 
		) );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('srcmp3'); ?>"><?php echo esc_html__('Audio', 'cmsmasters') . ' .mp3 ' . esc_html__('File Format URL', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('srcmp3'); ?>" name="<?php echo $this->get_field_name('srcmp3'); ?>" type="text" value="<?php echo $srcmp3; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('srcogg'); ?>"><?php echo esc_html__('Audio', 'cmsmasters') . ' .ogg ' . esc_html__('File Format URL', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('srcogg'); ?>" name="<?php echo $this->get_field_name('srcogg'); ?>" type="text" value="<?php echo $srcogg; ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('srcwebm'); ?>"><?php echo esc_html__('Audio', 'cmsmasters') . ' .webm ' . esc_html__('File Format URL', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('srcwebm'); ?>" name="<?php echo $this->get_field_name('srcwebm'); ?>" type="text" value="<?php echo $srcwebm; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('preload'); ?>"><?php esc_html_e('Preload', 'cmsmasters'); ?>:<br />
				<select class="widefat" id="<?php echo $this->get_field_id('preload'); ?>" name="<?php echo $this->get_field_name('preload'); ?>">
					<option value="none"<?php if ($preload == 'none') { echo ' selected="selected"'; } ?>><?php esc_html_e('Not Preload', 'cmsmasters'); ?></option>
					<option value="auto"<?php if ($preload == 'auto') { echo ' selected="selected"'; } ?>><?php esc_html_e('Preload Auto', 'cmsmasters'); ?></option>
					<option value="metadata"<?php if ($preload == 'metadata') { echo ' selected="selected"'; } ?>><?php esc_html_e('Preload as Metadata', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
		<p class="l_half">
			<input class="checkbox" type="checkbox" <?php checked($instance['autoplay'], true); ?> id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>" /> 
			<label for="<?php echo $this->get_field_id('autoplay'); ?>"><?php esc_html_e('Enable Autoplay', 'cmsmasters'); ?></label>
		</p>
		<p class="r_half">
			<input class="checkbox" type="checkbox" <?php checked($instance['loop'], true); ?> id="<?php echo $this->get_field_id('loop'); ?>" name="<?php echo $this->get_field_name('loop'); ?>" /> 
			<label for="<?php echo $this->get_field_id('loop'); ?>"><?php esc_html_e('Enable Repeat', 'cmsmasters'); ?></label>
		</p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * HTML5 Video Widget Class
 */
class WP_Widget_Custom_HTML5_Video extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_html5_video_entries', 
			'description' => 	esc_attr__('Your HTML5 Video', 'cmsmasters') 
		);
		
		$control_ops = array( 
			'width' => 	600 
		);
		
		parent::__construct('custom-html5-video', esc_attr__('HTML5 Video', 'cmsmasters'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('HTML5 Video', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
        $srcmp4 = isset($instance['srcmp4']) ? $instance['srcmp4'] : '';
        $srcogg = isset($instance['srcogg']) ? $instance['srcogg'] : '';
        $srcwebm = isset($instance['srcwebm']) ? $instance['srcwebm'] : '';
        $poster = isset($instance['poster']) ? $instance['poster'] : '';
        $text = (isset($instance['text']) && $instance['text'] != '') ? $instance['text'] : esc_html__('Your browser does not support the video tag.', 'cmsmasters');
        $preload = isset($instance['preload']) ? $instance['preload'] : 'none';
        $loop = isset($instance['loop']) ? $instance['loop'] : false;
        $autoplay = isset($instance['autoplay']) ? $instance['autoplay'] : false;
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		$out = '<div class="cmsms_video_wrap">';
		
		$attrs = array( 
			'preload' => esc_attr($preload) 
		);
		
		if ($poster != '') {
			$attrs['poster'] = esc_url($poster);
		}
		
		if ($autoplay) {
			$attrs['autoplay'] = 'on';
		}
		
		if ($loop) {
			$attrs['loop'] = 'on';
		}
		
		if ($srcmp4 != '') {
			$attrs[substr(strrchr($srcmp4, '.'), 1)] = esc_url($srcmp4);
		}
		
		if ($srcogg != '') {
			$attrs[substr(strrchr($srcogg, '.'), 1)] = esc_url($srcogg);
		}
		
		if ($srcwebm != '') {
			$attrs[substr(strrchr($srcwebm, '.'), 1)] = esc_url($srcwebm);
		}
		
		$out .= '<div class="cmsms_video">' . 
				wp_video_shortcode($attrs) . 
			'</div>' . 
		'</div>';
		
		echo $out . 
		$after_widget;
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance = array( 
			'autoplay' 	=> 0, 
			'loop' 		=> 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['srcmp4'] = strip_tags($new_instance['srcmp4']);
        $instance['srcogg'] = strip_tags($new_instance['srcogg']);
		$instance['srcwebm'] = strip_tags($new_instance['srcwebm']);
		$instance['poster'] = strip_tags($new_instance['poster']);
		$instance['text'] = strip_tags($new_instance['text']);
		$instance['preload'] = strip_tags($new_instance['preload']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$srcmp4 = isset($instance['srcmp4']) ? esc_attr($instance['srcmp4']) : '';
		$srcogg = isset($instance['srcogg']) ? esc_attr($instance['srcogg']) : '';
		$srcwebm = isset($instance['srcwebm']) ? esc_attr($instance['srcwebm']) : '';
		$poster = isset($instance['poster']) ? esc_attr($instance['poster']) : '';
		$text = (isset($instance['text']) && $instance['text'] != '') ? esc_attr($instance['text']) : esc_attr__('Your browser does not support the video tag.', 'cmsmasters');
		$preload = isset($instance['preload']) ? esc_attr($instance['preload']) : 'none';
		
		$instance = wp_parse_args((array) $instance, array( 
			'autoplay' 	=> false, 
			'loop' 		=> false 
		) );
        ?>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('srcmp4'); ?>"><?php echo esc_html__('Video', 'cmsmasters') . ' .mp4 ' . esc_html__('File Format Source', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('srcmp4'); ?>" name="<?php echo $this->get_field_name('srcmp4'); ?>" type="text" value="<?php echo $srcmp4; ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('srcogg'); ?>"><?php echo esc_html__('Video', 'cmsmasters') . ' .ogg ' . esc_html__('File Format Source', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('srcogg'); ?>" name="<?php echo $this->get_field_name('srcogg'); ?>" type="text" value="<?php echo $srcogg; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('srcwebm'); ?>"><?php echo esc_html__('Video', 'cmsmasters') . ' .webm ' . esc_html__('File Format Source', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('srcwebm'); ?>" name="<?php echo $this->get_field_name('srcwebm'); ?>" type="text" value="<?php echo $srcwebm; ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo $this->get_field_id('poster'); ?>"><?php esc_html_e('Poster URL', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('poster'); ?>" name="<?php echo $this->get_field_name('poster'); ?>" type="text" value="<?php echo $poster; ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo $this->get_field_id('preload'); ?>"><?php esc_html_e('Preload', 'cmsmasters'); ?>:<br />
				<select class="widefat" id="<?php echo $this->get_field_id('preload'); ?>" name="<?php echo $this->get_field_name('preload'); ?>">
					<option value="none"<?php if ($preload == 'none') { echo ' selected="selected"'; } ?>><?php esc_html_e('Not Preload', 'cmsmasters'); ?></option>
					<option value="auto"<?php if ($preload == 'auto') { echo ' selected="selected"'; } ?>><?php esc_html_e('Preload Auto', 'cmsmasters'); ?></option>
					<option value="metadata"<?php if ($preload == 'metadata') { echo ' selected="selected"'; } ?>><?php esc_html_e('Preload as Metadata', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p class="l_half">
			<input class="checkbox" type="checkbox" <?php checked($instance['autoplay'], true); ?> id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>" /> 
			<label for="<?php echo $this->get_field_id('autoplay'); ?>"><?php esc_html_e('Enable Autoplay', 'cmsmasters'); ?></label>
        </p>
        <p class="r_half">
			<input class="checkbox" type="checkbox" <?php checked($instance['loop'], true); ?> id="<?php echo $this->get_field_id('loop'); ?>" name="<?php echo $this->get_field_name('loop'); ?>" /> 
			<label for="<?php echo $this->get_field_id('loop'); ?>"><?php esc_html_e('Enable Repeat', 'cmsmasters'); ?></label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Latest Projects Widget Class
 */
class WP_Widget_Custom_Latest_Projects extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_latest_projects_entries', 
			'description' => 	esc_attr__('Latest projects from your portfolio', 'cmsms_content_composer') 
		);
		
		parent::__construct('custom-latest-projects', esc_attr__('Latest Projects', 'cmsms_content_composer'), $widget_ops);
	}
	
    function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Latest Projects', 'cmsms_content_composer') : $instance['title'], $instance, $this->id_base);
		$type = isset($instance['type']) ? $instance['type'] : '';
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
        $autoplay = isset($instance['autoplay']) ? $instance['autoplay'] : false;
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
        $queryArgs = array( 
			'posts_per_page' => 		$number, 
			'post_status' => 			'publish', 
			'ignore_sticky_posts' => 	1, 
			'post_type' => 				'project' 
		);
		
		if ($type != '') {
            $queryArgs['tax_query'] = array(
                array( 
                    'taxonomy' => 	'pj-categs', 
                    'field' => 		'slug', 
                    'terms' => 		$type 
                )
            );
		}
		
        $lp = new WP_Query($queryArgs);
		
        if ($lp->have_posts()) { 
			echo $before_widget . 
				'<script type="text/javascript">' . 
					'jQuery(document).ready(function () { ' . 
						'jQuery("#' . $args['widget_id'] . ' .owl-carousel"' . ').owlCarousel( { ' . 
							'singleItem : true, ' . 
							'slideSpeed : 800, ' . 
							(($autoplay == true) ? 'autoPlay : true, ' : '') . 
							'pagination: false, ' . 
							'navigation : true, ' . 
							'navigationText : 	[ ' . 
								'"<span class=\"cmsms_prev_arrow\"></span>", ' . 
								'"<span class=\"cmsms_next_arrow\"></span>" ' . 
							'] ' . 
						'} );' . 
					'} ); ' . 
				'</script>';
			
			if ($title) { 
				echo $before_title . $title . $after_title;
			}
			
			echo '<div class="widget_custom_projects_entries_slides owl-carousel ' . esc_attr($autoplay) . '">';
			
            while ($lp->have_posts()) : $lp->the_post();
				$pj_format = get_post_format();
				
				$img_number_list = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsms_project_images', true))));
				
				echo '<div class="latest_pj_item">';
				
				if ($pj_format == 'video') {
					echo '<div class="latest_pj_img">' . 
						'<span class="img_placeholder cmsms_theme_icon_video"></span>' . 
					'</div>';
				} else {
					if (has_post_thumbnail()) {
						echo '<div class="latest_pj_img">' . 
							get_the_post_thumbnail(get_the_ID(), 'blog-masonry-thumb', array( 
								'class' => 'full-width', 
								'alt' => cmsms_title(get_the_ID(), false), 
								'title' => cmsms_title(get_the_ID(), false), 
								'style' => 'width:100%; height:auto;' 
							)) . 
						'</div>';
					} elseif (sizeof($img_number_list) > 0) {
						echo '<div class="latest_pj_img">' . 
							wp_get_attachment_image($img_number_list[0], 'blog-masonry-thumb', false, array( 
								'class' => 'full-width', 
								'alt' => cmsms_title(get_the_ID(), false), 
								'title' => cmsms_title(get_the_ID(), false), 
								'style' => 'width:100%; height:auto;' 
							)) . 
						'</div>';
					} else {
						echo '<div class="latest_pj_img">' . 
							'<span class="img_placeholder cmsms_theme_icon_photo"></span>' . 
						'</div>';
					}
				}
				
				echo '<div class="latest_pj_content_wrap">' . 
					'<header class="entry-header">';
					
						cmsms_widget_like('l_projects');
						
						echo '<h5 class="entry-title">' . 
							'<a href="' . esc_url(get_permalink()) . '" title="' . cmsms_title(get_the_ID(), false) . '">' . cmsms_title(get_the_ID(), false) . '</a>' . 
						'</h5>' . 
					'</header>';
					
					cmsms_widget_category(get_the_ID(), 'pj-categs', 'l_projects'); 
					
				echo'</div>' . 
			'</div>';
			endwhile;
			
			echo '</div>' . 
			$after_widget;
        }
		
		wp_reset_postdata();
		
		wp_reset_query();
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['type'] = $new_instance['type'];
        $instance['number'] = absint($new_instance['number']);
		
		$instance['autoplay'] = 0;
		
		if ($new_instance['autoplay']) {
			$instance['autoplay'] = 1;
		}
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $type = isset($instance['type']) ? esc_attr($instance['type']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
		$instance = wp_parse_args((array) $instance, array( 
			'autoplay' => false 
		) );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('type'); ?>"><?php esc_html_e('Show Only from Projects Type', 'cmsms_content_composer'); ?>:<br />
                <select id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>" class="widefat">
                    <option value=""><?php esc_html_e('Show all projects', 'cmsms_content_composer'); ?>&nbsp;</option>
				<?php 
					$pj_categs = get_terms('pj-categs', 'orderby=name&hide_empty=0');
					
					if (sizeof($pj_categs) > 0) {
						foreach($pj_categs as $pj_categ) {
							if ($type == $pj_categ->slug) {
								echo '<option value="' . esc_attr($pj_categ->slug) . '" selected="selected">' . $pj_categ->name . '&nbsp;</option>';
							} else {
								echo '<option value="' . esc_attr($pj_categ->slug) . '">' . $pj_categ->name . '&nbsp;</option>';
							}
						}
					}
				?>
                </select>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e("Enter the number of latest projects you'd like to display", 'cmsms_content_composer'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small class="s_red"><?php esc_html_e('default is', 'cmsms_content_composer'); ?> 3</small><br />
            </label>
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['autoplay'], true); ?> id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>" /> 
			<label for="<?php echo $this->get_field_id('autoplay'); ?>"><?php esc_html_e('Autoplay', 'cmsmasters'); ?></label>
		</p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Popular Projects Widget Class
 */
class WP_Widget_Custom_Popular_Projects extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_popular_projects_entries', 
			'description' => 	esc_attr__('Popular projects from your portfolio', 'cmsms_content_composer') 
		);
		
		parent::__construct('custom-popular-projects', esc_attr__('Popular Projects', 'cmsms_content_composer'), $widget_ops);
	}
	
    function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Popular Projects', 'cmsms_content_composer') : $instance['title'], $instance, $this->id_base);
		$type = isset($instance['type']) ? $instance['type'] : '';
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
        $autoplay = isset($instance['autoplay']) ? $instance['autoplay'] : false;
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
        $queryArgs = array( 
			'posts_per_page' => 		$number, 
			'post_status' => 			'publish', 
			'ignore_sticky_posts' => 	1, 
			'post_type' => 				'project', 
			'order' => 					'DESC', 
			'orderby' => 				'meta_value', 
			'meta_key' => 				'cmsms_likes' 
		);
		
		if ($type != '') {
            $queryArgs['tax_query'] = array(
                array( 
                    'taxonomy' => 	'pj-categs', 
                    'field' => 		'slug', 
                    'terms' => 		array($type) 
                )
            );
		}
		
        $pp = new WP_Query($queryArgs);
		
        if ($pp->have_posts()) { 
			echo $before_widget . 
				'<script type="text/javascript">' . 
					'jQuery(document).ready(function () { ' . 
						'jQuery("#' . $args['widget_id'] . ' .owl-carousel").owlCarousel( { ' . 
							'singleItem : true, ' . 
							'slideSpeed : 800, ' . 
							(($autoplay) ? 'autoPlay : true, ' : '') . 
							'pagination: false, ' . 
							'navigation : true, ' . 
							'navigationText : 	[ ' . 
								'"<span class=\"cmsms_prev_arrow\"></span>", ' . 
								'"<span class=\"cmsms_next_arrow\"></span>" ' . 
							'] ' . 
						'} );' . 
					'} ); ' . 
				'</script>';
			
			if ($title) { 
				echo $before_title . $title . $after_title;
			}
			
			echo '<div class="widget_custom_projects_entries_slides owl-carousel">';
			
            while ($pp->have_posts()) : $pp->the_post();
				$pj_format = get_post_meta(get_the_ID(), 'pt_format', true);
				
				$img_number_list = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsms_project_images', true))));
				
				echo '<div class="popular_pj_item">';
				
				if ($pj_format == 'video') {
					echo '<div class="popular_pj_img">' . 
						'<span class="img_placeholder cmsms_theme_icon_video"></span>' . 
					'</div>';
				} else {
					if (has_post_thumbnail()) {
						echo '<div class="popular_pj_img">' . 
							get_the_post_thumbnail(get_the_ID(), 'blog-masonry-thumb', array( 
								'class' => 'full-width', 
								'alt' => cmsms_title(get_the_ID(), false), 
								'title' => cmsms_title(get_the_ID(), false), 
								'style' => 'width:100%; height:auto;' 
							)) . 
						'</div>';
					} elseif (sizeof($img_number_list) > 0 && $img_number_list[0] != '') {
						echo '<div class="popular_pj_img ' . $img_number_list[0] . '">' . 
							wp_get_attachment_image($img_number_list[0], 'blog-masonry-thumb', false, array( 
								'class' => 'full-width', 
								'alt' => cmsms_title(get_the_ID(), false), 
								'title' => cmsms_title(get_the_ID(), false), 
								'style' => 'width:100%; height:auto;' 
							)) . 
						'</div>';
					} else {
						echo '<div class="popular_pj_img">' . 
							'<span class="img_placeholder cmsms_theme_icon_photo"></span>' .  
						'</div>';
					}
				}
				
				echo '<div class="pj_ddn">' . 
					'<header class="entry-header">';
						
						cmsms_widget_like('l_projects');
						
						echo '<h5 class="entry-title">' . 
							'<a href="' . esc_url(get_permalink()) . '" title="' . cmsms_title(get_the_ID(), false) . '">' . cmsms_title(get_the_ID(), false) . '</a>' . 
						'</h5>' . 
					'</header>';
					
					cmsms_widget_category(get_the_ID(), 'pj-categs', 'l_projects'); 
					
				echo'</div>' . 
			'</div>';
			endwhile;
			
			echo '</div>' . 
			$after_widget;
        }
		
		wp_reset_postdata();
		
		wp_reset_query();
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['type'] = $new_instance['type'];
        $instance['number'] = absint($new_instance['number']);
		
		$instance['autoplay'] = 0;
		
		if ($new_instance['autoplay']) {
			$instance['autoplay'] = 1;
		}
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $type = isset($instance['type']) ? esc_attr($instance['type']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
		$instance = wp_parse_args((array) $instance, array( 
			'autoplay' => false 
		) );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('type'); ?>"><?php esc_html_e('Show Only from Projects Type', 'cmsms_content_composer'); ?>:<br />
                <select id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>" class="widefat">
                    <option value=""><?php esc_html_e('Show all projects', 'cmsms_content_composer'); ?>&nbsp;</option>
				<?php 
					$pj_categs = get_terms('pj-categs', 'orderby=name&hide_empty=0');
					
					if (sizeof($pj_categs) > 0) {
						foreach($pj_categs as $pj_categ) {
							if ($type == $pj_categ->slug) {
								echo '<option value="' . esc_attr($pj_categ->slug) . '" selected="selected">' . $pj_categ->name . '&nbsp;</option>';
							} else {
								echo '<option value="' . esc_attr($pj_categ->slug) . '">' . $pj_categ->name . '&nbsp;</option>';
							}
						}
					}
				?>
                </select>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e("Enter the number of popular projects you'd like to display", 'cmsms_content_composer'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small class="s_red"><?php esc_html_e('default is', 'cmsms_content_composer'); ?> 3</small><br />
            </label>
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['autoplay'], true); ?> id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>" /> 
			<label for="<?php echo $this->get_field_id('autoplay'); ?>"><?php esc_html_e('Autoplay', 'cmsmasters'); ?></label>
		</p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Posts Tabs Widget Class
 */
class WP_Widget_Custom_Posts_Tabs extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_posts_tabs_entries', 
			'description' => 	esc_attr__('Latest, popular posts & recent comments', 'cmsmasters') 
		);
		
		parent::__construct('custom-posts-tabs', esc_attr__('Posts Tabs', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$latest = isset($instance['latest']) ? $instance['latest'] : true;
		$popular = isset($instance['popular']) ? $instance['popular'] : true;
		$recent = isset($instance['recent']) ? $instance['recent'] : true;
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		echo '<div class="cmsms_tabs lpr">' . 
				'<ul class="cmsms_tabs_list">';
		
		if ($latest) {
			echo '<li class="cmsms_tabs_list_item current_tab">' . 
				'<a href="#"><span>' . esc_html__('Latest', 'cmsmasters') . '</span></a>' . 
			'</li>'; 
		}
		
		if ($popular) {
			echo '<li class="cmsms_tabs_list_item' . ((!$latest) ? ' current_tab' : '') . '">' . 
				'<a href="#"><span>' . esc_html__('Popular', 'cmsmasters') . '</span></a>' . 
			'</li>'; 
		}
		
		if ($recent) {
			echo '<li class="cmsms_tabs_list_item' . ((!$latest && !$popular) ? ' current_tab' : '') . '">' . 
				'<a href="#"><span>' . esc_html__('Comments', 'cmsmasters') . '</span></a>' . 
			'</li>'; 
		}
		
		if (!$latest && !$popular && !$recent) {
			echo '<li class="cmsms_tabs_list_item">' . 
				'<a href="#"><span>' . esc_html__('Latest', 'cmsmasters') . '</span></a>' . 
			'</li>'; 
		}
		
		echo '</ul>' . 
		'<div class="cmsms_tabs_wrap">';
		
		$pt_format = get_post_format();
		
		if ($pt_format == 'aside') {
			$widget_icon = 'cmsms_theme_icon_megaphone';
		} elseif ($pt_format == 'audio') {
			$widget_icon = 'cmsms_theme_icon_music';
		} elseif ($pt_format == 'chat') {
			$widget_icon = 'cmsms_theme_icon_star';
		} elseif ($pt_format == 'gallery') {
			$widget_icon = 'cmsms_theme_icon_camera';
		} elseif ($pt_format == 'image') {
			$widget_icon = 'cmsms_theme_icon_photo';
		} elseif ($pt_format == 'link') {
			$widget_icon = 'cmsms_theme_icon_globe';
		} elseif ($pt_format == 'quote') {
			$widget_icon = 'cmsms_theme_icon_comment';
		} elseif ($pt_format == 'status') {
			$widget_icon = 'cmsms_theme_icon_user';
		} elseif ($pt_format == 'video') {
			$widget_icon = 'cmsms_theme_icon_videocam';
		} else {
			$widget_icon = 'cmsms_theme_icon_desktop';
		}
		
		if ($latest) {
			$l = new WP_Query(array( 
				'posts_per_page' => 		$number, 
				'post_status' => 			'publish', 
				'ignore_sticky_posts' => 	1, 
				'post_type' => 				'post' 
			));
			
			if ($l->have_posts()) { 
				echo '<div class="cmsms_tab tab_latest">' . 
					'<ul>';
				
				while ($l->have_posts()) : $l->the_post();
					
					$attachments = get_children(array(
						'post_type' => 			'attachment', 
						'post_mime_type' => 	'image', 
						'post_parent' => 		get_the_ID(), 
						'orderby' => 			'menu_order', 
						'order' => 				'ASC' 
					));
					
					$post_link_text = get_post_meta(get_the_ID(), 'cmsms_post_link_text', true);
					$post_link_link = get_post_meta(get_the_ID(), 'cmsms_post_link_link', true);
					
					
					echo '<li>';
					
					if ($pt_format == 'image' || $pt_format == 'gallery') {
						echo '<div class="alignleft">';
						
						if (has_post_thumbnail()) {
							cmsms_thumb(get_the_ID(), array(50, 50), true, false, false, false, false, true, false);
						} elseif (!has_post_thumbnail() && sizeof($attachments) > 0) {
							if (isset($att_counter)) {
								unset($att_counter);
							}
							
							foreach ($attachments as $attachment) { 
								if (!isset($att_counter) && $att_counter = true) { 
									cmsms_thumb(get_the_ID(), array(50, 50), true, false, false, false, false, true, $attachment->ID);
								}
							}
						} else {
							echo '<a href="' . esc_url(get_permalink()) . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
									'<span class="img_placeholder_small ' . $widget_icon . '"></span>' . 
								'</a>';
						}
						
						echo '</div>';
					} else {
						echo '<div class="alignleft">';
						
						if (has_post_thumbnail() && $pt_format != 'video') {
							cmsms_thumb(get_the_ID(), array(50, 50), true, false, false, false, false, true, false);
						} else {
							echo '<a href="' . esc_url(get_permalink()) . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
									'<span class="img_placeholder_small ' . $widget_icon . '"></span>' . 
								'</a>';
						}
						
						echo '</div>';
					}
					
					echo '<div class="ovh">';
					
					if ($pt_format != 'aside' && $pt_format != 'link' && $pt_format != 'quote') {
						echo '<a href="' . esc_url(get_permalink()) . '" title="' . cmsms_title(get_the_ID(), false) . '">' . cmsms_title(get_the_ID(), false) . '</a>' . 
						'<br />' . 
						'<small>' . 
							'<abbr class="published" title="' . esc_attr(get_the_time('d-m-Y')) . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . esc_html__('ago', 'cmsmasters') . '</abbr>' . 
						'</small>';
					} elseif ($pt_format == 'link') {
						echo '<a href="' . esc_url($post_link_link) . '" title="' . esc_attr($post_link_text) . '">' . $post_link_text . '</a>' . 
						'<br />' . 
						'<small>' . 
							'<abbr class="published" title="' . esc_attr(get_the_time('d-m-Y')) . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . esc_html__('ago', 'cmsmasters') . '</abbr>' . 
						'</small>';
					} elseif ($pt_format == 'aside') {
						echo '<div class="entry-content">';
						
						theme_excerpt(10);
						
						echo '</div>' . 
						'<small>' . 
							'<abbr class="published" title="' . esc_attr(get_the_time('d-m-Y')) . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . esc_html__('ago', 'cmsmasters') . '</abbr>' . 
						'</small>';
					} elseif ($pt_format == 'quote') {
						echo '<div class="entry-content">';
						
						theme_excerpt(10);
						
						echo '</div>' . 
						'<small>' . 
							'<abbr class="published" title="' . esc_attr(get_the_time('d-m-Y')) . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . esc_html__('ago', 'cmsmasters') . '</abbr>' . 
						'</small>';
					}
					
					echo '</div>' . 
						'<div class="cl"></div>' . 
					'</li>';
				endwhile;
				
				echo '</ul>' . 
				'</div>';
			}
			
			wp_reset_postdata();
			
			wp_reset_query();
		}
		
		if ($popular) {
			$p = new WP_Query(array( 
				'posts_per_page' => 		$number, 
				'post_status' => 			'publish', 
				'ignore_sticky_posts' => 	1, 
				'post_type' => 				'post', 
				'order' => 					'DESC', 
				'orderby' => 				'meta_value', 
				'meta_key' => 				'cmsms_likes' 
			));
			
			if ($p->have_posts()) { 
				echo '<div class="cmsms_tab tab_popular">' . 
					'<ul>';
				
				while ($p->have_posts()) : $p->the_post();
					$pt_format = get_post_format();
					
					$attachments = get_children(array(
						'post_type' => 			'attachment', 
						'post_mime_type' => 	'image', 
						'post_parent' => 		get_the_ID(), 
						'orderby' => 			'menu_order', 
						'order' => 				'ASC' 
					));
					
					$post_link_text = get_post_meta(get_the_ID(), 'cmsms_post_link_text', true);
					$post_link_link = get_post_meta(get_the_ID(), 'cmsms_post_link_link', true);
					
					echo '<li>';
					
					if ($pt_format == 'image' || $pt_format == 'gallery') {
						echo '<div class="alignleft">';
						
						if (has_post_thumbnail()) {
							cmsms_thumb(get_the_ID(), array(50, 50), true, false, false, false, false, true, false);
						} elseif (!has_post_thumbnail() && sizeof($attachments) > 0) {
							if (isset($att_counter)) {
								unset($att_counter);
							}
							
							foreach ($attachments as $attachment) { 
								if (!isset($att_counter) && $att_counter = true) { 
									cmsms_thumb(get_the_ID(), array(50, 50), true, false, false, false, false, true, $attachment->ID);
								}
							}
						} else {
							echo '<a href="' . esc_url(get_permalink()) . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
									'<span class="img_placeholder_small ' . $widget_icon . '"></span>' . 
								'</a>';
						}
						
						echo '</div>';
					} else {
						echo '<div class="alignleft">';
						
						if (has_post_thumbnail() && $pt_format != 'video') {
							cmsms_thumb(get_the_ID(), array(50, 50), true, false, false, false, false, true, false);
						} else {
							echo '<a href="' . esc_url(get_permalink()) . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
									'<span class="img_placeholder_small ' . $widget_icon . '"></span>' . 
								'</a>';
						}
						
						echo '</div>';
					}
					
					echo '<div class="ovh">';
					
					if ($pt_format != 'aside' && $pt_format != 'link' && $pt_format != 'quote') {
						echo '<a href="' . esc_url(get_permalink()) . '" title="' . cmsms_title(get_the_ID(), false) . '">' . cmsms_title(get_the_ID(), false) . '</a>' . 
						'<br />' . 
						'<small>' . 
							'<abbr class="published" title="' . esc_attr(get_the_time('d-m-Y')) . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . esc_html__('ago', 'cmsmasters') . '</abbr>' . 
						'</small>';
					} elseif ($pt_format == 'link') {
						echo '<a href="' . esc_url($post_link_link) . '" title="' . esc_attr($post_link_text) . '">' . $post_link_text . '</a>' . 
						'<br />' . 
						'<small>' . 
							'<abbr class="published" title="' . esc_attr(get_the_time('d-m-Y')) . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . esc_html__('ago', 'cmsmasters') . '</abbr>' . 
						'</small>';
					} elseif ($pt_format == 'aside') {
						echo '<div class="entry-content">';
						
						theme_excerpt(10);
						
						echo '</div>' . 
						'<small>' . 
							'<abbr class="published" title="' . esc_attr(get_the_time('d-m-Y')) . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . esc_html__('ago', 'cmsmasters') . '</abbr>' . 
						'</small>';
					} elseif ($pt_format == 'quote') {
						echo '<div class="entry-content">';
						
						theme_excerpt(10);
						
						echo '</div>' . 
						'<small>' . 
							'<abbr class="published" title="' . esc_attr(get_the_time('d-m-Y')) . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . esc_html__('ago', 'cmsmasters') . '</abbr>' . 
						'</small>';
					}
					
					echo '</div>' . 
						'<div class="cl"></div>' . 
					'</li>';
				endwhile;
				
				echo '</ul>' . 
				'</div>';
			}
			
			wp_reset_postdata();
			
			wp_reset_query();
		}
		
		if ($recent) {
			$rcomments = get_comments(array( 
				'number' => 	$number, 
				'post_type' => 	'post', 
				'status' => 	'approve' 
			));
			
			if ($rcomments) { 
				echo '<div class="cmsms_tab tab_comments">' . 
					'<ul>';
				
				foreach ($rcomments as $comment) {
					$comment_post_ID = $comment->comment_post_ID;
					$comment_author = $comment->comment_author;
					$comment_author_url = $comment->comment_author_url;
					$comment_date = mysql2date('U', $comment->comment_date, false);
					$comment_content = $comment->comment_content;
					$comment_array = explode(' ', $comment_content);
					
					if (sizeof($comment_array) > 10) {
						$new_comment_content = '';
						
						for ($i = 0; $i < 10; $i++) {
							$new_comment_content .= $comment_array[$i] . ' ';
						}
						
						$new_comment_content = trim($new_comment_content) . '...';
					} else {
						$new_comment_content = $comment_content;
					}
					
					echo '<li>' . 
						(($comment_author_url != '') ? '<a href="' . esc_url($comment_author_url) . '" title="' . esc_attr($comment_author_url) . '" target="_blank">' : '') . $comment_author . (($comment_author_url != '') ? '</a>' : '') . 
						' <span class="color_2">' . esc_html__('on', 'cmsmasters') . '</span> <a href="' . get_permalink($comment_post_ID) . '#comments" rel="bookmark">' . cmsms_title($comment_post_ID, false) . '</a>' . 
						'<small>' . 
							'<abbr class="published" title="' . esc_attr(get_the_time('d-m-Y')) . '">' . human_time_diff($comment_date, current_time('timestamp')) . ' ' . esc_html__('ago', 'cmsmasters') . '</abbr>' . 
						'</small>' . 
						'<p>' . $new_comment_content . '</p>' . 
					'</li>';
				}
				
				echo '</ul>' . 
				'</div>';
			}
		}
		
		echo '</div>' . 
			'</div>' .
		$after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$new_instance = (array) $new_instance;
		
		$instance = array( 
			'latest' => 0, 
			'popular' => 0, 
			'recent' => 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		if ($new_instance['latest'] == '' && $instance['popular'] == '' && $instance['recent'] == '') {
			$instance['latest'] = 1;
		}
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$instance = wp_parse_args((array) $instance, array( 
			'latest' => true, 
			'popular' => true, 
			'recent' => true 
		) );
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['latest'], true); ?> id="<?php echo $this->get_field_id('latest'); ?>" name="<?php echo $this->get_field_name('latest'); ?>" /> 
			<label for="<?php echo $this->get_field_id('latest'); ?>"><?php esc_html_e('Latest Posts', 'cmsmasters'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['popular'], true); ?> id="<?php echo $this->get_field_id('popular'); ?>" name="<?php echo $this->get_field_name('popular'); ?>" /> 
			<label for="<?php echo $this->get_field_id('popular'); ?>"><?php esc_html_e('Popular Posts', 'cmsmasters'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['recent'], true); ?> id="<?php echo $this->get_field_id('recent'); ?>" name="<?php echo $this->get_field_name('recent'); ?>" /> 
			<label for="<?php echo $this->get_field_id('recent'); ?>"><?php esc_html_e('Recent Comments', 'cmsmasters'); ?></label>
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e("Enter the number of recent comments, popular and latest posts you'd like to display", 'cmsmasters'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small class="s_red"><?php esc_html_e('default is', 'cmsmasters'); ?> 3</small><br />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Twitter Widget Class
 */
class WP_Widget_Custom_Twitter extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_twitter_entries', 
			'description' => 	esc_attr__('Your Twitter account latest tweets', 'cmsmasters') 
		);
		
		parent::__construct('custom-twitter', esc_attr__('Twitter', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Twitter', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
		$user = isset($instance['user']) ? $instance['user'] : '';
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
		
		$uid = uniqid();
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 20) {
            $number = 20;
        }
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		if ($user != '') {
			$tweets = cmsms_get_tweets($user, $number);
			
			if ($tweets != '') {
				echo '<ul class="tweet_list">' . "\n";
				
				foreach ($tweets as $t) {
					echo '<li>' . "\n" . 
						'<span class="tweet_text">' . "\n" . $t['text'] . '</span>' . "\n" . 
						'<span class="tweet_time">' . human_time_diff($t['time'], current_time('timestamp')) . ' ' . esc_html__('ago', 'cmsms_content_composer') . '</span>' . "\n" . 
					'</li>' . "\n";
				}
			} else {
				echo '<div class="cmsms_notice cmsms_notice_error cmsms-icon-cancel-2">' . "\n" . 
					'<div class="notice_content">' . "\n" . 
						'<p>' . esc_html__('Please add your Twitter API keys', 'cmsmasters') . ', ' . '<a target="_blank" href="http://docs.cmsmasters.net/admin2/twitter-functionality/">' . esc_html__('read more how', 'cmsmasters') . '</a></p>' . "\n" . 
					'</div>' . "\n" . 
				'</div>' . "\n";
			}
		}
		
		echo '</ul>' . "\n" . 
		$after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['user'] = strip_tags($new_instance['user']);
        $instance['number'] = absint($new_instance['number']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $user = isset($instance['user']) ? esc_attr($instance['user']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('user'); ?>"><?php esc_html_e('Twitter Username', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo $user; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e("Enter the number of latest tweets you'd like to display", 'cmsmasters'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small class="s_red"><?php esc_html_e('default is', 'cmsmasters'); ?> 3</small><br />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * PayPal Donations Widget Class
 */
class WP_Widget_Custom_PayPalDonations extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_custom_paypal_donations',
			'description' => esc_attr__(
				'PayPal Donation Button',
				'cmsmasters'
			)
		);
		parent::__construct('paypal_donations', 'PayPal Donations', $widget_ops);
	}
	
	public function widget($args, $instance) {
		extract($args);
		
		$paypal_donations = PayPalDonations::getInstance();
		
		$title = 		apply_filters('widget_title', $instance['title']);
		$text = 		esc_html($instance['text']);
		$purpose = 		$instance['purpose'];
		$reference = 	$instance['reference'];
		$amount = 		$instance['amount'];
		$button_text = 	esc_html($instance['button_text']);

		echo $before_widget . 
			'<div class="cmsms_paypal_donations_widget">' . "\n";
				if ($title) {
					echo $before_title . $title . $after_title . "\n";
				}
				
				
				if ($text) {
					echo wpautop($text) . "\n";
				}
				
				echo '<div class="cmsms_paypal_donations">' . "\n" . 
					$paypal_donations->generateHtml($purpose, $reference, $amount) . "\n" . 
					'<span class="button">' . ($button_text ? $button_text : esc_html__('Donate', 'cmsmasters')) . '</span>' . "\n" . 
				'</div>' . "\n" . 
			'</div>' . "\n" . 
		$after_widget;
    }
	
	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = 		strip_tags(stripslashes($new_instance['title']));
		$instance['text'] = 		$new_instance['text'];
		$instance['purpose'] = 		strip_tags(stripslashes($new_instance['purpose']));
		$instance['reference'] = 	strip_tags(stripslashes($new_instance['reference']));
		$instance['amount'] = 		strip_tags(stripslashes($new_instance['amount']));
		$instance['button_text'] = 	strip_tags(stripslashes($new_instance['button_text']));

		return $instance;
	}
	
    public function form($instance) {
		$defaults = array(
			'title' => 			esc_attr__('Donate', 'cmsmasters'),
			'text' => 			'',
			'purpose' => 		'',
			'reference' => 		'',
			'amount' => 		'',
			'button_text' => 	''
		);
		
		$instance = wp_parse_args((array) $instance, $defaults);

		$data = array(
			'instance' => 			$instance,
			'title_id' => 			$this->get_field_id('title'),
			'title_name' => 		$this->get_field_name('title'),
			'text_id' => 			$this->get_field_id('text'),
			'text_name' => 			$this->get_field_name('text'),
			'purpose_id' => 		$this->get_field_id('purpose'),
			'purpose_name' => 		$this->get_field_name('purpose'),
			'reference_id' => 		$this->get_field_id('reference'),
			'reference_name' => 	$this->get_field_name('reference'),
			'amount_id' => 			$this->get_field_id('amount'),
			'amount_name' => 		$this->get_field_name('amount'),
			'button_text_id' => 	$this->get_field_id('button_text'),
			'button_text_name' => 	$this->get_field_name('button_text')
		);
		
		($data) ? extract($data) : null;
		?>
		<p>
			<label for="<?php echo $title_id; ?>"><?php esc_html_e('Title:', 'cmsmasters'); ?> 
			<input class="widefat" id="<?php echo $title_id; ?>" name="<?php echo $title_name; ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $text_id; ?>"><?php esc_html_e('Text:', 'cmsmasters'); ?> 
			<textarea class="widefat" id="<?php echo $text_id; ?>" name="<?php echo $text_name; ?>"><?php echo esc_attr($instance['text']); ?></textarea>
			</label>
		</p>
		<p>
			<label for="<?php echo $purpose_id; ?>"><?php esc_html_e('Purpose:', 'cmsmasters'); ?> 
			<input class="widefat" id="<?php echo $purpose_id; ?>" name="<?php echo $purpose_name; ?>" type="text" value="<?php echo esc_attr($instance['purpose']); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $reference_id; ?>"><?php esc_html_e('Reference:', 'cmsmasters'); ?> 
			<input class="widefat" id="<?php echo $reference_id; ?>" name="<?php echo $reference_name; ?>" type="text" value="<?php echo esc_attr($instance['reference']); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $amount_id; ?>"><?php esc_html_e('Amount:', 'cmsmasters'); ?> 
			<input class="widefat" id="<?php echo $amount_id; ?>" name="<?php echo $amount_name; ?>" type="text" value="<?php echo esc_attr($instance['amount']); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $button_text_id; ?>"><?php esc_html_e('Button Text:', 'cmsmasters'); ?> 
			<input class="widefat" id="<?php echo $button_text_id; ?>" name="<?php echo $button_text_name; ?>" type="text" value="<?php echo esc_attr($instance['button_text']); ?>" />
			</label>
		</p>
		<?php 
	}
}



/**
 * Colored Blocks Widget Class
 */
class WP_Widget_Custom_Colored_Blocks extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_colored_blocks_entries', 'description' => esc_attr__('Your colored blocks', 'cmsmasters'));
		$control_ops = array('width' => 600);
		parent::__construct('custom-colored-blocks', '&nbsp;' . esc_attr__('Colored Blocks', 'cmsmasters'), $widget_ops, $control_ops);
		
		add_action('load-widgets.php', array(&$this, 'cmsms_colored_blocks_picker'));
	}
	
    function cmsms_colored_blocks_picker() {
        wp_enqueue_style('wp-color-picker');
		
        wp_enqueue_script('wp-color-picker');
    }
	
	function widget($args, $instance) {
		extract($args);
		
        $block_show_1 = isset($instance['block_show_1']) ? $instance['block_show_1'] : '';
        $block_color_1 = isset($instance['block_color_1']) ? esc_attr($instance['block_color_1']) : '#ff8f3c';
        $title_1 = isset($instance['title_1']) ? esc_html($instance['title_1']) : '';
        $subtitle_1 = isset($instance['subtitle_1']) ? esc_html($instance['subtitle_1']) : '';
        $subtitle_color_1 = isset($instance['subtitle_color_1']) ? esc_attr($instance['subtitle_color_1']) : '#fee37a';
        $text_1 = isset($instance['text_1']) ? esc_html($instance['text_1']) : '';
        $button_text_1 = isset($instance['button_text_1']) ? esc_html($instance['button_text_1']) : '';
        $button_link_1 = isset($instance['button_link_1']) ? esc_url($instance['button_link_1']) : '';
		
        $block_show_2 = isset($instance['block_show_2']) ? $instance['block_show_2'] : '';
        $block_color_2 = isset($instance['block_color_2']) ? esc_attr($instance['block_color_2']) : '#ffc232';
        $title_2 = isset($instance['title_2']) ? esc_html($instance['title_2']) : '';
        $subtitle_2 = isset($instance['subtitle_2']) ? esc_html($instance['subtitle_2']) : '';
        $subtitle_color_2 = isset($instance['subtitle_color_2']) ? esc_attr($instance['subtitle_color_2']) : '#fff880';
        $text_2 = isset($instance['text_2']) ? esc_html($instance['text_2']) : '';
        $button_text_2 = isset($instance['button_text_2']) ? esc_html($instance['button_text_2']) : '';
        $button_link_2 = isset($instance['button_link_2']) ? esc_url($instance['button_link_2']) : '';
		
        $block_show_3 = isset($instance['block_show_3']) ? $instance['block_show_3'] : '';
        $block_color_3 = isset($instance['block_color_3']) ? esc_attr($instance['block_color_3']) : '#9bdb2b';
        $title_3 = isset($instance['title_3']) ? esc_html($instance['title_3']) : '';
        $subtitle_3 = isset($instance['subtitle_3']) ? esc_html($instance['subtitle_3']) : '';
        $subtitle_color_3 = isset($instance['subtitle_color_3']) ? esc_attr($instance['subtitle_color_3']) : '#dfff5f';
        $text_3 = isset($instance['text_3']) ? esc_html($instance['text_3']) : '';
        $button_text_3 = isset($instance['button_text_3']) ? esc_html($instance['button_text_3']) : '';
        $button_link_3 = isset($instance['button_link_3']) ? esc_url($instance['button_link_3']) : '';
		
        $block_show_4 = isset($instance['block_show_4']) ? $instance['block_show_4'] : '';
        $block_color_4 = isset($instance['block_color_4']) ? esc_attr($instance['block_color_4']) : '#5fdcab';
        $title_4 = isset($instance['title_4']) ? esc_html($instance['title_4']) : '';
        $subtitle_4 = isset($instance['subtitle_4']) ? esc_html($instance['subtitle_4']) : '';
        $subtitle_color_4 = isset($instance['subtitle_color_4']) ? esc_attr($instance['subtitle_color_4']) : '#a1ffc0';
        $text_4 = isset($instance['text_4']) ? esc_html($instance['text_4']) : '';
        $button_text_4 = isset($instance['button_text_4']) ? esc_html($instance['button_text_4']) : '';
        $button_link_4 = isset($instance['button_link_4']) ? esc_url($instance['button_link_4']) : '';
		
        $margin_top = isset($instance['margin_top']) ? esc_attr($instance['margin_top']) : '';
		
		if ($block_show_1 != 'hide' && $block_show_2 != 'hide' && $block_show_3 != 'hide' && $block_show_4 != 'hide') {
			$widgets_width = 'four_box';
		} elseif ( 
			($block_show_1 != 'hide' && $block_show_2 != 'hide' && $block_show_3 != 'hide') || 
			($block_show_1 != 'hide' && $block_show_3 != 'hide' && $block_show_4 != 'hide') || 
			($block_show_2 != 'hide' && $block_show_3 != 'hide' && $block_show_4 != 'hide') 
		) {
			$widgets_width = 'three_box';
		} elseif ( 
			($block_show_1 != 'hide' && $block_show_2 != 'hide') || 
			($block_show_1 != 'hide' && $block_show_3 != 'hide') || 
			($block_show_1 != 'hide' && $block_show_4 != 'hide') || 
			($block_show_2 != 'hide' && $block_show_3 != 'hide') || 
			($block_show_2 != 'hide' && $block_show_4 != 'hide') || 
			($block_show_3 != 'hide' && $block_show_4 != 'hide') 
		) {
			$widgets_width = 'two_box';
		} elseif ($block_show_1 != 'hide' || $block_show_2 != 'hide' || $block_show_3 != 'hide' || $block_show_4 != 'hide') {
			$widgets_width = 'one_box';
		}
		
		echo '<div class="widget_custom_colored_blocks_wrap"';
			if ($margin_top != '') {
				echo ' style="margin-top:' . $margin_top . ';"';
			}
		echo '>' . 
			$before_widget;
		
		if ($block_show_1 != 'hide') {
			echo '<div class="widget_colored_cell ' . $widgets_width . '" style="background-color:' . $block_color_1 . ';">' . 
				'<div class="widget_colored_cell_inner">';
			
			if ($title_1 != '') {
				echo '<h2 class="widgettitle">' . $title_1 . '</h2>';
			}
			
			if ($subtitle_1 != '') {
				echo '<h3 class="widget_subtitle" style="color:' . $subtitle_color_1 . ';">' . $subtitle_1 . '</h3>';
			}
			
			if ($text_1 != '') {
				echo '<div class="widget_content">' . $text_1 . '</div>';
			}
			
			if ($button_text_1 != '' && $button_link_1 != '') {
				echo '<a href="' . $button_link_1 . '" class="button_widget" title="' . $button_text_1 . '"><span>' . $button_text_1 . '</span></a>';
			}
			
			echo '</div>' . 
			'</div>';
		}
		
		if ($block_show_2 != 'hide') {
			echo '<div class="widget_colored_cell ' . $widgets_width . '" style="background-color:' . $block_color_2 . ';">' . 
				'<div class="widget_colored_cell_inner">';
			
			if ($title_2 != '') {
				echo '<h2 class="widgettitle">' . $title_2 . '</h2>';
			}
			
			if ($subtitle_2 != '') {
				echo '<h3 class="widget_subtitle" style="color:' . $subtitle_color_2 . ';">' . $subtitle_2 . '</h3>';
			}
			
			if ($text_2 != '') {
				echo '<div class="widget_content">' . $text_2 . '</div>';
			}
			
			if ($button_text_2 != '' && $button_link_2 != '') {
				echo '<a href="' . $button_link_2 . '" class="button_widget" title="' . $button_text_2 . '"><span>' . $button_text_2 . '</span></a>';
			}
			
			echo '</div>' . 
			'</div>';
		}
		
		if ($block_show_3 != 'hide') {
			echo '<div class="widget_colored_cell ' . $widgets_width . '" style="background-color:' . $block_color_3 . ';">' . 
				'<div class="widget_colored_cell_inner">';
			
			if ($title_3 != '') {
				echo '<h2 class="widgettitle">' . $title_3 . '</h2>';
			}
			
			if ($subtitle_3 != '') {
				echo '<h3 class="widget_subtitle" style="color:' . $subtitle_color_3 . ';">' . $subtitle_3 . '</h3>';
			}
			
			if ($text_3 != '') {
				echo '<div class="widget_content">' . $text_3 . '</div>';
			}
			
			if ($button_text_3 != '' && $button_link_3 != '') {
				echo '<a href="' . $button_link_3 . '" class="button_widget" title="' . $button_text_3 . '"><span>' . $button_text_3 . '</span></a>';
			}
			
			echo '</div>' . 
			'</div>';
		}
		
		if ($block_show_4 != 'hide') {
			echo '<div class="widget_colored_cell ' . $widgets_width . '" style="background-color:' . $block_color_4 . ';">' . 
				'<div class="widget_colored_cell_inner">';
			
			if ($title_4 != '') {
				echo '<h2 class="widgettitle">' . $title_4 . '</h2>';
			}
			
			if ($subtitle_4 != '') {
				echo '<h3 class="widget_subtitle" style="color:' . $subtitle_color_4 . ';">' . $subtitle_4 . '</h3>';
			}
			
			if ($text_4 != '') {
				echo '<div class="widget_content">' . $text_4 . '</div>';
			}
			
			if ($button_text_4 != '' && $button_link_4 != '') {
				echo '<a href="' . $button_link_4 . '" class="button_widget" title="' . $button_text_4 . '"><span>' . $button_text_4 . '</span></a>';
			}
			
			echo '</div>' . 
			'</div>';
		}
		
		echo $after_widget . 
        '</div>';
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
        $instance['block_show_1'] = strip_tags($new_instance['block_show_1']);
        $instance['block_color_1'] = strip_tags($new_instance['block_color_1']);
        $instance['title_1'] = strip_tags($new_instance['title_1']);
        $instance['subtitle_1'] = strip_tags($new_instance['subtitle_1']);
        $instance['subtitle_color_1'] = strip_tags($new_instance['subtitle_color_1']);
        $instance['text_1'] = $new_instance['text_1'];
        $instance['button_text_1'] = strip_tags($new_instance['button_text_1']);
        $instance['button_link_1'] = strip_tags($new_instance['button_link_1']);
		
        $instance['block_show_2'] = strip_tags($new_instance['block_show_2']);
        $instance['block_color_2'] = strip_tags($new_instance['block_color_2']);
        $instance['title_2'] = strip_tags($new_instance['title_2']);
        $instance['subtitle_2'] = strip_tags($new_instance['subtitle_2']);
        $instance['subtitle_color_2'] = strip_tags($new_instance['subtitle_color_2']);
        $instance['text_2'] = $new_instance['text_2'];
        $instance['button_text_2'] = strip_tags($new_instance['button_text_2']);
        $instance['button_link_2'] = strip_tags($new_instance['button_link_2']);
		
        $instance['block_show_3'] = strip_tags($new_instance['block_show_3']);
        $instance['block_color_3'] = strip_tags($new_instance['block_color_3']);
        $instance['title_3'] = strip_tags($new_instance['title_3']);
        $instance['subtitle_3'] = strip_tags($new_instance['subtitle_3']);
        $instance['subtitle_color_3'] = strip_tags($new_instance['subtitle_color_3']);
        $instance['text_3'] = $new_instance['text_3'];
        $instance['button_text_3'] = strip_tags($new_instance['button_text_3']);
        $instance['button_link_3'] = strip_tags($new_instance['button_link_3']);
		
        $instance['block_show_4'] = strip_tags($new_instance['block_show_4']);
        $instance['block_color_4'] = strip_tags($new_instance['block_color_4']);
        $instance['title_4'] = strip_tags($new_instance['title_4']);
        $instance['subtitle_4'] = strip_tags($new_instance['subtitle_4']);
        $instance['subtitle_color_4'] = strip_tags($new_instance['subtitle_color_4']);
        $instance['text_4'] = $new_instance['text_4'];
        $instance['button_text_4'] = strip_tags($new_instance['button_text_4']);
        $instance['button_link_4'] = strip_tags($new_instance['button_link_4']);
		
        $instance['margin_top'] = strip_tags($new_instance['margin_top']);
		
		return $instance;
	}
	
    function form($instance) {
        $block_show_1 = isset($instance['block_show_1']) ? esc_attr($instance['block_show_1']) : '';
        $block_color_1 = isset($instance['block_color_1']) ? esc_attr($instance['block_color_1']) : '#ff8f3c';
        $title_1 = isset($instance['title_1']) ? esc_attr($instance['title_1']) : '';
        $subtitle_1 = isset($instance['subtitle_1']) ? esc_attr($instance['subtitle_1']) : '';
        $subtitle_color_1 = isset($instance['subtitle_color_1']) ? esc_attr($instance['subtitle_color_1']) : '#fee37a';
        $text_1 = isset($instance['text_1']) ? esc_attr($instance['text_1']) : '';
        $button_text_1 = isset($instance['button_text_1']) ? esc_attr($instance['button_text_1']) : '';
        $button_link_1 = isset($instance['button_link_1']) ? esc_attr($instance['button_link_1']) : '';
		
        $block_show_2 = isset($instance['block_show_2']) ? esc_attr($instance['block_show_2']) : '';
        $block_color_2 = isset($instance['block_color_2']) ? esc_attr($instance['block_color_2']) : '#ffc232';
        $title_2 = isset($instance['title_2']) ? esc_attr($instance['title_2']) : '';
        $subtitle_2 = isset($instance['subtitle_2']) ? esc_attr($instance['subtitle_2']) : '';
        $subtitle_color_2 = isset($instance['subtitle_color_2']) ? esc_attr($instance['subtitle_color_2']) : '#fff880';
        $text_2 = isset($instance['text_2']) ? esc_attr($instance['text_2']) : '';
        $button_text_2 = isset($instance['button_text_2']) ? esc_attr($instance['button_text_2']) : '';
        $button_link_2 = isset($instance['button_link_2']) ? esc_attr($instance['button_link_2']) : '';
		
        $block_show_3 = isset($instance['block_show_3']) ? esc_attr($instance['block_show_3']) : '';
        $block_color_3 = isset($instance['block_color_3']) ? esc_attr($instance['block_color_3']) : '#9bdb2b';
        $title_3 = isset($instance['title_3']) ? esc_attr($instance['title_3']) : '';
        $subtitle_3 = isset($instance['subtitle_3']) ? esc_attr($instance['subtitle_3']) : '';
        $subtitle_color_3 = isset($instance['subtitle_color_3']) ? esc_attr($instance['subtitle_color_3']) : '#dfff5f';
        $text_3 = isset($instance['text_3']) ? esc_attr($instance['text_3']) : '';
        $button_text_3 = isset($instance['button_text_3']) ? esc_attr($instance['button_text_3']) : '';
        $button_link_3 = isset($instance['button_link_3']) ? esc_attr($instance['button_link_3']) : '';
		
        $block_show_4 = isset($instance['block_show_4']) ? esc_attr($instance['block_show_4']) : '';
        $block_color_4 = isset($instance['block_color_4']) ? esc_attr($instance['block_color_4']) : '#5fdcab';
        $title_4 = isset($instance['title_4']) ? esc_attr($instance['title_4']) : '';
        $subtitle_4 = isset($instance['subtitle_4']) ? esc_attr($instance['subtitle_4']) : '';
        $subtitle_color_4 = isset($instance['subtitle_color_4']) ? esc_attr($instance['subtitle_color_4']) : '#a1ffc0';
        $text_4 = isset($instance['text_4']) ? esc_attr($instance['text_4']) : '';
        $button_text_4 = isset($instance['button_text_4']) ? esc_attr($instance['button_text_4']) : '';
        $button_link_4 = isset($instance['button_link_4']) ? esc_attr($instance['button_link_4']) : '';
		
        $margin_top = isset($instance['margin_top']) ? esc_attr($instance['margin_top']) : '';
        ?>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('block_show_1'); ?>"><?php esc_html_e('First Block Visibility', 'cmsmasters'); ?>:<br />
                <select class="widefat" id="<?php echo $this->get_field_id('block_show_1'); ?>" name="<?php echo $this->get_field_name('block_show_1'); ?>">
					<option value=""<?php if ($block_show_1 == '') { echo ' selected="selected"'; } ?>><?php esc_html_e('Show', 'cmsmasters'); ?></option>
					<option value="hide"<?php if ($block_show_1 == 'hide') { echo ' selected="selected"'; } ?>><?php esc_html_e('Hide', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('block_show_2'); ?>"><?php esc_html_e('Second Block Visibility', 'cmsmasters'); ?>:<br />
                <select class="widefat" id="<?php echo $this->get_field_id('block_show_2'); ?>" name="<?php echo $this->get_field_name('block_show_2'); ?>">
					<option value=""<?php if ($block_show_2 == '') { echo ' selected="selected"'; } ?>><?php esc_html_e('Show', 'cmsmasters'); ?></option>
					<option value="hide"<?php if ($block_show_2 == 'hide') { echo ' selected="selected"'; } ?>><?php esc_html_e('Hide', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('block_color_1'); ?>"><?php esc_html_e('First Block Color', 'cmsmasters'); ?>:<br />
                <input class="my-color-field" id="<?php echo $this->get_field_id('block_color_1'); ?>" name="<?php echo $this->get_field_name('block_color_1'); ?>" type="text" value="<?php echo $block_color_1; ?>" data-default-color="#ff8f3c" />
            </label>
        </p>
		<script type="text/javascript">
			jQuery(function($) {
				if ( 
					$('#<?php echo $this->get_field_id('block_color_1'); ?>').is(':visible') || 
					$('#<?php echo $this->get_field_id('block_color_1'); ?>').closest('.widget').is(':not(.ui-draggable)') 
				) {
					$('#<?php echo $this->get_field_id('block_color_1'); ?>').wpColorPicker();
				}
			} );
		</script>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('block_color_2'); ?>"><?php esc_html_e('Second Block Color', 'cmsmasters'); ?>:<br />
                <input class="my-color-field" id="<?php echo $this->get_field_id('block_color_2'); ?>" name="<?php echo $this->get_field_name('block_color_2'); ?>" type="text" value="<?php echo $block_color_2; ?>" data-default-color="#ffc232" />
            </label>
        </p>
		<script type="text/javascript">
			jQuery(function($) {
				if ( 
					$('#<?php echo $this->get_field_id('block_color_2'); ?>').is(':visible') || 
					$('#<?php echo $this->get_field_id('block_color_2'); ?>').closest('.widget').is(':not(.ui-draggable)') 
				) {
					$('#<?php echo $this->get_field_id('block_color_2'); ?>').wpColorPicker();
				}
			} );
		</script>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('title_1'); ?>"><?php esc_html_e('First Block Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title_1'); ?>" name="<?php echo $this->get_field_name('title_1'); ?>" type="text" value="<?php echo $title_1; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('title_2'); ?>"><?php esc_html_e('Second Block Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title_2'); ?>" name="<?php echo $this->get_field_name('title_2'); ?>" type="text" value="<?php echo $title_2; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('subtitle_1'); ?>"><?php esc_html_e('First Block Subtitle', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('subtitle_1'); ?>" name="<?php echo $this->get_field_name('subtitle_1'); ?>" type="text" value="<?php echo $subtitle_1; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('subtitle_2'); ?>"><?php esc_html_e('Second Block Subtitle', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('subtitle_2'); ?>" name="<?php echo $this->get_field_name('subtitle_2'); ?>" type="text" value="<?php echo $subtitle_2; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('subtitle_color_1'); ?>"><?php esc_html_e('First Block Subtitle Color', 'cmsmasters'); ?>:<br />
                <input class="my-color-field" id="<?php echo $this->get_field_id('subtitle_color_1'); ?>" name="<?php echo $this->get_field_name('subtitle_color_1'); ?>" type="text" value="<?php echo $subtitle_color_1; ?>" data-default-color="#fee37a" />
            </label>
        </p>
		<script type="text/javascript">
			jQuery(function($) {
				if ( 
					$('#<?php echo $this->get_field_id('subtitle_color_1'); ?>').is(':visible') || 
					$('#<?php echo $this->get_field_id('subtitle_color_1'); ?>').closest('.widget').is(':not(.ui-draggable)') 
				) {
					$('#<?php echo $this->get_field_id('subtitle_color_1'); ?>').wpColorPicker();
				}
			} );
		</script>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('subtitle_color_2'); ?>"><?php esc_html_e('Second Block Subtitle Color', 'cmsmasters'); ?>:<br />
                <input class="my-color-field" id="<?php echo $this->get_field_id('subtitle_color_2'); ?>" name="<?php echo $this->get_field_name('subtitle_color_2'); ?>" type="text" value="<?php echo $subtitle_color_2; ?>" data-default-color="#fff880" />
            </label>
        </p>
		<script type="text/javascript">
			jQuery(function($) {
				if ( 
					$('#<?php echo $this->get_field_id('subtitle_color_2'); ?>').is(':visible') || 
					$('#<?php echo $this->get_field_id('subtitle_color_2'); ?>').closest('.widget').is(':not(.ui-draggable)') 
				) {
					$('#<?php echo $this->get_field_id('subtitle_color_2'); ?>').wpColorPicker();
				}
			} );
		</script>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('text_1'); ?>"><?php esc_html_e('First Block Text', 'cmsmasters'); ?>:<br />
                <textarea class="widefat" id="<?php echo $this->get_field_id('text_1'); ?>" name="<?php echo $this->get_field_name('text_1'); ?>"><?php echo $text_1; ?></textarea>
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('text_2'); ?>"><?php esc_html_e('Second Block Text', 'cmsmasters'); ?>:<br />
                <textarea class="widefat" id="<?php echo $this->get_field_id('text_2'); ?>" name="<?php echo $this->get_field_name('text_2'); ?>"><?php echo $text_2; ?></textarea>
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('button_text_1'); ?>"><?php esc_html_e('First Block Button Text', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('button_text_1'); ?>" name="<?php echo $this->get_field_name('button_text_1'); ?>" type="text" value="<?php echo $button_text_1; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('button_text_2'); ?>"><?php esc_html_e('Second Block Button Text', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('button_text_2'); ?>" name="<?php echo $this->get_field_name('button_text_2'); ?>" type="text" value="<?php echo $button_text_2; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('button_link_1'); ?>"><?php esc_html_e('First Block Button Link', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('button_link_1'); ?>" name="<?php echo $this->get_field_name('button_link_1'); ?>" type="text" value="<?php echo $button_link_1; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('button_link_2'); ?>"><?php esc_html_e('Second Block Button Link', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('button_link_2'); ?>" name="<?php echo $this->get_field_name('button_link_2'); ?>" type="text" value="<?php echo $button_link_2; ?>" />
            </label>
        </p>
        <p style="border-top:1px solid #dfdfdf; width:48%; float:left; padding-top:10px; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('block_show_3'); ?>"><?php esc_html_e('Third Block Visibility', 'cmsmasters'); ?>:<br />
                <select class="widefat" id="<?php echo $this->get_field_id('block_show_3'); ?>" name="<?php echo $this->get_field_name('block_show_3'); ?>">
					<option value=""<?php if ($block_show_3 == '') { echo ' selected="selected"'; } ?>><?php esc_html_e('Show', 'cmsmasters'); ?></option>
					<option value="hide"<?php if ($block_show_3 == 'hide') { echo ' selected="selected"'; } ?>><?php esc_html_e('Hide', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="border-top:1px solid #dfdfdf; width:48%; float:right; padding-top:10px;">
            <label for="<?php echo $this->get_field_id('block_show_4'); ?>"><?php esc_html_e('Fourth Block Visibility', 'cmsmasters'); ?>:<br />
                <select class="widefat" id="<?php echo $this->get_field_id('block_show_4'); ?>" name="<?php echo $this->get_field_name('block_show_4'); ?>">
					<option value=""<?php if ($block_show_4 == '') { echo ' selected="selected"'; } ?>><?php esc_html_e('Show', 'cmsmasters'); ?></option>
					<option value="hide"<?php if ($block_show_4 == 'hide') { echo ' selected="selected"'; } ?>><?php esc_html_e('Hide', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('block_color_3'); ?>"><?php esc_html_e('Third Block Color', 'cmsmasters'); ?>:<br />
                <input class="my-color-field" id="<?php echo $this->get_field_id('block_color_3'); ?>" name="<?php echo $this->get_field_name('block_color_3'); ?>" type="text" value="<?php echo $block_color_3; ?>" data-default-color="#9bdb2b" />
            </label>
        </p>
		<script type="text/javascript">
			jQuery(function($) {
				if ( 
					$('#<?php echo $this->get_field_id('block_color_3'); ?>').is(':visible') || 
					$('#<?php echo $this->get_field_id('block_color_3'); ?>').closest('.widget').is(':not(.ui-draggable)') 
				) {
					$('#<?php echo $this->get_field_id('block_color_3'); ?>').wpColorPicker();
				}
			} );
		</script>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('block_color_4'); ?>"><?php esc_html_e('Fourth Block Color', 'cmsmasters'); ?>:<br />
                <input class="my-color-field" id="<?php echo $this->get_field_id('block_color_4'); ?>" name="<?php echo $this->get_field_name('block_color_4'); ?>" type="text" value="<?php echo $block_color_4; ?>" data-default-color="#5fdcab" />
            </label>
        </p>
		<script type="text/javascript">
			jQuery(function($) {
				if ( 
					$('#<?php echo $this->get_field_id('block_color_4'); ?>').is(':visible') || 
					$('#<?php echo $this->get_field_id('block_color_4'); ?>').closest('.widget').is(':not(.ui-draggable)') 
				) {
					$('#<?php echo $this->get_field_id('block_color_4'); ?>').wpColorPicker();
				}
			} );
		</script>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('title_3'); ?>"><?php esc_html_e('Third Block Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title_3'); ?>" name="<?php echo $this->get_field_name('title_3'); ?>" type="text" value="<?php echo $title_3; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('title_4'); ?>"><?php esc_html_e('Fourth Block Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title_4'); ?>" name="<?php echo $this->get_field_name('title_4'); ?>" type="text" value="<?php echo $title_4; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('subtitle_3'); ?>"><?php esc_html_e('Third Block Subtitle', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('subtitle_3'); ?>" name="<?php echo $this->get_field_name('subtitle_3'); ?>" type="text" value="<?php echo $subtitle_3; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('subtitle_4'); ?>"><?php esc_html_e('Fourth Block Subtitle', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('subtitle_4'); ?>" name="<?php echo $this->get_field_name('subtitle_4'); ?>" type="text" value="<?php echo $subtitle_4; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('subtitle_color_3'); ?>"><?php esc_html_e('Third Block Subtitle Color', 'cmsmasters'); ?>:<br />
                <input class="my-color-field" id="<?php echo $this->get_field_id('subtitle_color_3'); ?>" name="<?php echo $this->get_field_name('subtitle_color_3'); ?>" type="text" value="<?php echo $subtitle_color_3; ?>" data-default-color="#dfff5f" />
            </label>
        </p>
		<script type="text/javascript">
			jQuery(function($) {
				if ( 
					$('#<?php echo $this->get_field_id('subtitle_color_3'); ?>').is(':visible') || 
					$('#<?php echo $this->get_field_id('subtitle_color_3'); ?>').closest('.widget').is(':not(.ui-draggable)') 
				) {
					$('#<?php echo $this->get_field_id('subtitle_color_3'); ?>').wpColorPicker();
				}
			} );
		</script>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('subtitle_color_4'); ?>"><?php esc_html_e('Fourth Block Subtitle Color', 'cmsmasters'); ?>:<br />
                <input class="my-color-field" id="<?php echo $this->get_field_id('subtitle_color_4'); ?>" name="<?php echo $this->get_field_name('subtitle_color_4'); ?>" type="text" value="<?php echo $subtitle_color_4; ?>" data-default-color="#a1ffc0" />
            </label>
        </p>
		<script type="text/javascript">
			jQuery(function($) {
				if ( 
					$('#<?php echo $this->get_field_id('subtitle_color_4'); ?>').is(':visible') || 
					$('#<?php echo $this->get_field_id('subtitle_color_4'); ?>').closest('.widget').is(':not(.ui-draggable)') 
				) {
					$('#<?php echo $this->get_field_id('subtitle_color_4'); ?>').wpColorPicker();
				}
			} );
		</script>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('text_3'); ?>"><?php esc_html_e('Third Block Text', 'cmsmasters'); ?>:<br />
                <textarea class="widefat" id="<?php echo $this->get_field_id('text_3'); ?>" name="<?php echo $this->get_field_name('text_3'); ?>"><?php echo $text_3; ?></textarea>
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('text_4'); ?>"><?php esc_html_e('Fourth Block Text', 'cmsmasters'); ?>:<br />
                <textarea class="widefat" id="<?php echo $this->get_field_id('text_4'); ?>" name="<?php echo $this->get_field_name('text_4'); ?>"><?php echo $text_4; ?></textarea>
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('button_text_3'); ?>"><?php esc_html_e('Third Block Button Text', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('button_text_3'); ?>" name="<?php echo $this->get_field_name('button_text_3'); ?>" type="text" value="<?php echo $button_text_3; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('button_text_4'); ?>"><?php esc_html_e('Fourth Block Button Text', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('button_text_4'); ?>" name="<?php echo $this->get_field_name('button_text_4'); ?>" type="text" value="<?php echo $button_text_4; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('button_link_3'); ?>"><?php esc_html_e('Third Block Button Link', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('button_link_3'); ?>" name="<?php echo $this->get_field_name('button_link_3'); ?>" type="text" value="<?php echo $button_link_3; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('button_link_4'); ?>"><?php esc_html_e('Fourth Block Button Link', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('button_link_4'); ?>" name="<?php echo $this->get_field_name('button_link_4'); ?>" type="text" value="<?php echo $button_link_4; ?>" />
            </label>
        </p>
        <div style="clear:both;"></div>
        <p>
            <label for="<?php echo $this->get_field_id('margin_top'); ?>"><?php esc_html_e('Widget Top Margin', 'cmsmasters'); ?>:<br />
                <input id="<?php echo $this->get_field_id('margin_top'); ?>" name="<?php echo $this->get_field_name('margin_top'); ?>" type="text" value="<?php echo $margin_top; ?>" />
            </label>
        </p>
        <?php
    }
}


function wp_custom_widgets_init() {
	if (!is_blog_installed()) {
		return;
	}
	
	
	register_widget('WP_Widget_Custom_Advertisement');
	
	register_widget('WP_Widget_Custom_Colored_Blocks');
	
	register_widget('WP_Widget_Custom_Contact_Info');
	
	register_widget('WP_Widget_Custom_Divider');
	
	register_widget('WP_Widget_Custom_Video');
	
	register_widget('WP_Widget_Custom_Facebook');
	
	register_widget('WP_Widget_Custom_Flickr');
	
	register_widget('WP_Widget_Custom_HTML5_Audio');
	
	register_widget('WP_Widget_Custom_HTML5_Video');
	
	register_widget('WP_Widget_Custom_Posts_Tabs');
	
	register_widget('WP_Widget_Custom_Twitter');
	
	
	if (class_exists('PayPalDonations_Widget')) {
		register_widget('WP_Widget_Custom_PayPalDonations');
	}
}

add_action('widgets_init', 'wp_custom_widgets_init', 1);

