<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Folio
 */

get_header();
?>

<div id="primary" class="content-area">
  <main id="main">

    <?php
    if ( have_posts() ) :

      while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', get_post_format() );
        
      endwhile;
      
      else :
        
        get_template_part( 'template-parts/content', 'none' );
        
    endif;
    ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();