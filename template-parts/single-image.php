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
?>

<article class="work">

	<div class="work__image-container">
		<?php the_post_thumbnail( 'medium' ); ?>
	</div>

	<div class="work__information">
		<p class="work__data">
			<span class="work__information"><?php echo the_title(); ?>,&nbsp</span>
			<span class="work__information"><?php echo $meta['date_completed'];?></span>
		</p>
		<p class="work__data">
			<span class="work__information"><?php echo $meta['material'];?></span>
		</p>
		<p class="work__data">
			<span class="work__information"><?php echo $meta['dimensions'];?>&nbsp</span>
			<span class="work__information"><?php echo $meta['units'];?></span>
		</p>
	</div>

</article>

<?php

echo render_post_nav($work_type_taxonomy_link, 'work_type');