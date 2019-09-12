<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Folio
 */

$id = get_the_ID();
$meta = get_post_meta( $id, '_avant_folio_work_info_key', true);
$image_url = get_the_post_thumbnail_url( $id, ['100', '100'] );
?>

<li class="work-item work-item--list">

  <a class="work-item__link" href=<?php echo get_the_permalink(); ?>>
    <div class="work-item__image-container">
      <img class="work-item__image" src=<?php echo $image_url ?> />
    </div>
  </a>

  <div class="work-item__information">

    <p class="work-item__data">
      <span class="work-item__title"><?php the_title(); ?></span>,&nbsp
      <span class="work-item__year"><?php echo $meta['date_completed']; ?></span>
    </p>

    <p class="work-item__data">
      <span class="work-item__material"><?php echo $meta['material']; ?></span>
    </p>

    <p class="work-item__data">
      <span class="work-item__dimensions"><?php echo $meta['dimensions']; ?></span>
      <span class="work-item__units"><?php echo $meta['units']; ?></span>
    </p>
  </div>
</div>