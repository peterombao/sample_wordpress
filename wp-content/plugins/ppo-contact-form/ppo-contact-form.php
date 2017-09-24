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


function post_type_ppo_cf_element() {
	$labels = array(
		'name'               => 'Contact Form Elements',
		'singular_name'      => 'Contact Form Element'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false
	);

	register_post_type( 'ppo_cf_element', $args );
}
add_action( 'init', 'post_type_ppo_cf_element' );


function shortcode_ppo_contact_form( $atts ) {
    $a = shortcode_atts( array(
        'id' => ''
    ), $atts );
	//global $wpdb;
	$contact_form = get_post($a['id']);
	$elements_args = array(
		'post_parent' => $a['id'],
		'post_type' => 'ppo_cf_element',
		'orderby' => array(
			'menu_order' => 'ASC',
			'ID' => 'DESC'
		)
	);
	$contact_form_elements = get_posts($elements_args);
	
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
	//remove_meta_box( 'submitdiv', 'ppo_contact_form', 'side' );
}
add_action( 'add_meta_boxes', 'remove_meta_boxes_ppo_contact_form', 10 );


function render_meta_box_ppo_contact_form( $post ) {
	$fields = fields_ppo_contact_form();
	global $wpdb;
	$form_elements = $wpdb->get_results( 'SELECT * FROM wp_posts WHERE post_parent = ' . $post->ID . ' ORDER BY menu_order ASC, ID DESC', OBJECT );
	include( 'includes/admin/views/meta-boxes/post_content.php' );
}
function add_meta_boxes_ppo_contact_form() {
	add_meta_box(
        'form',
        'Form',
        'render_meta_box_ppo_contact_form',
        'ppo_contact_form',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'add_meta_boxes_ppo_contact_form', 30 );


function admin_scripts_ppo_contact_form(){
	global $wp_query, $post;
	wp_register_script( 'ppo_contact_form', untrailingslashit( plugins_url( '/', __FILE__ ) ) . '/assets/js/admin/ppo-contact-form.js', array( 'backbone' ) );
	$params = array(
        'url' => esc_url( admin_url( "post-new.php?post_type=list&post_parent=" . $post_parent ) ),
        'post_id' => $post->ID
    );
    wp_localize_script('ppo_contact_form', 'ppo_contact_form' , $params);
	wp_enqueue_script( 'ppo_contact_form' );
}
add_action( 'admin_enqueue_scripts', 'admin_scripts_ppo_contact_form' );


function fields_ppo_contact_form(){
	$fields = array(
		'text' => array(
			'type' => 'text',
			'label' => 'Text',
			'options' => array(
				'form_label',
				'form_name',
				'form_placeholder',
				'default_value',
				'id_attr',
				'class_attr',
				'form_required'
			)
		),
		'email' => array(
			'type' => 'email',
			'label' => 'Email',
			'options' => array(
				'form_label',
				'form_name',
				'form_placeholder',
				'default_value',
				'id_attr',
				'class_attr',
				'form_required'
			)
		),
		'textarea' => array(
			'type' => 'textarea',
			'label' => 'Textarea',
			'options' => array(
				'form_label',
				'form_name',
				'form_placeholder',
				'default_value',
				'id_attr',
				'class_attr',
				'form_required'
			)
		)
	);
	return $fields;
}


function custom_columns_ppo_contact_form( $column, $post_id ) {
	switch ( $column ) {
		case 'shortcode':
			echo '[ppo-contact-form id="' . $post_id . '"]';
			break;
	}
}
add_action( 'manage_ppo_contact_form_posts_custom_column' , 'custom_columns_ppo_contact_form', 10, 2 );


function set_custom_edit_ppo_contact_form_columns($columns) {
    unset( $columns['date'] );
    $columns['shortcode'] = 'Shortcode';
    $columns['date'] = 'Date';

    return $columns;
}
add_filter( 'manage_ppo_contact_form_posts_columns', 'set_custom_edit_ppo_contact_form_columns' );


function admin_footer_ppo_contact_form() {
	$post_type = get_post_type($_GET['post']);
	
	if($post_type == 'ppo_contact_form'){
		$fields = fields_ppo_contact_form();
		include( 'includes/admin/views/admin-footer.php' );
	}
}
add_action( 'admin_footer', 'admin_footer_ppo_contact_form', 10, 1 );

function wp_ajax_add_element_ppo_contact_form() {
	$args = array(
		'post_type' => 'ppo_cf_element',
		'post_title' => 'Contact Form Element: ' . $_POST['form']['form_label'],
		'post_parent' => $_POST['post_parent'],
		'post_status' => 'publish'
	);
	//$post_id = wp_insert_post($args);
	if ( $post_id = wp_insert_post( $args ) ) {
		wp_update_post(
			array(
				'ID'        => $post_id,
				'post_name' => $post_id,
			)
		);
	}

	if(!is_wp_error($post_id)){
		foreach($_POST['form'] as $key => $value){
			update_post_meta($post_id, $key, $value);
		}
		
		$return = array(
			'success' => true,
			'data' => array(
				'html' => form_element_row()
			)
		);
		ob_get_clean();
		include( 'includes/admin/views/form-element-row.php' );
		wp_send_json_success( 
			array(
				'html' => ob_get_clean(),
			)
		);
	}else{
		wp_send_json_error(
			array(
				'error' => $post_id->get_error_message() 
			)
		);
	}

	die();
}
add_action( 'wp_ajax_add_element_ppo_contact_form', 'wp_ajax_add_element_ppo_contact_form' );
add_action( 'wp_ajax_nopriv_add_element_ppo_contact_form', 'wp_ajax_add_element_ppo_contact_form' );

function wp_ajax_edit_element_ppo_contact_form() {
	$post_id = $_POST['ID'];
	foreach($_POST['form'] as $key => $value){
		update_post_meta($post_id, $key, $value);
	}
	echo 'success';
	die();
}
add_action( 'wp_ajax_edit_element_ppo_contact_form', 'wp_ajax_edit_element_ppo_contact_form' );
add_action( 'wp_ajax_nopriv_edit_element_ppo_contact_form', 'wp_ajax_edit_element_ppo_contact_form' );


function wp_ajax_get_element_ppo_contact_form() {
	$field = get_post($_POST['id']);
	if(!is_wp_error($field)){
		$post_meta = get_post_meta($_POST['id']);
		wp_send_json_success( 
			array(
				'post' => $field,
				'post_meta' => $post_meta
			)
		);
	}else{
		wp_send_json_error(
			array(
				'error' => $field->get_error_message() 
			)
		);
	}
	die();
}
add_action( 'wp_ajax_get_element_ppo_contact_form', 'wp_ajax_get_element_ppo_contact_form' );
add_action( 'wp_ajax_nopriv_get_element_ppo_contact_form', 'wp_ajax_get_element_ppo_contact_form' );


function wp_ajax_sorting_element_ppo_contact_form(){
    $arr = array();
    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_type='ppo_cf_element' AND post_parent='" . $_POST['post_parent'] . "' ORDER BY menu_order ASC, ID DESC", OBJECT );
    $counter = 1;
    foreach($results as $result){
        if($result->ID == $_POST['id']){
            continue;
        }
        if(!empty($_POST['nextid']) && $result->ID == $_POST['nextid']){
            $my_post = array(
                'ID' => $_POST['id'],
                'menu_order' => $counter
            );
            wp_update_post( $my_post );
            $counter++;
        }
        $my_post = array(
            'ID' => $result->ID,
            'menu_order' => $counter
        );
        wp_update_post( $my_post );
        if((empty($_POST['nextid']) && !empty($_POST['previd'])) && $result->ID == $_POST['previd']){
            $my_post = array(
                'ID' => $_POST['id'],
                'menu_order' => $counter + 1
            );
            wp_update_post( $my_post );
        }
        $counter++;
    }
    echo 'success';
    wp_die();
}
add_action( 'wp_ajax_sorting_element_ppo_contact_form', 'wp_ajax_sorting_element_ppo_contact_form' );
add_action( 'wp_ajax_nopriv_sorting_element_ppo_contact_form', 'wp_ajax_sorting_element_ppo_contact_form' );


function render_element_ppo_contact_form($contact_form_element){
	$templates = array(
        'form-elements/' . $contact_form_element->form_type . '.php'
    );
    if (locate_template($templates) != '') {
        include(locate_template($templates));
    } else {
        include(untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/includes/views/form-elements/' . $contact_form_element->form_type . '.php');
    }
}
add_action('ppo_form_element', 'render_element_ppo_contact_form');


function admin_post_contact_us() {
    print_r($_POST);
}
add_action( 'admin_post_contact_us', 'admin_post_contact_us' );
add_action( 'admin_post_nopriv_contact_us', 'admin_post_contact_us' );