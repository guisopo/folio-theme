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

<main class="content">

  <?php 
    echo create_taxonmy_list( 'work_type' ); 
  ?>

  <div class="image-container">
    This will be the image container
  </div>

</main>

<?php
get_footer();