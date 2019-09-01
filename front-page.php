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
    $terms = get_terms( 'work_type' );

    foreach ( $terms as $term ) {

      $term_link = esc_url( get_term_link( $term->name, $term->taxonomy ) );

      echo (
        '<h2>
          <a href="' . $term_link  . '">' 
            . $term->name . 
          '</a>
        </h2>'
      );
    }
  ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();