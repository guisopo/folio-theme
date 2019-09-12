<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Folio
 */

$id = get_the_ID();
$work_data = get_post_meta( $id, '_avant_folio_work_info_key', true);
$image_url = get_the_post_thumbnail_url( $id, ['100', '100'] );
?>

<li class="post-item post-item--grid">

  <a class="post-item__link" href=<?php echo get_the_permalink(); ?>>
      
    <figure class="post-item__image-container">
      <img class="post-item__image" src=<?php echo $image_url ?> />
    </figure>

  </a>

  <figcaption class="post-item__information">

    <p class="post-item__data">
      <span><?php the_title(); ?></span>,&nbsp
      <span><?php echo $work_data['date_completed']; ?></span>
    </p>

    <p class="post-item__data">
      <span><?php echo $work_data['material']; ?></span>
    </p>

    <p class="post-item__data">
      <span><?php echo $work_data['dimensions']; ?></span>
      <span><?php echo $work_data['units']; ?></span>
    </p>
    
  </figcaption>
</div>