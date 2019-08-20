<?php
/**
 * Folio theme support
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Folio
 */

function folio_theme_setup() {

  add_theme_support( 'title-tag' );

  /**
   * Enable support for post thumbnails and featured images
   * https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */

  add_theme_support( 'post-thumbnails' );

  /**
   * Enable support for the following post formats
   * https://developer.wordpress.org/themes/functionality/post-formats/
   */

  add_theme_support( 'post-formats', array( 
  'gallery', 
  'image', 
  'video' 
  ) );

  /**
   * Enable support to HTML5 semantic markup
   */

  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );     
}

add_action( 'after_setup_theme', 'folio_theme_setup' );