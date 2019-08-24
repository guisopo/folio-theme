<table class="table">
  <tr>
    <th style="vertical-align: top;">
      <?php _e( 'Slider Images', 'your_text_domain' ); ?>
    </th>
    <td>
    <!-- Creating a dynamic ID using the metabox ID for JavaScript-->
      <ul id="<?php echo $this->id; ?>_sortable_wordpress_gallery" class="sortable_wordpress_gallery">
        <?php 
        // Getting all the image IDs by creating an array from string ( 1,3,5 => array( 1, 3, 5) )
        $gallery = explode(",", $sortable_gallery );
        
        // If there is any ID, create the image for it
        if( count( $gallery ) > 0 && $gallery[0] != '' ) {
          foreach ( $gallery as $attachment_id ) {
              
            // Create a LI elememnt
            $output = '<li tabindex="0" role="checkbox" aria-label="' . get_the_title( $attachment_id ) . '" aria-checked="true" data-id="' . $attachment_id . '" class="attachment save-ready selected details">';
              // Create a container for the image. (Copied from the WP Media Library Modal to use the same styling)
              $output .= '<div class="attachment-preview js--select-attachment type-image subtype-jpeg portrait">';
                $output .= '<div class="thumbnail">';
                  $output .= '<div class="centered">';
                    // Get the URL to that image thumbnail
                    $output .= '<img src="'  . wp_get_attachment_thumb_url( $attachment_id ) . '" draggable="false" alt="">';
                  $output .= '</div>';
                $output .= '</div>';
              $output .= '</div>';
              // Add the button to remove this image if wanted (we set the data-gallery to target the correct gallery if there are more than one)
              $output .= '<button type="button" data-gallery="#' . $this->id . '_sortable_wordpress_gallery" class="button-link check remove-sortable-wordpress-gallery-image" tabindex="0"><span class="media-modal-icon"></span><span class="screen-reader-text">Deselect</span></button>';
            $output .= '</li>';
            echo $output;
          }         
        }               
        ?>
      </ul>
      <!-- Hidden input used to save the gallery image IDs into the database -->
      <!-- We are also creating dynamic IDs here so that we can easily target them in JavaScript -->
      <input type="hidden" id="<?php echo $this->id; ?>_sortable_wordpress_gallery_input" name="_<?php echo $this->id; ?>_sortable_wordpress_gallery" value="<?php echo $sortable_gallery; ?>" />
      <!-- Button used to open the WordPress Media Library Modal -->
      <button type="button" class="button button-primary add-sortable-wordpress-gallery" data-gallery="#<?php echo $this->id; ?>_sortable_wordpress_gallery"><?php _e( 'Add Images', 'your_text_domain' ); ?></button>
    </td>
  </tr>
</table>