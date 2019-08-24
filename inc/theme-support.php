<?php
/**
 * Folio theme support
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Folio
 */

function folio_theme_setup() {
  $post_formats = array( 'gallery', 'image', 'video' );
  $html5 = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' );

  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'post-formats', $post_formats);
  add_theme_support( 'html5', $html5 );

  add_image_size( 'admin-list-thumb', 80, 80, true);
}

add_action( 'after_setup_theme', 'folio_theme_setup' );