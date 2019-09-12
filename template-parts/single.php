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

<article class="article post">

	<header class="article__header post__header">

		<h1 class="post__title"><?php the_title(); ?></h1>

		<p class="taxonomies post__taxonomies">

			<a class="taxonomy__link" href=<?php echo $work_type_taxonomy_link ?>>
				<?php echo $work_data['work_type'] ?>
			</a>

			<a class="taxonomy__link" href=<?php echo $date_completed_taxonomy_link ?>>
				<?php echo $work_data['date_completed'] ?>
			</a>

		</p>

	</header><!-- article-header -->

	<div class="post__content">
		<p><?php echo $work_data['description'] ?></p>
	</div>

	<figure class="post__figure">
		<?php
			$images = explode(',', $work_data['gallery'] );

			foreach ($images as $image) {
				$picture =  wp_get_attachment_image( $image, 'medium', false );
				
				echo '<div class="post__image">' . $picture . '</div>';
			}
			
		?>
	</figure>

</article><!-- article -->

<?php

echo render_post_nav($work_type_taxonomy_link, 'work_type');