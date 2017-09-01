<?php
/*
Plugin Name: Page Section
Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id odio in dolor malesuada ullamcorper. Sed mollis hendrerit leo a eleifend. Nam eget lorem sit amet orci molestie ullamcorper.
Version:     1.0
Author:      Peter Paul Ombao
*/

function create_tables(){
    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    if($wpdb->get_var("show tables like '". $wpdb->prefix. 'po_entries' . "'") != $wpdb->prefix. 'po_entries'){
        $sql = "CREATE TABLE {$wpdb->prefix}po_entries (
          id bigint(20) NOT NULL AUTO_INCREMENT,
          entry_name varchar(50) NOT NULL,
          entry_slug varchar(50) NOT NULL,
          description longtext NOT NULL,
          post_type varchar(20) NOT NULL,
          PRIMARY KEY (id),
          UNIQUE KEY (entry_slug,post_type)
        ) $charset_collate;";
        dbDelta( $sql );
    }
    if($wpdb->get_var("show tables like '". $wpdb->prefix. 'po_entries_assignments' . "'") != $wpdb->prefix. 'po_entries_assignments'){
        $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}po_entries_assignments (
          id bigint(20) NOT NULL AUTO_INCREMENT,
          entry_id bigint(20) NOT NULL DEFAULT '0',
          field_id bigint(20) NOT NULL DEFAULT '0',
          sort_order int(11) NOT NULL DEFAULT '0',
          config longtext NOT NULL,
          PRIMARY KEY (id)
        ) $charset_collate;";
        dbDelta( $sql );
    }
    if($wpdb->get_var("show tables like '". $wpdb->prefix. 'po_fields' . "'") != $wpdb->prefix. 'po_fields'){
        $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}po_fields (
          id bigint(20) NOT NULL AUTO_INCREMENT,
          field_label varchar(50) NOT NULL,
          field_name varchar(50) NOT NULL,
          config longtext NOT NULL,
          post_type varchar(20) NOT NULL,
          PRIMARY KEY (id),
          UNIQUE KEY (field_name,post_type)
        ) $charset_collate;";
        dbDelta( $sql );
    }

}
//register_activation_hook( __FILE__, 'create_tables' );


function drop_tables(){
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}po_entries");
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}po_entries_assignments");
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}po_fields");
}
register_deactivation_hook( __FILE__, 'drop_tables' );


function post_type_section() {
	$labels = array(
		'name'               => 'Sections',
		'singular_name'      => 'Section'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields'
        )
	);

	register_post_type( 'section', $args );
}
add_action( 'init', 'post_type_section' );


function admin_field_page(){
    include( 'includes/admin/table-fields.php' );
}

function add_submenu_section(){
    add_submenu_page( 'edit.php?post_type=section', 'Fields', 'Fields', 'manage_options', 'section_fields', 'admin_field_page' );
}
//add_action('admin_menu', 'add_submenu_section');


function post_type_list() {
	$labels = array(
		'name'               => 'Lists',
		'singular_name'      => 'List'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => true,
        'show_in_menu'		 => false,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields'
        )
	);

	register_post_type( 'list', $args );
}
add_action( 'init', 'post_type_list' );

