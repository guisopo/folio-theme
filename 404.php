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
      $args = array(
        'public' => true,
        '_builtin' => false
      );

      $post_types = get_post_types($args, 'names');

      foreach( $post_types as $post_type) {
        echo '<p>'. $post_type . '</p>';
      }
      
      $terms = get_post_meta( '258', '_folio_work_meta_key', true ); 


      echo '<h1>' . get_the_title('258') . '</h2>';
      echo '<p>' . $terms['category'] . '</p>';
      echo '<p>' . $terms['year'] . '</p>';
      echo '<p>' . $terms['material'] . '</p>';
      echo '<p>' . $terms['technique'] . '</p>';
      echo '<p>' . $terms['dimensions'] . $terms['units'] . '</p>';
      echo '<p>' . $terms['description'] . '</p>';
    ?>


  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();