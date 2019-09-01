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

    <ul class="work_types">
      <?php
        $terms = get_terms( 'work_type' );
        $term_class = 'work_type';

        foreach ( $terms as $term ) {

          $term_link = esc_url( get_term_link( $term->name, $term->taxonomy ) );

          echo (
            '<li class="' . $term_class . '">
                <a href="' . $term_link  . '">
                  '. $term->name .'
                </a>
            </li>'
          );
        }
      ?>
    </ul>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();