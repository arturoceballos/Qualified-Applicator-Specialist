<?php
/**
 * @package 	WordPress
 * @subpackage 	Agrofields
 * @version		1.0.0
 *
 * Template Name: Home
 * Created by Jeremy
 *
 */

get_header();

list($cmsms_layout) = cmsms_theme_page_layout_scheme();


echo '<!--_________________________ Start Content _________________________ -->' . "\n";



    echo '<div class="middle_content entry" role="main">' . "\n\t";

?>

<?php

if (have_posts()) : the_post();
    $content_start = substr(get_post_field('post_content', get_the_ID()), 0, 10);


    if ($cmsms_layout == 'fullwidth' && $content_start === '[cmsms_row') {
        echo '</div>' .
            '</div>';
    }

echo '<!--________________the content______________________-->';

    echo do_shortcode('[cmsms_row data_width="fullwidth" data_padding_left="0" data_padding_right="0" data_color="default" data_padding_top="0" data_padding_bottom="0"]');
    echo do_shortcode('[cmsms_slider slider_plugin="layer" slider_layer="1"]');
    echo do_shortcode('[cmsms_row data_width="boxed" data_color="first" data_padding_top="0" data_padding_bottom="60"][cmsms_column data_width="1/1"][cmsms_sidebar sidebar="colored-blocks"][/cmsms_column][/cmsms_row]');
    echo do_shortcode('[cmsms_divider width="long" height="1" style="solid" position="center" margin_top="40" margin_bottom="0" animation_delay="0"]');


    ?>

<?php
    $type = 'about';
    $args = array(
        'post_type'        => $type,
        'post_status'      => 'publish',
        'orderby'          => 'title',
        'posts_per_page'   => -1
    );

    $my_query = null;
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()): while($my_query->have_posts()): $my_query->the_post();

    echo do_shortcode('[cmsms_row data_width="boxed" data_color="default" data_padding_top="60" data_padding_bottom="20"][cmsms_column data_width="1/1"][cmsms_heading type="h3" font_weight="400" font_style="normal" text_align="left" margin_top="0" margin_bottom="30" animation_delay="0"]Tour. Left Side[/cmsms_heading][cmsms_tabs mode="tour" position="left" active="1" animation_delay="0"][cmsms_tab title="Organic" custom_colors="true" bg_color="#9bdb2b|100"]content[/cmsms_tab]Lorem ipsum dolor sit amet, consectetur adipiscing elit. um dictum posuere. Proin eget felis sit amet arcu facilisis dignissim et sit amet arcu. Mauris dui risus, consequat vitae leo non, consectetur malesuada tortor. Ut mollis a velit et pretium. Aliquam ornare justo ut dui volutpat tincidunt. Sed tempor, neque in hendrerit ultrices, purus diam posuere dui, id fermentum risus felis a felis. Nulla bibendum dictum posuere.[cmsms_tab title="Harvest" custom_colors="true" bg_color="#ffc232|100"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget felis sit amet arcu facilisis dignissim et sit amet arcu. Mauris dui risus, consequat vitae leo non, consectetur malesuada tortor. Ut mollis a velit et pretium. Aliquam ornare justo ut dui volutpat tincidunt. Sed tempor, neque in hendrerit ultrices, purus diam posuere dui, id fermentum risus felis a felis. Nulla bibendum dictum posuere. Proin eget felis sit amet arcu facilisis dignissim et sit amet arcu. Mauris dui risus, consequat vitae leo non, consectetur malesuada tortor. Ut mollis a velit et pretium. Aliquam ornare justo ut dui volutpat tincidunt. Sed tempor, neque in hendrerit ultrices, purus diam posuere dui, id fermentum risus felis a felis. Nulla bibendum dictum posuere.[/cmsms_tab][cmsms_tab title="Agriculture" custom_colors="true" bg_color="#ff8f3c|100"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget felis sit amet arcu facilisis dignissim et sit amet arcu. Mauris dui risus, consequat vitae leo non, consectetur malesuada tortor. Ut mollis a velit et pretium. Aliquam ornare justo ut dui volutpat tincidunt. Sed tempor, neque in hendrerit ultrices, purus diam posuere dui, id fermentum risus felis a felis. Nulla bibendum dictum posuere. Proin eget felis sit amet arcu facilisis dignissim et sit amet arcu. Mauris dui risus, consequat vitae leo non, consectetur malesuada tortor. Ut mollis a velit et pretium. Aliquam ornare justo ut dui volutpat tincidunt. Sed tempor, neque in hendrerit ultrices, purus diam posuere dui, id fermentum risus felis a felis. Nulla bibendum dictum posuere.[/cmsms_tab][cmsms_tab title="Protection" custom_colors="true" bg_color="#5fdcab|100"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget felis sit amet arcu facilisis dignissim et sit amet arcu. Mauris dui risus, consequat vitae leo non, consectetur malesuada tortor. Ut mollis a velit et pretium. Aliquam ornare justo ut dui volutpat tincidunt. Sed tempor, neque in hendrerit ultrices, purus diam posuere dui, id fermentum risus felis a felis. Nulla bibendum dictum posuere. Proin eget felis sit amet arcu facilisis dignissim et sit amet arcu. Mauris dui risus, consequat vitae leo non, consectetur malesuada tortor. Ut mollis a velit et pretium. Aliquam ornare justo ut dui volutpat tincidunt. Sed tempor, neque in hendrerit ultrices, purus diam posuere dui, id fermentum risus felis a felis. Nulla bibendum dictum posuere.[/cmsms_tab][/cmsms_tabs][/cmsms_column][/cmsms_row][/cmsms_column][/cmsms_row]');

    the_content();

echo '<!--________________end the content______________________-->';
    echo '<div class="cl"></div>';


    if ($cmsms_layout == 'fullwidth' && $content_start === '[cmsms_row') {
        echo '<div class="content_wrap ' . $cmsms_layout .
            ((is_singular('project')) ? ' project_page' : '') .
            ((is_singular('profile')) ? ' profile_page' : '') .
            '">' . "\n\n" .
            '<div class="middle_content entry" role="main">' . "\n\t";
    }


    wp_link_pages(array(
        'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . esc_html__('Pages', 'cmsmasters') . ':</strong>',
        'after' => '</div>' . "\n",
        'link_before' => ' [ ',
        'link_after' => ' ] '
    ));


    comments_template();
endif;


echo '</div>' . "\n" .
    '<!-- _________________________ Finish Content _________________________ -->' . "\n\n";



get_footer();
