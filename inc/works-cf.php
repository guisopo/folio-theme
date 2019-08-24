<?php

/* Add meta boxes on the 'add_meta_boxes' hook. */
add_action( 'add_meta_boxes', 'folio_add_work_meta_boxes' );
/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'folio_save_post_work_meta', 10, 2 );

/* Meta boxes to be displayed on the work editor screen. */
function folio_add_work_meta_boxes() {

  add_meta_box(
    'folio-work-information',                     // Unique ID
    esc_html__( 'Work Details', 'string' ),       // Title
    'folio_work_info_mb_html',                    // Callback function
    'works',                                      // Screen
    'normal',                                     // Context
    'core'                                        // Priority
  );

  add_meta_box(
    'folio-work-gallery',                         // Unique ID
    esc_html__( 'Work Image Gallery', 'string' ), // Title
    'folio_work_gallery_mb_html',                 // Callback function
    'works',                                      // Screen
    'normal',                                     // Context
    'core'                                        // Priority
  );
}

/* Callback functions */
function folio_work_info_mb_html($post) {
  wp_nonce_field( basename( __FILE__ ), 'folio_work_info_nonce' );
  
  return require_once( get_template_directory()  . '/template-parts/cf-work-details.php' );
}

function folio_work_gallery_mb_html($post) {
  wp_nonce_field( basename( __FILE__ ), 'folio_work_gallery_nonce' );
  
  return require_once( get_template_directory()  . '/template-parts/cf-work-gallery.php' );
}

/* Save the meta box's work metadata. */
function folio_save_post_work_meta( $post_id, $post ) {

  // Checks save status
  $is_autosave    = wp_is_post_autosave( $post_id );
  $is_revision    = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'folio_work_info_nonce' ] ) && wp_verify_nonce( $_POST[ 'folio_work_info_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
  $user_can_edit  = current_user_can( 'edit_post', $post_id );

  // Exits script depending on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce || !$user_can_edit ) {
      return;
  }

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = isset( $_POST['folio_work'] ) ? array_map( 'work_fields_sanitize', $_POST['folio_work'] ) : '';
  $cat = $new_meta_value['category'];
  $new_meta_value['title'] = sanitize_text_field($_POST['post_title']);
  $new_meta_value = array_filter($new_meta_value);

  /* Get the meta key. */
  $meta_key = '_folio_work_meta_key';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If the new meta value does not match the old value, update it. */
  if ( $new_meta_value && $new_meta_value != $meta_value ) {
    wp_set_post_terms( $post_id, $cat, 'work_type' );
    update_post_meta( $post_id, $meta_key, $new_meta_value );
  }

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( $new_meta_value === '' && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

function work_fields_sanitize( $input ) {
  if ( $input === $_POST['folio_work']['description'] || $input === $_POST['folio_work']['credits'] ) {
    return sanitize_textarea_field( $input );
  } else {
    return sanitize_text_field( $input );
  }
}