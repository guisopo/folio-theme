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
?>

<article class="post">

	<figure class="post__image-container">
		<?php the_post_thumbnail( 'medium' ); ?>
	</figure>

	<div class="post__information">
		<p class="post__data">
			<?php echo the_title(); ?>,&nbsp
			<?php echo $meta['date_completed'];?>
		</p>
		<p class="post__data">
			<?php echo $meta['material'];?>
		</p>
		<p class="post__data">
			<?php echo $meta['dimensions'];?>&nbsp
			<?php echo $meta['units'];?>
		</p>
	</div>

</article>

<?php

echo render_post_nav($work_type_taxonomy_link, 'work_type');