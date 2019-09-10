<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Folio
 */
?>
<?php 
  $id = get_the_ID();
  $meta = get_post_meta( $id, '_avant_folio_work_info_key', true);
  $image_url = get_the_post_thumbnail_url( $id, ['100', '100'] );
?>

<div>
  <a href=<?php echo get_the_permalink(); ?>>
    <div>
      <img src=<?php echo $image_url ?> />
    </div>
  </a>

  <div>
    <p>
      <span><?php the_title(); ?></span>,&nbsp
      <span><?php echo $meta['date_completed']; ?></span>
    </p>
    <p>
      <span><?php echo $meta['material']; ?></span>
    </p>
    <p>
      <span><?php echo $meta['dimensions']; ?></span>
      <span><?php echo $meta['units']; ?></span>
    </p>
  </div>
</div>