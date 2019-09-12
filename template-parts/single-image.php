<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Folio
 */
?>

<?php
  $id = get_the_ID();
  $meta = get_post_meta( $id, '_avant_folio_work_info_key', true); 
?>

<article>
		<div>
			<?php the_post_thumbnail( 'medium' ); ?>
		</div>
		<div>
			<p>
				<span><?php echo the_title(); ?>,&nbsp</span>
				<span><?php echo $meta['date_completed'];?></span>
			</p>
			<p>
				<span><?php echo $meta['material'];?></span>
			</p>
			<p>
				<span><?php echo $meta['dimensions'];?>&nbsp</span>
				<span><?php echo $meta['units'];?></span>
			</p>
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