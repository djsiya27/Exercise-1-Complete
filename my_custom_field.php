<?php
/**
 * Plugin Name: My Custom Metabox
 * Plugin URI: https://www.siyabonga-majola.co.za/metabox
 * Description: A simple plugin for custom field.
 * Version: 1.0
 * Author: Siyabonga Majola
 * Author URI: https://www.siyabonga-majola.co.za/metabox
 * License: GPL2
 */

/**
 * Register meta box.
 */
function mcf_register_meta_boxes() {
    add_meta_box( 'mcf_1', __( 'My Custom Field', 'mcf' ), 'mcf_display_callback', 'post' );
}
add_action( 'add_meta_boxes', 'mcf_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function mcf_display_callback( $post ) {
    include plugin_dir_path( __FILE__ ) . './form.php';
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function hcf_save_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields = [
        'hcf_metabox'
    ];
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}
add_action( 'save_post', 'hcf_save_meta_box' );