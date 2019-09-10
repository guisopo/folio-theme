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
	$taxonomy_link = get_term_link( $meta['work_type'], 'work_type');
?>

<article>
	<header>
		<div>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
		<div>
			<p>
				<a href=<?php echo $taxonomy_link ?>>
					<span><?php echo $meta['work_type'] ?></span>
				</a>
				<span><?php echo $meta['date_completed'] ?></span>
			</p>
		</div>
	</header>

	<div>
		<p><?php echo $meta['description'] ?></p>
	</div>

	<div>
		<?php
			$images = explode(',', $meta['gallery'] );

			foreach ($images as $image) {
				$pic =  wp_get_attachment_image( $image, 'thumbnail', false );
				
				echo '<div>' . $pic . '</div>';
			}
			
		?>
	</div>
</article>

<div>
	<span>
		<?php previous_post_link( '%link', 'Previous', TRUE, '', 'work_type' ); ?>
	</span>
	<span>
		<a href=<?php echo $taxonomy_link ?>>Close</a>
	</span>
	<span>
		<?php next_post_link( '%link', 'Next', TRUE, '', 'work_type' ); ?>
	</span>
</div>
