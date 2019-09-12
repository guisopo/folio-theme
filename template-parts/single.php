<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Folio
 */

  $id = get_the_ID();
  $meta = get_post_meta( $id, '_avant_folio_work_info_key', true); 
	$work_type_taxonomy_link = get_term_link( $meta['work_type'], 'work_type');
	$date_completed_taxonomy_link = get_term_link( $meta['date_completed'], 'date_completed');
?>

<article class="article">

	<header class="article-header">

		<h1 class="work-title"><?php the_title(); ?></h1>

		<p class="work-taxonomies">

			<a class="work-link" href=<?php echo $work_type_taxonomy_link ?>>
				<span class="work-taxonomy"><?php echo $meta['work_type'] ?></span>
			</a>

			<a class="work-link" href=<?php echo $date_completed_taxonomy_link ?>>
				<span class="work-taxonomy"><?php echo $meta['date_completed'] ?></span>
			</a>

		</p>

	</header><!-- article-header -->

	<div class="work-description">
		<p class="work-data"><?php echo $meta['description'] ?></p>
	</div>

	<div class="work-image-container">
		<?php
			$images = explode(',', $meta['gallery'] );

			foreach ($images as $image) {
				$picture =  wp_get_attachment_image( $image, 'medium', false );
				
				echo '<div class="work-image>' . $picture . '</div>';
			}
			
		?>
	</div>
	
</article><!-- article -->

<div>
	<span>
		<?php previous_post_link( '%link', 'Previous', TRUE, '', 'work_type' ); ?>
	</span>
	<span>
		<a href=<?php echo $work_type_taxonomy_link ?>>Close</a>
	</span>
	<span>
		<?php next_post_link( '%link', 'Next', TRUE, '', 'work_type' ); ?>
	</span>
</div>