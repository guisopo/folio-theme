<?php
/**
 * Get taxonomies terms links.
 *
 * @see get_object_taxonomies()
 */
function folio_return_custom_taxonomy( $custom_taxonomy) {
  // Get post by post ID.
  if ( ! $post = get_post() ) {
    return '';
  }

  $output = array();

  // Get the terms related to post.
  $terms = get_the_terms( $post->ID, $custom_taxonomy );

  if ( ! empty( $terms ) ) {
    foreach ( $terms as $term ) {
      $output[] = sprintf( '<a href="%1$s">%2$s</a>',
        esc_url( get_term_link( $term->slug, $custom_taxonomy ) ),
        esc_html( $term->name )
      );
    }
  }

  return implode( '', $output );
}

/**
 * Create taxonomy post navigation.
 *
 * @see get_previous_post_link()
 * @see get_next_post_link()
 */
function render_post_nav( $go_back_link, $taxonomy ) {

  $previous_link = get_previous_post_link( '%link', 'Previous', TRUE, '', $taxonomy );
  $next_link = get_next_post_link( '%link', 'Next', TRUE, '', $taxonomy );

  return '
    <div class="post-navigation">
      <span class="previous-post">
        '. $previous_link .'
      </span>
      <span class="go-back-button">
        <a href='. $go_back_link .'>Close</a>
      </span>
      <span class="next-post">
        '. $next_link .'
      </span>
    </div>';
}