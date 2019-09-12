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

function render_post_nav( $link ) {
  return '<div>
    <span>
      '. previous_post_link( '%link', 'Previous', TRUE, '', 'work_type' ) .'
    </span>
    <span>
      <a href='. $link .'>Close</a>
    </span>
    <span>
      '. next_post_link( '%link', 'Next', TRUE, '', 'work_type' ) .'
    </span>
  </div>
  ';
}