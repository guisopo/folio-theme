<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Folio
 */

$id = get_the_ID();
$work_data = get_post_meta( $id, '_avant_folio_work_info_key', true); 
$work_type_taxonomy_link = get_term_link( $work_data['work_type'], 'work_type');
$date_completed_taxonomy_link = get_term_link( $work_data['date_completed'], 'date_completed');
?>

<article class="article post work">

	<header class="article-header post__header">

		<h1 class="post_title"><?php the_title(); ?></h1>

		<p class="taxonomy post__taxonomies">

			<a class="taxonomy__link" href=<?php echo $work_type_taxonomy_link ?>>
				<span><?php echo $work_data['work_type']; ?></span>
			</a>

			<a class="taxonomy__link" href=<?php echo $date_completed_taxonomy_link ?>>
				<span><?php echo $work_data['date_completed']; ?></span>
			</a>

		</p>

	</header><!-- article-header -->

	<div class="post__content">
		<p><?php echo $work_data['description']; ?></p>
	</div>

	<div class="post__content">
		<p><?php echo $work_data['credits']; ?></p>
	</div>

  <figure class="work__image-container">
    <?php the_post_thumbnail( 'medium' ); ?>
  </figure>

</article>

<?php

echo render_post_nav($work_type_taxonomy_link, 'work_type');