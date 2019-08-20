<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Folio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">
    <?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '"', '</h2>' ); ?>
  </header>

  <div class="entry-content">
    <?php the_excerpt(); ?>
  </div>
  
</article><!-- #post=<?php the_ID(); ?> -->