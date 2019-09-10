<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Folio
 */

get_header();
?>

<?php 
  $id = get_the_ID();
  $meta = get_post_meta( $id, '_avant_folio_work_info_key', true); 
?>

<div id="primary" class="content-area container">
  <main id="main" class="site-main">

		<article>
			<header>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<div>
					<p>
						<span><?php echo $meta['work_type'] ?></span>
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
  </main><!-- #main -->

</div><!-- #primary -->

<?php
get_footer();


