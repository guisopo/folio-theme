<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Folio
 */

get_header();
?>

<h1 class="work-type"><?php single_term_title(); ?> </h1>

<?php 
if ( have_posts() ) :
?>

  <ul class="work-list">
    <?php

    while ( have_posts() ) :
      the_post();

      get_template_part( 'template-parts/content', get_post_format() );
    endwhile;

    ?>
  </ul><!-- .work-list -->
<?php

endif; 
?>

<?php
get_footer();


