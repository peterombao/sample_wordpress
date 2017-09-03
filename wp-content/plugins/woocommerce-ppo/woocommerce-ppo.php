<?php
/*
Plugin Name: Woocommerce - PPO
Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id odio in dolor malesuada ullamcorper. Sed mollis hendrerit leo a eleifend. Nam eget lorem sit amet orci molestie ullamcorper.
Version:     1.0
Author:      Peter Paul Ombao
*/

function computation($order_total_base_currency){
    return $order_total_base_currency * 0.79;
}

function render_meta_box_ppo( $post ) {
    $post->_order_total_USD_currency = isset($post->_order_total_USD_currency) ? $post->_order_total_USD_currency : computation($post->_order_total_base_currency);
    include( 'includes/admin/views/field-total-usd-currency.php' );
}

function meta_boxes_ppo( $post_type, $post ) {
    add_meta_box(
        'wc-ppo',
        'Woocommerce - PPO',
        'render_meta_box_ppo',
        'shop_order',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'meta_boxes_ppo', 10, 2 );

function save_meta_box_ppo( $post_id ) {
    $post_type = get_post_type($post_id);

    if ( "shop_order" != $post_type ) return;

    if ( isset( $_POST['_order_total_USD_currency'] ) ) {
        if(!is_numeric($_POST['_order_total_USD_currency'])){
            $order_total_base_currency = get_post_meta( $post_id, '_order_total_base_currency', true );
            $_POST['_order_total_USD_currency'] = computation($order_total_base_currency);
        }
        update_post_meta( $post_id, '_order_total_USD_currency', sanitize_text_field( $_POST['_order_total_USD_currency'] ) );
    }
}
add_action( 'save_post', 'save_meta_box_ppo' );

function ajax_recalculate_USD() {
    $order_total_base_currency = get_post_meta( $_POST['id'], '_order_total_base_currency', true );
    echo computation($order_total_base_currency);
    die();
}

add_action( 'wp_ajax_recalculate_usd', 'ajax_recalculate_USD' );
add_action( 'wp_ajax_nopriv_recalculate_usd', 'ajax_recalculate_USD' );

function admin_load_scripts(){
    wp_register_script( 'admin_wc_ppo', untrailingslashit( plugins_url( '/', __FILE__ ) ) . '/assets/js/admin-wc-ppo.js' );
    $params = array(
        'id' => get_the_ID()
    );
    wp_localize_script('admin_wc_ppo', 'wc_ppo' , $params);
    wp_enqueue_script( 'admin_wc_ppo' );
}
add_action( 'admin_enqueue_scripts', 'admin_load_scripts' );

function ajax_save_USD() {
	$post_id = $_POST['id'];
	$post_type = get_post_type($post_id);

    if ( "shop_order" != $post_type ) return;

    if ( isset( $_POST['_order_total_USD_currency'] ) ) {
        if(!is_numeric($_POST['_order_total_USD_currency'])){
            $order_total_base_currency = get_post_meta( $post_id, '_order_total_base_currency', true );
            $_POST['_order_total_USD_currency'] = computation($order_total_base_currency);
        }
        update_post_meta( $post_id, '_order_total_USD_currency', sanitize_text_field( $_POST['_order_total_USD_currency'] ) );
    }
	echo $_POST['_order_total_USD_currency'];
    die();
}

add_action( 'wp_ajax_save_usd', 'ajax_save_USD' );
add_action( 'wp_ajax_nopriv_save_usd', 'ajax_save_USD' );