// [pagesection name="post_name"]
function shortcode_pagesection( $atts ) {
    $a = shortcode_atts( array(
        'name' => '',
		'query' => ''
    ), $atts );
    $pagename = get_post_field( 'post_name', get_post() );
	if(empty($a['post_type'])){
		$query = new WP_Query( array('name' => $a['name'], 'post_type' => 'section') );
	}else{
		$query = new WP_Query($a);
	}
	$templates = array(
        'section-' . $pagename . '-' . $a['name'] . '.php',
		'section-' . $a['name'] . '.php',
		'section.php'
	);
	ob_start();
	if (locate_template($templates) != '') {
		include(locate_template($templates));
	} else {
		include(untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/templates/section.php');
	}
	return ob_get_clean();
}
add_shortcode( 'pagesection', 'shortcode_pagesection' );


function action_pagesection( $a ) {
    $pagename = get_post_field( 'post_name', get_post() );
	if(empty($a['post_type'])){
		$query = new WP_Query( array('name' => $a['name'], 'post_type' => 'section') );
	}else{
		$query = new WP_Query($a);
	}
	$templates = array(
        'section-' . $pagename . '-' . $a['name'] . '.php',
		'section-' . $a['name'] . '.php',
		'section.php'
	);
	if (locate_template($templates) != '') {
		include(locate_template($templates));
	} else {
		include(untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/templates/section.php');
	}
}
add_action( 'pagesection', 'action_pagesection' );


function modify_list_row_actions( $actions, $post ) {
	if($post->post_type == 'section'){
		// Build your links URL.
		$url = admin_url( 'admin.php?page=mycpt_page&post=' . $post->ID );

		// Maybe put in some extra arguments based on the post status.
		$edit_link = add_query_arg( array( 'action' => 'edit' ), $url );
		$actions['lists'] = sprintf( '<a href="%1$s">%2$s</a>',
			esc_url( 'edit.php?post_type=list&post_parent=' . $post->ID ),
			esc_html( 'Lists' ) );
	}
	return $actions;
}
add_filter( 'post_row_actions', 'modify_list_row_actions', 10, 2 );


function render_meta_box_section( $post ) {
    include( 'includes/admin/additional-fields-heading.php' );
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
    }
}
function meta_boxes_section( $post_type, $post ) {
    add_meta_box(
        'additional-fields',
        'Additional Fields',
        'render_meta_box_section',
        'section',
        'normal',
        'default'
    );
}
//add_action( 'add_meta_boxes', 'meta_boxes_section', 10, 2 );


function post_listing_page() {
    if( isset( $_GET['post_type'] ) && $_GET['post_type'] == 'list' ){
        add_action( 'pre_get_posts', 'pre_posts_wpse_77721' );
    }
}
function pre_posts_wpse_77721( $query ){
    if( !is_admin() )
        return $query;

    $query->set( 'post_parent', $_GET['post_parent'] );
    $query->set('orderby', array( 'menu_order' => 'ASC', 'ID' => 'DESC' ));

    $post_new_file = 'sdf';
}
add_action( 'load-edit.php', 'post_listing_page' );


function render_lists(){
    $query = new WP_Query(
        array(
            'post_parent' => get_the_ID(),
            'post_type' => 'list',
            'orderby' => array( 'menu_order' => 'ASC', 'ID' => 'DESC' )
        )
    );
    //echo $pagename . get_post_field( 'post_name', get_post() );
    $templates = array(
        'lists-' . get_post_field( 'post_name', get_post() ) . '.php',
        'lists.php'
    );
    if (locate_template($templates) != '') {
        include(locate_template($templates));
    } else {
        include(untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/templates/lists.php');
    }
}
add_action('have_lists', 'render_lists');


function edit_add_new_button_list(){
//    $screen       = get_current_screen();
//    $screen_id    = $screen ? $screen->id : '';
    wp_register_style( 'page_section_admin', untrailingslashit( plugins_url( '/', __FILE__ ) ) . '/assets/css/page-section-admin.css' );
    wp_register_script( 'page_section_admin', untrailingslashit( plugins_url( '/', __FILE__ ) ) . '/assets/js/page-section-admin.js', array( 'jquery-ui-sortable' ) );
    $post_parent = $_GET['post_parent'];
    if(!empty($_GET['post'])){
        $post = get_post($_GET['post']);
        $post_parent = $post->post_parent;
    }
    $params = array(
        'url' => esc_url( admin_url( "post-new.php?post_type=list&post_parent=" . $post_parent ) ),
        'post_parent' => $post_parent
    );
    wp_localize_script('page_section_admin', 'page_section_admin' , $params);
    wp_enqueue_style( 'page_section_admin' );
    wp_enqueue_script( 'page_section_admin' );
}
add_action( 'admin_enqueue_scripts', 'edit_add_new_button_list' );

function ajax_change_entry(){
    if(!empty($_POST['po_entry_id'])){
        global $wpdb;
        $results = $wpdb->get_results("
        SELECT * FROM {$wpdb->prefix}po_entries_assignments
        JOIN {$wpdb->prefix}po_fields
        ON {$wpdb->prefix}po_entries_assignments.field_id = {$wpdb->prefix}po_fields.id
        WHERE {$wpdb->prefix}po_entries_assignments.entry_id = {$_POST['po_entry_id']}
        ORDER BY {$wpdb->prefix}po_entries_assignments.sort_order
    ", OBJECT );
        foreach($results as $result){
            $attr = unserialize($result->config);
            $attr['name'] = $result->field_name;
            $attr['label'] = $result->field_label;
            include( 'includes/admin/field-' . $attr['type'] . '.php' );
        }
    }
    wp_die();
}
add_action( 'wp_ajax_change_entry', 'ajax_change_entry' );
add_action( 'wp_ajax_nopriv_change_entry', 'ajax_change_entry' );

function ajax_lists_sorting(){
    $arr = array();
//    $query = new WP_Query( array( 'post_type' => 'list', 'post_parent' => 29, 'orderby' => array( 'menu_order' => 'ASC', 'ID' => 'DESC' ) ) );
//    if ( $query->have_posts() ) {
//        while ( $query->have_posts() ) {
//            $query->the_post();
//            array_push($arr, get_the_title());
//        } // end while
//    } // end if
    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_type='list' AND post_parent='" . $_POST['post_parent'] . "' ORDER BY menu_order ASC, ID DESC", OBJECT );
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
add_action( 'wp_ajax_lists_sorting', 'ajax_lists_sorting' );
add_action( 'wp_ajax_nopriv_lists_sorting', 'ajax_lists_sorting' );


function mytheme_enqueue_typekit() {
    wp_enqueue_script( 'mytheme-typekit', 'https://use.typekit.net/.js', array('jquery-ui-sortable'), '1.0' );
    wp_add_inline_script( 'mytheme-typekit', 'try{Typekit.load({ async: true });}catch(e){}' );
}

add_action('add_editor_js', 'mytheme_enqueue_typekit');


function custom_columns_section( $column, $post_id ) {
	switch ( $column ) {
		case 'shortcode':
			echo '[pagesection id="' . $post_id . '"]';
			break;
	}
}
add_action( 'manage_section_posts_custom_column' , 'custom_columns_section', 10, 2 );


function set_custom_edit_section_columns($columns) {
    unset( $columns['date'] );
    $columns['shortcode'] = 'Shortcode';
    $columns['date'] = 'Date';

    return $columns;
}
add_filter( 'manage_section_posts_columns', 'set_custom_edit_section_columns' );