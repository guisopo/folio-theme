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