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

<article class="article work">
	<header class="article-header">
		<div>
			<h1><?php the_title(); ?></h1>
		</div>
		<div>
			<p>
				<a href=<?php echo $work_type_taxonomy_link ?>>
					<span><?php echo $meta['work_type']; ?></span>
				</a>
				<a href=<?php echo $date_completed_taxonomy_link ?>>
					<span><?php echo $meta['date_completed']; ?></span>
				</a>
			</p>
		</div>
	</header>

	<div>
		<p><?php echo $meta['description']; ?></p>
	</div>

	<div>
		<p><?php echo $meta['credits']; ?></p>
	</div>

  <div>
    <?php the_post_thumbnail( 'medium' ); ?>
  </div>

</article>

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