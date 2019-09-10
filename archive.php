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

<div id="primary" class="content-area container">
  <main id="main" class="site-main">

    <?php 
    if ( have_posts() ) :

    ?>

      <h1><?php single_term_title(); ?> <h1>

      <ul>
        <?php

        while ( have_posts() ) :
          the_post();

          get_template_part( 'template-parts/content', get_post_type() );
        endwhile;

        ?>
      </ul>
    <?php

    endif; 
    ?>

  </main><!-- #main -->

</div><!-- #primary -->

<?php
get_footer();


