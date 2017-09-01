<?php
/*
Plugin Name: PPO Contact Form
Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id odio in dolor malesuada ullamcorper. Sed mollis hendrerit leo a eleifend. Nam eget lorem sit amet orci molestie ullamcorper.
Version:     1.0
Author:      Peter Paul Ombao
*/

function post_type_ppo_contact_form() {
	$labels = array(
		'name'               => 'Contact Forms',
		'singular_name'      => 'Contact Form'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => false,
		'has_archive'        => true,
        'show_in_menu'		 => true,
        'supports' => array(
            'title'
        )
	);

	register_post_type( 'ppo_contact_form', $args );
}
add_action( 'init', 'post_type_ppo_contact_form' );


function shortcode_ppo_contact_form( $atts ) {
    $a = shortcode_atts( array(
        'id' => ''
    ), $atts );
	
	$query = new WP_Query( array('ID' => $a['id'], 'post_type' => 'ppo_contact_form') );
	
	$templates = array(
        'contact-form.php'
	);
	ob_start();
	if (locate_template($templates) != '') {
		include(locate_template($templates));
	} else {
		include(untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/includes/views/contact-form.php');
	}
	return ob_get_clean();
}
add_shortcode( 'ppo-contact-form', 'shortcode_ppo_contact_form' );


function remove_meta_boxes_ppo_contact_form() {
	remove_meta_box( 'slugdiv', 'ppo_contact_form', 'normal' );
	remove_meta_box( 'submitdiv', 'ppo_contact_form', 'side' );
}
add_action( 'add_meta_boxes', 'remove_meta_boxes_ppo_contact_form', 10 );

function render_meta_box_ppo_contact_form( $post ) {
    /*include( 'includes/admin/additional-fields-heading.php' );
    global $wpdb;
    if(!empty($post->po_entry_id)){
        $results = $wpdb->get_results("
            SELECT * FROM {$wpdb->prefix}po_entries_assignments
            JOIN {$wpdb->prefix}po_fields
            ON {$wpdb->prefix}po_entries_assignments.field_id = {$wpdb->prefix}po_fields.id
            WHERE {$wpdb->prefix}po_entries_assignments.entry_id = {$post->po_entry_id}
            ORDER BY {$wpdb->prefix}po_entries_assignments.sort_order
        ", OBJECT );
        foreach($results as $result){
            $attr = unserialize($result->config);
            $attr['name'] = $result->field_name;
            $attr['label'] = $result->field_label;
            include( 'includes/admin/field-' . $attr['type'] . '.php' );
        }
    }*/
	include( 'includes/admin/views/meta-boxes/post_content.php' );
}
function add_meta_boxes_ppo_contact_form() {
	add_meta_box(
        'additional-fields',
        'Additional Fields',
        'render_meta_box_ppo_contact_form',
        'ppo_contact_form',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'add_meta_boxes_ppo_contact_form', 30 );