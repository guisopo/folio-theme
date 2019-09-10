<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Folio
 */
?>

<?php the_title( sprintf( '<li class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></li>' ); ?>