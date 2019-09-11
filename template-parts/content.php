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

<div>
  <h2><a href=<?php echo esc_url( get_permalink() ); ?>><?php the_title(); ?></a></h2>
  <p><?php echo $date_completed ?></p>
</div>