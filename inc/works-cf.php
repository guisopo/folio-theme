<?php

/* Add meta boxes on the 'add_meta_boxes' hook. */
add_action( 'add_meta_boxes', 'folio_add_work_meta_boxes' );
/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'folio_save_post_work_meta', 10, 2 );

/* Meta boxes to be displayed on the work editor screen. */
function folio_add_work_meta_boxes() {

  add_meta_box(
    'folio-work-information',                     // Unique ID
    esc_html__( 'Work Information', 'string' ),  // Title
    'folio_work_info_mb_html',                   // Callback function
    'works',                                     // Screen
    'normal',                                    // Context
    'core'                                       // Priority
  );
}

/* Callback function */
function folio_work_info_mb_html($post) {
  
  wp_nonce_field( basename( __FILE__ ), 'folio_work_info_nonce' );

  $meta_value = get_post_meta( $post->ID, '_folio_work_meta_key', true );
  $meta_value_title = ( ! empty ( $meta_value['title'] ) ) ? $meta_value['title'] : '';
  $meta_value_year = ( ! empty ( $meta_value['year'] ) ) ? $meta_value['year'] : '';
  $meta_value_material = ( ! empty ( $meta_value['material'] ) ) ? $meta_value['material'] : '';
  $meta_value_length = ( ! empty ( $meta_value['length'] ) ) ? $meta_value['length'] : '';
  $meta_value_wide = ( ! empty ( $meta_value['wide'] ) ) ? $meta_value['wide'] : '';
  $meta_value_units = ( ! empty ( $meta_value['units'] ) ) ? $meta_value['units'] : '';

  ?>
    <p>Here you can fill the information of this work. Click the <b>Publish</b> button on the right to update the data.</p>
    <p>
      <label class="post-attributes-label" for="folio_work_title">Title:</label>
      <input
        type="text" 
        name="folio_work[title]" 
        placeholder="Title of your work"
        size="20"
        value="<?php echo esc_attr( $meta_value_title ); ?>"
      >
    </p>
    <p>
      <label class="post-attributes-label" for="folio_work_title">Year:</label>
      <input
        type="text" 
        name="folio_work[year]" 
        placeholder="<?php echo date('Y') ?>"
        pattern="[0-9]{4,4}"
        size="4"
        value="<?php echo esc_attr( $meta_value_year ); ?>"
      >
    </p>
    <p>
      <label class="post-attributes-label" for="folio_work_material">Material:</label>
      <input
        type="text" 
        name="folio_work[material]" 
        placeholder="Material used"

        size="20"
        value="<?php echo esc_attr( $meta_value_material ); ?>"
      >
    </p>
    <p>
      <label class="post-attributes-label" for="folio_work_size">Size:</label>
      <input
        type="text" 
        name="folio_work[length]" 
        placeholder="Length"
        size="20"
        value="<?php echo esc_attr( $meta_value_length ); ?>"
      >
      <span>x</span>
      <input
        type="text" 
        name="folio_work[wide]" 
        placeholder="Wide"
        size="20"
        value="<?php echo esc_attr( $meta_value_wide ); ?>"
      >
      <select id="work_units" name="folio_work[units]">
        <option value="mm" <?php selected( $meta_value['units'], 'mm' ); ?>>mm</option>
        <option value="cm" <?php selected( $meta_value['units'], 'cm' ); ?>>cm</option>
        <option value="m" <?php selected( $meta_value_units, 'm' ); ?>>m</option>

      </select>
    </p>
  <?php
}

/* Save the meta box's work metadata. */
function folio_save_post_work_meta( $post_id, $post ) {

  // Checks save status
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'folio_work_info_nonce' ] ) && wp_verify_nonce( $_POST[ 'folio_work_info_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
  $user_can_edit = current_user_can( 'edit_post', $post_id );

  // Exits script depending on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce || !$user_can_edit ) {
      return;
  }

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['folio_work'] ) ? array_map( 'sanitize_text_field', $_POST['folio_work'] ) : '' );

  /* Get the meta key. */
  $meta_key = '_folio_work_meta_key';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If the new meta value does not match the old value, update it. */
  if ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( $new_meta_value === '' && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}