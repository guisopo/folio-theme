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
    ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();