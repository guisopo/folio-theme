<?php
/**
 * Folio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Folio
 */

require get_template_directory().'/inc/cleanup.php';
require get_template_directory().'/inc/enqueue.php';
require get_template_directory().'/inc/menu-management.php';
require get_template_directory().'/inc/folio-template-tags.php';

function render_post_nav( $go_back_link, $taxonomy ) {

  $previous_link = get_previous_post_link( '%link', 'Previous', TRUE, '', $taxonomy );
  $next_link = get_next_post_link( '%link', 'Next', TRUE, '', $taxonomy );

  return '
    <div class="work-navigation">
      <span class="previous-work">
        '. $previous_link .'
      </span>
      <span class="go-back-button">
        <a href='. $go_back_link .'>Close</a>
      </span>
      <span class="next-work">
        '. $next_link .'
      </span>
    </div>';
}