<?php
/**
 * Custom Page Templage: Contact
 * 
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Folio
 */

get_header();
?>

<?php
  while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content', 'contact' );

  endwhile;
?>

<?php
get_footer();
