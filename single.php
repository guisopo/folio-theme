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

<div id="primary" class="content-area">
  <main id="main" class="site-main">

  <?php
    if( have_posts() ):

      while ( have_posts() ) :

        the_post();
        get_template_part( 'template-parts/single', get_post_format() );
        
      endwhile; // End of the loop.

    endif;
  ?>

  </main><!-- #main -->

</div><!-- #primary -->

<?php
get_footer();


