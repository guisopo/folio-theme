<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Folio
 */

$date_completed = folio_return_custom_taxonomy( 'date_completed' );
?>

<li class="work-item work-item--grid">

  <h2 class="work-item__title">
    <a class="work-item__link" href=<?php echo esc_url( get_permalink() ); ?>>
      <?php the_title(); ?>
    </a>
  </h2>

  <p class="work-item__year"><?php echo $date_completed ?></p>
  
</li><!-- .work-item -->