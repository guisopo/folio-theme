<?php
/**
 * Get taxonomies terms links for single post.
 *
 * @see get_object_taxonomies()
 */
function folio_return_custom_taxonomy( $custom_taxonomy) {

  if ( ! $post = get_post() ) {
    return '';
  }

  $output = array();

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

/**
 * Create unordered list with given taxonomy.
 *
 * @see get_terms()
 * @see get_term_link()
 */
function create_taxonmy_list( $tax_name ) {

  $terms_args = array(
    'taxonomy'   => $tax_name,
    'orderby'    => 'count',
    'order'      => 'DESC'
  );

  $terms = get_terms( $terms_args );

  $output = '<ul class="taxonomy-list">';

  if ( ! empty( $terms ) && taxonomy_exists( $tax_name ) ) {

    foreach ( $terms as $term ) {

      $term_link = esc_url( get_term_link( $term->name, $term->taxonomy ) );

      $output .=
        '<li class="taxonomy-item">
            <a class="taxonomy-link" href="' . $term_link  . '">'. $term->name .'</a>
        </li>'
      ;
    } 
  } else {
    return '<p>ERROR <b>create_taxonmy_list()</b>: Given taxonomy doesn\'t exist or is empty.</p>';
  }

  $output .= '</ul>';

  return $output;
}