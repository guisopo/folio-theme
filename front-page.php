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
        $terms_args = array(
          'taxonomy'   => 'work_type',
          'orderby'    => 'count',
          'order'      => 'DESC'
        );
        $terms = get_terms( $terms_args );

        foreach ( $terms as $term ) {

          $term_link = esc_url( get_term_link( $term->name, $term->taxonomy ) );

          echo (
            '<li class="' . $term->taxonomy . '">
                <a href="' . $term_link  . '">
                  '. $term->name .'
                </a>
            </li>'
          );
        }
      ?>
    </ul>

    <div class="image-container">
      This will be the image container
    </div>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();